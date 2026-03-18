@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Detail Penjualan</h1>
            <p class="text-gray-600">Laporan detail barang per transaksi penjualan</p>
        </div>
        <button onclick="printDiv('printArea')"
            class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded shadow inline-flex items-center transition">
            <i class="fas fa-print mr-2"></i> Print
        </button>
    </div>

    {{-- Filter Bulan --}}
        <form method="GET" class="mb-4 flex gap-2 items-center">
            <label for="bulan" class="text-sm text-gray-700">Pilih Bulan:</label>
            <select name="bulan" id="bulan"
                class="border border-gray-300 rounded px-2 py-1 text-sm">
                <option value="">-- Semua Bulan --</option>
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ sprintf('%02d', $i) }}" {{ request('bulan') == sprintf('%02d', $i) ? 'selected' : '' }}>
                        {{ \Carbon\Carbon::createFromDate(null, $i, 1)->translatedFormat('F') }}
                    </option>
                @endfor
            </select>

            <label for="tahun" class="text-sm text-gray-700">Tahun:</label>
            <select name="tahun" id="tahun"
                class="border border-gray-300 rounded px-2 py-1 text-sm">
                <option value="">-- Semua Tahun --</option>
                @php
                    $tahunSekarang = now()->year;
                    $tahunAwal = 2020; // bisa Anda ubah ke tahun awal data Anda
                @endphp
                @for ($i = $tahunSekarang; $i >= $tahunAwal; $i--)
                    <option value="{{ $i }}" {{ request('tahun') == $i ? 'selected' : '' }}>
                        {{ $i }}
                    </option>
                @endfor
            </select>

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm shadow">
                Filter
            </button>
        </form>

    <div id="printArea" class="bg-white shadow-lg rounded-xl overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase">#</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase">Kode Penjualan</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase">Tanggal</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase">Nama Barang</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase">Kelompok</th>
                    <th class="px-4 py-3 text-right text-xs font-semibold uppercase">Subsidi</th>
                    <th class="px-4 py-3 text-right text-xs font-semibold uppercase">Qty</th>
                    <th class="px-4 py-3 text-right text-xs font-semibold uppercase">Harga</th>
                    <th class="px-4 py-3 text-right text-xs font-semibold uppercase">Subtotal</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @php $grandTotalSubsidi = 0; @endphp
                @forelse ($penjualanDetails as $detail)
                    @php
                        $hargaAsli = $detail->barang->harga ?? 0;
                        $subsidiPerSak = max($hargaAsli - $detail->harga, 0);
                        $totalSubsidi = $subsidiPerSak * $detail->qty;
                        $grandTotalSubsidi += $totalSubsidi;
                    @endphp
                    <tr>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $detail->penjualan->kode_penjualan ?? '-' }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ \Carbon\Carbon::parse($detail->penjualan->tanggal)->translatedFormat('d F Y') }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $detail->barang->nama_barang ?? '-' }}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $detail->kelompok->kelompok_tani ?? '-' }}</td>
                        <td class="px-4 py-3 text-sm text-right text-green-700">
                            Rp {{ number_format($subsidiPerSak, 0, ',', '.') }} x {{ $detail->qty }}
                        </td>
                        <td class="px-4 py-3 text-sm text-right text-gray-700">{{ $detail->qty }}</td>
                        <td class="px-4 py-3 text-sm text-right text-gray-700">Rp {{ number_format($detail->harga, 0, ',', '.') }}</td>
                        <td class="px-4 py-3 text-sm text-right text-gray-700">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                        <td class="px-4 py-3 text-sm text-left">
                            <form action="{{ route('penjualan-detail.destroy', $detail->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs shadow">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="px-6 py-4 text-center text-gray-500">
                            Belum ada data detail penjualan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot class="bg-gray-50">
                <tr>
                    <td colspan="9" class="px-4 py-4 text-right font-bold text-gray-800">Grand Total Subsidi:</td>
                    <td class="px-4 py-4 text-right font-bold text-green-700">
                        Rp {{ number_format($grandTotalSubsidi, 0, ',', '.') }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script>
function printDiv(divId) {
    var printContents = document.getElementById(divId).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    location.reload();
}
</script>
@endsection
