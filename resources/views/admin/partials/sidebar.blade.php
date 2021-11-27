<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('/') }}">
        
        <div class="sidebar-brand-text mx-3">Ecommerce</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Features
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#category" aria-expanded="true"
            aria-controls="collapseBootstrap">
            <i class="fas fa-list-alt"></i>
            <span>Category</span>
        </a>
        <div id="category" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.category.create') }}">Create</a>
                <a class="collapse-item" href="{{ route('admin.category') }}">View</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#brand" aria-expanded="true"
            aria-controls="collapseBootstrap">
            <i class="fas fa-cubes"></i>
            <span>Brand</span>
        </a>
        <div id="brand" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.brand.create') }}">Create</a>
                <a class="collapse-item" href="{{ route('admin.brand') }}">View</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#product" aria-expanded="true"
            aria-controls="collapseBootstrap">
            <i class="fas fa-box"></i>
            <span>Product</span>
        </a>
        <div id="product" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.product.create') }}">Create</a>
                <a class="collapse-item" href="{{ route('admin.product') }}">View</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.customer') }}">
            <i class="fas fa-user"></i>
            <span>All Customers</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.order') }}">
        <i class="fas fa-shopping-cart"></i>
            <span>All Order</span>
        </a>
    </li>
</ul>
