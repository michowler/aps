<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('answers_id');            
            $table->unsignedBigInteger('respondents_surveys_id');
            $table->unsignedBigInteger('questions_id');
            $table->string('answers_title');
            $table->timestamps();
            $table -> foreign('questions_id') 
            -> references('questions_id') 
            -> on ('questions')->onDelete('cascade');
            $table -> foreign('respondents_surveys_id') 
            -> references('respondents_surveys_id') 
            -> on ('tag_respondents_surveys')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
