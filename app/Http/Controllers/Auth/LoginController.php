<?php

namespace judiostatic\Http\Controllers\Auth;

use judiostatic\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use judiostatic\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Passport\Passport;
use Illuminate\Support\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
     protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


      
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::where('email', '=', $googleUser->getEmail())->first();

        if($user){
            Auth::login($user, true);
            //dd(Auth::user());
            return redirect($this->redirectTo);
        }

        //dd($googleUser);
        // $user->token;
        // Add to database
        $user = User::create([
            'email' => $googleUser->getEmail(),
            'client_first' => $googleUser->user["given_name"],
            'client_last' => $googleUser->user["family_name"],
            //'username' => $googleUser->nickname,
            'avatar' => $googleUser->avatar,
            'provider_id' => $googleUser->getId(),
            'provider_name' => 'Google',
            'active' => '1',
            ]);

        // LOGIN
        Auth::login($user, true);
        return redirect($this->redirectTo);
    }


    public function apiLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Authentication passed...
    
            Passport::tokensExpireIn(Carbon::now()->addDays(1));
            Passport::refreshTokensExpireIn(Carbon::now()->addDays(2));
    
            $user = Auth::user();
            $objToken = $user->createToken('API Access', $request->scope);
            $strToken = $objToken->accessToken;
    
            $expiration = $objToken->token->expires_at->diffInSeconds(Carbon::now());
    
            return response()->json(["token_type" => "Bearer", "expires_in" => $expiration, "access_token" => $strToken]);
        }
    
        return response()->json(["error" => "invalid_credentials", "message" => "The user credentials were incorrect."], 401);
    }

}
