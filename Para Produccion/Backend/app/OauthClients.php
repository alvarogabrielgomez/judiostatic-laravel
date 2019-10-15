<?php

namespace judiostatic;

use Illuminate\Database\Eloquent\Model;

class OauthClients extends Model
{
    protected $table = 'oauth_clients';
    protected $primaryKey = 'id';
}
