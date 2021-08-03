<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mlm extends Model
{
    protected $table='mlm';
    public function user()
    {
        return $this->belongsTo('App\User','uid','no');
    }
}
