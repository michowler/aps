<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->bigIncrements('surveys_id');
            // $table->unsignedBigInteger('vouchers_id');
            // $table->unsignedBigInteger('owner_packages_id');
            $table->string('surveys_title');
            // $table->string('surveys_description');
            // $table->string('status');
            $table->timestamps();
            //foreign tag owner package table id use shortform
            // $table -> foreign('owner_packages_id') 
            // -> references('owner_packages_id') 
            // -> on ('tag_owner_packages')->onDelete('cascade');
            //  $table -> foreign('vouchers_id') 
            // -> references('vouchers_id') 
            // -> on ('vouchers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surveys');
    }
}
