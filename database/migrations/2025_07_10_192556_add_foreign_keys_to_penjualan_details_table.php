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
        Schema::table('penjualan_details', function (Blueprint $table) {
            $table->foreign(['kelompok_id'], 'fk_penjualan_details_kelompok_id')->references(['id'])->on('kelompok')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['barang_id'])->references(['id'])->on('barangs')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['penjualan_id'])->references(['id'])->on('penjualans')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penjualan_details', function (Blueprint $table) {
            $table->dropForeign('fk_penjualan_details_kelompok_id');
            $table->dropForeign('penjualan_details_barang_id_foreign');
            $table->dropForeign('penjualan_details_penjualan_id_foreign');
        });
    }
};
