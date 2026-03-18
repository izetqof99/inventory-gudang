@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6">Tambah Supplier</h1>
    <form action="{{ route('supplier.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-700">Nama Perusahaan</label>
            <input type="text" name="supplier" value="{{ old('supplier') }}" 
                   class="w-full mt-1 border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            @error('supplier')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700">Alamat</label>
            <textarea name="alamat" rows="3" 
                      class="w-full mt-1 border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">{{ old('alamat') }}</textarea>
            @error('alamat')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('supplier.index') }}" 
               class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</a>
            <button type="submit" 
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection
