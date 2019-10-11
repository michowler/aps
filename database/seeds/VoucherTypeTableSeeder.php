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
    	$vouchers_type = [['vouchers_type'=> 'cash'], ['vouchers_type' => 'rebate'], ['vouchers_type' => 'gift'], ['vouchers_type' => 'free'], ['vouchers_type' => 'deals']];
    	\DB::table('vouchers_types')->insert($vouchers_type);

    }
}
