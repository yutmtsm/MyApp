<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bike;
use Auth;

class BikeController extends Controller
{
    //
    public function add(){
        return view('admin.bike.create');
    }
    
    public function create(Request $request)
    {
        // dd($request);
        $mybike = new Bike;
        $user = Auth::user();
         //userと関連付け
        $mybike->user_id = $user->id;
        // dd($mybike->user_id);
        
        $form = $request->all();
        
        if(isset($form['image'])){
            //画像をStrange内に格納し、パスを代入
            $path = $request->file('image')->store('public/image');
            //画像のパス先を格納
            $mybike->image_path = basename($path);
            // $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
            // $news->image_path = Storage::disk('s3')->url($path);
        } else {
            $mybike->image_path = "noimage.png";
        }
        
        unset($form['image']);
        unset($form['_token']);
        
        $mybike->fill($form);
        $mybike->save();
        
        return redirect('mypage');
    }
    
    

}
