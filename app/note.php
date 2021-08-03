<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class note extends Model
{
    protected $table='note';
    public function user()
    {
        return $this->belongsTo('App\User','t_id','no');
    }
}
