@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>All Products
                        <a href="{{ route('products.create') }}" class="btn btn-primary btn-small float-end">Add
                            Product</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered  table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->selling_price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>
                                        <span class="{{ $product->status == '0' ? 'badge bg-success' : 'badge bg-danger' }}">
                                            {{ $product->status == '0' ? 'Visible' : 'Hidden' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('products.edit', $product->id) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <a href="" class="btn btn-sm btn-danger"
                                            onclick="event.preventDefault(); document.getElementById('destroy{{ $loop->iteration }}').submit();">delete
                                        </a>
                                        <form method="POST" id="destroy{{ $loop->iteration }}"
                                            action="{{ route('products.destroy', $product->id) }}" style="display: none;">
                                            <!-- Champ CSRF -->
                                            @csrf
                                            @method('delete')
                                            <!-- Champ méthode delete -->
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
