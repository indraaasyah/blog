@extends('frontend.content')

@section('isi')

<div class="col-md-8">
  
  @foreach ($data as $content)
  <!-- post content -->
  <div class="section-row">
    <h3>{{$content->title}}</h3>
    {{ $content->content}}

  </div>
  <!-- /post content -->
  @endforeach




</div>
