<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('vendor/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            
            {{-- Cashier App --}}
            <li class="nav-item  @if($page == 'Cashier') menu-open @endif">
                <a href="#" class="nav-link @if($page == 'Cashier') active @endif">
                    <i class="fa-solid fa-cash-register"></i>
                    <p>Cashier</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('cashier.index') }}" class="nav-link @if($sub_page == '1' & $page == 'Cashier') active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pembelian</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List and Check Invoice</p>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Analitic App --}}
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-chart-line"></i>
                    <p>Analitic</p>
                </a>
            </li>

            {{-- Logistic App --}}
            <li class="nav-item @if($page == 'Logistic') menu-open @endif">
                <a href="#" class="nav-link @if($page == 'Logistic') active @endif">
                    <i class="fa-solid fa-warehouse"></i>
                    <p>Logistic</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('logistic.index') }}" class="nav-link @if($sub_page == '1' & $page == 'Logistic') active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Logistic Table</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logistic.create') }}" class="nav-link @if($sub_page == '2' & $page == 'Logistic') active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Multiple Input</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logistic.edit') }}" class="nav-link nav-link @if($sub_page == '3' & $page == 'Logistic') active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Multiple Edit</p>
                        </a>
                    </li>
                </ul>

            </li>
        </ul>
    </nav>
</aside>