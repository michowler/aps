<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('payments_id');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('owner_packages_id');
            $table->double('amount',8,2);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('billing_address');
            $table->string('city');
            $table->string('country');
            $table->unsignedBigInteger('postal_code');
            $table->string('name_on_card');
            $table->unsignedBigInteger('card_num');
            $table->string('card_expiry');
            $table->unsignedBigInteger('sec_code');
            $table->timestamps();
            $table -> foreign('users_id') 
            -> references('users_id')
            -> on ('users')->onDelete('cascade');
            $table -> foreign('owner_packages_id') 
            -> references('owner_packages_id')
            -> on ('tag_owner_packages')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
