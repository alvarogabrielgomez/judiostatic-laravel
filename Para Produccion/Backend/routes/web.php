<?php
use judiostatic\Post;
use judiostatic\Buss;

use Laravel\Passport\Passport;
use Illuminate\Http\Request;
use GrahamCampbell\Markdown\Facades\Markdown;
use function GuzzleHttp\json_decode;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rutas laravel predefinidas de PASSPORT
Auth::routes();

// Locale
Route::get('/lang/{locale}', 'MainController@changeLang');
Route::get('/lang/{locale}/{next}', 'MainController@changeLang');
Route::get('/lang/{locale}/{next}/{id}', 'MainController@changeLang');
Route::get('/lang', function(Request $request){
    $locale = App::getLocale();
    return $locale;
});
Route::get(config('laravel-localization.routes.prefix'), function(){

    $strings = ExportLocalization::export()->toArray();
    return response()->json($strings);

})->name('assets.lang')->middleware(config('laravel.localization.routes.middleware'));

// Gets Direcciones Normales

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('deals', 'DealsController');
Route::get('/deals', 'DealsController@index')->name('deals');
Route::get('/deals/{id}', 'DealsController@show')->name('deals');
Route::get('/', 'MainController@index');
Route::get('/documents/{lang}/{document}', function(Request $request){
    $document = $request->document;
    $lenguaje = $request->lang;
    $titulodocumento ='';
    
    if($document == 'privacy-policy'){
        $titulodocumento = 'Privacy';
    }
    else if($document == 'terms'){
        $titulodocumento = 'Terms';
    }

    $path = public_path("\documents\\".$lenguaje."\\".$document.".txt");

    if(!file_exists ($path)){
        abort(404);
    }
    else if(file_exists ($path)){
        
    $documentOpenin = fopen($path, "r") or die("404");
    $documentRead = fread($documentOpenin, filesize($path));
    fclose($documentOpenin);  
            
            $documentRead = [
                'document' => Markdown::convertToHtml($documentRead),
                'lenguaje' => strtoupper($lenguaje),
                'titulo' => $titulodocumento
            ];
            return view('documents.doc', compact('documentRead'));
   }



});
Route::get('/settings', 'SettingsController@index')->name('settings');

// Gets direcciones de partials
Route::get('/carousel', 'DealsController@carousel')->name('carousel');

// Herramientas para login y tokens publicos
Route::get('/refreshCsrfToken', 'AuthController@refreshCsrfToken')->name('refreshCsrfToken');
Route::post('/checkuser', 'DealsController@checkuser')->name('checkuser');
Route::post('/dealsubmituser', 'DealsController@dealsubmituser')->name('dealsubmituser');
Route::post('/registering', 'Auth\RegisterController@register');
Route::post('/registerStateless', 'Auth\RegisterController@registerStateless');
Route::post('/newPwd', 'Auth\ForgotPasswordController@newPwd');

// Callbacks Socialite
Route::get('/login/github', 'Auth\LoginController@redirectToProvider');
Route::get('/login/github/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/login/google', 'Auth\LoginController@redirectToProvider');
Route::get('/login/google/callback', 'Auth\LoginController@handleProviderCallback');

// Tools Publicas
Route::get('tools/qrcode', 'ToolsController@qrcode')->name('qrcode');
Route::post('/enviaremail', 'DealsController@enviaremail')->name('enviaremail');

// Herramientas API PUBLICAS
Route::get('/v1/getTokenApi', function(Request $request){
    $request->request->add([
        'grant_type' => 'password',
        'client_id' => config('services.passportApi.client_id'),
        'client_secret' => config('services.passportApi.client_secret'),
        'password' => $request->password,
        //'name' => 'api',
        'email' => $request->email,
        'scope' => ['user-data', 'manage-coupons']
    ]);

    $tokenRequest = Request::create(
        config('services.passportApi.login_endpoint'), // endpoint/oauth/token
        'post'
    );
    $response = Route::dispatch($tokenRequest);

    return $response;
});