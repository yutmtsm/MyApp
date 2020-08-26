<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'age', 'address', 'image_path'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    //1:多（User:Post）⇨User側にhasManyを定義
    public function posts(){
        return $this->hasMany('App\Post');
    }
    
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'followed_id', 'following_id');
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'followed_id');
    }
    
    //フォローするアクション
    public function follow(Int $user_id) 
    {
        return $this->follows()-attach($user->id);
    }
    
    //フォロー解除
    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }
    
    //フォローしているか
    public function isFollowing(Int $user_id)
    {
        return (boolean) $this->follows()->where('followed_id', $user_id)->first('id');
    }
    
    //フォローされているか
    public function isFollowed(Int $user_id)
    {
        return (boolean) $this->follows()->where('following_id', $user_id)->first('id');
    }
}
