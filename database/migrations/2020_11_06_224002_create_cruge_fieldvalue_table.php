<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrugeFieldvalueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cruge_fieldvalue', function (Blueprint $table) {
            $table->integer('idfieldvalue', true);
            $table->integer('iduser')->index('fk_cruge_fieldvalue_cruge_user1');
            $table->integer('idfield')->index('fk_cruge_fieldvalue_cruge_field1');
            $table->binary('value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cruge_fieldvalue');
    }
}
