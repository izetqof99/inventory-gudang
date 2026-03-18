<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class BarangKeluar extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'barang_id',
        'kode_transaksi',
        'tanggal_keluar',
        'nama_barang',
        'nama_pembeli',
        'jumlah_keluar',
        'kelompok_id',
        'user_id',
        'customer_id'
    ];

    protected $guarded = [''];
    protected $ignoreChangedAttributes = ['updated_at'];

    public function getActivitylogAttributes(): array
    {
        return array_diff($this->fillable, $this->ignoreChangedAttributes);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logUnguarded()
            ->logOnlyDirty();
    }

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class, 'kelompok_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

        public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
    public function barang()
    {
    return $this->belongsTo(Barang::class);
    }
}
