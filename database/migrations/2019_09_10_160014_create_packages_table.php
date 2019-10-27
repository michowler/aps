<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('packages_id');
            $table->string('packages_name',45);
            $table->string('package_description');
            $table->double('package_price');
            $table->integer('no_surveys');
            $table->integer('no_respondents');
<<<<<<< HEAD:database/migrations/2019_09_27_160014_create_packages_table.php
            $table->dateTime('created_at');
=======
            $table->date('created_date');
>>>>>>> 89a743f621439c9de0d425095311e3ea07509ddb:database/migrations/2019_09_10_160014_create_packages_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
