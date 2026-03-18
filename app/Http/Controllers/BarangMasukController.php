<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangMasuks = BarangMasuk::with(['supplier', 'user', 'barang'])
            ->latest()
            ->paginate(10);

        return view('barang-masuk.index', compact('barangMasuks'));
    }

    public function create()
    {
        return view('barang-masuk.create', [
            'suppliers' => Supplier::all(),
            'barangs'   => Barang::all(),
        ]);
    }

    /**
     * Generate kode transaksi unik per hari
     */
    private function generateKodeTransaksi()
    {
        $tanggal = now()->format('Ymd');

        // Ambil kode terakhir hari ini
        $last = BarangMasuk::whereDate('created_at', now())
            ->orderBy('kode_transaksi', 'desc')
            ->first();

        if ($last) {
            $lastNumber = (int) substr($last->kode_transaksi, -3);
            $noUrut = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $noUrut = "001";
        }

        return "BM-$tanggal-$noUrut";
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'barang_id'     => 'required|exists:barangs,id',
            'tanggal_masuk' => 'required|date',
            'jumlah_masuk'  => 'required|integer|min:1',
            'supplier_id'   => 'required|exists:suppliers,id',
        ]);

        $barang = Barang::findOrFail($validated['barang_id']);

        $validated['kode_transaksi'] = $this->generateKodeTransaksi();
        $validated['user_id'] = Auth::id();

        BarangMasuk::create($validated);

        // Tambah stok
        $barang->increment('stok', $validated['jumlah_masuk']);

        return redirect()->route('barang-masuk.index')
            ->with('success', 'Data barang masuk berhasil ditambahkan.');
    }

    public function edit(BarangMasuk $barangMasuk)
    {
        return view('barang-masuk.edit', [
            'barangMasuk' => $barangMasuk,
            'suppliers'   => Supplier::all(),
            'users'       => User::all(),
            'barangs'     => Barang::all(),
        ]);
    }

    public function update(Request $request, BarangMasuk $barangMasuk)
    {
        $validated = $request->validate([
            'tanggal_masuk' => 'required|date',
            'barang_id'     => 'required|exists:barangs,id',
            'jumlah_masuk'  => 'required|integer|min:1',
            'supplier_id'   => 'required|exists:suppliers,id',
        ]);

        $validated['user_id'] = Auth::id();

        // Kembalikan stok lama
        $barangLama = Barang::find($barangMasuk->barang_id);
        if ($barangLama) {
            $barangLama->decrement('stok', $barangMasuk->jumlah_masuk);
        }

        // Tambah stok baru
        $barangBaru = Barang::findOrFail($validated['barang_id']);
        $barangBaru->increment('stok', $validated['jumlah_masuk']);

        // Update data
        $barangMasuk->update([
            'barang_id'     => $validated['barang_id'],
            'tanggal_masuk' => $validated['tanggal_masuk'],
            'jumlah_masuk'  => $validated['jumlah_masuk'],
            'supplier_id'   => $validated['supplier_id'],
            'user_id'       => $validated['user_id'],
        ]);

        return redirect()->route('barang-masuk.index')
            ->with('success', 'Data barang masuk berhasil diperbarui.');
    }

    public function destroy(BarangMasuk $barangMasuk)
    {
        $barang = Barang::find($barangMasuk->barang_id);
        if ($barang) {
            $barang->decrement('stok', $barangMasuk->jumlah_masuk);
        }

        $barangMasuk->delete();

        return redirect()->route('barang-masuk.index')
            ->with('success', 'Data barang masuk berhasil dihapus.');
    }
}
