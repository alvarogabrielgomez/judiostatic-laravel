<?php

namespace judiostatic;

use Illuminate\Database\Eloquent\Model;

class Buylimit extends Model
{
    protected $primaryKey = 'limits_id';

    protected $fillable = ['buss_id', 'client_id', 'post_id'];
}
