<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class BarangMasuk extends Model
{
    use LogsActivity;

    protected $fillable = [
        'kode_transaksi', 'tanggal_masuk', 'jumlah_masuk', 'supplier_id', 'user_id', 'barang_id',
    ];

    protected $guarded = [''];
    protected $ignoreChangedAttributes = ['updated_at'];

    // Konfigurasi log
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

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barang()
    {
    return $this->belongsTo(Barang::class);
    }
}
