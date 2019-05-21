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
            $table->string('nome', 50)->nullable();
            $table->string('sobrenome', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('senha', 50)->nullable();

            //DADOS PESSOAIS
            $table->string('fotoperfil', 50)->nullable();
            $table->string('dt_nascimento', 50)->nullable();
            $table->string('genero', 50);
            $table->string('estado_civil', 50);
            $table->string('nacionalidade', 50)->nullable();
            $table->string('uf', 50);
            $table->string('cidade', 50);
            $table->string('disponibilidade', 50);
            $table->string('resumo_profissional', 500);
            $table->string('categoria', 500);

            //EXPERIENCIA PROFISSIONAL
            $table->string('empresa', 100);
            $table->string('segmento', 100);
            $table->string('dt_empresa_inicio', 50)->nullable();
            $table->string('dt_empresa_saida', 50)->nullable();
            $table->string('cargo', 100);
            $table->string('atividades', 100);

            //FORMAÇÃO
            $table->string('curso', 100);
            $table->string('instituicao', 100);
            $table->string('dt_curso_inicio', 100)->nullable();
            $table->string('dt_curso_conclusao', 100)->nullable();
            $table->string('info_complementares', 100);

            //MANTIDO
            $table->boolean('accept_project')->default(false);
            $table->string('formacao', 100);
            $table->integer('problem_id')->nullable()->unsigned();
            $table->foreign('problem_id')->references('id')->on('problem');            
            $table->timestamps();
            $table->string('message1', 100);

            //ANTERIOR
            // $table->string('habilidades', 100);
            // $table->string('area_interesse', 100);
            
            // $table->string('endereco', 100);
            // $table->string('telefone', 100);
            // $table->string('celular', 100);
            // $table->string('cidade', 100);
            // $table->string('estado', 100);
            
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
