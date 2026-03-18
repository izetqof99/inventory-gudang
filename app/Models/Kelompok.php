<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    protected $table = 'kelompok';

    protected $fillable = [
        'nama_petani',
        'kelompok_tani',
        'luas_lahan',
    ];

    public function barangSubsidi()
    {
        
    return $this->belongsToMany(Barang::class, 'subsidi_barang')
                ->withPivot('harga_subsidi_per_kg')
                ->withTimestamps();
    }

    public function subsidiBarang()
    {
        return $this->hasMany(SubsidiBarang::class);
    }
}
