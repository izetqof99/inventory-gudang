@extends('layouts.app')

@section('content')

<div>
    {{ Breadcrumbs::render('kelompok-petani.create') }}
</div>

<div class="p-6 space-y-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Tambah Kelompok</h1>
        <p class="text-gray-600">Isi data petani dan lahan yang ingin disubsidi</p>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded-md">
            <ul class="list-disc pl-6 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kelompok-petani.store') }}" method="POST" class="space-y-6 bg-white p-6 rounded-xl shadow">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Petani <span class="text-red-500">*</span></label>
            <input type="text" name="nama_petani" value="{{ old('nama_petani') }}"
                   class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kelompok Tani</label>
            <input type="text" name="kelompok_tani" value="{{ old('kelompok_tani') }}"
                   class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Luas Lahan (ha) <span class="text-red-500">*</span></label>
            <input type="number" name="luas_lahan" value="{{ old('luas_lahan') }}" step="0.01" min="0"
                   class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="flex justify-between mt-6">
            <a href="{{ route('kelompok-petani.index') }}" class="text-gray-600 hover:underline">← Kembali</a>
            <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
