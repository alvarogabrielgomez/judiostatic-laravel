<?php

namespace judiostatic\Http\Controllers;

use Illuminate\Http\Request;
use judiostatic\Post;
use judiostatic\Buss;

class ModalwindowController extends Controller
{


    public function index(Request $request)
    {  
        return redirect()->route('home');
    }

    public function show($id){
        
        $posts = Post::where('post_id', '=', $id)->join('buss', 'buss.buss_id', '=', 'posts.buss_id')->firstOrFail();
       

        return view('partials.modalwindow.continue', compact('posts'));
    }

}
