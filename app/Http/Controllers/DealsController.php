<?php

namespace judiostatic\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;
use Validator;
use judiostatic\Post;
use judiostatic\Buss;
use judiostatic\User;
use judiostatic\Transaction;
use judiostatic\Buylimit;
use Illuminate\Support\Collection;
use PHPUnit\Framework\Exception;

class DealsController extends AuthController
{

    public function index(Request $request)
    {
        $posts = Post::join('buss', 'buss.buss_id', '=', 'posts.buss_id')->get();
        //dd($posts);

        return view('deals.index')->with('posts', $posts);
    }

    public function create()
    {
        return view('deals.create');
    }



    public function show($id)
    {
        $posts = Post::where('post_id', '=', $id)
                    ->join('buss', 'buss.buss_id', '=', 'posts.buss_id')
                    ->firstOrFail();
        $userdata = '{"email":"", "client_first":"", "client_last":""}';
        $buylimits= '{}';
        if(Auth::check()){
            $userdata = Auth::user();
            $buylimits = Buylimit::where('post_id', '=', $id)
            ->where('client_id', '=', $userdata->id)
            ->orderBy('limits_id', 'desc')
            ->limit(1)
            ->get();
        }
        //dd($buylimits);
        dd($userdata->avatar);
        return view('deals.show', compact('posts', 'userdata', 'buylimits'));


    }



    public function carousel(Request $request)
    {
        // $posts = Post::all()->where('active', true);
        $posts = Post::join('buss', function($join){
            $join->on('buss.buss_id', '=', 'posts.buss_id');
        })
        ->select('buss.buss_name', 'title', 'description', 'post_hero_img_url', 'price_from', 'price_new', 'offer_end_at', 'posts.created_at', 'post_id')
        ->where('posts.active', true)
        ->where('buss.active', true)
        ->take(10)
        ->get();

        $response = (count($posts) > 0 ? 'success' : 'error');
        return response()->json(array('data' => $posts, 'response' => $response));
    }

   public function enviaremail(Request $request){
    $to_name = $request->name;
    $last = $request->last;
    $to_email = $request->email;
    $response = "success";
    $transqr = $request->transqr;
    $post_buss_name = $request->post_buss_name;
    $post_title = $request->post_title;
    $post_desc = $request->post_desc;
    $post_buss_dir = $request->post_buss_dir;

    $data = array('name' => $to_name, 'last' => $last ,'transqr'=>$transqr, "post_buss_name" => $post_buss_name, 'post_title' => $post_title, 'post_desc' => $post_desc, 'post_buss_dir' => $post_buss_dir);
       try{
           Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
               $message->to($to_email, $to_name)
                       ->subject('Seu cupom de desconto');
               $message->from('noreply.ckj.cupon@gmail.com','Omeleth Cupon');
           });
       } 
       catch(Exception $e){
        $response = "error";
       }

    return response()->json(array('data' => $data, 'response' => $response));

    }
    

    function dealsubmituser(Request $request){
        $response = "";
        $responseContent = "";
        $request->validate([
            'email' =>  'required|email',
            'password' =>  'required|min:3',
        ]);
        
        $user_data = array('email' => $request->email, 'password' => $request->password);

        if(Auth::attempt($user_data)){
        //logued
        $response = "success";
        $responseContent = "Logued";
        }else{
        //No se pudo logear
        $response = "error";
        $responseContent = "No se pudo hacer login";
        }
        return response()->json(array('responseContent' => $responseContent, 'response' => $response));
    }

// funciona en API tambien 
    public function insertTransaction(Request $request){
        // Se revisan los BuyLimits primero
        $response = "";
        $data = array('transqr' => '', 'message' => '');

        $request->validate([
            'post_id' =>  'required|min:1',
            'client_id' =>  'required|min:1',
            'buss_id' => 'required|min:1'
        ]);

        try{
            
            $busslimits = Buss::where('buss_id', '=', $request->buss_id)
                                ->select('buss_limits')
                                ->first()
                                ;

            $buylimits = Buylimit::where('client_id', '=', $request->client_id)
                                ->where('buss_id', '=', $request->buss_id)
                                ->whereDay('updated_at', '=', date('d')) // hoy
                                ->whereMonth('updated_at', '=', date('m'))
                                ->whereYear('updated_at', '=', date('Y'))
                                ->first()
                                ;

            if(!$busslimits){return response()->json(array('response' => 'Buss not found'));};
            
            if($buylimits){ // se encontro en la tabla buylimits del dia de hoy

                $day_now = time();
                $day_updated_at = strtotime($buylimits->updated_at);
                $limit_count = $buylimits->limit_count;

                if($day_now >= $day_updated_at){
                    if($limit_count < $busslimits->buss_limits){ // se pueden pedir

                        $buylimits->limit_count = $limit_count+1;
                        $buylimits->save();

                        $transqr = $request->client_id . $request->post_id . random_int(1, 1000000) . $request->buss_id;

                        $transactions = new Transaction();
                        $transactions->post_id = $request->post_id;
                        $transactions->buss_id = $request->buss_id;
                        $transactions->client_id = $request->client_id;
                        $transactions->trans_qr = $transqr;
                        if($request->app_id){$transactions->app_id = $request->app_id;};
                        $transactions->save();

                        $response = "success";
                        $data = array('transqr' => $transactions->trans_qr, 'message' => 'success');

                    }else if($limit_count >= $busslimits->buss_limits){ // no se pueden pedir
                        $response = "error";
                        $data = array('transqr' => '', 'message' => 'Você pediu muitos cupons do mesmo lugar, tente outro dia.');
                    }
                }else if($day_now < $day_updated_at){
                    $response = "error";
                    $data = array('transqr' => '', 'message' => 'Time Unknown Error.');
                }
            }else if(!$buylimits){ // no se encontro hoy

                $buylimits = new Buylimit();
                $buylimits->buss_id = $request->buss_id;
                $buylimits->client_id = $request->client_id;
                $buylimits->post_id = $request->post_id;
                $buylimits->save();

                $transqr = $request->client_id . $request->post_id . random_int(1, 1000000) . $request->buss_id;

                $transactions = new Transaction();
                $transactions->post_id = $request->post_id;
                $transactions->buss_id = $request->buss_id;
                $transactions->client_id = $request->client_id;
                $transactions->trans_qr = $transqr;
                if($request->app_id){$transactions->app_id = $request->app_id;};
                $transactions->save();

                $response = "success";
                $data = array('transqr' => $transactions->trans_qr, 'message' => 'success');
            }

            return response()->json(array('data' => $data, 'response' => $response));

        }
        catch (Exception $e){ 
            return response()->json(array('data' => $e));
        }
    }




    public function update(Request $request, $slug)
    {

    }

    public function destroy($slug)
    {
    }




///////////////////////////////////////////
    public function indexApi()
    {
        $posts = Post::all();


        return $this->sendResponse($posts->toArray(), 'Deals retrieved successfully.');
    }

    public function showApi($id)
    {
        $posts = Post::where('post_id', '=', $id)->join('buss', 'buss.buss_id', '=', 'posts.buss_id')
        ->select('posts.post_id', 'buss.buss_id', 'posts.active', 'posts.created_at', 'posts.updated_at', 'offer_end_at', 'price_new', 'price_from', 'title', 'description', 'post_hero_img_url', 'buss_name', 'buss_dir', 'buss_phone', 'buss_url', 'cover_url', 'buss_limits')
        ->firstOrFail();

        if (is_null($posts)) {
            return $this->sendError('Product not found.');
        }


        return $this->sendResponse($posts, 'Product retrieved successfully.');
    }




    
}
