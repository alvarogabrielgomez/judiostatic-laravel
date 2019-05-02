<?php

namespace judiostatic;

use Illuminate\Database\Eloquent\Model;

class Buss extends Model
{
    protected $table = 'Buss';

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
