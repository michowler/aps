<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('locations_id');
            $table->unsignedBigInteger('users_id');
            $table->string('locations_name',45);
            $table->double('longitude',6,6);
            $table->double('latitude',6,6);            
            $table->string('created_by',100);
            $table->string('status');
            $table->timestamps();
            $table -> foreign('users_id') 
            -> references('users_id') 
            -> on ('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
