<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    public static $directory_image = 'files/post/';

    public function user()
    {
        return $this->belongsTo('App\Entities\User','user_id','id');
    }

    public function like()
    {
        return $this->hasMany('App\Entities\Like', 'post_id','id');
    }

    public function comment()
    {
        return $this->hasMany('App\Entities\Comment', 'post_id','id');
    }
}
