@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Data Penjualan</h1>
            <p class="text-sm text-gray-500">Semua transaksi penjualan tercatat di bawah ini.</p>
        </div>
        
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-xl overflow-x-auto">
        <table class="min-w-full table-auto divide-y divide-gray-200">
            <thead class="bg-blue-500">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-200 uppercase tracking-wider">Kode</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-200 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-200 uppercase tracking-wider">Total</th>
                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-200 uppercase tracking-wider">Bayar</th>
                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-200 uppercase tracking-wider">Kembali</th>
                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-200 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($penjualans as $p)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-3 text-sm font-medium text-gray-900">{{ $p->kode_penjualan }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700">{{ \Carbon\Carbon::parse($p->tanggal)->format('d M Y') }}</td>
                        <td class="px-6 py-3 text-sm text-right text-gray-800">Rp {{ number_format($p->total, 0, ',', '.') }}</td>
                        <td class="px-6 py-3 text-sm text-right text-gray-800">Rp {{ number_format($p->bayar, 0, ',', '.') }}</td>
                        <td class="px-6 py-3 text-sm text-right text-gray-800">Rp {{ number_format($p->kembali, 0, ',', '.') }}</td>
                        <td class="px-6 py-3 text-sm text-center space-x-2">
                            <a href="{{ route('penjualans.edit', $p->id) }}"
                               class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('penjualans.destroy', $p->id) }}"
                                  method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada data penjualan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
