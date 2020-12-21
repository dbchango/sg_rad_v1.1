<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control', function (Blueprint $table) {
            $table->integer('codigo_con')->primary();
            $table->integer('codigo_per')->nullable()->index('FK_Control_Periodo');
            $table->integer('codigo_pro')->nullable()->index('FK_Control_Profesor');
            $table->integer('codigo_mat')->nullable()->index('FK_Control_Materia');
            $table->integer('codigo_dia')->nullable()->index('FK_Control_Dia');
            $table->date('fecha_con')->nullable();
            $table->time('hora_entrada_con');
            $table->time('hora_salida_con');
            $table->time('hora_entrada_real_con')->nullable();
            $table->time('hora_salida_real_con')->nullable();
            $table->unsignedBigInteger('numero_horas_con')->nullable();
            $table->string('temas_con', 250)->nullable();
            $table->string('observaciones_con', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('control');
    }
}
