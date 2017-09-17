<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    /*
        
    Renombrar la tabla
    Schema::rename(‘profiles’, 'nombre_nuevo');

    Eliminar la tabla
    Schema::drop(‘profiles’);

    Agregar nuevos campos o columnas
    Schema::table(‘profiles’, function ($table) {
       $table->string(‘address');
    });

    Si estamos usando MySQL podemos agregar la columna después de una en específico, es decir:
    Schema::table('profiles', function ($table) {
       $table->string(‘address')->after(‘phone’);
    });

    Cambiar el tipo o los atributos de una columna
    Schema::table('profiles', function ($table) {
       $table->string('comments', 100)->change();
    });

    Renombrar a una columna
    Schema::table('profiles', function ($table) {
       $table->renameColumn('nombre_anterior', 'nombre_nuevo');
    });

    Eliminar una columna
    Schema::table('profiles', function ($table) {
       $table->dropColumn(‘phone’);
    });

    Agregar una llave foranea
    Schema::table('posts', function ($table) {
       $table->integer('user_id')->unsigned();
       $table->foreign('user_id')->references('id')->on('users');
    });

    Eliminar una llave foranea
    $table->dropForeign('posts_user_id_foreign');
    En este caso se concatena el nombre de la tabla a modificar, más el nombre de la columna y por último la cadena “_foreign”


    Ejemplo de uso
    Para nuestro caso vamos a hacer algunos cambios en nuestra tabla profiles: renombrar la columna contact a contact_person, agregar la columna website y address y eliminar la columna comments, creando en un solo archivo de migración:
    php artisan make:migration alter_profiles_table --table=profiles

    Este comando crea un nuevo archivo que contiene los métodos up y down vacíos para nosotros agregar los cambios a realizar. Nuestro método up quedaría así:
    public function up()
        {
            Schema::table('profiles', function (Blueprint $table) {
                $table->renameColumn('contact', 'contact_person');
                $table->string('address')->after('phone');
                $table->string('website', 100)->after('address');
                $table->dropColumn('comments');
            });
        }

    y el método down debería revertir las operaciones realizadas con el método up; esto para cuando se haga migrate:rollback se puedan deshacer dichas operaciones, por tanto nuestro método down queda de esta manera:
    public function down()
        {
            Schema::table('profiles', function (Blueprint $table) {
                $table->renameColumn('contact_person', 'contact');
                $table->dropColumn('address');
                $table->dropColumn('website');
                $table->string('comments')->nullable()->after('phone');
            });
        }

    Al ejecutar por consola:
    php artisan migrate, deberia estar listo
    NOTA!!! importante, debo modificar el tiempo de creacion del archivo o bien crear otro pero no puedo
    simplemente modificar los campo y hacer un php artisan migrate para hacer los cambios

    */

    public function up()
    {
        Schema::table('users', function(Blueprint $table){
            //modifico el campo email para que hacepte campos vacios o nulos
            $table->string('email')->nullable()->change();
            //este me agrega elcampo username despues de name
            //$table->string('username')->after('name');
            //este elimina la columna username
            //$table->dropColumn('username');
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
