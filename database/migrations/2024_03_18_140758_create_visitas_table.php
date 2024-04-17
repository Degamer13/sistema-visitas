<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitasTable extends Migration
{
    public function up()
    {
        Schema::create('visitas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('cedula')->unique();
            $table->string('instituto');
            $table->text('descripcion')->nullable();
            $table->timestamps();
            $table->date('salida')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('visitas');
    }
}
