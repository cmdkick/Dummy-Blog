<?php

namespace App\Http\Controllers;

use App\Post;
use App\Like;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function getPost($id) 
    {
        $post = Post::find($id);
        return view('blog.post', ['post' => $post]);
    }

    public function likePost($id)
    {
        $post = Post::find($id);
        $like = new Like();
        $post->likes()->save($like);
        return redirect()->back();
    }
} 
