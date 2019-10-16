<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagStoresVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_stores_vouchers', function (Blueprint $table) {
            $table->bigIncrements('stores_vouchers_id');  
            $table->bigIncrements('stores_id');  
            $table->bigIncrements('vouchers_id'); 
            $table->string('status');               
            $table->timestamps();
            $table->foreign('vouchers_id')
            ->references('vouchers_id')
            ->on('vouchers')->onDelete('cascade');            
            $table->foreign('stores_id')
            ->references('stores_id')
            ->on('stores')->onDelete('cascade');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_stores_vouchers');
    }
}
