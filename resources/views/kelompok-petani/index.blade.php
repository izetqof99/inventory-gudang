@extends('layouts.app')

@section('content')

<div>
    {{ Breadcrumbs::render('kelompok-petani.index') }}
</div>

<div class="p-6 space-y-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Manajemen Kelompok Tani</h1>
        <p class="text-gray-600">Mengelola data Kelompok Tani Yang terdaftar subsidi</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="bg-white rounded-xl border p-4 flex items-center gap-4 shadow">
            <div class="text-blue-600">
                <i class="fas fa-users text-2xl"></i>
            </div>
            <div>
                <div class="text-sm text-gray-600">Total Petani</div>
                <div class="text-lg font-semibold">{{ $data->count() }}</div>
            </div>
        </div>
        <div class="bg-white rounded-xl border p-4 flex items-center gap-4 shadow">
            <div class="text-green-600">
                <i class="fas fa-leaf text-2xl"></i>
            </div>
            <div>
                <div class="text-sm text-gray-600">Lahan Tercatat</div>
                <div class="text-lg font-semibold">{{ number_format($data->sum('luas_lahan'), 2) }} ha</div>
            </div>
        </div>
        <div class="bg-white rounded-xl border p-4 flex items-center gap-4 shadow">
            <div class="text-purple-600">
                <i class="fas fa-people-group text-2xl"></i>
            </div>
            <div>
                <div class="text-sm text-gray-600">Kelompok Tani</div>
                <div class="text-lg font-semibold">{{ $data->whereNotNull('kelompok_tani')->unique('kelompok_tani')->count() }}</div>
            </div>
        </div>
    </div>

    <div class="flex justify-end">
        <a href="{{ route('kelompok-petani.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
            + Tambah Petani
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-blue-300 rounded-xl overflow-hidden">
            <thead class="bg-blue-100 text-left text-sm font-medium text-gray-700">
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Nama Petani</th>
                    <th class="px-4 py-2">Kelompok Tani</th>
                    <th class="px-4 py-2">Luas Lahan (ha)</th>
                    <th class="px-4 py-2">Tanggal</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 text-sm">
                @forelse ($data as $i => $item)
                <tr>
                    <td class="px-4 py-2">{{ $i + 1 }}</td>
                    <td class="px-4 py-2 font-semibold text-gray-800">{{ $item->nama_petani }}</td>
                    <td class="px-4 py-2">{{ $item->kelompok_tani ?? '-' }}</td>
                    <td class="px-4 py-2">{{ number_format($item->luas_lahan, 2) }}</td>
                    <td class="px-4 py-2">{{ $item->created_at->format('d-m-Y') }}</td>
                    <td class="px-4 py-2 flex items-center gap-2">
                        <a href="{{ route('kelompok-petani.edit', $item->id) }}" class="text-yellow-500 hover:text-yellow-600">
                            <i class="fas fa-pen"></i>
                        </a>
                        <form action="{{ route('kelompok-petani.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
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
                    <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data kelompok.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
