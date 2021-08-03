<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mlmTransection extends Model
{
    protected $table='mlm_transection';
    public function user()
    {
        return $this->belongsTo('App\User','u_id','no');
    }
}
