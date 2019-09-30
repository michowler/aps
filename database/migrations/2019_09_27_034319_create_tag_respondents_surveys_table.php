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
            $table->bigIncrements('respodnents_surveys_id');
            $table->string('voucher_redeem_status',45);
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
        Schema::dropIfExists('tag_respondents_surveys');
    }
}
