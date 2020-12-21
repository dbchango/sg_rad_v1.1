<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrugeAuthitemchildTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cruge_authitemchild', function (Blueprint $table) {
            $table->string('parent', 64);
            $table->string('child', 64)->index('child');
            $table->primary(['parent', 'child']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cruge_authitemchild');
    }
}
