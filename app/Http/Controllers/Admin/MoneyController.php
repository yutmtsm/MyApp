<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Money;
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
        $today = date('y/m');
        // dd($today);
        $money = Money::where('user_id', $user->id)->get();
        // dd($money);
        dd($money->date_number);
        // if($money->date_number == ){
        //     $money = new Money;
        //     $money->date_number = $today;
        // }
        dd($money);
        return view('admin.money_management');
    }
}
