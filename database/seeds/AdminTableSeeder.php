<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles_admins=Role :: where('title','admin')->first();

        $admins = new Admin();
        $admins -> name='AliceAdmin';
        //$admins -> age='22';
        $admins -> email='aliceng_210@hotmail.com';
        $admins -> password =bcrypt('123456789');
        $admins -> save();

    }
}
