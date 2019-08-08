<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustomfieldForeignToCustomfieldvalueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customfieldvalue', function (Blueprint $table) {
             $table->foreign('customfield_id')->references('id')->on('customfield');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customfieldvalue', function (Blueprint $table) {
            $table->dropForeign('customfield_id');
        });
    }
}
