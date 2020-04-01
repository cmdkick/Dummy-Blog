<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function getPost(Request $request, $id) 
    {
        foreach($request->session()->get('posts') as $post) 
        {
            if ($post['id'] == $id)
            {
                return view('blog.post', ['post' => $post]);
            }
        }

        return redirect()->route('blog');
    }
} 
