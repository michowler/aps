<?php

use Illuminate\Database\Seeder;

class VoucherTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
    	$vouchers_type = [['vouchers_type'=> 'cash', 'status' => 'true'], ['vouchers_type' => 'rebate', 'status' => 'true'], ['vouchers_type' => 'gift', 'status' => 'true'], ['vouchers_type' => 'free', 'status' => 'true'], ['vouchers_type' => 'deals', 'status' => 'true']];
    	\DB::table('vouchers_types')->insert($vouchers_type);

    }
}
