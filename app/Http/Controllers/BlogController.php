<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getBlog() 
    {
        $blog = Post::orderBy('updated_at', 'desc')->with('likes')->paginate(3);
        return view('blog.view', ['blog' => $blog]);
    }
}
