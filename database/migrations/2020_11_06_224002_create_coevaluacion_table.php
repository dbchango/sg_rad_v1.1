<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoevaluacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coevaluacion', function (Blueprint $table) {
            $table->integer('coe_codigo', true);
            $table->integer('codigo_per');
            $table->integer('codigo_pro_evaluador')->index('FK_Coevaluacion_Evaluador');
            $table->integer('codigo_pro_evaluado')->index('FK_Coevaluacion_Evaluado');
            $table->decimal('coe_pregunta01', 16)->nullable();
            $table->decimal('coe_pregunta02', 16)->nullable();
            $table->decimal('coe_pregunta03', 16)->nullable();
            $table->decimal('coe_pregunta04', 16)->nullable();
            $table->decimal('coe_pregunta05', 16)->nullable();
            $table->decimal('coe_pregunta06', 16)->nullable();
            $table->decimal('coe_pregunta07', 16)->nullable();
            $table->decimal('coe_pregunta08', 16)->nullable();
            $table->decimal('coe_pregunta09', 16)->nullable();
            $table->decimal('coe_pregunta10', 16)->nullable();
            $table->decimal('coe_pregunta11', 16)->nullable();
            $table->decimal('coe_pregunta12', 16)->nullable();
            $table->decimal('coe_pregunta13', 16)->nullable();
            $table->decimal('coe_pregunta14', 16)->nullable();
            $table->decimal('coe_pregunta15', 16)->nullable();
            $table->decimal('coe_pregunta16', 16)->nullable();
            $table->decimal('coe_pregunta17', 16)->nullable();
            $table->decimal('coe_pregunta18', 16)->nullable();
            $table->decimal('coe_pregunta19', 16)->nullable();
            $table->decimal('coe_pregunta20', 16)->nullable();
            $table->decimal('coe_promedio', 16)->nullable();
            $table->string('coe_observacion', 250)->nullable();
            $table->dateTime('coe_fecha')->nullable();
            $table->unique(['codigo_per', 'codigo_pro_evaluador', 'codigo_pro_evaluado'], 'COE_DOCENTE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coevaluacion');
    }
}
