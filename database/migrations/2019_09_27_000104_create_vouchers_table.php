<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->bigIncrements('vouchers_id');            
            $table->unsignedBigInteger('merchants_id');
            $table->unsignedBigInteger('vouchers_types_id');
            $table->string('vouchers_type');
            $table->string('title');
            $table->string('terms');
            $table->string('outlet');
            $table->date('valid_date');
            $table->date('expiry_date');
            $table->date('vouchers_created_at');
            $table->timestamps();
            $table -> foreign('merchants_id') 
            -> references('merchants_id') 
            -> on ('merchants')->onDelete('cascade');
            $table -> foreign('vouchers_types_id') 
            -> references('vouchers_types_id') 
            -> on ('vouchers_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
}
