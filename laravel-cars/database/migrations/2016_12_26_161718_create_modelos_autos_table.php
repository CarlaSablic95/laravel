<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelosAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos_autos',function (Blueprint $table){
            $table->increments('id');
            $table->string('modelo_auto');
            $table->integer('id_marca_auto')->unsigned();
            $table->foreign('id_marca_auto')->references('id')->on('marcas_autos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('modelos_autos');
    }
}
