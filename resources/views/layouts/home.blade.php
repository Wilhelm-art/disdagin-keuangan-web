<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistem Informasi Pengelolaan Keuangan & Realisasi Anggaran (SIPK) - Dinas Perdagangan dan Perindustrian Kota Bandung.">
  <meta name="author" content="Pemerintah Kota Bandung">
  <title>@yield('title', 'SIPK - Dinas Perdagangan dan Perindustrian Kota Bandung')</title>
  
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('img/logo_kota_bandung.png') }}">

  <!-- Fonts & Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Core Stylesheets -->
  <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
  <link href="{{ asset('css/disdagin-theme.css') }}" rel="stylesheet">

  <style>
    /* Government Top Utility Bar */
    .gov-topbar {
      background-color: #081a35;
      color: #94a3b8;
      font-size: 0.78rem;
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }
    .gov-topbar a {
      color: #cbd5e1;
      transition: color 0.2s ease;
      text-decoration: none;
    }
    .gov-topbar a:hover {
      color: #fcb900;
    }

    /* Main Navigation Bar */
    .navbar-disdagin {
      background-color: #0c264c;
      box-shadow: 0 4px 20px rgba(12, 38, 76, 0.15);
      padding: 0.75rem 0;
      transition: all 0.3s ease;
    }
    .navbar-disdagin .navbar-brand {
      display: flex;
      align-items: center;
      gap: 12px;
      text-decoration: none;
    }
    .navbar-disdagin .nav-link {
      color: rgba(255, 255, 255, 0.85) !important;
      font-weight: 500;
      font-size: 0.92rem;
      padding: 0.5rem 1rem !important;
      transition: all 0.2s ease;
      border-radius: 6px;
    }
    .navbar-disdagin .nav-link:hover {
      color: #fcb900 !important;
      background: rgba(255, 255, 255, 0.06);
    }
    .navbar-disdagin .btn-sso {
      background: linear-gradient(135deg, #1890d7 0%, #0c264c 100%);
      color: #ffffff !important;
      font-weight: 700;
      font-size: 0.88rem;
      border-radius: 30px;
      padding: 0.55rem 1.4rem;
      border: 1px solid rgba(255, 255, 255, 0.2);
      box-shadow: 0 4px 15px rgba(24, 144, 215, 0.3);
      transition: all 0.3s ease;
    }
    .navbar-disdagin .btn-sso:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(24, 144, 215, 0.45);
      background: linear-gradient(135deg, #20a0ee 0%, #163e77 100%);
    }

    /* Official Footer */
    .footer-disdagin {
      background-color: #081a35;
      color: #94a3b8;
      border-top: 4px solid var(--disdagin-gold);
    }
    .footer-disdagin h5 {
      color: #ffffff;
      font-size: 1.05rem;
      margin-bottom: 1.25rem;
      position: relative;
      padding-bottom: 0.5rem;
    }
    .footer-disdagin h5::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 35px;
      height: 2px;
      background-color: var(--disdagin-gold);
    }
    .footer-disdagin ul {
      list-style: none;
      padding-left: 0;
    }
    .footer-disdagin ul li {
      margin-bottom: 0.6rem;
    }
    .footer-disdagin ul li a {
      color: #94a3b8;
      text-decoration: none;
      transition: all 0.2s ease;
      font-size: 0.88rem;
    }
    .footer-disdagin ul li a:hover {
      color: #fcb900;
      padding-left: 4px;
    }
    .footer-bottom {
      background-color: #051124;
      border-top: 1px solid rgba(255, 255, 255, 0.05);
      font-size: 0.82rem;
    }
  </style>

  @stack('styles')
</head>

<body id="page-top" class="d-flex flex-column min-vh-100">

  <!-- Government Top Utility Bar -->
  <div class="gov-topbar py-2 d-none d-md-block">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center gap-3">
        <span class="mr-3">
          <i class="fas fa-landmark mr-1 text-warning"></i>
          Pemerintah Kota Bandung
        </span>
        <span class="mr-3">
          <i class="fas fa-map-marker-alt mr-1 text-danger"></i>
          Jl. Tamansari No. 59, Kota Bandung 40132
        </span>
        <span>
          <i class="far fa-clock mr-1 text-info"></i>
          Jam Layanan: Senin - Jumat (08.00 - 16.00 WIB)
        </span>
      </div>
      <div>
        <a href="https://multisite.bandung.go.id/disdagin/" target="_blank" rel="noopener noreferrer" class="mr-3">
          <i class="fas fa-globe mr-1"></i>Portal DISDAGIN
        </a>
        <a href="https://www.bandung.go.id" target="_blank" rel="noopener noreferrer">
          <i class="fas fa-external-link-alt mr-1"></i>Portal Utama Kota Bandung
        </a>
      </div>
    </div>
  </div>

  <!-- Main Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-disdagin sticky-top">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('img/logo_kota_bandung.png') }}" alt="Logo Kota Bandung" style="height: 48px; width: auto;">
        <div class="d-flex flex-column">
          <span class="font-weight-bold text-white text-uppercase" style="font-size: 1.05rem; letter-spacing: 0.3px; line-height: 1.2;">
            DISDAGIN
          </span>
          <span class="text-white-50 small" style="font-size: 0.72rem; letter-spacing: 0.5px;">
            DINAS PERDAGANGAN & PERINDUSTRIAN KOTA BANDUNG
          </span>
        </div>
      </a>

      <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
      </button>

      <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav ml-auto align-items-center">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home mr-1"></i>Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#tentang"><i class="fas fa-info-circle mr-1"></i>Tentang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#pilar"><i class="fas fa-shield-alt mr-1"></i>Pilar SIPK</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#layanan"><i class="fas fa-th-large mr-1"></i>Layanan Publik</a>
          </li>
          <li class="nav-item ml-lg-3 mt-2 mt-lg-0">
            @auth
              <a href="{{ route('dashboard') }}" class="btn btn-sso">
                <i class="fas fa-tachometer-alt mr-1"></i>Ke Dashboard
              </a>
            @else
              <a href="{{ route('login') }}" class="btn btn-sso">
                <i class="fas fa-lock mr-1"></i>Masuk Sistem Keuangan
              </a>
            @endauth
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Content Slot -->
  <main class="flex-grow-1">
    @yield('content')
  </main>

  <!-- Official Government Footer -->
  <footer class="footer-disdagin pt-5">
    <div class="container pb-4">
      <div class="row">
        <!-- Col 1: Instansi Profile -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="d-flex align-items-center mb-3">
            <img src="{{ asset('img/logo_kota_bandung.png') }}" alt="Logo Kota Bandung" style="height: 48px;" class="mr-3">
            <div>
              <h6 class="text-white font-weight-bold mb-0">DINAS PERDAGANGAN & PERINDUSTRIAN</h6>
              <span class="text-warning small font-weight-bold">PEMERINTAH KOTA BANDUNG</span>
            </div>
          </div>
          <p class="small text-muted" style="line-height: 1.6;">
            Sistem Informasi Pengelolaan Keuangan & Realisasi Anggaran (SIPK) merupakan platform internal kedinasan untuk mendukung transparansi, efisiensi penatausahaan kas, dan pelaporan perbendaharaan daerah yang akuntabel.
          </p>
          <div class="d-flex gap-2 mt-3">
            <a href="https://multisite.bandung.go.id/disdagin/" target="_blank" class="btn btn-sm btn-outline-light mr-2">
              <i class="fas fa-globe mr-1"></i>Portal Resmi
            </a>
            <a href="https://arimbi.bandung.go.id/market" target="_blank" class="btn btn-sm btn-outline-warning">
              <i class="fas fa-chart-line mr-1"></i>ARIMBI
            </a>
          </div>
        </div>

        <!-- Col 2: Alamat & Kontak -->
        <div class="col-lg-3 col-md-6 mb-4">
          <h5>Alamat Kantor</h5>
          <p class="small text-muted mb-2">
            <i class="fas fa-map-marked-alt text-warning mr-2"></i>
            Jl. Tamansari No. 59, Kel. Lebak Siliwangi, Kec. Coblong, Kota Bandung, Jawa Barat 40132
          </p>
          <p class="small text-muted mb-2">
            <i class="fas fa-envelope text-warning mr-2"></i>
            disdagin@bandung.go.id
          </p>
          <p class="small text-muted mb-2">
            <i class="fas fa-clock text-warning mr-2"></i>
            Senin – Jumat: 08:00 – 16:00 WIB
          </p>
          <p class="small text-muted mb-0">
            <i class="fas fa-calendar-times text-danger mr-2"></i>
            Sabtu, Minggu & Hari Libur Nasional: Tutup
          </p>
        </div>

        <!-- Col 3: Layanan Terkait -->
        <div class="col-lg-3 col-md-6 mb-4">
          <h5>Layanan Terpadu</h5>
          <ul>
            <li><a href="https://arimbi.bandung.go.id/market" target="_blank"><i class="fas fa-chevron-right mr-2 text-warning small"></i>ARIMBI (Harga Bahan Pokok)</a></li>
            <li><a href="https://multisite.bandung.go.id/disdagin/mesin-industri/" target="_blank"><i class="fas fa-chevron-right mr-2 text-warning small"></i>Pelayanan Mesin Balai Industri</a></li>
            <li><a href="https://smartcity.bandung.go.id/forum/search_result?q=%23daginUTTP" target="_blank"><i class="fas fa-chevron-right mr-2 text-warning small"></i>Layanan Kemetrologian UTTP</a></li>
            <li><a href="https://multisite.bandung.go.id/disdagin/profil-ppid/" target="_blank"><i class="fas fa-chevron-right mr-2 text-warning small"></i>PPID DISDAGIN</a></li>
            <li><a href="https://www.lapor.go.id/" target="_blank"><i class="fas fa-chevron-right mr-2 text-warning small"></i>SP4N-LAPOR! Pengaduan</a></li>
          </ul>
        </div>

        <!-- Col 4: Keamanan & Akses -->
        <div class="col-lg-2 col-md-6 mb-4">
          <h5>Akses Aparatur</h5>
          <p class="small text-muted mb-3">
            Sistem tertutup khusus aparatur berwenang DISDAGIN Kota Bandung.
          </p>
          <a href="{{ route('login') }}" class="btn btn-warning btn-block font-weight-bold text-dark shadow-sm">
            <i class="fas fa-key mr-1"></i>Login SIPK
          </a>
        </div>
      </div>
    </div>

    <!-- Copyright Bar -->
    <div class="footer-bottom py-3">
      <div class="container text-center text-muted">
        <span>&copy; {{ date('Y') }} <strong>Pemerintah Kota Bandung</strong> — Dinas Perdagangan dan Perindustrian. Hak Cipta Dilindungi.</span>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('js/sb-admin-2.js') }}"></script>
  @stack('scripts')
</body>

</html>
