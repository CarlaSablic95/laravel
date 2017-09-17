<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleConfortTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_confort',function (Blueprint $table){
            $table->increments('id');
            $table->string('aire_acondicionado')->nullable();
            $table->string('alarma_luces_encendidas')->nullable();
            $table->string('apertura_remota_baul')->nullable();
            $table->string('asiento_conductor_regulable_altura')->nullable();
            $table->string('asiento_trasero_rebatible')->nullable();
            $table->string('asientos_electronicos')->nullable();
            $table->string('cierre_centralizado_puertas')->nullable();
            $table->string('climatizador_automatico')->nullable();
            $table->string('computadora_abordo')->nullable();
            $table->string('control_velocidad_crucero')->nullable();
            $table->string('cristales_electricos')->nullable();
            $table->string('espejos_electricos')->nullable();
            $table->string('faros_regulables_interior')->nullable();
            $table->string('gps')->nullable();
            $table->string('sensor_estacionamiento')->nullable();
            $table->string('sensor_lluvia')->nullable();
            $table->string('sensor_luz')->nullable();
            $table->string('tapizado_cuero')->nullable();
            $table->string('techo_corrediso')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
