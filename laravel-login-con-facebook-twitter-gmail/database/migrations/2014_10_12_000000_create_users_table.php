<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            //$table->string('email')->unique();
            //lo comentamos por que si el usuario se loguea con alguna red social, y este esta registrado con 
            //una misma cuenta en todas sus redes, vamos a tener un problema ya que le estamos diciendo que el 
            //email va a ser unico e irrepetible, si nuestra app tiene login con socialite es mejor
            //permitir que no sea unico o bien crear otra tabla para 'socialite'
            $table->string('email');
            //$table->string('password');
            //lo seteo en nullable para decirle q este campo puede ser nulo(vacio) ya q las redes sociales no 
            //nos proveen esa data del user
            $table->string('password')->nullable();
            $table->string('provider_id');
            $table->string('provider');
            $table->string('avatar');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
