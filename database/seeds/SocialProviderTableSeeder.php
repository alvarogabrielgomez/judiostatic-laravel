<?php

use Illuminate\Database\Seeder;
use judiostatic\SocialProvider;

class SocialProviderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $socialProvider = new SocialProvider();
        $socialProvider->name = "Omeleth";
        $socialProvider->description = "Omeleth Auth";
        $socialProvider->active = '1';
        $socialProvider->save();

        $socialProvider = new SocialProvider();
        $socialProvider->name = "Google";
        $socialProvider->description = "Google Auth";
        $socialProvider->active = '1';
        $socialProvider->save();

        $socialProvider = new SocialProvider();
        $socialProvider->name = "Facebook";
        $socialProvider->description = "Facebook Auth";
        $socialProvider->active = '1';
        $socialProvider->save();

    }
}
