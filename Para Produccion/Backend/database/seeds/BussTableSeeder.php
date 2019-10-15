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
        $buss = new Buss();
        $buss->buss_name = "Mollis Vehicula";
        $buss->buss_dir = "1622  Adams Avenue, Frederick MD, 21701";
        $buss->buss_phone = "11111111111111";
        $buss->buss_url = "https://ckj.one";
        $buss->cover_url = "images/buss/buss1.jpg";
        $buss->active = "1";
        $buss->buss_limits = "4";
        $buss->save();

        $buss = new Buss();
        $buss->buss_name = "Vallar Vergulis";
        $buss->buss_dir = "4592  Game Of Thrones, Sin Rostro, 33433";
        $buss->buss_phone = "22222222222222";
        $buss->buss_url = "https://ckj.one";
        $buss->cover_url = "images/buss/buss1.jpg";
        $buss->active = "1";
        $buss->buss_limits = "4";
        $buss->save();

        $buss = new Buss();
        $buss->buss_name = "Pizza Box Boyz";
        $buss->buss_dir = "Directo en tu corazon";
        $buss->buss_phone = "333333333333";
        $buss->buss_url = "https://ckj.one";
        $buss->cover_url = "images/buss/buss1.jpg";
        $buss->active = "1";
        $buss->buss_limits = "4";
        $buss->save();
    }
}
