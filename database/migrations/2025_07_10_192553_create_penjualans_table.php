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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_penjualan');
            $table->date('tanggal');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->integer('kelompok_id')->nullable()->index('fk_penjualans_kelompok_id');
            $table->decimal('total', 15);
            $table->decimal('bayar', 15);
            $table->decimal('kembali', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
