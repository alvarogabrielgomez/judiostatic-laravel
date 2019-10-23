<?php

namespace judiostatic;

use Illuminate\Database\Eloquent\Model;

class AppAuthorized extends Model
{
    protected $connection = 'login_system';

    protected $table = 'appauthorized';
    protected $primaryKey = 'app_id';
}
