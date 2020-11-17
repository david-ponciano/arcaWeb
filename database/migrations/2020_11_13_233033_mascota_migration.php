<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MascotaMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascota', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',65);
            $table->date('fechaNac');
            $table->integer('id_cliente')->unsigned();
            $table->integer('id_especie')->unsigned();
            $table->integer('id_raza')->unsigned();
            $table->integer('id_sexo')->unsigned();
            $table->binary('img')->nullable();
            $table->timestamps();

            $table->foreign('id_cliente')->references('id')->on('users')->onDelete('restrict');

            $table->foreign('id_especie')->references('id')->on('especie')->onDelete('restrict');

            $table->foreign('id_raza')->references('id')->on('raza')->onDelete('restrict');

            $table->foreign('id_sexo')->references('id')->on('sexo')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mascota');
    }
}
