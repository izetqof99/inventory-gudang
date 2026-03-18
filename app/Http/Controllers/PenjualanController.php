<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::latest()->paginate(10); // bisa diganti dengan all() kalau tidak ingin paginate
        return view('penjualans.index', compact('penjualans'));
    }

    public function create()
    {
        return view('penjualans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_penjualan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'customer_id' => 'nullable|integer',
            'kelompok_id' => 'nullable|integer',
            'total' => 'required|numeric',
            'bayar' => 'required|numeric',
            'kembali' => 'required|numeric',
        ]);

        Penjualan::create($request->all());

        return redirect()->route('penjualans.index')->with('success', 'Penjualan berhasil ditambahkan.');
    }

    public function show(Penjualan $penjualan)
    {
        return view('penjualans.show', compact('penjualan'));
    }

    public function edit(Penjualan $penjualan)
    {
        return view('penjualans.edit', compact('penjualan'));
    }

    public function update(Request $request, Penjualan $penjualan)
    {
        $request->validate([
            'kode_penjualan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'customer_id' => 'nullable|integer',
            'kelompok_id' => 'nullable|integer',
            'total' => 'required|numeric',
            'bayar' => 'required|numeric',
            'kembali' => 'required|numeric',
        ]);

        $penjualan->update($request->all());

        return redirect()->route('penjualans.index')->with('success', 'Penjualan berhasil diperbarui.');
    }

    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();

        return redirect()->route('penjualans.index')->with('success', 'Penjualan berhasil dihapus.');
    }
}
