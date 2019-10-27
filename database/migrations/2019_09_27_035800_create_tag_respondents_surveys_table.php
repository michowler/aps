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
            $table->unsignedBigInteger('stores_id');  
            $table->unsignedBigInteger('users_id');                            
            $table->unsignedBigInteger('surveys_id');
            $table->date('survey_completed_date');
            $table->string('voucher_redeem_status',45);
            $table->string('voucher_redeemption_date',45);            
            $table->timestamps();
            $table -> foreign('users_id') 
            -> unsigned() 
            -> index()
            -> references('users_id') 
            -> on ('users')->onDelete('cascade');
            $table -> foreign('surveys_id') 
            -> references('surveys_id') 
            -> on ('surveys')->onDelete('cascade');
            $table -> foreign('stores_id') 
            -> references('stores_id') 
            -> on ('stores')->onDelete('cascade');
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
