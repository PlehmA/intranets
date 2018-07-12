<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario');
            $table->string('nombre_nota');
            $table->string('notas', 5000)->nullable();
            $table->timestamps();
            $table->index(['id', 'notas']);
            $table->index(['id', 'nombre_nota']);
            $table->index(['id_usuario', 'notas']);
            $table->index(['id_usuario', 'nombre_nota']);
            $table->index('notas');
            $table->index('nombre_nota');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
