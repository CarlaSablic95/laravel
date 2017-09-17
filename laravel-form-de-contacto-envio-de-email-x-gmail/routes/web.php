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
    return view('form-contact');
});

/*
	IMPORTANTE - REQUISITOS PARA EL FORMULARIO DE CONTACTO
	1-crear nuestro respectivo formualario de contacto
	2-crear la ruta para el formulario
	3-crea el controlador(MailController) para el envio del email y copiar lo que esta en ese controlador
	4-en el archivo config/mail.php modificar los datos que ves en ese archivo
	5-modificar el archivo .env por esto
	MAIL_DRIVER=smtp
	MAIL_HOST=smtp.gmail.com
	MAIL_PORT=465
	MAIL_USERNAME=cristianveizaga11@gmail.com
	MAIL_PASSWORD=developernodejs123
	MAIL_ENCRYPTION=ssl
	para su correcto funcionamiento
	6-crear la vista que se va a mostrar en su correo al dueño, cuando el usuario el envie un email de consulta
	7-eso es todo
*/

//ruta de formulario de contacto
// la ruta debe ser un resource porque sino no funciona
Route::resource('mails','MailController');