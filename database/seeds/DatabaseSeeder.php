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
        $this->call(VoucherTypeTableSeeder::class);
        $this->call(UserTableSeeder::class);
         // factory(App\User::class, 10)->create()->each(function ($user) {
         //     $user->merchants()->save(factory(App\Merchant::class)->make());
         // });
        //$users = factory(App\User::class, 1000)->create();
    
    }
}
        