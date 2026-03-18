@extends('layouts.app')

@section('content')
<div>
    {{ Breadcrumbs::render('barang-masuk.create') }}
</div>

<div class="p-6 space-y-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Tambah Barang Masuk</h1>
        <p class="text-gray-600">Isi data barang yang masuk ke gudang</p>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 px-4 py-3 rounded-md">
            <ul class="list-disc pl-6 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang-masuk.store') }}" method="POST" class="bg-white p-6 rounded-xl shadow space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Masuk <span class="text-red-500">*</span></label>
            <input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk', now()->toDateString()) }}"
                   class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Barang <span class="text-red-500">*</span></label>
            <select name="barang_id" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}" {{ old('barang_id') == $barang->id ? 'selected' : '' }}>
                        {{ $barang->nama_barang }} ({{ $barang->kode_barang }})
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Masuk <span class="text-red-500">*</span></label>
            <input type="number" name="jumlah_masuk" value="{{ old('jumlah_masuk') }}" min="1"
                   class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Supplier <span class="text-red-500">*</span></label>
            <select name="supplier_id" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="">-- Pilih Supplier --</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->supplier }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-between items-center mt-6">
            <a href="{{ route('barang-masuk.index') }}" class="text-gray-600 hover:underline">← Kembali</a>
            <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
