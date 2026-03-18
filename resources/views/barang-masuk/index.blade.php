@extends('layouts.app')

@section('content')
<div>
    {{ Breadcrumbs::render('barang-masuk.index') }}
</div>

<div class="container mx-auto px-4 py-6">
    <!-- Header Section -->
    <div class="bg-blue-600 text-white px-6 py-5 rounded-lg flex justify-between items-center shadow-md">
        <div>
            <h2 class="text-xl font-bold">Data Barang Masuk</h2>
            <p class="text-sm text-blue-100">Kelola barang masuk</p>
        </div>
        <a href="{{ route('barang-masuk.create') }}"
           class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded shadow inline-flex items-center transition">
            <i class="fas fa-plus mr-2"></i> Tambah Barang Masuk
        </a>
    </div>

    <div class="bg-blue-500 mt-6 overflow-x-auto bg-white rounded-xl shadow">
        <table class="min-w-full text-sm text-gray-700">
            <thead class="bg-blue-600 text-left text-xs uppercase font-semibold text-gray-100">
                <tr>
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Kode Transaksi</th>
                    <th class="px-4 py-2">Tanggal</th>
                    <th class="px-4 py-2">Nama Barang</th>
                    <th class="px-4 py-2">Jumlah</th>
                    <th class="px-4 py-2">Supplier</th>
                    <th class="px-4 py-2">User Input</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($barangMasuks as $index => $item)
                <tr>
                    <td class="px-4 py-2">{{ $index + $barangMasuks->firstItem() }}</td>
                    <td class="px-4 py-2 font-semibold">{{ $item->kode_transaksi }}</td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d-m-Y') }}</td>
                    <td class="px-4 py-2">{{ $item->barang->nama_barang ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $item->jumlah_masuk }}</td>
                    <td class="px-4 py-2">{{ $item->supplier->supplier ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $item->user->name ?? '-' }}</td>
                    <td class="px-4 py-2 flex space-x-2">
                        <a href="{{ route('barang-masuk.edit', $item->id) }}" class="text-yellow-500 hover:text-yellow-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-icon lucide-pencil"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/>
                            </svg>
                        </a>
                        <form action="{{ route('barang-masuk.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:text-red-700">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-gray-500 py-4">Belum ada data barang masuk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $barangMasuks->links() }}
    </div>
</div>
@endsection
