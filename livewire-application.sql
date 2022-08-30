-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- হোষ্ট: 127.0.0.1
-- তৈরী করতে ব্যবহৃত সময়: আগ 24, 2022 at 09:32 PM
-- সার্ভার সংস্করন: 10.4.20-MariaDB
-- পিএইছপির সংস্করন: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- ডাটাবেইজ: `livewire-application`
--

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `members` text COLLATE utf8mb4_unicode_ci DEFAULT 'null',
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `appointments`
--

INSERT INTO `appointments` (`id`, `client_id`, `date`, `time`, `status`, `note`, `created_at`, `updated_at`, `members`, `color`, `order_position`) VALUES
(10, 5, '2022-07-20', '20:20:00', 'SCHEDULED', '', '2022-06-30 07:15:34', '2022-08-11 23:25:58', '[\"Alaska\",\"Delaware\",\"Washington\"]', NULL, 1),
(12, 2, '2022-09-10', '12:00:00', 'SCHEDULED', '<p>Hey</p>', '2022-07-01 17:37:10', '2022-08-12 10:52:13', 'null', NULL, 5),
(20, 1, '2022-08-15', '12:44:00', 'CLOSED', '<p>hggfh</p>', '2022-07-06 04:44:29', '2022-08-12 10:52:13', 'null', NULL, 4),
(21, 2, '2022-07-07', '19:08:00', 'CLOSED', '<p>ertgdfg</p>', '2022-07-07 13:08:54', '2022-08-12 10:52:13', 'null', NULL, 7),
(22, 3, '2022-07-14', '20:08:00', 'CLOSED', '<p>ertgdfg</p>', '2022-07-07 13:09:02', '2022-08-12 10:52:13', 'null', NULL, 15),
(30, 2, '2022-07-16', '04:50:00', 'CLOSED', '<p>lsflsjf</p>', '2022-07-26 18:30:29', '2022-08-12 10:52:13', 'null', NULL, 13),
(31, 2, '2022-07-30', '10:00:00', 'SCHEDULED', '<p>dsf</p>', '2022-07-29 02:59:00', '2022-08-12 10:52:13', '[\"California\",\"Tennessee\",\"Texas\"]', NULL, 11),
(32, 2, '2022-08-05', '10:00:00', 'SCHEDULED', '<p>dfgdf</p>', '2022-07-29 03:00:46', '2022-08-12 10:52:13', '[\"Delaware\",\"Tennessee\"]', NULL, 14),
(33, 1, '2022-08-04', '10:00:00', 'SCHEDULED', '<p>hgjg</p>', '2022-07-29 03:01:21', '2022-08-12 10:52:13', '[\"Alabama\",\"Alaska\"]', NULL, 12),
(34, 4, '2022-07-30', '10:00:00', 'SCHEDULED', '<p>dsfa</p>', '2022-07-29 03:03:33', '2022-08-12 10:52:13', '[\"Texas\",\"Washington\"]', NULL, 3),
(35, 3, '2022-08-06', '10:00:00', 'SCHEDULED', '<p>fjfgjh</p>', '2022-07-29 03:05:18', '2022-08-12 10:52:13', '[\"Tennessee\",\"Texas\"]', NULL, 16),
(36, 3, '2022-08-20', '11:00:00', 'CLOSED', '<p>fjfgjh</p>', '2022-07-28 21:06:10', '2022-08-12 17:25:58', '[\"Alabama\",\"Alaska\",\"California\",\"Tennessee\",\"Texas\",\"Washington\"]', NULL, 2),
(37, 2, '2022-08-06', '10:18:00', 'SCHEDULED', '<p>yui</p>', '2022-07-29 03:18:29', '2022-08-12 10:52:13', '[\"Washington\"]', NULL, 10),
(38, 2, '2022-08-04', '10:19:00', 'SCHEDULED', '<p>gghj</p>', '2022-07-29 03:20:02', '2022-08-12 10:52:13', '[\"California\",\"Tennessee\"]', NULL, 8),
(40, 1, '2022-08-04', '17:01:00', 'SCHEDULED', '<p>sfsd</p>', '2022-07-29 10:01:12', '2022-08-12 10:52:13', '[\"California\"]', NULL, 6),
(43, 4, '2022-07-30', '14:35:00', 'SCHEDULED', '', '2022-07-29 22:33:34', '2022-08-12 04:52:13', '[\"Delaware\",\"Washington\"]', '#117537', 9);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `clients`
--

INSERT INTO `clients` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Camilla Kozey', '2022-06-30 02:25:13', '2022-06-30 02:25:13'),
(2, 'Darren Gulgowski', '2022-06-30 02:25:17', '2022-06-30 02:25:17'),
(3, 'Lucas Towne', '2022-06-30 02:25:18', '2022-06-30 02:25:18'),
(4, 'Ms. Abigale Bartell I', '2022-06-30 02:25:19', '2022-06-30 02:25:19'),
(5, 'Christ Abshire', '2022-06-30 02:25:20', '2022-06-30 02:25:20');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `conversations`
--

CREATE TABLE `conversations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `conversations`
--

INSERT INTO `conversations` (`id`, `sender_id`, `receiver_id`, `created_at`, `updated_at`) VALUES
(1, 24, 3, '2022-08-10 05:58:13', '2022-08-17 05:58:13'),
(3, 24, 5, '2022-08-10 05:58:13', '2022-08-17 05:58:13');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conversation_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_30_040249_create_clients_table', 2),
(6, '2022_06_30_040602_create_appointments_table', 2),
(8, '2022_07_06_225528_add_avatar_field_to_users_table', 3),
(9, '2014_10_12_200000_add_two_factor_columns_to_users_table', 4),
(10, '2022_07_26_110809_add_role_field_to_users_table', 5),
(11, '2022_07_29_085409_add_members_field_to_appointments_table', 6),
(12, '2022_07_29_215442_add_color_field_to_appointments_table', 7),
(16, '2022_08_01_001055_create_settings_table', 8),
(17, '2022_08_12_100825_add_order_position_to_appointments_table', 9),
(18, '2022_08_17_102814_create_conversations_table', 10),
(19, '2022_08_17_102858_create_messages_table', 10);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_collapse` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_email`, `site_title`, `footer_text`, `sidebar_collapse`, `created_at`, `updated_at`) VALUES
(2, 'Multipurpose Laravel & Livewire', 'softeng.kaziomar@gmail.com', 't-Super Shop', '<strong>Copyright &copy; 2022 <a href=\"https://facebook.com/kaziomar144\">KAZI OMAR FARUK</a>.</strong> All rights reserved.', 0, '2022-08-04 17:33:16', '2022-08-12 17:17:56');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `avatar`, `role`) VALUES
(3, 'MD. OMAR FARUK', 'softeng.kaziomar@gmail.com', NULL, '$2y$10$aJrTBHyXZ4bxDacT1aqOB.W8GGRQUKeXC3TDYuSDbrbCFse9cptNW', NULL, NULL, NULL, NULL, '2022-06-29 06:46:47', '2022-08-17 05:57:39', 'e5tUmZbcNtZtRNstNGn6Vjj9MTQOYh8umVHbw5IZ.jpg', 'user'),
(5, 'Hasan', 'hasan222@gmail.com', NULL, '$2y$10$guOG3PFto8c6I1C9.SkjnuYBzQuczbguT30319XwM31Z/NFRmX5vC', NULL, NULL, NULL, NULL, '2022-06-29 10:17:56', '2022-07-31 17:10:02', NULL, 'user'),
(6, 'Hedley Bright', 'janidusar@mailinator.com', NULL, '$2y$10$TQ58EDVnY//3xq8.wAK5POtwhFfTqOuaPl8U0ufnz.O1bkw6y6Kwa', NULL, NULL, NULL, NULL, '2022-06-29 11:04:19', '2022-07-31 17:10:04', NULL, 'user'),
(7, 'Charissa Cole', 'bafe@mailinator.com', NULL, '$2y$10$vJ10ODUacTv45s7VDxKSJu/trOGiRkCNzOzIUDQMjBMXSIexAxWjy', NULL, NULL, NULL, NULL, '2022-06-29 11:19:17', '2022-06-29 11:19:17', NULL, 'user'),
(8, 'Naida Kirby', 'ceqiva@mailinator.com', NULL, '$2y$10$aL28S1E/qThjV5cV64p5VOdGub4QUbWraHtspDMfeVsu7FXaRpt3y', NULL, NULL, NULL, NULL, '2022-06-29 11:20:00', '2022-06-29 11:20:00', NULL, 'user'),
(15, 'Bianca Alvarado', 'wowuf@mailinator.com', NULL, '$2y$10$/OFtGCemxWPBCqzXiJ21H.m.GwUa8YCiR.61wLFNYR/zhRAdwV3bG', NULL, NULL, NULL, NULL, '2022-06-29 21:18:46', '2022-06-29 21:18:46', NULL, 'user'),
(16, 'Scott Mcgee', 'masiseqyn@mailinator.com', NULL, '$2y$10$9T/ThQUO/GBO9NZZy6ZWB.g0w5nAK7lWSi.c54pTA1hhypLIt4l4K', NULL, NULL, NULL, NULL, '2022-06-29 21:18:53', '2022-07-30 03:52:35', NULL, 'user'),
(21, 'Omar', 'Omar333@gmail.com', NULL, '$2y$10$P9ZdLvd7E4/qGH9sco3I7uyTvcreAhAAVi2nT5.Ws4r/dlUVxvULy', NULL, NULL, NULL, NULL, '2022-07-06 17:11:26', '2022-07-31 17:34:38', 'raeQDqDj4jHbMpNzFmpZ2rGyZO4lV3jvQZcUVz2Y.png', 'user'),
(24, 'Tahsan', 'tahsan123@gmail.com', NULL, '$2y$10$c845pf9.B.TKKM6wudjVuOwiJP9.jewoLXGT2lIH7grkYqMmmMf2i', NULL, NULL, NULL, NULL, '2022-07-16 10:06:44', '2022-08-11 18:27:54', 'iWLDD8jICIWdBgTQSw6xgrDgxoKcar6FB80crD1g.jpg', 'admin'),
(25, 'Tahsan Tanjim', 'tahsan124@gmail.com', NULL, '$2y$10$gby4ebfBE19l1VK0CG8DsOkjBG85kI4szHbRcyA7c5jOuO5WXsTXK', NULL, NULL, NULL, NULL, '2022-07-16 10:06:44', '2022-07-30 03:03:35', 'UkQ30TB99Ckx2uDyJ0Erw4dPn50HYCCqCJ8AFkRt.jpg', 'admin'),
(26, 'Arman', 'arman44@gmail.com', NULL, '$2y$10$dyeDjCfY7QJB7XuuP8UbFuSALvw66nnJ0JLlzYo72rtwDxr7LkxJu', NULL, NULL, NULL, NULL, '2022-07-28 07:23:40', '2022-08-11 18:12:06', 'Zv7lOg8ZxeUdGu6RwfeqWcesNeubi9E8v2fz3dVa.jpg', 'user'),
(27, 'Omi', 'omi233@gmail.com', NULL, '$2y$10$gby4ebfBE19l1VK0CG8DsOkjBG85kI4szHbRcyA7c5jOuO5WXsTXK', NULL, NULL, NULL, NULL, '2021-07-16 07:25:47', '2022-07-30 03:30:46', NULL, 'user'),
(29, 'Tahir', 'tahir444@gmail.com', NULL, '$2y$10$a/J2wRiNqi7rOKEinvu9Qude1zU2qe06v/DKv.qgao.sr15zGnWEe', NULL, NULL, NULL, NULL, '2022-07-31 17:33:55', '2022-07-31 17:34:32', NULL, 'user');

--
-- স্তুপকৃত টেবলের ইনডেক্স
--

--
-- টেবিলের ইনডেক্সসমুহ `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_client_id_foreign` (`client_id`);

--
-- টেবিলের ইনডেক্সসমুহ `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- টেবিলের ইনডেক্সসমুহ `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversations_sender_id_foreign` (`sender_id`),
  ADD KEY `conversations_receiver_id_foreign` (`receiver_id`);

--
-- টেবিলের ইনডেক্সসমুহ `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- টেবিলের ইনডেক্সসমুহ `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_conversation_id_foreign` (`conversation_id`),
  ADD KEY `messages_user_id_foreign` (`user_id`);

--
-- টেবিলের ইনডেক্সসমুহ `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- টেবিলের ইনডেক্সসমুহ `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- টেবিলের ইনডেক্সসমুহ `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- টেবিলের ইনডেক্সসমুহ `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- টেবিলের ইনডেক্সসমুহ `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- স্তুপকৃত টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT)
--

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- স্তুপকৃত টেবলের সীমবদ্ধতা
--

--
-- টেবলের সীমবদ্ধতা `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- টেবলের সীমবদ্ধতা `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `conversations_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `conversations_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`);

--
-- টেবলের সীমবদ্ধতা `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`id`),
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
