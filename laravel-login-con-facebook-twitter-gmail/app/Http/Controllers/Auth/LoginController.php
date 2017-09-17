<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

//copiar este codigo para hacer uso de socialite
use Auth;
//use Laravel\Socialite\Facades\Socialite;
use Socialite;
use App\User;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

     ///////////////////////////////////////////////////
    // otra forma mas corta de login con redes sociales
    ///////////////////////////////////////////////////

    public function redirectToProvider($provider)
    {
        // metodo encargado de redireccionar al usuario a facebook
        return Socialite::driver($provider)->redirect();
    }

    // Metodo encargado de obtener la información del usuario
    public function handleProviderCallback($provider)
    {
        try{
            //obtenemos los datos del usuario
            $socialUser = Socialite::driver($provider)->user();
            //dd($socialUser);
        }catch (Exception $e){
            return redirect('auth/'.$provider);
        }
        
        //verifico que el email no sea null para un correcto guardado de sus datos en nuestra DB
        if(is_null($socialUser->getEmail())){
            //dd($socialUser->getEmail()); //null
            Session::flash('errorSocial','Es imposible obtener tu email, no se encuentra verificado por facebook');
            return redirect('/login');
        }else{
            //guardamos los datos que recibimos y se lo pasamos como parametro a otro metodo que se encarga
            //de guardar los datos en la DB
            $authUser = $this->findOrCreateUser($socialUser, $provider);
            //esa misma data se lo pasamos a este metodo de laravel q hace que se loguee el usuario y tenga acceso a la app
            Auth::login($authUser, true);
            return redirect('/login');
        }
    }

    public function findOrCreateUser($socialUser, $provider)
    {
        //me busca en la DB si el provider_id en la DB ya existe, ya no se crea el mismo usuario
        //lo retornamos, y entra aqui 'Auth::login($authUser, true);' y se loguea normal
        $authUser = User::where('provider_id', $socialUser->id)->first();

        if ($authUser) {
            return $authUser;
        }

        //si esa comparacion es false, entonces nos crea el user con sus respectivos datos q pedimos
        return User::create([
            'name' => $socialUser->getName(),
            'email' => $socialUser->getEmail(),
            //'email' => $socialUser->email, igual no captura el email en facebook
            'provider_id' => $socialUser->getId(),
            'provider'=> $provider,
            'avatar' => $socialUser->getAvatar()
        ]);
        
    }
    /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////


    /*################################################################################
    ######################      autenticacion con facebook    ########################
    ################################################################################*/

    // public function redirectToProviderFacebook()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }

    // public function handleProviderCallbackFacebook()
    // {
    //     try{
    //         $user = Socialite::driver('facebook')->user();
    //     }catch(Exception $e){
    //         return redirect('auth/facebook');
    //     }

    //     $authUser = $this->findOrCreateUserFacebook($user);
    //     Auth::login($authUser, true);
    //     return redirect('/login');
    // }

    // public function findOrCreateUserFacebook($facebookUser)
    // {
    //     $authUser = User::where('provider_id', $facebookUser->id)->first();
    //     if ($authUser) {
    //         return $authUser;
    //     }
    //     return User::create([
    //         'name'=>$facebookUser->getName(),
    //         'email'=>$facebookUser->getEmail(),
    //         'provider_id'=>$facebookUser->getId(),
    //         'avatar'=>$facebookUser->getAvatar(),
    //     ]);

    // }

    /*##########################################################################################
    #######################        autenticacion con gmail         #############################
    ##########################################################################################*/

    // public function redirectToProviderGoogle()
    // {
    //     return Socialite::driver('google')->redirect();
    // }

    // public function handleProviderCallbackGoogle()
    // {
    //     try{
    //         $user = Socialite::driver('google')->user();
    //     }catch(Exception $e){
    //         return redirect('auth/google');
    //     }

    //     $authUser = $this->findOrCreateUserGoogle($user);
    //     Auth::login($authUser, true);
    //     return redirect('/login');
    // }

    // public function findOrCreateUserGoogle($gmailUser)
    // {
    //     $authUser = User::where('provider_id', $gmailUser->id)->first();
    //     if ($authUser) {
    //         return $authUser;
    //     }
    //     return User::create([
    //         'name'=>$gmailUser->name,
    //         'email'=>$gmailUser->email,
    //         'provider_id'=>$gmailUser->id,
    //         'avatar'=>$gmailUser->avatar,
    //     ]);

    // }

    /*#############################################################################################
    #############################          autenticacion con twitter           ####################
    #############################################################################################*/

    // public function redirectToProviderTwitter()
    // {
    //     return Socialite::driver('twitter')->redirect();
    // }

    // public function handleProviderCallbackTwitter()
    // {
    //     try{
    //         $user = Socialite::driver('twitter')->user();
    //     }catch(Exception $e){
    //         return redirect('auth/twitter');
    //     }

    //     $authUser = $this->findOrCreateUserTwitter($user);
    //     Auth::login($authUser, true);
    //     return redirect('/login');
    // }

    // public function findOrCreateUserTwitter($twitterUser)
    // {
    //     $authUser = User::where('provider_id', $twitterUser->id)->first();
    //     if ($authUser) {
    //         return $authUser;
    //     }
    //     return User::create([
    //         'name'=>$twitterUser->name,
    //         'email'=>$twitterUser->email,
    //         'provider_id'=>$twitterUser->id,
    //         'avatar'=>$twitterUser->avatar,
    //     ]);

    // }

}
