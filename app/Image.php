<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
        protected $table = "image";
        
        public function imageLikes() {
            return $this->hasMany('App\LikeImage','image_id','id');
        }
}
