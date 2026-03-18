<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kelompok;
use App\Models\SubsidiBarang;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KasirController extends Controller
{
    /**
     * Halaman kasir
     */
    public function index()
    {
        $barangs   = Barang::all();
        $kelompok  = Kelompok::with(['subsidiBarang.barang'])->get();

        return view('kasir.index', compact('barangs', 'kelompok'));
    }

    /**
     * Simpan transaksi baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kelompok_id'       => 'nullable|exists:kelompok,id',
            'items'             => 'required|array',
            'items.*.barang_id' => 'required|exists:barangs,id',
            'items.*.qty'       => 'required|integer|min:1',
        ]);

        DB::beginTransaction();
        try {
            // Buat header penjualan
            $penjualan = Penjualan::create([
                'kelompok_id' => $validated['kelompok_id'] ?? null,
                'total'       => 0,
                'tanggal'     => now(),
            ]);

            $grandTotal = 0;

            foreach ($validated['items'] as $item) {
                $barang   = Barang::findOrFail($item['barang_id']);
                $qty      = (int) $item['qty'];

                // Cek stok
                if ($barang->stok < $qty) {
                    throw new \Exception("Stok {$barang->nama_barang} tidak mencukupi");
                }

                $hargaSatuan = $barang->harga;
                $totalHarga  = 0;

                // Cek subsidi
                $subsidi = null;
                if ($validated['kelompok_id']) {
                    $subsidi = SubsidiBarang::where('kelompok_id', $validated['kelompok_id'])
                        ->where('barang_id', $barang->id)
                        ->first();
                }

                if ($subsidi && $subsidi->jatah_subsidi > 0) {
                    $jatahKg     = $subsidi->jatah_subsidi;
                    $beratBarang = $barang->berat ?: 1;
                    $jatahUnit   = intdiv($jatahKg, $beratBarang);

                    $subsidiUnit = min($qty, $jatahUnit);

                    $hargaPerKgSubsidi  = $subsidi->harga_subsidi_per_kg;
                    $diskonPerUnit      = $hargaPerKgSubsidi * $beratBarang;
                    $hargaSetelahSubsidi = max($hargaSatuan - $diskonPerUnit, 0);

                    $totalHarga += $subsidiUnit * $hargaSetelahSubsidi;

                    $sisaUnit   = $qty - $subsidiUnit;
                    $totalHarga += $sisaUnit * $hargaSatuan;

                    // Kurangi jatah subsidi
                    $subsidi->decrement('jatah_subsidi', $subsidiUnit * $beratBarang);
                } else {
                    $totalHarga = $qty * $hargaSatuan;
                }

                // Simpan detail
                PenjualanDetail::create([
                    'penjualan_id' => $penjualan->id,
                    'barang_id'    => $barang->id,
                    'qty'          => $qty,
                    'harga'        => $hargaSatuan,
                    'subtotal'     => $totalHarga,
                ]);

                // Kurangi stok barang
                $barang->decrement('stok', $qty);

                $grandTotal += $totalHarga;
            }

            // Update total di header penjualan
            $penjualan->update(['total' => $grandTotal]);

            DB::commit();
            return redirect()->route('kasir.index')->with('success', 'Transaksi berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
