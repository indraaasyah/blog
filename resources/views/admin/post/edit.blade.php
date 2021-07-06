@extends('backend.home')
@section('sub-title', 'Edit Post')
    
@section('content')
	@include('alert')
<form action="{{ route('post.update', $posts->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="row">
    <div class="col-12 col-md-8 col-lg-8">
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <label><span class="font-weight-bold">Title</span></label>
            <input type="text" class="form-control" name="title" value="{{ $posts->title }}">
            @error('name')
              <div class="text-danger mt-2">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label><span class="font-weight-bold">Category</span></label>
            <select name="category_id" id="" class="form-control">                                              
              <option value="" holder>Select Category</option>
              @foreach ($categories as $category)
              <option value="{{ $category->id }}"
                @if ($category->id == $posts->category_id)
                    selected
                @endif>
                    {{ $category->name }}
              </option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label><span class="font-weight-bold">Select Tag</span></label>
            <select class="form-control select2" multiple="" name="tags[]">
              @foreach ($tags as $tag)
                <option value="{{ $tag->id }}"
                  @foreach ($posts->tags as $value)
                    @if ($tag->id == $value->id)
                      selected
                    @endif
                  @endforeach>
                    {{ $tag->name}}
                </option>  
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label><span class="font-weight-bold">Content</span></label>
            <textarea class="form-control" name="content" id="content"" >{{ $posts->content }}</textarea>
            @error('content')
              <div class="text-danger mt-2">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label><span>Image Thumbnail</span></label>
            <input type="file" class="form-control" name="image">
          </div>
        </div>
          
      </div>
      <div>
        <button class="btn btn-sm btn-primary">Update Post</button>
      </div>
    </div>
  </div>
</form>

<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace( 'content' );
</script>
@endsection