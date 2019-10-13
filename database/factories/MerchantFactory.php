<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Merchant;
use Faker\Generator as Faker;

$factory->define(Merchant::class, function (Faker $faker) {
    return [            	    	
    	'users_id' => $faker->randomDigit,             
        'merchants_address' => $faker->city,
        'merchants_phone' => $faker->phoneNumber,
        'merchants_email' => $faker->unique()->safeEmail,               
    ];
});

