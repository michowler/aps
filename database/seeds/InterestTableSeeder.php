<?php

use Illuminate\Database\Seeder;

class InterestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
    	$interests_name = [['interests_name'=> 'Food & Drinks', 'status' => 'true'], ['interests_name' => 'Sports', 'status' => 'true'], ['interests_name' => 'Leisure', 'status' => 'true'], ['interests_name' => 'Travel', 'status' => 'true'], ['interests_name' => 'Health', 'status' => 'true'],['interests_name'=> 'Beauty', 'status' => 'true'],['interests_name'=> 'Entertainment', 'status' => 'true'],['interests_name'=> 'Education', 'status' => 'true'],['interests_name'=> 'Lifestyle', 'status' => 'true']];
    	\DB::table('interests')->insert($interests_name);

    }
}
