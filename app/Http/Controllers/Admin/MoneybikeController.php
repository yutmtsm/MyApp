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
    
    public function mypage(){
        $user = Auth::user();
        //dd($user);
        $today = Carbon::now('Asia/Tokyo');
        //最新順にツイートを並べる
        // $posts = Post::all()->sortByDesc('created_at');
        $posts = DB::table('posts')->orderByDesc('created_at')->simplePaginate(3);
        //dd($posts);
        return view('admin.mypage', ['user' => $user, 'today' => $today, 'posts' => $posts]);
    }
    
    public function index(Request $request){
        
    }
}
