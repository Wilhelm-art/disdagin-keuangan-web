<!DOCTYPE html>
<html lang="id" prefix="og: https://ogp.me/ns#">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">
  <meta name="theme-color" content="#0c264c">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

  <!-- ===================================================================
       PRIMARY SEO METADATA
       =================================================================== -->
  <title>@yield('title', 'SIPK DISDAGIN Kota Bandung - Sistem Informasi Pengelolaan Keuangan & Realisasi Anggaran')</title>
  <meta name="title" content="SIPK DISDAGIN Kota Bandung - Sistem Informasi Pengelolaan Keuangan & Realisasi Anggaran">
  <meta name="description" content="Portal resmi Sistem Informasi Pengelolaan Keuangan & Realisasi Anggaran (SIPK) Dinas Perdagangan dan Perindustrian Kota Bandung. Akuntabilitas, transparansi APBD, penatausahaan kas, dan laporan standar akuntansi pemerintahan.">
  <meta name="keywords" content="disdagin kota bandung, dinas perdagangan dan perindustrian kota bandung, sipk disdagin, keuangan disdagin, realisasi anggaran disdagin, apbd kota bandung, arimbi bandung, pasar kota bandung, metrologi legal bandung">
  <meta name="author" content="Dinas Perdagangan dan Perindustrian Kota Bandung">
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
  <link rel="canonical" href="https://paynote-web-flax.vercel.app/">

  <!-- ===================================================================
       GEO-TARGETING & LOCAL SEO (BANDUNG, JAWA BARAT, ID)
       =================================================================== -->
  <meta name="geo.region" content="ID-JB">
  <meta name="geo.placename" content="Kota Bandung, Jawa Barat, Indonesia">
  <meta name="geo.position" content="-6.8904;107.6098">
  <meta name="ICBM" content="-6.8904, 107.6098">

  <!-- ===================================================================
       OPEN GRAPH / FACEBOOK SOCIAL METADATA
       =================================================================== -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://paynote-web-flax.vercel.app/">
  <meta property="og:site_name" content="Dinas Perdagangan dan Perindustrian Kota Bandung">
  <meta property="og:title" content="SIPK DISDAGIN Kota Bandung - Pengelolaan Keuangan & Realisasi Anggaran">
  <meta property="og:description" content="Platform resmi perbendaharaan digital, penetapan pagu kegiatan APBD, penatausahaan kas, dan pelaporan keuangan terpadu DISDAGIN Kota Bandung.">
  <meta property="og:image" content="https://paynote-web-flax.vercel.app/img/logo_kota_bandung.png">
  <meta property="og:image:width" content="600">
  <meta property="og:image:height" content="600">
  <meta property="og:image:alt" content="Lambang Resmi Pemerintah Kota Bandung">
  <meta property="og:locale" content="id_ID">

  <!-- ===================================================================
       TWITTER CARDS
       =================================================================== -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="https://paynote-web-flax.vercel.app/">
  <meta name="twitter:title" content="SIPK DISDAGIN Kota Bandung - Pengelolaan Keuangan">
  <meta name="twitter:description" content="Sistem Informasi Pengelolaan Keuangan & Realisasi Anggaran belanja daerah Dinas Perdagangan dan Perindustrian Kota Bandung.">
  <meta name="twitter:image" content="https://paynote-web-flax.vercel.app/img/logo_kota_bandung.png">

  <!-- ===================================================================
       PAGESPEED: RESOURCE HINTS & PRECONNECT
       =================================================================== -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="dns-prefetch" href="https://fonts.googleapis.com">
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/logo_kota_bandung.png') }}">
  <link rel="apple-touch-icon" href="{{ asset('img/logo_kota_bandung.png') }}">

  <!-- Fonts & Icons with font-display swap -->
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Core Stylesheets -->
  <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
  <link href="{{ asset('css/disdagin-theme.css') }}" rel="stylesheet">

  <style>
    /* Responsive Fluid Typography */
    :root {
      --fluid-h1: clamp(1.85rem, 4.5vw, 2.85rem);
      --fluid-h2: clamp(1.5rem, 3.5vw, 2.15rem);
      --fluid-lead: clamp(1rem, 2vw, 1.15rem);
    }

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
      color: rgba(255, 255, 255, 0.88) !important;
      font-weight: 500;
      font-size: 0.92rem;
      padding: 0.6rem 1rem !important;
      min-height: 44px;
      display: inline-flex;
      align-items: center;
      transition: all 0.2s ease;
      border-radius: 6px;
    }
    .navbar-disdagin .nav-link:hover {
      color: #fcb900 !important;
      background: rgba(255, 255, 255, 0.08);
    }
    .navbar-disdagin .btn-sso {
      background: linear-gradient(135deg, #1890d7 0%, #0c264c 100%);
      color: #ffffff !important;
      font-weight: 700;
      font-size: 0.88rem;
      border-radius: 30px;
      padding: 0.6rem 1.4rem;
      min-height: 44px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      border: 1px solid rgba(255, 255, 255, 0.2);
      box-shadow: 0 4px 15px rgba(24, 144, 215, 0.3);
      transition: all 0.3s ease;
    }
    .navbar-disdagin .btn-sso:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(24, 144, 215, 0.45);
      background: linear-gradient(135deg, #20a0ee 0%, #163e77 100%);
    }

    /* Mobile Collapsible Navigation Polish */
    @media (max-width: 991.98px) {
      .navbar-collapse {
        background: #081a35;
        border-radius: 12px;
        padding: 16px;
        margin-top: 12px;
        border: 1px solid rgba(255, 255, 255, 0.1);
      }
      .navbar-disdagin .btn-sso {
        width: 100%;
        margin-top: 8px;
      }
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
      display: inline-block;
      padding: 2px 0;
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

  <!-- ===================================================================
       AEO & STRUCTURED DATA: JSON-LD (SCHEMA.ORG)
       GovernmentOrganization, WebSite, FAQPage, BreadcrumbList
       =================================================================== -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": "GovernmentOrganization",
        "@id": "https://paynote-web-flax.vercel.app/#organization",
        "name": "Dinas Perdagangan dan Perindustrian Kota Bandung",
        "alternateName": ["DISDAGIN Kota Bandung", "Dinas Perdagangan & Perindustrian Kota Bandung"],
        "url": "https://multisite.bandung.go.id/disdagin/",
        "logo": {
          "@type": "ImageObject",
          "url": "https://paynote-web-flax.vercel.app/img/logo_kota_bandung.png",
          "width": 600,
          "height": 600
        },
        "parentOrganization": {
          "@type": "GovernmentOrganization",
          "name": "Pemerintah Kota Bandung",
          "url": "https://www.bandung.go.id"
        },
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "Jl. Tamansari No. 59, Kel. Lebak Siliwangi, Kec. Coblong",
          "addressLocality": "Bandung",
          "addressRegion": "Jawa Barat",
          "postalCode": "40132",
          "addressCountry": "ID"
        },
        "geo": {
          "@type": "GeoCoordinates",
          "latitude": -6.8904,
          "longitude": 107.6098
        },
        "telephone": "+62-22-2503254",
        "email": "disdagin@bandung.go.id",
        "openingHoursSpecification": [
          {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
            "opens": "08:00",
            "closes": "16:00"
          }
        ]
      },
      {
        "@type": "WebSite",
        "@id": "https://paynote-web-flax.vercel.app/#website",
        "url": "https://paynote-web-flax.vercel.app/",
        "name": "SIPK DISDAGIN Kota Bandung",
        "description": "Sistem Informasi Pengelolaan Keuangan & Realisasi Anggaran Dinas Perdagangan dan Perindustrian Kota Bandung.",
        "publisher": {
          "@id": "https://paynote-web-flax.vercel.app/#organization"
        },
        "inLanguage": "id-ID"
      },
      {
        "@type": "BreadcrumbList",
        "@id": "https://paynote-web-flax.vercel.app/#breadcrumb",
        "itemListElement": [
          {
            "@type": "ListItem",
            "position": 1,
            "name": "Beranda",
            "item": "https://paynote-web-flax.vercel.app/"
          },
          {
            "@type": "ListItem",
            "position": 2,
            "name": "Masuk Sistem",
            "item": "https://paynote-web-flax.vercel.app/login"
          }
        ]
      },
      {
        "@type": "FAQPage",
        "@id": "https://paynote-web-flax.vercel.app/#faq",
        "mainEntity": [
          {
            "@type": "Question",
            "name": "Apa itu SIPK DISDAGIN Kota Bandung?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "SIPK DISDAGIN adalah Sistem Informasi Pengelolaan Keuangan & Realisasi Anggaran terpadu di lingkungan Dinas Perdagangan dan Perindustrian Pemerintah Kota Bandung. Sistem ini memfasilitasi pengawasan alokasi pagu kegiatan APBD, penatausahaan arus kas pemasukan retribusi, pengendalian belanja operasional, dan penerbitan laporan keuangan standar akuntansi pemerintahan."
            }
          },
          {
            "@type": "Question",
            "name": "Apa tugas pokok dan fungsi (tupoksi) Dinas Perdagangan dan Perindustrian Kota Bandung?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "DISDAGIN Kota Bandung bertugas melaksanakan urusan pemerintahan daerah di bidang perdagangan dalam negeri, pengembangan ekspor luar negeri, stabilisasi harga kebutuhan bahan pokok, pengawasan kemetrologian legal (tera UTTP), dan pemberdayaan Industri Kecil dan Menengah (IKM) di wilayah Kota Bandung."
            }
          },
          {
            "@type": "Question",
            "name": "Bagaimana cara mengecek harga kebutuhan pokok harian di Kota Bandung?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Masyarakat dapat memantau data harga kebutuhan bahan pokok masyarakat harian di berbagai pasar rakyat Kota Bandung melalui aplikasi resmi ARIMBI (Aplikasi Real Time Informasi Bahan Pokok) yang dikelola DISDAGIN di portal https://arimbi.bandung.go.id/market."
            }
          },
          {
            "@type": "Question",
            "name": "Di mana alamat dan kontak resmi kantor DISDAGIN Kota Bandung?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Kantor Dinas Perdagangan dan Perindustrian Kota Bandung beralamat di Jl. Tamansari No. 59, Kelurahan Lebak Siliwangi, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132. Nomor telepon: (022) 2503254 dan email: disdagin@bandung.go.id."
            }
          },
          {
            "@type": "Question",
            "name": "Siapa yang memiliki hak akses ke sistem keuangan SIPK DISDAGIN?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Sistem SIPK dilindungi oleh kontrol akses berbasis peran (RBAC) pada server. Hak akses penuh untuk mengelola data master, anggaran, kas, dan akun pegawai dimiliki oleh Administrator Teknis / PPK Keuangan, sedangkan Kepala Dinas memiliki hak akses eksekutif untuk monitoring dan pengunduhan laporan akuntabilitas berkala."
            }
          }
        ]
      }
    ]
  }
  </script>

  @stack('styles')
</head>

<body id="page-top" class="d-flex flex-column min-vh-100">

  <!-- Government Top Utility Bar -->
  <div class="gov-topbar py-2 d-none d-md-block">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center">
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
  <nav class="navbar navbar-expand-lg navbar-dark navbar-disdagin sticky-top" aria-label="Navigasi Utama">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('img/logo_kota_bandung.png') }}" alt="Logo Resmi Pemerintah Kota Bandung" width="48" height="48" fetchpriority="high" style="height: 48px; width: auto;">
        <div class="d-flex flex-column">
          <span class="font-weight-bold text-white text-uppercase" style="font-size: 1.05rem; letter-spacing: 0.3px; line-height: 1.2;">
            DISDAGIN
          </span>
          <span class="text-white-50 small" style="font-size: 0.72rem; letter-spacing: 0.5px;">
            DINAS PERDAGANGAN & PERINDUSTRIAN KOTA BANDUNG
          </span>
        </div>
      </a>

      <button class="navbar-toggler border-0 p-2" type="button" data-toggle="collapse" data-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Buka Menu Navigasi" style="min-width: 44px; min-height: 44px;">
        <i class="fas fa-bars text-white fa-lg"></i>
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
          <li class="nav-item">
            <a class="nav-link" href="#faq"><i class="fas fa-question-circle mr-1"></i>FAQ</a>
          </li>
          <li class="nav-item ml-lg-3 mt-2 mt-lg-0 w-100 w-lg-auto">
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
  <main class="flex-grow-1" id="main-content">
    @yield('content')
  </main>

  <!-- Official Government Footer -->
  <footer class="footer-disdagin pt-5">
    <div class="container pb-4">
      <div class="row">
        <!-- Col 1: Instansi Profile -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="d-flex align-items-center mb-3">
            <img src="{{ asset('img/logo_kota_bandung.png') }}" alt="Logo Kota Bandung" width="48" height="48" loading="lazy" decoding="async" style="height: 48px; width: auto;" class="mr-3">
            <div>
              <h6 class="text-white font-weight-bold mb-0">DINAS PERDAGANGAN & PERINDUSTRIAN</h6>
              <span class="text-warning small font-weight-bold">PEMERINTAH KOTA BANDUNG</span>
            </div>
          </div>
          <p class="small text-muted" style="line-height: 1.6;">
            Sistem Informasi Pengelolaan Keuangan & Realisasi Anggaran (SIPK) merupakan platform internal kedinasan untuk mendukung transparansi, efisiensi penatausahaan kas, dan pelaporan perbendaharaan daerah yang akuntabel.
          </p>
          <div class="d-flex gap-2 mt-3">
            <a href="https://multisite.bandung.go.id/disdagin/" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-light mr-2" style="min-height: 38px; display: inline-flex; align-items: center;">
              <i class="fas fa-globe mr-1"></i>Portal Resmi
            </a>
            <a href="https://arimbi.bandung.go.id/market" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-warning" style="min-height: 38px; display: inline-flex; align-items: center;">
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
            <i class="fas fa-phone-alt text-warning mr-2"></i>
            (022) 2503254
          </p>
          <p class="small text-muted mb-0">
            <i class="fas fa-clock text-warning mr-2"></i>
            Senin – Jumat: 08:00 – 16:00 WIB
          </p>
        </div>

        <!-- Col 3: Layanan Terkait -->
        <div class="col-lg-3 col-md-6 mb-4">
          <h5>Layanan Terpadu</h5>
          <ul>
            <li><a href="https://arimbi.bandung.go.id/market" target="_blank" rel="noopener noreferrer"><i class="fas fa-chevron-right mr-2 text-warning small"></i>ARIMBI (Harga Bahan Pokok)</a></li>
            <li><a href="https://multisite.bandung.go.id/disdagin/mesin-industri/" target="_blank" rel="noopener noreferrer"><i class="fas fa-chevron-right mr-2 text-warning small"></i>Pelayanan Mesin Balai Industri</a></li>
            <li><a href="https://smartcity.bandung.go.id/forum/search_result?q=%23daginUTTP" target="_blank" rel="noopener noreferrer"><i class="fas fa-chevron-right mr-2 text-warning small"></i>Layanan Kemetrologian UTTP</a></li>
            <li><a href="https://multisite.bandung.go.id/disdagin/profil-ppid/" target="_blank" rel="noopener noreferrer"><i class="fas fa-chevron-right mr-2 text-warning small"></i>PPID DISDAGIN</a></li>
            <li><a href="https://www.lapor.go.id/" target="_blank" rel="noopener noreferrer"><i class="fas fa-chevron-right mr-2 text-warning small"></i>SP4N-LAPOR! Pengaduan</a></li>
          </ul>
        </div>

        <!-- Col 4: Keamanan & Akses -->
        <div class="col-lg-2 col-md-6 mb-4">
          <h5>Akses Aparatur</h5>
          <p class="small text-muted mb-3">
            Sistem tertutup khusus aparatur berwenang DISDAGIN Kota Bandung.
          </p>
          <a href="{{ route('login') }}" class="btn btn-warning btn-block font-weight-bold text-dark shadow-sm" style="min-height: 44px; display: flex; align-items: center; justify-content: center;">
            <i class="fas fa-key mr-1"></i>Login SIPK
          </a>
        </div>
      </div>
    </div>

    <!-- Copyright Bar -->
    <div class="footer-bottom py-3">
      <div class="container text-center text-muted">
        <span>&copy; {{ date('Y') }} <strong>Pemerintah Kota Bandung</strong> — Dinas Perdagangan dan Perindustrian. Hak Cipta Dilindungi Undang-Undang.</span>
      </div>
    </div>
  </footer>

  <!-- Scripts with defer where appropriate -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('js/sb-admin-2.js') }}"></script>
  @stack('scripts')
</body>

</html>
