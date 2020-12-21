<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionAutoevaluacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificacion_autoevaluacion', function (Blueprint $table) {
            $table->integer('cau_codigo', true);
            $table->integer('codigo_per')->index('FK_CalificacionAutoevaluacion_Periodo');
            $table->string('cau_nombre', 30);
            $table->decimal('cau_valor', 16);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calificacion_autoevaluacion');
    }
}
