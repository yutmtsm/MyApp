<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use Auth;
use Carbon\Carbon;

class MoneybikeController extends Controller
{
    public function create(){
        return view('top');
    }
    
    public function mypage(){
        $user = Auth::user();
        $today = Carbon::now('Asia/Tokyo');
        //最新順にツイートを並べる
        $posts = Post::all()->sortByDesc('created_at');
        
        return view('admin.mypage', ['user' => $user, 'today' => $today, 'posts' => $posts]);
    }
    
    public function index(Request $request){
        
    }
}
