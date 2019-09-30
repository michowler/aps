<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagUsersRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_users_roles', function (Blueprint $table) {
            $table->bigIncrements('users_roles_id');
            $table->timestamps();
            $table->foreign('users_roles_id')
                ->references('roles_id')
                ->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_users_roles');
    }
}
