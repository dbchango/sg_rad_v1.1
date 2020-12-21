<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToControlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('control', function (Blueprint $table) {
            $table->foreign('codigo_dia', 'FK_Control_Dia')->references('codigo_dia')->on('dia')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('codigo_mat', 'FK_Control_Materia')->references('codigo_mat')->on('materia')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('codigo_per', 'FK_Control_Periodo')->references('codigo_per')->on('periodo')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('codigo_pro', 'FK_Control_Profesor')->references('codigo_pro')->on('profesor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('control', function (Blueprint $table) {
            $table->dropForeign('FK_Control_Dia');
            $table->dropForeign('FK_Control_Materia');
            $table->dropForeign('FK_Control_Periodo');
            $table->dropForeign('FK_Control_Profesor');
        });
    }
}
