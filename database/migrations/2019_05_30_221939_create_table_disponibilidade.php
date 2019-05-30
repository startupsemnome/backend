<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDisponibilidade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disponibilidade', function (Blueprint $table) {
            $table->increments('id');
            $table->string('segunda', 3);
            $table->string('terca', 3);
            $table->string('quarta', 3);
            $table->string('quinta', 3);
            $table->string('sexta', 3);
            $table->string('sabado', 3);
            $table->string('domingo', 3);
            $table->integer('resource_id')->nullable()->unsigned();
            $table->foreign('resource_id')->references('id')->on('resource');
            $table->integer('problem_id')->nullable()->unsigned();
            $table->foreign('problem_id')->references('id')->on('problem');   
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
        Schema::dropIfExists('disponibilidade');
    }
}
