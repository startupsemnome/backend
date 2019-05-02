<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->increments('id');
            $table->string('empresa',100);
            $table->string('cnpj',20);
            $table->string('telefone',15);
            $table->string('email',100);
            $table->string('estado',100);
            $table->string('cidade',100);
            $table->string('bairro',100);
            $table->string('rua',100);
            $table->string('numero',100);
            $table->string('messagem',100);
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
        Schema::dropIfExists('company');
    }
}
