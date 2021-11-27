@extends('layouts.front')

@section('title', $product->name)

@section('content')
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                        src="{{ asset('uploads/products/' . $product->image) }}" width="600" alt="..." />
                </div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                    <div class="fs-5 mb-5">
                        <span> Taka: {{ $product->price }}</span>
                    </div>
                    <div class="lead mb-4">{{ $product->description }}</div>
                    <div class="d-flex">
                        <a class="btn btn-outline-dark flex-shrink-0" href="{{ route('cart.add', $product->id) }}">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">New products</h2>
            <div class="row">
                @foreach ($products as $prd)
                    <div class="col-md-4 mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" width="450" height="300"
                                src="{{ asset('uploads/products/' . $prd->image) }}" alt="{{ $product->name }}" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $product->name }}</h5>
                                    <!-- Product price-->
                                    Taka: {{ $product->price }}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                        href="{{ route('product', $prd->id) }}">Details</a>
                                </div>
                                <div class="text-center my-3">
                                    <a class="btn btn-outline-dark flex-shrink-0"
                                        href="{{ route('cart.add', $product->id) }}">
                                        <i class="bi-cart-fill me-1"></i>
                                        Add to cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>
@endsection
