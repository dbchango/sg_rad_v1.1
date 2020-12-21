<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntaAutoevaluacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregunta_autoevaluacion', function (Blueprint $table) {
            $table->integer('pau_codigo', true);
            $table->integer('codigo_per');
            $table->integer('pau_numero');
            $table->string('pau_nombre', 250);
            $table->unique(['codigo_per', 'pau_numero'], 'PAU_NUMERO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pregunta_autoevaluacion');
    }
}
