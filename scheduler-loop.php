<?php

while (true) {
    echo "[" . date('Y-m-d H:i:s') . "] Menjalankan schedule:run\n";
    exec('php artisan schedule:work');
    sleep(60); // tunggu 60 detik
}
