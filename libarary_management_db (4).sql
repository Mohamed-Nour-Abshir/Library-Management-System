-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 05:52 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libarary_management_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(1000) NOT NULL,
  `author` varchar(1000) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `added_by` int(10) UNSIGNED NOT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `author`, `description`, `category_id`, `added_by`, `image`, `created_at`, `updated_at`) VALUES
(17, 'New Book', 'nmcbzxm', 'asdjkhasjk', 4, 5, '1691237968.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_categories`
--

CREATE TABLE `book_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_categories`
--

INSERT INTO `book_categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Programming', '2023-07-06 04:29:00', '2023-07-06 04:29:00'),
(2, 'Networking', '2023-07-06 04:29:11', '2023-07-06 04:29:11'),
(3, 'Database', '2023-07-06 04:29:14', '2023-07-06 04:29:14'),
(4, 'Data Structure', '2023-07-06 04:29:18', '2023-07-06 04:29:18'),
(5, 'BBA', '2023-08-05 02:14:57', '2023-08-05 02:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `book_issues`
--

CREATE TABLE `book_issues` (
  `issue_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` int(11) NOT NULL,
  `available_status` tinyint(4) NOT NULL DEFAULT 1,
  `added_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_issues`
--

INSERT INTO `book_issues` (`issue_id`, `book_id`, `available_status`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 17, 0, 5, NULL, NULL),
(2, 17, 1, 5, NULL, NULL),
(3, 17, 1, 5, NULL, NULL),
(4, 17, 1, 5, NULL, NULL),
(5, 17, 1, 5, NULL, NULL),
(6, 17, 1, 5, NULL, NULL),
(7, 17, 1, 5, NULL, NULL),
(8, 17, 1, 5, NULL, NULL),
(9, 17, 1, 5, NULL, NULL),
(10, 17, 1, 5, NULL, NULL),
(11, 17, 1, 5, NULL, NULL),
(12, 17, 1, 5, NULL, NULL),
(13, 17, 1, 5, NULL, NULL),
(14, 17, 1, 5, NULL, NULL),
(15, 17, 1, 5, NULL, NULL),
(16, 17, 1, 5, NULL, NULL),
(17, 17, 1, 5, NULL, NULL),
(18, 17, 1, 5, NULL, NULL),
(19, 17, 1, 5, NULL, NULL),
(20, 17, 1, 5, NULL, NULL),
(21, 17, 1, 5, NULL, NULL),
(22, 17, 1, 5, NULL, NULL),
(23, 17, 1, 5, NULL, NULL),
(24, 17, 1, 5, NULL, NULL),
(25, 17, 1, 5, NULL, NULL),
(26, 17, 1, 5, NULL, NULL),
(27, 17, 1, 5, NULL, NULL),
(28, 17, 1, 5, NULL, NULL),
(29, 17, 1, 5, NULL, NULL),
(30, 17, 1, 5, NULL, NULL),
(31, 17, 1, 5, NULL, NULL),
(32, 17, 1, 5, NULL, NULL),
(33, 17, 1, 5, NULL, NULL),
(34, 17, 1, 5, NULL, NULL),
(35, 17, 1, 5, NULL, NULL),
(36, 17, 1, 5, NULL, NULL),
(37, 17, 1, 5, NULL, NULL),
(38, 17, 1, 5, NULL, NULL),
(39, 17, 1, 5, NULL, NULL),
(40, 17, 1, 5, NULL, NULL),
(41, 17, 1, 5, NULL, NULL),
(42, 17, 1, 5, NULL, NULL),
(43, 17, 1, 5, NULL, NULL),
(44, 17, 1, 5, NULL, NULL),
(45, 17, 1, 5, NULL, NULL),
(46, 17, 1, 5, NULL, NULL),
(47, 17, 1, 5, NULL, NULL),
(48, 17, 1, 5, NULL, NULL),
(49, 17, 1, 5, NULL, NULL),
(50, 17, 1, 5, NULL, NULL),
(51, 17, 1, 5, NULL, NULL),
(52, 17, 1, 5, NULL, NULL),
(53, 17, 1, 5, NULL, NULL),
(54, 17, 1, 5, NULL, NULL),
(55, 17, 1, 5, NULL, NULL),
(56, 17, 1, 5, NULL, NULL),
(57, 17, 1, 5, NULL, NULL),
(58, 17, 1, 5, NULL, NULL),
(59, 17, 1, 5, NULL, NULL),
(60, 17, 1, 5, NULL, NULL),
(61, 17, 1, 5, NULL, NULL),
(62, 17, 1, 5, NULL, NULL),
(63, 17, 1, 5, NULL, NULL),
(64, 17, 1, 5, NULL, NULL),
(65, 17, 1, 5, NULL, NULL),
(66, 17, 1, 5, NULL, NULL),
(67, 17, 1, 5, NULL, NULL),
(68, 17, 1, 5, NULL, NULL),
(69, 17, 1, 5, NULL, NULL),
(70, 17, 1, 5, NULL, NULL),
(71, 17, 1, 5, NULL, NULL),
(72, 17, 1, 5, NULL, NULL),
(73, 17, 1, 5, NULL, NULL),
(74, 17, 1, 5, NULL, NULL),
(75, 17, 1, 5, NULL, NULL),
(76, 17, 1, 5, NULL, NULL),
(77, 17, 1, 5, NULL, NULL),
(78, 17, 1, 5, NULL, NULL),
(79, 17, 1, 5, NULL, NULL),
(80, 17, 1, 5, NULL, NULL),
(81, 17, 1, 5, NULL, NULL),
(82, 17, 1, 5, NULL, NULL),
(83, 17, 1, 5, NULL, NULL),
(84, 17, 1, 5, NULL, NULL),
(85, 17, 1, 5, NULL, NULL),
(86, 17, 1, 5, NULL, NULL),
(87, 17, 1, 5, NULL, NULL),
(88, 17, 1, 5, NULL, NULL),
(89, 17, 1, 5, NULL, NULL),
(90, 17, 1, 5, NULL, NULL),
(91, 17, 1, 5, NULL, NULL),
(92, 17, 1, 5, NULL, NULL),
(93, 17, 1, 5, NULL, NULL),
(94, 17, 1, 5, NULL, NULL),
(95, 17, 1, 5, NULL, NULL),
(96, 17, 1, 5, NULL, NULL),
(97, 17, 1, 5, NULL, NULL),
(98, 17, 1, 5, NULL, NULL),
(99, 17, 1, 5, NULL, NULL),
(100, 17, 1, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_issue_logs`
--

CREATE TABLE `book_issue_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_issue_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `issue_by` int(10) UNSIGNED NOT NULL,
  `issued_at` varchar(50) NOT NULL,
  `return_time` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_issue_logs`
--

INSERT INTO `book_issue_logs` (`id`, `book_issue_id`, `student_id`, `issue_by`, `issued_at`, `return_time`, `created_at`, `updated_at`) VALUES
(3, 17, 12, 5, '2023-08-05 12:33', '2023-08-05 13:09', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_requests`
--

CREATE TABLE `book_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_num` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `book_name` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `books_issued` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_requests`
--

INSERT INTO `book_requests` (`id`, `id_num`, `name`, `email`, `book_name`, `user_type`, `books_issued`, `created_at`, `updated_at`) VALUES
(5, '89', 'nour', 'user@gmail.com', 'Java', 'teacher', 0, '2023-08-05 03:35:03', '2023-08-05 03:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch`, `created_at`, `updated_at`) VALUES
(1, 'Green Road', '2023-07-06 05:05:49', '2023-07-06 05:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issue_logs`
--

CREATE TABLE `issue_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(512) NOT NULL,
  `last_name` varchar(512) NOT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT 0,
  `rejected` tinyint(4) NOT NULL DEFAULT 0,
  `category` int(10) UNSIGNED NOT NULL,
  `roll_num` varchar(15) NOT NULL,
  `branch` tinyint(4) NOT NULL DEFAULT 0,
  `year` int(10) UNSIGNED NOT NULL,
  `books_issued` tinyint(4) NOT NULL DEFAULT 0,
  `email` varchar(512) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `first_name`, `last_name`, `approved`, `rejected`, `category`, `roll_num`, `branch`, `year`, `books_issued`, `email`, `password`, `created_at`, `updated_at`) VALUES
(7, 'jhgjh', 'jhbjh', 0, 0, 1, '78668', 1, 99989, 0, 'student@gmail.com', '$2y$10$DTeC2KzPsmbPScwWiu4rVOwOFAnPsULa6dGwjL8Q92CUronyIxYam', '2023-08-04 04:19:52', '2023-08-04 04:19:52');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2020_11_27_095343_create_books_table', 1),
(6, '2020_11_27_095406_create_branches_table', 1),
(7, '2020_11_27_095436_create_categories_table', 1),
(8, '2020_11_27_095452_create_issues_table', 1),
(9, '2020_11_27_095506_create_issue_logs_table', 1),
(10, '2020_11_27_095530_create_logs_table', 1),
(11, '2020_11_27_095545_create_students_table', 1),
(12, '2020_11_27_095628_create_student_categories_table', 1),
(13, '2020_11_27_095847_create_book_categories_table', 1),
(14, '2020_11_27_095955_create_book_issues_table', 1),
(15, '2020_11_27_100146_create_book_issue_logs_table', 1),
(16, '2023_08_01_043024_create_members_table', 2),
(17, '2023_08_01_043217_create_teachers_table', 2),
(18, '2023_08_05_085659_create_book_requests_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(512) NOT NULL,
  `last_name` varchar(512) NOT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT 0,
  `rejected` tinyint(4) NOT NULL DEFAULT 0,
  `category` int(10) UNSIGNED NOT NULL,
  `roll_num` varchar(15) NOT NULL,
  `branch` tinyint(4) NOT NULL DEFAULT 0,
  `year` int(10) UNSIGNED NOT NULL,
  `books_issued` tinyint(4) NOT NULL DEFAULT 0,
  `email_id` varchar(512) NOT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `approved`, `rejected`, `category`, `roll_num`, `branch`, `year`, `books_issued`, `email_id`, `user_type`, `created_at`, `updated_at`) VALUES
(11, 'nour', 'abshir', 0, 0, 1, '89', 17, 2023, 0, 'user@gmail.com', 'teacher', NULL, NULL),
(12, 'nour', 'abshir', 1, 0, 1, '89', 17, 898998, 0, 'user@gmail.com', NULL, NULL, NULL),
(13, 'nour', 'abshir', 0, 0, 1, '89', 17, 898998, 0, 'user@gmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_categories`
--

CREATE TABLE `student_categories` (
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(512) NOT NULL,
  `max_allowed` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_categories`
--

INSERT INTO `student_categories` (`cat_id`, `category`, `max_allowed`, `created_at`, `updated_at`) VALUES
(1, 'CSE', 10, NULL, NULL),
(2, 'BBA', 200, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(512) NOT NULL,
  `last_name` varchar(512) NOT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT 0,
  `rejected` tinyint(4) NOT NULL DEFAULT 0,
  `category` int(10) UNSIGNED NOT NULL,
  `id_num` varchar(15) NOT NULL,
  `branch` tinyint(4) NOT NULL DEFAULT 0,
  `year` int(10) UNSIGNED NOT NULL,
  `books_issued` tinyint(4) NOT NULL DEFAULT 0,
  `email` varchar(512) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `approved`, `rejected`, `category`, `id_num`, `branch`, `year`, `books_issued`, `email`, `password`, `profile_image`, `created_at`, `updated_at`) VALUES
(5, 'nour', 'abshir', 0, 0, 1, '89', 1, 898998, 0, 'user@gmail.com', '$2y$10$jUFUNzrDutjan.8eCBriEeWzcyyelYiZOKMCzOzcmsRlJxgliWPq2', '1691174751.png', '2023-08-04 04:18:19', '2023-08-04 13:10:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `profile_image` varchar(1000) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verification_status` tinyint(4) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `profile_image`, `email_verified_at`, `verification_status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Admin', 'admin@gmail.com', 'admin@gmail.com', '1691175523.jpg', NULL, 0, '$2y$10$MtNlTbBZBicTV1XMNRoFheZuk0IiQ47yD7JScwcB8t2yT46/4l.QG', NULL, '2023-08-04 04:16:21', '2023-08-04 13:11:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_categories`
--
ALTER TABLE `book_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_issues`
--
ALTER TABLE `book_issues`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `book_issue_logs`
--
ALTER TABLE `book_issue_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_requests`
--
ALTER TABLE `book_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_logs`
--
ALTER TABLE `issue_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_categories`
--
ALTER TABLE `student_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `book_categories`
--
ALTER TABLE `book_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `book_issues`
--
ALTER TABLE `book_issues`
  MODIFY `issue_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `book_issue_logs`
--
ALTER TABLE `book_issue_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `book_requests`
--
ALTER TABLE `book_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issue_logs`
--
ALTER TABLE `issue_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student_categories`
--
ALTER TABLE `student_categories`
  MODIFY `cat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
