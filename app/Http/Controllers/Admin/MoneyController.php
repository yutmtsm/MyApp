<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Money;
use App\Post;
use App\Bike;
use DB;
use Auth;


class MoneyController extends Controller
{
    //
    public function add_money()
    {
        return view('admin.money_management');
    }
    
    public function moneypage()
    {
        $user = Auth::user();
        $mybikes = Bike::where('user_id', $user->id)->get();
        // dd($mybikes);
        $year_month = date('y/m');
        $year = '20' . date('y');
        // dd($year);
        $month = date('m');
        // dd($month);
        $today = date('d');
        // dd($today);
        // $money = Money::where('user_id', $user->id)->get();
        $posts = Post::where('user_id', $user->id)->whereYear('created_at', $year)->whereMonth('created_at', $month)->get();
        // $posts = DB::table('posts')->where('user_id', $user->id)->whereYear('created_at', 2020)->whereMonth('created_at', 9)->simplePaginate(30);
    //   dd($posts);
        
        //カレンダーのJSON
        $url = public_path("/storage/json/$year$month.js");
        $json = '[' . file_get_contents($url) . ']';
        $calendar_day = json_decode($json,false);
        // dd($calendar_dayi);
        
        
        // 他にいい方法があるか模索中
        $total_spending = null;
        $total_spending01 = null;$total_spending02 = null;$total_spending03 = null;$total_spending04 = null;$total_spending05 = null;$total_spending06 = null;$total_spending07 = null;
        $total_spending08 = null;$total_spending09 = null;$total_spending10 = null;$total_spending11 = null;$total_spending12 = null;$total_spending13 = null;$total_spending14 = null;
        $total_spending15 = null;$total_spending16 = null;$total_spending17 = null;$total_spending18 = null;$total_spending19 = null;$total_spending20 = null;$total_spending21 = null;
        $total_spending22 = null;$total_spending23 = null;$total_spending24 = null;$total_spending25 = null;$total_spending26 = null;$total_spending27 = null;$total_spending28 = null;
        $total_spending29 = null;$total_spending30 = null;$total_spending31 = null;$total_spending32 = null;$total_spending33 = null;$total_spending34 = null;$total_spending35 = null;
        
        
        $money = Money::where('date_number', $year_month)->first();
        
        $year_moneys = Post::whereBetween('created_at', ['2020-01-01 00:00:00', '2020-12-31 00:00:00'])->get();
        $month_moneys = Post::whereBetween('created_at', ['2020-09-01 00:00:00', '2020-09-31 00:00:00'])->get();
        // dd($month_moneys);
        
        foreach($mybikes as $mybike){
            $total_light_vehicle_tax = $mybike->sum('light_vehicle_tax');
            $total_weight_tax = $mybike->sum('weight_tax');
            $total_liability_insurance = $mybike->sum('liability_insurance');
            $total_voluntary_insurance = $mybike->sum('voluntary_insurance');
            $total_vehicle_inspection = $mybike->sum('vehicle_inspection');
            $total_parking_fee = $mybike->sum('parking_fee');
            $total_consumables = $mybike->sum('consumables');
            // dd($total_weight_tax);
        }
        
        $money->total_addmission_fee = $posts->sum('addmission_fee');
        $money->total_purchase_cost = $posts->sum('purchase_cost');
        $money->travel_expenses = $money->total_addmission_fee + $money->total_purchase_cost;
        $money->variable_cost = $total_voluntary_insurance + $total_vehicle_inspection + $total_parking_fee + $total_consumables;
        $money->fixed_cost = $total_light_vehicle_tax + $total_weight_tax + $total_liability_insurance;
        $money->spending_month = $money->travel_expenses + $money->variable_cost/12 + $money->fixed_cost/12;
        // dd($money->spending_month);
        
        $money->save();
        // dd($money->total_purchase_cost);
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
        'today' => $today, 'month' => $month, 'calendar_day' => $calendar_day,
        'total_spending' => $total_spending,
        'total_spending01' => $total_spending01, 'total_spending02' => $total_spending02, 'total_spending03' => $total_spending03, 'total_spending04' => $total_spending04, 'total_spending05' => $total_spending05, 'total_spending06' => $total_spending06, 'total_spending07' => $total_spending07, 
        'total_spending08' => $total_spending08, 'total_spending09' => $total_spending09, 'total_spending10' => $total_spending10, 'total_spending11' => $total_spending11, 'total_spending12' => $total_spending12, 'total_spending13' => $total_spending13, 'total_spending14' => $total_spending14, 
        'total_spending15' => $total_spending15, 'total_spending16' => $total_spending16, 'total_spending17' => $total_spending17, 'total_spending18' => $total_spending18, 'total_spending19' => $total_spending19, 'total_spending20' => $total_spending20, 'total_spending21' => $total_spending21, 
        'total_spending22' => $total_spending22, 'total_spending23' => $total_spending23, 'total_spending24' => $total_spending24, 'total_spending25' => $total_spending25, 'total_spending26' => $total_spending26, 'total_spending27' => $total_spending27, 'total_spending28' => $total_spending28, 
        'total_spending29' => $total_spending29, 'total_spending30' => $total_spending30, 'total_spending31' => $total_spending31, 'total_spending32' => $total_spending32, 'total_spending33' => $total_spending33, 'total_spending34' => $total_spending34, 'total_spending35' => $total_spending35,
        'money' => $money, 'mybikes' => $mybikes,
        'total_light_vehicle_tax' => $total_light_vehicle_tax, 'total_weight_tax' => $total_weight_tax, 'total_liability_insurance' => $total_liability_insurance, 
        'total_voluntary_insurance' => $total_voluntary_insurance, 'total_vehicle_inspection' => $total_vehicle_inspection, 'total_parking_fee' => $total_parking_fee,
        'total_consumables' => $total_consumables, 'money->spending_month' => $money->spending_month
        ]);
    }
    
    public function search(Request $request)
    {
        // dd($request->id);
        // dd($total_period_money);
        $user = Auth::user();
        $mybikes = Bike::where('user_id', $user->id)->get();
        // dd($mybikes);
        $year_month = date('y/m');
        $year = '20' . date('y');
        // dd($year);
        $month = date('m');
        // dd($month);
        $today = date('d');
        // dd($today);
        // $money = Money::where('user_id', $user->id)->get();
        $posts = Post::where('user_id', $user->id)->whereYear('created_at', $year)->whereMonth('created_at', $month)->get();
        // $posts = DB::table('posts')->where('user_id', $user->id)->whereYear('created_at', 2020)->whereMonth('created_at', 9)->simplePaginate(30);
    //   dd($posts);
        
        //カレンダーのJSON
        $url = public_path("/storage/json/$year$month.js");
        $json = '[' . file_get_contents($url) . ']';
        $calendar_day = json_decode($json,false);
        // dd($calendar_dayi);
        
        
        // 他にいい方法があるか模索中
        $total_spending = null;
        $total_spending01 = null;$total_spending02 = null;$total_spending03 = null;$total_spending04 = null;$total_spending05 = null;$total_spending06 = null;$total_spending07 = null;
        $total_spending08 = null;$total_spending09 = null;$total_spending10 = null;$total_spending11 = null;$total_spending12 = null;$total_spending13 = null;$total_spending14 = null;
        $total_spending15 = null;$total_spending16 = null;$total_spending17 = null;$total_spending18 = null;$total_spending19 = null;$total_spending20 = null;$total_spending21 = null;
        $total_spending22 = null;$total_spending23 = null;$total_spending24 = null;$total_spending25 = null;$total_spending26 = null;$total_spending27 = null;$total_spending28 = null;
        $total_spending29 = null;$total_spending30 = null;$total_spending31 = null;$total_spending32 = null;$total_spending33 = null;$total_spending34 = null;$total_spending35 = null;
        
        
        $money = Money::where('date_number', $year_month)->first();
        // dd($money->user_id);
        $year_moneys = Post::whereBetween('created_at', ['2020-01-01 00:00:00', '2020-12-31 00:00:00'])->get();
        $month_moneys = Post::whereBetween('created_at', ['2020-09-01 00:00:00', '2020-09-31 00:00:00'])->get();
        // dd($month_moneys);
        
        foreach($mybikes as $mybike){
            $total_light_vehicle_tax = $mybike->sum('light_vehicle_tax');
            $total_weight_tax = $mybike->sum('weight_tax');
            $total_liability_insurance = $mybike->sum('liability_insurance');
            $total_voluntary_insurance = $mybike->sum('voluntary_insurance');
            $total_vehicle_inspection = $mybike->sum('vehicle_inspection');
            $total_parking_fee = $mybike->sum('parking_fee');
            $total_consumables = $mybike->sum('consumables');
            // dd($total_weight_tax);
        }
        
        $money->total_addmission_fee = $posts->sum('addmission_fee');
        $money->total_purchase_cost = $posts->sum('purchase_cost');
        $money->travel_expenses = $money->total_addmission_fee + $money->total_purchase_cost;
        $money->variable_cost = $total_voluntary_insurance + $total_vehicle_inspection + $total_parking_fee + $total_consumables;
        $money->fixed_cost = $total_light_vehicle_tax + $total_weight_tax + $total_liability_insurance;
        $money->spending_month = $money->travel_expenses + $money->variable_cost/12 + $money->fixed_cost/12;
        // dd($money->spending_month);
        
        $money->save();
        // dd($money->total_purchase_cost);
        // dd($money->date_number);
        if($money->date_number != $year_month){
            // 月替り処理
            $money = new Money;
            $money->date_number = $year_month;
            $money->user_id = $user->id;
            $money->save();
        }
        
        //日付が選択されたら
        if (!empty($request['from']) && !empty($request['until'])) {
            //ハッシュタグの選択された20xx/xx/xx ~ 20xx/xx/xxのレポート情報を取得
            $dates = Post::getDate($money->user_id, $request['from'], $request['until']);
        } else {
            //リクエストデータがなければそのままで表示
            $dates = null;
        }
        // dd($dates);
        $period = $request->all();
        // dd($period['from']);
        $total_period_money = 0;
        if(isset($dates))
        {
            foreach($dates as $date)
            {
                $total_period_money += $date->addmission_fee + $date->purchase_cost;
            }
        } else {
            $total_period_money = "期間を選択してください";
        }
        // dd($total_period_money);
        return view('admin.money.money_management', 
        ['posts' => $posts,
        'today' => $today, 'month' => $month, 'calendar_day' => $calendar_day,
        'total_spending' => $total_spending,
        'total_spending01' => $total_spending01, 'total_spending02' => $total_spending02, 'total_spending03' => $total_spending03, 'total_spending04' => $total_spending04, 'total_spending05' => $total_spending05, 'total_spending06' => $total_spending06, 'total_spending07' => $total_spending07, 
        'total_spending08' => $total_spending08, 'total_spending09' => $total_spending09, 'total_spending10' => $total_spending10, 'total_spending11' => $total_spending11, 'total_spending12' => $total_spending12, 'total_spending13' => $total_spending13, 'total_spending14' => $total_spending14, 
        'total_spending15' => $total_spending15, 'total_spending16' => $total_spending16, 'total_spending17' => $total_spending17, 'total_spending18' => $total_spending18, 'total_spending19' => $total_spending19, 'total_spending20' => $total_spending20, 'total_spending21' => $total_spending21, 
        'total_spending22' => $total_spending22, 'total_spending23' => $total_spending23, 'total_spending24' => $total_spending24, 'total_spending25' => $total_spending25, 'total_spending26' => $total_spending26, 'total_spending27' => $total_spending27, 'total_spending28' => $total_spending28, 
        'total_spending29' => $total_spending29, 'total_spending30' => $total_spending30, 'total_spending31' => $total_spending31, 'total_spending32' => $total_spending32, 'total_spending33' => $total_spending33, 'total_spending34' => $total_spending34, 'total_spending35' => $total_spending35,
        'money' => $money, 'mybikes' => $mybikes,
        'total_light_vehicle_tax' => $total_light_vehicle_tax, 'total_weight_tax' => $total_weight_tax, 'total_liability_insurance' => $total_liability_insurance, 
        'total_voluntary_insurance' => $total_voluntary_insurance, 'total_vehicle_inspection' => $total_vehicle_inspection, 'total_parking_fee' => $total_parking_fee,
        'total_consumables' => $total_consumables, 'money->spending_month' => $money->spending_month, 'total_period_money' => $total_period_money, 'period' => $period
        ]);
    }
}
