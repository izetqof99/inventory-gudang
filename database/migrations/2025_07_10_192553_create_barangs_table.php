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
        Schema::create('barangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index('user_id');
            $table->unsignedBigInteger('jenis_id')->index('jenis_id');
            $table->unsignedBigInteger('satuan_id')->index('satuan_id');
            $table->string('kode_barang')->unique('kode_barang');
            $table->string('nama_barang');
            $table->string('deskripsi');
            $table->string('gambar');
            $table->integer('stok_minimum');
            $table->integer('stok')->default(0);
            $table->timestamps();
            $table->decimal('harga', 12)->nullable()->default(0);
            $table->decimal('berat')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
