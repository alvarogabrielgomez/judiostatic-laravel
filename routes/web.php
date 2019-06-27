<?php

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


Auth::routes();

Route::get('/', 'MainController@index')->name('/');

// Route::group(['middleware' => 'cors'], function(){
//     Passport::routes();
// });

Route::resource('deals', 'DealsController');
Route::resource('modalwindow', 'ModalwindowController');
Route::resource('documents', 'DocumentsController');

Route::post('/enviaremail', 'DealsController@enviaremail')->name('enviaremail');

Route::post('/dealsubmituser', 'DealsController@dealsubmituser')->name('dealsubmituser');

Route::get('/carousel', 'DealsController@carousel')->name('carousel');

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

Route::get('/deals', 'DealsController@index')->name('deals');
Route::get('/modalwindow', 'ModalwindowController@index')->name('modalwindow');
Route::get('/modalwindow/deals/{id}', 'ModalwindowController@show');
Route::get('/settings', 'SettingsController@index')->name('settings');
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/checkuser', 'DealsController@checkuser')->name('checkuser');


Route::get('/refreshCsrfToken', 'AuthController@refreshCsrfToken')->name('refreshCsrfToken');

/////

Route::get('/login/github', 'Auth\LoginController@redirectToProvider');
Route::get('/login/github/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/login/google', 'Auth\LoginController@redirectToProvider');
Route::get('/login/google/callback', 'Auth\LoginController@handleProviderCallback');
