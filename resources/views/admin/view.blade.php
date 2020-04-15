@extends('layouts.app')

@section('content')

<h1 class="container-fluid text-secondary">Admin Panel</h1>

@include('partials.info')

@include('partials.error')

<button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapsible" aria-expanded="false" aria-controls="collapsible">
  Create new Post 
</button>

<div class="collapse container-fluid p-3 my-3 bg-dark text-white"  id="collapsible">
    <form action="{{ route('admin.create') }}" method="post">
      <div class="form-group">
        <label>Post title</label>
        <input type="text" class="form-control" name="title">
      </div>
      <div class="form-group">
        <label>Post text</label>
        <textarea class="form-control" rows="3" name="content"></textarea>
      </div>
      <div class="form-group">
        <label>Link to image</label>
        <input type="text" class="form-control" name="image" placeholder="e.g: https://www.website.com/picture.jpg">
      </div>
      @foreach ($tags as $tag)
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="{{ $tag->id }}">
        <label class="form-check-label" for="{{ $tag->id }}">{{ $tag->name }}</label>
      </div>
      @endforeach
      {{ csrf_field() }}
      <button type="submit" class="btn btn-primary">Create post</button>
    </form>
</div>

@if($blog)
    @foreach ($blog as $post)
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <a href="#">
                        <img class="img-fluid rounded mb-3 mb-md-0" src="{{ $post->linkToImage }}" alt="">
                    </a>
                </div>
                <div class="col-md-5">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->content }}</p>
                    <div>
                        <a class="btn btn-primary" href="{{ route('blog.post', ['id' => $post->id]) }}">View Post</a>
                    </div>
                    @if(!Gate::denies('alter-post', $post))
                    <div>
                        <a class="btn btn-warning" href="{{ route('admin.edit', ['id' => $post->id]) }}">Edit Post</a>
                    </div>
                    <div>
                        <form method="POST" action="{{ route('admin.delete', ['id' => $post->id]) }}">
                            {{ csrf_field() }}
                            <button class="btn btn-danger" type="submit">Delete Post</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
@endif

@endsection