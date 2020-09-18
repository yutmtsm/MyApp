<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class TopController extends Controller
{
    //
    public function top()
    {
        // 画像ありの投稿データーを最新中に処理
        $posts = Post::where('image_path', '<>', 'noimage.png')->orderBy('created_at', 'DESC')->take(4)->get('image_path');
        $post_image_path = array();
        $i = 0;
        foreach($posts as $post){
            $post_image_path[$i] = $post->image_path;
            $i++;
        }
        // dd($post_image_path[3]);
        return view('top', [
            'post_image_path' => $post_image_path
        ]);
    }
}
