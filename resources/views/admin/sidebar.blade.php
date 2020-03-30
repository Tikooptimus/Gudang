<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{route('admin.home')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <!-- If buat akses Admin -->
                @if (Auth::user()->akses == 'admin')
                <a class="nav-link" href="{{route('admin.user')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    User
                </a>
                @endif
                <!-- Akhir If akses Admin -->

                <!-- If buat akses Admin dan Asisten -->
                @if (Auth::user()->akses == 'admin' || Auth::user()->akses == 'asisten')

                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Gudang 1
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">

                        <a class="nav-link" href="{{route('admin.kategori')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-list-ul"></i></div>
                            Kategori
                        </a>

                        <a class="nav-link" href="{{route('admin.produk')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-cube"></i></div>
                            Produk
                        </a>

                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Gudang 2
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                        <a class="nav-link" href="{{route('category.index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            Category
                        </a>

                        <a class="nav-link" href="{{route('product.index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-cubes"></i></div>
                            Product
                        </a>

                    </nav>
                </div>
                @endif
                <!-- Akhir If akses Admin dan Asisten -->

            </div>

        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{Auth::user()->name}}
        </div>
    </nav>
</div>
