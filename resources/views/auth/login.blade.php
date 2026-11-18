@extends('layouts.auth')

@section('content')
<div class="bg-gradient-primary min-vh-100 d-flex align-items-center">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-3">
                    <div class="card-body p-0">
                        <div class="row justify-content-center align-items-center">
                            <!-- Logo Section -->
                            <div class="col-lg-5 d-flex justify-content-center align-items-center p-4">
                                <img src="{{ asset('img/Disdagin.png') }}" alt="Logo DISDAGIN" style="max-width: 85%; height: auto; display: block;">
                            </div>
                            <!-- Form Section -->
                            <div class="col-lg-7">
                                <div class="p-5">
                                    <!-- Login Title -->
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 font-weight-bold mb-1">DISDAGIN KOTA BANDUNG</h1>
                                        <p class="text-muted small mb-4">Sistem Pengelolaan Keuangan & Anggaran</p>
                                    </div>
                                    <!-- Login Form -->
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <!-- Email -->
                                        <div class="form-group">
                                            <label for="email" class="col-form-label text-dark font-weight-bold">Alamat Email</label>
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" required
                                                   autocomplete="email" autofocus placeholder="nama@email.com">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <!-- Password -->
                                        <div class="form-group">
                                            <label for="password" class="col-form-label text-dark font-weight-bold">Kata Sandi</label>
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" required autocomplete="current-password" placeholder="••••••••">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <!-- Remember Me -->
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="remember">Ingat Saya</label>
                                            </div>
                                        </div>
                                        <!-- Submit Button -->
                                        <button type="submit" class="btn btn-primary btn-user btn-block font-weight-bold shadow-sm">
                                            Masuk
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center small text-muted">
                                        Pendaftaran akun hanya dapat dilakukan oleh Administrator Sistem.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
