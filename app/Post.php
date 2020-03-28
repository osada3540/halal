<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function favorite_users()
    {
        return $this->belongsToMany(User::class, 'favorites', 'post_id','user_id');
    }
}
