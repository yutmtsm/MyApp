<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follower;
use Carbon\Carbon;
use DB;
use Auth;

class MoneybikeController extends Controller
{
    //
    public function otherpage(Request $request)
    {
        // dd($request->id);
        $other_user = User::find($request->id);
        //dd($other_user);
        
        $posts = DB::table('posts')->orderByDesc('created_at')->simplePaginate(3);
        //dd($posts);
        
        //フォロー・フォロワーのカウント数：ログイン中のユーザーIDとfollowersテーブル記載のID数と一致数にて表記
        $following_Count = Follower::where('following_id', $other_user->id)->count();
        $followed_Count = Follower::where('followed_id', $other_user->id)->count();
        //フォロー・フォロワーのカウント数：ここまで
        
        foreach($posts as $post){
            $users = User::find($post->user_id);
            $post->user_name = $users->name;
            $post->image_icon = $users->image_path;
        }
        $today = Carbon::now('Asia/Tokyo');
        
        return view('moneybike.otherpage', ['other_user' => $other_user, 'today' => $today, 'posts' => $posts,
        'following_Count' => $following_Count, 'followed_Count' => $followed_Count]);
        
    }
    
    public function other_followers(Request $request)
    {
        $other_user = User::find($request->id);
        
        //ログインユーザーがフォローしているか判断のために必要
        $user = Auth::user();
        // dd($user);
        //ログインユーザーのフォロー・フォロワーユーザーの取得
        //フォローしているユーザーID。| following_id（対象） | followed_id（被対象） |で表現する為。followed_idを取得 
        $following_Users_Id = Follower::where('following_id', $other_user->id)->get('followed_id');
        //フォローされているユーザーID。| following_id（被対象） | followed_id（対象） |で表現する為。following_idを取得 
        $followed_Users_Id = Follower::where('followed_id', $other_user->id)->get('following_id');
        // dd($followed_Users_Id);
        //取得IDを下に該当ユーザーの抽出
        $following_Users = User::find($following_Users_Id);
        $followed_Users = User::find($followed_Users_Id);
        //dd($followed_Users);
        //ログインユーザーのフォロー・フォロワーユーザーの取得：ここまで
        
        //フォロー・フォロワーのカウント数：ログイン中のユーザーIDとfollowersテーブル記載のID数と一致数にて表記
        $following_Count = Follower::where('following_id', $other_user->id)->count();
        $followed_Count = Follower::where('followed_id', $other_user->id)->count();
        //フォロー・フォロワーのカウント数：ここまで
        
        return view('moneybike.following', ['other_user' => $other_user, 'user' => $user,
        'following_Users' => $following_Users, 'followed_Users' => $followed_Users,
        'following_Count' => $following_Count, 'followed_Count' => $followed_Count]);
    }
}
