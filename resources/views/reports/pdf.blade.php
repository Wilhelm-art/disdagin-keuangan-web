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
        .footer {
            margin-top: 20px;
            text-align: right;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <header>
        <img src="{{ asset('img/dp.png') }}" alt="Logo">
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
            @foreach ($reports as $index => $report)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $report->date }}</td>
                    <td>{{ $report->category->name_category }}</td>
                    <td>{{ $report->description }}</td>
                    <td>
                        {{ $report->type === 'income' ? 'Rp ' . number_format($report->amount, 0, ',', '.') : '-' }}
                    </td>
                    <td>
                        {{ $report->type === 'expense' ? 'Rp ' . number_format($report->amount, 0, ',', '.') : '-' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>{{ date('Y-m-d') }}</p>
        <p>Dicetak oleh: {{ auth()->user()->name }}</p>
    </div>
</body>
</html>
