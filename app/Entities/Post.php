<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use SoftDeletes;
    
    public static $directory_image = 'files/post/';
}
