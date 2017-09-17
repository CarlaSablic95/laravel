<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos',function (Blueprint $table){
            $table->increments('id');
            $table->string('titulo');
            $table->longText('descripcion');
            $table->string('provincia');
            $table->integer('telefono');
            $table->integer('anio');
            $table->integer('puertas');
            $table->string('combustible');
            $table->integer('km');
            $table->string('color');
            $table->string('direccion');
            $table->string('transmision');
            $table->string('duenio');
            $table->string('version');
            $table->integer('precio');
            $table->integer('id_marcas_autos');
            $table->integer('id_img')->unsigned();
            $table->foreign('id_img')->references('id')->on('img_autos')->onDelete('cascade');
            $table->integer('id_detalle')->unsigned();
            $table->foreign('id_detalle')->references('id')->on('detalle_autos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('autos');
    }
}
