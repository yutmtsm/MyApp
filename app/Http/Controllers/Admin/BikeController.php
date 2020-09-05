<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BikeController extends Controller
{
    //
    public function add_bike(){
        return view('admin.bike.create');
    }
}
