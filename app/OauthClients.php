<?php

namespace judiostatic;

use Illuminate\Database\Eloquent\Model;

class OauthClients extends Model
{
    protected $connection = 'login_system';
    protected $table = 'oauth_clients';
    protected $primaryKey = 'id';
}
