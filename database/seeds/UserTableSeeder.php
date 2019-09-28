<?php

use Illuminate\Database\Seeder;
use judiostatic\Role;
use judiostatic\User;
use Faker\Generator as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = new Faker;
       $role_user = Role::where('name', 'user')->first();
       $role_admin = Role::where('name', 'admin')->first();

       $user = new User();
       $user->client_first = "api";
       $user->client_last = "api";
       $user->active= "0";
       $user->email = "api";
       $user->password = bcrypt('query');
       $user->email_verified_at = now();
       $user->remember_token = Str::random(10);
       $user->save();
       $user->roles()->attach($role_user);

        $user = new User();
        $user->client_first = "User";
        $user->client_last = "Name";
        $user->active= "1";
        $user->email = "user@gmail.com";
        $user->password = bcrypt('query');
        $user->email_verified_at = now();
        $user->remember_token = Str::random(10);
        $user->save();
        $user->roles()->attach($role_user);
        
        $user = new User();
        $user->client_first = "Admin";
        $user->client_last= "User";
        $user->active= "1";
        $user->email = "admin@gmail.com";
        $user->password = bcrypt('query');
        $user->email_verified_at = now();
        $user->remember_token = Str::random(10);
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
