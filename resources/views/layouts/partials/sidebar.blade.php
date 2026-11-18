<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center py-4" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/logo_kota_bandung.png') }}" alt="Logo Kota Bandung" style="height: 42px; width: auto; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.25));">
        </div>
        <div class="sidebar-brand-text mx-2 text-left">
            <div class="font-weight-bold" style="font-size: 0.95rem; letter-spacing: 0.5px;">SIPK DISDAGIN</div>
            <div class="text-white-50" style="font-size: 0.65rem; letter-spacing: 0.8px;">KOTA BANDUNG</div>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard (Semua role) -->
    <li class="nav-item {{ request()->is('dashboard*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Menu Khusus Admin -->
    @if(auth()->user() && auth()->user()->role === 'admin')
        <div class="sidebar-heading">Pengelolaan Data</div>

        <!-- Nav Item - Kategori -->
        <li class="nav-item {{ request()->is('categories*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('categories') }}">
                <i class="fas fa-fw fa-tags"></i>
                <span>Kategori</span>
            </a>
        </li>

        <!-- Nav Item - Anggaran -->
        <li class="nav-item {{ request()->is('budgets*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('budgets.index') }}">
                <i class="fas fa-fw fa-wallet"></i>
                <span>Anggaran (Pagu)</span>
            </a>
        </li>

        <!-- Nav Item - Pemasukan -->
        <li class="nav-item {{ request()->is('incomes*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('incomes') }}">
                <i class="fas fa-fw fa-arrow-circle-down text-success"></i>
                <span>Pemasukan</span>
            </a>
        </li>

        <!-- Nav Item - Pengeluaran -->
        <li class="nav-item {{ request()->is('expenses*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('expenses') }}">
                <i class="fas fa-fw fa-arrow-circle-up text-danger"></i>
                <span>Pengeluaran</span>
            </a>
        </li>

        <!-- Nav Item - Kelola Pengguna -->
        <li class="nav-item {{ request()->is('users*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="fas fa-fw fa-users-cog"></i>
                <span>Kelola Pengguna</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
    @endif

    <!-- Heading Laporan -->
    <div class="sidebar-heading">Laporan & Pengaturan</div>

    <!-- Nav Item - Laporan (Semua role: Admin & Kadis) -->
    <li class="nav-item {{ request()->is('reports*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('reports.index') }}">
            <i class="fas fa-fw fa-file-invoice-dollar"></i>
            <span>Laporan Keuangan</span>
        </a>
    </li>

    <!-- Nav Item - Profil Saya (Semua role) -->
    <li class="nav-item {{ request()->is('profile*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('profile.index') }}">
            <i class="fas fa-fw fa-user-circle"></i>
            <span>Profil Saya</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Link ke Portal Luar -->
    <div class="sidebar-heading">Tautan Portal</div>
    <li class="nav-item">
        <a class="nav-link" href="https://multisite.bandung.go.id/disdagin/" target="_blank" rel="noopener noreferrer">
            <i class="fas fa-fw fa-globe-asia text-info"></i>
            <span>Website Disdagin</span>
        </a>
    </li>

    <!-- Sidebar Toggle -->
    <div class="text-center d-none d-md-inline my-2">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
