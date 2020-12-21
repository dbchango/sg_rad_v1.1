<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroActividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_actividad', function (Blueprint $table) {
            $table->integer('codigo_rac', true);
            $table->integer('codigo_pro')->index('FK_RegistroActividad_Profesor');
            $table->integer('codigo_dep')->index('FK_RegistroActividad_Departamento');
            $table->integer('codigo_area')->index('FK_RegistroActividad_Area');
            $table->date('fecha_rac');
            $table->integer('codigo_tact')->index('FK_RegistroActividad_TipoActividad');
            $table->integer('codigo_act')->index('FK_RegistroActividad_Actividad');
            $table->integer('codigo_tar')->index('FK_RegistroActividad_Tarea');
            $table->string('comentario_rac', 250)->nullable();
            $table->time('hinicio_rac')->nullable();
            $table->time('hfin_rac')->nullable();
            $table->decimal('horas_rac', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro_actividad');
    }
}
