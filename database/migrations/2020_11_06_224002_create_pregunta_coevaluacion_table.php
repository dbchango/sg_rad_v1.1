<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntaCoevaluacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregunta_coevaluacion', function (Blueprint $table) {
            $table->integer('pco_codigo', true);
            $table->integer('codigo_per');
            $table->integer('pco_numero');
            $table->string('pco_nombre', 250);
            $table->unique(['codigo_per', 'pco_numero'], 'PCO_NUMERO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pregunta_coevaluacion');
    }
}
