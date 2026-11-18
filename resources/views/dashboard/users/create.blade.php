@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Tambah Pengguna Baru</h1>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header py-3 bg-white">
                    <h6 class="m-0 font-weight-bold text-primary">Formulir Pendaftaran Akun Staf / Pejabat</h6>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <!-- Nama Lengkap -->
                        <div class="form-group mb-3">
                            <label for="name" class="font-weight-bold text-dark">Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Contoh: Budi Santoso, S.AP." required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group mb-3">
                            <label for="email" class="font-weight-bold text-dark">Alamat Email Resmi</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="budi@bandung.go.id" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Role -->
                        <div class="form-group mb-3">
                            <label for="role" class="font-weight-bold text-dark">Hak Akses / Peran</label>
                            <select class="form-control @error('role') is-invalid @enderror" id="role" name="role" required>
                                <option value="" disabled selected>Pilih Peran Akun</option>
                                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Administrator (Kelola Penuh Transaksi, Anggaran & Pengguna)</option>
                                <option value="kadis" {{ old('role') === 'kadis' ? 'selected' : '' }}>Kepala Dinas (Melihat Dashboard & Laporan Keuangan)</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="my-4">

                        <!-- Password -->
                        <div class="form-group mb-3">
                            <label for="password" class="font-weight-bold text-dark">Kata Sandi</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Minimal 8 karakter" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="form-group mb-4">
                            <label for="password_confirmation" class="font-weight-bold text-dark">Konfirmasi Kata Sandi</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ketik ulang kata sandi" required>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary font-weight-bold">
                                <i class="fas fa-save mr-1"></i> Simpan Pengguna
                            </button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left mr-1"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
