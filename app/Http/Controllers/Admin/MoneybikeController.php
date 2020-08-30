<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use Auth;
use DB;
use Carbon\Carbon;

class MoneybikeController extends Controller
{
    public function create(){
        return view('top');
    }
    
    public function following(Request $request){
        $user = Auth::user();
        //dd($user);
        $users = DB::table('users')->simplePaginate(10);
        //dd($users->image_path);
        //dd($post->path);
        //dd($post->user_name);
        return view('admin.following', ['user' => $user, 'users' => $users]);
    }
    
    public function mypage(){
        $user = Auth::user();
        //dd($user);
        $today = Carbon::now('Asia/Tokyo');
        $users = DB::table('users')->get();
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
        return view('admin.mypage', ['user' => $user, 'today' => $today, 'posts' => $posts, 'users' => $users]);
    }
    
    public function index(Request $request){
        
    }
}
