<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToResumenEvaluacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resumen_evaluacion', function (Blueprint $table) {
            $table->foreign('codigo_dep', 'FK_Resumen_Departamento')->references('codigo_dep')->on('departamento')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('codigo_per', 'FK_Resumen_Periodo')->references('codigo_per')->on('periodo')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('codigo_pro', 'FK_Resumen_Profesor')->references('codigo_pro')->on('profesor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resumen_evaluacion', function (Blueprint $table) {
            $table->dropForeign('FK_Resumen_Departamento');
            $table->dropForeign('FK_Resumen_Periodo');
            $table->dropForeign('FK_Resumen_Profesor');
        });
    }
}
