-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 08 Sep 2025 pada 19.33
-- Versi server: 8.0.30
-- Versi PHP: 8.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint UNSIGNED DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `batch_uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(216, 'default', 'created', 'App\\Models\\Barang', 'created', 13, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 13, \"stok\": 0, \"berat\": \"50.00\", \"harga\": \"400000.00\", \"user_id\": 1, \"jenis_id\": 1, \"deskripsi\": \"pupuk\", \"satuan_id\": 1, \"created_at\": \"2025-07-18T03:53:08.000000Z\", \"updated_at\": \"2025-07-18T03:53:08.000000Z\", \"kode_barang\": \"BR-20250718-001\", \"nama_barang\": \"pupuk ponska\", \"stok_minimum\": 5}}', NULL, '2025-07-17 20:53:08', '2025-07-17 20:53:08'),
(217, 'default', 'created', 'App\\Models\\Jenis', 'created', 4, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 4, \"user_id\": 1, \"created_at\": \"2025-07-18T03:53:59.000000Z\", \"updated_at\": \"2025-07-18T03:53:59.000000Z\", \"jenis_barang\": \"insektisida\"}}', NULL, '2025-07-17 20:53:59', '2025-07-17 20:53:59'),
(218, 'default', 'updated', 'App\\Models\\Barang', 'updated', 12, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 20, \"updated_at\": \"2025-07-17T10:29:58.000000Z\"}, \"attributes\": {\"stok\": 19, \"updated_at\": \"2025-07-18T03:56:25.000000Z\"}}', NULL, '2025-07-17 20:56:25', '2025-07-17 20:56:25'),
(219, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 33, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 33, \"user_id\": 1, \"barang_id\": 12, \"created_at\": \"2025-07-18T03:56:25.000000Z\", \"updated_at\": \"2025-07-18T03:56:25.000000Z\", \"kelompok_id\": null, \"nama_barang\": \"Gramaxone\", \"nama_pembeli\": null, \"jumlah_keluar\": 1, \"kode_transaksi\": \"BK-20250718-001\", \"tanggal_keluar\": \"2025-07-18\"}}', NULL, '2025-07-17 20:56:25', '2025-07-17 20:56:25'),
(220, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 16, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 16, \"user_id\": 1, \"barang_id\": 12, \"created_at\": \"2025-07-18T03:57:15.000000Z\", \"updated_at\": \"2025-07-18T03:57:15.000000Z\", \"supplier_id\": 3, \"jumlah_masuk\": 20, \"tanggal_masuk\": \"2025-07-18\", \"kode_transaksi\": \"BM-20250718-001\"}}', NULL, '2025-07-17 20:57:15', '2025-07-17 20:57:15'),
(221, 'default', 'updated', 'App\\Models\\Barang', 'updated', 12, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 19, \"updated_at\": \"2025-07-18T03:56:25.000000Z\"}, \"attributes\": {\"stok\": 39, \"updated_at\": \"2025-07-18T03:57:15.000000Z\"}}', NULL, '2025-07-17 20:57:15', '2025-07-17 20:57:15'),
(222, 'default', 'updated', 'App\\Models\\Barang', 'updated', 12, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 39, \"updated_at\": \"2025-07-18T03:57:15.000000Z\"}, \"attributes\": {\"stok\": 19, \"updated_at\": \"2025-07-18T04:01:31.000000Z\"}}', NULL, '2025-07-17 21:01:31', '2025-07-17 21:01:31'),
(223, 'default', 'deleted', 'App\\Models\\BarangMasuk', 'deleted', 15, 'App\\Models\\User', 1, '{\"old\": {\"id\": 15, \"user_id\": 1, \"barang_id\": 12, \"created_at\": \"2025-07-17T10:29:58.000000Z\", \"updated_at\": \"2025-07-17T10:29:58.000000Z\", \"supplier_id\": 3, \"jumlah_masuk\": 20, \"tanggal_masuk\": \"2025-07-17\", \"kode_transaksi\": \"BM-20250717-001\"}}', NULL, '2025-07-17 21:01:31', '2025-07-17 21:01:31'),
(224, 'default', 'updated', 'App\\Models\\Barang', 'updated', 11, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 4, \"updated_at\": \"2025-07-16T21:40:41.000000Z\"}, \"attributes\": {\"stok\": -16, \"updated_at\": \"2025-07-18T04:01:38.000000Z\"}}', NULL, '2025-07-17 21:01:38', '2025-07-17 21:01:38'),
(225, 'default', 'deleted', 'App\\Models\\BarangMasuk', 'deleted', 14, 'App\\Models\\User', 1, '{\"old\": {\"id\": 14, \"user_id\": 1, \"barang_id\": 11, \"created_at\": \"2025-07-05T10:45:09.000000Z\", \"updated_at\": \"2025-07-05T10:45:09.000000Z\", \"supplier_id\": 3, \"jumlah_masuk\": 20, \"tanggal_masuk\": \"2025-07-05\", \"kode_transaksi\": \"BM-20250705-001\"}}', NULL, '2025-07-17 21:01:38', '2025-07-17 21:01:38'),
(226, 'default', 'updated', 'App\\Models\\Barang', 'updated', 12, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 19, \"updated_at\": \"2025-07-18T04:01:31.000000Z\"}, \"attributes\": {\"stok\": -1, \"updated_at\": \"2025-07-18T04:01:43.000000Z\"}}', NULL, '2025-07-17 21:01:43', '2025-07-17 21:01:43'),
(227, 'default', 'deleted', 'App\\Models\\BarangMasuk', 'deleted', 16, 'App\\Models\\User', 1, '{\"old\": {\"id\": 16, \"user_id\": 1, \"barang_id\": 12, \"created_at\": \"2025-07-18T03:57:15.000000Z\", \"updated_at\": \"2025-07-18T03:57:15.000000Z\", \"supplier_id\": 3, \"jumlah_masuk\": 20, \"tanggal_masuk\": \"2025-07-18\", \"kode_transaksi\": \"BM-20250718-001\"}}', NULL, '2025-07-17 21:01:43', '2025-07-17 21:01:43'),
(228, 'default', 'deleted', 'App\\Models\\Barang', 'deleted', 13, 'App\\Models\\User', 1, '{\"old\": {\"id\": 13, \"stok\": 0, \"berat\": \"50.00\", \"harga\": \"400000.00\", \"user_id\": 1, \"jenis_id\": 1, \"deskripsi\": \"pupuk\", \"satuan_id\": 1, \"created_at\": \"2025-07-18T03:53:08.000000Z\", \"updated_at\": \"2025-07-18T03:53:08.000000Z\", \"kode_barang\": \"BR-20250718-001\", \"nama_barang\": \"pupuk ponska\", \"stok_minimum\": 5}}', NULL, '2025-07-17 21:02:03', '2025-07-17 21:02:03'),
(229, 'default', 'updated', 'App\\Models\\Barang', 'updated', 12, 'App\\Models\\User', 1, '{\"old\": {\"stok\": -1, \"updated_at\": \"2025-07-18T04:01:43.000000Z\"}, \"attributes\": {\"stok\": 0, \"updated_at\": \"2025-07-18T04:06:06.000000Z\"}}', NULL, '2025-07-17 21:06:06', '2025-07-17 21:06:06'),
(230, 'default', 'updated', 'App\\Models\\Barang', 'updated', 11, 'App\\Models\\User', 1, '{\"old\": {\"stok\": -16, \"updated_at\": \"2025-07-18T04:01:38.000000Z\"}, \"attributes\": {\"stok\": 0, \"updated_at\": \"2025-07-18T04:06:08.000000Z\"}}', NULL, '2025-07-17 21:06:08', '2025-07-17 21:06:08'),
(231, 'default', 'updated', 'App\\Models\\Barang', 'updated', 10, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 4, \"updated_at\": \"2025-07-17T09:46:54.000000Z\"}, \"attributes\": {\"stok\": 20, \"updated_at\": \"2025-07-18T04:06:11.000000Z\"}}', NULL, '2025-07-17 21:06:11', '2025-07-17 21:06:11'),
(232, 'default', 'updated', 'App\\Models\\Barang', 'updated', 10, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 20, \"updated_at\": \"2025-07-18T04:06:11.000000Z\"}, \"attributes\": {\"stok\": 39, \"updated_at\": \"2025-07-18T04:06:13.000000Z\"}}', NULL, '2025-07-17 21:06:13', '2025-07-17 21:06:13'),
(233, 'default', 'updated', 'App\\Models\\Barang', 'updated', 11, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 0, \"updated_at\": \"2025-07-18T04:06:08.000000Z\"}, \"attributes\": {\"stok\": 16, \"updated_at\": \"2025-07-18T04:06:15.000000Z\"}}', NULL, '2025-07-17 21:06:15', '2025-07-17 21:06:15'),
(234, 'default', 'updated', 'App\\Models\\Barang', 'updated', 10, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 39, \"updated_at\": \"2025-07-18T04:06:13.000000Z\"}, \"attributes\": {\"stok\": 55, \"updated_at\": \"2025-07-18T04:06:17.000000Z\"}}', NULL, '2025-07-17 21:06:17', '2025-07-17 21:06:17'),
(235, 'default', 'updated', 'App\\Models\\Barang', 'updated', 11, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 16, \"updated_at\": \"2025-07-18T04:06:15.000000Z\"}, \"attributes\": {\"stok\": 32, \"updated_at\": \"2025-07-18T04:06:19.000000Z\"}}', NULL, '2025-07-17 21:06:19', '2025-07-17 21:06:19'),
(236, 'default', 'updated', 'App\\Models\\Barang', 'updated', 10, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 55, \"updated_at\": \"2025-07-18T04:06:17.000000Z\"}, \"attributes\": {\"stok\": 71, \"updated_at\": \"2025-07-18T04:06:21.000000Z\"}}', NULL, '2025-07-17 21:06:21', '2025-07-17 21:06:21'),
(237, 'default', 'updated', 'App\\Models\\Barang', 'updated', 10, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 71, \"updated_at\": \"2025-07-18T04:06:21.000000Z\"}, \"attributes\": {\"stok\": 87, \"updated_at\": \"2025-07-18T04:06:23.000000Z\"}}', NULL, '2025-07-17 21:06:23', '2025-07-17 21:06:23'),
(238, 'default', 'updated', 'App\\Models\\Barang', 'updated', 10, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 87, \"updated_at\": \"2025-07-18T04:06:23.000000Z\"}, \"attributes\": {\"stok\": 88, \"updated_at\": \"2025-07-18T04:06:25.000000Z\"}}', NULL, '2025-07-17 21:06:25', '2025-07-17 21:06:25'),
(239, 'default', 'updated', 'App\\Models\\Barang', 'updated', 11, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 32, \"updated_at\": \"2025-07-18T04:06:19.000000Z\"}, \"attributes\": {\"stok\": 33, \"updated_at\": \"2025-07-18T04:06:27.000000Z\"}}', NULL, '2025-07-17 21:06:27', '2025-07-17 21:06:27'),
(240, 'default', 'deleted', 'App\\Models\\Barang', 'deleted', 10, 'App\\Models\\User', 1, '{\"old\": {\"id\": 10, \"stok\": 88, \"berat\": \"50.00\", \"harga\": \"400000.00\", \"user_id\": 1, \"jenis_id\": 1, \"deskripsi\": \"Pupuk Nusantara\", \"satuan_id\": 1, \"created_at\": \"2025-07-01T05:35:29.000000Z\", \"updated_at\": \"2025-07-18T04:06:25.000000Z\", \"kode_barang\": \"BR-20250701-001\", \"nama_barang\": \"Urea\", \"stok_minimum\": 5}}', NULL, '2025-07-17 21:06:41', '2025-07-17 21:06:41'),
(241, 'default', 'deleted', 'App\\Models\\Barang', 'deleted', 11, 'App\\Models\\User', 1, '{\"old\": {\"id\": 11, \"stok\": 33, \"berat\": \"50.00\", \"harga\": \"480000.00\", \"user_id\": 1, \"jenis_id\": 1, \"deskripsi\": \"Pupuk Luar\", \"satuan_id\": 1, \"created_at\": \"2025-07-01T13:04:14.000000Z\", \"updated_at\": \"2025-07-18T04:06:27.000000Z\", \"kode_barang\": \"BR-20250701-002\", \"nama_barang\": \"NPK\", \"stok_minimum\": 5}}', NULL, '2025-07-17 21:06:46', '2025-07-17 21:06:46'),
(242, 'default', 'deleted', 'App\\Models\\Barang', 'deleted', 12, 'App\\Models\\User', 1, '{\"old\": {\"id\": 12, \"stok\": 0, \"berat\": \"500.00\", \"harga\": \"250000.00\", \"user_id\": 1, \"jenis_id\": 3, \"deskripsi\": \"Herbisida\", \"satuan_id\": 2, \"created_at\": \"2025-07-17T09:08:45.000000Z\", \"updated_at\": \"2025-07-18T04:06:06.000000Z\", \"kode_barang\": \"BR-20250717-001\", \"nama_barang\": \"Gramaxone\", \"stok_minimum\": 5}}', NULL, '2025-07-17 21:06:51', '2025-07-17 21:06:51'),
(243, 'default', 'created', 'App\\Models\\Barang', 'created', 14, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 14, \"stok\": 0, \"berat\": \"50.00\", \"harga\": \"450000.00\", \"user_id\": 1, \"jenis_id\": 1, \"deskripsi\": \"Pupuk\", \"satuan_id\": 1, \"created_at\": \"2025-07-18T04:12:03.000000Z\", \"updated_at\": \"2025-07-18T04:12:03.000000Z\", \"kode_barang\": \"BR-20250718-001\", \"nama_barang\": \"Urea\", \"stok_minimum\": 5}}', NULL, '2025-07-17 21:12:03', '2025-07-17 21:12:03'),
(244, 'default', 'created', 'App\\Models\\Barang', 'created', 15, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 15, \"stok\": 0, \"berat\": \"50.00\", \"harga\": \"450000.00\", \"user_id\": 1, \"jenis_id\": 1, \"deskripsi\": \"Pupuk\", \"satuan_id\": 1, \"created_at\": \"2025-07-18T04:15:35.000000Z\", \"updated_at\": \"2025-07-18T04:15:35.000000Z\", \"kode_barang\": \"BR-20250718-002\", \"nama_barang\": \"Pupuk NPK\", \"stok_minimum\": 5}}', NULL, '2025-07-17 21:15:35', '2025-07-17 21:15:35'),
(245, 'default', 'created', 'App\\Models\\Satuan', 'created', 3, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 3, \"satuan\": \"Kwintal\", \"user_id\": 1, \"created_at\": \"2025-07-18T04:16:34.000000Z\", \"updated_at\": \"2025-07-18T04:16:34.000000Z\"}}', NULL, '2025-07-17 21:16:34', '2025-07-17 21:16:34'),
(246, 'default', 'created', 'App\\Models\\Barang', 'created', 16, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 16, \"stok\": 0, \"berat\": \"50.00\", \"harga\": \"450000.00\", \"user_id\": 1, \"jenis_id\": 1, \"deskripsi\": \"Pupuk Indonesia\", \"satuan_id\": 1, \"created_at\": \"2025-07-18T04:22:31.000000Z\", \"updated_at\": \"2025-07-18T04:22:31.000000Z\", \"kode_barang\": \"BR-20250718-003\", \"nama_barang\": \"Pupuk ponska\", \"stok_minimum\": 5}}', NULL, '2025-07-17 21:22:31', '2025-07-17 21:22:31'),
(247, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 17, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 17, \"user_id\": 1, \"barang_id\": 14, \"created_at\": \"2025-07-18T04:25:23.000000Z\", \"updated_at\": \"2025-07-18T04:25:23.000000Z\", \"supplier_id\": 3, \"jumlah_masuk\": 20, \"tanggal_masuk\": \"2025-07-18\", \"kode_transaksi\": \"BM-20250718-001\"}}', NULL, '2025-07-17 21:25:23', '2025-07-17 21:25:23'),
(248, 'default', 'updated', 'App\\Models\\Barang', 'updated', 14, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 0, \"updated_at\": \"2025-07-18T04:12:03.000000Z\"}, \"attributes\": {\"stok\": 20, \"updated_at\": \"2025-07-18T04:25:23.000000Z\"}}', NULL, '2025-07-17 21:25:23', '2025-07-17 21:25:23'),
(249, 'default', 'updated', 'App\\Models\\Barang', 'updated', 14, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 20, \"updated_at\": \"2025-07-18T04:25:23.000000Z\"}, \"attributes\": {\"stok\": 19, \"updated_at\": \"2025-07-18T04:26:23.000000Z\"}}', NULL, '2025-07-17 21:26:23', '2025-07-17 21:26:23'),
(250, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 34, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 34, \"user_id\": 1, \"barang_id\": 14, \"created_at\": \"2025-07-18T04:26:23.000000Z\", \"updated_at\": \"2025-07-18T04:26:23.000000Z\", \"kelompok_id\": null, \"nama_barang\": \"Urea\", \"nama_pembeli\": null, \"jumlah_keluar\": 1, \"kode_transaksi\": \"BK-20250718-001\", \"tanggal_keluar\": \"2025-07-18\"}}', NULL, '2025-07-17 21:26:23', '2025-07-17 21:26:23'),
(251, 'default', 'created', 'App\\Models\\Barang', 'created', 17, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 17, \"stok\": 0, \"berat\": \"10.00\", \"harga\": \"50000.00\", \"user_id\": 1, \"jenis_id\": 4, \"deskripsi\": \"Insektisida\", \"satuan_id\": 2, \"created_at\": \"2025-07-19T00:16:23.000000Z\", \"updated_at\": \"2025-07-19T00:16:23.000000Z\", \"kode_barang\": \"BR-20250719-001\", \"nama_barang\": \"Roundap\", \"stok_minimum\": 5}}', NULL, '2025-07-18 17:16:23', '2025-07-18 17:16:23'),
(252, 'default', 'created', 'App\\Models\\Jenis', 'created', 5, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 5, \"user_id\": 1, \"created_at\": \"2025-07-19T00:17:23.000000Z\", \"updated_at\": \"2025-07-19T00:17:23.000000Z\", \"jenis_barang\": \"Ton\"}}', NULL, '2025-07-18 17:17:23', '2025-07-18 17:17:23'),
(253, 'default', 'updated', 'App\\Models\\Barang', 'updated', 14, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 19, \"updated_at\": \"2025-07-18T04:26:23.000000Z\"}, \"attributes\": {\"stok\": 18, \"updated_at\": \"2025-07-19T00:19:23.000000Z\"}}', NULL, '2025-07-18 17:19:23', '2025-07-18 17:19:23'),
(254, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 35, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 35, \"user_id\": 1, \"barang_id\": 14, \"created_at\": \"2025-07-19T00:19:23.000000Z\", \"updated_at\": \"2025-07-19T00:19:23.000000Z\", \"kelompok_id\": 1, \"nama_barang\": \"Urea\", \"nama_pembeli\": null, \"jumlah_keluar\": 1, \"kode_transaksi\": \"BK-20250719-001\", \"tanggal_keluar\": \"2025-07-19\"}}', NULL, '2025-07-18 17:19:23', '2025-07-18 17:19:23'),
(255, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 18, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 18, \"user_id\": 1, \"barang_id\": 17, \"created_at\": \"2025-07-19T00:20:46.000000Z\", \"updated_at\": \"2025-07-19T00:20:46.000000Z\", \"supplier_id\": 3, \"jumlah_masuk\": 20, \"tanggal_masuk\": \"2025-07-19\", \"kode_transaksi\": \"BM-20250719-001\"}}', NULL, '2025-07-18 17:20:46', '2025-07-18 17:20:46'),
(256, 'default', 'updated', 'App\\Models\\Barang', 'updated', 17, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 0, \"updated_at\": \"2025-07-19T00:16:23.000000Z\"}, \"attributes\": {\"stok\": 20, \"updated_at\": \"2025-07-19T00:20:46.000000Z\"}}', NULL, '2025-07-18 17:20:46', '2025-07-18 17:20:46'),
(257, 'default', 'updated', 'App\\Models\\Barang', 'updated', 17, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 20, \"updated_at\": \"2025-07-19T00:20:46.000000Z\"}, \"attributes\": {\"stok\": 0, \"updated_at\": \"2025-08-19T20:31:40.000000Z\"}}', NULL, '2025-08-19 13:31:40', '2025-08-19 13:31:40'),
(258, 'default', 'deleted', 'App\\Models\\BarangMasuk', 'deleted', 18, 'App\\Models\\User', 1, '{\"old\": {\"id\": 18, \"user_id\": 1, \"barang_id\": 17, \"created_at\": \"2025-07-19T00:20:46.000000Z\", \"updated_at\": \"2025-07-19T00:20:46.000000Z\", \"supplier_id\": 3, \"jumlah_masuk\": 20, \"tanggal_masuk\": \"2025-07-19\", \"kode_transaksi\": \"BM-20250719-001\"}}', NULL, '2025-08-19 13:31:40', '2025-08-19 13:31:40'),
(259, 'default', 'updated', 'App\\Models\\Barang', 'updated', 14, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 18, \"updated_at\": \"2025-07-19T00:19:23.000000Z\"}, \"attributes\": {\"stok\": -2, \"updated_at\": \"2025-08-19T20:31:42.000000Z\"}}', NULL, '2025-08-19 13:31:42', '2025-08-19 13:31:42'),
(260, 'default', 'deleted', 'App\\Models\\BarangMasuk', 'deleted', 17, 'App\\Models\\User', 1, '{\"old\": {\"id\": 17, \"user_id\": 1, \"barang_id\": 14, \"created_at\": \"2025-07-18T04:25:23.000000Z\", \"updated_at\": \"2025-07-18T04:25:23.000000Z\", \"supplier_id\": 3, \"jumlah_masuk\": 20, \"tanggal_masuk\": \"2025-07-18\", \"kode_transaksi\": \"BM-20250718-001\"}}', NULL, '2025-08-19 13:31:42', '2025-08-19 13:31:42'),
(261, 'default', 'deleted', 'App\\Models\\Barang', 'deleted', 14, 'App\\Models\\User', 1, '{\"old\": {\"id\": 14, \"stok\": -2, \"berat\": \"50.00\", \"harga\": \"450000.00\", \"user_id\": 1, \"jenis_id\": 1, \"deskripsi\": \"Pupuk\", \"satuan_id\": 1, \"created_at\": \"2025-07-18T04:12:03.000000Z\", \"updated_at\": \"2025-08-19T20:31:42.000000Z\", \"kode_barang\": \"BR-20250718-001\", \"nama_barang\": \"Urea\", \"stok_minimum\": 5}}', NULL, '2025-08-19 13:32:52', '2025-08-19 13:32:52'),
(262, 'default', 'deleted', 'App\\Models\\Barang', 'deleted', 15, 'App\\Models\\User', 1, '{\"old\": {\"id\": 15, \"stok\": 0, \"berat\": \"50.00\", \"harga\": \"450000.00\", \"user_id\": 1, \"jenis_id\": 1, \"deskripsi\": \"Pupuk\", \"satuan_id\": 1, \"created_at\": \"2025-07-18T04:15:35.000000Z\", \"updated_at\": \"2025-07-18T04:15:35.000000Z\", \"kode_barang\": \"BR-20250718-002\", \"nama_barang\": \"Pupuk NPK\", \"stok_minimum\": 5}}', NULL, '2025-08-19 13:32:56', '2025-08-19 13:32:56'),
(263, 'default', 'deleted', 'App\\Models\\Barang', 'deleted', 16, 'App\\Models\\User', 1, '{\"old\": {\"id\": 16, \"stok\": 0, \"berat\": \"50.00\", \"harga\": \"450000.00\", \"user_id\": 1, \"jenis_id\": 1, \"deskripsi\": \"Pupuk Indonesia\", \"satuan_id\": 1, \"created_at\": \"2025-07-18T04:22:31.000000Z\", \"updated_at\": \"2025-07-18T04:22:31.000000Z\", \"kode_barang\": \"BR-20250718-003\", \"nama_barang\": \"Pupuk ponska\", \"stok_minimum\": 5}}', NULL, '2025-08-19 13:32:59', '2025-08-19 13:32:59'),
(264, 'default', 'deleted', 'App\\Models\\Barang', 'deleted', 17, 'App\\Models\\User', 1, '{\"old\": {\"id\": 17, \"stok\": 0, \"berat\": \"10.00\", \"harga\": \"50000.00\", \"user_id\": 1, \"jenis_id\": 4, \"deskripsi\": \"Insektisida\", \"satuan_id\": 2, \"created_at\": \"2025-07-19T00:16:23.000000Z\", \"updated_at\": \"2025-08-19T20:31:40.000000Z\", \"kode_barang\": \"BR-20250719-001\", \"nama_barang\": \"Roundap\", \"stok_minimum\": 5}}', NULL, '2025-08-19 13:33:01', '2025-08-19 13:33:01'),
(265, 'default', 'deleted', 'App\\Models\\Supplier', 'deleted', 3, 'App\\Models\\User', 1, '{\"old\": {\"id\": 3, \"alamat\": \"Jl. Jenderal Ahmad Yani - Gresik 61119.\", \"status\": \"Aktif\", \"user_id\": 1, \"supplier\": \"PT. Petrokimia\", \"created_at\": \"2025-06-29T08:27:41.000000Z\", \"updated_at\": \"2025-06-29T08:27:41.000000Z\"}}', NULL, '2025-08-19 13:34:11', '2025-08-19 13:34:11'),
(266, 'default', 'created', 'App\\Models\\Supplier', 'created', 4, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 4, \"alamat\": \"JL. Raya Bungah No. 27 Masangan Tengah Gresik Jawa Timur\", \"status\": \"Aktif\", \"user_id\": 1, \"supplier\": \"PT. Agro Mitra Kimia\", \"created_at\": \"2025-08-19T20:41:14.000000Z\", \"updated_at\": \"2025-08-19T20:41:14.000000Z\"}}', NULL, '2025-08-19 13:41:14', '2025-08-19 13:41:14'),
(267, 'default', 'created', 'App\\Models\\Barang', 'created', 18, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 18, \"stok\": 0, \"berat\": \"10.00\", \"harga\": \"60000.00\", \"user_id\": 1, \"jenis_id\": 2, \"deskripsi\": \"Pupuk Cair\", \"satuan_id\": 2, \"created_at\": \"2025-08-19T20:47:05.000000Z\", \"updated_at\": \"2025-08-19T20:47:05.000000Z\", \"kode_barang\": \"BR-20250819-001\", \"nama_barang\": \"Adiking NPK\", \"stok_minimum\": 5}}', NULL, '2025-08-19 13:47:05', '2025-08-19 13:47:05'),
(268, 'default', 'updated', 'App\\Models\\Barang', 'updated', 18, 'App\\Models\\User', 1, '{\"old\": {\"berat\": \"10.00\", \"updated_at\": \"2025-08-19T20:47:05.000000Z\"}, \"attributes\": {\"berat\": \"1.00\", \"updated_at\": \"2025-08-19T20:47:31.000000Z\"}}', NULL, '2025-08-19 13:47:31', '2025-08-19 13:47:31'),
(269, 'default', 'deleted', 'App\\Models\\Barang', 'deleted', 18, 'App\\Models\\User', 1, '{\"old\": {\"id\": 18, \"stok\": 0, \"berat\": \"1.00\", \"harga\": \"60000.00\", \"user_id\": 1, \"jenis_id\": 2, \"deskripsi\": \"Pupuk Cair\", \"satuan_id\": 2, \"created_at\": \"2025-08-19T20:47:05.000000Z\", \"updated_at\": \"2025-08-19T20:47:31.000000Z\", \"kode_barang\": \"BR-20250819-001\", \"nama_barang\": \"Adiking NPK\", \"stok_minimum\": 5}}', NULL, '2025-08-19 13:47:46', '2025-08-19 13:47:46'),
(270, 'default', 'created', 'App\\Models\\Satuan', 'created', 4, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 4, \"satuan\": \"Liter\", \"user_id\": 1, \"created_at\": \"2025-08-19T20:48:23.000000Z\", \"updated_at\": \"2025-08-19T20:48:23.000000Z\"}}', NULL, '2025-08-19 13:48:23', '2025-08-19 13:48:23'),
(271, 'default', 'created', 'App\\Models\\Barang', 'created', 19, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 19, \"stok\": 0, \"berat\": \"1.00\", \"harga\": \"60000.00\", \"user_id\": 1, \"jenis_id\": 2, \"deskripsi\": \"Pupuk cair\", \"satuan_id\": 4, \"created_at\": \"2025-08-19T20:48:57.000000Z\", \"updated_at\": \"2025-08-19T20:48:57.000000Z\", \"kode_barang\": \"BR-20250819-001\", \"nama_barang\": \"Adiking NPK\", \"stok_minimum\": 5}}', NULL, '2025-08-19 13:48:57', '2025-08-19 13:48:57'),
(272, 'default', 'created', 'App\\Models\\Satuan', 'created', 5, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 5, \"satuan\": \"Gram\", \"user_id\": 1, \"created_at\": \"2025-08-19T20:50:41.000000Z\", \"updated_at\": \"2025-08-19T20:50:41.000000Z\"}}', NULL, '2025-08-19 13:50:41', '2025-08-19 13:50:41'),
(273, 'default', 'deleted', 'App\\Models\\Barang', 'deleted', 19, 'App\\Models\\User', 1, '{\"old\": {\"id\": 19, \"stok\": 0, \"berat\": \"1.00\", \"harga\": \"60000.00\", \"user_id\": 1, \"jenis_id\": 2, \"deskripsi\": \"Pupuk cair\", \"satuan_id\": 4, \"created_at\": \"2025-08-19T20:48:57.000000Z\", \"updated_at\": \"2025-08-19T20:48:57.000000Z\", \"kode_barang\": \"BR-20250819-001\", \"nama_barang\": \"Adiking NPK\", \"stok_minimum\": 5}}', NULL, '2025-08-19 13:51:31', '2025-08-19 13:51:31'),
(274, 'default', 'created', 'App\\Models\\Barang', 'created', 20, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 20, \"stok\": 0, \"berat\": \"1.00\", \"harga\": \"60000.00\", \"user_id\": 1, \"jenis_id\": 2, \"satuan_id\": 4, \"created_at\": \"2025-08-19T21:02:48.000000Z\", \"updated_at\": \"2025-08-19T21:02:48.000000Z\", \"kode_barang\": \"BR-20250819-001\", \"nama_barang\": \"Adiking NPK\", \"stok_minimum\": 5}}', NULL, '2025-08-19 14:02:48', '2025-08-19 14:02:48'),
(275, 'default', 'created', 'App\\Models\\Barang', 'created', 21, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 21, \"stok\": 0, \"berat\": \"1.00\", \"harga\": \"35000.00\", \"user_id\": 1, \"jenis_id\": 2, \"satuan_id\": 4, \"created_at\": \"2025-08-19T21:04:43.000000Z\", \"updated_at\": \"2025-08-19T21:04:43.000000Z\", \"kode_barang\": \"BR-20250819-002\", \"nama_barang\": \"Adiking KCL\", \"stok_minimum\": 5}}', NULL, '2025-08-19 14:04:43', '2025-08-19 14:04:43'),
(276, 'default', 'created', 'App\\Models\\Barang', 'created', 22, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 22, \"stok\": 0, \"berat\": \"400.00\", \"harga\": \"35000.00\", \"user_id\": 1, \"jenis_id\": 4, \"satuan_id\": 5, \"created_at\": \"2025-08-19T21:06:48.000000Z\", \"updated_at\": \"2025-08-19T21:06:48.000000Z\", \"kode_barang\": \"BR-20250819-003\", \"nama_barang\": \"Miloxy\", \"stok_minimum\": 5}}', NULL, '2025-08-19 14:06:48', '2025-08-19 14:06:48'),
(277, 'default', 'created', 'App\\Models\\Satuan', 'created', 6, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 6, \"satuan\": \"Box\", \"user_id\": 1, \"created_at\": \"2025-08-19T21:13:49.000000Z\", \"updated_at\": \"2025-08-19T21:13:49.000000Z\"}}', NULL, '2025-08-19 14:13:49', '2025-08-19 14:13:49'),
(278, 'default', 'created', 'App\\Models\\Barang', 'created', 23, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 23, \"stok\": 0, \"berat\": \"10.00\", \"harga\": \"45000.00\", \"user_id\": 1, \"jenis_id\": 4, \"satuan_id\": 6, \"created_at\": \"2025-08-19T21:14:42.000000Z\", \"updated_at\": \"2025-08-19T21:14:42.000000Z\", \"kode_barang\": \"BR-20250819-004\", \"nama_barang\": \"Foltus 400SL\", \"stok_minimum\": 5}}', NULL, '2025-08-19 14:14:42', '2025-08-19 14:14:42'),
(279, 'default', 'created', 'App\\Models\\Satuan', 'created', 7, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 7, \"satuan\": \"Karton\", \"user_id\": 1, \"created_at\": \"2025-08-19T21:16:14.000000Z\", \"updated_at\": \"2025-08-19T21:16:14.000000Z\"}}', NULL, '2025-08-19 14:16:14', '2025-08-19 14:16:14'),
(280, 'default', 'updated', 'App\\Models\\Barang', 'updated', 20, 'App\\Models\\User', 1, '{\"old\": {\"satuan_id\": 4, \"updated_at\": \"2025-08-19T21:02:48.000000Z\"}, \"attributes\": {\"satuan_id\": 7, \"updated_at\": \"2025-08-19T21:24:35.000000Z\"}}', NULL, '2025-08-19 14:24:35', '2025-08-19 14:24:35'),
(281, 'default', 'updated', 'App\\Models\\Barang', 'updated', 21, 'App\\Models\\User', 1, '{\"old\": {\"satuan_id\": 4, \"updated_at\": \"2025-08-19T21:04:43.000000Z\"}, \"attributes\": {\"satuan_id\": 7, \"updated_at\": \"2025-08-19T21:24:52.000000Z\"}}', NULL, '2025-08-19 14:24:52', '2025-08-19 14:24:52'),
(282, 'default', 'updated', 'App\\Models\\Barang', 'updated', 22, 'App\\Models\\User', 1, '{\"old\": {\"berat\": \"400.00\", \"satuan_id\": 5, \"updated_at\": \"2025-08-19T21:06:48.000000Z\"}, \"attributes\": {\"berat\": \"7.00\", \"satuan_id\": 7, \"updated_at\": \"2025-08-19T21:26:53.000000Z\"}}', NULL, '2025-08-19 14:26:53', '2025-08-19 14:26:53'),
(283, 'default', 'updated', 'App\\Models\\Barang', 'updated', 20, 'App\\Models\\User', 1, '{\"old\": {\"satuan_id\": 7, \"updated_at\": \"2025-08-19T21:24:35.000000Z\"}, \"attributes\": {\"satuan_id\": 4, \"updated_at\": \"2025-08-19T21:28:45.000000Z\"}}', NULL, '2025-08-19 14:28:45', '2025-08-19 14:28:45'),
(284, 'default', 'updated', 'App\\Models\\Barang', 'updated', 21, 'App\\Models\\User', 1, '{\"old\": {\"satuan_id\": 7, \"updated_at\": \"2025-08-19T21:24:52.000000Z\"}, \"attributes\": {\"satuan_id\": 4, \"updated_at\": \"2025-08-19T21:28:53.000000Z\"}}', NULL, '2025-08-19 14:28:53', '2025-08-19 14:28:53'),
(285, 'default', 'updated', 'App\\Models\\Barang', 'updated', 22, 'App\\Models\\User', 1, '{\"old\": {\"berat\": \"7.00\", \"satuan_id\": 7, \"updated_at\": \"2025-08-19T21:26:53.000000Z\"}, \"attributes\": {\"berat\": \"400.00\", \"satuan_id\": 5, \"updated_at\": \"2025-08-19T21:29:13.000000Z\"}}', NULL, '2025-08-19 14:29:13', '2025-08-19 14:29:13'),
(286, 'default', 'updated', 'App\\Models\\Barang', 'updated', 23, 'App\\Models\\User', 1, '{\"old\": {\"berat\": \"10.00\", \"satuan_id\": 6, \"updated_at\": \"2025-08-19T21:14:42.000000Z\"}, \"attributes\": {\"berat\": \"1.00\", \"satuan_id\": 4, \"updated_at\": \"2025-08-19T21:30:09.000000Z\"}}', NULL, '2025-08-19 14:30:09', '2025-08-19 14:30:09'),
(287, 'default', 'created', 'App\\Models\\Barang', 'created', 24, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 24, \"stok\": 0, \"berat\": \"500.00\", \"harga\": \"2000000.00\", \"user_id\": 1, \"jenis_id\": 4, \"satuan_id\": 2, \"created_at\": \"2025-08-19T21:32:28.000000Z\", \"updated_at\": \"2025-08-19T21:32:28.000000Z\", \"kode_barang\": \"BR-20250819-005\", \"nama_barang\": \"Almerro\", \"stok_minimum\": 5}}', NULL, '2025-08-19 14:32:28', '2025-08-19 14:32:28'),
(288, 'default', 'updated', 'App\\Models\\Barang', 'updated', 24, 'App\\Models\\User', 1, '{\"old\": {\"harga\": \"2000000.00\", \"updated_at\": \"2025-08-19T21:32:28.000000Z\"}, \"attributes\": {\"harga\": \"200000.00\", \"updated_at\": \"2025-08-19T21:32:43.000000Z\"}}', NULL, '2025-08-19 14:32:43', '2025-08-19 14:32:43'),
(289, 'default', 'created', 'App\\Models\\Barang', 'created', 25, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 25, \"stok\": 0, \"berat\": \"100.00\", \"harga\": \"38000.00\", \"user_id\": 1, \"jenis_id\": 4, \"satuan_id\": 5, \"created_at\": \"2025-08-19T21:35:18.000000Z\", \"updated_at\": \"2025-08-19T21:35:18.000000Z\", \"kode_barang\": \"BR-20250819-006\", \"nama_barang\": \"Dragon 40 SP\", \"stok_minimum\": 5}}', NULL, '2025-08-19 14:35:18', '2025-08-19 14:35:18'),
(290, 'default', 'created', 'App\\Models\\Barang', 'created', 26, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 26, \"stok\": 0, \"berat\": \"400.00\", \"harga\": \"37000.00\", \"user_id\": 1, \"jenis_id\": 4, \"satuan_id\": 5, \"created_at\": \"2025-08-19T21:37:47.000000Z\", \"updated_at\": \"2025-08-19T21:37:47.000000Z\", \"kode_barang\": \"BR-20250819-007\", \"nama_barang\": \"Asfad\", \"stok_minimum\": 5}}', NULL, '2025-08-19 14:37:47', '2025-08-19 14:37:47'),
(291, 'default', 'updated', 'App\\Models\\Barang', 'updated', 26, 'App\\Models\\User', 1, '{\"old\": {\"updated_at\": \"2025-08-19T21:37:47.000000Z\", \"nama_barang\": \"Asfad\"}, \"attributes\": {\"updated_at\": \"2025-08-19T21:37:58.000000Z\", \"nama_barang\": \"Asfad 400\"}}', NULL, '2025-08-19 14:37:58', '2025-08-19 14:37:58'),
(292, 'default', 'created', 'App\\Models\\Barang', 'created', 27, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 27, \"stok\": 0, \"berat\": \"100.00\", \"harga\": \"28000.00\", \"user_id\": 1, \"jenis_id\": 4, \"satuan_id\": 5, \"created_at\": \"2025-08-19T21:38:36.000000Z\", \"updated_at\": \"2025-08-19T21:38:36.000000Z\", \"kode_barang\": \"BR-20250819-008\", \"nama_barang\": \"Asfad 100\", \"stok_minimum\": 5}}', NULL, '2025-08-19 14:38:36', '2025-08-19 14:38:36'),
(293, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 19, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 19, \"user_id\": 1, \"barang_id\": 20, \"created_at\": \"2025-08-19T21:40:26.000000Z\", \"updated_at\": \"2025-08-19T21:40:26.000000Z\", \"supplier_id\": 4, \"jumlah_masuk\": 10, \"tanggal_masuk\": \"2025-05-20\", \"kode_transaksi\": \"BM-20250819-001\"}}', NULL, '2025-08-19 14:40:26', '2025-08-19 14:40:26'),
(294, 'default', 'updated', 'App\\Models\\Barang', 'updated', 20, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 0, \"updated_at\": \"2025-08-19T21:28:45.000000Z\"}, \"attributes\": {\"stok\": 10, \"updated_at\": \"2025-08-19T21:40:26.000000Z\"}}', NULL, '2025-08-19 14:40:26', '2025-08-19 14:40:26'),
(295, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 25, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 25, \"user_id\": 1, \"barang_id\": 21, \"created_at\": \"2025-08-19T21:46:20.000000Z\", \"updated_at\": \"2025-08-19T21:46:20.000000Z\", \"supplier_id\": 4, \"jumlah_masuk\": 10, \"tanggal_masuk\": \"2025-05-20\", \"kode_transaksi\": \"BM-20250819-002\"}}', NULL, '2025-08-19 14:46:20', '2025-08-19 14:46:20'),
(296, 'default', 'updated', 'App\\Models\\Barang', 'updated', 21, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 0, \"updated_at\": \"2025-08-19T21:28:53.000000Z\"}, \"attributes\": {\"stok\": 10, \"updated_at\": \"2025-08-19T21:46:20.000000Z\"}}', NULL, '2025-08-19 14:46:20', '2025-08-19 14:46:20'),
(297, 'default', 'updated', 'App\\Models\\Barang', 'updated', 21, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 10, \"updated_at\": \"2025-08-19T21:46:20.000000Z\"}, \"attributes\": {\"stok\": 0, \"updated_at\": \"2025-08-19T21:46:41.000000Z\"}}', NULL, '2025-08-19 14:46:41', '2025-08-19 14:46:41'),
(298, 'default', 'updated', 'App\\Models\\Barang', 'updated', 21, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 0}, \"attributes\": {\"stok\": 10}}', NULL, '2025-08-19 14:46:41', '2025-08-19 14:46:41'),
(299, 'default', 'updated', 'App\\Models\\BarangMasuk', 'updated', 25, 'App\\Models\\User', 1, '{\"old\": {\"updated_at\": \"2025-08-19T21:46:20.000000Z\", \"tanggal_masuk\": \"2025-05-20\"}, \"attributes\": {\"updated_at\": \"2025-08-19T21:46:41.000000Z\", \"tanggal_masuk\": \"2025-05-30\"}}', NULL, '2025-08-19 14:46:41', '2025-08-19 14:46:41'),
(300, 'default', 'updated', 'App\\Models\\Barang', 'updated', 20, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 10, \"updated_at\": \"2025-08-19T21:40:26.000000Z\"}, \"attributes\": {\"stok\": 0, \"updated_at\": \"2025-08-19T21:46:51.000000Z\"}}', NULL, '2025-08-19 14:46:51', '2025-08-19 14:46:51'),
(301, 'default', 'updated', 'App\\Models\\Barang', 'updated', 20, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 0}, \"attributes\": {\"stok\": 10}}', NULL, '2025-08-19 14:46:51', '2025-08-19 14:46:51'),
(302, 'default', 'updated', 'App\\Models\\BarangMasuk', 'updated', 19, 'App\\Models\\User', 1, '{\"old\": {\"updated_at\": \"2025-08-19T21:40:26.000000Z\", \"tanggal_masuk\": \"2025-05-20\"}, \"attributes\": {\"updated_at\": \"2025-08-19T21:46:51.000000Z\", \"tanggal_masuk\": \"2025-05-30\"}}', NULL, '2025-08-19 14:46:51', '2025-08-19 14:46:51'),
(303, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 26, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 26, \"user_id\": 1, \"barang_id\": 22, \"created_at\": \"2025-08-19T21:47:21.000000Z\", \"updated_at\": \"2025-08-19T21:47:21.000000Z\", \"supplier_id\": 4, \"jumlah_masuk\": 7, \"tanggal_masuk\": \"2025-05-30\", \"kode_transaksi\": \"BM-20250819-003\"}}', NULL, '2025-08-19 14:47:21', '2025-08-19 14:47:21'),
(304, 'default', 'updated', 'App\\Models\\Barang', 'updated', 22, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 0, \"updated_at\": \"2025-08-19T21:29:13.000000Z\"}, \"attributes\": {\"stok\": 7, \"updated_at\": \"2025-08-19T21:47:21.000000Z\"}}', NULL, '2025-08-19 14:47:21', '2025-08-19 14:47:21'),
(305, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 27, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 27, \"user_id\": 1, \"barang_id\": 24, \"created_at\": \"2025-08-19T21:48:55.000000Z\", \"updated_at\": \"2025-08-19T21:48:55.000000Z\", \"supplier_id\": 4, \"jumlah_masuk\": 12, \"tanggal_masuk\": \"2025-06-19\", \"kode_transaksi\": \"BM-20250819-004\"}}', NULL, '2025-08-19 14:48:55', '2025-08-19 14:48:55'),
(306, 'default', 'updated', 'App\\Models\\Barang', 'updated', 24, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 0, \"updated_at\": \"2025-08-19T21:32:43.000000Z\"}, \"attributes\": {\"stok\": 12, \"updated_at\": \"2025-08-19T21:48:55.000000Z\"}}', NULL, '2025-08-19 14:48:55', '2025-08-19 14:48:55'),
(307, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 28, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 28, \"user_id\": 1, \"barang_id\": 23, \"created_at\": \"2025-08-19T21:49:59.000000Z\", \"updated_at\": \"2025-08-19T21:49:59.000000Z\", \"supplier_id\": 4, \"jumlah_masuk\": 10, \"tanggal_masuk\": \"2025-06-19\", \"kode_transaksi\": \"BM-20250819-005\"}}', NULL, '2025-08-19 14:49:59', '2025-08-19 14:49:59'),
(308, 'default', 'updated', 'App\\Models\\Barang', 'updated', 23, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 0, \"updated_at\": \"2025-08-19T21:30:09.000000Z\"}, \"attributes\": {\"stok\": 10, \"updated_at\": \"2025-08-19T21:49:59.000000Z\"}}', NULL, '2025-08-19 14:49:59', '2025-08-19 14:49:59'),
(309, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 29, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 29, \"user_id\": 1, \"barang_id\": 22, \"created_at\": \"2025-08-19T21:50:50.000000Z\", \"updated_at\": \"2025-08-19T21:50:50.000000Z\", \"supplier_id\": 4, \"jumlah_masuk\": 11, \"tanggal_masuk\": \"2025-06-19\", \"kode_transaksi\": \"BM-20250819-006\"}}', NULL, '2025-08-19 14:50:50', '2025-08-19 14:50:50'),
(310, 'default', 'updated', 'App\\Models\\Barang', 'updated', 22, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 7, \"updated_at\": \"2025-08-19T21:47:21.000000Z\"}, \"attributes\": {\"stok\": 18, \"updated_at\": \"2025-08-19T21:50:50.000000Z\"}}', NULL, '2025-08-19 14:50:50', '2025-08-19 14:50:50'),
(311, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 30, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 30, \"user_id\": 1, \"barang_id\": 25, \"created_at\": \"2025-08-19T21:51:12.000000Z\", \"updated_at\": \"2025-08-19T21:51:12.000000Z\", \"supplier_id\": 4, \"jumlah_masuk\": 1, \"tanggal_masuk\": \"2025-06-19\", \"kode_transaksi\": \"BM-20250819-007\"}}', NULL, '2025-08-19 14:51:12', '2025-08-19 14:51:12'),
(312, 'default', 'updated', 'App\\Models\\Barang', 'updated', 25, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 0, \"updated_at\": \"2025-08-19T21:35:18.000000Z\"}, \"attributes\": {\"stok\": 1, \"updated_at\": \"2025-08-19T21:51:12.000000Z\"}}', NULL, '2025-08-19 14:51:12', '2025-08-19 14:51:12'),
(313, 'default', 'created', 'App\\Models\\Barang', 'created', 28, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 28, \"stok\": 0, \"berat\": \"50.00\", \"harga\": \"597000.00\", \"user_id\": 1, \"jenis_id\": 1, \"satuan_id\": 1, \"created_at\": \"2025-08-19T21:53:28.000000Z\", \"updated_at\": \"2025-08-19T21:53:28.000000Z\", \"kode_barang\": \"BR-20250819-009\", \"nama_barang\": \"Nitrea\", \"stok_minimum\": 5}}', NULL, '2025-08-19 14:53:28', '2025-08-19 14:53:28'),
(314, 'default', 'updated', 'App\\Models\\Barang', 'updated', 28, 'App\\Models\\User', 1, '{\"old\": {\"updated_at\": \"2025-08-19T21:53:28.000000Z\", \"nama_barang\": \"Nitrea\"}, \"attributes\": {\"updated_at\": \"2025-08-19T21:53:42.000000Z\", \"nama_barang\": \"Nitrea 50KG\"}}', NULL, '2025-08-19 14:53:42', '2025-08-19 14:53:42'),
(315, 'default', 'updated', 'App\\Models\\Barang', 'updated', 28, 'App\\Models\\User', 1, '{\"old\": {\"harga\": \"597000.00\", \"updated_at\": \"2025-08-19T21:53:42.000000Z\"}, \"attributes\": {\"harga\": \"365000.00\", \"updated_at\": \"2025-08-19T21:54:18.000000Z\"}}', NULL, '2025-08-19 14:54:18', '2025-08-19 14:54:18'),
(316, 'default', 'deleted', 'App\\Models\\Jenis', 'deleted', 5, 'App\\Models\\User', 1, '{\"old\": {\"id\": 5, \"user_id\": 1, \"created_at\": \"2025-07-19T00:17:23.000000Z\", \"updated_at\": \"2025-07-19T00:17:23.000000Z\", \"jenis_barang\": \"Ton\"}}', NULL, '2025-08-19 22:54:25', '2025-08-19 22:54:25'),
(317, 'default', 'created', 'App\\Models\\Barang', 'created', 29, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 29, \"stok\": 0, \"berat\": \"50.00\", \"harga\": \"435750.00\", \"user_id\": 1, \"jenis_id\": 1, \"satuan_id\": 1, \"created_at\": \"2025-08-20T05:57:30.000000Z\", \"updated_at\": \"2025-08-20T05:57:30.000000Z\", \"kode_barang\": \"BR-20250820-001\", \"nama_barang\": \"NPK Biru Russia\", \"stok_minimum\": 5}}', NULL, '2025-08-19 22:57:30', '2025-08-19 22:57:30'),
(318, 'default', 'created', 'App\\Models\\Barang', 'created', 30, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 30, \"stok\": 0, \"berat\": \"20.00\", \"harga\": \"400000.00\", \"user_id\": 1, \"jenis_id\": 1, \"satuan_id\": 1, \"created_at\": \"2025-08-20T07:01:15.000000Z\", \"updated_at\": \"2025-08-20T07:01:15.000000Z\", \"kode_barang\": \"BR-20250820-002\", \"nama_barang\": \"Pupuk Mutiara\", \"stok_minimum\": 5}}', NULL, '2025-08-20 00:01:15', '2025-08-20 00:01:15'),
(319, 'default', 'updated', 'App\\Models\\Barang', 'updated', 20, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 10, \"updated_at\": \"2025-08-19T21:46:51.000000Z\"}, \"attributes\": {\"stok\": 3, \"updated_at\": \"2025-08-20T07:03:54.000000Z\"}}', NULL, '2025-08-20 00:03:54', '2025-08-20 00:03:54'),
(320, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 36, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 36, \"user_id\": 1, \"barang_id\": 20, \"created_at\": \"2025-08-20T07:03:54.000000Z\", \"updated_at\": \"2025-08-20T07:03:54.000000Z\", \"kelompok_id\": null, \"nama_barang\": \"Adiking NPK\", \"nama_pembeli\": null, \"jumlah_keluar\": 7, \"kode_transaksi\": \"BK-20250820-001\", \"tanggal_keluar\": \"2025-08-20\"}}', NULL, '2025-08-20 00:03:54', '2025-08-20 00:03:54'),
(321, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 31, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 31, \"user_id\": 1, \"barang_id\": 25, \"created_at\": \"2025-08-20T07:04:55.000000Z\", \"updated_at\": \"2025-08-20T07:04:55.000000Z\", \"supplier_id\": 4, \"jumlah_masuk\": 10, \"tanggal_masuk\": \"2025-08-20\", \"kode_transaksi\": \"BM-20250820-001\"}}', NULL, '2025-08-20 00:04:55', '2025-08-20 00:04:55'),
(322, 'default', 'updated', 'App\\Models\\Barang', 'updated', 25, 'App\\Models\\User', 1, '{\"old\": {\"stok\": 1, \"updated_at\": \"2025-08-19T21:51:12.000000Z\"}, \"attributes\": {\"stok\": 11, \"updated_at\": \"2025-08-20T07:04:55.000000Z\"}}', NULL, '2025-08-20 00:04:55', '2025-08-20 00:04:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `jenis_id` bigint UNSIGNED NOT NULL,
  `satuan_id` bigint UNSIGNED NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok_minimum` int NOT NULL,
  `stok` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `harga` decimal(12,2) DEFAULT '0.00',
  `berat` decimal(8,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id`, `user_id`, `jenis_id`, `satuan_id`, `kode_barang`, `nama_barang`, `stok_minimum`, `stok`, `created_at`, `updated_at`, `harga`, `berat`) VALUES
(20, 1, 2, 4, 'BR-20250819-001', 'Adiking NPK', 5, 3, '2025-08-19 14:02:48', '2025-08-20 00:03:54', 60000.00, 1.00),
(21, 1, 2, 4, 'BR-20250819-002', 'Adiking KCL', 5, 10, '2025-08-19 14:04:43', '2025-08-19 14:46:41', 35000.00, 1.00),
(22, 1, 4, 5, 'BR-20250819-003', 'Miloxy', 5, 18, '2025-08-19 14:06:48', '2025-08-19 14:50:50', 35000.00, 400.00),
(23, 1, 4, 4, 'BR-20250819-004', 'Foltus 400SL', 5, 10, '2025-08-19 14:14:42', '2025-08-19 14:49:59', 45000.00, 1.00),
(24, 1, 4, 2, 'BR-20250819-005', 'Almerro', 5, 12, '2025-08-19 14:32:28', '2025-08-19 14:48:55', 200000.00, 500.00),
(25, 1, 4, 5, 'BR-20250819-006', 'Dragon 40 SP', 5, 11, '2025-08-19 14:35:18', '2025-08-20 00:04:55', 38000.00, 100.00),
(26, 1, 4, 5, 'BR-20250819-007', 'Asfad 400', 5, 0, '2025-08-19 14:37:47', '2025-08-19 14:37:58', 37000.00, 400.00),
(27, 1, 4, 5, 'BR-20250819-008', 'Asfad 100', 5, 0, '2025-08-19 14:38:36', '2025-08-19 14:38:36', 28000.00, 100.00),
(28, 1, 1, 1, 'BR-20250819-009', 'Nitrea 50KG', 5, 0, '2025-08-19 14:53:28', '2025-08-19 14:54:18', 365000.00, 50.00),
(29, 1, 1, 1, 'BR-20250820-001', 'NPK Biru Russia', 5, 0, '2025-08-19 22:57:30', '2025-08-19 22:57:30', 435750.00, 50.00),
(30, 1, 1, 1, 'BR-20250820-002', 'Pupuk Mutiara', 5, 0, '2025-08-20 00:01:15', '2025-08-20 00:01:15', 400000.00, 20.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluars`
--

CREATE TABLE `barang_keluars` (
  `id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `kelompok_id` int DEFAULT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `nama_pembeli` varchar(255) DEFAULT NULL,
  `jumlah_keluar` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `barang_keluars`
--

INSERT INTO `barang_keluars` (`id`, `barang_id`, `user_id`, `kelompok_id`, `kode_transaksi`, `tanggal_keluar`, `nama_barang`, `nama_pembeli`, `jumlah_keluar`, `created_at`, `updated_at`) VALUES
(36, 20, 1, NULL, 'BK-20250820-001', '2025-08-20', 'Adiking NPK', NULL, 7, '2025-08-20 00:03:54', '2025-08-20 00:03:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuks`
--

CREATE TABLE `barang_masuks` (
  `id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED DEFAULT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `jumlah_masuk` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `barang_masuks`
--

INSERT INTO `barang_masuks` (`id`, `supplier_id`, `user_id`, `barang_id`, `kode_transaksi`, `tanggal_masuk`, `jumlah_masuk`, `created_at`, `updated_at`) VALUES
(19, 4, 1, 20, 'BM-20250819-001', '2025-05-30', 10, '2025-08-19 14:40:26', '2025-08-19 14:46:51'),
(25, 4, 1, 21, 'BM-20250819-002', '2025-05-30', 10, '2025-08-19 14:46:20', '2025-08-19 14:46:41'),
(26, 4, 1, 22, 'BM-20250819-003', '2025-05-30', 7, '2025-08-19 14:47:21', '2025-08-19 14:47:21'),
(27, 4, 1, 24, 'BM-20250819-004', '2025-06-19', 12, '2025-08-19 14:48:55', '2025-08-19 14:48:55'),
(28, 4, 1, 23, 'BM-20250819-005', '2025-06-19', 10, '2025-08-19 14:49:59', '2025-08-19 14:49:59'),
(29, 4, 1, 22, 'BM-20250819-006', '2025-06-19', 11, '2025-08-19 14:50:50', '2025-08-19 14:50:50'),
(30, 4, 1, 25, 'BM-20250819-007', '2025-06-19', 1, '2025-08-19 14:51:12', '2025-08-19 14:51:12'),
(31, 4, 1, 25, 'BM-20250820-001', '2025-08-20', 10, '2025-08-20 00:04:55', '2025-08-20 00:04:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_wa_sent_20_2025-08-20', 'b:1;', 1755673562),
('laravel_cache_wa_sent_20_2025-08-29', 'b:1;', 1756445656),
('laravel_cache_wa_sent_25_2025-08-20', 'b:1;', 1755673509),
('laravel_cache_wa_sent_26_2025-08-20', 'b:1;', 1755673654),
('laravel_cache_wa_sent_26_2025-08-29', 'b:1;', 1756445656),
('laravel_cache_wa_sent_27_2025-08-20', 'b:1;', 1755673654),
('laravel_cache_wa_sent_27_2025-08-29', 'b:1;', 1756445657),
('laravel_cache_wa_sent_28_2025-08-20', 'b:1;', 1755673655),
('laravel_cache_wa_sent_28_2025-08-29', 'b:1;', 1756445657),
('laravel_cache_wa_sent_29_2025-08-20', 'b:1;', 1755673655),
('laravel_cache_wa_sent_29_2025-08-29', 'b:1;', 1756445657),
('laravel_cache_wa_sent_30_2025-08-20', 'b:1;', 1755673563),
('laravel_cache_wa_sent_30_2025-08-29', 'b:1;', 1756445658);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id`, `user_id`, `jenis_barang`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pupuk', '2025-06-27 10:35:00', '2025-06-27 10:35:00'),
(2, 1, 'Pupuk Cair', '2025-06-27 10:42:33', '2025-06-27 10:42:33'),
(3, 1, 'Herbisida', '2025-07-17 01:35:27', '2025-07-17 01:35:27'),
(4, 1, 'insektisida', '2025-07-17 20:53:59', '2025-07-17 20:53:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok`
--

CREATE TABLE `kelompok` (
  `id` int NOT NULL,
  `nama_petani` varchar(100) NOT NULL,
  `kelompok_tani` varchar(100) DEFAULT NULL,
  `luas_lahan` decimal(10,2) NOT NULL COMMENT 'Dalam hektar',
  `diskon` decimal(5,2) DEFAULT '10.00',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `kelompok`
--

INSERT INTO `kelompok` (`id`, `nama_petani`, `kelompok_tani`, `luas_lahan`, `diskon`, `created_at`, `updated_at`) VALUES
(1, 'Joko', 'Kelompok Tani Sejahtera', 3000.00, 10.00, '2025-06-30 09:16:19', '2025-08-28 23:12:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(26, '0001_01_01_000000_create_users_table', 1),
(27, '0001_01_01_000001_create_cache_table', 1),
(28, '0001_01_01_000002_create_jobs_table', 1),
(29, '2025_06_26_193752_create_roles_table', 1),
(30, '2025_06_26_193920_add_role_id_to_users_table', 1),
(34, '2025_06_27_114814_create_activity_log_table', 2),
(35, '2025_06_27_114815_add_event_column_to_activity_log_table', 2),
(36, '2025_06_27_114816_add_batch_uuid_column_to_activity_log_table', 2),
(37, '2025_06_29_075439_add_status_to_suppliers_table', 3),
(38, '2025_06_29_164859_add_photo_to_users_table', 4),
(39, '2025_06_29_165332_add_photo_to_users_table', 5),
(40, '2025_06_29_185907_create_subsidis_table', 6),
(41, '2025_06_29_203950_add_status_to_users_table', 6),
(44, '2025_06_30_164510_add_subsidi_id_to_barang_keluars_table', 7),
(45, '2025_07_01_051337_remove_stok_from_barangs_table', 8),
(46, '2025_07_01_061458_add_stok_to_barangs_table', 9),
(47, '2025_07_01_065843_remove_nama_barang_from_barang_masuks_table', 10),
(48, '2025_07_06_192814_create_activity_log_table', 0),
(49, '2025_07_06_192814_create_barang_keluars_table', 0),
(50, '2025_07_06_192814_create_barang_masuks_table', 0),
(51, '2025_07_06_192814_create_barangs_table', 0),
(52, '2025_07_06_192814_create_cache_table', 0),
(53, '2025_07_06_192814_create_cache_locks_table', 0),
(54, '2025_07_06_192814_create_customers_table', 0),
(55, '2025_07_06_192814_create_failed_jobs_table', 0),
(56, '2025_07_06_192814_create_jenis_table', 0),
(57, '2025_07_06_192814_create_job_batches_table', 0),
(58, '2025_07_06_192814_create_jobs_table', 0),
(59, '2025_07_06_192814_create_kelompok_table', 0),
(60, '2025_07_06_192814_create_password_reset_tokens_table', 0),
(61, '2025_07_06_192814_create_penjualan_details_table', 0),
(62, '2025_07_06_192814_create_penjualans_table', 0),
(63, '2025_07_06_192814_create_roles_table', 0),
(64, '2025_07_06_192814_create_satuans_table', 0),
(65, '2025_07_06_192814_create_sessions_table', 0),
(66, '2025_07_06_192814_create_subsidi_barang_table', 0),
(67, '2025_07_06_192814_create_suppliers_table', 0),
(68, '2025_07_06_192814_create_users_table', 0),
(69, '2025_07_06_192817_add_foreign_keys_to_barang_keluars_table', 0),
(70, '2025_07_06_192817_add_foreign_keys_to_barang_masuks_table', 0),
(71, '2025_07_06_192817_add_foreign_keys_to_barangs_table', 0),
(72, '2025_07_06_192817_add_foreign_keys_to_jenis_table', 0),
(73, '2025_07_06_192817_add_foreign_keys_to_penjualan_details_table', 0),
(74, '2025_07_06_192817_add_foreign_keys_to_penjualans_table', 0),
(75, '2025_07_06_192817_add_foreign_keys_to_satuans_table', 0),
(76, '2025_07_06_192817_add_foreign_keys_to_subsidi_barang_table', 0),
(77, '2025_07_06_192817_add_foreign_keys_to_suppliers_table', 0),
(78, '2025_07_06_192817_add_foreign_keys_to_users_table', 0),
(79, '2025_07_10_153959_create_activity_log_table', 0),
(80, '2025_07_10_153959_create_barang_keluars_table', 0),
(81, '2025_07_10_153959_create_barang_masuks_table', 0),
(82, '2025_07_10_153959_create_barangs_table', 0),
(83, '2025_07_10_153959_create_cache_table', 0),
(84, '2025_07_10_153959_create_cache_locks_table', 0),
(85, '2025_07_10_153959_create_customers_table', 0),
(86, '2025_07_10_153959_create_failed_jobs_table', 0),
(87, '2025_07_10_153959_create_jenis_table', 0),
(88, '2025_07_10_153959_create_job_batches_table', 0),
(89, '2025_07_10_153959_create_jobs_table', 0),
(90, '2025_07_10_153959_create_kelompok_table', 0),
(91, '2025_07_10_153959_create_password_reset_tokens_table', 0),
(92, '2025_07_10_153959_create_penjualan_details_table', 0),
(93, '2025_07_10_153959_create_penjualans_table', 0),
(94, '2025_07_10_153959_create_roles_table', 0),
(95, '2025_07_10_153959_create_satuans_table', 0),
(96, '2025_07_10_153959_create_sessions_table', 0),
(97, '2025_07_10_153959_create_subsidi_barang_table', 0),
(98, '2025_07_10_153959_create_suppliers_table', 0),
(99, '2025_07_10_153959_create_users_table', 0),
(100, '2025_07_10_154002_add_foreign_keys_to_barang_keluars_table', 0),
(101, '2025_07_10_154002_add_foreign_keys_to_barang_masuks_table', 0),
(102, '2025_07_10_154002_add_foreign_keys_to_barangs_table', 0),
(103, '2025_07_10_154002_add_foreign_keys_to_jenis_table', 0),
(104, '2025_07_10_154002_add_foreign_keys_to_penjualan_details_table', 0),
(105, '2025_07_10_154002_add_foreign_keys_to_penjualans_table', 0),
(106, '2025_07_10_154002_add_foreign_keys_to_satuans_table', 0),
(107, '2025_07_10_154002_add_foreign_keys_to_subsidi_barang_table', 0),
(108, '2025_07_10_154002_add_foreign_keys_to_suppliers_table', 0),
(109, '2025_07_10_154002_add_foreign_keys_to_users_table', 0),
(110, '2025_07_10_192553_create_activity_log_table', 0),
(111, '2025_07_10_192553_create_barang_keluars_table', 0),
(112, '2025_07_10_192553_create_barang_masuks_table', 0),
(113, '2025_07_10_192553_create_barangs_table', 0),
(114, '2025_07_10_192553_create_cache_table', 0),
(115, '2025_07_10_192553_create_cache_locks_table', 0),
(116, '2025_07_10_192553_create_customers_table', 0),
(117, '2025_07_10_192553_create_failed_jobs_table', 0),
(118, '2025_07_10_192553_create_jenis_table', 0),
(119, '2025_07_10_192553_create_job_batches_table', 0),
(120, '2025_07_10_192553_create_jobs_table', 0),
(121, '2025_07_10_192553_create_kelompok_table', 0),
(122, '2025_07_10_192553_create_password_reset_tokens_table', 0),
(123, '2025_07_10_192553_create_penjualan_details_table', 0),
(124, '2025_07_10_192553_create_penjualans_table', 0),
(125, '2025_07_10_192553_create_roles_table', 0),
(126, '2025_07_10_192553_create_satuans_table', 0),
(127, '2025_07_10_192553_create_sessions_table', 0),
(128, '2025_07_10_192553_create_subsidi_barang_table', 0),
(129, '2025_07_10_192553_create_suppliers_table', 0),
(130, '2025_07_10_192553_create_users_table', 0),
(131, '2025_07_10_192556_add_foreign_keys_to_barang_keluars_table', 0),
(132, '2025_07_10_192556_add_foreign_keys_to_barang_masuks_table', 0),
(133, '2025_07_10_192556_add_foreign_keys_to_barangs_table', 0),
(134, '2025_07_10_192556_add_foreign_keys_to_jenis_table', 0),
(135, '2025_07_10_192556_add_foreign_keys_to_penjualan_details_table', 0),
(136, '2025_07_10_192556_add_foreign_keys_to_penjualans_table', 0),
(137, '2025_07_10_192556_add_foreign_keys_to_satuans_table', 0),
(138, '2025_07_10_192556_add_foreign_keys_to_subsidi_barang_table', 0),
(139, '2025_07_10_192556_add_foreign_keys_to_suppliers_table', 0),
(140, '2025_07_10_192556_add_foreign_keys_to_users_table', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualans`
--

CREATE TABLE `penjualans` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_penjualan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `customer_id` bigint UNSIGNED DEFAULT NULL,
  `kelompok_id` int DEFAULT NULL,
  `total` decimal(15,2) NOT NULL,
  `bayar` decimal(15,2) NOT NULL,
  `kembali` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penjualans`
--

INSERT INTO `penjualans` (`id`, `kode_penjualan`, `tanggal`, `customer_id`, `kelompok_id`, `total`, `bayar`, `kembali`, `created_at`, `updated_at`) VALUES
(34, 'PJ20250820070354', '2025-08-20', NULL, NULL, 420000.00, 420000.00, 0.00, '2025-08-20 00:03:54', '2025-08-20 00:03:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_details`
--

CREATE TABLE `penjualan_details` (
  `id` bigint UNSIGNED NOT NULL,
  `penjualan_id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint DEFAULT NULL,
  `kelompok_id` int DEFAULT NULL,
  `qty` int NOT NULL,
  `harga` decimal(15,2) NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `penjualan_details`
--

INSERT INTO `penjualan_details` (`id`, `penjualan_id`, `barang_id`, `customer_id`, `kelompok_id`, `qty`, `harga`, `subtotal`, `created_at`, `updated_at`) VALUES
(34, 34, 20, NULL, NULL, 7, 60000.00, 420000.00, '2025-08-20 00:03:54', '2025-08-20 00:03:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'admin', '', NULL, NULL),
(2, 'karyawan', '', NULL, NULL),
(3, 'Kepala gudang', 'Hak akses untuk kepala gudang', '2025-07-17 21:32:32', '2025-07-17 21:32:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuans`
--

CREATE TABLE `satuans` (
  `id` bigint UNSIGNED NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `satuans`
--

INSERT INTO `satuans` (`id`, `satuan`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Kilogram', 1, '2025-06-27 10:52:54', '2025-06-27 10:52:54'),
(2, 'Mililiter', 1, '2025-07-17 01:36:01', '2025-07-17 01:36:01'),
(3, 'Kwintal', 1, '2025-07-17 21:16:34', '2025-07-17 21:16:34'),
(4, 'Liter', 1, '2025-08-19 13:48:23', '2025-08-19 13:48:23'),
(5, 'Gram', 1, '2025-08-19 13:50:41', '2025-08-19 13:50:41'),
(6, 'Box', 1, '2025-08-19 14:13:49', '2025-08-19 14:13:49'),
(7, 'Karton', 1, '2025-08-19 14:16:14', '2025-08-19 14:16:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('l00ymeXBoZWOfd8mTtHel7Wa4bIOQeI7ETN0l8bK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYlFiaEx4N09mSU9OdWpEaURuMjVLNkZkQnl5azdHUG14Z3RpTW9IVyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1756823081);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subsidi_barang`
--

CREATE TABLE `subsidi_barang` (
  `id` int UNSIGNED NOT NULL,
  `kelompok_id` int DEFAULT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `harga_subsidi_per_kg` decimal(10,2) NOT NULL DEFAULT '0.00',
  `jatah_subsidi` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `subsidi_barang`
--

INSERT INTO `subsidi_barang` (`id`, `kelompok_id`, `barang_id`, `created_at`, `updated_at`, `harga_subsidi_per_kg`, `jatah_subsidi`) VALUES
(11, 1, 20, '2025-08-29 22:08:44', '2025-08-29 22:08:44', 2500.00, 150);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `user_id`, `supplier`, `alamat`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, 'PT. Agro Mitra Kimia', 'JL. Raya Bungah No. 27 Masangan Tengah Gresik Jawa Timur', 'Aktif', '2025-08-19 13:41:14', '2025-08-19 13:41:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `status`) VALUES
(1, 'izet', 'izet@gmail.com', 'izet99', '2025-07-15 22:04:05', '$2y$12$wbYvCGKM8i8O2a2QF0GBc.mq5Q2Aawg0iTZvjkMQmlWnmnziyA97C', 'GsTp5iOnoMT3QUD82uAAbIwlyFRcpIxptsRiEOexoah2bvhGbGbEQdZzjgG3', '2025-06-26 13:38:16', '2025-07-15 22:04:05', 1, 'active'),
(2, 'Farid', 'farid@gmail.com', 'farid', '2025-06-26 13:38:16', '$2y$12$Indzge8Xi3p9YDXp/4SWLucusGgtYveHWcEHcuEFq2j.ydapiQaVi', 'E2NrZHRMOoN2Fs85uNmNz5h3TjEFGD6eGMQW369V2kTEL5JETWUiQQskucET', '2025-06-26 13:38:16', '2025-06-26 13:38:16', 2, 'active');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `jenis_id` (`jenis_id`),
  ADD KEY `satuan_id` (`satuan_id`);

--
-- Indeks untuk tabel `barang_keluars`
--
ALTER TABLE `barang_keluars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `fk_barang_keluars_barang` (`barang_id`),
  ADD KEY `fk_barang_keluars_user` (`user_id`),
  ADD KEY `fk_barang_keluar_kelompok_id` (`kelompok_id`);

--
-- Indeks untuk tabel `barang_masuks`
--
ALTER TABLE `barang_masuks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `barang_masuks_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `penjualans`
--
ALTER TABLE `penjualans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_penjualans_kelompok_id` (`kelompok_id`);

--
-- Indeks untuk tabel `penjualan_details`
--
ALTER TABLE `penjualan_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan_details_penjualan_id_foreign` (`penjualan_id`),
  ADD KEY `penjualan_details_barang_id_foreign` (`barang_id`),
  ADD KEY `fk_penjualan_details_kelompok_id` (`kelompok_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `satuans`
--
ALTER TABLE `satuans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `subsidi_barang`
--
ALTER TABLE `subsidi_barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subsidi_id` (`kelompok_id`,`barang_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `barang_keluars`
--
ALTER TABLE `barang_keluars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `barang_masuks`
--
ALTER TABLE `barang_masuks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT untuk tabel `penjualans`
--
ALTER TABLE `penjualans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `penjualan_details`
--
ALTER TABLE `penjualan_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `satuans`
--
ALTER TABLE `satuans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `subsidi_barang`
--
ALTER TABLE `subsidi_barang`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `barangs_ibfk_2` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`),
  ADD CONSTRAINT `barangs_ibfk_3` FOREIGN KEY (`satuan_id`) REFERENCES `satuans` (`id`);

--
-- Ketidakleluasaan untuk tabel `barang_keluars`
--
ALTER TABLE `barang_keluars`
  ADD CONSTRAINT `barang_keluars_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_barang_keluar_kelompok_id` FOREIGN KEY (`kelompok_id`) REFERENCES `kelompok` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_barang_keluars_barang` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_barang_keluars_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_masuks`
--
ALTER TABLE `barang_masuks`
  ADD CONSTRAINT `barang_masuks_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `barang_masuks_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `barang_masuks_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD CONSTRAINT `jenis_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `penjualans`
--
ALTER TABLE `penjualans`
  ADD CONSTRAINT `fk_penjualans_kelompok_id` FOREIGN KEY (`kelompok_id`) REFERENCES `kelompok` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjualan_details`
--
ALTER TABLE `penjualan_details`
  ADD CONSTRAINT `fk_penjualan_details_kelompok_id` FOREIGN KEY (`kelompok_id`) REFERENCES `kelompok` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan_details_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`),
  ADD CONSTRAINT `penjualan_details_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `satuans`
--
ALTER TABLE `satuans`
  ADD CONSTRAINT `satuans_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `subsidi_barang`
--
ALTER TABLE `subsidi_barang`
  ADD CONSTRAINT `fk_subsidi_barang_kelompok_id` FOREIGN KEY (`kelompok_id`) REFERENCES `kelompok` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subsidi_barang_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `suppliers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
