@extends('layouts.app')

@section('header', 'Jenis Barang')

@section('content')

<div>
    {{ Breadcrumbs::render('jenis-barang.index') }}
</div>

<div class="container mx-auto px-4 py-6">
    <!-- Header Section -->
    <div class="bg-blue-600 text-white px-6 py-5 rounded-lg flex justify-between items-center shadow-md">
        <div>
            <h2 class="text-xl font-bold">Data Jenis Barang</h2>
            <p class="text-sm text-blue-100">Kelola jenis barang dalam sistem</p>
        </div>
        <a href="{{ route('jenis-barang.create') }}"
           class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded shadow inline-flex items-center transition">
            <i class="fas fa-plus mr-2"></i> Tambah Jenis
        </a>
    </div>

    <!-- Table Section -->
    <div class="bg-white mt-6 rounded-lg shadow overflow-x-auto border border-blue-300 rounded-xl">
        <table class="min-w-full text-sm divide-y divide-blue-300"">
            <thead class="bg-blue-50 text-blue-600 uppercase text-left border-b">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Nama Jenis</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($jenisBarangs as $index => $jenis)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                    <td class="px-6 py-4">{{ $jenis->jenis_barang }}</td>
                    <td class="px-6 py-4 text-center">
                        <div class="inline-flex gap-2">
                            <a href="{{ route('jenis-barang.edit', $jenis->id) }}"
                               class="px-3 py-1 text-sm bg-blue-100 text-blue-600 rounded-full hover:bg-blue-200">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>
                            <form action="{{ route('jenis-barang.destroy', $jenis->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1 text-sm bg-red-100 text-red-600 rounded-full hover:bg-red-200">
                                    <i class="fas fa-trash mr-1"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center px-6 py-6 text-gray-500">Belum ada data jenis barang.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Flash messages -->
@if(session('success'))
<div id="success-message" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
    <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
</div>
@endif

@if(session('error'))
<div id="error-message" class="fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
    <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
</div>
@endif

<script>
    setTimeout(() => {
        const msg = document.getElementById('success-message');
        const err = document.getElementById('error-message');
        if (msg) msg.style.display = 'none';
        if (err) err.style.display = 'none';
    }, 3000);
</script>
@endsection
