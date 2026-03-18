<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Kelompok;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanBarangKeluarController extends Controller
{
    public function index()
    {
        return view('laporan-barang-keluar.index');
    }

    public function getData(Request $request)
    {
        $data = $this->getFilteredData($request);

        // Ubah menjadi JSON array yang sudah siap pakai di frontend
        $jsonData = $data->map(function ($item) {
            return [
                'tanggal_keluar' => $item->tanggal_keluar,
                'kode_transaksi' => $item->kode_transaksi,
                'nama_barang' => $item->barang->nama_barang ?? '-',
                'jumlah_keluar' => $item->jumlah_keluar,
                'kelompok' => $item->kelompok ? ['kelompok_tani' => $item->kelompok->kelompok_tani] : null,
                'user' => $item->user ? ['name' => $item->user->name] : null,
            ];
        });

        return response()->json($jsonData);
    }

    public function printBarangKeluar(Request $request)
    {
        $data = $this->getFilteredData($request);

        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');

        $pdf = Pdf::loadView('laporan-barang-keluar.print-barang-keluar', compact('data', 'tanggalMulai', 'tanggalSelesai'))
                  ->setPaper('A4', 'landscape');

        return $pdf->stream('laporan-barang-keluar.pdf');
    }

    public function getkelompok()
    {
        $kelompok = Kelompok::all();
        return response()->json($kelompok);
    }

    /**
     * Helper function untuk ambil data BarangKeluar dengan filter tanggal.
     */
    private function getFilteredData(Request $request)
    {
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');

        $query = BarangKeluar::with(['kelompok', 'user', 'barang'])
                    ->orderBy('tanggal_keluar', 'desc');

        if ($tanggalMulai && $tanggalSelesai) {
            $query->whereBetween('tanggal_keluar', [$tanggalMulai, $tanggalSelesai]);
        }

        return $query->get();
    }
}
