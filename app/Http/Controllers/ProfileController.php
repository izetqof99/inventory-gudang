<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $roles = \App\Models\Role::all(); // jika ingin bisa ubah role
        return view('profile.edit', compact('user', 'roles'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'role_id' => ['sometimes', 'exists:roles,id'], // hanya admin boleh ubah
            'password' => ['nullable', 'min:6'],
        ]);

        $user->name = $validated['name'];
        $user->username = $validated['username'];

        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }

        // Ubah role jika admin dan ada input role
        if (auth()->user()->role->name === 'admin' && $request->filled('role_id')) {
            $user->role_id = $validated['role_id'];
        }

        $user->save();

        return redirect()->route('profile.edit')->with('status', 'Profil berhasil diperbarui.');
    }
}
