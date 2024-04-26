-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 04:43 PM
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
-- Database: `imdbzclone`
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
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_07_24_092821_create_imdb_table', 1),
(5, '2023_09_06_084407_create_user_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Imdb_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `Imdb_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'tt1417299', '4', '2023-09-08 06:08:41', '2023-09-08 06:08:41'),
(5, 'tt13131350', '7', '2023-09-09 03:33:04', '2023-09-09 03:33:04'),
(28, 'tt1972591', '7', '2023-09-09 06:40:06', '2023-09-09 06:40:06'),
(29, 'tt0349683', '7', '2023-09-09 06:44:28', '2023-09-09 06:44:28'),
(30, 'tt8001092', '7', '2023-09-09 06:51:33', '2023-09-09 06:51:33'),
(36, 'tt16098700', '7', '2023-09-09 07:02:53', '2023-09-09 07:02:53'),
(37, 'tt2369135', '7', '2023-09-09 07:08:29', '2023-09-09 07:08:29'),
(38, 'tt0111257', '7', '2023-09-09 07:11:42', '2023-09-09 07:11:42'),
(39, 'tt0120179', '7', '2023-09-09 07:13:26', '2023-09-09 07:13:26'),
(40, 'tt11456054', '7', '2023-09-09 07:15:41', '2023-09-09 07:15:41'),
(41, 'tt2199571', '7', '2023-09-09 07:16:47', '2023-09-09 07:16:47'),
(45, 'tt15614668', '7', '2023-09-09 07:42:18', '2023-09-09 07:42:18'),
(57, 'tt2189461', '5', '2023-09-14 01:17:10', '2023-09-14 01:17:10'),
(58, 'tt13224828', '5', '2023-09-14 01:24:25', '2023-09-14 01:24:25'),
(59, 'tt3666724', '5', '2023-09-14 01:38:45', '2023-09-14 01:38:45'),
(60, 'tt0367110', '5', '2023-09-14 01:57:19', '2023-09-14 01:57:19'),
(63, 'tt11663228', '5', '2023-09-14 02:02:06', '2023-09-14 02:02:06'),
(64, 'tt11456054', '5', '2023-09-14 02:17:45', '2023-09-14 02:17:45'),
(65, 'tt7838252', '5', '2023-09-14 02:23:15', '2023-09-14 02:23:15'),
(68, 'tt6148156', '5', '2023-09-14 02:55:07', '2023-09-14 02:55:07'),
(69, 'tt0369179', '5', '2023-09-14 03:04:56', '2023-09-14 03:04:56'),
(70, 'tt1579592', '5', '2023-09-14 03:06:34', '2023-09-14 03:06:34'),
(71, 'tt2381249', '5', '2023-09-14 04:27:47', '2023-09-14 04:27:47'),
(72, 'tt0411951', '5', '2023-09-14 05:00:58', '2023-09-14 05:00:58'),
(73, 'tt0429493', '5', '2023-09-14 07:42:46', '2023-09-14 07:42:46'),
(74, 'tt2692250', '5', '2023-09-14 08:31:43', '2023-09-14 08:31:43'),
(75, 'tt1950186', '5', '2023-09-14 08:49:05', '2023-09-14 08:49:05'),
(76, 'tt0109830', '5', '2023-09-14 08:53:05', '2023-09-14 08:53:05'),
(77, 'tt1489428', '5', '2023-09-14 10:07:00', '2023-09-14 10:07:00'),
(78, 'tt9179430', '5', '2023-09-15 04:29:56', '2023-09-15 04:29:56'),
(80, 'tt1013752', '5', '2023-09-17 09:43:05', '2023-09-17 09:43:05'),
(83, 'tt9603212', '5', '2023-09-18 13:19:13', '2023-09-18 13:19:13'),
(84, 'tt0120755', '5', '2023-09-18 13:23:35', '2023-09-18 13:23:35'),
(85, 'tt1229238', '5', '2023-09-18 13:56:47', '2023-09-18 13:56:47');

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
  `user_id` bigint(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_mail`, `user_pass`, `created_at`, `updated_at`) VALUES
(4, 'manjunath', 'manjusk017@gmail.com', '123456', '2023-09-07 11:05:17', '2023-09-07 11:05:17'),
(5, 'lohit', 'manjusk1793@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2023-09-08 00:22:41', '2023-09-08 00:22:41'),
(6, 'jack', 'jacksk017@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2023-09-08 22:52:04', '2023-09-08 22:52:04'),
(7, 'Karn', 'karn017@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2023-09-08 23:06:35', '2023-09-08 23:06:35');

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
-- Indexes for table `movies`
--
ALTER TABLE `movies`
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
  ADD PRIMARY KEY (`user_id`);

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
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
