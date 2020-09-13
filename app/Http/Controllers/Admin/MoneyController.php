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
        $total_spending = 0;
        $total_spending01 = 0;$total_spending02 = 0;$total_spending03 = 0;$total_spending04 = 0;$total_spending05 = 0;$total_spending06 = 0;$total_spending07 = 0;
        $total_spending08 = 0;$total_spending09 = 0;$total_spending10 = 0;$total_spending11 = 0;$total_spending12 = 0;$total_spending13 = 0;$total_spending14 = 0;
        $total_spending15 = 0;$total_spending16 = 0;$total_spending17 = 0;$total_spending18 = 0;$total_spending19 = 0;$total_spending20 = 0;$total_spending21 = 0;
        $total_spending22 = 0;$total_spending23 = 0;$total_spending24 = 0;$total_spending25 = 0;$total_spending26 = 0;$total_spending27 = 0;$total_spending28 = 0;
        $total_spending29 = 0;$total_spending30 = 0;$total_spending31 = 0;
        
        //         if($post->created_at == "2020-$month-02 00:00:00"){
        //             $total_spending[]$post->created_at .":". ($post->addmission_fee + $post->purchase_cost);
        //             // dd($total_spending);
        //         }
                
            
        // }
        
        // // }
        
        // dd($total_spending);
        // $money = Money::where('date_number', $today)->get();
        $money = Money::where('date_number', $year_month)->get();
        // dd($money);
        dd($money->date_number);
        if($money->date_number != $year_month){
            // 月替り処理
            $money = new Money;
            $money->date_number = $year_month;
            $money->user_id = $user->id;
            $money->save();
        }
    
        return view('admin.money.money_management', ['posts' => $posts,
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
