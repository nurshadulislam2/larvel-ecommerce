@extends('layouts.front')

@section('title', 'Your Order')

@section('content')
    <!-- Section-->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center mb-4">Your Order</h3>
                    <div class="row">
                        @if (count($orders) > 0)
                            @foreach ($orders as $order)
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5>{{ $order->status }}</h5>
                                            <p>{{ $order->price }} Taka</p>
                                            <p>Order: {{ $order->created_at }}</p>
                                        </div>
                                        <div class="card-footer text-muted text-center">
                                            <a href="{{ route('order.detail', $order->id) }}"
                                                class="btn btn-primary">Details</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            No order found
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
