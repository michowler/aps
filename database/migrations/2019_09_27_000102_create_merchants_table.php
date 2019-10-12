<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->bigIncrements('merchants_id');
            $table->unsignedBigInteger('users_id');
            $table->string('merchants_address');
            $table->string('merchants_phone',45);
            $table->string('merchants_email');        
            $table->timestamps();
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
        Schema::dropIfExists('merchants');
    }
}
