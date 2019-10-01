<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespondentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respondents', function (Blueprint $table) {
            $table->bigIncrements('respondents_id');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('vouchers_id');
            $table->date('survey_completed_date');
            $table->date('voucher_redemption_date');
            $table->timestamps();
            $table -> foreign('users_id') 
            -> references('users_id') 
            -> on ('users')->onDelete('cascade');
            $table -> foreign('vouchers_id') 
            -> references('vouchers_id') 
            -> on ('vouchers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respondents');
    }
}
