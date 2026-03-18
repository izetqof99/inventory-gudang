<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class LaporanBarangMasukController extends Controller
{
    /**
     * Tampilkan halaman laporan barang masuk.
     */
    public function index()
    {
        return view('laporan-barang-masuk.index');
    }

    /**
     * Ambil data barang masuk berdasarkan tanggal.
     */
    public function getData(Request $request)
    {
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');

        $query = BarangMasuk::with(['barang', 'user']);

        if ($tanggalMulai && $tanggalSelesai) {
            $query->whereBetween('tanggal_masuk', [$tanggalMulai, $tanggalSelesai]);
        }

        $barangMasuk = $query->orderBy('tanggal_masuk', 'desc')->get();

        return response()->json($barangMasuk);
    }

    /**
     * Cetak laporan barang masuk ke PDF.
     */
    public function printBarangMasuk(Request $request)
    {
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');

        $query = BarangMasuk::with(['barang', 'user']);

        if ($tanggalMulai && $tanggalSelesai) {
            $query->whereBetween('tanggal_masuk', [$tanggalMulai, $tanggalSelesai]);
        }

        $barangMasuk = $query->orderBy('tanggal_masuk', 'desc')->get();

        $dompdf = new Dompdf();
        $html = view('laporan-barang-masuk.print-barang-masuk', compact('barangMasuk', 'tanggalMulai', 'tanggalSelesai'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('laporan-barang-masuk.pdf', ['Attachment' => false]);
    }
}
