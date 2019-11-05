<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
    	$roles = [['title'=> 'respondent'], ['title' => 'owner'], ['title' => 'merchant'], ['title' => 'admin'], ['title' => 'guest']];
    	\DB::table('roles')->insert($roles);
    }
}
