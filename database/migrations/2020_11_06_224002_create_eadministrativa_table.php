<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEadministrativaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eadministrativa', function (Blueprint $table) {
            $table->integer('cea_codigo', true);
            $table->integer('codigo_per')->index('FK_EAdministrativa_Periodo');
            $table->integer('codigo_pro_evaluador');
            $table->integer('codigo_pro_evaluado')->index('FK_EAdministrativa_Profesor_Evaluado');
            $table->decimal('cea_pregunta01', 16)->nullable();
            $table->decimal('cea_pregunta02', 16)->nullable();
            $table->decimal('cea_pregunta03', 16)->nullable();
            $table->decimal('cea_pregunta04', 16)->nullable();
            $table->decimal('cea_pregunta05', 16)->nullable();
            $table->decimal('cea_pregunta06', 16)->nullable();
            $table->decimal('cea_pregunta07', 16)->nullable();
            $table->decimal('cea_pregunta08', 16)->nullable();
            $table->decimal('cea_pregunta09', 16)->nullable();
            $table->decimal('cea_pregunta10', 16)->nullable();
            $table->decimal('cea_pregunta11', 16)->nullable();
            $table->decimal('cea_pregunta12', 16)->nullable();
            $table->decimal('cea_pregunta13', 16)->nullable();
            $table->decimal('cea_pregunta14', 16)->nullable();
            $table->decimal('cea_pregunta15', 16)->nullable();
            $table->decimal('cea_pregunta16', 16)->nullable();
            $table->decimal('cea_pregunta17', 16)->nullable();
            $table->decimal('cea_pregunta18', 16)->nullable();
            $table->decimal('cea_pregunta19', 16)->nullable();
            $table->decimal('cea_pregunta20', 16)->nullable();
            $table->decimal('cea_promedio', 16)->nullable();
            $table->string('cea_observacion', 250)->nullable();
            $table->dateTime('cea_fecha')->nullable();
            $table->unique(['codigo_pro_evaluador', 'codigo_pro_evaluado', 'codigo_per'], 'CEA_DOCENTE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eadministrativa');
    }
}
