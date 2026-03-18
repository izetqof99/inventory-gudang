<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Barang;
use Illuminate\Support\Facades\Http;

class CekStokMinimum extends Command
{
    protected $signature = 'stok:cek-minimum';
    protected $description = 'Cek stok barang dan kirim WA jika di bawah minimum';

    public function handle()
    {
        $barangs = Barang::all();

        foreach ($barangs as $barang) {
            if ($barang->stok <= $barang->stok_minimum) {
                $pesan = "⚠️ Stok *{$barang->nama_barang}* hanya *{$barang->stok}* unit. Segera restock!";
                $this->kirimWhatsapp('6282241253847', $pesan); 
                $this->info("Notifikasi terkirim untuk {$barang->nama_barang}");
            }
        }

        return 0;
    }

    private function kirimWhatsapp($nomor, $pesan)
{
    $token = env('WABLAS_API_TOKEN');
    $url = 'https://sby.wablas.com/api/v2/send-message';

    $response = Http::withHeaders([
        'Authorization' => $token,
    ])->asJson()->post($url, [
        'data' => [
            [
                'phone' => $nomor,
                'message' => $pesan
            ]
        ]
    ]);

    logger()->info('Response kirim WA', [
        'nomor' => $nomor,
        'pesan' => $pesan,
        'response' => $response->json()
    ]);

    if (!$response->successful()) {
        logger()->error("Gagal kirim WA ke {$nomor}", [
            'error' => $response->body()
        ]);
    }

    return $response->successful();
    }
}