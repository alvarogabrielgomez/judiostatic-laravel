<?php

namespace judiostatic;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $connection = 'login_system';
    protected $fillable = [
        'email', 'token'
    ];
}
