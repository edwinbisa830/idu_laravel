<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMspPaginaCabeceraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('IDU_MSP_PAG_HEADER', function (Blueprint $table) {
            $table->increments('ID_PAGINA_CABECERA');
            $table->string('PAGINA', 100);
            $table->integer('SECUENCIA');
            $table->string('TITULO_PRINCIPAL', 1000);
            $table->integer('ID_MENSAJE_CREACION');
            $table->integer('ID_MENSAJE_MODIFICACION');
            $table->integer('ID_MENSAJE_ELIMINACION');
            $table->integer('ID_HISTORICA_CREACION')->nullable();
            $table->integer('ID_HISTRORICA_MODIFICADO')->nullable();
            $table->integer('ID_HISTRORICA_ELIMINACION')->nullable();
            $table->integer('ID_PERMISO_1')->nullable();
            $table->integer('ID_PERMISO_2')->nullable();        
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('IDU_MSP_PAG_HEADER');
    }
}
