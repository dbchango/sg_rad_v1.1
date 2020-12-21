<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrugeUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cruge_user', function (Blueprint $table) {
            $table->integer('iduser', true);
            $table->bigInteger('regdate')->nullable();
            $table->bigInteger('actdate')->nullable();
            $table->bigInteger('logondate')->nullable();
            $table->string('username', 64)->nullable();
            $table->string('email', 45)->nullable();
            $table->string('password', 64)->nullable()->comment('Hashed password');
            $table->string('authkey', 100)->nullable()->comment('llave de autentificacion');
            $table->integer('state')->nullable()->default(0);
            $table->integer('totalsessioncounter')->nullable()->default(0);
            $table->integer('currentsessioncounter')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cruge_user');
    }
}
