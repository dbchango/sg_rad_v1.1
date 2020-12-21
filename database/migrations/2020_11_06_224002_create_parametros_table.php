<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametros', function (Blueprint $table) {
            $table->integer('id_par', true);
            $table->date('fecha_par')->nullable();
            $table->date('fecha_fin_par')->nullable();
            $table->date('fecha_inicio_par')->nullable();
            $table->integer('par_numero')->nullable();
            $table->integer('par_periodo')->nullable();
            $table->integer('codigo_dep')->nullable();
            $table->integer('codigo_per')->nullable();
            $table->integer('par_numero2')->nullable();
            $table->integer('par_numero3')->nullable();
            $table->integer('par_numero4')->nullable();
            $table->integer('par_numero5')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parametros');
    }
}
