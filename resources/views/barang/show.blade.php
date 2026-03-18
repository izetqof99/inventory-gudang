@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-md rounded-xl p-6 mt-6">
    <h2 class="text-2xl font-bold text-blue-700 mb-6">Detail Barang</h2>

    <div class="space-y-4">
        <div class="flex justify-between border-b pb-2">
            <span class="font-medium text-gray-600">Kode Barang</span>
            <span class="font-semibold text-gray-800">{{ $barang->kode_barang }}</span>
        </div>

        <div class="flex justify-between border-b pb-2">
            <span class="font-medium text-gray-600">Nama Barang</span>
            <span class="font-semibold text-gray-800">{{ $barang->nama_barang }}</span>
        </div>

        <div class="flex justify-between border-b pb-2">
            <span class="font-medium text-gray-600">Deskripsi</span>
            <span class="text-gray-700 text-right">{{ $barang->deskripsi }}</span>
        </div>

        <div class="flex justify-between border-b pb-2">
            <span class="font-medium text-gray-600">Stok Minimum</span>
            <span class="font-semibold text-gray-800">{{ $barang->stok_minimum }}</span>
        </div>

        <div class="flex justify-between border-b pb-2">
            <span class="font-medium text-gray-600">Jenis</span>
            <span class="font-semibold text-gray-800">{{ $barang->jenis->nama_jenis }}</span>
        </div>

        <div class="flex justify-between">
            <span class="font-medium text-gray-600">Satuan</span>
            <span class="font-semibold text-gray-800">{{ $barang->satuan->nama_satuan }}</span>
        </div>
    </div>

    <div class="mt-8 text-right">
        <a href="{{ route('barang.index') }}"
           class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>
@endsection
