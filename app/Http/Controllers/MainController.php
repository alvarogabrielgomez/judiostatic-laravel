<?php

namespace judiostatic\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index()
    {
        return view('index');
    }

}
