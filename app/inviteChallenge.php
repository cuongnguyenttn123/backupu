<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inviteChallenge extends Model
{
    protected $table='invite_challenge';
    public function user()
    {
        return $this->belongsTo('App\User','user_id','no');
    }
}
