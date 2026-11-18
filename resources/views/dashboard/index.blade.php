@extends('layouts.app')

@section('title', 'Dashboard - SIPK DISDAGIN Kota Bandung')

@section('content')
<div class="container-fluid">

  <!-- Welcome Banner -->
  <div class="card mb-4 border-0 shadow-sm overflow-hidden" style="background: linear-gradient(135deg, #0c264c 0%, #163e77 100%); border-radius: 14px;">
    <div class="card-body p-4 text-white">
      <div class="row align-items-center">
        <div class="col-lg-8 mb-3 mb-lg-0">
          <div class="d-flex align-items-center mb-2">
            <span class="badge badge-warning text-dark font-weight-bold px-2 py-1 mr-2" style="font-size: 0.72rem;">
              {{ Auth::user()->role === 'admin' ? 'ADMINISTRATOR' : 'KEPALA DINAS' }}
            </span>
            <span class="text-white-50 small">
              Tahun Anggaran {{ date('Y') }}
            </span>
          </div>
          <h3 class="font-weight-bold text-white mb-1">
            Selamat Datang, {{ Auth::user()->name }}!
          </h3>
          <p class="text-white-50 mb-0 small" style="max-width: 650px;">
            Sistem Informasi Pengelolaan Keuangan & Realisasi Anggaran Dinas Perdagangan dan Perindustrian Kota Bandung. Pantau sisa pagu anggaran dan penerimaan kas secara terpusat.
          </p>
        </div>
        <div class="col-lg-4 text-lg-right">
          <a href="{{ route('reports.index') }}" class="btn btn-warning font-weight-bold text-dark shadow-sm mr-2 mb-2">
            <i class="fas fa-file-invoice-dollar mr-1"></i>Laporan Keuangan
          </a>
          @if(Auth::user()->role === 'admin')
            <a href="{{ route('incomes.addPage') }}" class="btn btn-light text-primary font-weight-bold shadow-sm mb-2">
              <i class="fas fa-plus-circle mr-1"></i>Catat Kas
            </a>
          @endif
        </div>
      </div>
    </div>
  </div>

  @if (session('welcome_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="fas fa-check-circle mr-1"></i> {{ session('welcome_message') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

  <!-- Ringkasan Statistik Kartu -->
  <div class="row">

    <!-- Anggaran Card -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow-sm h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Total Pagu Anggaran
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                Rp {{ number_format($total_budget, 0, ',', '.') }}
              </div>
              <div class="text-muted small mt-1" style="font-size: 0.72rem;">
                Alokasi Pagu APBD Dinas
              </div>
            </div>
            <div class="col-auto">
              <div class="rounded-circle p-3 bg-light text-primary">
                <i class="fas fa-wallet fa-lg"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pemasukan Card -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow-sm h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Realisasi Pemasukan
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                Rp {{ number_format($total_incomes, 0, ',', '.') }}
              </div>
              <div class="text-muted small mt-1" style="font-size: 0.72rem;">
                Penerimaan Kas & Retribusi
              </div>
            </div>
            <div class="col-auto">
              <div class="rounded-circle p-3 bg-light text-success">
                <i class="fas fa-arrow-circle-down fa-lg"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pengeluaran Card -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow-sm h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                Realisasi Belanja
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                Rp {{ number_format($total_expenses, 0, ',', '.') }}
              </div>
              <div class="text-muted small mt-1" style="font-size: 0.72rem;">
                Belanja Operasional & Modal
              </div>
            </div>
            <div class="col-auto">
              <div class="rounded-circle p-3 bg-light text-danger">
                <i class="fas fa-arrow-circle-up fa-lg"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Kategori Card -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow-sm h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Mata Anggaran / Kategori
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                {{ $total_categories }} Kategori
              </div>
              <div class="text-muted small mt-1" style="font-size: 0.72rem;">
                Bidang Perdagangan & Industri
              </div>
            </div>
            <div class="col-auto">
              <div class="rounded-circle p-3 bg-light text-warning">
                <i class="fas fa-tags fa-lg"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Grafik Content -->
  <div class="row mb-4">
    <div class="col-lg-6 mb-4">
      <div class="card shadow-sm h-100">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-dark">
            <i class="fas fa-chart-bar text-primary mr-2"></i>Tren Pemasukan & Pengeluaran Bulanan
          </h6>
          <span class="badge badge-light border text-muted small">Tahun {{ date('Y') }}</span>
        </div>
        <div class="card-body">
          <canvas id="monthlyChart" style="min-height: 250px;"></canvas>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card shadow-sm h-100">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-dark">
            <i class="fas fa-chart-line text-info mr-2"></i>Perbandingan Kas Tahunan
          </h6>
          <span class="badge badge-light border text-muted small">Multi-Tahun</span>
        </div>
        <div class="card-body">
          <canvas id="yearlyChart" style="min-height: 250px;"></canvas>
        </div>
      </div>
    </div>
  </div>

  <!-- Table Aktivitas Kas Terbaru -->
  <div class="row">
    <div class="col-12">
      <div class="card shadow-sm mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-dark">
            <i class="fas fa-history text-secondary mr-2"></i>Aktivitas Kas & Belanja Terakhir
          </h6>
          @if(Auth::user()->role === 'admin')
            <div>
              <a href="{{ route('incomes') }}" class="btn btn-sm btn-outline-success mr-1">Lihat Pemasukan</a>
              <a href="{{ route('expenses') }}" class="btn btn-sm btn-outline-danger">Lihat Pengeluaran</a>
            </div>
          @endif
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover mb-0" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="width: 130px;">Tipe Kas</th>
                  <th style="width: 170px;">Jumlah</th>
                  <th>Uraian / Deskripsi Kegiatan</th>
                  <th style="width: 140px;">Tanggal</th>
                  <th style="width: 180px;">Kategori Anggaran</th>
                </tr>
              </thead>
              <tbody>
                @forelse($incomesAndExpenses as $incomeAndExpense)
                <tr>
                  <td>
                    @if(isset($incomeAndExpense->type) && $incomeAndExpense->type === 'income')
                      <span class="badge badge-success px-2 py-1"><i class="fas fa-arrow-down mr-1"></i>Pemasukan</span>
                    @else
                      <span class="badge badge-danger px-2 py-1"><i class="fas fa-arrow-up mr-1"></i>Pengeluaran</span>
                    @endif
                  </td>
                  <td class="font-weight-bold {{ (isset($incomeAndExpense->type) && $incomeAndExpense->type === 'income') ? 'text-success' : 'text-danger' }}">
                    Rp {{ number_format($incomeAndExpense->amount, 0, ',', '.') }}
                  </td>
                  <td>{{ $incomeAndExpense->description }}</td>
                  <td>
                    <span class="text-muted small">
                      <i class="far fa-calendar-alt mr-1"></i>{{ \Carbon\Carbon::parse($incomeAndExpense->date)->format('d/m/Y') }}
                    </span>
                  </td>
                  <td>
                    @php $catFound = false; @endphp
                    @foreach($categories as $category)
                      @if($category->id_category == $incomeAndExpense->id_category)
                        <span class="badge badge-light border text-dark">{{ $category->name_category }}</span>
                        @php $catFound = true; @endphp
                      @endif
                    @endforeach
                    @if(!$catFound)
                      <span class="badge badge-light border text-muted">-</span>
                    @endif
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="5" class="text-center text-muted py-4">
                    <i class="fas fa-inbox fa-2x mb-2 d-block text-gray-300"></i>
                    Belum ada riwayat aktivitas kas yang tercatat.
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  let monthlyIncomes = @json($monthlyIncomes);
  let monthlyExpenses = @json($monthlyExpenses);
  let yearlyIncomes = @json($yearlyIncomes);
  let yearlyExpenses = @json($yearlyExpenses);

  const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
  const yearlyCtx = document.getElementById('yearlyChart').getContext('2d');

  // Monthly Chart - Colors aligned with Disdagin theme
  new Chart(monthlyCtx, {
    type: 'bar',
    data: {
      labels: monthlyIncomes.map(item => item.month),
      datasets: [
        {
          label: 'Pemasukan Kas',
          data: monthlyIncomes.map(item => item.total),
          backgroundColor: 'rgba(13, 122, 77, 0.75)',
          borderColor: '#0D7A4D',
          borderWidth: 1,
          borderRadius: 4
        },
        {
          label: 'Pengeluaran Belanja',
          data: monthlyExpenses.map(item => item.total),
          backgroundColor: 'rgba(225, 29, 72, 0.75)',
          borderColor: '#e11d48',
          borderWidth: 1,
          borderRadius: 4
        }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: {
          ticks: {
            callback: function(value) {
              return 'Rp ' + Number(value).toLocaleString('id-ID');
            }
          }
        }
      }
    }
  });

  // Yearly Chart
  new Chart(yearlyCtx, {
    type: 'line',
    data: {
      labels: yearlyIncomes.map(item => item.year),
      datasets: [
        {
          label: 'Pemasukan Kas',
          data: yearlyIncomes.map(item => item.total),
          borderColor: '#0D7A4D',
          backgroundColor: 'rgba(13, 122, 77, 0.1)',
          fill: true,
          tension: 0.3
        },
        {
          label: 'Pengeluaran Belanja',
          data: yearlyExpenses.map(item => item.total),
          borderColor: '#e11d48',
          backgroundColor: 'rgba(225, 29, 72, 0.1)',
          fill: true,
          tension: 0.3
        }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: {
          ticks: {
            callback: function(value) {
              return 'Rp ' + Number(value).toLocaleString('id-ID');
            }
          }
        }
      }
    }
  });
</script>
@endpush
