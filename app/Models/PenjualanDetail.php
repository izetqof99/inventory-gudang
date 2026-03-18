<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenjualanDetail extends Model
{
    protected $fillable = ['penjualan_id', 'kelompok_id', 'barang_id', 'qty', 'harga', 'subtotal'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
        public function penjualan()
    {
        return $this->belongsTo(Penjualan::class);
    }
    public function kelompok()
    {
    return $this->belongsTo(Kelompok::class);
    }

}
