@extends('backend.home')

@section('sub-title', 'Create User')
    
@section('content')
	@include('alert')
<form action="{{ route('user.update', $users->id) }}" method="POST">
  @csrf
  @method('patch')
  <div class="row">
    <div class="col-12 col-md-8 col-lg-8">
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <label><span class="font-weight-bold">Name</span></label>
            <input type="text" class="form-control" name="name" value="{{ $users->name }}">
            @error('name')
              <div class="text-danger mt-2">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label><span class="font-weight-bold">Email</span></label>
            <input type="email" class="form-control" name="email" value="{{ $users->email}}" readonly>
            @error('name')
              <div class="text-danger mt-2">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label><span class="font-weight-bold">User Role</span></label>
            <select name="role" class="form-control" value="{{ $users->role}}">                                              
              <option value="" holder>Select Category</option>
              <option value="1" @if ($users->role == 1) selected @endif holder>Administrator</option>
              <option value="0" @if ($users->role == 0) selected @endif holder>Author</option>
            </select>
            @error('role')
              <div class="text-danger mt-2">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label><span class="font-weight-bold">Password</span></label>
            <input type="text" class="form-control" name="password">
            @error('name')
              <div class="text-danger mt-2">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>          
      </div>
        <div>
          <button class="btn btn-sm btn-primary">Update User</button>
        </div>
    </div>
  </div>
</form>

@endsection