<?php

namespace judiostatic\Http\Controllers;

use Illuminate\Http\Request;
use judiostatic\Post;
use Illuminate\Support\Facades\Auth;
use judiostatic\Buss;

class ModalwindowController extends Controller
{


    public function index(Request $request)
    {  
        return redirect()->route('home');
    }

    public function show($id){
        
        $posts = Post::where('post_id', '=', $id)
                        ->join('buss', 'buss.buss_id', '=', 'posts.buss_id')
                        ->select('buss.buss_id', 'buss.buss_name', 'title', 'description', 'post_hero_img_url', 'price_from', 'price_new', 'offer_end_at', 'posts.created_at', 'post_id')
                        ->firstOrFail();
       
        $userdata = '{"email":"", "client_first":"", "client_last":""}';

        if(Auth::check()){
            $userdata = Auth::user();
        }

        return view('partials.modalwindow.continue', compact('posts', 'userdata'));
    }

}
