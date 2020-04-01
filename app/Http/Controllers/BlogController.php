<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getBlog(Request $request) 
    {
        $blog = new Blog($request->session()->get('posts'));
        return view('blog.view', ['blog' => $blog->getBlog()]);
    }
}
