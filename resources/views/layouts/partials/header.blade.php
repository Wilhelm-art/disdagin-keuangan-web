<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    @include('layouts.partials.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow-sm px-4">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars text-gray-700"></i>
          </button>

          <!-- Topbar Department Header Title -->
          <div class="d-none d-md-flex flex-column justify-content-center">
            <div class="font-weight-bold text-gray-800" style="font-size: 0.92rem; letter-spacing: -0.2px;">
              DINAS PERDAGANGAN DAN PERINDUSTRIAN KOTA BANDUNG
            </div>
            <div class="text-muted small" style="font-size: 0.75rem;">
              Sistem Informasi Pengelolaan Keuangan & Realisasi Anggaran (SIPK)
            </div>
          </div>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto align-items-center">

            <!-- Live Clock / Date Indicator (Desktop) -->
            <li class="nav-item d-none d-lg-block mr-3">
              <div class="text-right">
                <span class="badge badge-light border text-muted px-2 py-1 font-weight-normal" style="font-size: 0.78rem;">
                  <i class="far fa-calendar-alt text-primary mr-1"></i>
                  {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}
                </span>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="d-none d-md-flex flex-column text-right mr-2">
                  <span class="font-weight-bold text-gray-800 small">
                    {{ Auth::check() ? Auth::user()->name : 'Pegawai' }}
                  </span>
                  @if(Auth::check())
                    @if(Auth::user()->role === 'admin')
                      <span class="badge-role-admin">ADMINISTRATOR</span>
                    @else
                      <span class="badge-role-kadis">KEPALA DINAS</span>
                    @endif
                  @endif
                </div>
                <div class="rounded-circle d-flex align-items-center justify-content-center bg-primary text-white shadow-sm" style="width: 38px; height: 38px; font-weight: 700; font-size: 0.9rem;">
                  {{ Auth::check() ? strtoupper(substr(Auth::user()->name, 0, 1)) : 'U' }}
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-header text-uppercase font-weight-bold text-muted small">
                  {{ Auth::check() ? Auth::user()->email : '' }}
                </div>
                <a class="dropdown-item" href="{{ route('profile.index') }}">
                  <i class="fas fa-user-circle fa-sm fa-fw mr-2 text-primary"></i>
                  Profil Saya
                </a>
                <a class="dropdown-item" href="{{ route('dashboard') }}">
                  <i class="fas fa-tachometer-alt fa-sm fa-fw mr-2 text-info"></i>
                  Dashboard
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
                  Keluar (Logout)
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->
