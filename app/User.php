<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $primaryKey ='no';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
     public function followers()
    {
        return $this->belongsToMany('App\User','followers','user_id','follower_id');
    }

    public function userpix()
    {
        return $this->hasOne('App\userpix','u-id','no');
    }

    public function followings()
    {
        return $this->hasMany('App\Follower','user_id','no');
    }
    public function following()
    {
        return $this->hasMany('App\Follower','user_id','no');
    }
    
    public function user_images()
    {
        return $this->hasMany('App\buySellImage','u-id','no');
    }
}
