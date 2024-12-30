@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
  <div class="row">

    <!-- Form Tambah Data Pengeluaran -->
    <div class="col-md-12">
      <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
          <h5 class="card-title fw-bold mb-0">Tambah Data Pengeluaran</h5>
        </div>
        <div class="card-body p-4">
          <!-- Form -->
          <form action="{{ route('expenses.insert') }}" method="POST">
            @csrf

            <!-- Pilihan Kategori -->
            <div class="form-group mb-3">
              <label for="id_category" class="form-label">Kategori</label>
              <select class="form-control @error('id_category') is-invalid @enderror" id="id_category" name="id_category">
                <option value="">Pilih Kategori</option>
                @foreach($categories as $category)
                  <option value="{{ $category->id_category }}" {{ old('id_category') == $category->id_category ? 'selected' : '' }}>
                    {{ $category->name_category }}
                  </option>
                @endforeach
              </select>
              @error('id_category')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Sisa Saldo -->
            <div class="form-group mb-3">
                <label for="remaining_balance" class="form-label">Sisa Saldo</label>
                <input type="text" class="form-control" id="remaining_balance" name="remaining_balance" readonly>
            </div>

            <!-- Tanggal -->
            <div class="form-group mb-3">
              <label for="date" class="form-label">Tanggal</label>
              <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}">
              @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Jumlah -->
            <div class="form-group mb-3">
              <label for="amount" class="form-label">Jumlah</label>
              <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}" oninput="formatRupiah(this)">
              </div>
              @error('amount')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Deskripsi -->
            <div class="form-group mb-3">
              <label for="description" class="form-label">Deskripsi</label>
              <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
              @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Tombol Aksi -->
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-sm btn-success me-2">Simpan</button>
              <a href="{{ route('incomes') }}" class="btn btn-sm btn-secondary">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>

<script>
  /**
   * Fungsi untuk memformat angka menjadi format Rupiah saat pengguna mengetik
   */
  function formatRupiah(input) {
    // Hapus karakter selain angka
    let value = input.value.replace(/[^0-9]/g, '');

    // Format angka menjadi Rupiah
    let formatted = new Intl.NumberFormat('id-ID').format(value);

    // Tampilkan hasil pada input
    input.value = formatted;
  }

  /**
   * Fungsi untuk memastikan angka dikirim sebagai nilai numerik (tanpa format Rupiah)
   */
  document.querySelector('form').addEventListener('submit', function (e) {
    let amountInput = document.getElementById('amount');
    let numericValue = amountInput.value.replace(/\./g, ''); // Hapus titik dari input

    // Set nilai input ke angka murni sebelum dikirim
    amountInput.value = numericValue;
  });
</script>

<script>
    document.getElementById('id_category').addEventListener('change', function () {
      let categoryId = this.value;

      if (categoryId) {
        fetch(`/categories/${categoryId}/remaining-balance`)
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              // Format saldo sebagai Rupiah
              let formattedBalance = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(data.remaining_balance);
              document.getElementById('remaining_balance').value = formattedBalance;
            } else {
              document.getElementById('remaining_balance').value = 'Saldo tidak ditemukan';
            }
          })
          .catch(error => {
            console.error('Error fetching remaining balance:', error);
            document.getElementById('remaining_balance').value = 'Terjadi kesalahan';
          });
      } else {
        document.getElementById('remaining_balance').value = '';
      }
    });
  </script>

@endsection
