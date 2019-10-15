<?php

namespace judiostatic;

use judiostatic\Buss;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'post_id';

    public function buss(){
        return $this->belongsTo(Buss::class);
    }

}
