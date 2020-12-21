<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesor', function (Blueprint $table) {
            $table->integer('codigo_pro', true);
            $table->char('cedula_pro', 10)->unique('CEDULA_PRO');
            $table->string('miespe_pro', 30);
            $table->binary('huella_pro')->nullable();
            $table->string('nombre_pro', 60);
            $table->string('apellido_pro', 60);
            $table->string('email_pro', 80)->nullable();
            $table->integer('codigo_dep')->index('FK_Profesor_Departamento');
            $table->integer('cod_area')->index('FK_Profesor_Area');
            $table->integer('estado_pro')->default(1);
            $table->integer('director_pro')->default(0);
            $table->integer('jarea_pro')->default(0);
            $table->integer('ded_codigo')->index('FK_Profesor_Dedicacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profesor');
    }
}
