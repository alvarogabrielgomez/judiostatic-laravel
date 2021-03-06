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
        
        $this->call(RoleTableSeeder::class);
        $this->call(SocialProviderTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(BussTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(AppAuthorizedTableSeeder::class);
        $this->call(OauthClientsSeeder::class);
    }
}
