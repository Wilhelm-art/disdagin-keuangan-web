<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">
  <meta name="theme-color" content="#0c264c">
  <title>@yield('title', 'Masuk Sistem - SIPK DISDAGIN Kota Bandung')</title>

  <!-- SEO & Canonical -->
  <meta name="description" content="Masuk ke portal Sistem Informasi Pengelolaan Keuangan & Realisasi Anggaran (SIPK) Dinas Perdagangan dan Perindustrian Kota Bandung.">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="https://paynote-web-flax.vercel.app/login">

  <!-- GEO Tags -->
  <meta name="geo.region" content="ID-JB">
  <meta name="geo.placename" content="Kota Bandung, Jawa Barat, Indonesia">
  <meta name="geo.position" content="-6.8904;107.6098">
  <meta name="ICBM" content="-6.8904, 107.6098">

  <!-- OpenGraph -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://paynote-web-flax.vercel.app/login">
  <meta property="og:title" content="Masuk Sistem - SIPK DISDAGIN Kota Bandung">
  <meta property="og:description" content="Portal autentikasi resmi pegawai dan pejabat DISDAGIN Kota Bandung.">
  <meta property="og:image" content="https://paynote-web-flax.vercel.app/img/logo_kota_bandung.png">
  <meta property="og:locale" content="id_ID">

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/logo_kota_bandung.png') }}">

  <!-- PageSpeed Preconnect Hints -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="dns-prefetch" href="https://fonts.googleapis.com">
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">

  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Core Stylesheets -->
  <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
  <link href="{{ asset('css/disdagin-theme.css') }}" rel="stylesheet">

  <style>
    body.auth-bg {
      background: linear-gradient(135deg, #081a35 0%, #0c264c 60%, #163e77 100%) !important;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow-x: hidden;
    }
    body.auth-bg::before {
      content: '';
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      background-image: radial-gradient(circle at 80% 20%, rgba(24, 144, 215, 0.15) 0%, transparent 50%),
                        radial-gradient(circle at 20% 80%, rgba(252, 185, 0, 0.1) 0%, transparent 45%);
      pointer-events: none;
    }
    .auth-card {
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
      background-color: #ffffff;
    }
    .auth-sidebar {
      background: linear-gradient(180deg, #0c264c 0%, #081a35 100%);
      color: #ffffff;
      padding: clamp(28px, 5vw, 48px) clamp(24px, 4vw, 40px);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      position: relative;
    }
    .auth-form-side {
      padding: clamp(28px, 5vw, 48px) clamp(24px, 4vw, 40px);
    }
    @media (max-width: 767.98px) {
      .auth-sidebar {
        padding: 24px 20px;
        text-align: center;
      }
      .auth-form-side {
        padding: 24px 20px;
      }
    }
  </style>

  @stack('styles')
</head>

<body class="auth-bg py-4">

  @yield('content')

  <!-- Core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('js/sb-admin-2.js') }}"></script>
  @stack('scripts')
</body>

</html>
