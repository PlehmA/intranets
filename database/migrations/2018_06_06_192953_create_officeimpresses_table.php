<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficeimpressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officeimpresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_programa');
            $table->string('titulo');
            $table->string('foto_video');
            $table->string('video');
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
        Schema::dropIfExists('officeimpresses');
    }
}
