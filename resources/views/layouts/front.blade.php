<!--Header-->
@include('front.partials.header')

<body>
    <!-- Navigation-->
    @include('front.partials.nav')

    @if (Session::has('msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Content -->
    @yield('content')
    <!-- Footer-->
    @include('front.partials.footer')
</body>

</html>
