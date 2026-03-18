@extends('layouts.app')

@section('content')
<div class="p-6 max-w-xl mx-auto">
    <h1 class="text-xl font-bold mb-4">Edit Jenis Barang</h1>

    <form action="{{ route('jenis-barang.update', $jenis->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="jenis_barang" class="block text-sm font-medium text-gray-700">Jenis Barang</label>
            <input type="text" name="jenis_barang" id="jenis_barang" value="{{ $jenis->jenis_barang }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2 shadow-sm" required>
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('jenis-barang.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
        </div>
    </form>
</div>
@endsection
