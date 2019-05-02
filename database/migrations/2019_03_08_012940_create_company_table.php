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
            $table->string('tele',15);
            $table->string('email',100);
            $table->string('est',100);
            $table->string('cid',100);
            $table->string('bair',100);
            $table->string('rua',100);
            $table->string('num',100);
            $table->string('message',100);
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
