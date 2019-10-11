<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagUsersInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_users_interests', function (Blueprint $table) {
            $table->bigIncrements('users_interest_id');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('interests_id');
            $table->timestamps();
            $table->foreign('interests_id')
            ->references('interests_id')
            ->on('interests')->onDelete('cascade');
            $table->foreign('users_id')
            ->references('users_id')
            ->on('users')->onDelete('cascade');
            
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_users_interests');
    }
}
