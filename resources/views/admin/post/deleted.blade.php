@extends('backend.home')

@section('sub-title', 'Deleted Post')
    
@section('content')
@include('alert')

<div class="post-content-table">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
          <th scope="col">Post Title</th>
          <th scope="col">Post Category</th>
          <th scope="col">Post Tags</th>
          <th scope="col">Thumbnail</th>
          <th scope="col">Published</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post => $result)
        <tr>
          <th scope="row">{{ $post + $posts->firstItem() }}</th>
          <td>{{ $result->title }}</td>
          <td>{{ $result->category->name }}</td>
          <td>
            @foreach ($result->tags as $tag)
              <ul>
                <li>{{ $tag->name }}</li>
              </ul>
            @endforeach
          </td>
          <td> <img src="{{ asset($result->image) }}" alt="thumbnail" class="img-fluid" style="width: 100px"></td>
          <td>{{ $result->created_at->format("d F, Y") }}</td>
          <td>
            <form action="{{ route('post.kill', $result->id) }}" method="post">
              @method('delete')
              @csrf
              <a href="{{ route('post.restore', $result->id) }}" class="btn btn-sm btn-info">Restore</a>
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
  </table>
    {{ $posts->links() }}
</div>

@endsection