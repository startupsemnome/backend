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
            $table->string('fname', 100);
            $table->string('lname', 100);
            $table->string('email', 100);
            $table->string('end', 100);
            $table->string('tel', 100);
            $table->string('cel', 100);
            $table->string('cid', 100);
            $table->string('est', 100);
            $table->boolean('accept_project')->default(false);
            $table->string('formacao', 100);
            $table->string('hab', 100);
            $table->string('areai', 100);
            $table->string('message1', 100);
            $table->integer('problem_id')->nullable()->unique()->unsigned();
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
