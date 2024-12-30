@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Anggaran</h1>
    <a href="{{ route('budgets.create') }}" class="btn btn-primary mb-3">Tambah Anggaran</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Total Anggaran</th>
                <th>Anggaran Terpakai</th>
                <th>Sisa Anggaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($budgets as $budget)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $budget->name }}</td>
                    <td>Rp {{ number_format($budget->total_amount, 2, ',', '.') }}</td>
                    <td>Rp {{ number_format($budget->used_amount ?? 0, 2, ',', '.') }}</td>
                    <td>Rp {{ number_format($budget->total_amount - ($budget->used_amount ?? 0), 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('budgets.show', $budget->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('budgets.edit', $budget->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('budgets.destroy', $budget->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data anggaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
