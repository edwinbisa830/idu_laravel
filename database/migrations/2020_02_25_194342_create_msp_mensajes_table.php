<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMspMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('IDU_MSP_MENSAJES', function (Blueprint $table) {
            $table->increments('ID_MENSAJE');
            $table->string('TIPO_MENSAJE', 1)->nullable();
            $table->string('TEXTO', 100)->nullable();
            $table->string('IND_DEFAULT', 1)->nullable();
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
        Schema::dropIfExists('IDU_MSP_MENSAJES');
    }
}
