<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegSubseriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('IDU_REG_SUBSERIES', function (Blueprint $table) {
            $table->increments('ID_SUBSERIE')->nullable();
            $table->string('CODIGO')->nullable();
            $table->string('NOMBRE_SUBSERIE')->nullable();
            $table->string('TIEMPO_ARCH_GEST')->nullable();
            $table->string('TIEMPO_ARCH_CENT')->nullable();
            $table->string('DISPOSICION_FINAL')->nullable();
            $table->string('PROCEDIMIENTOS')->nullable();
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
        Schema::dropIfExists('IDU_REG_SUBSERIES');
    }
}
