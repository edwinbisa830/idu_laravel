<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMspPaginaDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('IDU_MSP_PAG_DETA', function (Blueprint $table) {
            $table->increments('ID_PAGINA_DETALLE');
            $table->string('PAGINA', 100)->nullable();
            $table->integer('SECUENCIA')->nullable();
            $table->string('ID_CAMPO', 50)->nullable();
            $table->string('LABEL', 50)->nullable();
            $table->string('ISOBLIGATORIO', 5)->nullable();
            $table->string('TIPO', 1)->nullable();
            $table->string('ISVISIBLE', 5)->nullable();
            $table->string('ISPROTEGIDO', 5)->nullable();
            $table->integer('ID_LISTA')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('IDU_MSP_PAG_DETA');
    }
}
