<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $table='transaction';
    public function user()
    {
        return $this->belongsTo('App\User','tech_id','no');
    }
}
