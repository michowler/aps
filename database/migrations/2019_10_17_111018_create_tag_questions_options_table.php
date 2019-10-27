<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagQuestionsOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_questions_options', function (Blueprint $table) {
            $table->bigIncrements('questions_options_id');
            $table->unsignedBigInteger('questions_id');  
            $table->unsignedBigInteger('options_id');                                    
            $table->timestamps();
            $table -> foreign('questions_id')             
            -> references('questions_id') 
            -> on ('questions')->onDelete('cascade');
            $table -> foreign('options_id') 
            -> references('options_id') 
            -> on ('options')->onDelete('cascade');          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_questions_options');
    }
}
