<?php

use App\User;
use App\Role;
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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users');
        DB::table('roles');
        DB::table('tag_users_roles');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // $users = [];

        $merchant = User::create(['name'=> 'Subway', 'email' => 'm@gmail.com', 'password' => bcrypt('123123123'), 'email_verified_at' => now(), 'remember_token' => Str::random(10)]);
        $owner = User::create(['name'=> 'Michelle Owner', 'email' => 'o@gmail.com', 'password' => bcrypt('123123123'), 'email_verified_at' => now(), 'remember_token' => Str::random(10)]);
        $res = User::create(['name'=> 'Michelle Res', 'email' => 'r@gmail.com', 'password' => bcrypt('123123123'), 'email_verified_at' => now(), 'remember_token' => Str::random(10)]);
        // $users[$user->users_id] = $user;
        // $user = User::create(['id' => 2, 'blah' => 'honk']);
        // $users[$user->id] = $user;        

        $user = User::create(['name'=> 'tes', 'email' => 'test@gmail.com', 'password' => bcrypt('123123123'), 'email_verified_at' => now(), 'remember_token' => Str::random(10)]);

        $user2 = User::create(['name'=> 'test2', 'email' => 'test2@gmail.com', 'password' => bcrypt('123123123'), 'email_verified_at' => now(), 'remember_token' => Str::random(10)]);

        $user3 = User::create(['name'=> 'test3', 'email' => 'test3@gmail.com', 'password' => bcrypt('123123123'), 'email_verified_at' => now(), 'remember_token' => Str::random(10)]);

        $user4 = User::create(['name'=> 'test4', 'email' => 'test4@gmail.com', 'password' => bcrypt('123123123'), 'email_verified_at' => now(), 'remember_token' => Str::random(10)]);

        $user5 = User::create(['name'=> 'test5', 'email' => 'test5@gmail.com', 'password' => bcrypt('123123123'), 'email_verified_at' => now(), 'remember_token' => Str::random(10)]);

        // $roles = [];
        $role3 = Role::where('roles_id', '=', 3)->get();          
        $role2 = Role::where('roles_id', '=', 2)->get(); 
        $role1 = Role::where('roles_id', '=', 1)->get();          
        // $roles[$role->roles_id] = $role;        

        $merchant->roles()->attach($role3); //sync roles_id
        $owner->roles()->attach($role2); //sync roles_id
        $res->roles()->attach($role1);
        // $res->vouchers()->attach($voucher1);
        // $user[1]->roles()->sync([2,3]);        

        $user->roles()->attach($role); //sync roles_id
        $user2->roles()->attach($role2);
        $user3->roles()->attach($role3);
        $user4->roles()->attach($role4);
        $user5->roles()->attach($role5);
    }

}
