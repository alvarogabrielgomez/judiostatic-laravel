<?php

namespace judiostatic\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){

        return view ('home');
    }

    public function carousel(Request $request)
    {

            return response()->json([
            ['id' => 1, 'title' => 'Lorem', 'description' => 'Desc', 'buss_name' => 'Tumamaeshombre'],
            ['id' => 2, 'title' => 'Lorem', 'description' => 'Desc', 'buss_name' => 'Tumamaeshombre'],
            ['id' => 3, 'title' => 'Lorem', 'description' => 'Desc', 'buss_name' => 'Tumamaeshombre'],
            ['id' => 4, 'title' => 'Lorem', 'description' => 'Desc', 'buss_name' => 'Tumamaeshombre'],
            ]);
        

    }
}

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }