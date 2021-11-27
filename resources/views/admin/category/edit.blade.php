@extends('layouts.admin')

@section('title', 'Update Category')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Category</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.category') }}">Category</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Category</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Update Category</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.category.update', $category->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="form-control 
                                    @error('name')
                                        is-invalid
                                    @enderror"
                                    id="name" name="name" value="{{ $category->name }}">
                                @error('name')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
