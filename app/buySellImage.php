<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buySellImage extends Model
{
    
    protected $table='image';
     public function user()
    {
        return $this->hasOne('App\User','no','u-id');
    }
}
