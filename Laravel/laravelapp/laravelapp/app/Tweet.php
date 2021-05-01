<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function like()
    {
        return $this->hasMany(Like::class);
    }

    protected $fillable = [
        'id', 'user_id', 'title', 'tweet'
    ];
}
