<?php

use Laravel\Passport\Passport;
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

Route::resource('/deals', 'DealsController');
Route::resource('modalwindow', 'ModalwindowController');
Route::post('/dealsubmit', 'DealsController@dealsubmit');
Route::post('/dealsubmituser', 'DealsController@dealsubmituser');
Route::post('/inserttrans', 'DealsController@insertTransaction');
Route::get('carousel', 'DealsController@carousel');

Route::get('/deals', 'DealsController@index')->name('deals');
Route::get('modalwindow', 'ModalwindowController@index');
Route::get('modalwindow/deals/{id}', 'ModalwindowController@show');
Route::get('/settings', 'SettingsController@index')->name('settings');
Route::get('/home', 'HomeController@index')->name('home');


