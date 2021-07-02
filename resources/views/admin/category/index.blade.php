@extends('backend.home')

@section('sub-title', 'Category')
    
@section('content')
@include('alert')
<a href="{{ route('category.create') }}" class="btn btn-sm btn-info mb-3">Create Category</a>
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
          <form action="" method="post">
            @method('delete')
            @csrf
            <a href="{{ route('category.edit', $result->id) }}" class="btn btn-sm btn-primary">Edit</a>
            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
</table>
  {{ $categories->links() }}

@endsection