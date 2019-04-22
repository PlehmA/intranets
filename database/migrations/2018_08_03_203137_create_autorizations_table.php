<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutorizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autorizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_usuario');
            $table->integer('user_id');
            $table->string('cuil');
            $table->integer('legajo');
            $table->string('tipo_autorizacion');
            $table->integer('autorizacion_id');
            $table->integer('rol_usuario');
            $table->string('sector');
            $table->integer('tipo_rol')->nullable();
            $table->string('materia')->nullable();
            $table->date('fecha_de');
            $table->date('fecha_hasta');
            $table->string('motivo')->nullable();
            $table->string('calle')->nullable();
            $table->integer('numero')->nullable();
            $table->integer('piso')->nullable();
            $table->string('depto')->nullable();
            $table->integer('cod_postal')->nullable();
            $table->string('entrecalles')->nullable();
            $table->string('localidad')->nullable();
            $table->string('provincia')->nullable();
            $table->bigInteger('telefono')->nullable();
            $table->boolean('estado_jefe')->nullable();
            $table->boolean('estado_rrhh')->nullable();
            $table->dateTime('fecha_creacion');
            $table->dateTime('hora_de')->nullable();
            $table->dateTime('hora_hasta')->nullable();
            $table->integer('tipo_ro')->nullable();
            $table->bigInteger('dias_count')->nullable();
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
        Schema::dropIfExists('autorizations');
    }
}
