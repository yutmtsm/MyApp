<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use App\Follower;
use Auth;
use DB;
use Carbon\Carbon;

class MoneybikeController extends Controller
{
    public function create(){
        return view('top');
    }
    
    public function following(Request $request)
    {
        $user = Auth::user();
        
        //ログインユーザーのフォロー・フォロワーユーザーの取得
        //フォローしているユーザーID。| following_id（対象） | followed_id（被対象） |で表現する為。followed_idを取得 
        $following_Users_Id = Follower::where('following_id', $user->id)->get('followed_id');
        //フォローされているユーザーID。| following_id（被対象） | followed_id（対象） |で表現する為。following_idを取得 
        $followed_Users_Id = Follower::where('followed_id', $user->id)->get('following_id');
        //取得IDを下に該当ユーザーの抽出
        $following_Users = User::find($following_Users_Id);
        $followed_Users = User::find($followed_Users_Id);
        //dd($followed_Users);
        //ログインユーザーのフォロー・フォロワーユーザーの取得：ここまで
        
        //フォロー・フォロワーのカウント数：ログイン中のユーザーIDとfollowersテーブル記載のID数と一致数にて表記
        $following_Count = Follower::where('following_id', $user->id)->count();
        $followed_Count = Follower::where('followed_id', $user->id)->count();
        //フォロー・フォロワーのカウント数：ここまで
        
        //dd($users->image_path);
        //dd($post->path);
        //dd($post->user_name);
        return view('admin.following', ['user' => $user,
        'following_Users' => $following_Users, 'followed_Users' => $followed_Users,
        'following_Count' => $following_Count, 'followed_Count' => $followed_Count]);
    }
    
    public function mypage()
    {
        $user = Auth::user();
        //dd($user);
        $today = Carbon::now('Asia/Tokyo');
        $users = DB::table('users')->get();
        
        //フォロー・フォロワーのカウント数：ログイン中のユーザーIDとfollowersテーブル記載のID数と一致数にて表記
        $following_Count = Follower::where('following_id', $user->id)->count();
        $followed_Count = Follower::where('followed_id', $user->id)->count();
        //フォロー・フォロワーのカウント数：ここまで
        
        //最新順にツイートを並べる
        // $posts = Post::all()->sortByDesc('created_at');
        $posts = DB::table('posts')->orderByDesc('created_at')->simplePaginate(3);
        // $followed_ids = Follower::where('followed_id', $user->id)->get('following_id');
        //dd($followed_ids);
        // $posts = Post::where('user_id',$followed_ids )->orderByDesc('created_at')->simplePaginate(3);
        //dd($posts);
        foreach($posts as $post){
            $users = User::find($post->user_id);
            $post->user_name = $users->name;
            $post->image_icon = $users->image_path;
        }
        
        //dd($post->path);
        //dd($post->user_name);
        //dd($posts);
        return view('admin.mypage', ['user' => $user, 'today' => $today, 'posts' => $posts, 'users' => $users,
        'following_Count' => $following_Count, 'followed_Count' => $followed_Count]);
    }
    
    public function spot_search()
    {
        $user = Auth::user();
        // dd($user)
        
        //ログインユーザーのフォロー・フォロワーユーザーの取得
        //フォローしているユーザーID。| following_id（対象） | followed_id（被対象） |で表現する為。followed_idを取得 
        $following_Users_Id = Follower::where('following_id', $user->id)->get('followed_id');
        //フォローされているユーザーID。| following_id（被対象） | followed_id（対象） |で表現する為。following_idを取得 
        $followed_Users_Id = Follower::where('followed_id', $user->id)->get('following_id');
        //取得IDを下に該当ユーザーの抽出
        $following_Users = User::find($following_Users_Id);
        $followed_Users = User::find($followed_Users_Id);
        //dd($followed_Users);
        //ログインユーザーのフォロー・フォロワーユーザーの取得：ここまで
        
        //フォロー・フォロワーのカウント数：ログイン中のユーザーIDとfollowersテーブル記載のID数と一致数にて表記
        $following_Count = Follower::where('following_id', $user->id)->count();
        $followed_Count = Follower::where('followed_id', $user->id)->count();
        //フォロー・フォロワーのカウント数：ここまで
        
        $users = DB::table('users')->get();
        // dd($users);
        //投稿記事
        $posts = DB::table('posts')->orderByDesc('created_at')->simplePaginate(3);
        foreach($posts as $post){
            $users = User::find($post->user_id);
            $post->user_name = $users->name;
            $post->image_icon = $users->image_path;
        }
        // dd($post->image_icon);;
        //投稿記事ここまで
        
        return view('admin.spot_search', ['user' => $user, 'posts' => $posts,
        'following_Users' => $following_Users, 'followed_Users' => $followed_Users,
        'following_Count' => $following_Count, 'followed_Count' => $followed_Count]);
    }
    public function index(Request $request){
        
    }
}
