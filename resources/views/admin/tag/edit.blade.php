@extends('backend.home')

@section('sub-title', 'Edit Tag')
    
@section('content')
	@include('alert')
<form action="{{ route('tag.update', $tags->id) }}" method="POST">
  @csrf
  @method('patch')
  <div class="row">
    <div class="col-12 col-md-8 col-lg-8">
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <label><span class="font-weight-bold">Tag</span></label>
            <input type="text" class="form-control" name="name" value="{{ $tags->name }}">
            @error('name')
              <div class="text-danger mt-2">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
          
      </div>
      <div>
        <button class="btn btn-sm btn-primary">Update Tag</button>
      </div>
    </div>
  </div>
</form>

@endsection