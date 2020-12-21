<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntaEadministrativaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregunta_eadministrativa', function (Blueprint $table) {
            $table->integer('pea_codigo', true);
            $table->integer('codigo_per')->index('FK_Pregunta_EAdministrativa_Periodo');
            $table->integer('pea_numero');
            $table->string('pea_nombre', 250);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pregunta_eadministrativa');
    }
}
