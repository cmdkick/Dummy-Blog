<?php

namespace App\Http\Controllers;

use App\Post;
use App\Blog;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createPost(Request $request) 
    {
        $this->validate($request, [
            'title' => 'min:1',
            'image' => 'ulr',
            'image' => 'ends_with:.jpg,.jpeg,.png,.bmp,.gif,.svg'
        ]);

        $post = new Post(
                        (@count($request->session()->get('posts')) + 1),
                        $request->input('title'),
                        $request->input('content'), 
                        $request->input('image'));
        
        $request->session()->push('posts', $post->getPost());
        return redirect()->route('admin')->with('info', 'Post created with title: ' . $post->getPost()['title']);
    }

    public function generateAdminPanel(Request $request) 
    {
        $blog = new Blog($request->session()->get('posts'));
        return view('admin.view', ['blog' => $blog->getBlog()]);
    }

    public function deletePost(Request $request, $id) 
    {
        $deletedTitle;
        $blog = $request->session()->get('posts');
        $request->session()->forget('posts');

        foreach ($blog as $key => $post) 
        {
            if ($post['id'] == $id)
            {
                unset($blog[$id]);
                $deletedTitle = $post['title'];
            }
            else 
            {
                $request->session()->push('posts', $post);
            }
        }

        $blog = new Blog($request->session()->get('posts'));
        
        return redirect()->route('admin', ['blog' => $blog->getBlog()])->with('info', 'Post with title "'. $deletedTitle . '" deleted');
    }

    public function generateEditingPage(Request $request, $id)
    {
        foreach($request->session()->get('posts') as $post) 
        {
            if ($post['id'] == $id)
            {
                return view('admin.edit', ['post' => $post]);
            }
        }

        return redirect()->route('admin');
    }

    public function editPost(Request $request, $id)
    {
        $editedTitle;
        $this->validate($request, [
            'title' => 'min:1',
            'image' => 'ulr',
            'image' => 'ends_with:.jpg,.jpeg,.png,.bmp,.gif,.svg'
        ]);

        $blog = $request->session()->get('posts');

        $request->session()->forget('posts');

        foreach ($blog as $key => $post) 
        {
            if ($post['id'] == $id)
            {
                $post['title'] = $request->input('title');
                $post['content'] = $request->input('content');
                $post['linktoimage'] = $request->input('image');

                $editedTitle = $post['title'];
            }
            $request->session()->push('posts', $post);
        }

        $blog = new Blog($request->session()->get('posts'));
        return redirect()->route('admin', ['blog' => $blog->getBlog()])->with('info', 'Post with title "'. $editedTitle . '" edited');
    }
}
