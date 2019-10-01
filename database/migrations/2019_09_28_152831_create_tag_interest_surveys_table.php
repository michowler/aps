<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagInterestSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_interest_surveys', function (Blueprint $table) {
            $table->bigIncrements('interest_surveys_id');
            $table->unsignedBigInteger('surveys_id');
            $table->unsignedBigInteger('interests_id');
            $table->timestamps();
            $table->foreign('interests_id')
            ->references('interests_id')
            ->on('interests');
            $table->foreign('surveys_id')
            ->references('surveys_id')
            ->on('surveys');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_interest_surveys');
    }
}
