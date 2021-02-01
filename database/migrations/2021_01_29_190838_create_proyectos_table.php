<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('comuna');
            $table->string('ciudad');
            $table->longtext('descripcion');
            $table->integer('habitaciones');
            $table->integer('metros_cuadrados_terreno');
            $table->integer('piscina');
            $table->integer('jacuzzi');
            $table->integer('estacionamientos');
            $table->string('img_previsualizacion');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('proyectos');
    }
}
