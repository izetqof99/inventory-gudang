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
        Schema::table('barang_keluars', function (Blueprint $table) {
            $table->foreign(['user_id'], 'barang_keluars_ibfk_2')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['kelompok_id'], 'fk_barang_keluar_kelompok_id')->references(['id'])->on('kelompok')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['barang_id'], 'fk_barang_keluars_barang')->references(['id'])->on('barangs')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['user_id'], 'fk_barang_keluars_user')->references(['id'])->on('users')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barang_keluars', function (Blueprint $table) {
            $table->dropForeign('barang_keluars_ibfk_2');
            $table->dropForeign('fk_barang_keluar_kelompok_id');
            $table->dropForeign('fk_barang_keluars_barang');
            $table->dropForeign('fk_barang_keluars_user');
        });
    }
};
