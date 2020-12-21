<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionEadministrativaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificacion_eadministrativa', function (Blueprint $table) {
            $table->integer('cea_codigo', true);
            $table->integer('codigo_per')->index('FK_CalificacionEAdministrativa_Periodo');
            $table->string('cea_nombre', 30);
            $table->decimal('cea_valor', 16);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calificacion_eadministrativa');
    }
}
