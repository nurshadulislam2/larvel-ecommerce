@extends('layouts.front')

@section('title', 'Brand')

@section('content')
    <!-- Section-->
    <section class="py-5">
        <div class="container">
            <div class="row">
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        <div class="col-md-4 mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="{{ asset('uploads/products/' . $product->image) }}"
                                    alt="{{ $product->name }}" width="450" height="300" />
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
                                    <div class="text-center">
                                        <a class="btn btn-outline-dark mt-auto"
                                            href="{{ route('product', $product->id) }}">Details
                                        </a>
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
                @else
                    No Data Found
                @endif


                {{ $products->links() }}
            </div>
        </div>
    </section>
@endsection
