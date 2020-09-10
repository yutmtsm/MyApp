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
        $today = date('y/m');
        $moneys = Money::find(999);
        dd($moneys);
        $money = Money::find($money->date_number);
        dd($money);
        if(is_null($money)){
            $money = new Money;
            $money->date_number = $today;
        }
        dd($money);
        return view('admin.money_management');
    }
}
