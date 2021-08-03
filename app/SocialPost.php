<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialPost extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User','user_id','no');
    }

    public function likePost()
    {
        return $this->hasOne('App\LikeSocialPost','post_id');
    }

    public function likePosts()
    {
        return $this->hasMany('App\LikeSocialPost','post_id');
    }

    public function postComments()
    {
        return $this->hasMany('App\Comment','post_id');
    }

    public function likeComments()
    {
        return $this->hasMany('App\LikeComment');
    }
    public function postReports()
    {
        return $this->hasMany('App\PostReport','social_post_id');
    }



}
