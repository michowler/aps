<?php

use Illuminate\Database\Seeder;


class MerchantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        
    	$merchants = [['users_id' => '1', 'merchants_name' => 'Subway', 'merchants_email' => 'subway@gmail.com', 'status' => 'true']];
    	\DB::table('merchants')->insert($merchants);

    }
}
