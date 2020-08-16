<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
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
        return view('admin.mypage', ['user' => $user, 'today' => $today]);
    }
    
    public function addbike(Request $request){
        
    }
}
