<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class withdraw extends Model
{
    protected $table='withdraw';
    public function user()
    {
        return $this->belongsTo('App\User','user_id','no');
    }
}
