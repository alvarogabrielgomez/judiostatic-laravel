<?php

namespace judiostatic;

use judiostatic\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $connection = 'login_system';
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
