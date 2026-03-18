@extends('layouts.app') <!-- Pastikan layout ini ada -->

@section('title', 'Edit Kelompok Tani')

@section('content')
<div class="max-w-3xl mx-auto mt-10">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Data Kelompok Tani</h2>

        @if ($errors->any())
            <div class="mb-4">
                <ul class="bg-red-100 text-red-600 p-4 rounded">
                    @foreach ($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('kelompok-petani.update', $kelompok->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nama Petani -->
            <div class="mb-4">
                <label for="nama_petani" class="block text-gray-700 font-medium">Nama Petani</label>
                <input type="text" name="nama_petani" id="nama_petani"
                    value="{{ old('nama_petani', $kelompok->nama_petani) }}"
                    class="w-full mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Kelompok Tani -->
            <div class="mb-4">
                <label for="kelompok_tani" class="block text-gray-700 font-medium">Kelompok Tani</label>
                <input type="text" name="kelompok_tani" id="kelompok_tani"
                    value="{{ old('kelompok_tani', $kelompok->kelompok_tani) }}"
                    class="w-full mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Luas Lahan -->
            <div class="mb-4">
                <label for="luas_lahan" class="block text-gray-700 font-medium">Luas Lahan (m²)</label>
                <input type="number" step="0.01" name="luas_lahan" id="luas_lahan"
                    value="{{ old('luas_lahan', $kelompok->luas_lahan) }}"
                    class="w-full mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>


            <!-- Tombol -->
            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('kelompok-petani.index') }}"
                   class="text-gray-600 hover:text-gray-800 transition">← Kembali</a>
                
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow-md transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
