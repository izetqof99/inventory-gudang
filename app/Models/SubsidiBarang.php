<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubsidiBarang extends Model
{
    protected $table = 'subsidi_barang';

    protected $fillable = [
        'kelompok_id',
        'barang_id',
        'harga_subsidi_per_kg',
        'jatah_subsidi',
    ];

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class, 'kelompok_id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
