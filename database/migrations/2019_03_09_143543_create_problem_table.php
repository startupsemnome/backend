<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemTable extends Migration
{
    /**
     * Tentar colocar todos os campos dos componentes baseando-se no Frontend.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problem', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('empresa_id')->unique()->unsigned();
            $table->foreign('empresa_id')->references('id')->on('company');
            $table->string('solicit', 100)->nullable();
            $table->string('email', 100);
            $table->string('telef', 100);
            $table->string('nprob', 100);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('problem');
    }
}
