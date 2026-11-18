@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Laporan Keuangan</h1>
        <div class="mt-2 mt-sm-0">
            <a href="{{ route('reports.pdf', request()->query()) }}" class="btn btn-sm btn-danger shadow-sm mr-2">
                <i class="fas fa-file-pdf fa-sm text-white-50 mr-1"></i> Unduh PDF
            </a>
            <a href="{{ route('reports.excel', request()->query()) }}" class="btn btn-sm btn-success shadow-sm">
                <i class="fas fa-file-excel fa-sm text-white-50 mr-1"></i> Ekspor Excel
            </a>
        </div>
    </div>

    <!-- Filter Card -->
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3 bg-white">
            <h6 class="m-0 font-weight-bold text-primary">Filter Data Transaksi</h6>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('reports.index') }}">
                <div class="row align-items-end">
                    <div class="col-md-3 mb-3 mb-md-0">
                        <label class="font-weight-bold text-dark small">Dari Tanggal:</label>
                        <input type="date" name="from_date" class="form-control form-control-sm" value="{{ request('from_date') }}">
                    </div>
                    <div class="col-md-3 mb-3 mb-md-0">
                        <label class="font-weight-bold text-dark small">Sampai Tanggal:</label>
                        <input type="date" name="to_date" class="form-control form-control-sm" value="{{ request('to_date') }}">
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <label class="font-weight-bold text-dark small">Kategori:</label>
                        <select name="id_category" class="form-control form-control-sm">
                            <option value="">Semua Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id_category }}"
                                    {{ request('id_category') == $category->id_category ? 'selected' : '' }}>
                                    {{ $category->name_category }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary btn-sm btn-block">
                            <i class="fas fa-filter fa-sm mr-1"></i> Filter
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Laporan Card -->
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3 bg-white d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Rincian Buku Kas Transaksi</h6>
            <span class="badge badge-info">{{ count($reports) }} Catatan Ditemukan</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th style="width: 120px;">Tanggal</th>
                            <th>Kategori</th>
                            <th>Keterangan</th>
                            <th class="text-right" style="width: 180px;">Pemasukan</th>
                            <th class="text-right" style="width: 180px;">Pengeluaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalIncome = 0;
                            $totalExpense = 0;
                        @endphp

                        @forelse ($reports as $index => $report)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $report->date }}</td>
                                <td>
                                    <span class="badge badge-light border">{{ optional($report->category)->name_category ?? '-' }}</span>
                                </td>
                                <td>{{ $report->description }}</td>
                                <td class="text-right">
                                    @if ($report->type === 'income')
                                        <span class="text-success font-weight-bold">Rp {{ number_format($report->amount, 0, ',', '.') }}</span>
                                        @php $totalIncome += $report->amount; @endphp
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    @if ($report->type === 'expense')
                                        <span class="text-danger font-weight-bold">Rp {{ number_format($report->amount, 0, ',', '.') }}</span>
                                        @php $totalExpense += $report->amount; @endphp
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">Tidak ada data transaksi yang sesuai filter.</td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot class="bg-light font-weight-bold">
                        <tr>
                            <th colspan="4" class="text-right">Total Pemasukan:</th>
                            <th class="text-right text-success">Rp {{ number_format($totalIncome, 0, ',', '.') }}</th>
                            <th></th>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-right">Total Pengeluaran:</th>
                            <th></th>
                            <th class="text-right text-danger">Rp {{ number_format($totalExpense, 0, ',', '.') }}</th>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-right">Selisih Bersih (Surplus / Defisit):</th>
                            <th colspan="2" class="text-right {{ ($totalIncome - $totalExpense) >= 0 ? 'text-primary' : 'text-danger' }}">
                                Rp {{ number_format($totalIncome - $totalExpense, 0, ',', '.') }}
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
