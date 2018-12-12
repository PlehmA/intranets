<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friends', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->integer('amigo_de');
            $table->string('name');
            $table->string('username');
            $table->integer('rol_usuario');
            $table->integer('tipo_rol')->nullable();
            $table->integer('num_legajo');
            $table->date('fecha_ingreso');
            $table->date('fecha_nacimiento')->nullable();
            $table->string('puesto');
            $table->string('email')->nullable();
            $table->string('email_personal')->nullable();
            $table->string('contra_mail')->nullable();
            $table->ipAddress('ip_maquina')->nullable();
            $table->string('foto')->default('storage/user_default.png');
            $table->integer('interno')->nullable();
            $table->string('telefono_particular')->nullable();
            $table->string('telefono_celular')->nullable();
            $table->string('estado')->nullable();
            $table->string('password')->default('secret');
            $table->text('ult_mensaje')->nullable();
            $table->integer('from')->nullable();
            $table->integer('to')->nullable();
            $table->datetime('hora_msj')->nullable();
            $table->string('cuil')->nullable();
            $table->boolean('terminos')->default(false);
            $table->timestamps();
            $table->index(['id', 'created_at']);
            $table->index(['id_user', 'username']);
            $table->index(['name', 'num_legajo']);
            $table->index(['id_user', 'amigo_de']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friends');
    }
}
