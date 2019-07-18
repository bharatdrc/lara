<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForiegnToPersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('person', function (Blueprint $table) {
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('companyid')->references('id')->on('company');
            $table->foreign('salutation')->references('id')->on('salutation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('person', function (Blueprint $table) {
            $table->dropForeign(['user']);
            $table->dropForeign(['companyid']);
            $table->dropForeign(['salutation']);
        });
    }
}
