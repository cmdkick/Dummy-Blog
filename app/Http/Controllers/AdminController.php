<?php

namespace App\Http\Controllers;

use App\Post;
use App\Blog;
use App\Tag;
use Auth;
use Gate;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createPost(Request $request) 
    {
        $user = Auth::user();
        $this->validate($request, [
            'title' => 'min:1',
            'image' => 'ulr',
            'image' => 'ends_with:.jpg,.jpeg,.png,.bmp,.gif,.svg'
        ]);

        $post = new Post();
        $post->title =  $request->input('title');
        $post->content = $request->input('content');
        $post->linkToImage = $request->input('image');
        $user->posts()->save($post);
        $post->tags()->attach($request->input('tags'));

        return redirect()->route('admin')->with('info', 'Post created with title: ' . $post->title);
    }

    public function generateAdminPanel() 
    {
        $blog = Post::all();
        $tags = Tag::all();
        return view('admin.view', ['blog' => $blog, 'tags' => $tags]);
    }

    public function deletePost($id) 
    {
        $post = Post::find($id);

        if (Gate::denies('alter-post', $post)) {
            return redirect()->back();
        }

        $deletedTitle = $post->title;
        $post->likes()->delete();
        $post->tags()->detach();
        $post->delete();
        
        return redirect()->route('admin')->with('info', 'Post with title "'. $deletedTitle . '" deleted');
    }

    public function generateEditingPage($id)
    {
        $post = Post::find($id);

        if (Gate::denies('alter-post', $post)) {
            return redirect()->back();
        }

        $tags = Tag::all();
        return view('admin.edit', ['post' => $post, 'tags' => $tags]);
    }

    public function editPost(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'min:1',
            'image' => 'ulr',
            'image' => 'ends_with:.jpg,.jpeg,.png,.bmp,.gif,.svg'
        ]);
        
        $post = Post::find($id);

        if (Gate::denies('alter-post', $post)) {
            return redirect()->back();
        }

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->linkToImage = $request->input('image');
        $post->save();
        $post->tags()->sync($request->input('tags'));

        return redirect()->route('admin')->with('info', 'Post edited');
    }
}
