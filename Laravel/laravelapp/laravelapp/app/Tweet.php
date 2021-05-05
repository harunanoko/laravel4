<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tweet extends Model
{
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function like()
    {
        return $this->hasMany(Like::class);
    }

    public function is_liked_by_auth_user()
    {
        $id = Auth::id();

        $likers = array();
        foreach($this->like as $like) {
            array_push($likers, $like->user_id);
        }

        if(in_array($id, $likers)){
            return true;
        } else {
            return false;
        }
    }

    protected $fillable = [
        'id', 'user_id', 'title', 'tweet'
    ];
}
