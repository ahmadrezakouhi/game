<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('enter');
            $table->timestamp('exit');
            $table->string('resolution');
            $table->string('chooosed(letter)');
            $table->integer('letter(rt)');
            $table->integer('Q1(rt)');
            $table->string('Q1(ans)');
            $table->integer('who_is_first(rt)');
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
        Schema::dropIfExists('data');
    }
}
