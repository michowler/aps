<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MerchantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $faker = Faker::create();
    	$merchants = [['users_id' => '1', 'merchants_address' => $faker->address, 'merchants_phone' => $faker->phoneNumber, 'merchants_email' => $faker->unique()->safeEmail, 'status' => 'true']];
    	\DB::table('merchants')->insert($merchants);

    }
}
