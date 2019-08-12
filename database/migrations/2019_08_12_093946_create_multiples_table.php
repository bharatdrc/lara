<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultiplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiples', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('gender');
            $table->string('name');
            $table->string('job');
            $table->string('designation');
            $table->smallInteger('contact');
            $table->string('postal_code');
            $table->timestamp('doj')->nullable();
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
        Schema::dropIfExists('multiples');
    }
}
