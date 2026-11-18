<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand my-3 d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500" width="50" height="50">
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
        <div class="sidebar-brand-text mx-3">
            DISDAGIN
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard (Berlaku untuk semua role) -->
    <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Menu Lain Hanya untuk Admin -->
    @if(auth()->user() && auth()->user()->role === 'admin')
        <!-- Heading -->
        <div class="sidebar-heading">Data</div>

        <!-- Nav Item - Data Master -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-chart-area"></i>
                <span>Data Master</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('categories') }}">
                        <i class="fa fa-tags mr-2"></i>Category
                    </a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Budgets -->
        <li class="nav-item">
            <a href="{{ route('budgets.index') }}" class="nav-link">
                <i class="fa fa-wallet"></i>
                <span>Budget</span>
            </a>
        </li>

        <!-- Nav Item - Pemasukan -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('incomes') }}">
                <i class="fas fa-arrow-down"></i>
                <span>Pemasukan</span>
            </a>
        </li>

        <!-- Nav Item - Pengeluaran -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('expenses') }}">
                <i class="fas fa-arrow-up"></i>
                <span>Pengeluaran</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
    @endif

    <!-- Nav Item - Laporan (Berlaku untuk semua role, termasuk kadis) -->
    <li class="nav-item">
        <a href="{{ route('reports.index') }}" class="nav-link">
            <i class="fa fa-chart-bar"></i>
            <span>Laporan</span>
        </a>
    </li>

    <!-- Sidebar Toggle -->
    <div class="text-center d-none d-md-inline">
        <br>
        <button class="rounded-sm border-0" id="sidebarToggle"></button>
    </div>

</ul>
