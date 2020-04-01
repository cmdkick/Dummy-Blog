@extends('layouts.master')

@include('partials.info')

@include('partials.error')

@section('content')
    @if($blog)
        @foreach ($blog as $post)
        <div class="container">
            <div class="row">
              <div class="col-md-7">
                <a href="#">
                  <img class="img-fluid rounded mb-3 mb-md-0" src="{{ $post['linktoimage'] }}" alt="">
                </a>
              </div>
              <div class="col-md-5">
                <h3>{{ $post['title'] }}</h3>
                <p>{{ $post['content'] }}</p>
                <a class="btn btn-primary" href="{{ route('blog.post', ['id' => $post['id']]) }}">View Post</a>
              </div>
            </div>
        </div>
        @endforeach
    @endif
@endsection