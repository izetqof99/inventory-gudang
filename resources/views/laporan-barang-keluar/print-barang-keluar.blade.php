<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Barang Keluar</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            color: #000;
        }

        h2 {
            text-align: center;
            margin-bottom: 0;
        }

        .periode {
            text-align: center;
            margin-top: 4px;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 11px;
        }
    </style>
</head>
<body>
    <h2>Laporan Barang Keluar</h2>
    @if($tanggalMulai && $tanggalSelesai)
        <div class="periode">
            Periode: {{ $tanggalMulai }} s/d {{ $tanggalSelesai }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kode Transaksi</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Kelompok Tani</th>
                <th>Petugas</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $item)
            <tr>
                <td>{{ $item->tanggal_keluar }}</td>
                <td>{{ $item->kode_transaksi }}</td>
                <td>{{ optional($item->barang)->nama_barang ?? '-' }}</td>
                <td>{{ $item->jumlah_keluar }}</td>
                <td>{{ optional($item->kelompok)->kelompok_tani ?? '-' }}</td>
                <td>{{ optional($item->user)->name ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center;">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: {{ now()->format('d-m-Y H:i') }}
    </div>
</body>
</html>
