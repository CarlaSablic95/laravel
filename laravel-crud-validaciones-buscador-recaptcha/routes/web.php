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
Route::get('/admin', 'Product\ProductController@index');

//buscador
Route::get('/results', 'Product\ProductController@search');

//crud productos
Route::resource('products', 'Product\ProductController');

//le deniego el acceso a categorias xq es info. q solo el admin puede ver
//ahile digo q este grupo de middleware pertenecea l grupo 'admin'
//y engrupas todas las rutas que quieras...
Route::group(['middleware' => ['admin']], function () {
	Route::resource('categories', 'Category\CategoryController');
});