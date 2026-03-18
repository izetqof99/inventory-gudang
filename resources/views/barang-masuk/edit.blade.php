@extends('layouts.app')

@section('content')
<div class="p-6 space-y-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Edit Barang Masuk</h1>
        <p class="text-gray-600">Perbarui data barang masuk berikut</p>
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

    <form action="{{ route('barang-masuk.update', $barangMasuk->id) }}" method="POST" class="bg-white p-6 rounded-xl shadow space-y-6">
        @csrf
        @method('PUT')

        

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Masuk <span class="text-red-500">*</span></label>
            <input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk', $barangMasuk->tanggal_masuk) }}"
                   class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Barang</label>
            <select name="barang_id"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                <option value="">-- Pilih Barang --</option>
                @foreach ($barangs as $barang)
                    <option value="{{ $barang->id }}"
                        {{ old('barang_id', $barangMasuk->barang_id) == $barang->id ? 'selected' : '' }}>
                        {{ $barang->nama_barang }}
                    </option>
                @endforeach
            </select>
            @error('barang_id')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Masuk <span class="text-red-500">*</span></label>
            <input type="number" name="jumlah_masuk" value="{{ old('jumlah_masuk', $barangMasuk->jumlah_masuk) }}" min="1"
                   class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Supplier <span class="text-red-500">*</span></label>
            <select name="supplier_id" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="">-- Pilih Supplier --</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ old('supplier_id', $barangMasuk->supplier_id) == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->supplier }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-between items-center mt-6">
            <a href="{{ route('barang-masuk.index') }}" class="text-gray-600 hover:underline">← Kembali</a>
            <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700">
                Perbarui
            </button>
        </div>
    </form>
</div>
@endsection
