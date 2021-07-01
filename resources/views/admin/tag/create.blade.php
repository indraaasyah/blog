@extends('backend.home')

@section('sub-title', 'Create Tag')
    
@section('content')
	@include('alert')
<form action="{{ route('tag.store') }}" method="POST">
  @csrf
  <div class="row">
    <div class="col-12 col-md-8 col-lg-8">
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <label><span class="font-weight-bold">Tag</span></label>
            <input type="text" class="form-control" name="name">
            @error('name')
              <div class="text-danger mt-2">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
          
      </div>
      <div>
        <button class="btn btn-sm btn-primary">Save Tag</button>
      </div>
    </div>
  </div>
</form>

@endsection