@extends('backend.home')

@section('sub-title', 'Edit Category')
    
@section('content')
	@include('alert')
<form action="{{ route('category.update', $categories->id) }}" method="POST">
  @csrf
  @method('patch')
  <div class="row">
    <div class="col-12 col-md-8 col-lg-8">
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <label><span class="font-weight-bold">Category</span></label>
            <input type="text" class="form-control" name="name" value="{{ $categories->name }}">
            @error('name')
              <div class="text-danger mt-2">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
          
      </div>
      <div>
        <button class="btn btn-sm btn-primary">Update Category</button>
      </div>
    </div>
  </div>
</form>

@endsection