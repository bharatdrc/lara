<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCustomfieldvalueAddNullableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customfieldvalue', function (Blueprint $table) {
            $table->string('value_string')->nullable()->change();
            $table->boolean('value_boolean')->default(false)->change();
            $table->integer('value_integer')->nullable()->change();
            DB::connection('mysql')->statement(
              "ALTER TABLE `customfieldvalue`  MODIFY COLUMN value_double double(8,2) null;"
            );
            $table->string('value_serialize')->nullable()->change();
            $table->unsignedBigInteger('customfield_id')->nullable()->change();
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
            $table->string('value_string')->nullable(false)->change();
            $table->integer('value_integer')->nullable(false)->change();
            DB::connection('mysql')->statement(
              "ALTER TABLE `customfieldvalue`  MODIFY COLUMN value_double double(8,2) not null;"
            );
            $table->string('value_serialize')->nullable(false)->change();
            $table->unsignedBigInteger('customfield_id')->nullable(false)->change();
        });
    }
}
