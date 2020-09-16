<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Comment;
use App\Post;
use Carbon\Carbon;

class CommentController extends Controller
{
    //
    public function create(Request $request)
    {
        // dd($request);
        
        $comment = new Comment;
        $user = Auth::user();
        $post = Post::find($request->id);
        
        //user,postと関連付け
        // このコメントをしたユーザーのIDを格納
        $comment->user_id = $user->id;
        // コメントをしたポストのID
        $comment->post_id = $post->id;
        // dd($post);
        $comment->created_at = Carbon::now('Asia/Tokyo');
        $comment->text = $request->comment;
        // dd($comment->text);
        $comment->save();
        return redirect('mypage');
    }
}
