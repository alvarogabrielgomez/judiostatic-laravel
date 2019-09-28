<?php

use Illuminate\Database\Seeder;
use judiostatic\OauthClients;

class OauthClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $oauth_clients = new OauthClients();
        $oauth_clients->name = "Omeleth API";
        $oauth_clients->secret = "hRPc3SijxUDtN53wuwMNdQyEk6V3QIo8Oc9xTsqo";
        $oauth_clients->redirect = "https://omeleth.com/api/v1/callback";
        $oauth_clients->personal_access_client = 0;
        $oauth_clients->password_client = 0;
        $oauth_clients->revoked = 0;
        $oauth_clients->save();
    }
}
