<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagRespondentsSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_respondents_surveys', function (Blueprint $table) {
            $table->bigIncrements('respondents_surveys_id');
            $table->unsignedBigInteger('respondents_id');
            $table->unsignedBigInteger('surveys_id');
            $table->string('voucher_redeem_status',45);
            $table->timestamps();
            $table -> foreign('respondents_id') 
            -> unsigned() 
            -> index()
            -> references('respondents_id') 
            -> on ('respondents')->onDelete('cascade');
             $table -> foreign('surveys_id') 
            -> references('surveys_id') 
            -> on ('surveys')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_respondents_surveys');
    }
}
