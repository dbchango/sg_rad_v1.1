<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumenEvaluacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumen_evaluacion', function (Blueprint $table) {
            $table->integer('res_codigo', true);
            $table->integer('codigo_per')->index('FK_Resumen_Periodo');
            $table->integer('codigo_dep')->index('FK_Resumen_Departamento');
            $table->integer('codigo_pro')->index('FK_Resumen_Profesor');
            $table->decimal('res_nota1', 16)->nullable();
            $table->decimal('res_nota2', 16)->nullable();
            $table->decimal('res_nota3', 16)->nullable();
            $table->decimal('res_nota4', 16)->nullable();
            $table->decimal('res_promedio', 16)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resumen_evaluacion');
    }
}
