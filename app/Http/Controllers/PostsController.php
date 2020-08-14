<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Post;
 
class PostsController extends Controller {
 
    public function bbs() {
        $posts = Post::all();
        $error = array();
 
        return view('posts.bbs', [
            'posts' => $posts,
            'error' => $error
        ]);
 
    }
 
}
