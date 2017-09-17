<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    protected $table='autos';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable=[
        'id','titulo','descripcion','id_provincia','id_ciudad','id_barrio','telefono','anio','puertas','combustible','km','color','direccion','transmision','duenio','version','precio','id_marca','id_modelo'
    ];
}
