<?php

namespace App\Http\Controllers;

use App\Models\PenjualanDetail;
use Illuminate\Http\Request;

class PenjualanDetailController extends Controller
{
    public function index(Request $request)
    {
        $penjualanDetails = PenjualanDetail::with(['penjualan', 'kelompok', 'barang'])
            ->when($request->filled('bulan'), function ($query) use ($request) {
                $query->whereHas('penjualan', function ($q) use ($request) {
                    $q->whereMonth('tanggal', $request->bulan);
            
                });
            })
            ->when($request->filled('tahun'), function ($query) use ($request) {
                $query->whereHas('penjualan', function ($q) use ($request) {
                    $q->whereYear('tanggal', $request->tahun);
                });
            })
            ->latest()
            ->get();

        return view('penjualan-detail.index', compact('penjualanDetails'));
    }

    public function destroy($id)
    {
        $detail = PenjualanDetail::findOrFail($id);
        $detail->delete();

        $barang = $detail->barang;
        if ($barang) {
            $barang->increment('stok', $detail->qty);
        }

        return redirect()->back()->with('success', 'Detail penjualan berhasil dihapus.');
    }
}
