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
    	$stores = [['merchants_id' => '1', 'name' => 'Subway Brem Mall', 'address' => 'No. G-06, Brem Mall, Wilayah Persekutuan, Jalan Kepong, 52000 Kuala Lumpur', 'city' => 'Kuala Lumpur', 'status' => 'true'], ['merchants_id' => '1', 'name' => 'Subway Tesco Kepong Village', 'address' => 'Kepong Village Mall, 3, Jalan 7A/62A, Bandar Menjalara, 52200 Kuala Lumpur, Wilayah Persekutuan', 'city' => 'Kuala Lumpur', 'status' => 'true'], ['merchants_id' => '1', 'name' => 'Subway Damansara Perdana', 'address' => 'Metropolitan Square, D-S-G-01, Jalan PJU 8/1, Damansara Perdana, 47820 Petaling Jaya, Selangor', 'city' => 'Kuala Lumpur', 'status' => 'true'], ['merchants_id' => '1', 'name' => 'Subway NKVE', 'address' => 'Lot 15385KM 15.3, NKVE Sungai Buloh, Taman Putra Damai, 47000 Sungai Buloh, Selangor', 'city' => 'Kuala Lumpur', 'status' => 'true']];
    	\DB::table('stores')->insert($stores);

    }
}
