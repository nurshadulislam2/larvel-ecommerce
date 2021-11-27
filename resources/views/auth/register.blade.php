<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register - Ecommerce</title>
    <link href="{{ asset('/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/admin/css/ruang-admin.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-login">
    <!-- Register Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                    </div>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text"
                                                class="form-control @error('name')
                                            is-invalid
                                        @enderror"
                                                id="name" name="name" placeholder="Name">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile</label>
                                            <input type="text"
                                                class="form-control @error('mobile')
                                            is-invalid
                                        @enderror"
                                                id="mobile" name="mobile" placeholder="Mobile">
                                            @error('mobile')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email"
                                                class="form-control @error('email')
                                            is-invalid
                                        @enderror"
                                                name="email" id="email" placeholder=" Enter
Email Address">
                                            @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea name="address"
                                                class="form-control @error('address')
                                            is-invalid
                                        @enderror"
                                                id="address" cols="30" rows="3"></textarea>
                                            @error('address')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password"
                                                class="form-control @error('password')
                                            is-invalid
                                        @enderror"
                                                name="password" id="password" placeholder="Password">
                                            @error('password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Repeat Password</label>
                                            <input type="password" class="form-control"
                                                id="exampleInputPasswordRepeat" name="password_confirmation"
                                                placeholder="Repeat Password">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="font-weight-bold" href="{{ route('login') }}">Already have an
                                            account?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="font-weight-bold" href="{{ route('/') }}">Home</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Content -->
    <script src="{{ asset('/admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('/admin/js/ruang-admin.min.js') }}"></script>
</body>

</html>
