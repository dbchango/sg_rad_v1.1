<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrugeSessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cruge_session', function (Blueprint $table) {
            $table->integer('idsession', true);
            $table->integer('iduser')->index('crugesession_iduser');
            $table->bigInteger('created')->nullable();
            $table->bigInteger('expire')->nullable();
            $table->integer('status')->nullable()->default(0);
            $table->string('ipaddress', 45)->nullable();
            $table->integer('usagecount')->nullable()->default(0);
            $table->bigInteger('lastusage')->nullable();
            $table->bigInteger('logoutdate')->nullable();
            $table->string('ipaddressout', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cruge_session');
    }
}
