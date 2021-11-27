<!-- Header -->
@include('admin.partials.header')

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        @include('admin.partials.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                @include('admin.partials.topar')

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    @if (Session::has('msg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('msg') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @yield('content')
                    <!--Row-->

                    <!--Footer-->
                    @include('admin.partials.footer')
</body>

</html>
