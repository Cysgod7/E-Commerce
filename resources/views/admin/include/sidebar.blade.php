<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{route('dashboard')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Settings</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Product
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{route('add.product')}}">Product Entry</a>
                    <a class="nav-link" href="{{route('manage.product')}}">Product Management</a>
                </nav>
            </div>
            <a class="nav-link " href="{{route('brand')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Brand
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div>
            </a>
            <a class="nav-link " href="{{route('category')}}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-list-ul"></i></div>
                Category
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div>
            </a>

            <a class="nav-link " href="{{route('user.manage')}}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i> </div>
                User Manage
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div>
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{Auth::user()->name}}
    </div>
</nav>
