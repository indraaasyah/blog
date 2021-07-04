@extends('backend.home')

@section('sub-title', 'User')
    
@section('content')
@include('alert')
<a href="{{ route('user.create') }}" class="btn btn-sm btn-info mb-3">Create User</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user => $result)
      <tr>
        <th scope="row">{{ $user + $users->firstItem() }}</th>
        <td>{{ $result->name }}</td>
        <td>{{ $result->email }}</td>
        <td>
           @if ( $result->role )
            <span class="badge badge-pill badge-success">Administrator</span>
           @else
            <span class="badge badge-pill badge-warning">Author
           @endif</span>
        </td>
        <td>
          <form action="{{ route('user.destroy', $result->id) }}" method="post">
            @method('delete')
            @csrf
            <a href="{{ route('user.edit', $result->id) }}" class="btn btn-sm btn-primary">Edit</a>
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            {{-- <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">Delete</button> --}}
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
</table>
  {{ $users->links() }}

@endsection