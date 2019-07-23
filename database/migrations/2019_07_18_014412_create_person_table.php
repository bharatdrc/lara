<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('salutation')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->unsignedBigInteger('companyid')->nullable();
            $table->unsignedBigInteger('user');
            $table->string('jobtitle')->nullable();
            $table->string('profiletext')->nullable();
            $table->string('profileimage')->nullable();
            $table->tinyInteger('language')->nullable();
            $table->string('interestedin')->nullable();
            $table->string('canprovide')->nullable();
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
        Schema::dropIfExists('person');
    }
}
