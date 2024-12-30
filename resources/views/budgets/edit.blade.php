@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Anggaran</h1>

    {{-- Form untuk update anggaran --}}
    <form action="{{ route('budgets.update', $budget->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama Anggaran</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $budget->name) }}" required>
        </div>

        <div class="form-group">
            <label for="total_amount">Total Anggaran</label>
            <input type="number" step="0.01" name="total_amount" id="total_amount" class="form-control" value="{{ old('total_amount', $budget->total_amount) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $budget->description) }}</textarea>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-success">Perbarui</button>
            <a href="{{ route('budgets.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
