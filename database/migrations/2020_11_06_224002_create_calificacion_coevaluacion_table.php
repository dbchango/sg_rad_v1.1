<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionCoevaluacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificacion_coevaluacion', function (Blueprint $table) {
            $table->integer('cco_codigo', true);
            $table->integer('codigo_per')->index('FK_CalificacionCoevaluacion_Periodo');
            $table->string('cco_nombre', 30);
            $table->decimal('cco_valor', 16);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calificacion_coevaluacion');
    }
}
