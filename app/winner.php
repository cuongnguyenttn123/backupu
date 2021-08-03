<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class winner extends Model
{
    protected $table='winner';
    public function user()
    {
        return $this->belongsTo('App\User','u_id','no');
    }
    
     public function challenge () {
            return $this->hasOne('App\Challenge','id','c_id');
        }
}
