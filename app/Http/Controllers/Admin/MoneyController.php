<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Money;
use App\Post;
use DB;
use Auth;


class MoneyController extends Controller
{
    //
    public function add()
    {
        return view('admin.money_management');
    }
    
    public function moneypage()
    {
        $user = Auth::user();
        // dd($user->id);
        $year_month = date('y/m');
        $year = '20' . date('y');
        // dd($year);
        $month = date('m');
        // dd($month);
        $today = date('d');
        // dd($today);
        // $money = Money::where('user_id', $user->id)->get();
        $posts = Post::where('user_id', $user->id)->whereYear('created_at', $year)->whereMonth('created_at', $month)->simplePaginate(60);
        // $posts = DB::table('posts')->where('user_id', $user->id)->whereYear('created_at', 2020)->whereMonth('created_at', 9)->simplePaginate(30);
        // dd($posts);
        // foreach($posts as $post){
        // 他にいい方法があるか模索中
        $total_spending = null;
        $total_spending01 = null;$total_spending02 = null;$total_spending03 = null;$total_spending04 = null;$total_spending05 = null;$total_spending06 = null;$total_spending07 = null;
        $total_spending08 = null;$total_spending09 = null;$total_spending10 = null;$total_spending11 = null;$total_spending12 = null;$total_spending13 = null;$total_spending14 = null;
        $total_spending15 = null;$total_spending16 = null;$total_spending17 = null;$total_spending18 = null;$total_spending19 = null;$total_spending20 = null;$total_spending21 = null;
        $total_spending22 = null;$total_spending23 = null;$total_spending24 = null;$total_spending25 = null;$total_spending26 = null;$total_spending27 = null;$total_spending28 = null;
        $total_spending29 = null;$total_spending30 = null;$total_spending31 = null;
        
        $money = Money::where('date_number', $year_month)->first();
        // dd($money);
        // dd($money->date_number);
        if($money->date_number != $year_month){
            // 月替り処理
            $money = new Money;
            $money->date_number = $year_month;
            $money->user_id = $user->id;
            $money->save();
        }
    
        return view('admin.money.money_management', 
        ['posts' => $posts,
        'today' => $today, 'month' => $month,
        'total_spending' => $total_spending,
        'total_spending01' => $total_spending01, 'total_spending02' => $total_spending02, 'total_spending03' => $total_spending03, 'total_spending04' => $total_spending04, 'total_spending05' => $total_spending05, 'total_spending06' => $total_spending06, 'total_spending07' => $total_spending07, 
        'total_spending08' => $total_spending08, 'total_spending09' => $total_spending09, 'total_spending10' => $total_spending10, 'total_spending11' => $total_spending11, 'total_spending12' => $total_spending12, 'total_spending13' => $total_spending13, 'total_spending14' => $total_spending14, 
        'total_spending15' => $total_spending15, 'total_spending16' => $total_spending16, 'total_spending17' => $total_spending17, 'total_spending18' => $total_spending18, 'total_spending19' => $total_spending19, 'total_spending20' => $total_spending20, 'total_spending21' => $total_spending21, 
        'total_spending22' => $total_spending22, 'total_spending23' => $total_spending23, 'total_spending24' => $total_spending24, 'total_spending25' => $total_spending25, 'total_spending26' => $total_spending26, 'total_spending27' => $total_spending27, 'total_spending28' => $total_spending28, 
        'total_spending29' => $total_spending29, 'total_spending30' => $total_spending30, 'total_spending31' => $total_spending31
        ]);
    }
}
