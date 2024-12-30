@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Anggaran</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $budget->name }}</h5>
            <p class="card-text"><strong>Total Anggaran:</strong> {{ number_format($budget->total_amount, 2) }}</p>
            <p class="card-text"><strong>Anggaran Terpakai:</strong> {{ number_format($budget->used_amount, 2) }}</p>
            <p class="card-text"><strong>Deskripsi:</strong> {{ $budget->description }}</p>
            <a href="{{ route('budgets.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
