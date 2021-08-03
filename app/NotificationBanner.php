<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationBanner extends Model
{
    protected $table='notification_banners';
    
    protected $fillable= [
        'user_id',
        'challenge_id',
        'type'
        ];
        
        public function challenge () {
            return $this->hasOne('App\Challenge','id','challenge_id');
        }
}
