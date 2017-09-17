<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeguridadCars extends Model
{
    protected $table='detalle_seguridad';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable=[
        'id','airbag_conductor','airbag_cortina','airbag_laterales','alarma','apoya_cabeza','blindado','control_estabilidad','control_traccion','doble_traccion','faros_delanteros','faros_traseros','faros_xenon','frenos_abs','inmobilizador_motor','isofix','repartidor_electronico','tercer_stop','id_autos'
    ];
}
