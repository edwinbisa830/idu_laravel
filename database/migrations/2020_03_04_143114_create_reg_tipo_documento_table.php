<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegTipoDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('IDU_REG_TIPO_DOCUMENTO', function (Blueprint $table) {
            $table->increments('ID_TIPO_DOCUMENTO')->nullable();
            $table->string('CODIGO')->nullable();
            $table->string('TIPO_DOCUMENTO')->nullable();
            $table->string('SOPORTE')->nullable();
            $table->string('TIPO_RADICADO')->nullable();
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
        Schema::dropIfExists('IDU_REG_TIPO_DOCUMENTO');
    }
}
