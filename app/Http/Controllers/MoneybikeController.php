<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follower;
use Carbon\Carbon;
use DB;

class MoneybikeController extends Controller
{
    //
    public function otherpage(Request $request)
    {
        $other_user = User::find($request->id);
        //dd($other_user);
        
        $posts = DB::table('posts')->orderByDesc('created_at')->simplePaginate(3);
        //dd($posts);
        
        $followingCount = Follower::where('following_id', $other_user->id)->count();
        $followedCount = Follower::where('followed_id', $other_user->id)->count();
        
        foreach($posts as $post){
            $users = User::find($post->user_id);
            $post->user_name = $users->name;
            $post->image_icon = $users->image_path;
        }
        $today = Carbon::now('Asia/Tokyo');
        
        return view('moneybike.otherpage', ['other_user' => $other_user, 'today' => $today, 'posts' => $posts, 'followingCount' => $followingCount, 'followedCount' => $followedCount]);
        
    }
}
