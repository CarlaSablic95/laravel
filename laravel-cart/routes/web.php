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

Route::bind('id',function($id){
	return App\Product::where('id', $id)->first();
});

//listado de los productos a comprar
Route::get('/home', 'HomeController@index')->name('home');
//detalles del producto
Route::get('/details/{idProduct}', 'HomeController@details');

//vista del carrito de compras con los productos que se añadieron al carrito
Route::get('/cart/show', 'CartController@index');
//agrego el producto elegido al carrito
Route::get('/cart/add/{id}', 'CartController@add');
//elimino un producto agregado
Route::get('/cart/remove/{id}','CartController@remove');
//edito la cantidad que quiero para cierto producto
Route::get('/cart/edit/{id}/{quantity}','CartController@edit');
//vacio o limpio todo mi carrito
Route::get('/cart/clean','CartController@clean');