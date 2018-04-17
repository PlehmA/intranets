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
            $table->string('username')->unique();
            $table->string('rol_usuario');
            $table->integer('num_legajo');
            $table->date('fecha_ingreso');
            $table->date('fecha_nacimiento');
            $table->string('puesto');
            $table->string('email');
            $table->string('email_personal')->nullable();
            $table->string('contra_mail');
            $table->ipAddress('ip_maquina');
            $table->string('foto');
            $table->integer('interno')->nullable();
            $table->string('telefono_particular')->nullable();
            $table->string('telefono_celular')->nullable();
            $table->string('estado')->nullable();
            $table->string('password');
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
