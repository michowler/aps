<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        $locations_name = [
        ['locations_name'=> 'Taylors University', 'longitude' => '3.0626', 'latitude' => '101.6168'], 
        ['locations_name' => 'Sunway Pyramid', 'longitude' => '3.0727', 'latitude' => '101.6079'],
        ['locations_name' => 'MidValley', 'longitude' => '3.1184', 'latitude' => '101.6776']
    	];
    	\DB::table('locations')->insert($locations_name);
    }

}