@extends('layouts.front')

@section('title', 'Order Details')

@section('content')
    <!-- Section-->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center mb-4">{{ \Auth::user()->name }} Order Details</h3>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td scope="col">Name</td>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (count($orders) > 0)
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->price }}</td>
                                            <td>{{ $order->quantity }}</td>
                                            <td>{{ $order->quantity * $order->price }}</td>
                                        </tr>
                                        @php
                                            $total = $total + $order->quantity * $order->price;
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td>Total: </td>
                                        <td></td>
                                        <td>{{ $total }}</td>
                                    </tr>
                                @else
                                    No Data Found
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
