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

//detalle del pedido
Route::get('/cart/next', 'CartController@orderDetail');

//rutas para el pago con paypal
/*Route::get('paywithpaypal', array(
	'as' => 'paywithpaypal',
	'uses' => 'PaypalController@payWithPaypal',
));
// route for post request
Route::post('paypal', array(
	'as' => 'paypal',
	'uses' => 'PaypalController@postPaymentWithpaypal',
));
// route for check status responce
Route::get('paypal', array(
	'as' => 'status',
	'uses' => 'PaypalController@getPaymentStatus',
));*/

/*pasos para agregar metodo depago via paypal*/
/*
	1- ir a esta pagina para usar el sdk de paypal con laravel 
		https://packagist.org/packages/paypal/rest-api-sdk-php
		con le siguiente comando en nuestra terminal composer require paypal/rest-api-sdk-php lo instalamos
	2- hacemos una actualizacion sudo composer update
	3- dentro de config/,creamos una archivo paypal.php, y pegamos el codigo q este proyecto ya tiene hecho
		tambien deberiamo hacer creado una app en paypal para usar las credenciales client_id y secret
	4- creamos las rutas,  osea estas que estas viendo ahora
	5- creamos un controlador para 'PaypaController' y le metemos todo el codigo que esta ya hecho en este
		proyecto, que la logica es casi lo mismo para todo pago via paypal
	6- creamos las vistas, este ya tendria el boton que diria pagar con paypal, ESO ES TODO
*/
//rutas de paypal
Route::get('payment', array(
	'as' => 'payment',
	'uses' => 'PaypalController@postPayment',
));

Route::get('payment/status', array(
	'as' => 'payment.status',
	'uses' => 'PaypalController@getPaymentStatus',
));

/* 
	ESTO TIENE UN PROBLEMA, TE MUESTRA LOS PRODUCTOS QUE COMPRASTE, EL SUBTOTAL, EL MONTO A PAGAR Y TODO
	.... PERO NO TE DEJA LOGUEARTE Y VER QUE PASA CON LA TRANSACCION, DESPUES DE AHI NO SE SI EL CODIGO
	SE EJECUTA NORMAL O PRESENTA ALGUNON ERRORES, DEBUGUEARLO CUANDO SE PUEDA LOGUEAR
	- DSPUES EL RESTO ESTA BIEN
 */