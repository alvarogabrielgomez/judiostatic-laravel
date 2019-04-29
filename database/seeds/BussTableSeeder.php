<?php

use Illuminate\Database\Seeder;
use judiostatic\Buss;

class BussTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Buss();
        $user->buss_name = "Mollis Vehicula";
        $user->buss_dir = "1622  Adams Avenue, Frederick MD, 21701";
        $user->buss_phone = "11111111111111";
        $user->buss_url = "https://ckj.one";
        $user->cover_url = "images/buss/buss1.jpg";
        $user->active = "1";
        $user->buss_limit = "4";
        $user->save();

        $user = new Buss();
        $user->buss_name = "Vallar Vergulis";
        $user->buss_dir = "4592  Game Of Thrones, Sin Rostro, 33433";
        $user->buss_phone = "22222222222222";
        $user->buss_url = "https://ckj.one";
        $user->cover_url = "images/buss/buss1.jpg";
        $user->active = "1";
        $user->buss_limit = "4";
        $user->save();

        $user = new Buss();
        $user->buss_name = "Pizza Box Boyz";
        $user->buss_dir = "Directo en tu corazon";
        $user->buss_phone = "333333333333";
        $user->buss_url = "https://ckj.one";
        $user->cover_url = "images/buss/buss1.jpg";
        $user->active = "1";
        $user->buss_limit = "4";
        $user->save();
    }
}
