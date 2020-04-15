@extends('layouts.app')

@include('partials.info')

@include('partials.error')

@section('content')
    @if($blog)
        @foreach ($blog as $post)
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="{{ $post->linkToImage }}" alt="">
                </div>
                <div class="col-md-5">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->content }}</p>
                    <a class="btn btn-primary" href="{{ route('blog.post', ['id' => $post->id]) }}">View Post</a>
                    <div class="row-md-5">
                        <form action="{{ route('blog.post.like', ['id' => $post->id]) }}" method="post">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-outline-primary">Like</button>
                        </form>
                        <p>{{ count($post->likes) }} Likes</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="d-flex justify-content-center p-3">{{ $blog->links() }}</div>
        
    @endif
@endsection