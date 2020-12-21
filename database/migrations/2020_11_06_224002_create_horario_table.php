<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario', function (Blueprint $table) {
            $table->integer('codigo_hor')->primary();
            $table->integer('codigo_per')->nullable()->index('FK_Horario_Periodo');
            $table->integer('codigo_pro')->nullable()->index('FK_Horario_Profesor');
            $table->integer('codigo_mat')->nullable()->index('FK_Horario_Materia');
            $table->integer('codigo_rec')->nullable()->index('FK_Horario_Recuperacion');
            $table->integer('codigo_dia')->nullable()->index('FK_Horario_Dia');
            $table->time('hora_entrada_hor');
            $table->time('hora_salida_hor');
            $table->unsignedBigInteger('numero_horas_hor')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horario');
    }
}
