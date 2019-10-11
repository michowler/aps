<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Voucher::class, function (Faker $faker) {
    return [            	
    	'merchants_id' => $faker->numberBetween(1,5),
    	'vouchers_types_id' => $faker->numberBetween(1,5),
        'title' => $faker->word,
        'terms' => $faker->paragraph,
        'outlet' => $faker->region,
        'expiry_date' => now(),        
    ];
});