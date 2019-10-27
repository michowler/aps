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
<<<<<<< HEAD:database/migrations/2019_09_28_152054_create_tag_owner_packages_table.php
            $table->unsignedBigInteger('packages_id');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
=======
            $table->unsignedBigInteger('packages_id');        
            $table->date('start_date');
            $table->date('end_date');
>>>>>>> 89a743f621439c9de0d425095311e3ea07509ddb:database/migrations/2019_09_27_000542_create_tag_owner_packages_table.php
            $table->timestamps();
            $table->foreign('users_id')
            ->references('users_id')
            ->on('users')->onDelete('cascade');
            $table->foreign('packages_id')
            ->references('packages_id')
            ->on('packages')->onDelete('cascade');
<<<<<<< HEAD:database/migrations/2019_09_28_152054_create_tag_owner_packages_table.php
            
=======
>>>>>>> 89a743f621439c9de0d425095311e3ea07509ddb:database/migrations/2019_09_27_000542_create_tag_owner_packages_table.php
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
