<?php

namespace judiostatic\Http\Controllers\Auth;

use judiostatic\User;
use judiostatic\PasswordReset;
use Illuminate\Http\Request;
use judiostatic\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function newPwd(Request $request){
        $response = 'error';
        $responseContent = 'Error Desconocido';
        $request->validate([
            'email' => 'required|string|email',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user){
            $response = 'error';
            $responseContent = 'Email no existe';
        }else{     
                //Mandas Email
                $this->sendResetLinkEmail($request);         
                $response = "success";
                $responseContent = "Email Enviado a <strong>$request->email</strong>";
        }

        return response()->json(array( 'responseContent' => $responseContent, 'response' => $response), 200);
    }
}
