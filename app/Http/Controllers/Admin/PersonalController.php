<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Personal;

class PersonalController extends Controller
{
    //
    public function mypage(Request $request){
        return view('admin.mypage');
    }
}
