<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrugeFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cruge_field', function (Blueprint $table) {
            $table->integer('idfield', true);
            $table->string('fieldname', 20);
            $table->string('longname', 50)->nullable();
            $table->integer('position')->nullable()->default(0);
            $table->integer('required')->nullable()->default(0);
            $table->integer('fieldtype')->nullable()->default(0);
            $table->integer('fieldsize')->nullable()->default(20);
            $table->integer('maxlength')->nullable()->default(45);
            $table->integer('showinreports')->nullable()->default(0);
            $table->string('useregexp', 512)->nullable();
            $table->string('useregexpmsg', 512)->nullable();
            $table->binary('predetvalue')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cruge_field');
    }
}
