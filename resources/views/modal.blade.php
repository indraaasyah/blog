<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <div>{{ $categories->name }}</div>
          <div class="text-secondary">
            <small>Published: {{ $categories->created_at->format("d F, Y" )}}</small>
          </div>
        </div>
        <form action="{{ route('category.destroy', $result->id) }}" method="post">
          @method('delete')
          @csrf
          <div class="modal-footer">
            <button class="btn btn-danger">Ya</button>
            <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>