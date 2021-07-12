@extends('frontend.content')

@section('isi')

<div class="container">
  {{-- @foreach ($data as $content) --}}
  {{-- <div class="section-row">
    <!-- PAGE HEADER -->
    <div id="post-header" class="page-header">
      <div class="page-header-bg" style="background-image: url({{ asset($content->image) }});"  data-stellar-background-ratio="0.5"></div>
      <div class="page-header-bg" style="background-image: url({{ asset('assets/blog/img/header-1.jpg') }});"  data-stellar-background-ratio="0.5"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <div class="post-category">
              <a href="category.html">{{ $content->category->name }}</a>
            </div>
            <h1>{{$content->title}}</h1>
            <ul class="post-meta">
              <li><a href="author.html">{{ $content->users->name }}</a></li>
              <li>{{ $content->created_at->format("d F, Y") }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- /PAGE HEADER -->
  </div> --}}
  
  
  <div class="col-md-8">
    
    <div class="section-row">
      
      @foreach ($data as $list)
      <div class="post post-row">
        <a class="post-img" href="{{ route('blog.content', $list->slug)}}"><img src="{{ $list->image }}"" alt=""></a>
        <div class="post-body">
          <div class="post-category">
            <a href="category.html">{{$list->category->name}}</a>
          </div>
          <h3 class="post-title"><a href="{{ route('blog.content', $list->slug)}}">{{$list->title}}</a></h3>
          <ul class="post-meta">
            <li><a href="author.html">{{ $list->users->name }}</a></li>
            <li>{{ $list->created_at->format('d F, Y')}}</li>
          </ul>
          <div>
            <p>{!! Str::limit($list->content, 150, '...')!!}</p>
          </div>
          <div>
            <a href="{{ route('blog.content', $list->slug)}}">Read more</a>
          </div>
        </div>
      </div>
      @endforeach

    </div>
    <div class="text-center">
      {{ $data->links()}}
    </div>
  
  </div>
  {{-- @endforeach --}}
@endsection
      
      