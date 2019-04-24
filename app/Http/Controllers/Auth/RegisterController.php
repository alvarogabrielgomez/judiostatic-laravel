<?php

namespace judiostatic\Http\Controllers\Auth;

use judiostatic\Client;
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
    protected $redirectTo = '/home';

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
            'client_email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'client_pwd' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \judiostatic\Client
     */
    protected function create(array $data)
    {
        return Client::create([
            'client_first' => $data['first'],
            'client_last' => $data['last'],
            'client_email' => $data['email'],
            'client_pwd' => Hash::make($data['password']),
        ]);
    }
}
