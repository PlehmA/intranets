<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('columnas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario');
            $table->integer('id_agenda');
            $table->string('nombre_agenda');
            $table->string('nomyap')->nullable();
            $table->string('correo')->nullable();
            $table->string('direccion')->nullable();
            $table->string('provincia')->nullable();
            $table->string('partido')->nullable();
            $table->string('localidad')->nullable();
            $table->string('tellinea')->nullable();
            $table->string('telcel')->nullable();
            $table->string('interno')->nullable();
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
        Schema::dropIfExists('columnas');
    }
}
