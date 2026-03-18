@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-6">
    <div class="bg-white shadow-x1 rounded-xl overflow-hidden">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Tambah Role Baru</h1>
        <p class="text-sm text-gray-500 mb-6">Silakan isi data role dengan lengkap dan jelas.</p>

        @if(session('success'))
            <div class="mb-4 p-4 rounded-md border border-green-300 bg-green-50 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 p-4 rounded-md border border-red-300 bg-red-50 text-red-700">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('hak-akses.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Role -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Role <span class="text-red-500">*</span></label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                       placeholder="Misal: Admin, Manager"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition @error('name') border-red-300 @enderror"
                       required>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Role</label>
                <textarea id="deskripsi" name="deskripsi" rows="4"
                          placeholder="Opsional: deskripsikan fungsi role ini"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition @error('deskripsi') border-red-300 @enderror">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between pt-2">
                <a href="{{ route('hak-akses.index') }}" 
                   class="text-sm px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition">
                    Batal
                </a>
                <button type="submit"
                        class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                    Simpan Role
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
