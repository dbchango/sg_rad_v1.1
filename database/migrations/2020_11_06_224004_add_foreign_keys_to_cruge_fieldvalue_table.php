<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCrugeFieldvalueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cruge_fieldvalue', function (Blueprint $table) {
            $table->foreign('idfield', 'fk_cruge_fieldvalue_cruge_field1')->references('idfield')->on('cruge_field')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign('iduser', 'fk_cruge_fieldvalue_cruge_user1')->references('iduser')->on('cruge_user')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cruge_fieldvalue', function (Blueprint $table) {
            $table->dropForeign('fk_cruge_fieldvalue_cruge_field1');
            $table->dropForeign('fk_cruge_fieldvalue_cruge_user1');
        });
    }
}
