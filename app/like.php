<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    protected $table='like';
    public function user()
    {
        return $this->belongsTo('App\User','u_id','no');
    }
}
