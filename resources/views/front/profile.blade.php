@extends('layouts.front')

@section('title', 'Profile')

@section('content')
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-8 offset-md-2">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="text-center mb-5">Profile</h3>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('order.customer') }}" class="btn btn-primary">Your Order</a>
                        </div>
                    </div>
                    <form action="{{ route('profile.update', \Auth::user()->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="form-control @error('name')
                                    is-invalid
                                @enderror"
                                    id="name" value="{{ \Auth::user()->name }}" name="name">
                                @error('name')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" name="email" id="email"
                                    value="{{ \Auth::user()->email }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="form-control @error('mobile')
                                    is-invalid
                                @enderror"
                                    id="mobile" value="{{ \Auth::user()->mobile }}" name="mobile">
                                @error('mobile')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="form-control @error('address')
                                    is-invalid
                                @enderror"
                                    id="address" value="{{ \Auth::user()->address }}" name="address">
                                @error('address')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
