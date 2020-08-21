<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use Auth;
use Carbon\Carbon;

class PostController extends Controller
{
    //
    public function newpost(){
        return view('admin.post.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Post::$rules);
        
        $post = new Post;
        $user = Auth::user();
        //userと関連付け
        $post->user_id = $user->id;
        //dd($post);
        $form = $request->all();
        $post->delete_flag = false;
        $post->created_at = Carbon::now('Asia/Tokyo');
        //dd($post->created_at);
        unset($form['_token']);
        $post->fill($form);
        $post->save();
        
        return redirect('mypage');
    }
    
    public function detail(Request $request){
        $user = Auth::user();
        $post = Post::find($request->id);
        //dd($post);
        if(empty($post)){
            abort(404);
        }
        //dd($post);
        return view('admin.post.detail', ['user' => $user, 'post' => $post]);
    }
    
    public function edit(Request $request){
        //dd($request);
        $post = Post::find($request->id);
        //dd($post);
        if(empty($post)){
            abort(404);
        }
        return view('admin.post.edit', ['post_form' => $post]);
    }
    
    public function update(Request $request){
        
        //dd($request);
        $this->validate($request, Post::$rules);
        $post = Post::find($request->id);
        //dd($post);
        $post_form = $request->all();
        
        unset($post_form['_token']);
        
        $post->fill($post_form)->save();
        //dd($post);
        
        return redirect('mypage');
    }
    
    public function delete(Request $request){
        $post = Post::find($request->id);
        //dd($post);
        
        $post->delete();
        
        return redirect('mypage');
    }
}
