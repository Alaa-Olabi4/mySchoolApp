-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2022 at 08:52 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `value` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `student_id`, `teacher_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 100, NULL, NULL),
(2, 1, 2, 68, NULL, NULL),
(3, 1, 3, 74, NULL, NULL),
(4, 2, 1, 100, NULL, NULL),
(5, 2, 2, 42, NULL, NULL),
(6, 2, 3, 88, NULL, NULL),
(7, 3, 1, 92, NULL, NULL),
(8, 3, 2, 75, NULL, NULL),
(9, 6, 5, 88, '2022-09-14 06:27:50', '2022-09-14 06:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_25_213050_create_subjects_table', 1),
(6, '2022_03_25_214840_create_teachers_table', 1),
(7, '2022_03_25_215001_create_students_table', 1),
(8, '2022_03_25_215055_create_marks_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 10, 'mySchoolApplicationToken', '7d71cc8ecd27d651720936ab5414bb472675e470fead42763628868fa9549e3e', '[\"*\"]', NULL, '2022-09-14 05:58:12', '2022-09-14 05:58:12'),
(2, 'App\\Models\\User', 10, 'mySchoolApplicationToken', '9f8b650b7ab45a44202231d14396ce8aee9af60d03597d6f8b01af7127a27a18', '[\"*\"]', NULL, '2022-09-14 05:59:11', '2022-09-14 05:59:11'),
(3, 'App\\Models\\User', 11, 'mySchoolApplicationToken', 'c1a0c0fe504b6857e5a1fff6922f26c9599eb005b3d95e3e37d52ee394e742b1', '[\"*\"]', NULL, '2022-09-14 06:02:45', '2022-09-14 06:02:45'),
(4, 'App\\Models\\User', 12, 'mySchoolApplicationToken', '3a6348c76cac13d6f7e9ce60f045e5d930156f7dfec6bc3c79fbf30d04c07160', '[\"*\"]', NULL, '2022-09-14 06:20:44', '2022-09-14 06:20:44'),
(5, 'App\\Models\\User', 13, 'mySchoolApplicationToken', '19d14575b664b3291f82c104b4411337816f4f2f2d324e937e945fe48c724034', '[\"*\"]', NULL, '2022-09-14 06:22:00', '2022-09-14 06:22:00'),
(6, 'App\\Models\\User', 14, 'mySchoolApplicationToken', '335b050b1e41ac0e1a8d36f3c0a1f8ba32bffdeefee736df4a9bfc5d13ed0dbc', '[\"*\"]', NULL, '2022-09-14 06:24:03', '2022-09-14 06:24:03'),
(7, 'App\\Models\\User', 15, 'mySchoolApplicationToken', '23f10da94fa5a44720ec53325909b3347b33e9dd3320bddc371ca70588154a90', '[\"*\"]', NULL, '2022-09-14 06:26:17', '2022-09-14 06:26:17'),
(8, 'App\\Models\\User', 1, 'mySchoolApplicationToken', '652b532cee4a3ef18424b8f7d93e9d0e1a6a3e1fa3b8d1db93dff85879809197', '[\"*\"]', NULL, '2022-09-14 06:32:37', '2022-09-14 06:32:37'),
(9, 'App\\Models\\User', 1, 'mySchoolApplicationToken', 'a4bac757a8b5d06bb6852f9a6eddc6373c2ed0cc5757746357e3e09815540bf5', '[\"*\"]', NULL, '2022-09-14 06:33:33', '2022-09-14 06:33:33');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`) VALUES
(1, 5),
(2, 6),
(3, 7),
(4, 8),
(5, 9),
(6, 15);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Arabic', NULL, NULL),
(2, 'English', NULL, NULL),
(3, 'Math', NULL, NULL),
(4, 'Programming', '2022-09-14 06:01:10', '2022-09-14 06:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `subject_id`) VALUES
(1, 2, 1),
(2, 3, 2),
(3, 4, 3),
(5, 13, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `FirstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kind` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FirstName`, `LastName`, `Kind`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Manager', 'admin', 'admin@mail.com', NULL, '$2y$10$WCergDesp7IxLjzALtqSPOFDEby.tyYsEAW.e9XMPJcgebUSFP6HK', NULL, NULL, NULL),
(2, 'Mostafa', 'Mostafa', 'teacher', 'mostafa@gmail.com', NULL, '$2y$10$s809SKhKRdhzvABR6xLIp.6ohnFm809uig4KrJUvKOgC8cxzFfILS', NULL, NULL, NULL),
(3, 'Mhd', 'Mhd', 'teacher', 'mhd@gmail.com', NULL, '$2y$10$KkPWHzqjGyXxWems1RVgROyavQfbsmieWj9hURQQiDfwvJu/IdDaG', NULL, NULL, NULL),
(4, 'Ahmad', 'Ahmad', 'teacher', 'Ahmad@gmail.com', NULL, '$2y$10$cQXGzshdMXucEJmd0oqZTuFIhrkY3/SZyALtJuqv2tKx6hSGPuCH6', NULL, NULL, NULL),
(5, 'Qasem', 'Qasem', 'student', 'qasem@gmail.com', NULL, '$2y$10$Ic9kcEyjbSsB9j5jvhQAHetnbmh4qc6epDa8gme.D/F340BaIByHO', NULL, NULL, NULL),
(6, 'Waleed', 'Waleed', 'student', 'waleed@gmail.com', NULL, '$2y$10$CqWyi6jWx5p1LSih.waQ1OYfNiMOo3v7NtEylu/8dVD3YQjT.x4Z6', NULL, NULL, NULL),
(7, 'Wael', 'Wael', 'student', 'wael@gmail.com', NULL, '$2y$10$QKyZst9w9QY.ZaJaic0bIuKHaIErjccz154Uv7kP5Nm6jLdWKdQjy', NULL, NULL, NULL),
(8, 'Omar', 'Omar', 'student', 'omar@gmail.com', NULL, '$2y$10$FN9zxuL.BXYaR03c9Qv3v.4tw6sNaXATT3WPgOUZpWt9gW0P6.xnG', NULL, NULL, NULL),
(9, 'Saeed', 'Saeed', 'student', 'saeed@gmail.com', NULL, '$2y$10$XhyS5LZ1x/fVwLCUtyAnwuC8a/PfoeEZLvXTb0LlH5E8DEHbXABbC', NULL, NULL, NULL),
(10, 'Alaa', 'Alaa', 'user', 'alaa@gmail.com', NULL, '$2y$10$/75nJFyxTt/pONtkNe2y4uV07DDU4X0sHgb1GoFaBsPZQxIg/de.u', NULL, '2022-09-14 05:58:12', '2022-09-14 05:58:12'),
(13, 'Hasan', 'Hasan', 'teacher', 'hasan@gmail.com', NULL, '$2y$10$wboxfu.1CCFTgbYOQ6Aad..lwWSxljj9ZR16fTpmmZWbiYRh.ROZ2', NULL, '2022-09-14 06:22:00', '2022-09-14 06:22:00'),
(15, 'Yaman', 'Yaman', 'student', 'yaman@gmil.com', NULL, '$2y$10$BN4R486etBrafNR.KZQpeuGxKK12ZAAGODoWf4mrX2X2ZzzQbpMXS', NULL, '2022-09-14 06:26:16', '2022-09-14 06:26:17');

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
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marks_student_id_foreign` (`student_id`),
  ADD KEY `marks_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_user_id_foreign` (`user_id`),
  ADD KEY `teachers_subject_id_foreign` (`subject_id`);

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
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `marks_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
