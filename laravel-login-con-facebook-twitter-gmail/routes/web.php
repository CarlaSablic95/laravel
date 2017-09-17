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

//ese ->name('home'); le indica que ese nombre esta en el href de 'a' : <a href="{{ route('home') }}"></a>
Route::get('/home', 'HomeController@index')->name('home');


//agrego las rutas para el logueo con redes sociales
//IMPORTANTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
//pasos a seguir
/*
	//muy IMPORTANTE debemos de instalra este paquete via comando: composer require laravel/socialite
	//luego seguir los pasos detallados en la documentacion: https://github.com/laravel/socialite

	1-crear en las vistas los botones con sus respectivas urls para el direccionamiento hacia las rutas
	correctas q estaran en web.php(lugar de rutas web)
	2-crear las rutas en web.php (lugar de rutas)
	3-en el archivo loginController.php pegar el codigo que ya esta preparado en unos de nuestros proyectos
	4-ya deberiamos haber creado las apps de cada uno para hacer uso de las api de cada red social
	5-ne la carpeta config/services.php debemos de poner las credenciales para tener acceso a las apis de 
	cada red que usemos
	6-enla carpeta migrations se encuentra una archivo donde nos muestra como se pueden modificar
	los campos de la base de datos sin perder nuestros datos ya existentes
	x ej. si hacemos un migrate: rollback o refresh estos nos resetean las tablas y perdemos nuestra data
	para esos casos mejor usar esos metodos en la doc de laravel -> la parte de migrations te dice que 
	debes instlar un paquete para que este funcione, igual probar si sin el paquete estos aun funcionan
*/

//rutas para login con redes sociales, a estas rutas le pasamos como parametro el proveedor
//que vendrian aser cualquier tipo de red social, para no tenr q hacer uno para cada unno, como lo detallo mas abajo
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');	
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

//este codigo seria hacer lo mismo que arriba, pero por separado
// Route::get('auth/facebook',['as' => 'auth/facebook','uses' => 'Auth\LoginController@redirectToProviderFacebook']);
// Route::get('auth/facebook/callback', ['as' => 'auth/facebook/callback','uses' => 'Auth\LoginController@handleProviderCallbackFacebook']);

// //autenticacion con gmail
// Route::get('auth/google',['as' => 'auth/google','uses' => 'Auth\LoginController@redirectToProviderGoogle']);
// Route::get('auth/google/callback', ['as' => 'auth/google/callback','uses' => 'Auth\LoginController@handleProviderCallbackGoogle']);

// //autenticacion con twitter
// Route::get('auth/twitter',['as' => 'auth/twitter','uses' => 'Auth\LoginController@redirectToProviderTwitter']);
// Route::get('auth/twitter/callback', ['as' => 'auth/twitter/callback','uses' => 'Auth\LoginController@handleProviderCallbackTwitter']);