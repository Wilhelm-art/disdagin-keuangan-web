@extends('layouts.auth')

@section('title', 'Masuk Sistem - SIPK DISDAGIN Kota Bandung')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-xl-10 col-lg-11">
      
      <div class="auth-card">
        <div class="row no-gutters">

          <!-- Left Branding Column -->
          <div class="col-md-5 auth-sidebar">
            <div>
              <div class="d-flex align-items-center mb-4">
                <img src="{{ asset('img/logo_kota_bandung.png') }}" alt="Logo Kota Bandung" style="height: 58px; width: auto; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.3));" class="mr-3">
                <div>
                  <div class="text-warning font-weight-bold" style="font-size: 0.72rem; letter-spacing: 1px;">PEMERINTAH KOTA BANDUNG</div>
                  <div class="text-white font-weight-bold" style="font-size: 0.88rem; line-height: 1.2;">DINAS PERDAGANGAN & PERINDUSTRIAN</div>
                </div>
              </div>

              <h3 class="text-white font-weight-bold mb-2" style="letter-spacing: -0.5px;">
                SIPK DISDAGIN
              </h3>
              <p class="text-white-50 small mb-4" style="line-height: 1.6;">
                Sistem Informasi Pengelolaan Keuangan & Realisasi Anggaran belanja daerah terpadu.
              </p>

              <div class="p-3 rounded mb-4" style="background: rgba(255, 255, 255, 0.07); border: 1px solid rgba(255, 255, 255, 0.1);">
                <div class="d-flex align-items-start">
                  <i class="fas fa-shield-alt text-warning fa-lg mr-3 mt-1"></i>
                  <div>
                    <div class="font-weight-bold text-white small">Akses Khusus Aparatur</div>
                    <div class="text-white-50 small" style="font-size: 0.76rem;">
                      Sistem tertutup berdasar otoritas role. Seluruh aktivitas audit tercatat secara otomatis.
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="pt-3 border-top border-white-50">
              <a href="{{ url('/') }}" class="text-white-50 small font-weight-bold text-decoration-none">
                <i class="fas fa-arrow-left mr-1"></i> Kembali ke Beranda Utama
              </a>
            </div>
          </div>

          <!-- Right Form Column -->
          <div class="col-md-7 auth-form-side">
            <div class="text-left mb-4">
              <span class="badge badge-light border text-primary font-weight-bold px-2 py-1 mb-2" style="font-size: 0.75rem;">
                <i class="fas fa-user-lock mr-1"></i>AUTENTIKASI PEGAWAI
              </span>
              <h2 class="h4 font-weight-bold text-gray-900 mb-1">Masuk ke Akun Anda</h2>
              <p class="text-muted small">Silakan masukkan alamat email dan kata sandi kedinasan Anda.</p>
            </div>

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
                <label for="email" class="small font-weight-bold text-gray-700">Alamat Email Kedinasan</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-light border-right-0 text-muted">
                      <i class="fas fa-envelope"></i>
                    </span>
                  </div>
                  <input id="email" type="email"
                         class="form-control border-left-0 @error('email') is-invalid @enderror"
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
                <label for="password" class="small font-weight-bold text-gray-700">Kata Sandi</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-light border-right-0 text-muted">
                      <i class="fas fa-lock"></i>
                    </span>
                  </div>
                  <input id="password" type="password"
                         class="form-control border-left-0 border-right-0 @error('password') is-invalid @enderror"
                         name="password" required autocomplete="current-password"
                         placeholder="••••••••">
                  <div class="input-group-append">
                    <button class="btn btn-light border border-left-0 text-muted" type="button" id="togglePasswordBtn">
                      <i class="fas fa-eye" id="togglePasswordIcon"></i>
                    </button>
                  </div>
                </div>
                @error('password')
                  <span class="text-danger small font-weight-bold mt-1 d-block" role="alert">
                    {{ $message }}
                  </span>
                @enderror
              </div>

              <!-- Remember Me & Help -->
              <div class="form-group d-flex justify-content-between align-items-center mb-4">
                <div class="custom-control custom-checkbox small">
                  <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label class="custom-control-label text-muted" for="remember">Ingat Saya di Perangkat Ini</label>
                </div>
              </div>

              <!-- Submit Button -->
              <button type="submit" class="btn btn-primary btn-block font-weight-bold py-2 shadow-sm" style="font-size: 0.95rem; border-radius: 8px;">
                <i class="fas fa-sign-in-alt mr-2"></i>Masuk ke Sistem Keuangan
              </button>
            </form>

            <div class="mt-4 pt-3 border-top text-center">
              <p class="small text-muted mb-0" style="font-size: 0.78rem;">
                <i class="fas fa-info-circle mr-1 text-info"></i>
                Pendaftaran akun baru dilakukan oleh <strong>Administrator Sistem</strong> sesuai Surat Tugas/SK Kedinasan.
              </p>
            </div>

          </div>

        </div>
      </div>

      <!-- Small Footer Outside Card -->
      <div class="text-center text-white-50 mt-4 small">
        <span>&copy; {{ date('Y') }} Dinas Perdagangan dan Perindustrian Kota Bandung. Jl. Tamansari No. 59.</span>
      </div>

    </div>
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
