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
        $money = Money::where('date_number', $year_month)->get();
        // dd($money);
        $posts = Post::where('user_id', $user->id)->whereYear('created_at', $year)->whereMonth('created_at', $month)->simplePaginate(60);
        // $posts = DB::table('posts')->where('user_id', $user->id)->whereYear('created_at', 2020)->whereMonth('created_at', 9)->simplePaginate(30);
        // dd($posts);
        foreach($posts as $post){
            for($i = 1; $i <= 31; $i++){
                if($post->created_at == "2020-$month-$i 00:00:00"){
                    $total_spending = $post->addmission_fee + $post->purchase_cost;
                    // dd($total_spending);
                }
                
            }
        }
        
        // foreach($posts as $post){
        //     for($i = 1; $i <= 31; $i++){
        //         if($post->created_at == "2020-$month-02 00:00:00"){
        //             $post.$i = $post;
        //         }
        //     }
            
        // }
        
        // dd($post->day_post);
        // $money = Money::where('date_number', $today)->get();
        // dd($money->date_number);
        // if($money->date_number != $year_month){
        //     // 月替り処理
        //     $money = new Money;
        //     $money->date_number = $year_month;
        //     $money->user_id = $user->id;
        //     $money->save();
        // }
    
        return view('admin.money.money_management', ['posts' => $posts, 'post' => $post,
        'today' => $today, 'month' => $month,
        'total_spending' => $total_spending,
        
        ]);
    }
}
