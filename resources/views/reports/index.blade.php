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
                <select name="it_category" class="form-control">
                    <option value="">Semua</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('id_category') == $category->id ? 'selected' : '' }}>
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
                </tr>
            </thead>
            <tbody>
                @forelse ($reports as $index => $report)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $report->date }}</td>
                        <td>{{ $report->category->name_category }}</td>
                        <td>{{ $report->description }}</td>
                        <td>{{ number_format($report->amount, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
