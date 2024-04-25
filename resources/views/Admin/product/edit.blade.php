@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <p class="alert alert-danger">{{ session()->get('message') }}</p>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Edit Product
                        <a href="{{ route('products.index') }}" class="btn btn-primary btn-small float-end">back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">
                                    Home
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seoTags-tab" data-bs-toggle="tab" data-bs-target="#seoTags"
                                    type="button" role="tab" aria-controls="seoTags" aria-selected="false">
                                    Seo Tags
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details"
                                    type="button" role="tab" aria-controls="details" aria-selected="false">
                                    Details
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image"
                                    type="button" role="tab" aria-controls="image" aria-selected="false">
                                    images
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color"
                                    type="button" role="tab" aria-controls="color" aria-selected="false">
                                    product color
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="mb-3 mt-2">
                                    <label for="" class="form-label">category</label>
                                    <select name="category_id" id="" class="form-select">
                                        <option value="">select category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Prouct Name</label>
                                    <input type="text" name="name" value="{{ $product->name ?? old('name') }}"
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Prouct Slug </label>
                                    <input type="text" name="slug" value="{{ $product->slug }}" class="form-control">
                                </div>
                                <div class="mb-3 mt-2">
                                    <label for="" class="form-label">Brand</label>
                                    <select name="brand" id="" class="form-select">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}"
                                                {{ $product->brand == $brand->name ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Small descriptipn </label>
                                    <textarea name="small_description" id="" cols="30" rows="4" class="form-control">{{ $product->small_description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">description </label>
                                    <textarea name="description" id="" cols="30" rows="4" class="form-control">{{ $product->description }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="seoTags" role="tabpanel" aria-labelledby="seoTags-tab">
                                <div class="mb-3">
                                    <label for="" class="form-label">Meta Title </label>
                                    <input type="text" name="meta_title" value="{{ $product->meta_title }}"
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Meta Description </label>
                                    <textarea name="meta_description" id="" cols="30" rows="4" class="form-control">{{ $product->meta_description }}
                                    </textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Meta Keyword </label>
                                    <textarea name="meta_keyword" id="" cols="30" rows="4" class="form-control">{{ $product->meta_keyword }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Original price </label>
                                            <input type="number" value="{{ $product->original_price }}"
                                                name="original_price" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Selling price </label>
                                            <input type="number" value="{{ $product->selling_price }}"
                                                name="selling_price" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Quantity </label>
                                            <input type="number" name="quantity" value="{{ $product->quantity }}"
                                                class="form-control">
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" name="trending"
                                                {{ $product->trending == 1 ? 'checked' : '' }} class="form-check-input"
                                                id="trending">
                                            <label for="trending" class="form-label">Trending </label>
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" name="status"
                                                {{ $product->status == 1 ? 'checked' : '' }} class="form-check-input"
                                                id="status">
                                            <label class="form-check-label ms-0" for="status">status</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">
                                <div class="mb-3">
                                    <label for="" class="form-label">Images</label>
                                    <input type="file" name="images[]" multiple class="form-control">
                                    @if ($product->productImages)
                                        <div class="row">
                                            @foreach ($product->productImages as $productImage)
                                                <div class="col-md-2">
                                                    <img src="{{ asset($productImage->image) }}"
                                                        style="width:80px;height:80px" class="mt-4 me-4 border"
                                                        alt="{{ $product->name }}">
                                                    <a href="{{ route('products.deleteImg', $productImage->id) }}"
                                                        class="d-block">remove</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        No image
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="color" role="tabpanel" aria-labelledby="color-tab">
                                <label for="" class="form-label">Select Colors</label>
                                <div class="row">
                                    @forelse ($colors as $color)
                                        <div class="col-md-3">
                                            <div class="p-2 border mb-3">
                                                Color : <input type="checkbox" name="colors[{{ $color->id }}]"
                                                    value="{{ $color->id }}">
                                                {{ $color->name }}
                                                <br />
                                                Quantity : <input type="number"
                                                    name="colorquantity[{{ $color->id }}]"
                                                    style="width:70px;border:1px solid">
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-md-12">
                                            <h2>No color found</h2>
                                        </div>
                                    @endforelse
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Color Name</th>
                                                <th>Quantity</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($product->productColors as $proColor)
                                                <tr class="prod-color-tr">
                                                    <td>
                                                        @if ($proColor->color)
                                                            {{ $proColor->color->name }}
                                                        @else
                                                            No color found
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="input-group mb-3" style="width:150px">
                                                            <input type="text" value="{{ $proColor->quantity }}"
                                                                class="ProductColorQuantity form-control form-control-sm me-2">
                                                            <button type="button" value="{{ $proColor->id }}"
                                                                class="updateProductColorBtn btn btn-sm btn-primary">update</button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group mb-3" style="width:150px">
                                                            <button type="button" value="{{ $proColor->id }}"
                                                                class="deleteProductColorBtn btn btn-sm btn-danger">delte</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td col='3'>
                                                        <h2>No Colors Found</h2>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.updateProductColorBtn', function() {
                var product_id = "{{ $product->id }}";
                var prod_color_id = $(this).val();
                var qty = $(this).closest('.prod-color-tr').find('.ProductColorQuantity').val();
                // alert(qty);
                if (qty <= 0) {
                    alert('quantity is required')
                    return false
                }
                var data = {
                    'product_id': product_id,
                    'qty': qty
                }
                $.ajax({
                    type: "Post",
                    url: '/admin/product-color/' + prod_color_id,
                    data: data,
                    success: function(response) {
                        alert(response.message)
                    }
                })
            })
            // for delete product color 
            $(document).on('click', '.deleteProductColorBtn', function() {
                var prod_color_id = $(this).val();
                var thisClick = $(this);
                $.ajax({
                    type: 'GET',
                    url: '/admin/product-color/' + prod_color_id + '/delete',
                    success: function(response) {
                        thisClick.closest('.prod-color-tr').remove();
                        alert(response.message)

                    }
                })
            })

        })
    </script>
@endsection
