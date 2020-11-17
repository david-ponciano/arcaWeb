<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HistorialMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cliente')->unsigned();
            $table->integer('id_mascota')->unsigned();
            $table->integer('id_servicio')->unsigned();
            $table->integer('id_estado')->unsigned();
            $table->date('fechaSer');
            $table->string('motivo',2505);
            $table->string('problema',250);
            $table->string('diagnostico',65);
            $table->timestamps();

            $table->foreign('id_cliente')->references('id')->on('users')->onDelete('restrict');

            $table->foreign('id_mascota')->references('id')->on('mascota')->onDelete('restrict');

            $table->foreign('id_servicio')->references('id')->on('servicio')->onDelete('restrict');

            $table->foreign('id_estado')->references('id')->on('estado')->onDelete('restrict');
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
