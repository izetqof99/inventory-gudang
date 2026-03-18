<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kelompok;
use App\Models\SubsidiBarang;

class SubsidiBarangController extends Controller
{
    /**
     * Daftar subsidi barang
     */
    public function index()
    {
        $kelompokList = Kelompok::all();
        $barangList   = Barang::all();

        $data = SubsidiBarang::with(['kelompok', 'barang'])
            ->join('kelompok', 'kelompok.id', '=', 'subsidi_barang.kelompok_id')
            ->select('subsidi_barang.*')
            ->orderBy('kelompok.nama_petani', 'asc')
            ->get();

        return view('subsidi-barang.index', compact('kelompokList', 'barangList', 'data'));
    }

    /**
     * Simpan atau perbarui subsidi
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kelompok_id'          => 'required|exists:kelompok,id',
            'barang_id'            => 'required|exists:barangs,id',
            'harga_subsidi_per_kg' => 'required|numeric|min:0',
            'jatah_subsidi'        => 'required|numeric|min:0',
        ]);

        SubsidiBarang::updateOrCreate(
            [
                'kelompok_id' => $validated['kelompok_id'],
                'barang_id'   => $validated['barang_id'],
            ],
            [
                'harga_subsidi_per_kg' => $validated['harga_subsidi_per_kg'],
                'jatah_subsidi'        => $validated['jatah_subsidi'],
            ]
        );

        return back()->with('success', 'Subsidi berhasil disimpan / diperbarui.');
    }

    /**
     * Hapus subsidi
     */
    public function destroy($id)
    {
        SubsidiBarang::findOrFail($id)->delete();
        return back()->with('success', 'Data subsidi berhasil dihapus.');
    }
}
