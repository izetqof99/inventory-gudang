<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HakAksesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $roles = Role::all();

    return view('hak-akses.index', [
        'roles' => $roles,
        'totalRoles' => $roles->count(),
        'activeRoles' => 0, // atau hitungan sesuai logikamu
        'adminRoles' => $roles->where('name', 'admin')->count(), // contoh
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hak-akses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'deskripsi' => 'required'
        ], [
            'name.required'      => 'Form Role Wajib Di Isi !',
            'deskripsi.required' => 'Form Deskripsi Wajib Di Isi !'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Role::create([
            'name'      => $request->name,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('hak-akses.index')->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('hak-akses.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    $role = Role::findOrFail($id);

    $validator = Validator::make($request->all(), [
        'name'      => 'required',
        'deskripsi' => 'required'
    ], [
        'name.required'      => 'Form Role Wajib Di Isi !',
        'deskripsi.required' => 'Form Deskripsi Wajib Di Isi !'
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $role->update([
        'name'      => $request->name,
        'deskripsi' => $request->deskripsi
    ]);

    return redirect()->route('hak-akses.index')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('hak-akses.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
