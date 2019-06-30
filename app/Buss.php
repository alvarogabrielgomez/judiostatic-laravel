<?php

namespace judiostatic;

use Illuminate\Database\Eloquent\Model;

class Buss extends Model
{
    protected $table = 'buss';
    protected $primaryKey = 'buss_id';
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
