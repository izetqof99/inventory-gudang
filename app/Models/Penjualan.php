<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $fillable = ['kode_penjualan', 'kelompok_id', 'tanggal', 'customer_id', 'total', 'bayar', 'kembali'];

    public function details()
    {
        return $this->hasMany(PenjualanDetail::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function kelompok()
    {
    return $this->belongsTo(Kelompok::class);
    }
    protected $casts = [
    'tanggal' => 'date',
    ];
}
