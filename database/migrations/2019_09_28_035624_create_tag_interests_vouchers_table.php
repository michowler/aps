<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagInterestsVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_interests_vouchers', function (Blueprint $table) {
            $table->bigIncrements('interest_vouchers_id');
            $table->unsignedBigInteger('interests_id');
            $table->unsignedBigInteger('vouchers_id');
            $table->timestamps();
            $table -> foreign('interests_id') 
            -> references('interests_id') 
            -> on ('interests')->onDelete('cascade');
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
        Schema::dropIfExists('tag_interests_vouchers');
    }
}
