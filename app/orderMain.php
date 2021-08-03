<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderMain extends Model
{
    protected $table='order_main';
    public function user()
    {
        return $this->belongsTo('App\User','buyer_id','no');
    }
}
