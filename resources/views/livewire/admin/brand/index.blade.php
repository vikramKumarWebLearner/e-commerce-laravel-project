<div>
    @include('livewire.admin.brand.modal-form')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Brands List
                        <a href="{{ url('admin/category/create') }}" class="btn btn-primary btn-sm float-end"
                            data-bs-toggle="modal" data-bs-target="#addBrandModal">Add Brands</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Category</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td scope="row">{{ $item->name }}</td>
                                    <td scope="row">{{ $item->slug }}</td>
                                    <td>
                                        @if ($item->category)
                                             {{$item->category->name}}
                                        @else
                                           No catgory
                                        @endif
                                    </td>
                                    <td scope="row">{{ $item->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="#" wire:click="editBrand({{$item->id}})" data-bs-toggle="modal" data-bs-target="#updateBrandModal"
                                            class="btn btn-success">Edit</a>
                                        <a href="#" wire:click="deleteBrand({{ $item->id }})"
                                            class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteBrandModal">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No Brand Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-2">
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addBrandModal').modal('hide');
            $('#updateBrandModal').modal('hide');
            $('#deleteBrandModal').modal('hide');
        })
    </script>
@endpush
