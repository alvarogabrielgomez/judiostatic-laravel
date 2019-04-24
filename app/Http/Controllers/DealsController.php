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
        $clients = Client::where('client_email', '=', $request->email)
        ->first();
        // El usuario si existia en la tabla clients
        if($clients != null){
            if($clients->active != 1){
                // Si el usuario no esta activo
                $response = "error";
                $responseContent = "Usuário Banido ou desativado";
            }else if($clients->active == 1){
                // Si el usuario esta activo
                $this->validate($request, [
                    'client_email' =>  'required|email',
                    // 'password' => 'required|alphaNum|min:3'
                ]);
                $user_data = array(
                    'client_email' => $request->email
                );
                if(Auth::attempt($user_data)){

                }else{
                //No se pudo logear
                $response = "error";
                $responseContent = "No se pudo hacer login";
                }
            }
        }else{
          // El usuario no existia en la tabla clients 
        }

    //   $clients = new Clients();
    //   $clients->client_first = $request->first;
    //   $clients->client_last = $request->last;
    //   $clients->client_email = $request->email;

    return response()->json(array('responseContent' => $responseContent, 'response' => $response));
    }
    

    function checklogin(Request $request){
        $this->validate($request, [
            'email' =>  'required|email',
            // 'password' => 'required|alphaNum|min:3'
        ]);
        $user_data = array(
            'email' => $request->get('email'),
            'first' => $request->get('first'),
            'last' => $request->get('last')
        );
    }

    public function update(Request $request, $slug)
    {

    }

    public function destroy($slug)
    {
    }
}
