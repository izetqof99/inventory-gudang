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
        Schema::table('subsidi_barang', function (Blueprint $table) {
            $table->foreign(['kelompok_id'], 'fk_subsidi_barang_kelompok_id')->references(['id'])->on('kelompok')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['barang_id'], 'subsidi_barang_ibfk_2')->references(['id'])->on('barangs')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subsidi_barang', function (Blueprint $table) {
            $table->dropForeign('fk_subsidi_barang_kelompok_id');
            $table->dropForeign('subsidi_barang_ibfk_2');
        });
    }
};
