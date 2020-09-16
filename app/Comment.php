<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'text'
    ];
    
    public function user()
    {
    return $this->belongsTo('App\User');
    }
    
    public function posts()
    {
    return $this->belongsTo('App\Post');
    }
    
    public function getPostComment(Int $user_id)
    {
        return $this->Where('id', '<>', $user_id)->paginate(5);
    }
}
