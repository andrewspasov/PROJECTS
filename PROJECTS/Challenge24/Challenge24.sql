-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 29, 2023 at 03:12 AM
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
-- Database: `Challenge24`
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
(5, '2023_12_17_232437_create_projects_table', 1),
(6, '2023_12_17_233438_create_users_table', 2);

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `project_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `subtitle`, `description`, `image_url`, `project_url`, `created_at`, `updated_at`) VALUES
(2, 'MAN UTD', 'FC', 'Voluptatem ipsum dolor culpa magni quas eos magni. Veritatis commodi ut non aspernatur nostrum quibusdam. Quasi dolorum et sit officia expedita recusandae magnam.', 'https://upload.wikimedia.org/wikipedia/en/thumb/7/7a/Manchester_United_FC_crest.svg/1920px-Manchester_United_FC_crest.svg.png', 'http://boyle.info/et-consequatur-a-quo', '2023-12-17 22:46:05', '2023-12-29 01:10:33'),
(3, 'rem est exercitationem', 'Quis est explicabo iste labore laboriosam at sequi.', 'Ut vel facere et consectetur consectetur ut occaecati. Similique quidem aspernatur sunt in nobis eum enim.', 'https://via.placeholder.com/640x480.png/0044ee?text=dolores', 'http://littel.com/', '2023-12-17 22:46:05', '2023-12-17 22:46:05'),
(4, 'totam exercitationem perferendis', 'Aut vero ipsum expedita in.', 'Ipsum fugiat praesentium rerum quam. Voluptatem ea minima sit sit qui magni. Fugit saepe autem repellat culpa asperiores fugiat.', 'https://via.placeholder.com/640x480.png/00bb88?text=quaerat', 'http://rowe.com/', '2023-12-17 22:46:05', '2023-12-17 22:46:05'),
(5, 'consequuntur et autem', 'Est veritatis et pariatur non provident aut.', 'Vitae unde perferendis nihil aliquam optio veniam. Ea voluptas nisi cumque architecto corporis cumque id. Ut magni vel eaque officia illo. Earum ducimus eos qui accusantium autem delectus aut.', 'https://via.placeholder.com/640x480.png/00dd99?text=cum', 'http://hermann.com/sequi-vero-sunt-explicabo-ut-enim-natus-aliquam.html', '2023-12-17 22:46:05', '2023-12-17 22:46:05'),
(6, 'enim quis qui', 'Aut molestias distinctio suscipit dignissimos.', 'Dicta omnis accusamus sint sapiente. In eos omnis et quia aut similique molestias. Ab occaecati saepe quibusdam aliquam rerum tempora esse nam.', 'https://via.placeholder.com/640x480.png/007700?text=culpa', 'http://www.schuppe.com/', '2023-12-17 22:46:05', '2023-12-17 22:46:05'),
(7, 'sit molestiae minima', 'Sunt fugiat suscipit fuga.', 'Accusamus sed veritatis id repellat non enim voluptas aut. Voluptas optio facilis iste unde consequatur omnis enim. Cumque aut at est.', 'https://via.placeholder.com/640x480.png/005544?text=officiis', 'http://www.mckenzie.net/quo-sit-explicabo-fugit-facere-occaecati-eum-doloribus-laudantium.html', '2023-12-17 22:46:05', '2023-12-17 22:46:05'),
(8, 'itaque temporibus repellendus', 'Accusantium reiciendis sunt quod accusamus rerum.', 'Debitis vel error maiores. Et voluptatibus reprehenderit quia hic. Placeat ea velit est molestiae itaque.', 'https://via.placeholder.com/640x480.png/0088cc?text=aut', 'http://schuster.com/', '2023-12-17 22:46:05', '2023-12-17 22:46:05'),
(9, 'qui neque dignissimos', 'Pariatur rem laudantium labore reiciendis fuga rem.', 'Perferendis omnis fugiat exercitationem. Quia quasi officiis laborum illo. Quas nemo in omnis non quas. Molestiae eum culpa similique aut non delectus.', 'https://via.placeholder.com/640x480.png/007755?text=unde', 'https://www.wilkinson.org/labore-saepe-est-earum-nihil', '2023-12-17 22:46:05', '2023-12-17 22:46:05'),
(19, 'few', 'wef', 'efw', 'https://media.cnn.com/api/v1/images/stellar/prod/230621042149-01-cristiano-ronaldo-euro-200-apps-062023-restricted.jpg?c=16x9&q=h_653,w_1160,c_fill/f_webp', 'https://www.facebook.com/', '2023-12-29 00:56:45', '2023-12-29 00:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'andrewspasov@yahoo.com', NULL, '$2y$12$Iu1YCl9Ik/HLq24/OPYsk.2Tu9WoyvZtTLifh3SJ81CqHymyzPYcW', NULL, NULL, NULL);

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
