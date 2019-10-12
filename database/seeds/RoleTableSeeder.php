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
    	$roles = [['title'=> 'merchant'], ['title' => 'owner'], ['title' => 'respondent'], ['title' => 'admin'], ['title' => 'guest']];
    	\DB::table('roles')->insert($roles);
    }
}
