<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeComment extends Model
{
    public function post()
    {
        return $this->belongsTo('App\SocialPost');
    }
    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }
}
