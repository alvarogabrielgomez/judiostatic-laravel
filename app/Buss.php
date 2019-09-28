<?php

namespace judiostatic;

use judiostatic\Post;
use Illuminate\Database\Eloquent\Model;

class Buss extends Model
{
    protected $table = 'buss';
    protected $primaryKey = 'buss_id';
    public function getRouteKeyName()
    {
        return 'slug';
    }

     public function posts()
     {
         return $this->hasManyThrough('judiostatic\Post');
     }
}
