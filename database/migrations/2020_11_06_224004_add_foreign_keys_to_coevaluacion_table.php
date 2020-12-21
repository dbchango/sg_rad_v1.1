<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCoevaluacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coevaluacion', function (Blueprint $table) {
            $table->foreign('codigo_pro_evaluado', 'FK_Coevaluacion_Evaluado')->references('codigo_pro')->on('profesor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('codigo_pro_evaluador', 'FK_Coevaluacion_Evaluador')->references('codigo_pro')->on('profesor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('codigo_per', 'FK_Coevaluacion_Periodo')->references('codigo_per')->on('periodo')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coevaluacion', function (Blueprint $table) {
            $table->dropForeign('FK_Coevaluacion_Evaluado');
            $table->dropForeign('FK_Coevaluacion_Evaluador');
            $table->dropForeign('FK_Coevaluacion_Periodo');
        });
    }
}
