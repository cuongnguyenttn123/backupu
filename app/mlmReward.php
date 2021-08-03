<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mlmReward extends Model
{
    protected $table='mlm_rewards';
    public function user()
    {
        return $this->belongsTo('App\User','uid','no');
    }
}
