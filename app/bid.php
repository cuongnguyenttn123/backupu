<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bid extends Model
{
    protected $table = 'bid';

    public function seller()
    {
        return $this->belongsTo('App\User','seller_id','no');
    }
    public function buyer()
    {
        return $this->belongsTo('App\User','buyer_id','no');
    }
}
