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
            $table->unsignedBigInteger('surveys_id');
            $table->integer('no_respondent');
            $table->integer('no_surveys');
            $table->timestamps();
            $table->foreign('users_id')
            ->references('users_id')
            ->on('users');
            $table->foreign('surveys_id')
            ->references('surveys_id')
            ->on('surveys');
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
