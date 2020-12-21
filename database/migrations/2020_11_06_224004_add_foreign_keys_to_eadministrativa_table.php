<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEadministrativaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eadministrativa', function (Blueprint $table) {
            $table->foreign('codigo_per', 'FK_EAdministrativa_Periodo')->references('codigo_per')->on('periodo')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('codigo_pro_evaluado', 'FK_EAdministrativa_Profesor_Evaluado')->references('codigo_pro')->on('profesor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('codigo_pro_evaluador', 'FK_EAdministrativa_Profesor_Evaluador')->references('codigo_pro')->on('profesor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eadministrativa', function (Blueprint $table) {
            $table->dropForeign('FK_EAdministrativa_Periodo');
            $table->dropForeign('FK_EAdministrativa_Profesor_Evaluado');
            $table->dropForeign('FK_EAdministrativa_Profesor_Evaluador');
        });
    }
}
