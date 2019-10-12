<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Merchant::class, function (Faker $faker) {
    return [            	    	
    	'users_id' => $faker->numberBetween(1,3),
        'merchants_address' => $faker->city,
        'merchants_phone' => $faker->phone,
        'merchants_email' => $faker->unique()->safeEmail,               
    ];
});

