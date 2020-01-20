<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('model');
            $table->string('category');
            $table->integer('year');
            $table->string('color');
            $table->string('chassi');
            $table->integer('id_branch')->unsigned();

            $table->foreign('id_branch')->references('id')->on('branch');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car');
    }
}
