<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarsImagen extends Model
{
    protected $table='img_autos';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable=[
        'id','imagen1','imagen2','imagen3','imagen4','imagen5','imagen6','imagen7','id_autos'
    ];
}
