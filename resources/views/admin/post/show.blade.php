@extends('backend.home')

@section('sub-title', 'Post')
    
@section('content')

<div class="container">
  <div class="row">
    @foreach ($posts as $post)
      <div class="col-md-8">
        <h3>{{ $post->title }}</h3>
      </div>
      <div>
        <p>{{ $post->content }}</p>
      </div>

    @endforeach
  </div>
</div>

@endsection