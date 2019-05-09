<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('oauth/token', 'AccessTokenController@issueToken');



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@registerApi');
Route::middleware('auth:api')->get('/checkuser', 'AuthController@checkuser');

Route::post('/v1/getTokenApi', function(Request $request){
    $request->request->add([
        'grant_type' => 'password',
        'client_id' => $request->id,
        'client_secret' => config('services.passport.client_secret_api'),
        'password' => $request->password,
        'name' => $request->name,
        'username' => config('services.passport.usernameApi'),
        'scope' => ['user-data', 'manage-coupons']
    ]);

    $tokenRequest = Request::create(
        config('services.passport.login_endpoint'), // endpoint/oauth/token
        'post'
    );
    $response = Route::dispatch($tokenRequest);

    return $response;
});


Route::get('/v1/redirect', function(Request $request){
    $query = http_build_query(array(
         'client_id' => $request->client_id,
         //'client_secret' => 'mmgkKwYfFh1H0d3kOJEfm3cMhluyMz1hMpiUUdwI',
         'redirect_uri' => 'http://localhost:8000/api/v1/callback',
         'response_type' => 'code',
         'scope' => ['user-data', 'manage-coupons'],
     ));

     return redirect('http://localhost:8000/oauth/authorize?'.$query);
});

Route::get('/v1/callback', function(Request $request){
    
    $request->request->add([
        'client_id' => 3,
        'client_secret' => 'mmgkKwYfFh1H0d3kOJEfm3cMhluyMz1hMpiUUdwI',
        'grant_type' => 'authorization_code',
        'redirect_uri' => 'http://localhost:8000/api/v1/callback',
        'code' => $request->code, 
    ]);
    $tokenRequest = Request::create(
        config('services.passport.login_endpoint'), // endpoint/oauth/token
        'post'
    );
    $response = Route::dispatch($tokenRequest);

    
    return $response;

});


Route::middleware('auth:api')->get('/v1/deals', 'DealsController@indexApi');
Route::middleware('auth:api')->get('/v1/deals/{id}', 'DealsController@showApi');

Route::middleware('auth:api')->post('/v1/inserttrans', 'DealsController@insertTransaction');


Route::middleware('auth:api')->post('/logout', 'AuthController@logout');

// Route::group(['prefix' => 'auth'], function () {
//     Route::post('login', 'AuthController@login');
//     Route::post('signup', 'AuthController@signup');
  
//     Route::group(['middleware' => 'auth:api'], function() {
//         Route::get('logout', 'AuthController@logout');
//         Route::get('user', 'AuthController@user');
//     });
// });