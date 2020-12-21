<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCrugeAuthassignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cruge_authassignment', function (Blueprint $table) {
            $table->foreign('itemname', 'fk_cruge_authassignment_cruge_authitem1')->references('name')->on('cruge_authitem')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('userid', 'fk_cruge_authassignment_user')->references('iduser')->on('cruge_user')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cruge_authassignment', function (Blueprint $table) {
            $table->dropForeign('fk_cruge_authassignment_cruge_authitem1');
            $table->dropForeign('fk_cruge_authassignment_user');
        });
    }
}
