<?php

namespace judiostatic\Http\Controllers;

use judiostatic\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'client_first' => 'required|string|max:255',
            'client_last' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3|confirmed',
        ]);

        return User::create([
            'client_first' => $request->client_first,
            'client_last' => $request->client_last,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

    }
    public function login(Request $request)
    {

        $request->request->add([
            'grant_type' => 'password',
            'client_id' => config('services.passport.client_id'),
            'client_secret' => config('services.passport.client_secret'),
            'username' => $request->username,
            'password' => $request->password,
            'scope' => '*'
        ]);

        $tokenRequest = Request::create(
            config('services.passport.login_endpoint'),
            'post'
        );
        $response = Route::dispatch($tokenRequest);

        return $response;
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens->each(function ($token, $key){
            $token->delete();
        });
        return response()->json(['message' => 'Successfully logged out'], 200);

        // $request->user()->token()->revoke();
        // return response()->json(['message' => 
        //     'Successfully logged out']);
    }

}