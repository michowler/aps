<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagOwnerPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_owner_packages', function (Blueprint $table) {
            $table->bigIncrements('owner_packages_id');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('packages_id') -> default('1');
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();
            $table->timestamp('cancelled_on')->nullable();
            $table->integer('no_surveys');
            $table->integer('no_respondents');
            $table->integer('no_questions'); 
            $table->timestamps();
            $table->foreign('users_id')
            ->references('users_id')
            ->on('users')->onDelete('cascade');
            $table->foreign('packages_id')
            ->references('packages_id')
            ->on('packages')->onDelete('cascade');

        });
      }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_owner_packages');
    }
}
