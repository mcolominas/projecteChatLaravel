<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tablas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_publicos', function($table)
        {
            $table->increments('id');
            $table->string('nombre');
            $table->string('imagen')->nullable()->default(null);
            $table->timestamps();
        });

        Schema::create('mensajes_publicos', function($table)
        {
            $table->increments('id');
            $table->integer('id_chat_publico')->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->text('mensaje');
            $table->timestamps();

            $table->index('id_chat_publico');
            $table->index('id_usuario');

            $table->foreign('id_chat_publico')->references('id')->on('chat_publicos');
            $table->foreign('id_usuario')->references('id')->on('users');
        });

        Schema::create('chat_privados', function($table)
        {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->string('nombre');
            $table->string('imagen')->nullable()->default(null);
            $table->timestamps();

            $table->index('id_usuario');

            $table->foreign('id_usuario')->references('id')->on('users');
        });

        Schema::create('invitaciones', function($table)
        {
            $table->increments('id');
            $table->integer('id_chat_privado')->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->boolean('activado')->default('1');
            $table->timestamps();

            $table->index('id_chat_privado');
            $table->index('id_usuario');

            $table->foreign('id_chat_privado')->references('id')->on('chat_privados');
            $table->foreign('id_usuario')->references('id')->on('users');
        });

        Schema::create('mensajes_privados', function($table)
        {
            $table->increments('id');
            $table->integer('id_chat_privado')->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->text('mensaje');
            $table->timestamps();

            $table->index('id_chat_privado');
            $table->index('id_usuario');

            $table->foreign('id_chat_privado')->references('id_chat_privado')->on('invitaciones');
            $table->foreign('id_usuario')->references('id')->on('users');
        });

        Schema::create('denuncias', function($table)
        {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->string('imagen')->nullable()->default(null);
            $table->text('mensaje');
            $table->string('coordenadas');
            $table->boolean('revisado')->default('0');
            $table->boolean('solucionado')->default('0');
            $table->timestamps();

            $table->index('id_usuario');

            $table->foreign('id_usuario')->references('id')->on('users');
        });

        Schema::create('mensajes_denuncias', function($table)
        {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_denuncias')->unsigned();
            $table->text('mensaje');
            $table->timestamps();

            $table->index('id_usuario');
            $table->index('id_denuncias');

            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_denuncias')->references('id')->on('denuncias');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_publicos');
        Schema::dropIfExists('mensajes_publicos');
        Schema::dropIfExists('chat_privados');
        Schema::dropIfExists('invitaciones');
        Schema::dropIfExists('mensajes_privados');
        Schema::dropIfExists('denuncias');
        Schema::dropIfExists('mensajes_denuncias');        
    }
}
