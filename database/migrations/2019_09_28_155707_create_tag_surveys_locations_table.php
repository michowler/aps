<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagSurveysLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_surveys_locations', function (Blueprint $table) {
            $table->bigIncrements('surveys_locations_id');
            $table->unsignedBigInteger('surveys_id');
            $table->unsignedBigInteger('locations_id');
            $table->timestamps();
            $table->foreign('surveys_id')
            ->references('surveys_id')
            ->on('surveys');
            $table->foreign('locations_id')
            ->references('locations_id')
            ->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_surveys_locations');
    }
}
