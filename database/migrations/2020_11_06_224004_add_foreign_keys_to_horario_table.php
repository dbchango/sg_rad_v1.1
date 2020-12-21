<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToHorarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('horario', function (Blueprint $table) {
            $table->foreign('codigo_dia', 'FK_Horario_Dia')->references('codigo_dia')->on('dia')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('codigo_mat', 'FK_Horario_Materia')->references('codigo_mat')->on('materia')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('codigo_per', 'FK_Horario_Periodo')->references('codigo_per')->on('periodo')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('codigo_pro', 'FK_Horario_Profesor')->references('codigo_pro')->on('profesor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('codigo_rec', 'FK_Horario_Recuperacion')->references('codigo_rec')->on('recuperacion')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('horario', function (Blueprint $table) {
            $table->dropForeign('FK_Horario_Dia');
            $table->dropForeign('FK_Horario_Materia');
            $table->dropForeign('FK_Horario_Periodo');
            $table->dropForeign('FK_Horario_Profesor');
            $table->dropForeign('FK_Horario_Recuperacion');
        });
    }
}
