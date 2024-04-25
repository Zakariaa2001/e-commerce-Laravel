<div>
    @include('livewire.admin.brand.modal')
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Brands
                    <a data-bs-toggle="modal" data-bs-target="#addBrandModal"
                        class="btn btn-primary btn-small float-end">Add
                        Brand</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>slug</th>
                            <th>status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div>
                            @forelse ($brands as $brand)
                                <tr>
                                    <th scope="row">{{ $brand->id }}</th>
                                    <td>{{ $brand->name }}</td>
                                    <td>
                                        @if ($brand->category)
                                            {{ $brand->category->name }}
                                        @endif
                                    </td>
                                    <td>{{ $brand->slug }}</td>
                                    <td>
                                        <span
                                            class="{{ $brand->status == '0' ? 'badge bg-success' : 'badge bg-danger' }}">
                                            {{ $brand->status == '0' ? 'Visible' : 'Hidden' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="#" wire:click="editBrand({{ $brand->id }})"
                                            data-bs-toggle="modal" data-bs-target="#updateBrandModal"
                                            class="btn btn-primary">Edit</a>
                                        <a href="#" wire:click="destoryBrand({{ $brand->id }})"
                                            data-bs-toggle="modal" data-bs-target="#deleteBrandModal"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th col='5'>No brands found</th>
                                </tr>
                            @endforelse
                        </div>
                    </tbody>
                </table>
                <div>
                    {{ $brands->links() }}
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
        });
    </script>
@endpush
