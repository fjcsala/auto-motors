<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('cpf')->unique();
            $table->string('birth_date');
            $table->string('full_name');
            $table->string('sex');
            $table->string('zip_code');
            $table->string('address');
            $table->integer('number');
            $table->string('complement');
            $table->string('district');
            $table->string('city');
            $table->string('state');
            $table->integer('id_branch')->unsigned();
            $table->string('function');
            $table->double('salary');
            $table->string('password');
            $table->boolean('status')->default(1);
            
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
        Schema::dropIfExists('employee');
    }
}