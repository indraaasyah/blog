@extends('backend.home')

@section('sub-title', 'Post')
    
@section('content')
@include('alert')
<a href="{{ route('post.create') }}" class="btn btn-sm btn-info mb-3">Create Post</a>
<div class="post-content-table">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
          <th scope="col">Post Title</th>
          <th scope="col">Post Category</th>
          <th scope="col">Post Tags</th>
          <th scope="col">Author</th>
          <th scope="col">Thumbnail</th>
          <th scope="col">Published</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post => $result)
        <tr>
          <th scope="row">{{ $post + $posts->firstItem() }}</th>
          {{-- <td><a href="{{ route('post.show', $result->slug) }}">{{ $result->title}}</a></td> --}}
          <td><a href="#">{{ $result->title}}</a></td>
          <td>
            <a href="#">
              <h5><span class="badge badge-info">{{ $result->category->name }}</span></h5>
            </a>
          </td>
          <td>
            @foreach ($result->tags as $tag)
              <ul>
                <a href="#">
                  <h6><span class="badge badge-pill badge-success">{{ $tag->name }}</span></h6>
                </a>
              </ul>
            @endforeach
          </td>
          <td>{{ $result->users->name}}</td>
          <td> <img src="{{ asset($result->image) }}" alt="thumbnail" class="img-fluid" style="width: 100px"></td>
          <td>{{ $result->created_at->format("d F, Y") }}</td>
          <td>
            <form action="{{ route('post.destroy', $result->id) }}" method="post">
              @method('delete')
              @csrf
              <a href="{{ route('post.edit', $result->id) }}" class="btn btn-sm btn-primary">Edit</a>
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