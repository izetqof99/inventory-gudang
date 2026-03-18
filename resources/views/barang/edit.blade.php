@extends('layouts.app')

@section('content')
<div class="w-full bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-4">Edit Barang</h2>

    <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium mb-1">Nama Barang</label>
            <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" class="w-full border-gray-300 rounded shadow-sm" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Stok Minimum</label>
            <input type="number" name="stok_minimum" value="{{ $barang->stok_minimum }}" class="w-full border-gray-300 rounded shadow-sm" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Jenis Barang</label>
            <select name="jenis_id" class="w-full border-gray-300 rounded shadow-sm" required>
                @foreach($jenis_barangs as $jenis)
                <option value="{{ $jenis->id }}" {{ $barang->jenis_id == $jenis->id ? 'selected' : '' }}>{{ $jenis->jenis_barang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Satuan</label>
            <select name="satuan_id" class="w-full border-gray-300 rounded shadow-sm" required>
                @foreach($satuans as $satuan)
                <option value="{{ $satuan->id }}" {{ $barang->satuan_id == $satuan->id ? 'selected' : '' }}>{{ $satuan->satuan }}</option>
                @endforeach
            </select>
        </div>

        <!-- Berat per Sak -->
        <div class="mb-4">
            <label for="berat" class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-weight text-blue-500 mr-2"></i>Berat per Sak (Kg)
                <span class="text-red-500">*</span>
            </label>
            <input type="number" name="berat" id="berat" step="0.01" min="0.01"
                class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:border-blue-500"
                value="{{ old('berat', $barang->berat) }}" placeholder="Contoh: 50">
            @error('berat')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Harga</label>
            <input type="number" name="harga" step="0.01"
                class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:border-blue-500"
                value="{{ old('harga', $barang->harga ?? '') }}" placeholder="Masukkan harga barang">
            @error('harga')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
