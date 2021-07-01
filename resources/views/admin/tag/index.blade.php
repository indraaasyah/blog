@extends('backend.home')

@section('sub-title', 'Tag')
    
@section('content')
@include('alert')
<a href="{{ route('tag.create') }}" class="btn btn-sm btn-success mb-3">Create Tag</a>
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

  <!-- Modal -->
  {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin menghapus?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="mb-4">
            <div>
              <strong>{{ $result->name }}</strong>
            </div>
            <div class="text-secondary">
              <strong>Published: {{ $result->created_at->format("d F, Y" )}}</strong>
            </div>
          </div>
          <form action="{{ route('tag.destroy', $result->id) }}" method="post">
            @method('delete')
            @csrf
            <div class="modal-footer">
              <button class="btn btn-danger">Yes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> --}}

@endsection