@extends('layouts.app')

@section('header', 'Edit Role')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Edit Role</h1>
        <p class="text-gray-500">Perbarui informasi role dan deskripsi di bawah ini.</p>
    </div>

    <!-- Form -->
    <form enctype="multipart/form-data" class="bg-white p-8 rounded-2xl shadow-lg space-y-6 border border-gray-100">
        <input type="hidden" id="role_id">

        <!-- Role -->
        <div>
            <label for="edit_role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
            <input type="text" name="role" id="edit_role" 
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" 
                placeholder="Masukkan nama role">
            <div class="hidden mt-2 text-red-600 text-sm" id="alert-role"></div>
        </div>

        <!-- Deskripsi -->
        <div>
            <label for="edit_deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea name="deskripsi" id="edit_deskripsi" rows="4"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                placeholder="Masukkan deskripsi role"></textarea>
            <div class="hidden mt-2 text-red-600 text-sm" id="alert-deskripsi"></div>
        </div>

        <!-- Buttons -->
        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
            <a href="{{ route('hak-akses.index') }}"
                class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 transition">
                Batal
            </a>
            <button type="button" id="update"
                class="px-5 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
