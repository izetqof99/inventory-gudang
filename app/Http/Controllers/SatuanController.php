<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SatuanController extends Controller
{
    /**
     * Tampilkan semua data satuan barang.
     */
    public function index()
    {
        $satuans = Satuan::all();
        return view('satuan-barang.index', compact('satuans'));
    }

    /**
     * Tampilkan form untuk membuat data satuan baru.
     */
    public function create()
    {
        return view('satuan-barang.create');
    }

    /**
     * Simpan data satuan baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'satuan' => 'required'
        ], [
            'satuan.required' => 'Form Satuan Barang Wajib Di Isi !'
        ]);

        Satuan::create([
            'satuan'  => $validated['satuan'],
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('satuan-barang.index')->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Tampilkan form edit untuk satuan tertentu.
     */
    public function edit($id)
    {
        $satuan = Satuan::findOrFail($id);
        return view('satuan-barang.edit', compact('satuan'));
    }

    /**
     * Update data satuan yang sudah ada.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'satuan' => 'required'
        ], [
            'satuan.required' => 'Form Satuan Barang Tidak Boleh Kosong'
        ]);

        $satuan = Satuan::findOrFail($id);
        $satuan->update([
            'satuan'  => $validated['satuan'],
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('satuan-barang.index')->with('success', 'Data Berhasil Diperbarui!');
    }

    /**
     * Hapus satuan dari database.
     */
    public function destroy($id)
    {
        $satuan = Satuan::findOrFail($id);
        $satuan->delete();

        return redirect()->route('satuan-barang.index')->with('success', 'Data Berhasil Dihapus!');
    }

    /**
     * Menampilkan data satuan dalam bentuk JSON (opsional).
     */
    public function getDataSatuanBarang()
    {
        return response()->json([
            'success' => true,
            'data'    => Satuan::all()
        ]);
    }
}
