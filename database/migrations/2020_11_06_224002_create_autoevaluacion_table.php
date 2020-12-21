<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoevaluacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autoevaluacion', function (Blueprint $table) {
            $table->integer('cau_codigo', true);
            $table->integer('codigo_per');
            $table->integer('codigo_pro')->nullable()->index('FK_Autoevaluacion_Profesor');
            $table->decimal('cau_pregunta01', 16)->nullable();
            $table->decimal('cau_pregunta02', 16)->nullable();
            $table->decimal('cau_pregunta03', 16)->nullable();
            $table->decimal('cau_pregunta04', 16)->nullable();
            $table->decimal('cau_pregunta05', 16)->nullable();
            $table->decimal('cau_pregunta06', 16)->nullable();
            $table->decimal('cau_pregunta07', 16)->nullable();
            $table->decimal('cau_pregunta08', 16)->nullable();
            $table->decimal('cau_pregunta09', 16)->nullable();
            $table->decimal('cau_pregunta10', 16)->nullable();
            $table->decimal('cau_pregunta11', 16)->nullable();
            $table->decimal('cau_pregunta12', 16)->nullable();
            $table->decimal('cau_pregunta13', 16)->nullable();
            $table->decimal('cau_pregunta14', 16)->nullable();
            $table->decimal('cau_pregunta15', 16)->nullable();
            $table->decimal('cau_pregunta16', 16)->nullable();
            $table->decimal('cau_pregunta17', 16)->nullable();
            $table->decimal('cau_pregunta18', 16)->nullable();
            $table->decimal('cau_pregunta19', 16)->nullable();
            $table->decimal('cau_pregunta20', 16)->nullable();
            $table->decimal('cau_promedio', 16)->nullable();
            $table->string('cau_observacion', 250)->nullable();
            $table->dateTime('cau_fecha')->nullable();
            $table->unique(['codigo_per', 'codigo_pro'], 'CAU_DOCENTE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autoevaluacion');
    }
}
