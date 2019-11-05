<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('users_id');
            $table->string('name');
            $table->string('email');
            $table->string('age')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();           
            $table->string('gender')->nullable();            
            $table->string('education_level')->nullable();          
            $table->string('working_level')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('occupation')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
