<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleExteriorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_exterior',function (Blueprint $table){
            $table->increments('id');
            $table->string('limpia_lava_luneta')->nullable();
            $table->string('llantas_aleacion')->nullable();
            $table->string('paragolpes_pintados')->nullable();
            $table->string('vidrios_polarizados')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detalle_exterior');
    }
}
