<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class tag_owner_packagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $owner_packages = [['owner_packages_id' => '1','users_id' => '2'],['owner_packages_id' => '2','users_id' => '4'],['owner_packages_id' => '3','users_id' => '5'],['owner_packages_id' => '4','users_id' => '6'],['owner_packages_id' => '5','users_id' => '7'], ['owner_packages_id' => '6','users_id' => '8']];
      
        \DB::table('tag_owner_packages') -> insert($owner_packages);
    }       
}
