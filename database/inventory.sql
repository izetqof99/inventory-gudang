-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 18, 2026 at 06:06 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.30

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
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint UNSIGNED NOT NULL,
  `log_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint UNSIGNED DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `batch_uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
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
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `user_id`, `jenis_id`, `satuan_id`, `kode_barang`, `nama_barang`, `stok_minimum`, `stok`, `created_at`, `updated_at`, `harga`, `berat`) VALUES
(20, 1, 2, 4, 'BR-20250819-001', 'Adiking NPK', 5, 3, '2025-08-19 14:02:48', '2025-08-20 00:03:54', '60000.00', '1.00'),
(21, 1, 2, 4, 'BR-20250819-002', 'Adiking KCL', 5, 10, '2025-08-19 14:04:43', '2025-08-19 14:46:41', '35000.00', '1.00'),
(22, 1, 4, 5, 'BR-20250819-003', 'Miloxy', 5, 18, '2025-08-19 14:06:48', '2025-08-19 14:50:50', '35000.00', '400.00'),
(23, 1, 4, 4, 'BR-20250819-004', 'Foltus 400SL', 5, 10, '2025-08-19 14:14:42', '2025-08-19 14:49:59', '45000.00', '1.00'),
(24, 1, 4, 2, 'BR-20250819-005', 'Almerro', 5, 12, '2025-08-19 14:32:28', '2025-08-19 14:48:55', '200000.00', '500.00'),
(25, 1, 4, 5, 'BR-20250819-006', 'Dragon 40 SP', 5, 11, '2025-08-19 14:35:18', '2025-08-20 00:04:55', '38000.00', '100.00'),
(26, 1, 4, 5, 'BR-20250819-007', 'Asfad 400', 5, 0, '2025-08-19 14:37:47', '2025-08-19 14:37:58', '37000.00', '400.00'),
(27, 1, 4, 5, 'BR-20250819-008', 'Asfad 100', 5, 0, '2025-08-19 14:38:36', '2025-08-19 14:38:36', '28000.00', '100.00'),
(28, 1, 1, 1, 'BR-20250819-009', 'Nitrea 50KG', 5, 0, '2025-08-19 14:53:28', '2025-08-19 14:54:18', '365000.00', '50.00'),
(29, 1, 1, 1, 'BR-20250820-001', 'NPK Biru Russia', 5, 0, '2025-08-19 22:57:30', '2025-08-19 22:57:30', '435750.00', '50.00'),
(30, 1, 1, 1, 'BR-20250820-002', 'Pupuk Mutiara', 5, 0, '2025-08-20 00:01:15', '2025-08-20 00:01:15', '400000.00', '20.00');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluars`
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
-- Dumping data for table `barang_keluars`
--

INSERT INTO `barang_keluars` (`id`, `barang_id`, `user_id`, `kelompok_id`, `kode_transaksi`, `tanggal_keluar`, `nama_barang`, `nama_pembeli`, `jumlah_keluar`, `created_at`, `updated_at`) VALUES
(36, 20, 1, NULL, 'BK-20250820-001', '2025-08-20', 'Adiking NPK', NULL, 7, '2025-08-20 00:03:54', '2025-08-20 00:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuks`
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
-- Dumping data for table `barang_masuks`
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
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
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
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
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
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `user_id`, `jenis_barang`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pupuk', '2025-06-27 10:35:00', '2025-06-27 10:35:00'),
(2, 1, 'Pupuk Cair', '2025-06-27 10:42:33', '2025-06-27 10:42:33'),
(3, 1, 'Herbisida', '2025-07-17 01:35:27', '2025-07-17 01:35:27'),
(4, 1, 'insektisida', '2025-07-17 20:53:59', '2025-07-17 20:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
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
-- Dumping data for table `kelompok`
--

INSERT INTO `kelompok` (`id`, `nama_petani`, `kelompok_tani`, `luas_lahan`, `diskon`, `created_at`, `updated_at`) VALUES
(1, 'Joko', 'Kelompok Tani Sejahtera', '3000.00', '10.00', '2025-06-30 09:16:19', '2025-08-28 23:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penjualans`
--

CREATE TABLE `penjualans` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_penjualan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Dumping data for table `penjualans`
--

INSERT INTO `penjualans` (`id`, `kode_penjualan`, `tanggal`, `customer_id`, `kelompok_id`, `total`, `bayar`, `kembali`, `created_at`, `updated_at`) VALUES
(34, 'PJ20250820070354', '2025-08-20', NULL, NULL, '420000.00', '420000.00', '0.00', '2025-08-20 00:03:54', '2025-08-20 00:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_details`
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
-- Dumping data for table `penjualan_details`
--

INSERT INTO `penjualan_details` (`id`, `penjualan_id`, `barang_id`, `customer_id`, `kelompok_id`, `qty`, `harga`, `subtotal`, `created_at`, `updated_at`) VALUES
(34, 34, 20, NULL, NULL, 7, '60000.00', '420000.00', '2025-08-20 00:03:54', '2025-08-20 00:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'admin', '', NULL, NULL),
(2, 'karyawan', '', NULL, NULL),
(3, 'Kepala gudang', 'Hak akses untuk kepala gudang', '2025-07-17 21:32:32', '2025-07-17 21:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `satuans`
--

CREATE TABLE `satuans` (
  `id` bigint UNSIGNED NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `satuans`
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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('puDzfHbtMxtXFdq5W8C239kN0NADrbNNTCnSHHGt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic0dNMFBHY2xRekxvc0pHRHFmUXRhb0dOdldQVDNPY01TalNLUnRqNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1773830979),
('STZA44pjHBsmUbVZi49IskWhxjSlKd8TdrceiAgG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibFZsQlNtcWdhRzJmWmM2dTlBRDdyYjB6ZU5qc0EzUWdQeWlFVE9aRCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1773857102),
('sWpQpHpGuSXfVp4xE3CAbVcQfdCurEtmA21t6PZw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYW8zYmFKNEpoeWE3YUtyVXF5anh4WlBoMUNaVmViaG9JTDRwQW54QiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1773829739),
('vXnPDPvaqaMsDTsVLLFqePrHVNc142m7vXM7KYII', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNERzM3plNGJSMjNCQWNoSTZPRTZFZlRwbHREZ21POVpUckk2ZTBhcyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1773840918);

-- --------------------------------------------------------

--
-- Table structure for table `subsidi_barang`
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
-- Dumping data for table `subsidi_barang`
--

INSERT INTO `subsidi_barang` (`id`, `kelompok_id`, `barang_id`, `created_at`, `updated_at`, `harga_subsidi_per_kg`, `jatah_subsidi`) VALUES
(11, 1, 20, '2025-08-29 22:08:44', '2025-08-29 22:08:44', '2500.00', 150);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
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
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `user_id`, `supplier`, `alamat`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, 'PT. Agro Mitra Kimia', 'JL. Raya Bungah No. 27 Masangan Tengah Gresik Jawa Timur', 'Aktif', '2025-08-19 13:41:14', '2025-08-19 13:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `status`) VALUES
(1, 'Fakhri', 'fakhri06@gmail.com', 'fakhri99', '2026-03-18 03:11:45', '$2y$12$aOX89ztK95ewAKLuZeGIUOvyDn5SGTNNLaP2m5vpK0D8i9PG.EWCC', 'CGf9lA7VkXmPk0C52JKC8WJOV20iUw2CgDMG7ceD0if1s8iWrx20zIqL5qfR', '2025-06-26 13:38:16', '2026-03-18 11:04:43', 1, 'active'),
(7, 'zidan', 'zidane@outlook.com', 'zidane3', '2026-03-18 03:10:01', '$2y$12$9C3o.9xBRF7vEGAWAW4ntewKDK7xmWNqedMZyX/s9IZwT.x.3vWza', NULL, '2026-03-18 03:09:37', '2026-03-18 03:10:01', 2, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `jenis_id` (`jenis_id`),
  ADD KEY `satuan_id` (`satuan_id`);

--
-- Indexes for table `barang_keluars`
--
ALTER TABLE `barang_keluars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `fk_barang_keluars_barang` (`barang_id`),
  ADD KEY `fk_barang_keluars_user` (`user_id`),
  ADD KEY `fk_barang_keluar_kelompok_id` (`kelompok_id`);

--
-- Indexes for table `barang_masuks`
--
ALTER TABLE `barang_masuks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `barang_masuks_barang_id_foreign` (`barang_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penjualans`
--
ALTER TABLE `penjualans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_penjualans_kelompok_id` (`kelompok_id`);

--
-- Indexes for table `penjualan_details`
--
ALTER TABLE `penjualan_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan_details_penjualan_id_foreign` (`penjualan_id`),
  ADD KEY `penjualan_details_barang_id_foreign` (`barang_id`),
  ADD KEY `fk_penjualan_details_kelompok_id` (`kelompok_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuans`
--
ALTER TABLE `satuans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subsidi_barang`
--
ALTER TABLE `subsidi_barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subsidi_id` (`kelompok_id`,`barang_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `barang_keluars`
--
ALTER TABLE `barang_keluars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `barang_masuks`
--
ALTER TABLE `barang_masuks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `penjualans`
--
ALTER TABLE `penjualans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `penjualan_details`
--
ALTER TABLE `penjualan_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `satuans`
--
ALTER TABLE `satuans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subsidi_barang`
--
ALTER TABLE `subsidi_barang`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `barangs_ibfk_2` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`),
  ADD CONSTRAINT `barangs_ibfk_3` FOREIGN KEY (`satuan_id`) REFERENCES `satuans` (`id`);

--
-- Constraints for table `barang_keluars`
--
ALTER TABLE `barang_keluars`
  ADD CONSTRAINT `barang_keluars_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_barang_keluar_kelompok_id` FOREIGN KEY (`kelompok_id`) REFERENCES `kelompok` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_barang_keluars_barang` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_barang_keluars_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `barang_masuks`
--
ALTER TABLE `barang_masuks`
  ADD CONSTRAINT `barang_masuks_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `barang_masuks_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `barang_masuks_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `jenis`
--
ALTER TABLE `jenis`
  ADD CONSTRAINT `jenis_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `penjualans`
--
ALTER TABLE `penjualans`
  ADD CONSTRAINT `fk_penjualans_kelompok_id` FOREIGN KEY (`kelompok_id`) REFERENCES `kelompok` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan_details`
--
ALTER TABLE `penjualan_details`
  ADD CONSTRAINT `fk_penjualan_details_kelompok_id` FOREIGN KEY (`kelompok_id`) REFERENCES `kelompok` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan_details_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`),
  ADD CONSTRAINT `penjualan_details_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `satuans`
--
ALTER TABLE `satuans`
  ADD CONSTRAINT `satuans_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `subsidi_barang`
--
ALTER TABLE `subsidi_barang`
  ADD CONSTRAINT `fk_subsidi_barang_kelompok_id` FOREIGN KEY (`kelompok_id`) REFERENCES `kelompok` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subsidi_barang_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `suppliers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
