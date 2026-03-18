@extends('layouts.app')

@section('content')
<div class="p-6 space-y-8 max-w-7xl mx-auto">

    <h1 class="text-2xl font-bold text-gray-800">Transaksi Kasir</h1>

    {{-- Pesan Error / Success --}}
    @if(session('error'))
        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('kasir.store') }}" method="POST" id="kasirForm"
          class="bg-white p-6 rounded-2xl shadow space-y-6">
        @csrf

        {{-- Pilih Kelompok --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Petani / Kelompok Tani</label>
            <select name="kelompok_id" id="kelompokSelect"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200">
                <option value="">Customer Umum</option>
                @foreach ($kelompok as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_petani }} ({{ $item->kelompok_tani }})</option>
                @endforeach
            </select>
        </div>

        {{-- Tabel Barang --}}
        <div class="overflow-x-auto">
            <table id="kasirTable" class="w-full text-sm border rounded-lg overflow-hidden">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-3 py-2 text-left">Barang</th>
                        <th class="px-3 py-2 text-right">Harga</th>
                        <th class="px-3 py-2 text-right">Subsidi</th> <!-- 🔥 kolom tambahan -->
                        <th class="px-3 py-2 text-center">Qty</th>
                        <th class="px-3 py-2 text-right">Subtotal</th>
                        <th class="px-3 py-2 text-center">
                            <button type="button" onclick="addRow()"
                                class="px-2 py-1 bg-green-500 hover:bg-green-600 rounded text-white transition">
                                +
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-50">
                        <td class="px-3 py-2">
                            <select name="items[0][barang_id]" class="barang-select w-full border-gray-300 rounded" required>
                                @foreach($barangs as $barang)
                                    <option value="{{ $barang->id }}"
                                            data-harga="{{ $barang->harga }}"
                                            data-berat="{{ $barang->berat }}">
                                        {{ $barang->nama_barang }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td class="px-3 py-2 text-right">
                            <input type="number" name="items[0][harga]" class="harga w-full text-right" readonly step="0.01">
                        </td>
                        <td class="px-3 py-2 text-right">
                            <input type="number" name="items[0][subsidi]" class="subsidi w-full text-right" readonly step="0.01">
                        </td>
                        <td class="px-3 py-2 text-center">
                            <input type="number" name="items[0][qty]" class="qty w-16 text-center" min="1" value="1">
                        </td>
                        <td class="px-3 py-2 text-right">
                            <input type="number" name="items[0][subtotal]" class="subtotal w-full text-right" readonly step="0.01">
                        </td>
                        <td class="px-3 py-2 text-center">
                            <button type="button" onclick="removeRow(this)"
                                class="px-2 py-1 bg-red-500 hover:bg-red-600 rounded text-white transition">
                                ×
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Total dan Pembayaran --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm text-gray-700 mb-1">Total</label>
                <input type="number" id="total" class="w-full text-right border-gray-300 rounded-lg shadow-sm" readonly>
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Total Setelah Subsidi</label>
                <input type="number" id="total_diskon" class="w-full text-right border-gray-300 rounded-lg shadow-sm" readonly>
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Bayar</label>
                <input type="number" name="bayar" id="bayar"
                       class="w-full text-right border-gray-300 rounded-lg shadow-sm">
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Kembali</label>
                <input type="number" name="kembali" id="kembali"
                       class="w-full text-right border-gray-300 rounded-lg shadow-sm" readonly>
            </div>
        </div>

        <div>
            <button type="submit"
                class="w-full py-3 bg-blue-400 hover:bg-blue-700 text-white font-semibold rounded-lg shadow">
                Simpan Transaksi
            </button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
{{-- Include JavaScript yang telah kamu refactor sebelumnya --}}
@include('kasir.partials.scripts')
@endsection
