@extends('backend.home')
@section('sub-title', 'Create Post')
    
@section('content')
	@include('alert')
<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-12 col-md-8 col-lg-8">
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <label><span class="font-weight-bold">Title</span></label>
            <input type="text" class="form-control" name="title" value="{{old('title')}}">
            @error('title')
              <div class="text-danger mt-2">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label><span class="font-weight-bold">Category</span></label>
            <select name="category_id" id="" class="form-control" value="{{old('category_id')}}">                                              
              <option value="" holder>Select Category</option>
              @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
            @error('category_id')
              <div class="text-danger mt-2">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label><span class="font-weight-bold">Select Tag</span></label>
            <select class="form-control select2" multiple="" name="tags[]">
              @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name}}</option>  
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label><span class="font-weight-bold">Content</span></label>
            <textarea class="form-control" name="content" value="{{old('content')}}" id="content"></textarea>
            @error('content')
              <div class="text-danger mt-2">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label><span>Image Thumbnail</span></label>
            <input type="file" class="form-control" name="image" value="{{old('image')}}">
            @error('image')
            <div class="text-danger mt-2">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
          
      </div>
      <div>
        <button class="btn btn-sm btn-primary">Save Post</button>
      </div>
    </div>
  </div>
</form>

<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace( 'content' );
</script>

@endsection