<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 🌾 Sistem Informasi Inventory Gudang Pertanian

## 📌 Deskripsi

Sistem Informasi Inventory Gudang Pertanian merupakan aplikasi berbasis web yang dirancang untuk mengelola data stok barang seperti pupuk dan obat-obatan pertanian secara efektif dan efisien. Sistem ini membantu proses pencatatan barang masuk, barang keluar, serta monitoring stok secara real-time guna meningkatkan akurasi dan transparansi dalam manajemen gudang.

---

## 🎯 Tujuan

Pengembangan sistem ini bertujuan untuk:

* Mengurangi kesalahan pencatatan manual
* Meningkatkan efisiensi pengelolaan stok
* Menyediakan laporan stok yang akurat dan real-time
* Mendukung pengambilan keputusan berbasis data

---

## ⚙️ Fitur Utama

* 🔐 Manajemen autentikasi (Login & Logout)
* 👤 Role Management (Admin & Karyawan)
* 📦 Manajemen Data Barang
* 🏷️ Kategori dan Satuan Barang
* 📥 Transaksi Barang Masuk
* 📤 Transaksi Barang Keluar
* 📊 Monitoring Stok Barang
* 📝 Laporan Inventory
* 🔔 Notifikasi Stok Minimum

---

## 🛠️ Teknologi yang Digunakan

* **Backend**: Laravel 12
* **Frontend**: Blade, Tailwind CSS
* **Database**: MySQL
* **Tools**: Vite, Git

---

## 🗂️ Struktur Database (Ringkas)

Beberapa tabel utama dalam sistem:

* `users`
* `roles`
* `barangs`
* `kategori`
* `satuans`
* `barang_masuks`
* `barang_keluars`

---

## 🚀 Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/username/nama-repository.git
cd nama-repository
```

### 2. Install Dependency

```bash
composer install
npm install
```

### 3. Konfigurasi Environment

```bash
cp .env.example .env
```

Lalu sesuaikan konfigurasi database pada file `.env`

---

### 4. Generate Key

```bash
php artisan key:generate
```

---

### 5. Migrasi Database

```bash
php artisan migrate
```

---

### 6. Jalankan Aplikasi

```bash
php artisan serve
npm run dev
```

Akses di browser:

```
http://127.0.0.1:8000
```

---

## 👥 Role Pengguna

### 🔑 Admin

* Mengelola data master
* Melihat laporan
* Mengontrol seluruh sistem

### 👨‍🌾 Karyawan

* Input barang masuk & keluar
* Melihat stok barang

---

## 📸 Tampilan Sistem

*(Tambahkan screenshot di sini jika ada)*

---

## 📈 Pengembangan Selanjutnya

* Integrasi API
* Sistem notifikasi WhatsApp
* Dashboard analitik
* Multi gudang

---

## 📄 Lisensi

Project ini bersifat open-source dan dapat dikembangkan lebih lanjut.

---

## 🙌 Kontribusi

Kontribusi terbuka untuk pengembangan sistem ini. Silakan fork repository dan ajukan pull request.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
