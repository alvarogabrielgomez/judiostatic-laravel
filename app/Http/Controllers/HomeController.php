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
        $userdata = '{"email":"", "client_first":"", "client_last":"", "avatar":""}';
        if(Auth::check()){
            $userdata = Auth::user();
            // $buylimits = Buylimit::where('post_id', '=', $id)
            // ->where('client_id', '=', $userdata->id)
            // ->orderBy('limits_id', 'desc')
            // ->limit(1)
            // ->get();
        }
        //dd($user = Auth::user()->hasSocialProviders(Auth::user()->email));
        return view('home', compact('userdata'));
    }
}
