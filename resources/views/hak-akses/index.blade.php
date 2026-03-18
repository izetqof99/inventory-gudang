@extends('layouts.app')

@section('header', 'Manajemen Role')

@section('content')
<div class="max-w-7xl mx-auto p-6 space-y-8">

    <h1 class="text-2xl font-bold text-gray-800 mb-2">Manajemen Hak Akses</h1>
    <p class="text-gray-500 mb-6">Kelola semua hak akses sistem dalam satu tempat</p>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-2xl p-6 shadow border-l-8 border-blue-500 flex items-center space-x-4">
            <div class="bg-blue-50 p-3 rounded-full text-blue-600">
                <i class="fas fa-users fa-lg"></i>
            </div>
            <div>
                <h3 class="text-xl font-bold text-gray-800">{{ $totalRoles }}</h3>
                <p class="text-gray-500 text-sm">Total Role</p>
            </div>
        </div>
        
        <div class="bg-white rounded-2xl p-6 shadow border-l-8 border-purple-500 flex items-center space-x-4">
            <div class="bg-purple-50 p-3 rounded-full text-purple-600">
                <i class="fas fa-user-shield fa-lg"></i>
            </div>
            <div>
                <h3 class="text-xl font-bold text-gray-800">{{ $adminRoles }}</h3>
                <p class="text-gray-500 text-sm">Admin Role</p>
            </div>
        </div>
    </div>

    <!-- Add Button -->
    <div class="flex justify-end">
        <a href="{{ route('hak-akses.create') }}"
           class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow-md transition transform hover:scale-105">
            <i class="fas fa-plus"></i> Tambah Role
        </a>
    </div>

    <!-- Role Table -->
    <div class="bg-white rounded-2xl shadow border border-gray-200 overflow-hidden mt-6">
        <table class="min-w-full text-sm">
            <thead class="bg-blue-50 text-blue-700">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold uppercase">Role</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase">Deskripsi</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase">Status</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($roles as $role)
                <tr class="even:bg-blue-50/30 hover:bg-blue-50 transition">
                    <td class="px-6 py-4 flex items-center space-x-3">
                        <div class="w-9 h-9 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold">
                            {{ strtoupper(substr($role->name,0,1)) }}
                        </div>
                        <div>
                            <div class="font-semibold text-gray-800">{{ ucfirst($role->name) }}</div>
                            <div class="text-xs text-gray-500">ID: #{{ $role->id }}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $role->deskripsi ?? '-' }}</td>
                    <td class="px-6 py-4">
                        @if($role->active ?? true)
                            <span class="inline-flex px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">Aktif</span>
                        @else
                            <span class="inline-flex px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs">Nonaktif</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 space-x-3">
                        <a href="{{ route('hak-akses.edit', $role->id) }}" class="text-blue-600 hover:text-blue-800" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('hak-akses.destroy', $role->id) }}" method="POST" class="inline-block"
                              onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800" title="Hapus">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">Belum ada data role.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
