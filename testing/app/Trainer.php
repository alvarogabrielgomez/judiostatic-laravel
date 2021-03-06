<?php

namespace judiostatic;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = ['name', 'avatar', 'description', 'slug'];
    //Implicit Binding custom

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
