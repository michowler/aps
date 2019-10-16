<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagRespondentsAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_respondents_options', function (Blueprint $table) {
            $table->bigIncrements('respondents_options_id');
            $table->unsignedBigInteger('respondents_id');
            $table->unsignedBigInteger('options_id');
            $table->timestamps();
            $table->foreign('respondents_id')
                  ->references('respondents_id')
                  ->on('respondents')->onDelete('cascade');
            $table->foreign('options_id')
                  ->references('options_id')
                  ->on('options')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_respondents_answers');
    }
}
