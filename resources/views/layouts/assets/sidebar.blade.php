<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Tersimpan Cerita </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @if (Auth::user()->role_id == 1)
    <li class="nav-item {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="sidebar-heading">
        Master
    </div>
    <li class="nav-item {{ Request::routeIs('admin.roles') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.roles') }}">
            <i class="fas fa-fw fa-crown"></i>
            <span>Roles</span>
        </a>
    </li>
    <li class="nav-item {{ Request::routeIs('admin.users') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.users') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Users</span>
        </a>
    </li>
    <li class="nav-item {{ Request::routeIs('admin.fotografer') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.fotografer') }}">
            <i class="fas fa-fw fa-camera"></i>
            <span>Fotografer</span>
        </a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="sidebar-heading">
        PAKET
    </div>
    <li class="nav-item {{ Request::routeIs('admin.wilayah') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.wilayah') }}">
            <i class="fas fa-fw fa-location-arrow"></i>
            <span>Wilayah</span>
        </a>
    </li>
    <li class="nav-item {{ Request::routeIs('admin.kategori-paket') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.kategori-paket') }}">
            <i class="fas fa-fw fa-pen"></i>
            <span>Kategori</span>
        </a>
    </li>
    <li class="nav-item {{ Request::routeIs('admin.paket') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.paket') }}">
            <i class="fas fa-fw fa-gift"></i>
            <span>Paket</span>
        </a>
    </li>
    <li class="nav-item {{ Request::routeIs('admin.harga-paket') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.harga-paket') }}">
            <i class="fas fa-fw fa-coins"></i>
            <span>Harga Paket</span>
        </a>
    </li>
    <li class="nav-item {{ Request::routeIs('admin.paket-tambahan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.paket-tambahan') }}">
            <i class="fas fa-fw fa-gifts"></i>
            <span>Paket Tambahan</span>
        </a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="sidebar-heading">
        PEMESANAN
    </div>
    <li class="nav-item {{ Request::routeIs('admin.booking') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.booking') }}">
            <i class="fas fa-fw fa-location-arrow"></i>
            <span>Booking</span>
        </a>
    </li>
    <li class="nav-item {{ Request::routeIs('admin.pesanan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.pesanan') }}">
            <i class="fas fa-fw fa-money-bill"></i>
            <span>Pesanan</span>
        </a>
    </li>
    <li class="nav-item {{ Request::routeIs('admin.foto') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.foto') }}">
            <i class="fas fa-fw fa-camera-retro"></i>
            <span>Foto</span>
        </a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    @endif

    @if (Auth::user()->role_id == 2)
    <li class="nav-item {{ Request::routeIs('client.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('client.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item {{ Request::routeIs('client.booking') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('client.booking') }}">
            <i class="fas fa-fw fa-location-arrow"></i>
            <span>Booking</span>
        </a>
    </li>


    <hr class="sidebar-divider d-none d-md-block">
    @endif
</ul>