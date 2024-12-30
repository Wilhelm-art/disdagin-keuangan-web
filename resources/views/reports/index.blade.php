@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Laporan Keuangan</h1>

    <!-- Form Filter -->
<form method="GET" action="{{ route('reports.index') }}">
    <div class="row">
        <div class="col-md-3">
            <label>Dari Tanggal:</label>
            <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
        </div>
        <div class="col-md-3">
            <label>Sampai Tanggal:</label>
            <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
        </div>
        <div class="col-md-3">
            <label>Kategori:</label>
            <select name="id_category" class="form-control">
                <option value="">Semua Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ request('id_category') == $category->id_category ? 'selected' : '' }}>
                        {{ $category->name_category }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label>&nbsp;</label>
            <button type="submit" class="btn btn-primary btn-block">Filter</button>
        </div>
    </div>
</form>


    <!-- Tombol Export -->
    <div class="d-flex justify-content-end mt-3">
        <a href="{{ route('reports.pdf', request()->query()) }}" class="btn btn-danger btn-sm me-2">
            <i class="fas fa-file-pdf"></i> Download PDF
        </a>
        <a href="{{ route('reports.excel', request()->query()) }}" class="btn btn-success btn-sm">
            <i class="fas fa-file-excel"></i> Export Excel
        </a>
    </div>

    <!-- Tabel Laporan -->
    <div class="mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kategori</th>
                    <th>Keterangan</th>
                    <th>Pemasukan</th>
                    <th>Pengeluaran</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalIncome = 0;
                    $totalExpense = 0;
                @endphp

                @foreach ($reports as $index => $report)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $report->date }}</td>
                        <td>{{ $report->category->name_category }}</td>
                        <td>{{ $report->description }}</td>
                        <td>
                            @if ($report->type === 'income')
                                Rp {{ number_format($report->amount, 0, ',', '.') }}
                                @php $totalIncome += $report->amount; @endphp
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if ($report->type === 'expense')
                                Rp {{ number_format($report->amount, 0, ',', '.') }}
                                @php $totalExpense += $report->amount; @endphp
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @endforeach

                @if ($reports->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data</td>
                    </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" class="text-end">Total Pemasukan:</th>
                    <th>Rp {{ number_format($totalIncome, 0, ',', '.') }}</th>
                    <th></th>
                </tr>
                <tr>
                    <th colspan="4" class="text-end">Total Pengeluaran:</th>
                    <th></th>
                    <th>Rp {{ number_format($totalExpense, 0, ',', '.') }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
