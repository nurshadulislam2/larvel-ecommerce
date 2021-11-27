@extends('layouts.front')

@section('title', 'Checkout')

@section('content')
    <!-- Section-->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-center mb-4">Checkout</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Image</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (Session::get('cart'))
                                @php
                                    $total = 0;
                                    $qnt = 0;
                                @endphp
                                @foreach (session('cart') as $id => $cart)
                                    <tr>
                                        <td>{{ $cart['name'] }}</td>
                                        <td><img src="{{ asset('uploads/products/' . $cart['image']) }}" width="100"
                                                alt="{{ $cart['name'] }}"></td>
                                        <td>
                                            {{ $cart['quantity'] }}
                                        </td>
                                        <td>{{ $cart['quantity'] * $cart['price'] }}</td>
                                    </tr>
                                    @php
                                        $total = $total + $cart['quantity'] * $cart['price'];
                                        $qnt = $qnt + $cart['quantity'];
                                    @endphp
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td><strong>Total</span></strong>
                                    <td></td>
                                    <td>{{ $total }}</td>
                                </tr>
                            @else

                            @endif

                        </tbody>
                    </table>

                    <div class="row py-3">
                        <div class="col-md-12 mb-3">
                            <a href="{{ route('/') }}" class="btn btn-primary">Continue Shopping</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('order') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text"
                                class="form-control @error('name')
                                is-inavlid
                            @enderror"
                                id="name" name="name" value="{{ \Auth::user()->name }}">

                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email"
                                class="form-control @error('email')
                                is-inavlid
                            @enderror"
                                id="email" name="email" value="{{ \Auth::user()->email }}">

                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text"
                                class="form-control @error('mobile')
                                is-inavlid
                            @enderror"
                                id="mobile" name="mobile" value="{{ \Auth::user()->mobile }}">

                            @error('mobile')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea name="address" id="address" cols="30" rows="3"
                                class="form-control @error('address')
                                    is-invalid
                                @enderror">{{ \Auth::user()->address }}</textarea>

                            @error('address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="payment_method" class="form-label">Payment Method</label>
                            <select name="payment_method" id="payment_method" class="form-select">
                                <option value="bkash">Bkash</option>
                                <option value="nagad">Nagad</option>
                                <option value="rocket">Rocket</option>
                            </select>

                            @error('payment_method')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="txn_id" class="form-label">Transaction ID</label>
                            <input type="text"
                                class="form-control @error('txn_id')
                                is-inavlid
                            @enderror"
                                id="txn_id" name="txn_id">

                            @error('txn_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <input type="number" name="price" id="price" value="{{ $total }}" hidden>
                        <input type="number" name="quantity" id="quantity" value="{{ $qnt }}" hidden>
                        <button type="submit" class="btn btn-primary">Order</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
