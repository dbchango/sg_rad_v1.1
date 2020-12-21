<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCalificacionCoevaluacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calificacion_coevaluacion', function (Blueprint $table) {
            $table->foreign('codigo_per', 'FK_CalificacionCoevaluacion_Periodo')->references('codigo_per')->on('periodo')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calificacion_coevaluacion', function (Blueprint $table) {
            $table->dropForeign('FK_CalificacionCoevaluacion_Periodo');
        });
    }
}
