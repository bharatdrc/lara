<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomfieldvalueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customfieldvalue', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('value_string');
            $table->boolean('value_boolean');
            $table->integer('value_integer');
            $table->double('value_double',8,2);
            $table->string('value_serialize');
            $table->unsignedBigInteger('customfield_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customfieldvalue');
    }
}
