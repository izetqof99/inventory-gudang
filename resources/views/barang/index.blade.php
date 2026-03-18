@extends('layouts.app')

@section('header', 'Data Barang')

@section('content')
<div>
    {{ Breadcrumbs::render('barang.index') }}
</div>

<!-- ✅ Modal peringatan stok minimum -->
@if(!empty($stokMinimumItems) && count($stokMinimumItems) > 0)
<div
    x-data="{ open: true }"
    x-init="setTimeout(() => open = false, 5000)"
    x-show="open"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-2"
    class="fixed top-4 right-4 w-80 bg-yellow-100 border border-yellow-400 text-yellow-800 px-4 py-3 rounded shadow z-50"
>
    <div class="flex items-start gap-2">
        <div class="pt-1">
            <i class="fas fa-exclamation-triangle text-yellow-600"></i>
        </div>
        <div class="flex-1">
            <h2 class="font-semibold mb-1">Barang dengan Stok Minimum</h2>
            <ul class="list-disc list-inside text-sm max-h-32 overflow-y-auto">
                @foreach($stokMinimumItems as $item)
                    <li><strong>{{ $item->nama_barang }}</strong>: {{ $item->stok_transaksi }} unit</li>
                @endforeach
            </ul>
        </div>
        <button @click="open = false" class="text-yellow-600 hover:text-yellow-800">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>
@endif

<div class="container mx-auto px-4 py-6">
    <div class="bg-white shadow-xl rounded-xl overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-5">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-white">Data Barang</h1>
                    <p class="text-blue-100 mt-1">Kelola data barang dalam sistem inventory</p>
                </div>
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('barang.create') }}"
                       class="inline-flex items-center gap-2 bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-blue-50 transition shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Barang
                    </a>
                    <a href="{{ route('barang.sync-stok') }}"
                       onclick="return confirm('Yakin sync stok sesuai transaksi?')"
                       class="inline-flex items-center gap-2 bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        <i class="fas fa-sync-alt"></i>
                        Sync Stok
                    </a>
                </div>
            </div>
        </div>

        <div class="p-6">
            @if($barangs->count() > 0)
                <!-- Stats -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    @php
                        $stats = [
                            ['color' => 'blue', 'icon' => 'fa-boxes', 'label' => 'Total Barang', 'value' => $barangs->count()],
                            ['color' => 'green', 'icon' => 'fa-check-circle', 'label' => 'Stok Tersedia',
                             'value' => $barangs->filter(fn($b) => ($b->stok ?? 0) >= 5)->count()],
                            ['color' => 'yellow', 'icon' => 'fa-exclamation-triangle', 'label' => 'Stok Minimum',
                             'value' => $barangs->filter(fn($b) => ($b->stok ?? 0) > 0 && ($b->stok ?? 0) < 5)->count()],
                        ];
                    @endphp
                    @foreach ($stats as $stat)
                        <div class="bg-{{ $stat['color'] }}-50 border border-{{ $stat['color'] }}-200 rounded-lg p-4">
                            <div class="flex items-center">
                                <div class="p-3 bg-{{ $stat['color'] }}-500 rounded-full">
                                    <i class="fas {{ $stat['icon'] }} text-white"></i>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-{{ $stat['color'] }}-600">{{ $stat['label'] }}</p>
                                    <p class="text-2xl font-bold text-{{ $stat['color'] }}-900">{{ $stat['value'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Search & Filter -->
                <div class="mb-6 flex flex-col sm:flex-row gap-4">
                    <div class="flex-1 relative">
                        <input type="text" id="searchInput" placeholder="Cari barang..."
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                    </div>
                    <select id="statusFilter"
                            class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Semua Status</option>
                        <option value="tersedia">Stok Tersedia</option>
                        <option value="minimum">Stok Minimum</option>
                        <option value="habis">Stok Habis</option>
                    </select>
                </div>

                <!-- Table -->
                <div class="bg-white shadow rounded-lg overflow-x-auto border border-blue-300 rounded-xl">
                <table class="min-w-full divide-y divide-blue-300">
                    <thead class="bg-blue-500">
                        <tr>
                            <th class="w-10 text-center text-xs text-white uppercase px-2 py-3">No</th>
                            <th class="text-left text-xs text-white uppercase px-4 py-3">Kode Barang</th>
                            <th class="text-left text-xs text-white uppercase px-4 py-3">Nama Barang</th>
                            <th class="w-28 text-right text-xs text-white uppercase px-4 py-3">Harga</th>
                            <th class="w-28 text-center text-xs text-white uppercase px-4 py-3">Kuantitas</th>
                            <th class="w-32 text-center text-xs text-white uppercase px-4 py-3">Stok</th>
                            <th class="w-24 text-center text-xs text-white uppercase px-4 py-3">Status</th>
                            <th class="w-20 text-center text-xs text-white uppercase px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="tableBody">
                        @foreach($barangs as $index => $barang)
                        @php
                            $stok = $barang->stok ?? 0;
                            $status = $stok == 0 ? 'habis' : ($stok < $barang->stok_minimum ? 'minimum' : 'tersedia');
                        @endphp
                        <tr class="hover:bg-gray-50"
                            data-search="{{ strtolower($barang->kode_barang . ' ' . $barang->nama_barang) }}"
                            data-status="{{ $status }}">
                            <td class="text-center text-sm text-gray-800">{{ $index + 1 }}</td>
                            <td class="text-sm text-gray-900 whitespace-nowrap px-4 py-2">{{ $barang->kode_barang }}</td>
                            <td class="text-sm text-gray-900 px-4 py-2">{{ $barang->nama_barang }}</td>
                            <td class="text-sm text-gray-900 text-right px-4 py-2">
                                Rp {{ number_format($barang->harga, 0, ',', '.') }}
                            </td>
                            <td class="text-center text-sm text-gray-900 px-4 py-2">
                                {{ number_format($barang->berat, 0) }}
                                <span class="text-xs text-gray-500">{{ $barang->satuan->satuan ?? 'kg' }}</span>
                            </td>
                            <td class="text-center text-sm text-gray-900 px-4 py-2">
                                {{ number_format($stok) }} <span class="text-xs text-gray-500">Unit</span>
                                @if(isset($barang->stok_transaksi) && $barang->stok !== $barang->stok_transaksi)
                                    <div class="text-xs text-red-600">Audit: {{ number_format($barang->stok_transaksi) }} Unit</div>
                                @endif
                            </td>
                            <td class="text-center px-4 py-2">
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                                    {{ $stok == 0 ? 'bg-red-100 text-red-800' : ($stok < 5 ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800') }}">
                                    {{ ucfirst($status) }}
                                </span>
                            </td>
                            <td class="text-center px-4 py-2">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('barang.show', $barang->id) }}" title="Lihat"
                                    class="text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('barang.edit', $barang->id) }}" title="Edit"
                                    class="text-yellow-600 hover:text-yellow-800">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('barang.destroy', $barang->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin hapus barang {{ $barang->nama_barang }}?')" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

                @if(method_exists($barangs, 'links'))
                    <div class="mt-6">{{ $barangs->links() }}</div>
                @endif
            @else
                <div class="text-center py-16">
                    <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-boxes text-gray-400 text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-medium text-gray-900 mb-2">Belum ada data barang</h3>
                    <p class="text-gray-500 mb-8 max-w-sm mx-auto">
                        Tambahkan barang pertama ke sistem inventory Anda.
                    </p>
                    <a href="{{ route('barang.create') }}"
                       class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition shadow">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Barang
                    </a>
                    <a href="{{ route('barang.sync-stok') }}"
                       onclick="return confirm('Yakin sync stok sesuai transaksi?')"
                       class="inline-flex items-center gap-2 bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition shadow-md hover:shadow-lg transform hover:-translate-y-0.5 mt-4">
                        <i class="fas fa-sync-alt"></i>
                        Sync Stok
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- ✅ Filter table JS -->
<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    const term = this.value.toLowerCase();
    document.querySelectorAll('#tableBody tr').forEach(row => {
        row.style.display = row.getAttribute('data-search').includes(term) ? '' : 'none';
    });
});
document.getElementById('statusFilter').addEventListener('change', function() {
    const val = this.value;
    document.querySelectorAll('#tableBody tr').forEach(row => {
        row.style.display = val === '' || row.getAttribute('data-status') === val ? '' : 'none';
    });
});
</script>

<!-- ✅ Alpine.js -->
<script src="{{ asset('js/alpine.min.js') }}" defer></script>
@endsection
