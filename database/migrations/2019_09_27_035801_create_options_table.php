<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->bigIncrements('options_id');                    
            $table->unsignedBigInteger('questions_id');
            $table->unsignedBigInteger('choices_id');
            $table->string('content')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table -> foreign('questions_id') 
            -> references('questions_id') 
            -> on ('questions')->onDelete('cascade');
            $table -> foreign('choices_id') 
            -> references('choices_id') 
            -> on ('choices')->onDelete('cascade');        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
    }
}
