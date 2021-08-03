<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
    protected $table='vote';
    public function user()
    {
        return $this->belongsTo('App\User','u-id','no');
    }
}
