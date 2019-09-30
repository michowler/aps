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
        Schema::create('tag_respondents_answers', function (Blueprint $table) {
            $table->bigIncrements('respondents_answers_id');
            $table->timestamps();
             $table->foreign('respondents_answers_id')
                  ->references('answers_id')
                  ->on('answers');
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
