<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('detalle_autos',function (Blueprint $table){
            $table->increments('id');
            $table->integer('id_seguridad')->unsigned();
            $table->foreign('id_seguridad')->references('id')->on('detalle_seguridad')->onDelete('cascade');
            $table->integer('id_confort')->unsigned();
            $table->foreign('id_confort')->references('id')->on('detalle_confort')->onDelete('cascade');
            $table->integer('id_sonido')->unsigned();
            $table->foreign('id_sonido')->references('id')->on('detalle_sonido')->onDelete('cascade');
            $table->integer('id_exterior')->unsigned();
            $table->foreign('id_exterior')->references('id')->on('detalle_exterior')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detalle_autos');
    }
}
