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
        Schema::create('subsidi_barang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kelompok_id')->nullable();
            $table->unsignedBigInteger('barang_id')->index('barang_id');
            $table->timestamps();
            $table->decimal('harga_subsidi_per_kg', 10)->default(0);

            $table->unique(['kelompok_id', 'barang_id'], 'subsidi_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subsidi_barang');
    }
};
