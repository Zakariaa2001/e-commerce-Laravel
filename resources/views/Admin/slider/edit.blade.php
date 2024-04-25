@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Edit Slider
                        <a href="{{ route('sliders.index') }}" class="btn btn-danger btn-small float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Title</label>
                            <input type="text" name="title" id="name"
                                class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $slider->title) }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Description" class="form-label">Description</label>
                            <textarea name="description" id="" class="form-control @error('description') is-invalid @enderror"
                                cols="30" rows="10">{{ old('description', $slider->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control mb-1">
                            <img src="{{ asset($slider->image) }}" alt="{{ $slider->title }}" width="60px" height="60px">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="status" id="status" value="1" class="form-check-input"
                                {{ old('status', $slider->status) ? 'checked' : '' }}>
                            <label for="status" class="form-check-label ms-0">
                                Status <span>unchecked=visible,checked=hidden </span>
                            </label>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
