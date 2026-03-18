<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jenis-barang.index', [
            'jenisBarangs' => Jenis::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis-barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_barang' => 'required'
        ], [
            'jenis_barang.required' => 'Form Jenis Barang Wajib Di Isi !'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Jenis::create([
            'jenis_barang' => $request->jenis_barang,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('jenis-barang.index')->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jenis = Jenis::findOrFail($id);
        return view('jenis-barang.edit', compact('jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $jenis = Jenis::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'jenis_barang' => 'required'
        ], [
            'jenis_barang.required' => 'Form Jenis Barang Tidak Boleh Kosong'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $jenis->update([
            'jenis_barang' => $request->jenis_barang,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('jenis-barang.index')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jenis = Jenis::findOrFail($id);
        $jenis->delete();

        return redirect()->route('jenis-barang.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
