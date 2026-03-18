@extends('layouts.app')

@section('content')
<div class="p-6 space-y-6">
    <h2 class="text-xl font-bold">Log Aktivitas</h2>

    {{-- Form penghapusan log lama --}}
    <form method="POST" action="{{ route('activity-log.clear') }}" class="flex items-center gap-4 mb-4">
        @csrf
        <label for="days" class="font-medium">Hapus log lebih dari</label>
        <input type="number" name="days" id="days" min="1" required class="border px-3 py-1 rounded-md w-24" value="30">
        <span>hari</span>
        <button type="submit" class="bg-red-600 text-white px-4 py-1 rounded-md hover:bg-red-700 transition">
            Hapus
        </button>
    </form>

    {{-- Tampilkan pesan sukses --}}
    @if(session('success'))
    <div class="bg-green-100 text-green-800 px-4 py-2 rounded-md">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto border rounded-md">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-blue-600 text-white">
                    <th class="px-4 py-2 border">Waktu</th>
                    <th class="px-4 py-2 border">User</th>
                    <th class="px-4 py-2 border">Deskripsi</th>
                    <th class="px-4 py-2 border">Model</th>
                </tr>
            </thead>
            <tbody>
                @forelse($activities as $activity)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $activity->created_at }}</td>
                    <td class="px-4 py-2 border">{{ $activity->causer?->name ?? '-' }}</td>
                    <td class="px-4 py-2 border">{{ $activity->description }}</td>
                    <td class="px-4 py-2 border">{{ class_basename($activity->subject_type) }} (ID: {{ $activity->subject_id }})</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-gray-500">Tidak ada data log aktivitas.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection