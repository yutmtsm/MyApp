<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use App\Comment;
use DB;
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
        // dd($form);
        if(isset($form['image'])){
            //画像をStrange内に格納し、パスを代入
            $path = $request->file('image')->store('public/image/post');
            //画像のパス先を格納
            $post->image_path = basename($path);
            // $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
            // $news->image_path = Storage::disk('s3')->url($path);
        } else {
            $post->image_path = "noimage.png";
        }
        $post->delete_flag = false;
        $post->created_at = Carbon::now('Asia/Tokyo');
        //dd($post->created_at);
        unset($form['image']);
        unset($form['_token']);
        $post->fill($form);
        // dd($post);
        $post->save();
        //dd($post);
        return redirect('mypage');
    }
    
    public function detail(Request $request)
    {
        // dd($request);
        $user = Auth::user();
        // dd($request->id);
        $post = Post::find($request->id);
        // dd($post);
        $total_cost = $post->addmission_fee + $post->purchase_cost;
        // dd($total_cost);
        $users = DB::table('users')->get();
        
        //ポストに紐づいたUser_idを持ってきて情報を代入
            $users = User::find($post->user_id);
            $post->user_name = $users->name;
            $post->image_icon = $users->image_path;
            $post->created_at = $users->created_at;
        
        $post_comments = Comment::where('post_id', $post->id)->orderByDesc('created_at')->get();
        // dd($post_comments);
        $post_comment_count = Comment::where('post_id', $post->id)->count();
        // dd($post_comment_count);
        // $post_comment_user = User::find($$post_comments->user_id);
        
        // コメントに紐づいたユーザーの取得
        // dd($post_comments);
        foreach($post_comments as $post_comment)
        {
            $post_comment_user = User::find($post_comment->user_id);
            // dd($post_comment_user->name);
            $post_comment->user_name = $post_comment_user->name;
            $post_comment->image_path = $post_comment_user->image_path;
        }
        
        if(empty($post)){
            abort(404);
        }
        
        
        
        return view('admin.post.detail', ['user' => $user, 'post' => $post, 'users' => $users,
        'total_cost' => $total_cost,
        'post_comments' => $post_comments, 'post_comment_count' => $post_comment_count
        ]);
    }
    
    public function edit(Request $request){
        //dd($request);
        $post = Post::find($request->id);
        //dd($post);
        if(empty($post)){
            abort(404);
        }
        return view('admin.post.edit', [
            'post_form' => $post,
            ]);
    }
    
    public function update(Request $request){
        
        //dd($request);
        $this->validate($request, Post::$rules);
        $post = Post::find($request->id);
        //dd($post);
        $post_form = $request->all();
        
        if ($request->remove == 'true') {
            $post_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image/post');
            $post_form['image_path'] = basename($path);
            // $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
            // $news->image_path = Storage::disk('s3')->url($path);
        } else {
            $post_form['image_path'] = $post->image_path;
        }

        unset($post_form['_token']);
        unset($post_form['image']);
        unset($post_form['remove']);
        
        $post->fill($post_form)->save();
        //dd($post);
        
        return redirect('mypage');
    }
    
    public function delete(Request $request){
        $post = Post::find($request->id);
        //dd($post);
        
        $post->delete();
        
        //dd($post);
        return redirect('mypage');
    }
}
