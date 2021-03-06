<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_models', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('email');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('telefono');
            $table->string('direccion'); 
            $table->enum('notification', ['1', '0']);   
            $table->integer('imagen_id')->unsigned()->nullable();       
            // $table->unsignedInteger('imagen_id')
            $table->timestamps();
            

            $table->foreign('imagen_id')->references('id_imagen')->on('imagens')
            ->onDelete('set null')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_models');
    }
}
