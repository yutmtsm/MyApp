<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BikeController extends Controller
{
    //
    public function add(){
        return view('admin.bike.create');
    }
    
    public function create(Request $request)
    {
        $bike_info = new Bike;
        
        $bike_info->user_id = $user->id;
    }

}
