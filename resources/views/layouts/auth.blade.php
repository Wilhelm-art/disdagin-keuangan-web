<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Masuk ke SIPK - Dinas Perdagangan dan Perindustrian Kota Bandung">
  <title>@yield('title', 'Masuk Sistem - SIPK DISDAGIN Kota Bandung')</title>

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
      padding: 48px 40px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      position: relative;
    }
    .auth-form-side {
      padding: 48px 40px;
    }
    @media (max-width: 767.98px) {
      .auth-sidebar {
        padding: 30px 24px;
        text-align: center;
      }
      .auth-form-side {
        padding: 30px 24px;
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
