<?php

namespace judiostatic\Http\Controllers;

use judiostatic\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);
        $user = new User([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'], 201);
    }
    public function login(Request $request)
    {

        $http = new \GuzzleHttp\Client;
        // config('services.passport.login_endpoint'
        try {
            $response = $http->post('http://localhost:8000/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => '2',
                    'client_secret' => 'GMM1YyzH8SeyW5IfK1JMTeIBJSY8vWoZ86h5pf6e',
                    'username' => $request->username,
                    'password' => $request->password,
                ]
            ]);
            return $response->getBody();
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            if ($e->getCode() === 400) {
                return response()->json('Invalid Request. Please enter a username or a password.', $e->getCode());
            } else if ($e->getCode() === 401) {
                return response()->json('Your credentials are incorrect. Please try again', $e->getCode());
            }
            return response()->json('Something went wrong on the server.', $e->getCode());
        }

        // $request->validate([
        //     'email'       => 'required|string|email',
        //     'password'    => 'required|string',
        //     'remember_me' => 'boolean',
        // ]);
        // $credentials = request(['email', 'password']);
        // if (!Auth::attempt($credentials)) {
        //     return response()->json([
        //         'message' => 'Unauthorized'], 401);
        // }
        // $user = $request->user();
        // $tokenResult = $user->createToken('Personal Access Token');
        // $token = $tokenResult->token;
        // if ($request->remember_me) {
        //     $token->expires_at = Carbon::now()->addWeeks(1);
        // }
        // $token->save();
        // return response()->json([
        //     'access_token' => $tokenResult->accessToken,
        //     'token_type'   => 'Bearer',
        //     'expires_at'   => Carbon::parse(
        //         $tokenResult->token->expires_at)
        //             ->toDateTimeString(),
        // ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 
            'Successfully logged out']);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}