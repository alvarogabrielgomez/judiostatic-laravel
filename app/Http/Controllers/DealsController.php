<?php

namespace judiostatic\Http\Controllers;

use Illuminate\Http\Request;
use judiostatic\Post;
use judiostatic\Buss;

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





    public function update(Request $request, $slug)
    {

    }

    public function destroy($slug)
    {
    }
}
