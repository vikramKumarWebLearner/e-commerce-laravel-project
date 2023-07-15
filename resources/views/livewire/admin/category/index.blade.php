<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destoryCategory" action="">
                    <div class="modal-body">
                        <h6>Are you sure you want to delete this data?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes. Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div>
        <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3>Category
                            <a href="{{ url('admin/category/create') }}" class="btn btn-primary btn-sm float-end">Add
                                Category</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td scope="row">{{ $item->name }}</td>
                                        <td scope="row">{{ $item->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                        <td>
                                            <a href="{{ url('admin/category/' . $item->id . '/edit') }}"
                                                class="btn btn-success">Edit</a>
                                            <a href="deleteModal" wire:click="deleteCategory({{$item->id}})" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@push('script')
   <script>
      window.addEventListener('close-modal',event => {
         $('#deleteModal').modal('hide');
      })
   </script>
@endpush