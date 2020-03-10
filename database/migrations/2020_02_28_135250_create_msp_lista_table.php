<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMspListaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('IDU_MSP_LISTA', function (Blueprint $table) {
            $table->increments('ID');
            $table->integer('ID_lISTA');
            $table->string('VALOR_ALFA', 20)->nullable();
            $table->integer('VALOR_NUMERIC')->nullable();
            $table->string('DESCRIPTION', 100)->nullable();
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
        Schema::dropIfExists('IDU_MSP_LISTA');
    }
}
