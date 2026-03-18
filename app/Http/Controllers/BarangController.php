<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jenis;
use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class BarangController extends Controller
{
    public function index()
    {
        $stokMinimumItems = [];

        $barangs = Barang::withSum('barangMasuks', 'jumlah_masuk')
                         ->withSum('barangKeluars', 'jumlah_keluar')
                         ->get()
                         ->map(function ($barang) use (&$stokMinimumItems) {
                             $masuk = $barang->barang_masuks_sum_jumlah_masuk ?? 0;
                             $keluar = $barang->barang_keluars_sum_jumlah_keluar ?? 0;
                             $computed = $masuk - $keluar;

                             $barang->stok_transaksi = $computed;
                             $barang->stok_mismatch = $barang->stok != $computed;
                             $barang->stok_minimum_flag = $computed <= $barang->stok_minimum;

                             if ($barang->stok_minimum_flag) {
                                 $stokMinimumItems[] = $barang;

                                 //$this->cekDanNotifikasiStok($barang, $computed);
                             }

                             return $barang;
                         });

        return view('barang.index', [
            'barangs'          => $barangs,
            'jenis_barangs'    => Jenis::all(),
            'satuans'          => Satuan::all(),
            'stokMinimumItems' => $stokMinimumItems,
        ]);
    }

    public function create()
    {
        return view('barang.create', [
            'jenis_barangs' => Jenis::all(),
            'satuans'       => Satuan::all(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);

        $barang = Barang::create([
            'nama_barang'   => $request->nama_barang,
            'user_id'       => auth()->id(),
            'kode_barang'   => $this->generateKodeBarang(),
            'stok_minimum'  => $request->stok_minimum,
            'jenis_id'      => $request->jenis_id,
            'harga'         => $request->harga,
            'berat'         => $request->berat,
            'satuan_id'     => $request->satuan_id,
        ]);

        // $this->cekDanNotifikasiStok($barang);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function show(Barang $barang)
    {
        return view('barang.show', compact('barang'));
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', [
            'barang'        => $barang,
            'jenis_barangs' => Jenis::all(),
            'satuans'       => Satuan::all(),
        ]);
    }

    public function update(Request $request, Barang $barang)
    {
        $this->validateRequest($request);

        $barang->update([
            'nama_barang'   => $request->nama_barang,
            'user_id'       => auth()->id(),
            'stok_minimum'  => $request->stok_minimum,
            'jenis_id'      => $request->jenis_id,
            'harga'         => $request->harga,
            'berat'         => $request->berat,
            'satuan_id'     => $request->satuan_id,
        ]);

        // $this->cekDanNotifikasiStok($barang);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate!');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }

    public function syncStok()
    {
        $barangs = Barang::withSum('barangMasuks', 'jumlah_masuk')
                         ->withSum('barangKeluars', 'jumlah_keluar')
                         ->get();

        foreach ($barangs as $barang) {
            $masuk = $barang->barang_masuks_sum_jumlah_masuk ?? 0;
            $keluar = $barang->barang_keluars_sum_jumlah_keluar ?? 0;
            $stokAkhir = $masuk - $keluar;

            $barang->stok = $stokAkhir;
            $barang->save();

            // $this->cekDanNotifikasiStok($barang, $stokAkhir); // kirim WA jika perlu
        }

        return redirect()->route('barang.index')->with('success', 'Stok berhasil disinkronisasi!');
    }

    private function validateRequest(Request $request)
    {
        Validator::make($request->all(), [
            'nama_barang'   => 'required',
            'stok_minimum'  => 'required|numeric',
            'jenis_id'      => 'required',
            'harga'         => 'required|numeric|min:0',
            'berat'         => 'required|numeric|min:0.01',
            'satuan_id'     => 'required',
        ])->validate();
    }

    private function generateKodeBarang()
    {
        $tanggal = now()->format('Ymd');
        $count = Barang::whereDate('created_at', now()->toDateString())->count() + 1;
        return 'BR-' . $tanggal . '-' . str_pad($count, 3, '0', STR_PAD_LEFT);
    }

    private function kirimWhatsapp($nomor, $pesan)
    {
        $token = env('WABLAS_API_TOKEN');
        $url = 'https://sby.wablas.com/api/v2/send-message';

        $response = Http::withHeaders([
            'Authorization' => $token,
        ])->asJson()->post($url, [
            'data' => [[
                'phone' => $nomor,
                'message' => $pesan
            ]]
        ]);

        logger()->info('Response kirim WA', [
            'nomor' => $nomor,
            'pesan' => $pesan,
            'response' => $response->json()
        ]);

        if (!$response->successful()) {
            logger()->error("Gagal kirim WA ke {$nomor}", [
                'error' => $response->body()
            ]);
        }

        return $response->successful();
    }

    // private function cekDanNotifikasiStok(Barang $barang, $stokOverride = null)
    // {
    //     $masuk = $barang->barangMasuks()->sum('jumlah_masuk');
    //     $keluar = $barang->barangKeluars()->sum('jumlah_keluar');
    //     $stok = $stokOverride ?? ($masuk - $keluar);

    //     if ($stok <= $barang->stok_minimum) {
    //         // Key unik per barang per hari
    //         $cacheKey = 'wa_sent_' . $barang->id . '_' . now()->toDateString();

    //         // Cek apakah hari ini sudah dikirim
    //         if (!Cache::has($cacheKey)) {
    //             $pesan = "⚠️ Stok barang *{$barang->nama_barang}* hanya sisa *{$stok}* unit. Harap segera restock.";
    //             $this->kirimWhatsapp('6282241253847', $pesan);

    //             // Simpan cache selama 24 jam
    //             Cache::put($cacheKey, true, now()->addMinutes(2));
    //         }
    //     }
    // }

    // private function cekDanNotifikasiStok(Barang $barang, $stokOverride = null)
    // {
    //     $masuk = $barang->barangMasuks()->sum('jumlah_masuk');
    //     $keluar = $barang->barangKeluars()->sum('jumlah_keluar');
    //     $stok = $stokOverride ?? ($masuk - $keluar);

    //     if ($stok <= $barang->stok_minimum) {
    //         $pesan = "⚠️ Stok barang *{$barang->nama_barang}* hanya sisa *{$stok}* unit. Harap segera restock.";
    //         $this->kirimWhatsapp('6282241253847', $pesan);
    //     }
    // }
}
