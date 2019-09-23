<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Palestras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('palestras', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

            $table->string('titulo')->nullable();
            $table->string('palestrante')->nullable();
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->date('inicio_inscricoes')->nullable();
            $table->date('fim_inscricoes')->nullable();
            $table->string('local')->nullable();
            $table->text('apresentacao')->nullable();
            $table->boolean('presenca')->nullable();
            
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
        Schema::dropIfExists('palestras');
    }
}
