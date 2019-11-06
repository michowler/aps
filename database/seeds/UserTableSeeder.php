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

        $user = User::create(['name'=> 'Michelle', 'email' => 'm@gmail.com', 'password' => bcrypt('123123123'), 'email_verified_at' => now(), 'remember_token' => Str::random(10)]);
        // $users[$user->users_id] = $user;
        // $user = User::create(['id' => 2, 'blah' => 'honk']);
        // $users[$user->id] = $user;        

        // $roles = [];
        $role = Role::where('roles_id', '=', 3)->get();          
        // $roles[$role->roles_id] = $role;        

        $user->roles()->attach($role); //sync roles_id
        // $user[1]->roles()->sync([2,3]);        
    }

    // public function run()
    // {
    //     $michelle = User::create(['id' => 1, 'blah' => 'honk']);
    //     $michelle = [['name'=> 'Michelle', 'email' => 'm@gmail.com', 'password' => bcrypt('123123123'), 'email_verified_at' => now(), 'remember_token' => Str::random(10)]];
    //     \DB::table('users')->insert($michelle);
    //     $role = Role::where('roles_id', '=', 3)->get();  
    //     $michelle::findOrFail($michelle->users_id)->roles()->sync($role);               
    
    // }
}
