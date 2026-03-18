@extends('layouts.app')

@section('content')
<div class="p-6 max-w-lg mx-auto bg-white rounded shadow">
    <h1 class="text-xl font-bold mb-4">Edit Satuan Barang</h1>

    <form action="{{ route('satuan-barang.update', $satuan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="satuan" class="block text-sm font-medium text-gray-700">Nama Satuan</label>
            <input type="text" name="satuan" id="satuan" value="{{ $satuan->satuan }}" class="mt-1 block w-full border border-gray-300 rounded p-2 shadow-sm" required>
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('satuan-barang.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
        </div>
    </form>
</div>
@endsection
