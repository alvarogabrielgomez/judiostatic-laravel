<?php

namespace judiostatic;

use Illuminate\Database\Eloquent\Model;

class Buss extends Model
{


    public function getRouteKeyName()
    {
        return 'slug';
    }
}
