<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//clases que vamos a usar
use Mail;
use Session;
use Redirect;

class MailController extends Controller
{
    public function store(Request $request){    
        //enviamos el email, el nombre 'message' es una 'vista.blade.php' que se le enviara con los datos que el usuario escribio en el formulario de contacto
        // consultar
        Mail::send('message',$request->all(), function($msj){
            //este subject es el mensaje que se ve describiendo que tipo de mensaje es o de quien es
            $msj->subject('Soluciones Informaticas');
            //se le enviara al usuario con este correo, osea al dueño de la pagina, aquien le hacen la consulta
            $msj->to('cristianveizaga11@gmail.com');

        });
        //mandamos un mensaje flash de success, para que el user sepa que su consulta se envio correctamente
        Session::flash('success','Su consulta fue enviada correctamente, en breve lo contactaremos...');
        //y finalmente lo redirigimos ala raiz o a donde quieras, en este caso va a la raiz del project
        return redirect('/');
    }
}
