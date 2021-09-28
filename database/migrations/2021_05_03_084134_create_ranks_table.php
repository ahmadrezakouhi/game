<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('first_person')->nullable();
            $table->integer('first_person_time')->nullable();
            $table->string('new_first_person')->nullable();
            $table->integer('new_first_person_time')->nullable();
            $table->string('last_person')->nullable();
            $table->integer('last_person_time')->nullable();
            $table->string('new_last_person')->nullable();
            $table->integer('new_last_person_time')->nullable();
            $table->string('first_person_correct')->nullable();
            $table->string('last_person_correct')->nullable();
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
        Schema::dropIfExists('ranks');
    }
}
