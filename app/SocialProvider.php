<?php

namespace judiostatic;

use judiostatic\User;
use Illuminate\Database\Eloquent\Model;

class SocialProvider extends Model
{
    protected $connection = 'login_system';
    protected $table = 'social_providers';
    protected $primaryKey = 'id';

    protected $fillable = [
        'provider_id', 'provider_name', 'email', 'user_id', 'active'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
