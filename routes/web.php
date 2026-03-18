<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HakAksesController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\LaporanBarangKeluarController;
use App\Http\Controllers\LaporanBarangMasukController;
use App\Http\Controllers\LaporanStockController;
use App\Http\Controllers\ManajemenUserController;
use App\Http\Controllers\UbahPasswordController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PenjualanDetailController;
use App\Http\Controllers\SubsidiBarangController;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;


Route::get('/', function () {
    return redirect()->route('login');
});

// Group untuk user yang sudah login
Route::middleware(['auth'])->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Manajemen User
    Route::get('/users', [ManajemenUserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [ManajemenUserController::class, 'create'])->name('users.create');
    Route::post('/users', [ManajemenUserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [ManajemenUserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [ManajemenUserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [ManajemenUserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{user}', [ManajemenUserController::class, 'show'])->name('users.show');

    // Hak Akses
    Route::get('/hak-akses/get-data', [HakAksesController::class, 'getDataRole']);
    Route::resource('/hak-akses', HakAksesController::class);

    // Barang
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/barang/sync-stok', [BarangController::class, 'syncStok'])->name('barang.sync-stok');
    Route::get('/barang/{barang}', [BarangController::class, 'show'])->name('barang.show');
    Route::get('/barang/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/barang/{barang}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{barang}', [BarangController::class, 'destroy'])->name('barang.destroy');

    

    // Jenis Barang
    Route::get('jenis-barang', [JenisController::class, 'index'])->name('jenis-barang.index');
    Route::get('jenis-barang/create', [JenisController::class, 'create'])->name('jenis-barang.create');
    Route::post('jenis-barang', [JenisController::class, 'store'])->name('jenis-barang.store');
    Route::get('jenis-barang/{id}/edit', [JenisController::class, 'edit'])->name('jenis-barang.edit');
    Route::put('jenis-barang/{id}', [JenisController::class, 'update'])->name('jenis-barang.update');
    Route::delete('jenis-barang/{id}', [JenisController::class, 'destroy'])->name('jenis-barang.destroy');

    // Satuan Barang
    Route::middleware(['auth'])->group(function () {
    Route::get('/satuan-barang', [SatuanController::class, 'index'])->name('satuan-barang.index');
    Route::get('/satuan-barang/create', [SatuanController::class, 'create'])->name('satuan-barang.create');
    Route::post('/satuan-barang', [SatuanController::class, 'store'])->name('satuan-barang.store');
    Route::get('/satuan-barang/{id}/edit', [SatuanController::class, 'edit'])->name('satuan-barang.edit');
    Route::put('/satuan-barang/{id}', [SatuanController::class, 'update'])->name('satuan-barang.update');
    Route::delete('/satuan-barang/{id}', [SatuanController::class, 'destroy'])->name('satuan-barang.destroy');
    Route::get('/satuan-barang/get-data', [SatuanController::class, 'getDataSatuanBarang']);
    });

    // Supplier
    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/supplier/{supplier}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('/supplier/{supplier}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::delete('/supplier/{supplier}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
    // data JSON (untuk DataTables)
    Route::get('/get-supplier', [SupplierController::class, 'getDataSupplier'])->name('supplier.getData');

    // Subsidi
    Route::get('/kelompok-petani', [KelompokController::class, 'index'])->name('kelompok-petani.index');
    Route::get('/kelompok-petani/create', [KelompokController::class, 'create'])->name('kelompok-petani.create');
    Route::post('/kelompok-petani', [KelompokController::class, 'store'])->name('kelompok-petani.store');
    Route::get('/kelompok-petani/{kelompok}', [KelompokController::class, 'show'])->name('kelompok-petani.show');
    Route::get('/kelompok-petani/{kelompok}/edit', [KelompokController::class, 'edit'])->name('kelompok-petani.edit');
    Route::put('/kelompok-petani/{kelompok}', [KelompokController::class, 'update'])->name('kelompok-petani.update');
    Route::delete('/kelompok-petani/{kelompok}', [KelompokController::class, 'destroy'])->name('kelompok-petani.destroy');

    Route::get('/subsidi-barang', [SubsidiBarangController::class, 'index'])->name('subsidi-barang.index');
    Route::post('/subsidi-barang', [SubsidiBarangController::class, 'store'])->name('subsidi-barang.store');
    Route::delete('/subsidi-barang/{id}', [SubsidiBarangController::class, 'destroy'])->name('subsidi-barang.destroy');
    Route::put('/subsidi-barang/{id}', [SubsidiBarangController::class, 'update'])->name('subsidi-barang.update');


    Route::get('/api/diskon/{kelompok}/{barang}', function ($kelompok, $barang) {
    $diskon = DB::table('subsidi_barang')
        ->where('kelompok_id', $kelompok)
        ->where('barang_id', $barang)
        ->value('harga_subsidi_per_kg');

    return response()->json(['harga_subsidi_per_kg' => $diskon ?? 0]);
    });

    // Barang Masuk
    Route::get('/barang-masuk', [BarangMasukController::class, 'index'])->name('barang-masuk.index');
    Route::get('/barang-masuk/create', [BarangMasukController::class, 'create'])->name('barang-masuk.create');
    Route::post('/barang-masuk', [BarangMasukController::class, 'store'])->name('barang-masuk.store');
    Route::get('/barang-masuk/{barangMasuk}/edit', [BarangMasukController::class, 'edit'])->name('barang-masuk.edit');
    Route::put('/barang-masuk/{barangMasuk}', [BarangMasukController::class, 'update'])->name('barang-masuk.update');
    Route::delete('/barang-masuk/{barangMasuk}', [BarangMasukController::class, 'destroy'])->name('barang-masuk.destroy');

    // Barang keluar
    Route::get('/barang-keluar', [BarangKeluarController::class, 'index'])->name('barang-keluar.index');
    Route::get('/barang-keluar/create', [BarangKeluarController::class, 'create'])->name('barang-keluar.create');
    Route::post('/barang-keluar', [BarangKeluarController::class, 'store'])->name('barang-keluar.store');
    Route::get('/barang-keluar/{barangKeluar}', [BarangKeluarController::class, 'show'])->name('barang-keluar.show');
    Route::get('/barang-keluar/{barangKeluar}/edit', [BarangKeluarController::class, 'edit'])->name('barang-keluar.edit');
    Route::put('/barang-keluar/{barangKeluar}', [BarangKeluarController::class, 'update'])->name('barang-keluar.update');
    Route::delete('/barang-keluar/{barangKeluar}', [BarangKeluarController::class, 'destroy'])->name('barang-keluar.destroy');

    // Laporan Stock Barang
    Route::get('/laporan-stok-barang', [LaporanStockController::class, 'index']);
    Route::get('/laporan-stok-barang/data', [LaporanStockController::class, 'getData']);
    Route::get('/laporan-stok-barang/print', [LaporanStockController::class, 'printStok']);
    Route::get('/laporan-stok-barang/satuan', [LaporanStockController::class, 'getSatuan']);

    Route::get('/activity-log', [App\Http\Controllers\ActivityLogController::class, 'index'])->name('activity-log.index');
    Route::post('/activity-log/clear', [ActivityLogController::class, 'clear'])->name('activity-log.clear');
    Route::get('/kasir', [KasirController::class, 'index'])->name('kasir.index');
    Route::post('/kasir', [KasirController::class, 'store'])->name('kasir.store');
    Route::get('/penjualan-detail', [\App\Http\Controllers\PenjualanDetailController::class, 'index'])
    ->name('penjualan-detail.index');
    Route::delete('/penjualan-detail/{id}', [\App\Http\Controllers\PenjualanDetailController::class, 'destroy'])
    ->name('penjualan-detail.destroy');
    Route::resource('penjualans', PenjualanController::class);
    

    // Laporan Barang Keluar
    Route::prefix('laporan-barang-keluar')->group(function () {
        Route::get('/', [LaporanBarangKeluarController::class, 'index']);
        Route::get('/data', [LaporanBarangKeluarController::class, 'getData']);
        Route::get('/print', [LaporanBarangKeluarController::class, 'printBarangKeluar']);
    });

    // Laporan Barang Masuk
    Route::prefix('laporan-barang-masuk')->group(function () {
        Route::get('/', [LaporanBarangMasukController::class, 'index']);
        Route::get('/data', [LaporanBarangMasukController::class, 'getData']);
        Route::get('/print', [LaporanBarangMasukController::class, 'printBarangMasuk']);
    });

    Route::get('/subsidi/{kelompokId}/{barangId}', function ($kelompokId, $barangId) {
        $subsidi = SubsidiBarang::where('kelompok_id', $kelompokId)
            ->where('barang_id', $barangId)
            ->first();

        return response()->json($subsidi);
    })->name('subsidi.get');
    
});
        
    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['verified'])
    ->name('dashboard');

require __DIR__.'/auth.php';
