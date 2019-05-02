<?php

namespace judiostatic\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use judiostatic\Post;
use judiostatic\Buss;
use judiostatic\User;
use judiostatic\Transaction;
use judiostatic\Buylimit;
use PHPUnit\Framework\Exception;

class DealsController extends Controller
{

    public function index(Request $request)
    {
        $posts = Post::all();
        return view('deals.index')->with('posts', $posts);
    }

    public function create()
    {
        return view('deals.create');
    }



    public function show($id)
    {
        $posts = Post::where('post_id', '=', $id)->join('buss', 'buss.buss_id', '=', 'posts.buss_id')->firstOrFail();
        return view('deals.show', compact('posts'));
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

    public function dealsubmit(Request $request){
        $response = "";
        $responseContent = "";
        $request->validate([
            'email' =>  'required|email',
        ]);
    //Primero se Revisa si existe el usuario
        $users = User::where('email', '=', $request->email)
        ->first();
        $client_first = "";
        $client_last = "";
        // El usuario si existia en la tabla Users
        if($users != null){
            
            if($users->active != 1){
                // Si el usuario no esta activo
                $client_first = $users->client_first;
                $client_last = $users->client_last;
                $email = $users->email;
                $response = "error";
                $responseContent = "Usuário Banido ou desativado";
            }else if($users->active == 1){
                // Si el usuario esta activo
                $client_first = $users->client_first;
                $client_last = $users->client_last;
                $email = $users->email;

                //Aca se tiene que revisar si esta en sesion
                if(Auth::check()){
                    $response = "success";
                    $responseContent = "Esta en Session";     
                }else{
                    $response = "successNoSession";
                    $responseContent = "Escriba su contrasena para continuar."; 
                }
            }
        }else{
          // El usuario no existia en la tabla Users 
          $email = "";
          $response = "error";
          $responseContent = "Usuario No existe";
        }

    //   $Users = new Users();
    //   $Users->User_first = $request->first;
    //   $Users->User_last = $request->last;
    //   $Users->email = $request->email;


    return response()->json(array( 'responseContent' => $responseContent, 'response' => $response, 'client_first' => $client_first, 'client_last' => $client_last, 'email' => $email), 200);
    
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


    public function insertTransaction(Request $request){
        // Se revisan los BuyLimits primero
        $response = "";
        $data = "";
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

            if(!is_null($buylimits)){ // se encontro en la tabla buylimits del dia de hoy

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
                        $transactions->transaction_qr = $transqr;
                        $transactions->save();

                        $response = "success";
                        $data = array('transqr' => $transactions->transaction_qr);

                    }else if($limit_count >= $busslimits->buss_limits){ // no se pueden pedir
                        $response = "error";
                        $data->message = "Você pediu muitos cupons do mesmo lugar, tente outro dia.";
                    }
                }else if($day_now < $day_updated_at){
                    $response = "error";
                    $data->message = "Time Unknown Error";
                }
            }else if(is_null($buylimits)){ // no se encontro hoy

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
                $transactions->transaction_qr = $transqr;
                $transactions->save();

                $response = "success";
                $data = array('transqr' => $transactions->transaction_qr);
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
}
