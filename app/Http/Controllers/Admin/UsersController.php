<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    //フォローボタンを押した時に実行
    public function follow(Request $request)
    {
        //対象のユーザーを特定
        $user = User::find($request->id);
        $follower = auth()->user();
        //dd($follower);
        //フォローしているか⇨ログインユーザーのisFollowing内にidがあるかどうか
        //つまり、フォローしているかどうか
        $is_followimg = $follower->isFollowing($user->id);
        //dd($is_followimg);
        if(!$is_followimg){
            //上が通るのでフォローされていないから、フォローするする処理
            //follow()関数がUserModelにて定義されている。
            //dd($user->id);
            $follower->follow($user->id);
            return back();
        }
        
    }
    
     //フォロー解除
    public function unfollow(Request $request)
    {
        $user = User::find($request->id);
        $follower = auth()->user();
        //フォローしているか⇨ログインユーザーのisFollowing内にidがあるかどうか
        //つまり、フォローされているかどうか
        $is_following = $follower->isFollowing($user->id);
        
        if($is_following){
            //unfollow()関数がUserModelにて定義されている。
            $follower->unfollow($user->id);
            return back();
        }
    }
}
