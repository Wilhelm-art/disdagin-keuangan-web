@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
          <h5 class="card-title fw-bold mb-0">Edit Data Pemasukan</h5>
        </div>
        <div class="card-body">
          <!-- Form -->
          <form action="{{ route('incomes.update', $income->id_income) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Pilih Anggaran -->
            <div class="form-group mb-3">
              <label for="id_budget" class="form-label">Pilih Anggaran</label>
              <select class="form-control @error('id_budget') is-invalid @enderror" id="id_budget" name="id_budget" required>
                <option value="" disabled>Pilih Anggaran</option>
                @foreach($budgets as $budget)
                <option value="{{ $budget->id }}" {{ (old('id_budget', $income->id_budget) == $budget->id) ? 'selected' : '' }}>
                  {{ $budget->name }} (Sisa: Rp {{ number_format($budget->remainingAmount(), 0, ',', '.') }})
                </option>
                @endforeach
              </select>
              @error('id_budget')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Pilih Kategori -->
            <div class="form-group mb-3">
              <label for="id_category" class="form-label">Kategori</label>
              <select class="form-control @error('id_category') is-invalid @enderror" id="id_category" name="id_category" required>
                <option value="" disabled>Pilih Kategori</option>
                @foreach($categories as $category)
                <option value="{{ $category->id_category }}" {{ (old('id_category', $income->id_category) == $category->id_category) ? 'selected' : '' }}>
                  {{ $category->name_category }}
                </option>
                @endforeach
              </select>
              @error('id_category')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Tanggal -->
            <div class="form-group mb-3">
              <label for="date" class="form-label">Tanggal</label>
              <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', $income->date) }}" required>
              @error('date')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Jumlah -->
            <div class="form-group mb-3">
              <label for="amount" class="form-label">Jumlah</label>
              <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ number_format(old('amount', $income->amount), 0, ',', '.') }}" oninput="formatRupiah(this)" required>
              </div>
              @error('amount')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Deskripsi -->
            <div class="form-group mb-3">
              <label for="description" class="form-label">Deskripsi</label>
              <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description', $income->description) }}</textarea>
              @error('description')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Tombol Aksi -->
            <div class="d-flex justify-content-between">
              <button type="submit" class="btn btn-sm btn-success">
                <i class="fas fa-save"></i> Perbarui
              </button>
              <a href="{{ route('incomes') }}" class="btn btn-sm btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    function formatRupiah(input) {
        let value = input.value.replace(/[^0-9]/g, '');
        let formatted = new Intl.NumberFormat('id-ID').format(value);
        input.value = formatted;
    }

    document.querySelector('form').addEventListener('submit', function (e) {
        let amountInput = document.getElementById('amount');
        let numericValue = amountInput.value.replace(/\./g, '');
        amountInput.value = numericValue;
    });
</script>

@endsection
