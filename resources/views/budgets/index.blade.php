@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Daftar Pagu Anggaran</h1>
        <a href="{{ route('budgets.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50 mr-1"></i> Tambah Anggaran
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow-sm mb-4">
        <div class="card-header py-3 bg-white">
            <h6 class="m-0 font-weight-bold text-primary">Rekapitulasi Anggaran & Realisasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Nama Anggaran</th>
                            <th>Pagu Anggaran</th>
                            <th>Terealisasi</th>
                            <th>Sisa Pagu</th>
                            <th style="width: 140px;">Persentase</th>
                            <th style="width: 180px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($budgets as $budget)
                            @php
                                $total = (float)$budget->total_amount;
                                $used = (float)($budget->used_amount ?? 0);
                                $remaining = max(0, $total - $used);
                                $percent = $total > 0 ? round(($used / $total) * 100, 1) : 0;
                                $barColor = $percent >= 90 ? 'bg-danger' : ($percent >= 70 ? 'bg-warning' : 'bg-success');
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="font-weight-bold text-dark">{{ $budget->name }}</td>
                                <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
                                <td class="text-danger font-weight-bold">Rp {{ number_format($used, 0, ',', '.') }}</td>
                                <td class="text-success font-weight-bold">Rp {{ number_format($remaining, 0, ',', '.') }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="mr-2 small font-weight-bold">{{ $percent }}%</span>
                                        <div class="progress flex-grow-1" style="height: 14px;">
                                            <div class="progress-bar {{ $barColor }}" role="progressbar" style="width: {{ min(100, $percent) }}%" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('budgets.show', $budget->id) }}" class="btn btn-info btn-sm mr-1">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('budgets.edit', $budget->id) }}" class="btn btn-warning btn-sm mr-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('budgets.destroy', $budget->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus anggaran ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">Belum ada data anggaran yang terdaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
