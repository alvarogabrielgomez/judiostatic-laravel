<?php

namespace judiostatic\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }

    public function index(Request $request)
    {
            $request->user()->authorizeRoles(['admin']);

        return view('settings');
    }
}
