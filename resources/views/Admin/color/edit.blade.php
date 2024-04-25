@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Edit Color
                        <a href="{{ route('colors.index') }}" class="btn btn-danger btn-small float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('colors.update', $color->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Color name</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $color->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="code" class="form-label">Color code</label>
                            <input type="text" name="code" id="code"
                                class="form-control @error('code') is-invalid @enderror"
                                value="{{ old('code', $color->color) }}">
                            @error('code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="status" id="status" value="1" class="form-check-input"
                                {{ old('status', $color->status) ? 'checked' : '' }}>
                            <label for="status" class="form-check-label ms-0">
                                Status <span>unchecked=visible,checked=hidden </span>
                            </label>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
