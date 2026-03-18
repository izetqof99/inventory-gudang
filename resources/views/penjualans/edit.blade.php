@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-8">
    <h2 class="text-xl font-bold mb-4">Edit Penjualan</h2>

    <form action="{{ route('penjualans.update', $penjualan->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="kode_penjualan" class="block font-medium">Kode Penjualan</label>
            <input type="text" name="kode_penjualan" id="kode_penjualan" class="w-full border rounded px-3 py-2"
                value="{{ old('kode_penjualan', $penjualan->kode_penjualan) }}">
        </div>

        <div>
            <label for="tanggal" class="block font-medium">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="w-full border rounded px-3 py-2"
                value="{{ old('tanggal', $penjualan->tanggal) }}">
        </div>

        <div>
            <label for="total" class="block font-medium">Total</label>
            <input type="number" name="total" id="total" class="w-full border rounded px-3 py-2"
                value="{{ old('total', $penjualan->total) }}">
        </div>

        <div>
            <label for="bayar" class="block font-medium">Bayar</label>
            <input type="number" name="bayar" id="bayar" class="w-full border rounded px-3 py-2"
                value="{{ old('bayar', $penjualan->bayar) }}">
        </div>

        <div>
            <label for="kembali" class="block font-medium">Kembali</label>
            <input type="number" name="kembali" id="kembali" class="w-full border rounded px-3 py-2"
                value="{{ old('kembali', $penjualan->kembali) }}">
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Update
        </button>
    </form>
</div>
@endsection
