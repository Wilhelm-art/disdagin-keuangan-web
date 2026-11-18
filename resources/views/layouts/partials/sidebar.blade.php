<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand my-3 d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500" width="45" height="45">
                <circle cx="250" cy="250" r="240" fill="white" stroke="#FF6A00" stroke-width="20" />
                <g transform="translate(180, 30) scale(0.7)">
                    <rect x="50" y="50" width="100" height="100" fill="#F4C542" />
                    <rect x="60" y="60" width="80" height="60" fill="#5B8CC0" />
                    <path d="M 50 160 L 150 160 L 100 210 Z" fill="#E0E0E0" />
                </g>
                <text x="100" y="250" font-family="Arial, sans-serif" font-size="70" font-weight="bold" fill="#D21E25">
                    Dis<tspan fill="#0066CC">dag</tspan><tspan fill="#FF6A00">in</tspan>
                </text>
                <text x="110" y="300" font-family="Arial, sans-serif" font-size="20" fill="#D21E25">
                    KOTA BANDUNG
                </text>
            </svg>
        </div>
        <div class="sidebar-brand-text mx-2 font-weight-bold">
            DISDAGIN
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard (Semua role) -->
    <li class="nav-item {{ request()->is('dashboard*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-home"></i>
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
                <span>Anggaran</span>
            </a>
        </li>

        <!-- Nav Item - Pemasukan -->
        <li class="nav-item {{ request()->is('incomes*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('incomes') }}">
                <i class="fas fa-fw fa-arrow-down text-success"></i>
                <span>Pemasukan</span>
            </a>
        </li>

        <!-- Nav Item - Pengeluaran -->
        <li class="nav-item {{ request()->is('expenses*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('expenses') }}">
                <i class="fas fa-fw fa-arrow-up text-danger"></i>
                <span>Pengeluaran</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
    @endif

    <!-- Heading Laporan -->
    <div class="sidebar-heading">Laporan & Analisis</div>

    <!-- Nav Item - Laporan (Semua role: Admin & Kadis) -->
    <li class="nav-item {{ request()->is('reports*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('reports.index') }}">
            <i class="fas fa-fw fa-chart-bar"></i>
            <span>Laporan Keuangan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggle -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
