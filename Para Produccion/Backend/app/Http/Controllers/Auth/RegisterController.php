<?php

namespace judiostatic\Http\Controllers\Auth;

use judiostatic\User;
use Illuminate\Http\Request;
use judiostatic\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'client_first' => ['required', 'string', 'max:255'],
            'client_last' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \judiostatic\User
     */
    protected function create(array $data)
    {
    
        return User::create([
            'client_first' => $data['first'],
            'client_last' => $data['last'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    protected function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = User::where('email', '=', $request->input('email'))->first();
        //$this->guard()->login($user);

        if($user){
            //return redirect()->route('auth.register')->with('status', 'exists');
            return $this->registered($request, $user)->with('status', 'exists');
        }
        else{
            $user = User::create([
                'email' => $request->input('email'),
                'client_first' => $request->input('client_first'),
                'client_last' => $request->input('client_last'),
                'password' => Hash::make($request->input('password')),
                //'username' => $googleUser->nickname,
                //'avatar' => $googleUser->avatar,
                //'provider_id' => $googleUser->getId(),
                'provider_name' => 'Omeleth',
                'active' => '1',
                ]);
                return redirect($this->redirectPath())->with('status', __('messages.account_created'));
        }
            
    }

    protected function registerStateless(Request $request)
    {
        $client_id = "";
        $client_first = $request->client_first;
        $client_last = $request->client_last;
        $email = $request->email;
        $responseContent = "";
        $response = "error";

        $request->validate([
            'client_first' => ['required', 'string', 'max:255'],
            'client_last' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::where('email', '=', $request->input('email'))->first();
        //$this->guard()->login($user);

        if($user){
            //return redirect()->route('auth.register')->with('status', 'exists');
            $responseContent = "Usuario Existe";
            $response = "error";
        }
        else{
            try {
                $user = User::create([
                    'email' => $email,
                    'client_first' => $client_first,
                    'client_last' => $client_last,
                    'password' => Hash::make('secret'),
                    //'username' => $googleUser->nickname,
                    //'avatar' => $googleUser->avatar,
                    //'provider_id' => $googleUser->getId(),
                    'provider_name' => 'Omeleth',
                    'active' => '1',
                ]);
                $user = User::where('email', $email)->first();
                $client_id = $user->id;
                $responseContent =  __('messages.account_created');
                $response = "success"; 
            } catch (\Throwable $th) {
                $responseContent = "No se pudo crear usuario";
                $response = "error";
            }

            return response()->json(array( 'responseContent' => $responseContent, 'response' => $response, 'client_id' => $client_id, 'client_first' => $client_first, 'client_last' => $client_last, 'email' => $email), 200);
        }
            
    }

}
