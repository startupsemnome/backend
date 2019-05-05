<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
            $table->string('sobrenome', 100);
            $table->string('email', 100);
            $table->string('endereco', 100);
            $table->string('telefone', 100);
            $table->string('celular', 100);
            $table->string('cidade', 100);
            $table->string('estado', 100);
            $table->boolean('accept_project')->default(false);
            $table->string('formacao', 100);
            $table->string('habilidades', 100);
            $table->string('area_interesse', 100);
            $table->string('message1', 100);
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
        Schema::dropIfExists('resource');
    }
}
