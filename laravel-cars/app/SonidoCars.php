<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SonidoCars extends Model
{
    protected $table='detalle_sonido';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable=[
        'id','am_fm','bluetooth','caja_cd','cargador_cd','cd','comando_satelital_stereo','dvd','entrada_auxiliar','entrada_usb','mp3','pasacasete','tarjeta_sd','id_autos'
    ];
}
