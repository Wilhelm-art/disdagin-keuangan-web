@extends('layouts.home')

@section('content')
<div class="container mt-5">

  {{-- Hero Section --}}
  <div class="hero-section text-center py-5">
    <div class="container">
      <h1 class="display-4 text-white font-weight-bold">
        Selamat Datang di Disdagin
      </h1>
      <p class="lead text-light mb-4">
        Solusi Terbaik untuk Pengelolaan Keuangan Dinas Perdagangan dan Perindustrian.
      </p>
      <a href="{{ route('login') }}" class="btn btn-lg btn-primary shadow-lg px-5 py-3 rounded-pill">
        Mulai Sekarang
      </a>
    </div>
  </div>

  {{-- Features Section --}}
  <div class="row text-center mt-5">
    <div class="col-md-4">
      <div class="card feature-card shadow-lg border-0">
        <div class="card-body">
          <div class="feature-icon bg-primary text-white rounded-circle mx-auto mb-3">
            <i class="fas fa-money-check-alt fa-3x"></i>
          </div>
          <h5 class="card-title font-weight-bold">Pencatatan Cepat</h5>
          <p class="card-text">Kelola keuangan dengan satu klik.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card feature-card shadow-lg border-0">
        <div class="card-body">
          <div class="feature-icon bg-success text-white rounded-circle mx-auto mb-3">
            <i class="fas fa-chart-line fa-3x"></i>
          </div>
          <h5 class="card-title font-weight-bold">Laporan Akurat</h5>
          <p class="card-text">Laporan terperinci dalam waktu nyata.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card feature-card shadow-lg border-0">
        <div class="card-body">
          <div class="feature-icon bg-danger text-white rounded-circle mx-auto mb-3">
            <i class="fas fa-user-lock fa-3x"></i>
          </div>
          <h5 class="card-title font-weight-bold">Keamanan Data</h5>
          <p class="card-text">Privasi Anda adalah prioritas kami.</p>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@push('styles')
<style>
  /* Hero Section */
  .hero-section {
    background: linear-gradient(135deg, #007bff, #6610f2);
    color: white;
    border-radius: 20px;
    margin-bottom: 30px;
    padding: 60px 0;
  }

  .hero-section h1 {
    font-size: 3rem;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
  }

  .hero-section .btn {
    transition: all 0.4s ease;
  }

  .hero-section .btn:hover {
    background-color: #0056b3;
    transform: scale(1.1);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
  }

  /* Features Section */
  .feature-card {
    border-radius: 15px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
  }

  .feature-icon {
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
</style>
@endpush
