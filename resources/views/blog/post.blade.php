@extends('layouts.app')

@section('content')

@include('partials.error')

@if($post)
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <img class="img-fluid rounded mb-3 mb-md-0" src="{{ $post->linkToImage }}" alt="">
        </div>
        <div class="col-md-5">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
        </div>
        <div class="col-md-5">
            @foreach ($post->tags as $tag)
                <span class="badge badge-pill badge-secondary">{{ $tag->name }}</span>    
            @endforeach
            <form action="{{ route('blog.post.like', ['id' => $post->id]) }}" method="post">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Like</button>
            </form>
            <p>{{ count($post->likes) }} Likes</p>
        </div>
    </div>
</div>
@endif
@endsection