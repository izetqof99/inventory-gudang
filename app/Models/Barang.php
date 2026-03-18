<?php

namespace App\Models;

use App\Models\User;
use App\Models\Jenis;
use App\Models\Satuan;
use App\Models\BarangMasuk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Barang extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['kode_barang', 'nama_barang', 'deskripsi', 'gambar', 'stok_minimum', 'jenis_id', 'stok', 'satuan_id', 'harga', 'berat', 'user_id'];
    protected $guarded = [''];
    protected $ignoreChangedAttributes = ['updated_at'];

    public function barang()
    {
    return $this->belongsTo(Barang::class);
    }

    public function barangMasuks()
    {
        return $this->hasMany(BarangMasuk::class);
    }

    public function barangKeluars()
    {
    return $this->hasMany(\App\Models\BarangKeluar::class);
    }

    // Activity Log
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logUnguarded()
            ->logOnlyDirty();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id');
    }

    public function getActivitylogAttributes(): array
    {
        return array_diff($this->fillable, $this->ignoreChangedAttributes);
    }

    public function getTotalStokMasukAttribute()
    {
        return $this->barangMasuks()->sum('jumlah_masuk');
    }
    public function subsidiTerkait()
    {
    return $this->belongsToMany(Kelompok::class, 'subsidi_barang')
                ->withPivot('harga_subsidi_per_kg')
                ->withTimestamps();
    }
}
