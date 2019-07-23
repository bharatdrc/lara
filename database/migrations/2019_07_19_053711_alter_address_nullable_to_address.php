<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddressNullableToAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function (Blueprint $table) {
            $table->unsignedBigInteger('address')->nullable()->change();
            $table->unsignedBigInteger('invoiceaddress')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company', function (Blueprint $table) {
            $table->unsignedBigInteger('address')->nullable(false)->change();
            $table->unsignedBigInteger('invoiceaddress')->nullable(false)->change();
        });
    }
}
