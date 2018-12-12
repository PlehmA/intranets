<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('issue');
            $table->string('message');
            $table->unsignedInteger('state_id');
            $table->unsignedInteger('support_id');
            $table->foreign('support_id')->references('id')->on('users');
            $table->string('support_name');
            $table->unsignedInteger('priority_id');
            $table->string('user_email');
            $table->timestamps();
            $table->index(['id', 'created_at']);
            $table->index(['user_id', 'user_name']);
            $table->index(['support_id', 'support_name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
