<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //https://github.com/fzaninotto/Faker#fakerproviderdatetime
        // $this->call(VoucherTypeTableSeeder::class);
        // $this->call(UserTableSeeder::class);
         factory(User::class, 50)->create()->each(function ($user) {
             $user->merchants()->save(factory(Merchant::class)->make());
         });        
    
    }
}
        