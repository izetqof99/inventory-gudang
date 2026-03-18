<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Barang Masuk</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #000; padding: 6px; }
        th { background-color: #3490dc; color: white; }
        h2, p { text-align: center; margin: 0; }
    </style>
</head>
<body>
    <h2>Laporan Barang Masuk</h2>
    @if($tanggalMulai && $tanggalSelesai)
        <p>Periode: {{ $tanggalMulai }} s/d {{ $tanggalSelesai }}</p>
    @endif
    <br>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Masuk</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Petugas</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($barangMasuk as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->tanggal_masuk }}</td>
                    <td>{{ $item->barang->kode_barang ?? '-' }}</td>
                    <td>{{ $item->barang->nama_barang ?? '-' }}</td>
                    <td>{{ $item->jumlah_masuk }}</td>
                    <td>{{ $item->user->name ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
