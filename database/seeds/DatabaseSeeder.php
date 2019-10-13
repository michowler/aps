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
        $this->call([
            UserTableSeeder::class,
            VoucherTypeTableSeeder::class,
            InterestTableSeeder::class
            
        ]);
        
         factory(App\User::class, 10)->create()->each(function ($user) {
             $user->merchants()->save(factory(App\Merchant::class)->make());
         });        
    
    }
}
        