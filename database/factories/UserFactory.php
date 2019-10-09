<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Voucher::class, function (Faker $faker) {
    return [
    	'vouchers_id' => $faker->name,
        'title' => $faker->name,
        'terms' => $faker->terms,
        'outlet' => $faker->name,
        'expiry_date' => now(),
        'remember_token' => Str::random(10),
    ];
            //  $table->bigIncrements('vouchers_id');            
            // $table->unsignedBigInteger('merchants_id');
            // $table->unsignedBigInteger('vouchers_types_id');
            // $table->string('vouchers_type');
            // $table->string('title');
            // $table->string('terms');
            // $table->string('outlet');
            // $table->date('valid_date');
            // $table->date('expiry_date');
            // $table->date('vouchers_created_at');
});
