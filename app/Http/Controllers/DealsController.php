<?php

namespace judiostatic\Http\Controllers;

use Illuminate\Http\Request;
use judiostatic\Post;
use judiostatic\Buss;
use judiostatic\Client;
use Validator;
use Auth;

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
    //Primero se Revisa si existe el usuario
        $clients = Client::where('client_email', '=', $request->client_email)
        ->first();
        $client_first = "";
        $client_last = "";
        // El usuario si existia en la tabla clients
        if($clients != null){
            
            if($clients->active != 1){
                // Si el usuario no esta activo
                $response = "error";
                $responseContent = "Usuário Banido ou desativado";
            }else if($clients->active == 1){
                // Si el usuario esta activo
                $client_first = $clients->client_first;
                $client_last = $clients->client_last;

                $this->validate($request, [
                    'client_email' =>  'required|email',
                   // 'client_pwd' => 'required|min:3'
                ]);
                //Aca se tiene que revisar si esta en sesion
                if(Auth::check()){
                    $response = "success";
                    $responseContent = "Esta en Session";     
                }else{
                    $response = "successNoSession";
                    $responseContent = "No esta en Session"; 
                }
            }
        }else{
          // El usuario no existia en la tabla clients 
          $response = "error";
          $responseContent = "Usuario No existe";
        }

    //   $clients = new Clients();
    //   $clients->client_first = $request->first;
    //   $clients->client_last = $request->last;
    //   $clients->client_email = $request->email;

    return response()->json(array('responseContent' => $responseContent, 'response' => $response, 'client_first' => $client_first, 'client_last' => $client_last));
    }
    

    function checklogin(Request $request){
        $user_data = array(
            'client_email' => $request->client_email, 
            'client_pwd' => $request->client_pwd
        );
        
        if(Auth::attempt($user_data)){

        }else{
        //No se pudo logear
        $response = "error";
        $responseContent = "No se pudo hacer login";
        }
        return response()->json(array('responseContent' => $responseContent, 'response' => $response));
    }

    public function update(Request $request, $slug)
    {

    }

    public function destroy($slug)
    {
    }
}
