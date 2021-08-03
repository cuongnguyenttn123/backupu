<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class deposit extends Model
{
    protected $table ='deposit';
    public function user()
    {
        return $this->belongsTo('App\User','user_id','no');
    }
}
