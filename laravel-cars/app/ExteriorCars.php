<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExteriorCars extends Model
{
    protected $table='detalle_exterior';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable=[
        'id','limpia_lava_luneta','llantas_aleacion','paragolpes_pintados','vidrios_polarizados','id_autos'
    ];
}
