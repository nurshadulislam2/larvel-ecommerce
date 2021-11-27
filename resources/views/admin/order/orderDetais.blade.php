@extends('layouts.admin')

@section('title', 'Order Details')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order Details</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order Details</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h4>Order Details</h4>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('pdf', $order->id) }}" class="btn btn-primary">PDF</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p>Name: {{ $order->name }}</p>
                    <p>Email: {{ $order->email }}</p>
                    <p>Mobile: {{ $order->mobile }}</p>
                    <p>Payment Method: {{ $order->payment_method }}</p>
                    <p>Txn_ID: {{ $order->txn_id }}</p>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($details as $detail)
                                <tr>
                                    <td>{{ $detail->name }}</td>
                                    <td>{{ $detail->quantity }}</td>
                                    <td>{{ $detail->price }}</td>
                                </tr>
                                @php
                                    $total = $total + $detail->price;
                                @endphp
                            @endforeach
                            <tr>
                                <th>Total</th>
                                <td></td>
                                <th>{{ $total }}</th>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
