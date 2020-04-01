@extends('layouts.master')

@section('content')

@include('partials.error')

@if($post)
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
          </div>
        </div>
    </div>
    @endif
@endsection