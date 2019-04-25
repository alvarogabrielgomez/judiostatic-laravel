<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('/');


Route::resource('pokemons', 'PokemonController');
Route::resource('trainers', 'TrainerController');
Route::resource('deals', 'DealsController');
Route::resource('modalwindow', 'ModalwindowController');

Route::post('/dealsubmit', 'DealsController@dealsubmit');
Route::post('/dealsubmituser', 'DealsController@dealsubmituser');

Route::get('carousel', 'DealsController@carousel');
Route::get('/home', function () {
    return view('welcome');
})->name('home');
Route::get('deals', 'DealsController@index');

Route::get('modalwindow', 'ModalwindowController@index');
Route::get('modalwindow/deals/{id}', 'ModalwindowController@show');
Route::get('/settings', 'SettingsController@index')->name('settings');



