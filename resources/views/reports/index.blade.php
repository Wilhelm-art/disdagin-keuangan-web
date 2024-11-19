@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Laporan Keuangan</h1>

    <!-- Filter Laporan -->
    <form method="GET" action="{{ route('reports.index') }}">
        <div class="row">
            <div class="col-md-3">
                <label for="from_date">Dari Tanggal:</label>
                <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
            </div>
            <div class="col-md-3">
                <label for="to_date">Sampai Tanggal:</label>
                <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
            </div>
            <div class="col-md-3">
                <label for="category_id">Kategori:</label>
                <select name="category_id" class="form-control">
                    <option value="">Semua</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
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
                @foreach($reports as $index => $report)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $report->date }}</td>
                        <td>{{ $report->category->name }}</td>
                        <td>{{ $report->description }}</td>
                        <td>{{ $report->amount }}</td>
                        <td>{{ $report->expense_amount }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tombol Ekspor dan Cetak -->
    <div class="mt-3">
        <form method="POST" action="{{ route('reports.exportExcel') }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-success">Export Excel</button>
        </form>
        <form method="POST" action="{{ route('reports.print') }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-secondary">Print</button>
        </form>
    </div>
</div>
@endsection
