<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use Illuminate\Http\Request;

class KelompokController extends Controller
{
    public function index()
    {
        $data = Kelompok::latest()->paginate(10);
        return view('kelompok-petani.index', compact('data'));
    }

    public function create()
    {
        return view('kelompok-petani.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_petani'   => 'required|string|max:100',
            'kelompok_tani' => 'nullable|string|max:100',
            'luas_lahan'    => 'required|numeric|min:0',
        ]);

        Kelompok::create($validated);

        return redirect()->route('kelompok-petani.index')->with('success', 'Data kelompok berhasil ditambahkan.');
    }

    public function show(Kelompok $kelompok)
    {
        return view('kelompok-petani.show', compact('kelompok'));
    }

    public function edit(Kelompok $kelompok)
    {
        return view('kelompok-petani.edit', compact('kelompok'));
    }

    public function update(Request $request, Kelompok $kelompok)
    {
        $validated = $request->validate([
            'nama_petani'   => 'required|string|max:100',
            'kelompok_tani' => 'nullable|string|max:100',
            'luas_lahan'    => 'required|numeric|min:0',
        ]);

        $kelompok->update($validated);

        return redirect()->route('kelompok-petani.index')->with('success', 'Data kelompok berhasil diperbarui.');
    }

    public function destroy(Kelompok $kelompok)
    {
        $kelompok->delete();
        return redirect()->route('kelompok-petani.index')->with('success', 'Data kelompok berhasil dihapus.');
    }
}
