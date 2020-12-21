<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecuperacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recuperacion', function (Blueprint $table) {
            $table->integer('codigo_rec')->primary();
            $table->integer('codigo_per')->nullable()->index('FK_Recuperacion_Periodo');
            $table->integer('codigo_pro')->nullable()->index('FK_Recuperacion_Profesor');
            $table->integer('codigo_mat')->nullable()->index('FK_Recuperacion_Materia');
            $table->integer('codigo_dia')->nullable()->index('FK_Recuperacion_Dia');
            $table->date('fecha_rec');
            $table->time('hora_entrada_rec');
            $table->time('hora_salida_rec');
            $table->date('fecha_clase_rec')->nullable();
            $table->time('hora_inicio_clase_rec')->nullable();
            $table->time('hora_fin_clase_rec')->nullable();
            $table->string('observaciones_rec', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recuperacion');
    }
}
