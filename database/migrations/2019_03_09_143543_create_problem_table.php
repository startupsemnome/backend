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
            $table->increments('id');
            $table->string('empresa', 100);
            $table->string('solicit', 100);
            $table->string('email', 100);
            $table->string('telef', 100);
            $table->string('nprob', 100);
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
        Schema::dropIfExists('problem');
    }
}
