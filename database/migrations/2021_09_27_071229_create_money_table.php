<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('money', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('verbal')->nullable();
            $table->integer('verbal_time')->nullable();
            $table->integer('new_verbal')->nullable();
            $table->integer('new_verbal_time')->nullable();
            $table->integer('practical')->nullable();
            $table->integer('practical_time')->nullable();
            $table->integer('new_practical')->nullable();
            $table->integer('new_practical_time')->nullable();
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
        Schema::dropIfExists('money');
    }
}
