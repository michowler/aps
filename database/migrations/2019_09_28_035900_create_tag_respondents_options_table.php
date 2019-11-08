<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagRespondentsOptionsTable extends Migration
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
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('surveys_id');
            $table->unsignedBigInteger('questions_id');            
            $table->unsignedBigInteger('options_id');
            $table->timestamps();
            $table->foreign('users_id')
                  ->references('users_id')
                  ->on('users')->onDelete('cascade');
            $table->foreign('surveys_id')
                  ->references('surveys_id')
                  ->on('surveys')->onDelete('cascade');
            $table->foreign('questions_id')
                  ->references('questions_id')
                  ->on('questions')->onDelete('cascade'); 
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
        Schema::dropIfExists('tag_respondents_options');
    }
}
