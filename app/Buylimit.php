<?php

namespace judiostatic;

use Illuminate\Database\Eloquent\Model;

class Buylimit extends Model
{
    protected $table = 'buylimits';
    protected $primaryKey = 'limits_id';

    protected $fillable = ['buss_id', 'client_id', 'post_id'];
}
