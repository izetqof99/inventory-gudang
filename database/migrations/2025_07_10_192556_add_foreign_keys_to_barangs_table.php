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
        Schema::table('barangs', function (Blueprint $table) {
            $table->foreign(['user_id'], 'barangs_ibfk_1')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['jenis_id'], 'barangs_ibfk_2')->references(['id'])->on('jenis')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['satuan_id'], 'barangs_ibfk_3')->references(['id'])->on('satuans')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropForeign('barangs_ibfk_1');
            $table->dropForeign('barangs_ibfk_2');
            $table->dropForeign('barangs_ibfk_3');
        });
    }
};
