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
        Schema::table('barang_masuks', function (Blueprint $table) {
            $table->foreign(['barang_id'])->references(['id'])->on('barangs')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['supplier_id'], 'barang_masuks_ibfk_1')->references(['id'])->on('suppliers')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['user_id'], 'barang_masuks_ibfk_2')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barang_masuks', function (Blueprint $table) {
            $table->dropForeign('barang_masuks_barang_id_foreign');
            $table->dropForeign('barang_masuks_ibfk_1');
            $table->dropForeign('barang_masuks_ibfk_2');
        });
    }
};
