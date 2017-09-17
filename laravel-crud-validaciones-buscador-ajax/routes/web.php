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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//data que el usuario puede ver
Route::get('/home', 'HomeController@index');
Route::get('/page','HomeController@paginate');

//admin
Route::get('admin','AdminController@index');
Route::resource('products','AdminController');

//ruta para el buscador
Route::get('/results/{palabra}', 'HomeController@results');