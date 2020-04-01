@extends('layouts.master')

@section('content')

@include('partials.info')

@include('partials.error')

<h1 class="container-fluid text-secondary">Editing</h1>

<div class="container-fluid p-3 my-3 bg-dark text-white">
    <form action="{{ route('admin.edit', ['id' => $post['id']]) }}" method="post">
      <div class="form-group">
        <label>Post title</label>
        <input type="text" class="form-control" name="title" value="{{ $post['title'] }}">
      </div>
      <div class="form-group">
        <label>Post text</label>
        <textarea class="form-control" rows="3" name="content">{{ $post['content'] }}</textarea>
      </div>
      <div class="form-group">
        <label>Link to image</label>
        <input type="text" class="form-control" name="image" value="{{ $post['linktoimage'] }}">
      </div>
      {{ csrf_field() }}
      <button type="submit" class="btn btn-primary">Edit post</button>
    </form>
</div>

@endsection