<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Barang;
use App\Models\Kelompok;
use App\Models\User;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluars = BarangKeluar::with(['kelompok', 'user', 'barang'])
            ->latest()
            ->get();

        return view('barang-keluar.index', compact('barangKeluars'));
    }

    public function create()
    {
        return view('barang-keluar.create', [
            'kelompok' => Kelompok::all(),
            'barangs'  => Barang::all(),
            'users'    => User::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'barang_id'      => 'required|exists:barangs,id',
            'tanggal_keluar' => 'required|date',
            'jumlah_keluar'  => 'required|integer|min:1',
            'kelompok_id'    => 'nullable|exists:kelompok,id',
            'user_id'        => 'required|exists:users,id',
        ]);

        $barang = Barang::findOrFail($validated['barang_id']);

        // Validasi stok cukup
        if ($barang->stok < $validated['jumlah_keluar']) {
            return back()->withErrors(['jumlah_keluar' => 'Stok barang tidak mencukupi.'])->withInput();
        }

        $namaPembeli = '-';
        if ($validated['kelompok_id']) {
            $kelompok = Kelompok::find($validated['kelompok_id']);
            $namaPembeli = $kelompok->kelompok_tani ?? '-';
        }

        // Simpan barang keluar
        BarangKeluar::create([
            'barang_id'      => $validated['barang_id'],
            'nama_barang'    => $barang->nama_barang,
            'nama_pembeli'   => $namaPembeli,
            'kode_transaksi' => $this->generateKodeTransaksi(),
            'tanggal_keluar' => $validated['tanggal_keluar'],
            'jumlah_keluar'  => $validated['jumlah_keluar'],
            'kelompok_id'    => $validated['kelompok_id'],
            'user_id'        => $validated['user_id'],
        ]);

        // Kurangi stok
        $barang->decrement('stok', $validated['jumlah_keluar']);

        return redirect()->route('barang-keluar.index')->with('success', 'Barang keluar berhasil ditambahkan.');
    }

    public function show(BarangKeluar $barangKeluar)
    {
        return view('barang-keluar.show', compact('barangKeluar'));
    }

    public function edit(BarangKeluar $barangKeluar)
    {
        return view('barang-keluar.edit', [
            'barangKeluar' => $barangKeluar,
            'kelompok'     => Kelompok::all(),
            'users'        => User::all(),
            'barangs'      => Barang::all(),
        ]);
    }

    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        $validated = $request->validate([
            'barang_id'      => 'required|exists:barangs,id',
            'tanggal_keluar' => 'required|date',
            'jumlah_keluar'  => 'required|integer|min:1',
            'kelompok_id'    => 'nullable|exists:kelompok,id',
            'user_id'        => 'required|exists:users,id',
        ]);

        // Kembalikan stok lama
        $barangKeluar->barang->increment('stok', $barangKeluar->jumlah_keluar);

        $barang = Barang::findOrFail($validated['barang_id']);

        // Cek stok cukup
        if ($barang->stok < $validated['jumlah_keluar']) {
            return back()->withErrors(['jumlah_keluar' => 'Stok barang tidak mencukupi untuk update.'])->withInput();
        }

        $namaPembeli = '-';
        if ($validated['kelompok_id']) {
            $kelompok = Kelompok::find($validated['kelompok_id']);
            $namaPembeli = $kelompok->kelompok_tani ?? '-';
        }

        // Kurangi stok baru
        $barang->decrement('stok', $validated['jumlah_keluar']);

        // Update record
        $barangKeluar->update([
            'barang_id'      => $validated['barang_id'],
            'nama_barang'    => $barang->nama_barang,
            'nama_pembeli'   => $namaPembeli,
            'tanggal_keluar' => $validated['tanggal_keluar'],
            'jumlah_keluar'  => $validated['jumlah_keluar'],
            'kelompok_id'    => $validated['kelompok_id'],
            'user_id'        => $validated['user_id'],
        ]);

        return redirect()->route('barang-keluar.index')->with('success', 'Barang keluar berhasil diperbarui.');
    }

    public function destroy(BarangKeluar $barangKeluar)
    {
        // Kembalikan stok
        $barangKeluar->barang?->increment('stok', $barangKeluar->jumlah_keluar);

        $barangKeluar->delete();

        return redirect()->route('barang-keluar.index')->with('success', 'Barang keluar berhasil dihapus.');
    }

    /**
     * Membuat kode transaksi dengan format BK-YYYYMMDD-XXX
     * dan lebih SQLite friendly (date('now'))
     */
    private function generateKodeTransaksi(): string
    {
        $tanggal = now()->format('Ymd');

        // Pake raw agar aman untuk SQLite maupun MySQL
        $count = BarangKeluar::whereRaw("date(created_at) = date('now')")->count() + 1;

        $urutan = str_pad($count, 3, '0', STR_PAD_LEFT);

        return "BK-$tanggal-$urutan";
    }
}
