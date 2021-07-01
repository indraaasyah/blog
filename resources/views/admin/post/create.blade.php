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
            <input type="text" class="form-control" name="title">
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
              @foreach ($categories as $option)
              <option value="{{ $option->id }}">{{ $option->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label><span class="font-weight-bold">Content</span></label>
            <textarea class="form-control" name="content" rows="20" style="height:100%" ></textarea>
          </div>
          <div class="form-group">
            <label><span>Image Thumbnail</span></label>
            <input type="file" class="form-control" name="image">
          </div>
        </div>
          
      </div>
      <div>
        <button class="btn btn-sm btn-primary">Save Post</button>
      </div>
    </div>
  </div>
</form>

@endsection