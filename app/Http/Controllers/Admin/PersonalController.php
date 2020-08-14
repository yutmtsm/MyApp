<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class PersonalController extends Controller
{
    //
    public function mypage(){
        $user = Auth::user();
        //dd($user);
        
        return view('admin.mypage', ['user' => $user]);
    }
}
