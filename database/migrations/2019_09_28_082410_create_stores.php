<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('stores_id');  
            $table->bigIncrements('merchants_id'); 
            $table->string('name');
            $table->string('address');
            $table->string('city',45);                 
            $table->timestamps();
            $table->foreign('merchants_id')
            ->references('merchants_id')
            ->on('merchants')->onDelete('cascade');            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
