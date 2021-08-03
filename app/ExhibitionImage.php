<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExhibitionImage extends Model
{
    protected $table = "exhibition_images";
    protected $fillable = [
        'user_id',
        'image_name',
        'image_height',
        'image_width',
        'ex_id',
        ];
    public function user ()
    {
        return $this->hasOne(User::class,'no','user_id');
    }
}
