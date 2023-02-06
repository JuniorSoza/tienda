<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->bigIncrements('id');
            //el id 1 es para netflix
            //el id 2 es para spoty
            //el id 3 es para hbo go
            $table->integer('id_servicio');
            $table->string('email_nombre');
            $table->String('email_contrasena');
            $table->string('email_tiempo');
            $table->string('email_comentario');
            $table->integer('email_cant_pantalla')->default(4);
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
        Schema::dropIfExists('emails');
    }
}
