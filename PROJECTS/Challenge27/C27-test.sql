-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 04, 2024 at 05:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `C27-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_30_231417_create_vehicles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `plate_number` varchar(255) NOT NULL,
  `insurance_date` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `brand`, `model`, `plate_number`, `insurance_date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'BMW', '911', 'DB-3391', '2023-07-07', '2024-02-01 22:30:04', '2024-01-31 23:46:43', '2024-02-01 22:30:04'),
(2, 'Hyundaissssssdewdwedwedw', 'A 112', 'NV-6964', '2023-03-16', NULL, '2024-01-31 23:46:43', '2024-02-01 23:24:41'),
(3, 'Maruti', '9-3 X', 'BO-5700', '2023-11-27', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(4, 'BugattiMOMMFMOEF', '124', 'KR-3197', '2023-07-16', NULL, '2024-01-31 23:46:43', '2024-02-01 23:21:08'),
(5, 'RezvaniNNJNJIOJ', 'DG-C2', 'VR-6242325325312414', '2023-10-16', NULL, '2024-01-31 23:46:43', '2024-02-01 23:08:39'),
(6, 'Abarth', 'Runna', 'QI-2676', '2023-06-08', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(7, 'Daf', '3', 'GN-1811', '2023-10-27', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(8, 'LTI', 'Suv', 'HF-1634', '2023-12-03', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(9, 'FSO', 'Lobo', 'NQ-8741', '2024-01-22', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(10, 'ALPINE', 'Ibiza', 'UJ-9395', '2023-05-01', NULL, '2024-01-31 23:46:43', '2024-02-01 23:38:35'),
(11, 'Skoda', 'ZX40', 'EW-9313', '2023-09-15', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(12, 'Toyota', '600R', 'VX-2629', '2023-08-04', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(13, 'Gonow', 'H1', 'VM-8231', '2023-11-18', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(14, 'Bristol', '1310', 'LQ-2341', '2024-01-05', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(15, 'McLaren', '98', 'NC-6279', '2023-07-27', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(16, 'Dadi', 'City', 'TS-8162', '2023-08-24', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(17, 'Geely', 'Gonow', 'EG-0335', '2023-11-18', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(18, 'Chevrolet', 'Maxus', 'US-6067', '2023-05-02', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(19, 'Adler', 'KYRON DELUXE', 'GH-2701', '2023-03-07', '2024-02-01 22:26:26', '2024-01-31 23:46:43', '2024-02-01 22:26:26'),
(20, 'Renault', 'GT', 'RA-8678', '2023-09-22', '2024-02-01 22:25:12', '2024-01-31 23:46:43', '2024-02-01 22:25:12'),
(21, 'Hafei', 'Fortwo', 'HL-3835', '2023-12-08', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(22, 'Norster', 'S7', 'PG-1205', '2023-12-28', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(23, 'Honda', 'V2', 'XE-7206', '2023-11-03', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(24, 'Marshell', 'Golden Spirit', 'EQ-1643', '2023-07-10', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(25, 'Blonell', 'Range Rover Evoque', 'SE-7314', '2023-08-10', '2024-02-01 22:27:10', '2024-01-31 23:46:43', '2024-02-01 22:27:10'),
(26, 'Ferrari', '750', 'VD-2139', '2023-09-21', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(27, 'Talbot', 'Blackwood', 'BI-2968', '2023-12-01', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(28, 'Daimler', 'PW', 'FF-1569', '2023-11-28', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(29, 'Wanfeng', 'DR5', 'ZN-7031', '2023-04-01', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(30, 'Abarth', 'Comanche', 'NC-1670', '2023-07-17', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(31, 'Saab', 'Kappa', 'XU-6192', '2023-03-31', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(32, 'Praga Baby', 'Marshal', 'QC-4372', '2023-12-16', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(33, 'Citroen', 'Bravada', 'ZA-8252', '2023-08-26', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(34, 'UPDATE', 'UPDATE', 'UPDATE', '2022-12-12', NULL, '2024-01-31 23:46:43', '2024-02-01 22:21:41'),
(35, 'Beijing', '420', 'RM-5539', '2023-03-03', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(36, 'Sceo', '570 GT', 'HC-9279', '2023-08-04', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(37, 'Artega', 'SP:01iujiu', 'HR-6393', '2023-03-23', NULL, '2024-01-31 23:46:43', '2024-02-01 23:36:51'),
(38, 'SUBARU', 'sa', 'QL-1744', '2024-01-30', NULL, '2024-01-31 23:46:43', '2024-02-01 23:43:21'),
(39, 'Studebaker', 'Cambiano', 'JM-9514', '2023-06-09', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(40, 'Buick', 'Sahin', 'QE-5735', '2023-04-06', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(41, 'FSO', 'D-Max', 'NS-9238', '2024-01-07', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(42, 'Acura', '206 СС', 'QF-7053', '2023-04-11', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(43, 'BMW', 'LZW', 'AR-9666', '2023-12-22', '2024-02-01 23:25:26', '2024-01-31 23:46:43', '2024-02-01 23:25:26'),
(44, 'Alfa Romeo', 'Regal GS', 'XE-7844', '2023-12-30', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(45, 'Hummer', 'Summit', 'AV-3898', '2023-05-15', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(46, 'Volkswagen', 'Cabriolet', 'GV-3671', '2024-01-12', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(47, 'Volkswagen', '3000', 'NJ-1286', '2023-09-24', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(48, 'Dagger', 'SA310 Swift', 'HD-2400', '2023-11-03', NULL, '2024-01-31 23:46:43', '2024-01-31 23:46:43'),
(49, 'Daihatsu', 'C', 'YU-1174', '2023-07-01', '2024-02-01 23:45:05', '2024-01-31 23:46:43', '2024-02-01 23:45:05'),
(50, 'Soyat', '2600', 'DN-7865', '2023-10-24', '2024-02-01 22:24:52', '2024-01-31 23:46:43', '2024-02-01 22:24:52'),
(51, 'testing', 'test', 'test', '2024-11-24', '2024-02-01 23:44:54', '2024-02-01 22:14:03', '2024-02-01 23:44:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicles_plate_number_unique` (`plate_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
