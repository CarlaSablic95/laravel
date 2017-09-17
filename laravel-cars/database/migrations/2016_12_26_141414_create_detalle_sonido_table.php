<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleSonidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_sonido',function (Blueprint $table){
            $table->increments('id');
            $table->string('am_fm')->nullable();
            $table->string('bluetooth')->nullable();
            $table->string('caja_cd')->nullable();
            $table->string('cargador_cd')->nullable();
            $table->string('cd')->nullable();
            $table->string('comando_satelital_stereo')->nullable();
            $table->string('dvd')->nullable();
            $table->string('entrada_auxiliar')->nullable();
            $table->string('entrada_usb')->nullable();
            $table->string('mp3')->nullable();
            $table->string('pasacasete')->nullable();
            $table->string('tarjeta_sd')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detalle_sonido');
    }
}
