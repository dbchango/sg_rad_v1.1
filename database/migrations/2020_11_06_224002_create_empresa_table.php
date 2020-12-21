<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->integer('codigo_emp', true);
            $table->string('nombre_emp', 100);
            $table->unsignedInteger('limite_acceso_emp')->nullable();
            $table->string('emp_firma_encargado', 60)->nullable();
            $table->string('emp_pie_encargado', 60)->nullable();
            $table->string('emp_firma_subdirector', 60)->nullable();
            $table->string('emp_pie_subdirector', 60)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa');
    }
}
