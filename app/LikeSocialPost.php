<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeSocialPost extends Model
{
    public function post()
    {
        return $this->belongsTo('App\SocialPost');
    }
}
