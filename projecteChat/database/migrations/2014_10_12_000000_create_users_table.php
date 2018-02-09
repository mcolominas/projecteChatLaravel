<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('permisos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('descripcion');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('imagen')->nullable()->default(null);
            $table->integer('id_permisos')->unsigned()->default('1');
            $table->rememberToken();
            $table->timestamps();

            $table->index('id_permisos');

            $table->foreign('id_permisos')->references('id')->on('permisos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('permisos');
    }
}
