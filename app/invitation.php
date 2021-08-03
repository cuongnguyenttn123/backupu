<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invitation extends Model
{
    protected $table = 'invitation';
    public function user()
    {
        return $this->belongsTo('App\User','u_id','no');
    }
}
