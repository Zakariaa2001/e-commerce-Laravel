@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
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
                    <h3>Add Products
                        <a href="{{ route('products.index') }}" class="btn btn-primary btn-small float-end">back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Prouct Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Prouct Slug </label>
                                    <input type="text" name="slug" class="form-control">
                                </div>
                                <div class="mb-3 mt-2">
                                    <label for="" class="form-label">Brand</label>
                                    <select name="brand" id="" class="form-select">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Small descriptipn </label>
                                    <textarea name="small_description" id="" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">description </label>
                                    <textarea name="description" id="" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="seoTags" role="tabpanel" aria-labelledby="seoTags-tab">
                                <div class="mb-3">
                                    <label for="" class="form-label">Meta Title </label>
                                    <input type="text" name="meta_title" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Meta Description </label>
                                    <textarea name="meta_description" id="" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Meta Keyword </label>
                                    <textarea name="meta_keyword" id="" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Original price </label>
                                            <input type="number" name="original_price" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Selling price </label>
                                            <input type="number" name="selling_price" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Quantity </label>
                                            <input type="number" name="quantity" class="form-control">
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" name="trending" class="form-check-input"
                                                id="trending">
                                            <label for="trending" class="form-label">Trending </label>
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" name="status" class="form-check-input"
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
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
