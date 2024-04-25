@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>edit category
                        <a href="{{ route('category.index') }}" class="btn btn-primary btn-small float-end">back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="Name">Name</label>
                                <input type="text" id="Name" name="name" class="form-control"
                                    value="{{ $category->name }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="Slug">Slug</label>
                                <input type="text" id="Slug" name="slug" class="form-control"
                                    value="{{ $category->slug }}">
                                @error('slug')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="Description">Description</label>
                                <textarea id="Description" name="description" class="form-control" rows="4">{{ $category->description }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="Image">Image</label>
                                <input type="file" id="Image" name="image" class="form-control-file">
                                <img src="{{ asset('/uploads/category/' . $category->image) }}" alt="{{ $category->image }}"
                                    width="60px" height="60px">
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="Status" name="status"
                                        {{ $category->status == '1' ? 'checked' : null }}>
                                    <label class="form-check-label" for="Status">Status</label>
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h4>SEO Tags</h4>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="MetaTitle">Meta Title</label>
                                <input type="text" id="MetaTitle" name="meta_title" class="form-control"
                                    value="{{ $category->meta_title }}">
                                @error('meta_title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="MetaKeyword">Meta Keyword</label>
                                <input type="text" id="MetaKeyword" name="meta_keyword" class="form-control"
                                    value="{{ $category->meta_keyword }}">
                                @error('meta_keyword')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="MetaDescription">Meta Description</label>
                                <textarea id="MetaDescription" name="meta_description" class="form-control" rows="3">{{ $category->meta_description }}</textarea>
                                @error('meta_description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="col-md-12 mb-3 btn btn-primary">Update Category</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
