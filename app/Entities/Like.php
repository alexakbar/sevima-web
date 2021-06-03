<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Entities\User','user_id','id');
    }
}
