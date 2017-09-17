<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table='img_temporal';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable=[
        'id','imagen1','imagen2','imagen3','imagen4','imagen5','imagen6','imagen7'
    ];
}
