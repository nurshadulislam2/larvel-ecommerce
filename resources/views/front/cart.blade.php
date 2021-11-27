@extends('layouts.front')

@section('title', 'Cart')

@section('content')
    <!-- Section-->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center mb-4">Cart</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (Session::get('cart'))
                                @php
                                    $total = 0;
                                @endphp
                                @foreach (session('cart') as $id => $cart)
                                    <tr>
                                        <td>{{ $cart['name'] }}</td>
                                        <td><img src="{{ asset('uploads/products/' . $cart['image']) }}" width="100"
                                                alt="{{ $cart['name'] }}"></td>
                                        <td>{{ $cart['price'] }}</td>
                                        <td>
                                            <form action="{{ route('cart.update', $id) }}" method="post">
                                                @csrf
                                                @method('patch')
                                                <input min="1" type="number" name="quantity"
                                                    value="{{ $cart['quantity'] }}">
                                            </form>
                                        </td>
                                        <td>{{ $cart['quantity'] * $cart['price'] }}</td>
                                        <td><a href="{{ route('cart.remove', $id) }}" class="btn btn-outline-dark">X</a>
                                        </td>
                                    </tr>
                                    @php $total=$total+$cart['quantity'] * $cart['price']; @endphp
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td><strong>Total</span></strong>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $total }}</td>
                                    <td></td>
                                </tr>
                            @else

                            @endif

                        </tbody>
                    </table>

                    <div class="row py-3">
                        <div class="col-md-10 mb-3">
                            <a href="{{ route('/') }}" class="btn btn-primary">Continue Shopping</a>
                        </div>
                        @if (session()->get('cart') != [])
                            <div class="col-md-2 mb-3">
                                <a href="{{ route('checkout') }}" class="btn btn-primary">Checkout</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
