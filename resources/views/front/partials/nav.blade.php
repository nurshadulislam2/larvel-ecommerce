<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ route('/') }}">Ecommerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link" href="{{ route('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Category</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach (App\Models\Category::all() as $category)
                            <li><a class="dropdown-item"
                                    href="{{ route('category', $category->id) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Brand</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach (App\Models\Brand::all() as $brand)
                            <li><a class="dropdown-item"
                                    href="{{ route('brand', $brand->id) }}">{{ $brand->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <form class="d-flex" method="get" action="{{ route('search') }}">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </form>
            </ul>
            <form class="d-flex">
                <a class="btn btn-outline-dark" href="{{ route('cart') }}">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">
                        @if (Session::has('cart'))
                            {{ count(Session::get('cart')) }}
                        @else
                            0
                        @endif
                    </span>
                </a>
            </form>
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">{{ \Auth::user()->name }}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                            @if (\Auth::user()->role == 'admin')
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                            @endif
                            <li><a class="dropdown-item" href="{{ route('order.customer') }}">Your Oder</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
