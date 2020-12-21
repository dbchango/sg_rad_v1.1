<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProfesorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profesor', function (Blueprint $table) {
            $table->foreign('cod_area', 'FK_Profesor_Area')->references('codigo_area')->on('area')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('ded_codigo', 'FK_Profesor_Dedicacion')->references('ded_codigo')->on('dedicacion')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('codigo_dep', 'FK_Profesor_Departamento')->references('codigo_dep')->on('departamento')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profesor', function (Blueprint $table) {
            $table->dropForeign('FK_Profesor_Area');
            $table->dropForeign('FK_Profesor_Dedicacion');
            $table->dropForeign('FK_Profesor_Departamento');
        });
    }
}
