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
    
    public function following(Request $request){
        //dd($request);
        $user = Auth::user();
        $users = DB::table('users')->get();
        // dd($users->name);
        //フォローしているユーザーのID取得
        $following_Users = Follower::where('following_id', $user->id)->get();
        $followed_Users = Follower::where('followed_id', $user->id)->get();
        // dd($users);
        $following_User = User::find($following_Users);
        dd($following_User);
        
        $followingCount = Follower::where('following_id', $user->id)->count();
        $followedCount = Follower::where('followed_id', $user->id)->count();
        //dd($users->image_path);
        //dd($post->path);
        //dd($post->user_name);
        return view('admin.following', ['user' => $user, 'following_User' => $following_User, 'followed_User' => $followed_User, 'followingCount' => $followingCount, 'followedCount' => $followedCount]);
    }
    
    public function mypage(){
        $user = Auth::user();
        //dd($user);
        $today = Carbon::now('Asia/Tokyo');
        $users = DB::table('users')->get();
        
        $followingCount = Follower::where('following_id', $user->id)->count();
        $followedCount = Follower::where('followed_id', $user->id)->count();
        //dd($followingCount);
        //最新順にツイートを並べる
        // $posts = Post::all()->sortByDesc('created_at');
        $posts = DB::table('posts')->orderByDesc('created_at')->simplePaginate(3);
        //dd($posts);
        foreach($posts as $post){
            $users = User::find($post->user_id);
            $post->user_name = $users->name;
            $post->image_icon = $users->image_path;
        }
        
        //dd($post->path);
        //dd($post->user_name);
        //dd($posts);
        return view('admin.mypage', ['user' => $user, 'today' => $today, 'posts' => $posts, 'users' => $users, 'followingCount' => $followingCount, 'followedCount' => $followedCount]);
    }
    
    public function index(Request $request){
        
    }
}
