@extends('layouts.app')

@section('header', 'Tambah User')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-3xl p-8 transition hover:shadow-xl">
    <div class="flex items-center gap-3 mb-6">
        <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-8V7a1 1 0 10-2 0v3H6a1 1 0 000 2h3v3a1 1 0 102 0v-3h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
        </svg>
        <h1 class="text-2xl font-bold text-gray-800">Tambah User Baru</h1>
    </div>

    @if ($errors->any())
    <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-xl">
        <ul class="list-disc pl-5 text-sm text-red-700 space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
        @csrf

        {{-- Nama --}}
        <div>
            <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15.75 6.75a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 1115 0H4.5z"/>
                    </svg>
                </span>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="w-full pl-10 pr-4 py-3 border border-blue-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm transition"
                    placeholder="Masukkan nama lengkap">
            </div>
        </div>

        {{-- Username --}}
        <div>
            <label for="username" class="block text-sm font-semibold text-gray-700 mb-1">Username</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25H4.5a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0L12 13.5 2.25 6.75"/>
                    </svg>
                </span>
                <input type="username" name="username" id="username" value="{{ old('username') }}"
                    class="w-full pl-10 pr-4 py-3 border border-blue-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm transition"
                    placeholder="Masukkan username">
            </div>
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25H4.5a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0L12 13.5 2.25 6.75"/>
                    </svg>
                </span>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="w-full pl-10 pr-4 py-3 border border-blue-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm transition"
                    placeholder="Masukkan Email">
            </div>
        </div>

        {{-- Password --}}
        <div>
            <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16.5 10.5v-3a4.5 4.5 0 00-9 0v3m-.75 0h10.5a.75.75 0 01.75.75v7.5a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75v-7.5a.75.75 0 01.75-.75z"/>
                    </svg>
                </span>
                <input type="password" name="password" id="password"
                    class="w-full pl-10 pr-4 py-3 border border-blue-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm transition"
                    placeholder="Minimal 8 karakter">
            </div>
        </div>

        {{-- Konfirmasi --}}
        <div>
            <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-1">Konfirmasi Password</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16.5 10.5v-3a4.5 4.5 0 00-9 0v3m-.75 0h10.5a.75.75 0 01.75.75v7.5a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75v-7.5a.75.75 0 01.75-.75z"/>
                    </svg>
                </span>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full pl-10 pr-4 py-3 border border-blue-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm transition"
                    placeholder="Ulangi password">
            </div>
        </div>

        {{-- Role --}}
        <div>
            <label for="role_id" class="block text-sm font-semibold text-gray-700 mb-1">Role</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16 7a4 4 0 01-8 0M4 21v-2a4 4 0 014-4h8a4 4 0 014 4v2"/>
                    </svg>
                </span>
                <select name="role_id" id="role_id"
                    class="w-full pl-10 pr-4 py-3 border border-blue-200 rounded-xl bg-white focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm transition">
                    <option value="">-- Pilih Role --</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                            {{ ucfirst($role->name) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end pt-4">
            <button type="submit"
                class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white text-sm font-semibold rounded-xl hover:bg-blue-700 transition shadow">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4.5 12.75l6 6 9-13.5"/>
                </svg>
                Simpan User
            </button>
        </div>
    </form>
</div>
@endsection
