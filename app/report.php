<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    protected $table='report';
    public function user()
    {
        return $this->belongsTo('App\User','u_id','no');
    }
}
