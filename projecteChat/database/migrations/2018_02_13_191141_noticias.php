<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Noticias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function($table)
        {
            $table->increments('id');
            $table->string('titulo');
            $table->text('mensaje');
            $table->string('categoria');
            $table->string('imagen')->nullable()->default(null);
            $table->boolean('importante')->default('0');
            $table->timestamps();
        });

        Schema::create('categorias_noticias', function($table)
        {
            $table->increments('id');
            $table->text('nombre');
            $table->timestamps();
        });

        Schema::create('enlace_noticias', function($table)
        {
            $table->increments('id');
            $table->integer('id_noticia')->unsigned();
            $table->integer('id_categoria')->unsigned();
            $table->timestamps();

            $table->index('id_noticia');
            $table->index('id_categoria');

            $table->foreign('id_noticia')->references('id')->on('noticias');
            $table->foreign('id_categoria')->references('id')->on('categorias_noticias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noticias');
        Schema::dropIfExists('categorias_noticias');
        Schema::dropIfExists('enlace_noticias');
    }
}
