<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\User;
use Illuminate\Support\Collection;

class DashboardController extends Controller

    {public function index()
{
    \Carbon\Carbon::setLocale('id'); // Tambah ini

    $barangCount = Barang::count();
    $barangMasukCount = BarangMasuk::count();
    $barangKeluarCount = BarangKeluar::count();
    $userCount = User::count();

    $barangMasukData = BarangMasuk::selectRaw("DATE_FORMAT(tanggal_masuk, '%Y-%m') as date, SUM(jumlah_masuk) as total")
        ->groupBy('date')
        ->orderBy('date')
        ->get();

    $barangKeluarData = BarangKeluar::selectRaw("DATE_FORMAT(tanggal_keluar, '%Y-%m') as date, SUM(jumlah_keluar) as total")
        ->groupBy('date')
        ->orderBy('date')
        ->get();

    $labelsRaw = $barangMasukData->pluck('date')
        ->merge($barangKeluarData->pluck('date'))
        ->unique()
        ->sort()
        ->values();

    $labels = $labelsRaw->map(fn($d) => \Carbon\Carbon::createFromFormat('Y-m', $d)->translatedFormat('F Y'));

    $barangMasukTotals = $labelsRaw->map(fn($d) => optional($barangMasukData->firstWhere('date', $d))['total'] ?? 0);
    $barangKeluarTotals = $labelsRaw->map(fn($d) => optional($barangKeluarData->firstWhere('date', $d))['total'] ?? 0);

    $stokBarang = Barang::pluck('stok', 'nama_barang');

    return view('dashboard', compact(
        'barangCount',
        'barangMasukCount',
        'barangKeluarCount',
        'userCount',
        'labels',
        'barangMasukTotals',
        'barangKeluarTotals',
        'stokBarang'
    ));
}
}
