<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRegistroActividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registro_actividad', function (Blueprint $table) {
            $table->foreign('codigo_act', 'FK_RegistroActividad_Actividad')->references('codigo_act')->on('actividad')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('codigo_area', 'FK_RegistroActividad_Area')->references('codigo_area')->on('area')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('codigo_dep', 'FK_RegistroActividad_Departamento')->references('codigo_dep')->on('departamento')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('codigo_pro', 'FK_RegistroActividad_Profesor')->references('codigo_pro')->on('profesor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('codigo_tar', 'FK_RegistroActividad_Tarea')->references('codigo_tar')->on('tarea')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('codigo_tact', 'FK_RegistroActividad_TipoActividad')->references('codigo_tact')->on('tipo_actividad')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registro_actividad', function (Blueprint $table) {
            $table->dropForeign('FK_RegistroActividad_Actividad');
            $table->dropForeign('FK_RegistroActividad_Area');
            $table->dropForeign('FK_RegistroActividad_Departamento');
            $table->dropForeign('FK_RegistroActividad_Profesor');
            $table->dropForeign('FK_RegistroActividad_Tarea');
            $table->dropForeign('FK_RegistroActividad_TipoActividad');
        });
    }
}
