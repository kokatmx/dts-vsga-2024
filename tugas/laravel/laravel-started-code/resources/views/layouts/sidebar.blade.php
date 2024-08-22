<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
        </div>
    </div>

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
            <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link {{ $activeMenu == 'dashboard' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-header">Data Pengguna</li>
                    <li class="nav-item">
                        <a href="{{ url('/level') }}" class="nav-link {{ $activeMenu == 'level' ? 'active' : '' }}">
                            <i class="fas fa-layer-group nav-icon"></i>
                            <p>Level User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/user') }}" class="nav-link {{ $activeMenu == 'user' ? 'active' : '' }}">
                            <i class="far fa-user nav-icon"></i>
                            <p>Data User</p>
                        </a>
                    </li>
                    <li class="nav-header">Data Barang</li>
                    <li class="nav-item">
                        <a href="{{ url('/kategori') }}"
                            class="nav-link {{ $activeMenu == 'kategori' ? 'active' : '' }}">
                            <i class="far fa-bookmark nav-icon"></i>
                            <p>Kategori Barang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/barang') }}" class="nav-link {{ $activeMenu == 'barang' ? 'active' : '' }}">
                            <i class="far fa-list-alt nav-icon"></i>
                            <p>Data Barang</p>
                        </a>
                    </li>
                    <li class="nav-header">Data Transaksi</li>
                    <li class="nav-item">
                        <a href="{{ url('/stok') }}" class="nav-link {{ $activeMenu == 'barang' ? 'active' : '' }}">
                            <i class="fas fa-cubes nav-icon"></i>
                            <p>Stok Barang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/barang') }}"
                            class="nav-link {{ $activeMenu == 'penjualan' ? 'active' : '' }}">
                            <i class="fas fa-cash-register nav-icon"></i>
                            <p>Transaksi Penjualan</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
