<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Activitylog\Models\Activity;
use Carbon\Carbon;

class ClearOldActivityLog extends Command
{
    protected $signature = 'activitylog:clear {days=30}';
    protected $description = 'Hapus log aktivitas yang lebih lama dari jumlah hari tertentu';

    public function handle()
    {
        $days = (int) $this->argument('days');
        $deleted = Activity::where('created_at', '<', now()->subDays($days))->delete();

        $this->info("Berhasil menghapus {$deleted} log yang lebih lama dari {$days} hari.");
    }
}
