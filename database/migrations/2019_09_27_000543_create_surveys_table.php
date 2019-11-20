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
            $table->string('surveys_title');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('vouchers_id')->nullable();
            // $table->unsignedBigInteger('owner_packages_id')->nullable();
            $table->string('surveys_description')->nullable();
            $table->string('status')->default("1");
            $table->timestamps();
            //foreign tag owner package table id use shortform
            $table->foreign('users_id')
            ->references('users_id')
            ->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('surveys');
    }
}
