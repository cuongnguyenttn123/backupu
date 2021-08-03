<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invite extends Model
{
    protected $table='invite';
    public function user()
    {
        return $this->belongsTo('App\User','user_id','no');
    }
     protected $casts = [
        'user_id'=>'int',
    

    ];

}
