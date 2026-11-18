<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'SIPK - DISDAGIN Kota Bandung')</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo_kota_bandung.png') }}">
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/disdagin-theme.css') }}">
    @stack('styles')
</head>

<body id="page-top">

    @include('layouts.partials.header')

    @yield('content')

    @include('layouts.partials.footer')
    @stack('scripts')
</body>

</html>
