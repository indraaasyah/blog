@extends('backend.home')

@section('sub-title', 'Create Category')
    
@section('content')
<form action="{{ route('category.store') }}" method="POST">
  @csrf
  <div class="row">
    <div class="col-12 col-md-6 col-lg-6">
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <label><span class="font-weight-bold">Category</span></label>
            <input type="text" class="form-control" name="name">
          </div>
        </div>
          
      </div>
      <div>
        <button class="btn btn-sm btn-primary">Save Category</button>
      </div>
    </div>
  </div>
</form>

@endsection