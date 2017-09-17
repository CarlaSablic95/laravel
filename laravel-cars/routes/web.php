<?php

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

/* mis rutas */
Route::get('verificacion/login','Login\LoginController@index');
Route::get('register/login','Login\LoginController@usuarioRegistrado');
Route::get('publicar/seleccion','Publicar\PublicarController@index');
Route::get('publicar/vehiculo','Publicar\PublicarController@seleccionoVehiculo');
/* listo los modelos en el combo */
Route::get('listar/modelos/{id_marca}','Publicar\PublicarController@listarModelos');
/* envio las marcas y modelos x get mpara guardarlos en una sesion */
Route::get('publicar/vehiculo/{id_marca}/{id_modelo}/datos','Publicar\PublicarController@saveMarcaModelo');

/* subo las imagenes */
Route::post('imagen','Publicar\PublicarController@imagen1');
Route::post('imagen2','Publicar\PublicarController@imagen2');
Route::post('imagen3','Publicar\PublicarController@imagen3');
Route::post('imagen4','Publicar\PublicarController@imagen4');
Route::post('imagen5','Publicar\PublicarController@imagen5');
Route::post('imagen6','Publicar\PublicarController@imagen6');
Route::post('imagen7','Publicar\PublicarController@imagen7');

/* elimino las imagens */
Route::post('dropImagen/{id_image}','Publicar\PublicarController@dropImagen1');
Route::post('dropImagen2/{id_image2}','Publicar\PublicarController@dropImagen2');
Route::post('dropImagen3/{id_image3}','Publicar\PublicarController@dropImagen3');
Route::post('dropImagen4/{id_image4}','Publicar\PublicarController@dropImagen4');
Route::post('dropImagen5/{id_image5}','Publicar\PublicarController@dropImagen5');
Route::post('dropImagen6/{id_image6}','Publicar\PublicarController@dropImagen6');
Route::post('dropImagen7/{id_image7}','Publicar\PublicarController@dropImagen7');

/* departamentos y localidades */
Route::post('getDepartamentos/{id_pro}','Publicar\PublicarController@getDepartamentos');
Route::post('getLocalidades/{id_dep}','Publicar\PublicarController@getLocalidades');

/* guardamos todos los datos del auto en sesiones*/
Route::resource('confirmacion','Publicar\PublicarController');
Route::get('publicar/vehiculo/confirmacion','Publicar\PublicarController@registroYconfirmacion');

/* inserto los datos que antes estaban en sesiones al abase de datos, proceso final */
Route::resource('saveCars','Publicar\ConfirmacionController');
Route::get('publicado','Publicar\ConfirmacionController@publicado');

/* ################################################## */
/* panel de autos principal, nuevos y usados */
/* ################################################## */
//panel principal de los autos
Route::get('autos','Auto\AutoController@index');
//seleccion de la marca
Route::get('selected','Auto\MarcaController@selectedMarca');
//seleccion de l modelo una ves seleccionada la marca
Route::get('selected/modelo','Auto\ModeloController@selectedModelo');
//seleccion del año
Route::get('year','Auto\YearController@year');

//vista del auto
Route::get('autos/{id}/{nombre?}','Auto\VistaController@vistaDelAuto');
// traigo el nuemro por ajax
Route::get('telefono/{id}/{titulo?}','Auto\VistaController@telefono');