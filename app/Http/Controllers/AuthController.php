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
        $validator = Validator::make($request->all(), [
            'client_first' => 'required|string|max:255',
            'client_last' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $success['token'] = $user->createToken('judiostatic')->accessToken;
        $success['email'] = $user->email;


        return $this->sendResponse($success, 'User register success'); 
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
            config('services.passport.login_endpoint'), // endpoint/oauth/token
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

    public function checkuser(Request $request){
        $response = "";
        $responseContent = "";
        $request->validate([
            'email' =>  'required|email',
        ]);
    //Primero se Revisa si existe el usuario
        $users = User::where('email', '=', $request->email)
        ->first();
        $client_first = "";
        $client_last = "";
        // El usuario si existia en la tabla Users
        if($users != null){
            
            if($users->active != 1){
                // Si el usuario no esta activo
                $client_first = $users->client_first;
                $client_last = $users->client_last;
                $email = $users->email;
                $response = "error";
                $responseContent = "Usuário Banido ou desativado";
            }else if($users->active == 1){
                // Si el usuario esta activo
                $client_first = $users->client_first;
                $client_last = $users->client_last;
                $email = $users->email;

                //Aca se tiene que revisar si esta en sesion
                if(Auth::check()){
                    $response = "success";
                    $responseContent = "Esta en Session";     
                }else{
                    $response = "successNoSession";
                    $responseContent = "Escriba su contrasena para continuar."; 
                }
            }
        }else{
          // El usuario no existia en la tabla Users 
          $email = "";
          $response = "error";
          $responseContent = "Usuario No existe";
    }
    return response()->json(array( 'responseContent' => $responseContent, 'response' => $response, 'client_first' => $client_first, 'client_last' => $client_last, 'email' => $email), 200);

 }

}