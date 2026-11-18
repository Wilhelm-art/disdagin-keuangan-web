@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Profil Akun Saya</h1>
    </div>

    <!-- Flash Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <!-- Card Informasi Ringkas -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm text-center p-4">
                <div class="mb-3">
                    <img class="img-profile rounded-circle shadow-sm" src="{{ asset('img/undraw_profile.svg') }}" alt="Profile" style="width: 110px; height: 110px;">
                </div>
                <h5 class="font-weight-bold text-dark mb-1">{{ $user->name }}</h5>
                <p class="text-muted small mb-3">{{ $user->email }}</p>
                <div>
                    @if($user->role === 'admin')
                        <span class="badge badge-primary px-3 py-2"><i class="fas fa-user-shield mr-1"></i>Administrator Sistem</span>
                    @elseif($user->role === 'kadis')
                        <span class="badge badge-success px-3 py-2"><i class="fas fa-briefcase mr-1"></i>Kepala Dinas</span>
                    @else
                        <span class="badge badge-secondary px-3 py-2">{{ ucfirst($user->role) }}</span>
                    @endif
                </div>
                <hr class="my-3">
                <div class="small text-muted text-left">
                    <div><strong>Instansi:</strong> Disdagin Kota Bandung</div>
                    <div><strong>Bergabung:</strong> {{ $user->created_at ? $user->created_at->format('d F Y') : '-' }}</div>
                </div>
            </div>
        </div>

        <!-- Form Edit Profil & Ganti Password -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-header py-3 bg-white">
                    <h6 class="m-0 font-weight-bold text-primary">Pengaturan Informasi Akun & Keamanan</h6>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <h6 class="font-weight-bold text-dark mb-3"><i class="fas fa-user mr-2 text-primary"></i>Data Pribadi</h6>

                        <!-- Nama Lengkap -->
                        <div class="form-group mb-3">
                            <label for="name" class="font-weight-bold text-dark small">Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group mb-4">
                            <label for="email" class="font-weight-bold text-dark small">Alamat Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="my-4">

                        <h6 class="font-weight-bold text-dark mb-1"><i class="fas fa-lock mr-2 text-warning"></i>Ganti Kata Sandi</h6>
                        <p class="small text-muted mb-3">Kosongkan bagian ini jika Anda tidak ingin mengganti kata sandi.</p>

                        <!-- Password Saat Ini -->
                        <div class="form-group mb-3">
                            <label for="current_password" class="font-weight-bold text-dark small">Kata Sandi Saat Ini</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" placeholder="Masukkan kata sandi saat ini untuk verifikasi">
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="font-weight-bold text-dark small">Kata Sandi Baru</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Minimal 8 karakter">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="font-weight-bold text-dark small">Ulangi Kata Sandi Baru</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ulangi kata sandi baru">
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary font-weight-bold shadow-sm">
                                <i class="fas fa-save mr-1"></i> Simpan Perubahan Profil
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
