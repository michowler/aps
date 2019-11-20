<?php

use Illuminate\Database\Seeder;

class VoucherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $vouchers = [['vouchers_id' => '1', 'merchants_id' => '1', 'vouchers_types_id'=> '1','title'=>'Buy 1 Free 1 Drink' , 'terms' =>'Terms and conditions apply', 'expiry_date' => now(), 'max_redeem' =>'10', 'status'=> 'valid']];


        \DB::table('vouchers') -> insert($vouchers);
    
    }
}