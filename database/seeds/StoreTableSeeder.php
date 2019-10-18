<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $faker = Faker::create();
    	$stores = [['merchants_id' => '1', 'name' => 'Subway Asia Jaya', 'address' => $faker->address, 'city' => $faker->city, 'status' => 'true'], ['merchants_id' => '1', 'name' => 'Subway Damansara', 'address' => $faker->address, 'city' => $faker->city, 'status' => 'true']];
    	\DB::table('stores')->insert($stores);

    }
}
