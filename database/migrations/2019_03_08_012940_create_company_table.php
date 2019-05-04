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
            $table->string('razaoSocial',100);
            $table->string('nomeFantasia',100);
            $table->int('cnpj',15);
            $table->int('cep',8);
            $table->string('rua',100);
            $table->int('numero',100);
            $table->string('bairro',100);
            $table->string('cidade',100);
            $table->string('uf',2);
            $table->string('pais',100);
            $table->string('nomeRepresentante',100);
            $table->int('telefoneRepresentante',15);
            $table->int('celularRepresentante',15);
            $table->string('emailRepresentante',100);
            $table->string('departamento',100);
            $table->string('segmentoEmpresa',100);
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
