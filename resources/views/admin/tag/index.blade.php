@extends('backend.home')

@section('sub-title', 'Tag')
    
@section('content')
@include('alert')
<a href="{{ route('tag.create') }}" class="btn btn-sm btn-info mb-3">Create Tag</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
        <th scope="col">Tag Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($tags as $tag => $result)
      <tr>
        <th scope="row">{{ $tag + $tags->firstItem() }}</th>
        <td>{{ $result->name }}</td>
        <td>
          <form action="{{ route('tag.destroy', $result->id) }}" method="post">
            @method('delete')
            @csrf
            <a href="{{ route('tag.edit', $result->id) }}" class="btn btn-sm btn-primary">Edit</a>
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            {{-- <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">Delete</button> --}}
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
</table>
  {{ $tags->links() }}

@endsection