<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id', 'title', 'tweet'
    ];
}
