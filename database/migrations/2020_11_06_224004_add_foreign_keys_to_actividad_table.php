<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToActividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actividad', function (Blueprint $table) {
            $table->foreign('codigo_tact', 'FK_Actividad_TipoActividad')->references('codigo_tact')->on('tipo_actividad')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actividad', function (Blueprint $table) {
            $table->dropForeign('FK_Actividad_TipoActividad');
        });
    }
}
