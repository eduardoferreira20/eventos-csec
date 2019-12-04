<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePalestrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('palestra', function (Blueprint $table) {
            $table->increments('id');

           $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

            $table->string('titulo')->nullable();
            $table->date('inicio_inscricoes')->nullable();
            $table->date('fim_inscricoes')->nullable();
            $table->text('apresentacao')->nullable();
            $table->integer('horas')->nullable();

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
        Schema::dropIfExists('palestra');
    }
}
