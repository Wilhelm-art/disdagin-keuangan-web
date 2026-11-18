<!DOCTYPE html>
<html>
<head>
    <title>Laporan Keuangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            text-align: center;
            margin-bottom: 20px;
        }
        header img {
            width: 80px;
        }
        header h1, header h2 {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        tfoot th, tfoot td {
            background: #f2f2f2;
        }
        .footer {
            margin-top: 20px;
            text-align: right;
            font-size: 14px;
        }
    </style>
</head>
<body>

@php
    // Pastikan file Disdagin.png ada di public/img
    $logoPath = public_path('img/Disdagin.png');
    $logoData = base64_encode(file_get_contents($logoPath));
    $logoSrc = 'data:image/png;base64,'.$logoData;
@endphp

<header>
    <!-- Logo di-embed dengan base64 agar pasti muncul di PDF -->
    <img src="{{ $logoSrc }}" alt="Logo">
    <h1>DINAS PERDAGANGAN DAN PERINDUSTRIAN</h1>
    <h2>Laporan Keuangan</h2>
</header>

<table>
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
                <td>{{ optional($report->category)->name_category }}</td>
                <td>{{ $report->description }}</td>
                <td>
                    @if($report->type === 'income')
                        @php $totalIncome += $report->amount; @endphp
                        Rp {{ number_format($report->amount, 0, ',', '.') }}
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if($report->type === 'expense')
                        @php $totalExpense += $report->amount; @endphp
                        Rp {{ number_format($report->amount, 0, ',', '.') }}
                    @else
                        -
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <!-- Baris total pemasukan: ditempatkan di kolom Pemasukan -->
        <tr>
            <td colspan="4" style="text-align:;"><strong>Total Pemasukan</strong></td>
            <td><strong>Rp {{ number_format($totalIncome, 0, ',', '.') }}</strong></td>
            <td>-</td>
        </tr>
        <!-- Baris total pengeluaran: ditempatkan di kolom Pengeluaran -->
        <tr>
            <td colspan="4" style="text-align:;"><strong>Total Pengeluaran</strong></td>
            <td>-</td>
            <td><strong>Rp {{ number_format($totalExpense, 0, ',', '.') }}</strong></td>
        </tr>
    </tfoot>
</table>

<div class="footer">
    <p>{{ date('Y-m-d') }}</p>
    <!-- Jika user belum login, beri default nama -->
    <p>Dicetak oleh: {{ auth()->check() ? auth()->user()->name : 'Nama User' }}</p>
</div>

</body>
</html>
