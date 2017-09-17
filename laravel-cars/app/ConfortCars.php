<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfortCars extends Model
{
    protected $table='detalle_confort';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable=[
        'id','aire_acondicionado','alarma_luces_encendidas','apertura_remota_baul','asiento_conductor_regulable_altura','asiento_trasero_rebatible','asientos_electronicos','cierre_centralizado_puertas','climatizador_automatico','computadora_abordo','control_velocidad_crucero','cristales_electricos','espejos_electricos','faros_regulables_interior','gps','sensor_estacionamiento','sensor_lluvia','sensor_luz','tapizado_cuero','id_autos'
    ];
}
