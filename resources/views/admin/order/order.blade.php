@extends('layouts.admin')

@section('title', 'Order')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Orders</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Txn_ID</th>
                                <th scope="col">Status</th>
                                <th scope="col">View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($orders) > 0)
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->price }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->payment_method }}</td>
                                        <td>{{ $order->txn_id }}</td>
                                        <td>
                                            @if ($order->status == 'done')
                                                <span class="btn-success p-2">Done</span>
                                            @elseif($order->status=="cancel")
                                                <span class="btn-secondary p-2">Cancel</span>
                                            @else
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#exampleModal{{ $order->id }}">
                                                    Pending
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{ $order->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    {{ $order->name }} Status</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form
                                                                    action="{{ route('admin.order.status', $order->id) }}"
                                                                    method="post">
                                                                    @method('patch')
                                                                    @csrf

                                                                    <div class="form-group">
                                                                        <label for="status">Status</label>
                                                                        <select class="form-control" id="status"
                                                                            name="status">
                                                                            <option value="pending" selected>Pending
                                                                            </option>
                                                                            <option value="done">Done</option>
                                                                            <option value="cancel">Cancel</option>
                                                                        </select>
                                                                    </div>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Submit</button>

                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td><a href="{{ route('admin.orderDetails', $order->id) }}"
                                                class="btn btn-outline-primary">View</a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3">No Data Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
