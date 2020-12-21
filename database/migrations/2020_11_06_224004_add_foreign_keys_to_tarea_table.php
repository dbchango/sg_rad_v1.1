<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTareaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tarea', function (Blueprint $table) {
            $table->foreign('codigo_act', 'FK_Tarea_Actividad')->references('codigo_act')->on('actividad')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tarea', function (Blueprint $table) {
            $table->dropForeign('FK_Tarea_Actividad');
        });
    }
}
