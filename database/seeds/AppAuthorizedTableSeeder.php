<?php

use Illuminate\Database\Seeder;
use judiostatic\AppAuthorized;

class AppAuthorizedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = new AppAuthorized();
        $table->app_id = "99";
        $table->app_name = "Unknown App";
        $table->save();

        $table = new AppAuthorized();
        $table->app_id = "1";
        $table->app_name = "Omeleth Web App";
        $table->save();

        $table = new AppAuthorized();
        $table->app_id = "2";
        $table->app_name = "Omeleth Mobile App";
        $table->save();

        $table = new AppAuthorized();
        $table->app_id = "3";
        $table->app_name = "Omeleth Api REST";
        $table->save();


    }
}
