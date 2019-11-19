<?php

use Illuminate\Database\Seeder;

class PackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $packages = [['packages_id' => '1', 'packages_name' => 'Free', 'package_price' => '0','no_surveys' => '20', 'no_respondents' => '50', 'no_questions' => '10'],['packages_id' => '2', 'packages_name' => 'Paid', 'package_price' => '100','no_surveys' => '-1', 'no_respondents' => '-1', 'no_questions' => '-1']];

    \DB::table('packages') -> insert($packages);
    
    }
}
