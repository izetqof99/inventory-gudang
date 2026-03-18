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
        Schema::create('barang_keluars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('barang_id')->index('fk_barang_keluars_barang');
            $table->unsignedBigInteger('user_id')->index('fk_barang_keluars_user');
            $table->integer('kelompok_id')->nullable()->index('fk_barang_keluar_kelompok_id');
            $table->string('kode_transaksi')->unique('kode_transaksi');
            $table->date('tanggal_keluar');
            $table->string('nama_barang');
            $table->string('nama_pembeli')->nullable();
            $table->integer('jumlah_keluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_keluars');
    }
};
