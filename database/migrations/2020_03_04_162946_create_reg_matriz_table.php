<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegMatrizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('IDU_REG_MATRIZ', function (Blueprint $table) {
            $table->increments('ID_MATRIZ')->nullable();
            $table->string('DEPENDENCIA')->nullable();
            $table->string('ID_SERIE')->nullable();
            $table->string('ID_SUBSERIE')->nullable();
            $table->string('ID_TIPO_DOCUMENTAL')->nullable();
            $table->string('SOPORTE')->nullable();
            $table->string('NIVEL_CONFIDENCIALIDAD')->nullable();
            $table->integer('ID_USUARIO_REGISTRADO');
            $table->integer('ID_USUARIO_ACTUALIZADO');
            $table->dateTime('CREATED_AT');
            $table->dateTime('UPDATED_AT');
            $table->integer('ESTADO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('IDU_REG_MATRIZ');
    }
}
