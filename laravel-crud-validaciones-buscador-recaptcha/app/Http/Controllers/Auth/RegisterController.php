<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

//debemos de llamar a GuzzleHttp\Client en todo archivo que queramos validar el recaptcha del lado del servidor
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    //validacion original
    /*protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }*/

    //validacion
    protected function validator(array $data)
    {
        $reglasOriginales = array(
            'name' => 'required|max:16|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'g-recaptcha-response' => 'required'
        );
        
        $mensajesPersonalizados = array(
            'name.required' => 'El campo nombre es obligatorio',
            'name.unique' => 'El nombre ingresado ya se encuentra en uso',
            'name.max' => 'El campo nombre debe contener 20 caracteres como máximo',
            'g-recaptcha-response.required' => 'El reCAPTCHA es obligatorio'
        );
        return Validator::make($data, $reglasOriginales, $mensajesPersonalizados);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    //codigo original
    /*protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }*/

    //codigo modificado para agregar el campo de rol y saber hacia donde dirigir al user
    protected function create(array $data)
    {
        //para hacer la validacion del recapthca de lado de server debo antes capturar el campo
        //de nombre lo llamo $token, xq este nos devulve precisamente un token
        $token = $data['g-recaptcha-response'];

        //si el token existe entonces entra y es verificado por google recaptcha
        if($token){

            $client = new Client();
            $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
                'form_params' => array(
                    'secret' => '6LfKGxIUAAAAAN4QRM51EZqAFX_M_czZKzR4pqBE',
                    'response' => $token
                )
            ]);
            //nos devuelve el resultado en formato json
            $result = json_decode($response->getBody()->getContents());

            //esto nos devolvera true o false, xq su propiedad 'success' nos devuelve true o false
            if($result->success){
                //lo devugueaos antes si nos da true
                //dd($result);
                $user = new User([
                    //ucwords comvierte a mayusculas la primera palabra, podriamo hacerlo desde css tambien
                    'name' => ucwords($data['name']),
                    'email' => $data['email'],
                    'password' => bcrypt($data['password'])
                ]);

                //este no necesitamos por ahora, es para hacer urls amigables
                //$user->name_slug = str_slug($data['name']);
                $user->role = 'user';
                //$user->activo = 1;
                $user->save();
                return $user;

            }/*else{
                //con este tambienpasa lo mismo, xreso lo comento
                //si entra aca es porque $result->success nos devolvio FALSE
                //dd($result);
                //este tiene diferentes tipos de errores
                //$result->error_codes;
                return redirect('register');
            }*/

        }
        /*else{
            //si activamos este bloque else, este nos tira un error, pero lo dejo comentado por que ya
            //tiene una validacion del lado del cliente y del servidor, es casi improblable que entre en
            //este bloque de error y pare la aplicacion
            //dd($token);
            //return redirect('register');
        }*/

    }

    //aqui verifico que tipo de usuario es y lo mando a su destino
    public function redirectPath()
    {
        if (auth()->check() && auth()->user()->role == 'user') {
            //una ves registrado lo mandamos a home, si antes cumple dicha condicion
            return 'home';
        }
        return 'admin';
    }


}
