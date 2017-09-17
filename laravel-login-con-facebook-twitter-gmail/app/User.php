<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //codigo original
    /*protected $fillable = [
        'name', 'email', 'password',
    ];*/

    //codigo modificado para login con redes sociales
    //le agregamos los campos 'provider_id','provider','avatar' para llenar y traer esos campos de cada usuario
    //registrado con alguna red social, es muy importante esos campos
    protected $fillable = [
        'name','email','password','provider_id','provider','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
