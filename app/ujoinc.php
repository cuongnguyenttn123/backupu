<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ujoinc extends Model
{
    protected $table = "ujoinc";
    protected function setPrimaryKey($key)
    {
      $this->primaryKey = $key;
    }
    
    public function images()
    {
      $this->setPrimaryKey('u-id');
    
      $relation = $this->hasMany(Image::class, 'u-id');
    
    
      return $relation;
    }
    
    public function user ()
    {
        return $this->hasOne(User::class,'no','u-id');
    }
}
