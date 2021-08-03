<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
   public function post()
   {
       return $this->belongsTo('App\Post');
   }
   public function replies(){
       return $this->hasMany('App\Comment','parent_id','id');
   }
   public function user()
   {
       return $this->belongsTo('App\User','user_id','no');
   }
   public function likeComment()
   {
       return $this->hasMany('App\LikeComment');
   }
   public function UserLikeComment()
   {
       return $this->hasOne('App\LikeComment');
   }
}
