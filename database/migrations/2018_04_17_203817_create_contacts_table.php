<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario');
            $table->string('nomyap');
            $table->string('correo');
            $table->string('direccion');
            $table->string('provincia');
            $table->string('partido');
            $table->string('localidad');
            $table->string('tellinea');
            $table->string('telcel');
            $table->string('interno');
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
        Schema::dropIfExists('contacts');
    }
}
