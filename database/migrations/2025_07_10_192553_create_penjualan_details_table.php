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
        Schema::create('penjualan_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('penjualan_id')->index('penjualan_details_penjualan_id_foreign');
            $table->unsignedBigInteger('barang_id')->index('penjualan_details_barang_id_foreign');
            $table->bigInteger('customer_id')->nullable();
            $table->integer('kelompok_id')->nullable()->index('fk_penjualan_details_kelompok_id');
            $table->integer('qty');
            $table->decimal('harga', 15);
            $table->decimal('subtotal', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan_details');
    }
};
