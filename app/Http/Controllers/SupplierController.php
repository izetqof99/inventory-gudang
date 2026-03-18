<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    public function index()
    {
        return view('supplier.index', [
            'supplier' => Supplier::all()
        ]);
    }

    public function getDataSupplier()
    {
        return response()->json([
            'success' => true,
            'data' => Supplier::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'supplier' => 'required',
            'alamat'   => 'required'
        ], [
            'supplier.required' => 'Form Nama Perusahaan Wajib Di Isi !',
            'alamat.required'   => 'Form Alamat Wajib Diisi'
        ]);

        $supplier = Supplier::create([
            'supplier' => $validated['supplier'],
            'alamat'   => $validated['alamat'],
            'user_id'  => auth()->id()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan !',
            'data'    => $supplier
        ]);
    }

    public function edit(Supplier $supplier)
    {
        return response()->json([
            'success' => true,
            'message' => 'Edit Data Supplier',
            'supplier' => $supplier
        ]);
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'supplier' => 'required',
            'alamat'   => 'required'
        ], [
            'supplier.required' => 'Form Nama Perusahaan Wajib Di Isi !',
            'alamat.required'   => 'Form Alamat Wajib Diisi'
        ]);

        $supplier->update([
            'supplier' => $validated['supplier'],
            'alamat'   => $validated['alamat'],
            'user_id'  => auth()->id()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Terupdate',
            'data'    => $supplier
        ]);
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus'
        ]);
    }
}
