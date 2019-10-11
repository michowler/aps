<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $michelle = [['name'=> 'Michelle', 'email' => 'm@gmail.com', 'password' => bcrypt('123123123'), 'email_verified_at' => now(), 'remember_token' => Str::random(10)]];
        \DB::table('users')->insert($michelle);
    }
}
