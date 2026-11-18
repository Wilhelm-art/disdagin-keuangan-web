@extends('layouts.auth')

@section('title', 'Masuk Sistem - SIPK DISDAGIN Kota Bandung')

@push('styles')
<style>
  .login-wrapper {
    width: 100%;
    max-width: 480px;
    margin: 0 auto;
    padding: 15px;
  }
  .login-card {
    background: #ffffff;
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.35);
    border: 1px solid rgba(255, 255, 255, 0.2);
    overflow: hidden;
  }
  .login-header {
    background: linear-gradient(180deg, #0c264c 0%, #081a35 100%);
    color: #ffffff;
    padding: 32px 24px 28px;
    text-align: center;
    position: relative;
    border-bottom: 3px solid var(--disdagin-gold);
  }
  .login-body {
    padding: 32px 30px 24px;
  }
  .input-icon-group {
    position: relative;
  }
  .input-icon-group .form-control {
    height: 48px;
    border-radius: 10px;
    padding-left: 44px;
    border: 1px solid #cbd5e1;
    font-size: 0.95rem;
    transition: all 0.2s ease;
  }
  .input-icon-group .form-control:focus {
    border-color: var(--disdagin-blue);
    box-shadow: 0 0 0 3px rgba(24, 144, 215, 0.18);
  }
  .input-icon-group .input-icon {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 1rem;
    pointer-events: none;
    z-index: 5;
  }
  .input-icon-group .btn-toggle-pw {
    position: absolute;
    right: 8px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #64748b;
    padding: 8px 12px;
    cursor: pointer;
    z-index: 5;
  }
  .btn-login-submit {
    height: 50px;
    border-radius: 10px;
    background: linear-gradient(135deg, #0c264c 0%, #163e77 100%);
    border: none;
    color: #ffffff;
    font-weight: 700;
    font-size: 1rem;
    letter-spacing: 0.3px;
    box-shadow: 0 6px 16px rgba(12, 38, 76, 0.25);
    transition: all 0.25s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
  }
  .btn-login-submit:hover {
    background: linear-gradient(135deg, #163e77 0%, #1890d7 100%);
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 10px 22px rgba(12, 38, 76, 0.35);
  }
</style>
@endpush

@section('content')
<div class="login-wrapper">

  <div class="login-card">

    <!-- Official Government Header -->
    <div class="login-header">
      <div class="mb-3">
        <img src="{{ asset('img/logo_kota_bandung.png') }}" alt="Logo Resmi Pemerintah Kota Bandung" width="76" height="76" style="height: 76px; width: auto; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.35));" fetchpriority="high">
      </div>
      <div class="text-warning font-weight-bold" style="font-size: 0.76rem; letter-spacing: 1.2px;">
        PEMERINTAH KOTA BANDUNG
      </div>
      <h1 class="h5 font-weight-bold text-white mb-2" style="line-height: 1.3;">
        DINAS PERDAGANGAN & PERINDUSTRIAN
      </h1>
      <span class="badge badge-light border text-primary font-weight-bold px-3 py-1" style="font-size: 0.72rem; letter-spacing: 0.5px;">
        SIPK — SISTEM PENGELOLAAN KEUANGAN
      </span>
    </div>

    <!-- Login Form Body -->
    <div class="login-body">

      @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show small" role="alert">
          <i class="fas fa-exclamation-circle mr-1"></i> {{ session('error') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif

      <form method="POST" action="{{ route('login') }}" class="user">
        @csrf

        <!-- Email Field -->
        <div class="form-group mb-3">
          <label for="email" class="small font-weight-bold text-dark mb-1">Alamat Email Kedinasan</label>
          <div class="input-icon-group">
            <i class="fas fa-envelope input-icon"></i>
            <input id="email" type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                   placeholder="nama@disdagin.bandung.go.id">
          </div>
          @error('email')
            <span class="text-danger small font-weight-bold mt-1 d-block" role="alert">
              {{ $message }}
            </span>
          @enderror
        </div>

        <!-- Password Field -->
        <div class="form-group mb-3">
          <label for="password" class="small font-weight-bold text-dark mb-1">Kata Sandi</label>
          <div class="input-icon-group">
            <i class="fas fa-lock input-icon"></i>
            <input id="password" type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   name="password" required autocomplete="current-password"
                   placeholder="••••••••">
            <button class="btn-toggle-pw" type="button" id="togglePasswordBtn" aria-label="Lihat Kata Sandi">
              <i class="fas fa-eye" id="togglePasswordIcon"></i>
            </button>
          </div>
          @error('password')
            <span class="text-danger small font-weight-bold mt-1 d-block" role="alert">
              {{ $message }}
            </span>
          @enderror
        </div>

        <!-- Remember Me Checkbox -->
        <div class="form-group d-flex justify-content-between align-items-center mb-4">
          <div class="custom-control custom-checkbox small">
            <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="custom-control-label text-muted" for="remember">Ingat Sesi di Perangkat Ini</label>
          </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn-login-submit">
          <i class="fas fa-sign-in-alt mr-2"></i>Masuk ke Sistem Keuangan
        </button>
      </form>

      <!-- Security Notice -->
      <div class="mt-4 pt-3 border-top text-center">
        <p class="small text-muted mb-2" style="font-size: 0.75rem; line-height: 1.5;">
          <i class="fas fa-shield-alt text-warning mr-1"></i>
          Akses terbatas khusus aparatur berwenang DISDAGIN Kota Bandung. Pendaftaran akun baru dilakukan oleh <strong>Administrator Sistem</strong>.
        </p>
        <a href="{{ url('/') }}" class="small text-primary font-weight-bold text-decoration-none">
          <i class="fas fa-arrow-left mr-1"></i>Kembali ke Beranda Utama
        </a>
      </div>

    </div>

  </div>

  <!-- Copyright Outside Card -->
  <div class="text-center text-white-50 mt-3 small" style="font-size: 0.78rem;">
    <span>&copy; {{ date('Y') }} Pemerintah Kota Bandung — Dinas Perdagangan dan Perindustrian</span>
  </div>

</div>
@endsection

@push('scripts')
<script>
  $(document).ready(function() {
    $('#togglePasswordBtn').on('click', function() {
      const passwordField = $('#password');
      const icon = $('#togglePasswordIcon');
      const isPassword = passwordField.attr('type') === 'password';
      passwordField.attr('type', isPassword ? 'text' : 'password');
      icon.toggleClass('fa-eye fa-eye-slash');
    });
  });
</script>
@endpush
