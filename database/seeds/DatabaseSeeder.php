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
            VoucherTypeTableSeeder::class,
            InterestTableSeeder::class, 
            PackageTableSeeder::class,
            RoleTableSeeder::class,
            UserTableSeeder::class,
            tag_owner_packagesTableSeeder::class,
            MerchantTableSeeder::class,           
            StoreTableSeeder::class,
            AdminTableSeeder::class,
            LocationTableSeeder::class,
            SurveyTableSeeder::class,
            QuestionTableSeeder::class,
            ChoiceTableSeeder::class,
            OptionTableSeeder::class,
            RespondentsOptionsTableSeeder::class                                   
        ]);
        
         // factory(App\User::class, 10)->create()->each(function ($user) {
         //     $user->merchants()->save(factory(App\Merchant::class)->make());
         // });        
    
    }
}
        
}
        