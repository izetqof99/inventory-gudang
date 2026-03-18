@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-6 space-y-8">

    <h2 class="text-2xl font-bold text-gray-800">Kelola Subsidi Barang</h2>

    {{-- Form Tambah Subsidi --}}
    <div class="bg-white shadow-md rounded-xl p-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Tambah / Perbarui Diskon Subsidi</h3>
        <form action="{{ route('subsidi-barang.store') }}" method="POST" 
              class="grid grid-cols-1 md:grid-cols-5 gap-4 items-end">
            @csrf

            {{-- Petani --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Petani / Kelompok Tani</label>
                <select name="kelompok_id" required 
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                    <option value="">-- Pilih Petani --</option>
                    @foreach($kelompokList as $kelompok)
                        <option value="{{ $kelompok->id }}">
                            {{ $kelompok->nama_petani }} ({{ $kelompok->kelompok_tani }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Barang --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Barang</label>
                <select name="barang_id" required 
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                    <option value="">-- Pilih Barang --</option>
                    @foreach($barangList as $barang)
                        <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Harga Subsidi per Kg --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Harga Subsidi per Kg (Rp)</label>
                <input type="number" name="harga_subsidi_per_kg" min="0" step="0.01"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500" required>
            </div>

            {{-- Jatah Subsidi --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Jatah Subsidi (Kg)</label>
                <input type="number" name="jatah_subsidi" min="0" step="0.01"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500" required>
            </div>

            {{-- Tombol --}}
            <div>
                <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>

    {{-- Tabel Daftar Subsidi --}}
    <div class="bg-white shadow-md rounded-xl overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-50">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Petani</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Kelompok</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Barang</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold text-gray-700">Harga Subsidi / Kg</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold text-gray-700">Jatah Subsidi (Kg)</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach($data as $row)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $row->kelompok->nama_petani }}</td>
                        <td class="px-4 py-3 text-sm text-gray-600">{{ $row->kelompok->kelompok_tani ?? '-' }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $row->barang->nama_barang }}</td>
                        <td class="px-4 py-3 text-center">
                            <span class="inline-block px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">
                                Rp {{ number_format($row->harga_subsidi_per_kg, 2, ',', '.') }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <span class="inline-block px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                {{ number_format($row->jatah_subsidi, 2, ',', '.') }} Kg
                            </span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <form action="{{ route('subsidi-barang.destroy', $row->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-600 hover:text-red-800 text-sm font-medium">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if($data->isEmpty())
                    <tr>
                        <td colspan="6" class="px-4 py-4 text-center text-gray-500">Belum ada data subsidi.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
