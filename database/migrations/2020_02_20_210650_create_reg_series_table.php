<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('IDU_REG_SERIE', function (Blueprint $table) {
            $table->increments('ID_SERIE')->nullable();
            $table->string('CODIGO')->nullable();
            $table->string('NOMBRE_SERIE')->nullable();
            $table->string('FECHA_INICIO_VIGENCIA')->nullable();
            $table->string('FECHA_FIN_VIGENCIA')->nullable();
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
        Schema::dropIfExists('IDU_REG_SERIE');
    }
}
