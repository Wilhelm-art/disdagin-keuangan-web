@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Anggaran</h1>
    <form action="{{ route('budgets.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Anggaran</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="total_amount">Total Anggaran</label>
            <input type="number" step="0.01" name="total_amount" id="total_amount" class="form-control @error('total_amount') is-invalid @enderror" value="{{ old('total_amount') }}" required>
            @error('total_amount')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('budgets.index') }}" class="btn btn-secondary">Batal</a>
        </div>


<script>
    /**
     * Fungsi untuk memformat angka menjadi format Rupiah
     */
    function formatRupiah(input) {
        let value = input.value.replace(/[^,\d]/g, ''); // Hapus karakter non-numerik
        let split = value.split(',');
        let sisa = split[0].length % 3;
        let rupiah = split[0].substr(0, sisa);
        let ribuan = split[0].substr(sisa).match(/\d{3}/g);

        if (ribuan) {
            let separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        input.value = rupiah; // Set nilai input ke format Rupiah
    }
</script>
@endsection
