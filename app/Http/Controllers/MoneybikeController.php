<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follower;
use App\Post;
use App\Bike;
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
        $login_user = Auth::user();
        // dd($other_user->id);
        
        $posts = DB::table('posts')->orderByDesc('created_at')->simplePaginate(3);
        //dd($posts);
        
        $other_mybikes = Bike::where('user_id', $other_user->id)->get();
        // dd($other_mybikes);
        //ログインユーザーのフォロー・フォロワーユーザーの取得
        //フォローしているユーザーID。| following_id（対象） | followed_id（被対象） |で表現する為。followed_idを取得 
        $following_Users_Id = Follower::where('following_id', $other_user->id)->get('followed_id');
        //フォローされているユーザーID。| following_id（被対象） | followed_id（対象） |で表現する為。following_idを取得 
        $followed_Users_Id = Follower::where('followed_id', $other_user->id)->get('following_id');
        //取得IDを下に該当ユーザーの抽出
        $following_Users = User::find($following_Users_Id);
        $followed_Users = User::find($followed_Users_Id);
        // dd($followed_Users);
        //ログインユーザーのフォロー・フォロワーユーザーの取得：ここまで
        
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
        
        // カレンダー
        $year = '20' . date('y');
        // dd($year);
        $month = date('m');
        // dd($month);
        $today = date('d');
        
        $day_costs = Post::where('user_id', $other_user->id)->whereYear('created_at', $year)->whereMonth('created_at', $month)->get();
        // dd($day_cost);
        
        // 今月のカレンダー取得　JSON
        $url = public_path("/storage/json/$year$month.js");
        $json = '[' . file_get_contents($url) . ']';
        $calendar_day = json_decode($json,false);
        // dd($url);
        
        // 他にいい方法があるか模索中
        $total_spending = null;
        $total_spending01 = null;$total_spending02 = null;$total_spending03 = null;$total_spending04 = null;$total_spending05 = null;$total_spending06 = null;$total_spending07 = null;
        $total_spending08 = null;$total_spending09 = null;$total_spending10 = null;$total_spending11 = null;$total_spending12 = null;$total_spending13 = null;$total_spending14 = null;
        $total_spending15 = null;$total_spending16 = null;$total_spending17 = null;$total_spending18 = null;$total_spending19 = null;$total_spending20 = null;$total_spending21 = null;
        $total_spending22 = null;$total_spending23 = null;$total_spending24 = null;$total_spending25 = null;$total_spending26 = null;$total_spending27 = null;$total_spending28 = null;
        $total_spending29 = null;$total_spending30 = null;$total_spending31 = null;$total_spending32 = null;$total_spending33 = null;$total_spending34 = null;$total_spending35 = null;
        
        return view('moneybike.otherpage', ['other_user' => $other_user, 'today' => $today, 'posts' => $posts,
        'login_user' => $login_user,  'other_mybikes' => $other_mybikes,
        'following_Count' => $following_Count, 'followed_Count' => $followed_Count,
        'today' => $today, 'day_costs' => $day_costs, 'month' => $month, 'calendar_day' => $calendar_day,
        'total_spending' => $total_spending,
        'total_spending01' => $total_spending01, 'total_spending02' => $total_spending02, 'total_spending03' => $total_spending03, 'total_spending04' => $total_spending04, 'total_spending05' => $total_spending05, 'total_spending06' => $total_spending06, 'total_spending07' => $total_spending07, 
        'total_spending08' => $total_spending08, 'total_spending09' => $total_spending09, 'total_spending10' => $total_spending10, 'total_spending11' => $total_spending11, 'total_spending12' => $total_spending12, 'total_spending13' => $total_spending13, 'total_spending14' => $total_spending14, 
        'total_spending15' => $total_spending15, 'total_spending16' => $total_spending16, 'total_spending17' => $total_spending17, 'total_spending18' => $total_spending18, 'total_spending19' => $total_spending19, 'total_spending20' => $total_spending20, 'total_spending21' => $total_spending21, 
        'total_spending22' => $total_spending22, 'total_spending23' => $total_spending23, 'total_spending24' => $total_spending24, 'total_spending25' => $total_spending25, 'total_spending26' => $total_spending26, 'total_spending27' => $total_spending27, 'total_spending28' => $total_spending28, 
        'total_spending29' => $total_spending29, 'total_spending30' => $total_spending30, 'total_spending31' => $total_spending31, 'total_spending32' => $total_spending32, 'total_spending33' => $total_spending33, 'total_spending34' => $total_spending34, 'total_spending35' => $total_spending35
        ]);
        
    }
    
    public function other_followers(Request $request)
    {
        $other_user = User::find($request->id);
        
        //ログインユーザーがフォローしているか判断のために必要
        $login_user = Auth::user();
        $other_mybikes = Bike::where('user_id', $other_user->id)->get();
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
        
        return view('moneybike.following', ['other_user' => $other_user, 'login_user' => $login_user, 'other_mybikes' => $other_mybikes,
        'following_Users' => $following_Users, 'followed_Users' => $followed_Users,
        'following_Count' => $following_Count, 'followed_Count' => $followed_Count]);
    }
}
