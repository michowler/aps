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
    	$interests_name = [['interests_name'=> 'Food & Drinks'], ['interests_name' => 'Sports'], ['interests_name' => 'Leisure'], ['interests_name' => 'Travel'], ['interests_name' => 'Health'],['interests_name'=> 'Beauty'],['interests_name'=> 'Entertainment'],['interests_name'=> 'Education'],['interests_name'=> 'Lifestyle']];
    	\DB::table('interests')->insert($interests_name);

    }
}
