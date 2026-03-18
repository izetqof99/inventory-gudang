<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang_masuks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('supplier_id')->index('supplier_id');
            $table->unsignedBigInteger('user_id')->index('user_id');
            $table->unsignedBigInteger('barang_id')->nullable()->index('barang_masuks_barang_id_foreign');
            $table->string('kode_transaksi')->unique('kode_transaksi');
            $table->date('tanggal_masuk');
            $table->integer('jumlah_masuk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_masuks');
    }
};
