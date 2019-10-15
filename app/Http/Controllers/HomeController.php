<?php

namespace judiostatic\Http\Controllers;

use Auth;
use judiostatic\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //dd($user = Auth::user()->hasSocialProviders(Auth::user()->email));
        return view('home');
    }
}
