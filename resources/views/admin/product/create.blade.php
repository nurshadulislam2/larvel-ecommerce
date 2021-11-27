@extends('layouts.admin')

@section('title', 'Create Product')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Product</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.product') }}">Product</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Product</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Create Product</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="form-control 
                                    @error('name')
                                        is-invalid
                                    @enderror"
                                    id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="category_id" name="category_id">
                                    @if (count($categories) > 0)
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @else
                                        <option value="">Please Create a Category first</option>
                                    @endif
                                </select>
                                @error('category_id')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="brand_id" class="col-sm-2 col-form-label">Brand</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="brand_id" name="brand_id">
                                    <option value="">Select a brand</option>
                                    @if (count($brands) > 0)
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    @else
                                        <option value="">Please Create a Brand first</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file"
                                    class="form-control-file @error('image')
                                    is-invalid
                                @enderror"
                                    id="image" name="image">
                                @error('image')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea
                                    class="form-control @error('description')
                                    is-invalid
                                @enderror"
                                    id="description" name="description" rows="8"></textarea>
                                @error('description')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input type="number"
                                    class="form-control 
                                    @error('price')
                                        is-invalid
                                    @enderror"
                                    id="price" name="price" value="{{ old('price') }}">
                                @error('price')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
