@extends('backend.home')

@section('sub-title', 'Category')
    
@section('content')
<a href="{{ route('category.create') }}" class="btn btn-sm btn-success mb-3">Create Category</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
        <th scope="col">Category Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category => $result)
      <tr>
        <th scope="row">{{ $category + $categories->firstItem() }}</th>
        <td>{{ $result->name }}</td>
        <td>
          <a href="" class="btn btn-sm btn-primary">Edit</a>
          <a href="" class="btn btn-sm btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
</table>
  {{ $categories->links() }}
@endsection