<?php

namespace judiostatic;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'transaction_id';

    protected $fillable = ['post_id', 'buss_id', 'client_id', 'transaction_qr'];





}
