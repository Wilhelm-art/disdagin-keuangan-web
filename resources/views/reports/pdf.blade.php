<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Keuangan DISDAGIN</title>
    <style>
        body {
            font-family: Helvetica, Arial, sans-serif;
            margin: 15px 25px;
            font-size: 10pt;
            color: #222;
        }
        header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 3px double #222;
            padding-bottom: 10px;
        }
        .header-instansi {
            font-size: 11pt;
            font-weight: bold;
            letter-spacing: 0.5px;
        }
        .header-dinas {
            font-size: 14pt;
            font-weight: bold;
            margin: 2px 0;
        }
        .header-alamat {
            font-size: 8.5pt;
            color: #444;
        }
        .header-judul {
            font-size: 11pt;
            font-weight: bold;
            margin-top: 12px;
            text-transform: uppercase;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table, th, td {
            border: 1px solid #444;
        }
        th {
            background-color: #f0f0f0;
            padding: 6px;
            font-size: 9pt;
            text-align: center;
        }
        td {
            padding: 6px;
            font-size: 9pt;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .footer {
            margin-top: 25px;
            float: right;
            width: 250px;
            text-align: center;
            font-size: 9.5pt;
        }
        .footer .ttd-space {
            height: 60px;
        }
    </style>
</head>
<body>

@php
    $logoPath = public_path('img/Disdagin.png');
    $logoSrc = (extension_loaded('gd') && file_exists($logoPath)) ? 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath)) : null;
@endphp

<header>
    @if($logoSrc)
        <img src="{{ $logoSrc }}" alt="Logo" style="width: 60px; margin-bottom: 5px;">
    @endif
    <div class="header-instansi">PEMERINTAH KOTA BANDUNG</div>
    <div class="header-dinas">DINAS PERDAGANGAN DAN PERINDUSTRIAN</div>
    <div class="header-alamat">Jl. Cianjur No. 34, Kota Bandung, Jawa Barat | Telp: (022) 7208535</div>
    <div class="header-judul">LAPORAN KEUANGAN DAN REALISASI ANGGARAN</div>
</header>

<table>
    <thead>
        <tr>
            <th style="width: 25px;">No</th>
            <th style="width: 70px;">Tanggal</th>
            <th style="width: 120px;">Kategori</th>
            <th>Keterangan</th>
            <th style="width: 105px;">Pemasukan</th>
            <th style="width: 105px;">Pengeluaran</th>
        </tr>
    </thead>
    <tbody>
        @php
            $totalIncome = 0;
            $totalExpense = 0;
        @endphp
        @forelse ($reports as $index => $report)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td class="text-center">{{ $report->date }}</td>
                <td>{{ optional($report->category)->name_category ?? '-' }}</td>
                <td>{{ $report->description }}</td>
                <td class="text-right">
                    @if($report->type === 'income')
                        @php $totalIncome += $report->amount; @endphp
                        Rp {{ number_format($report->amount, 0, ',', '.') }}
                    @else
                        -
                    @endif
                </td>
                <td class="text-right">
                    @if($report->type === 'expense')
                        @php $totalExpense += $report->amount; @endphp
                        Rp {{ number_format($report->amount, 0, ',', '.') }}
                    @else
                        -
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center" style="padding: 15px;">Belum ada data transaksi untuk periode ini.</td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr style="background-color: #f9f9f9; font-weight: bold;">
            <td colspan="4" class="text-right">Total Pemasukan:</td>
            <td class="text-right">Rp {{ number_format($totalIncome, 0, ',', '.') }}</td>
            <td class="text-center">-</td>
        </tr>
        <tr style="background-color: #f9f9f9; font-weight: bold;">
            <td colspan="4" class="text-right">Total Pengeluaran:</td>
            <td class="text-center">-</td>
            <td class="text-right">Rp {{ number_format($totalExpense, 0, ',', '.') }}</td>
        </tr>
        <tr style="background-color: #f0f0f0; font-weight: bold;">
            <td colspan="4" class="text-right">Sisa Kas Bersih (Surplus / Defisit):</td>
            <td colspan="2" class="text-right">Rp {{ number_format($totalIncome - $totalExpense, 0, ',', '.') }}</td>
        </tr>
    </tfoot>
</table>

<div class="footer">
    <p>Bandung, {{ date('d F Y') }}<br>Mengetahui,<br><strong>Kepala Dinas</strong></p>
    <div class="ttd-space"></div>
    <p style="text-decoration: underline; font-weight: bold; margin-bottom: 2px;">Drs. H. Elly Wasliah, M.Si.</p>
    <p style="font-size: 8.5pt; margin-top: 0;">NIP. 19680315 199303 2 004</p>
</div>

</body>
</html>
