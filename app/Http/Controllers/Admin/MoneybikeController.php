<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use App\Bike;
use App\Follower;
use Auth;
use DB;
use App\Money;
use Carbon\Carbon;

class MoneybikeController extends Controller
{
    public function create(){
        return view('top');
    }
    
    public function following(Request $request)
    {
        $user = Auth::user();
        
        $mybikes = Bike::where('user_id', $user->id)->get();
        // dd($mybikes);
        
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
        return view('admin.following', ['user' => $user, 'mybikes' => $mybikes,
        'following_Users' => $following_Users, 'followed_Users' => $followed_Users,
        'following_Count' => $following_Count, 'followed_Count' => $followed_Count]);
    }
    
    public function mypage()
    {
        $user = Auth::user();
        $this_month = date('y/m');
        // dd($user->id);
        $today = Carbon::now('Asia/Tokyo');
        $users = DB::table('users')->get();
        //バイク情報取得
        $mybikes = Bike::where('user_id', $user->id)->get();
        // dd($mybikes);
        //フォロー・フォロワーのカウント数：ログイン中のユーザーIDとfollowersテーブル記載のID数と一致数にて表記
        $following_Count = Follower::where('following_id', $user->id)->count();
        $followed_Count = Follower::where('followed_id', $user->id)->count();
        //フォロー・フォロワーのカウント数：ここまで
        
        //dd($followed_user);
        
        //最新順にツイートを並べる
        // $posts = Post::all()->sortByDesc('created_at');
        // $posts = DB::table('posts')->orderByDesc('created_at')->simplePaginate(30);
        // dd($posts);
        $followed_user_ids = Follower::where('following_id', $user->id)->get('followed_id'); 
         
        // dd($followed_user_ids);
        //配列の中身を出す時はwhereIn
        //folllowed_idsにログイン中の情報も追加
        // $posts = DB::table('posts')->whereYear('created_at', 2020)->whereMonth('created_at', 7)->simplePaginate(4);
        $posts = DB::table('posts')->whereIn('user_id', $followed_user_ids)->simplePaginate(4);

        foreach($posts as $post){
            $users = User::find($post->user_id);
            $post->user_name = $users->name;
            $post->image_icon = $users->image_path;
        }
        
        $year = '20' . date('y');
        // dd($year);
        $month = date('m');
        // dd($month);
        $today = date('d');
        // dd($today);
        // $money = Money::where('user_id', $user->id)->get();
        $day_costs = Post::where('user_id', $user->id)->whereYear('created_at', $year)->whereMonth('created_at', $month)->get();
        // dd($day_cost);
        
        //カレンダーのJSON
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
        $total_spending29 = null;$total_spending30 = null;$total_spending31 = null;
        
        return view('admin.mypage', ['user' => $user, 'today' => $today, 'posts' => $posts, 'post' => $post, 'users' => $users, 'mybikes' => $mybikes,
        'this_month' => $this_month,
        'following_Count' => $following_Count, 'followed_Count' => $followed_Count,
        'today' => $today, 'day_costs' => $day_costs, 'month' => $month, 'calendar_day' => $calendar_day,
        'total_spending' => $total_spending,
        'total_spending01' => $total_spending01, 'total_spending02' => $total_spending02, 'total_spending03' => $total_spending03, 'total_spending04' => $total_spending04, 'total_spending05' => $total_spending05, 'total_spending06' => $total_spending06, 'total_spending07' => $total_spending07, 
        'total_spending08' => $total_spending08, 'total_spending09' => $total_spending09, 'total_spending10' => $total_spending10, 'total_spending11' => $total_spending11, 'total_spending12' => $total_spending12, 'total_spending13' => $total_spending13, 'total_spending14' => $total_spending14, 
        'total_spending15' => $total_spending15, 'total_spending16' => $total_spending16, 'total_spending17' => $total_spending17, 'total_spending18' => $total_spending18, 'total_spending19' => $total_spending19, 'total_spending20' => $total_spending20, 'total_spending21' => $total_spending21, 
        'total_spending22' => $total_spending22, 'total_spending23' => $total_spending23, 'total_spending24' => $total_spending24, 'total_spending25' => $total_spending25, 'total_spending26' => $total_spending26, 'total_spending27' => $total_spending27, 'total_spending28' => $total_spending28, 
        'total_spending29' => $total_spending29, 'total_spending30' => $total_spending30, 'total_spending31' => $total_spending31
        ]);
    }
    
    public function spot(){
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
        
        // $all_users = DB::table('users')->get();
        $all_users = User::where('id', '!=', $user->id);
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
        
        return view('admin.spot_search', ['user' => $user, 'posts' => $posts, 'all_users' => $all_users,
        'following_Users' => $following_Users, 'followed_Users' => $followed_Users,
        'following_Count' => $following_Count, 'followed_Count' => $followed_Count,
        ]);
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
        
        // $all_users = DB::table('users')->get();
        $all_users = User::where('id', '!=', $user->id)->orderByDesc('created_at')->simplePaginate(10);
        
        //投稿記事
        $posts = DB::table('posts')->orderByDesc('created_at')->simplePaginate(3);
        foreach($posts as $post){
            $users = User::find($post->user_id);
            $post->user_name = $users->name;
            $post->image_icon = $users->image_path;
        }
        // dd($post->image_icon);;
        //投稿記事ここまで
        
        // dd($all_users);
        return view('admin.spot_search', ['user' => $user, 'posts' => $posts, 'all_users' => $all_users,
        'following_Users' => $following_Users, 'followed_Users' => $followed_Users,
        'following_Count' => $following_Count, 'followed_Count' => $followed_Count,
        ]);
    }
    
    public function spotsearch(){
        return view('admin.spot_search');
    }
    
    public function search(Request $request){
        $cond_title = $request->cond_title;
        // dd($cond_title);
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
        
        // $users = DB::table('users')->get();
        $all_users = User::where('id', '!=', $user->id)->orderByDesc('created_at')->simplePaginate(10);
        // dd($users);
        
        //検索⇨投稿記事
        if($cond_title != ''){
            // 検索されたら検索結果を取得する
            $posts = DB::table('posts')->where('spot', 'like', "%$cond_title%")->orwhere('comment', 'like', "%$cond_title%")->orderByDesc('created_at')->simplePaginate(4);
        } else {
            $posts = DB::table('posts')->orderByDesc('created_at')->simplePaginate(3);
        }
        
        // dd($posts);
        foreach($posts as $post){
            $users = User::find($post->user_id);
            $post->user_name = $users->name;
            $post->image_icon = $users->image_path;
        }
        // dd($post->image_icon);;
        //投稿記事ここまで
        
        return view('admin.spot_search', ['user' => $user, 'posts' => $posts, 'all_users' => $all_users, 'cond_title' => $cond_title,
        'following_Users' => $following_Users, 'followed_Users' => $followed_Users,
        'following_Count' => $following_Count, 'followed_Count' => $followed_Count,
        ]);
    }
}
