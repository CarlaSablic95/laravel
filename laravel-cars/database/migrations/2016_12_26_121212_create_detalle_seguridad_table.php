<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleSeguridadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_seguridad',function (Blueprint $table){
            $table->increments('id');
            $table->string('airbag_conductor')->nullable();
            $table->string('airbag_cortina')->nullable();
            $table->string('airbag_laterales')->nullable();
            $table->string('alarma')->nullable();
            $table->string('apoya_cabeza')->nullable();
            $table->string('blindado')->nullable();
            $table->string('control_estabilidad')->nullable();
            $table->string('control_traccion')->nullable();
            $table->string('doble_traccion')->nullable();
            $table->string('faros_delanteros')->nullable();
            $table->string('faros_traseros')->nullable();
            $table->string('faros_xenon')->nullable();
            $table->string('frenos_abs')->nullable();
            $table->string('inmobilizador_motor')->nullable();
            $table->string('isofix')->nullable();
            $table->string('repartidor_electronico')->nullable();
            $table->string('tercer_stop')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detalle_seguridad');
    }
}
