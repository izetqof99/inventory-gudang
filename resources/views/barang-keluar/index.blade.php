@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">

    <!-- Header -->
    <div class="bg-blue-600 text-white px-6 py-5 rounded-lg flex justify-between items-center shadow-md">
        <div>
            <h2 class="text-xl font-bold">Data Barang Keluar</h2>
            <p class="text-sm text-blue-100">Kelola barang keluar</p>
        </div>
        <!-- <a href="{{ route('barang-keluar.create') }}" -->
           <!-- class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded shadow inline-flex items-center transition"> -->
            <!-- <i class="fas fa-plus mr-2"></i> Tambah Barang Keluar -->
        <!-- </a> -->
    </div>

    <!-- Table -->
    <div class="bg-white mt-6 shadow-lg rounded-xl overflow-x-auto">
        <table class="min-w-full divide-y divide-blue-600">
            <thead class="bg-blue-600">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-100 uppercase">#</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-100 uppercase">Kode Transaksi</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-100 uppercase">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-100 uppercase">Nama Barang</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-100 uppercase">Jumlah</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-100 uppercase">Nama Petani</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-100 uppercase">Kelompok Tani</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-100 uppercase">User</th>
                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-100 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($barangKeluars as $barangKeluar)
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-800">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $barangKeluar->kode_transaksi }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ \Carbon\Carbon::parse($barangKeluar->tanggal_keluar)->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $barangKeluar->nama_barang }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        <span class="inline-flex items-center px-2 py-1 rounded-full bg-blue-400 text-gray-100">
                            {{ $barangKeluar->jumlah_keluar }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ $barangKeluar->kelompok->nama_petani ?? '-' }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ $barangKeluar->kelompok->kelompok_tani ?? '-' }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ $barangKeluar->user->name ?? '-' }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center space-x-2">
                            <a href="{{ route('barang-keluar.show', $barangKeluar->id) }}" 
                               class="text-blue-600 hover:text-blue-900" title="Lihat">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" 
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" 
                                          d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </a>
                            <a href="{{ route('barang-keluar.edit', $barangKeluar->id) }}" 
                               class="text-green-600 hover:text-green-900" title="Edit">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" 
                                          d="M11 5h2M5 20h14M12 17l4-4-4-4-4 4 4 4z"/>
                                </svg>
                            </a>
                            <form action="{{ route('barang-keluar.destroy', $barangKeluar->id) }}" method="POST" 
                                  onsubmit="return confirm('Yakin ingin hapus data ini?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" title="Hapus">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" 
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" 
                                              d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="px-6 py-4 text-center text-gray-500">
                        Tidak ada data barang keluar.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
