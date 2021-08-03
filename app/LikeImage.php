<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeImage extends Model
{
     protected $table='like_picture';
     protected $fillable=[
         'user_id',
         'image_id'
         ];
}
