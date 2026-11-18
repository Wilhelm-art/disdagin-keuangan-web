@extends('layouts.app')

@section('content')
<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  @if (session('welcome_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('welcome_message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

<div class="row">

    <!-- Budget Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Anggaran
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                Rp {{ number_format($total_budget, 0, ',', '.') }}
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-wallet fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Income Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Pemasukan
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                Rp {{ number_format($total_incomes, 0, ',', '.') }}
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-arrow-down fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Expense Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                Pengeluaran
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                Rp {{ number_format($total_expenses, 0, ',', '.') }}
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-arrow-up fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Category Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                kategori
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                {{ $total_categories }}
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-tags fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>


  <!-- Grafik Content -->
  <div class="row mb-4">
    <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-secondary">Grafik Pemasukan dan Pengeluaran Bulanan</h6>
        </div>
        <div class="card-body">
          <canvas id="monthlyChart"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-secondary">Grafik Pemasukan dan Pengeluaran Tahunan</h6>
        </div>
        <div class="card-body">
          <canvas id="yearlyChart"></canvas>
        </div>
      </div>
    </div>
  </div>

  <!-- Table (Income, Expense) Content -->
  <div class="row">
    <div class="col-12 col-sm-12">
      <div class="table">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">PEMASUKAN & PENGELUARAN</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Tipe</th>
                    <th>Jumlah</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Kategori</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($incomesAndExpenses as $incomeAndExpense)
                  <tr>
                    <td>
                      @if(isset($incomeAndExpense->type) && $incomeAndExpense->type === 'income')
                        <span class="badge badge-success"><i class="fas fa-arrow-down mr-1"></i>Pemasukan</span>
                      @else
                        <span class="badge badge-danger"><i class="fas fa-arrow-up mr-1"></i>Pengeluaran</span>
                      @endif
                    </td>
                    <td class="font-weight-bold {{ (isset($incomeAndExpense->type) && $incomeAndExpense->type === 'income') ? 'text-success' : 'text-danger' }}">
                      Rp {{ number_format($incomeAndExpense->amount, 0, ',', '.') }}
                    </td>
                    <td>{{ $incomeAndExpense->description }}</td>
                    <td>{{ $incomeAndExpense->date }}</td>
                    <td>
                      @foreach($categories as $category)
                      @if($category->id_category == $incomeAndExpense->id_category)
                      <span class="badge badge-light border">{{ $category->name_category }}</span>
                      @endif
                      @endforeach
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Auto-dismiss alert script -->
  <script>
      document.addEventListener("DOMContentLoaded", function () {
          setTimeout(function () {
              let alert = document.querySelector('.alert');
              if (alert) {
                  alert.classList.add('fade-out');
                  setTimeout(() => alert.remove(), 500); // Remove element after fade effect
              }
          }, 3000); // 2 seconds
      });
  </script>

  <style>
      .fade-out {
          opacity: 0;
          transition: opacity 0.5s ease;
      }
  </style>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  let monthlyIncomes = @json($monthlyIncomes);
  let monthlyExpenses = @json($monthlyExpenses);
  let yearlyIncomes = @json($yearlyIncomes);
  let yearlyExpenses = @json($yearlyExpenses);

  const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
  const yearlyCtx = document.getElementById('yearlyChart').getContext('2d');

  // Monthly Chart
  new Chart(monthlyCtx, {
    type: 'bar',
    data: {
      labels: monthlyIncomes.map(item => item.month),
      datasets: [
        {
          label: 'Income',
          data: monthlyIncomes.map(item => item.total),
          backgroundColor: 'rgba(75, 192, 192, 0.6)',
        },
        {
          label: 'Expense',
          data: monthlyExpenses.map(item => item.total),
          backgroundColor: 'rgba(255, 99, 132, 0.6)',
        }
      ]
    }
  });

  // Yearly Chart
  new Chart(yearlyCtx, {
    type: 'line',
    data: {
      labels: yearlyIncomes.map(item => item.year),
      datasets: [
        {
          label: 'Income',
          data: yearlyIncomes.map(item => item.total),
          borderColor: 'rgba(75, 192, 192, 1)',
          fill: true
        },
        {
          label: 'Expense',
          data: yearlyExpenses.map(item => item.total),
          borderColor: 'rgba(255, 99, 132, 1)',
          fill: true
        }
      ]
    }
  });
</script>
@endsection
