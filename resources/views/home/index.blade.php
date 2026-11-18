@extends('layouts.home')

@section('title', 'SIPK DISDAGIN Kota Bandung - Sistem Informasi Pengelolaan Keuangan & Realisasi Anggaran')

@push('styles')
<style>
  /* -------------------------------------------------------------------
   * HERO SECTION
   * ------------------------------------------------------------------- */
  .hero-wrapper {
    position: relative;
    background: linear-gradient(135deg, #081a35 0%, #0c264c 60%, #163e77 100%);
    color: #ffffff;
    padding: clamp(60px, 8vw, 100px) 0 clamp(50px, 6vw, 80px);
    overflow: hidden;
  }
  .hero-wrapper::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-image: radial-gradient(circle at 85% 20%, rgba(24, 144, 215, 0.18) 0%, transparent 50%),
                      radial-gradient(circle at 10% 80%, rgba(252, 185, 0, 0.12) 0%, transparent 45%);
    pointer-events: none;
  }
  .badge-instansi {
    display: inline-flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(252, 185, 0, 0.4);
    color: #fde047;
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    padding: 6px 14px;
    border-radius: 50px;
    margin-bottom: 20px;
  }
  .hero-title {
    font-size: var(--fluid-h1);
    font-weight: 800;
    line-height: 1.18;
    letter-spacing: -0.02em;
    color: #ffffff;
    margin-bottom: 18px;
  }
  .hero-title span {
    color: #fcb900;
  }
  .hero-lead {
    font-size: var(--fluid-lead);
    color: #cbd5e1;
    line-height: 1.7;
    margin-bottom: 32px;
    max-width: 620px;
  }
  .btn-hero-primary {
    background: linear-gradient(135deg, #fcb900 0%, #f59e0b 100%);
    color: #0c264c !important;
    font-weight: 800;
    font-size: 0.98rem;
    padding: 14px 28px;
    min-height: 48px;
    border-radius: 50px;
    border: none;
    box-shadow: 0 10px 25px rgba(245, 158, 11, 0.35);
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
  }
  .btn-hero-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 14px 30px rgba(245, 158, 11, 0.5);
    color: #081a35 !important;
  }
  .btn-hero-outline {
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(6px);
    color: #ffffff !important;
    font-weight: 600;
    font-size: 0.95rem;
    padding: 14px 26px;
    min-height: 48px;
    border-radius: 50px;
    border: 1px solid rgba(255, 255, 255, 0.25);
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
  }
  .btn-hero-outline:hover {
    background: rgba(255, 255, 255, 0.18);
    border-color: #ffffff;
    transform: translateY(-2px);
  }

  /* Glass Card in Hero */
  .hero-badge-card {
    background: rgba(255, 255, 255, 0.07);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 20px;
    padding: clamp(20px, 4vw, 32px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
  }

  /* -------------------------------------------------------------------
   * METRICS STRIP
   * ------------------------------------------------------------------- */
  .metrics-strip {
    background: #ffffff;
    border-bottom: 1px solid var(--disdagin-border);
    margin-top: -30px;
    position: relative;
    z-index: 10;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(12, 38, 76, 0.08);
    padding: 24px;
  }
  .metric-item {
    padding: 10px 15px;
  }
  .metric-icon {
    width: 52px;
    height: 52px;
    min-width: 52px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
  }

  /* -------------------------------------------------------------------
   * SECTION STYLES
   * ------------------------------------------------------------------- */
  .section-pad {
    padding: clamp(50px, 7vw, 85px) 0;
  }
  .section-tag {
    color: var(--disdagin-blue);
    font-weight: 800;
    text-transform: uppercase;
    font-size: 0.8rem;
    letter-spacing: 1.2px;
    margin-bottom: 8px;
    display: block;
  }
  .section-heading {
    color: #0c264c;
    font-size: var(--fluid-h2);
    font-weight: 800;
    line-height: 1.25;
    margin-bottom: 15px;
  }
  .section-desc {
    color: #64748b;
    font-size: 1.05rem;
    line-height: 1.6;
    max-width: 680px;
    margin-left: auto;
    margin-right: auto;
  }

  /* Feature Cards */
  .pillar-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    padding: 32px 24px;
    height: 100%;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }
  .pillar-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--disdagin-blue);
    opacity: 0;
    transition: opacity 0.3s ease;
  }
  .pillar-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 16px 36px rgba(12, 38, 76, 0.09);
    border-color: #cbd5e1;
  }
  .pillar-card:hover::before {
    opacity: 1;
  }
  .pillar-icon-box {
    width: 64px;
    height: 64px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.6rem;
    margin-bottom: 22px;
  }

  /* Service Ecosystem */
  .service-link-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    padding: 24px;
    text-decoration: none !important;
    display: block;
    transition: all 0.25s ease;
    height: 100%;
  }
  .service-link-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 24px rgba(12, 38, 76, 0.07);
    border-color: var(--disdagin-blue);
  }

  /* FAQ Accordion */
  .faq-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    margin-bottom: 14px;
    overflow: hidden;
    transition: all 0.2s ease;
  }
  .faq-card:hover {
    border-color: #cbd5e1;
  }
  .faq-header-btn {
    width: 100%;
    text-align: left;
    padding: 18px 24px;
    background: none;
    border: none;
    font-weight: 700;
    font-size: 1.02rem;
    color: #0c264c;
    display: flex;
    align-items: center;
    justify-content: space-between;
    min-height: 52px;
  }
  .faq-header-btn:focus {
    outline: none;
  }
  .faq-body {
    padding: 0 24px 20px;
    color: #475569;
    font-size: 0.95rem;
    line-height: 1.7;
  }

  /* CTA Strip */
  .cta-section {
    background: linear-gradient(135deg, #0c264c 0%, #081a35 100%);
    border-radius: 20px;
    padding: clamp(35px, 5vw, 60px) clamp(24px, 4vw, 40px);
    color: #ffffff;
    position: relative;
    overflow: hidden;
  }
</style>
@endpush

@section('content')

{{-- ===================================================================
     HERO SECTION
     =================================================================== --}}
<section class="hero-wrapper" aria-label="Hero Banner">
  <div class="container position-relative">
    <div class="row align-items-center">
      
      <!-- Left Column: Headline & Action -->
      <div class="col-lg-7 mb-5 mb-lg-0">
        <div class="badge-instansi">
          <i class="fas fa-landmark mr-2 text-warning"></i>
          Pemerintah Kota Bandung
        </div>
        <h1 class="hero-title">
          Sistem Pengelolaan Keuangan & <span>Realisasi Anggaran</span>
        </h1>
        <p class="hero-lead">
          Platform perbendaharaan digital terpadu Dinas Perdagangan dan Perindustrian Kota Bandung. Memfasilitasi efisiensi, akuntabilitas belanja daerah, dan pelaporan keuangan berbasis <em>Good Public Governance</em>.
        </p>

        <div class="d-flex flex-wrap gap-3 mt-4">
          @auth
            <a href="{{ route('dashboard') }}" class="btn-hero-primary mr-sm-3 mb-3 w-100 w-sm-auto">
              <i class="fas fa-tachometer-alt"></i>
              Buka Dashboard Saya
            </a>
          @else
            <a href="{{ route('login') }}" class="btn-hero-primary mr-sm-3 mb-3 w-100 w-sm-auto">
              <i class="fas fa-lock"></i>
              Masuk Sistem Keuangan
            </a>
          @endauth
          <a href="https://multisite.bandung.go.id/disdagin/" target="_blank" rel="noopener noreferrer" class="btn-hero-outline mb-3 w-100 w-sm-auto">
            <i class="fas fa-external-link-alt"></i>
            Portal Utama DISDAGIN
          </a>
        </div>

        <div class="d-flex flex-wrap align-items-center mt-3 pt-2 text-white-50 small">
          <span class="mr-3 mb-2"><i class="fas fa-shield-alt text-success mr-1"></i>Server-side RBAC</span>
          <span class="mr-3 mb-2"><i class="fas fa-file-pdf text-danger mr-1"></i>Ekspor Laporan PDF & Excel</span>
          <span class="mb-2"><i class="fas fa-check-circle text-info mr-1"></i>Siap Audit BPK/Inspektorat</span>
        </div>
      </div>

      <!-- Right Column: Instansi Identity Card -->
      <div class="col-lg-5">
        <div class="hero-badge-card text-center">
          <div class="mb-4">
            <img src="{{ asset('img/logo_kota_bandung.png') }}" alt="Logo Resmi Pemerintah Kota Bandung" width="110" height="110" style="height: 110px; width: auto; filter: drop-shadow(0 8px 16px rgba(0,0,0,0.3));" fetchpriority="high">
          </div>
          <h2 class="h4 text-white font-weight-bold mb-1" style="letter-spacing: 0.5px;">
            DISDAGIN KOTA BANDUNG
          </h2>
          <p class="text-warning small font-weight-bold text-uppercase mb-3">
            Dinas Perdagangan dan Perindustrian
          </p>
          <hr style="border-top: 1px solid rgba(255, 255, 255, 0.15);">
          
          <div class="row text-left mt-3">
            <div class="col-6 mb-3">
              <div class="text-white-50 small">Wilayah Kerja</div>
              <div class="font-weight-bold text-white small">Kota Bandung, Jabar</div>
            </div>
            <div class="col-6 mb-3">
              <div class="text-white-50 small">Sekretariat</div>
              <div class="font-weight-bold text-white small">Jl. Tamansari No. 59</div>
            </div>
            <div class="col-6">
              <div class="text-white-50 small">Standar Laporan</div>
              <div class="font-weight-bold text-white small">SAP Akuntansi Pemda</div>
            </div>
            <div class="col-6">
              <div class="text-white-50 small">Tahun Anggaran</div>
              <div class="font-weight-bold text-white small">Tahun {{ date('Y') }}</div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ===================================================================
     METRICS STRIP
     =================================================================== --}}
<div class="container">
  <div class="metrics-strip">
    <div class="row text-left">
      
      <div class="col-lg-3 col-md-6 mb-3 mb-lg-0 border-right-md">
        <div class="d-flex align-items-center">
          <div class="metric-icon bg-primary text-white mr-3">
            <i class="fas fa-wallet"></i>
          </div>
          <div>
            <div class="text-muted small font-weight-bold text-uppercase">Pagu Anggaran</div>
            <div class="font-weight-bold text-dark h6 mb-0">Terkontrol Per Bidang</div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-3 mb-lg-0 border-right-md">
        <div class="d-flex align-items-center">
          <div class="metric-icon bg-success text-white mr-3">
            <i class="fas fa-exchange-alt"></i>
          </div>
          <div>
            <div class="text-muted small font-weight-bold text-uppercase">Arus Kas Kasubag</div>
            <div class="font-weight-bold text-dark h6 mb-0">Masuk & Belanja Real-Time</div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-3 mb-lg-0 border-right-md">
        <div class="d-flex align-items-center">
          <div class="metric-icon bg-info text-white mr-3">
            <i class="fas fa-file-invoice-dollar"></i>
          </div>
          <div>
            <div class="text-muted small font-weight-bold text-uppercase">Akuntabilitas</div>
            <div class="font-weight-bold text-dark h6 mb-0">Format Resmi Pemkot</div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="d-flex align-items-center">
          <div class="metric-icon bg-warning text-dark mr-3">
            <i class="fas fa-user-shield"></i>
          </div>
          <div>
            <div class="text-muted small font-weight-bold text-uppercase">Otoritas Akses</div>
            <div class="font-weight-bold text-dark h6 mb-0">Admin & Kepala Dinas</div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

{{-- ===================================================================
     PILAR TATA KELOLA KEUANGAN (FEATURES)
     =================================================================== --}}
<section id="pilar" class="section-pad" aria-label="Pilar Tata Kelola Keuangan">
  <div class="container">
    <div class="text-center mb-5">
      <span class="section-tag">Kapabilitas Inti Sistem</span>
      <h2 class="section-heading">4 Pilar Pengelolaan Keuangan DISDAGIN</h2>
      <p class="section-desc">
        Dirancang khusus untuk memfasilitasi tata kelola keuangan perangkat daerah yang tertib administrasi, taat regulasi, dan akuntabel.
      </p>
    </div>

    <div class="row">
      <!-- Pilar 1 -->
      <div class="col-lg-3 col-md-6 mb-4">
        <article class="pillar-card">
          <div class="pillar-icon-box bg-light text-primary">
            <i class="fas fa-balance-scale"></i>
          </div>
          <h3 class="h5 font-weight-bold text-dark mb-2">Penetapan Pagu Anggaran</h3>
          <p class="text-muted small mb-0">
            Pengelolaan alokasi pagu belanja kegiatan dinas per mata anggaran, dilengkapi bar persentase realisasi otomatis.
          </p>
        </article>
      </div>

      <!-- Pilar 2 -->
      <div class="col-lg-3 col-md-6 mb-4">
        <article class="pillar-card">
          <div class="pillar-icon-box bg-light text-success">
            <i class="fas fa-money-bill-wave"></i>
          </div>
          <h3 class="h5 font-weight-bold text-dark mb-2">Penatausahaan Kas Masuk</h3>
          <p class="text-muted small mb-0">
            Pencatatan pendapatan daerah, retribusi pasar, dan transfer kas dengan kategorisasi rinci dan validasi input ketat.
          </p>
        </article>
      </div>

      <!-- Pilar 3 -->
      <div class="col-lg-3 col-md-6 mb-4">
        <article class="pillar-card">
          <div class="pillar-icon-box bg-light text-danger">
            <i class="fas fa-receipt"></i>
          </div>
          <h3 class="h5 font-weight-bold text-dark mb-2">Pengendalian Belanja Kas</h3>
          <p class="text-muted small mb-0">
            Pencatatan bukti pengeluaran kas belanja modal dan operasional untuk mencegah defisit atau pelampauan pagu.
          </p>
        </article>
      </div>

      <!-- Pilar 4 -->
      <div class="col-lg-3 col-md-6 mb-4">
        <article class="pillar-card">
          <div class="pillar-icon-box bg-light text-info">
            <i class="fas fa-file-contract"></i>
          </div>
          <h3 class="h5 font-weight-bold text-dark mb-2">Pelaporan & Ekspor Resmi</h3>
          <p class="text-muted small mb-0">
            Penerbitan rekapitulasi berkala berformat PDF dengan kop surat resmi kedinasan dan file Excel untuk kebutuhan audit BPK.
          </p>
        </article>
      </div>
    </div>
  </div>
</section>

{{-- ===================================================================
     TENTANG DISDAGIN & TUPOKSI
     =================================================================== --}}
<section id="tentang" class="section-pad bg-light" aria-label="Tentang DISDAGIN Kota Bandung">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 mb-4 mb-lg-0">
        <span class="section-tag">Profil Instansi</span>
        <h2 class="section-heading">Dinas Perdagangan dan Perindustrian Kota Bandung</h2>
        <p class="text-muted" style="line-height: 1.7;">
          Dinas Perdagangan dan Perindustrian (DISDAGIN) Kota Bandung mempunyai tugas pokok melaksanakan urusan pemerintahan daerah di bidang perdagangan, perindustrian, dan kemetrologian legal berdasarkan asas otonomi dan tugas pembantuan.
        </p>
        <p class="text-muted" style="line-height: 1.7;">
          Dalam mendukung visi Kota Bandung, tata kelola keuangan DISDAGIN senantiasa berpedoman pada prinsip integritas, kehati-hatian, serta akuntabilitas publik.
        </p>
        <div class="row mt-4">
          <div class="col-sm-6 mb-3">
            <div class="d-flex align-items-center">
              <i class="fas fa-check-circle text-success fa-lg mr-2"></i>
              <span class="font-weight-bold text-dark small">Pengawasan Tertib Niaga</span>
            </div>
          </div>
          <div class="col-sm-6 mb-3">
            <div class="d-flex align-items-center">
              <i class="fas fa-check-circle text-success fa-lg mr-2"></i>
              <span class="font-weight-bold text-dark small">Stabilisasi Harga Pokok</span>
            </div>
          </div>
          <div class="col-sm-6 mb-3">
            <div class="d-flex align-items-center">
              <i class="fas fa-check-circle text-success fa-lg mr-2"></i>
              <span class="font-weight-bold text-dark small">Pemberdayaan Sentra IKM</span>
            </div>
          </div>
          <div class="col-sm-6 mb-3">
            <div class="d-flex align-items-center">
              <i class="fas fa-check-circle text-success fa-lg mr-2"></i>
              <span class="font-weight-bold text-dark small">Kemetrologian Legal UTTP</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card border-0 shadow-lg p-4 bg-white" style="border-radius: 18px;">
          <div class="d-flex align-items-center mb-3">
            <div class="mr-3">
              <img src="{{ asset('img/logo_disdagin_official.png') }}" alt="Logo Resmi Dinas Perdagangan dan Perindustrian Kota Bandung" width="160" height="45" loading="lazy" decoding="async" style="max-height: 52px; width: auto;">
            </div>
            <div>
              <h3 class="h6 font-weight-bold text-dark mb-0">Kantor Pelayanan Terpadu</h3>
              <span class="text-muted small">Dinas Perdagangan dan Perindustrian</span>
            </div>
          </div>
          <p class="text-muted small mb-3">
            Melayani pelaku usaha perdagangan, industri kecil menengah, eksportir, dan masyarakat umum Kota Bandung.
          </p>
          <ul class="list-group list-group-flush small">
            <li class="list-group-item px-0 d-flex justify-content-between">
              <span class="text-muted"><i class="fas fa-map-marker-alt text-danger mr-2"></i>Lokasi Kantor:</span>
              <span class="font-weight-bold text-right">Jl. Tamansari No. 59, Bandung 40132</span>
            </li>
            <li class="list-group-item px-0 d-flex justify-content-between">
              <span class="text-muted"><i class="fas fa-phone-alt text-success mr-2"></i>Kontak Kantor:</span>
              <span class="font-weight-bold">(022) 2503254</span>
            </li>
            <li class="list-group-item px-0 d-flex justify-content-between">
              <span class="text-muted"><i class="fas fa-envelope text-info mr-2"></i>Email Resmi:</span>
              <span class="font-weight-bold">disdagin@bandung.go.id</span>
            </li>
            <li class="list-group-item px-0 d-flex justify-content-between">
              <span class="text-muted"><i class="fas fa-globe text-primary mr-2"></i>Website Resmi:</span>
              <a href="https://multisite.bandung.go.id/disdagin/" target="_blank" rel="noopener noreferrer" class="font-weight-bold text-primary">multisite.bandung.go.id/disdagin</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ===================================================================
     LAYANAN PUBLIK TERPADU (DISDAGIN ECOSYSTEM)
     =================================================================== --}}
<section id="layanan" class="section-pad" aria-label="Ekosistem Layanan Publik">
  <div class="container">
    <div class="text-center mb-5">
      <span class="section-tag">Ekosistem Digital Kedinasan</span>
      <h2 class="section-heading">Layanan Publik & Aplikasi Terkait</h2>
      <p class="section-desc">
        Akses cepat menuju kanal layanan resmi Dinas Perdagangan dan Perindustrian Kota Bandung.
      </p>
    </div>

    <div class="row">
      <!-- Card 1: ARIMBI -->
      <div class="col-lg-3 col-md-6 mb-4">
        <a href="https://arimbi.bandung.go.id/market" target="_blank" rel="noopener noreferrer" class="service-link-card">
          <div class="d-flex align-items-center mb-3">
            <div class="rounded p-2 text-warning mr-3" style="background: #fef3c7; width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
              <i class="fas fa-shopping-basket"></i>
            </div>
            <div>
              <h3 class="h6 font-weight-bold text-dark mb-0">ARIMBI</h3>
              <span class="text-muted small">Harga Bahan Pokok</span>
            </div>
          </div>
          <p class="text-muted small mb-0">
            Aplikasi Real Time Informasi Bahan Pokok di pasar-pasar se-Kota Bandung secara harian.
          </p>
        </a>
      </div>

      <!-- Card 2: UTTP / Metrologi -->
      <div class="col-lg-3 col-md-6 mb-4">
        <a href="https://smartcity.bandung.go.id/forum/search_result?q=%23daginUTTP" target="_blank" rel="noopener noreferrer" class="service-link-card">
          <div class="d-flex align-items-center mb-3">
            <div class="rounded p-2 text-info mr-3" style="background: #e0f2fe; width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
              <i class="fas fa-tachometer-alt"></i>
            </div>
            <div>
              <h3 class="h6 font-weight-bold text-dark mb-0">Metrologi Legal</h3>
              <span class="text-muted small">Tera & Tera Ulang UTTP</span>
            </div>
          </div>
          <p class="text-muted small mb-0">
            Pelayanan tera ukur dan perlindungan konsumen terhadap kepastian timbangan niaga.
          </p>
        </a>
      </div>

      <!-- Card 3: Balai Industri & Mesin -->
      <div class="col-lg-3 col-md-6 mb-4">
        <a href="https://multisite.bandung.go.id/disdagin/mesin-industri/" target="_blank" rel="noopener noreferrer" class="service-link-card">
          <div class="d-flex align-items-center mb-3">
            <div class="rounded p-2 text-success mr-3" style="background: #dcfce7; width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
              <i class="fas fa-cogs"></i>
            </div>
            <div>
              <h3 class="h6 font-weight-bold text-dark mb-0">Balai Industri</h3>
              <span class="text-muted small">Fasilitasi Mesin IKM</span>
            </div>
          </div>
          <p class="text-muted small mb-0">
            E-Booklet dan fasilitasi pemanfaatan mesin industri untuk pengrajin dan IKM Kota Bandung.
          </p>
        </a>
      </div>

      <!-- Card 4: SP4N LAPOR -->
      <div class="col-lg-3 col-md-6 mb-4">
        <a href="https://www.lapor.go.id/" target="_blank" rel="noopener noreferrer" class="service-link-card">
          <div class="d-flex align-items-center mb-3">
            <div class="rounded p-2 text-danger mr-3" style="background: #fee2e2; width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
              <i class="fas fa-bullhorn"></i>
            </div>
            <div>
              <h3 class="h6 font-weight-bold text-dark mb-0">SP4N-LAPOR!</h3>
              <span class="text-muted small">Pengaduan Masyarakat</span>
            </div>
          </div>
          <p class="text-muted small mb-0">
            Kanal aspirasi dan pelaporan resmi masyarakat atas pelayanan publik Pemerintah Kota Bandung.
          </p>
        </a>
      </div>
    </div>
  </div>
</section>

{{-- ===================================================================
     FAQ SECTION (AEO & ANSWER ENGINE OPTIMIZATION)
     Structured Questions & Direct Answers for Search & AI Engines
     =================================================================== --}}
<section id="faq" class="section-pad bg-light" aria-label="Pertanyaan Umum Seputar SIPK">
  <div class="container">
    <div class="text-center mb-5">
      <span class="section-tag">Pusat Informasi & Tanya Jawab</span>
      <h2 class="section-heading">Pertanyaan Umum (FAQ)</h2>
      <p class="section-desc">
        Informasi seputar sistem penatausahaan keuangan dan layanan kedinasan DISDAGIN Kota Bandung.
      </p>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-9">

        <!-- FAQ Item 1 -->
        <div class="faq-card">
          <button class="faq-header-btn" type="button" data-toggle="collapse" data-target="#faq1" aria-expanded="true" aria-controls="faq1">
            <span>Apa itu SIPK DISDAGIN Kota Bandung?</span>
            <i class="fas fa-chevron-down text-muted"></i>
          </button>
          <div id="faq1" class="collapse show">
            <div class="faq-body">
              <strong>SIPK DISDAGIN</strong> adalah Sistem Informasi Pengelolaan Keuangan & Realisasi Anggaran terpadu di lingkungan Dinas Perdagangan dan Perindustrian Pemerintah Kota Bandung. Sistem ini memfasilitasi pengawasan alokasi pagu kegiatan APBD, penatausahaan arus kas pemasukan retribusi, pengendalian belanja operasional, dan penerbitan laporan keuangan standar akuntansi pemerintahan (SAP).
            </div>
          </div>
        </div>

        <!-- FAQ Item 2 -->
        <div class="faq-card">
          <button class="faq-header-btn collapsed" type="button" data-toggle="collapse" data-target="#faq2" aria-expanded="false" aria-controls="faq2">
            <span>Apa fungsi dan tugas pokok DISDAGIN Kota Bandung?</span>
            <i class="fas fa-chevron-down text-muted"></i>
          </button>
          <div id="faq2" class="collapse">
            <div class="faq-body">
              DISDAGIN Kota Bandung bertugas melaksanakan urusan pemerintahan daerah di bidang perdagangan dalam negeri, pengembangan ekspor luar negeri, stabilisasi harga kebutuhan bahan pokok, pengawasan kemetrologian legal (tera UTTP), dan pemberdayaan Industri Kecil dan Menengah (IKM) di wilayah Kota Bandung.
            </div>
          </div>
        </div>

        <!-- FAQ Item 3 -->
        <div class="faq-card">
          <button class="faq-header-btn collapsed" type="button" data-toggle="collapse" data-target="#faq3" aria-expanded="false" aria-controls="faq3">
            <span>Bagaimana cara mengecek harga kebutuhan bahan pokok harian di Kota Bandung?</span>
            <i class="fas fa-chevron-down text-muted"></i>
          </button>
          <div id="faq3" class="collapse">
            <div class="faq-body">
              Masyarakat dapat memantau data harga kebutuhan bahan pokok masyarakat harian di berbagai pasar rakyat Kota Bandung melalui aplikasi resmi <strong>ARIMBI (Aplikasi Real Time Informasi Bahan Pokok)</strong> yang dikelola DISDAGIN di portal <a href="https://arimbi.bandung.go.id/market" target="_blank" rel="noopener noreferrer" class="text-primary font-weight-bold">arimbi.bandung.go.id/market</a>.
            </div>
          </div>
        </div>

        <!-- FAQ Item 4 -->
        <div class="faq-card">
          <button class="faq-header-btn collapsed" type="button" data-toggle="collapse" data-target="#faq4" aria-expanded="false" aria-controls="faq4">
            <span>Di mana lokasi alamat kantor dan kontak resmi DISDAGIN Kota Bandung?</span>
            <i class="fas fa-chevron-down text-muted"></i>
          </button>
          <div id="faq4" class="collapse">
            <div class="faq-body">
              Kantor Dinas Perdagangan dan Perindustrian Kota Bandung beralamat di <strong>Jl. Tamansari No. 59, Kelurahan Lebak Siliwangi, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132</strong>. Nomor telepon layanan: <strong>(022) 2503254</strong> dan email resmi: <strong>disdagin@bandung.go.id</strong>. Jam pelayanan: Senin – Jumat pukul 08:00 – 16:00 WIB.
            </div>
          </div>
        </div>

        <!-- FAQ Item 5 -->
        <div class="faq-card">
          <button class="faq-header-btn collapsed" type="button" data-toggle="collapse" data-target="#faq5" aria-expanded="false" aria-controls="faq5">
            <span>Siapa saja yang memiliki hak akses ke dalam aplikasi SIPK DISDAGIN?</span>
            <i class="fas fa-chevron-down text-muted"></i>
          </button>
          <div id="faq5" class="collapse">
            <div class="faq-body">
              Sistem SIPK dilindungi oleh kontrol akses berbasis peran (RBAC) pada sisi server. Hak akses penuh untuk mengelola data master, anggaran, kas, dan akun pegawai dimiliki oleh <strong>Administrator Teknis / PPK Keuangan</strong>, sedangkan <strong>Kepala Dinas</strong> memiliki hak akses eksekutif untuk monitoring statistik dan pengunduhan laporan akuntabilitas berkala.
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

{{-- ===================================================================
     CALL TO ACTION (CTA) UNTUK APARATUR
     =================================================================== --}}
<div class="container mb-5 pb-4">
  <div class="cta-section">
    <div class="row align-items-center">
      <div class="col-lg-8 mb-4 mb-lg-0">
        <span class="badge badge-warning text-dark font-weight-bold mb-2 px-3 py-1 text-uppercase" style="font-size: 0.75rem;">
          Portal Aparatur Kedinasan
        </span>
        <h2 class="h3 font-weight-bold text-white mb-2">
          Mulai Penatausahaan Keuangan & Realisasi Hari Ini
        </h2>
        <p class="text-white-50 mb-0">
          Masuk ke dashboard untuk mengelola mata anggaran, pembukuan kas pemasukan retribusi, belanja dinas, dan pengunduhan laporan berkala.
        </p>
      </div>
      <div class="col-lg-4 text-lg-right">
        @auth
          <a href="{{ route('dashboard') }}" class="btn btn-warning btn-lg font-weight-bold text-dark px-4 py-3 shadow-lg w-100 w-lg-auto" style="min-height: 48px;">
            <i class="fas fa-tachometer-alt mr-2"></i>Buka Dashboard
          </a>
        @else
          <a href="{{ route('login') }}" class="btn btn-warning btn-lg font-weight-bold text-dark px-4 py-3 shadow-lg w-100 w-lg-auto" style="min-height: 48px;">
            <i class="fas fa-sign-in-alt mr-2"></i>Masuk ke SIPK
          </a>
        @endauth
      </div>
    </div>
  </div>
</div>

@endsection
