<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrugeAuthassignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cruge_authassignment', function (Blueprint $table) {
            $table->integer('userid')->index('fk_cruge_authassignment_user');
            $table->text('bizrule')->nullable();
            $table->text('data')->nullable();
            $table->string('itemname', 64)->index('fk_cruge_authassignment_cruge_authitem1');
            $table->primary(['userid', 'itemname']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cruge_authassignment');
    }
}
