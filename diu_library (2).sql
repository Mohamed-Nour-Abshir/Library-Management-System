-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2023 at 02:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diu_library`
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
  `book_url` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `author`, `description`, `category_id`, `added_by`, `image`, `book_url`, `created_at`, `updated_at`) VALUES
(1, 'Computer Networks', 'shariful Islam', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 3, 1, '1691919826.jpg', 'https://www.lipsum.com/', NULL, NULL),
(2, 'Computer Fundamentals', 'Nour', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 1, '1691920027.jpg', 'https://www.tutorialspoint.com/computer_fundamentals/index.htm', NULL, NULL),
(3, 'Business Communications', 'Abdihafid', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 2, 1, '1691920160.jpg', 'https://en.wikipedia.org/wiki/Business_communication', NULL, NULL);

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
(1, 'CSE', '2023-08-13 03:33:22', '2023-08-13 03:33:22'),
(2, 'BBA', '2023-08-13 03:33:26', '2023-08-13 03:33:26'),
(3, 'EEE', '2023-08-13 03:33:30', '2023-08-13 03:33:30'),
(4, 'English', '2023-08-13 03:33:39', '2023-08-13 03:33:39');

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
(1, 1, 1, 1, NULL, NULL),
(2, 1, 0, 1, NULL, NULL),
(3, 1, 1, 1, NULL, NULL),
(4, 1, 1, 1, NULL, NULL),
(5, 1, 1, 1, NULL, NULL),
(6, 1, 1, 1, NULL, NULL),
(7, 1, 1, 1, NULL, NULL),
(8, 1, 1, 1, NULL, NULL),
(9, 1, 1, 1, NULL, NULL),
(10, 1, 1, 1, NULL, NULL),
(11, 1, 1, 1, NULL, NULL),
(12, 1, 1, 1, NULL, NULL),
(13, 1, 1, 1, NULL, NULL),
(14, 1, 1, 1, NULL, NULL),
(15, 1, 1, 1, NULL, NULL),
(16, 1, 1, 1, NULL, NULL),
(17, 1, 1, 1, NULL, NULL),
(18, 1, 1, 1, NULL, NULL),
(19, 1, 1, 1, NULL, NULL),
(20, 1, 1, 1, NULL, NULL),
(21, 1, 1, 1, NULL, NULL),
(22, 1, 1, 1, NULL, NULL),
(23, 1, 1, 1, NULL, NULL),
(24, 1, 1, 1, NULL, NULL),
(25, 1, 1, 1, NULL, NULL),
(26, 1, 1, 1, NULL, NULL),
(27, 1, 1, 1, NULL, NULL),
(28, 1, 1, 1, NULL, NULL),
(29, 1, 1, 1, NULL, NULL),
(30, 1, 1, 1, NULL, NULL),
(31, 1, 1, 1, NULL, NULL),
(32, 1, 1, 1, NULL, NULL),
(33, 1, 1, 1, NULL, NULL),
(34, 1, 1, 1, NULL, NULL),
(35, 1, 1, 1, NULL, NULL),
(36, 1, 1, 1, NULL, NULL),
(37, 1, 1, 1, NULL, NULL),
(38, 1, 1, 1, NULL, NULL),
(39, 1, 1, 1, NULL, NULL),
(40, 1, 1, 1, NULL, NULL),
(41, 1, 1, 1, NULL, NULL),
(42, 1, 1, 1, NULL, NULL),
(43, 1, 1, 1, NULL, NULL),
(44, 1, 1, 1, NULL, NULL),
(45, 1, 1, 1, NULL, NULL),
(46, 1, 1, 1, NULL, NULL),
(47, 1, 1, 1, NULL, NULL),
(48, 1, 1, 1, NULL, NULL),
(49, 1, 1, 1, NULL, NULL),
(50, 1, 1, 1, NULL, NULL),
(51, 1, 1, 1, NULL, NULL),
(52, 1, 1, 1, NULL, NULL),
(53, 1, 1, 1, NULL, NULL),
(54, 1, 1, 1, NULL, NULL),
(55, 1, 1, 1, NULL, NULL),
(56, 1, 1, 1, NULL, NULL),
(57, 1, 1, 1, NULL, NULL),
(58, 1, 1, 1, NULL, NULL),
(59, 1, 1, 1, NULL, NULL),
(60, 1, 1, 1, NULL, NULL),
(61, 1, 1, 1, NULL, NULL),
(62, 1, 1, 1, NULL, NULL),
(63, 1, 1, 1, NULL, NULL),
(64, 1, 1, 1, NULL, NULL),
(65, 1, 1, 1, NULL, NULL),
(66, 1, 1, 1, NULL, NULL),
(67, 1, 1, 1, NULL, NULL),
(68, 1, 1, 1, NULL, NULL),
(69, 1, 1, 1, NULL, NULL),
(70, 1, 1, 1, NULL, NULL),
(71, 1, 1, 1, NULL, NULL),
(72, 1, 1, 1, NULL, NULL),
(73, 1, 1, 1, NULL, NULL),
(74, 1, 1, 1, NULL, NULL),
(75, 1, 1, 1, NULL, NULL),
(76, 1, 1, 1, NULL, NULL),
(77, 1, 1, 1, NULL, NULL),
(78, 1, 1, 1, NULL, NULL),
(79, 1, 1, 1, NULL, NULL),
(80, 1, 1, 1, NULL, NULL),
(81, 1, 1, 1, NULL, NULL),
(82, 1, 1, 1, NULL, NULL),
(83, 1, 1, 1, NULL, NULL),
(84, 1, 1, 1, NULL, NULL),
(85, 1, 1, 1, NULL, NULL),
(86, 1, 1, 1, NULL, NULL),
(87, 1, 1, 1, NULL, NULL),
(88, 1, 1, 1, NULL, NULL),
(89, 1, 1, 1, NULL, NULL),
(90, 1, 1, 1, NULL, NULL),
(91, 1, 1, 1, NULL, NULL),
(92, 1, 1, 1, NULL, NULL),
(93, 1, 1, 1, NULL, NULL),
(94, 1, 1, 1, NULL, NULL),
(95, 1, 1, 1, NULL, NULL),
(96, 1, 1, 1, NULL, NULL),
(97, 1, 1, 1, NULL, NULL),
(98, 1, 1, 1, NULL, NULL),
(99, 1, 1, 1, NULL, NULL),
(100, 1, 1, 1, NULL, NULL),
(101, 2, 1, 1, NULL, NULL),
(102, 2, 1, 1, NULL, NULL),
(103, 2, 1, 1, NULL, NULL),
(104, 2, 1, 1, NULL, NULL),
(105, 2, 1, 1, NULL, NULL),
(106, 2, 1, 1, NULL, NULL),
(107, 2, 1, 1, NULL, NULL),
(108, 2, 1, 1, NULL, NULL),
(109, 2, 1, 1, NULL, NULL),
(110, 2, 1, 1, NULL, NULL),
(111, 2, 1, 1, NULL, NULL),
(112, 2, 1, 1, NULL, NULL),
(113, 2, 1, 1, NULL, NULL),
(114, 2, 1, 1, NULL, NULL),
(115, 2, 1, 1, NULL, NULL),
(116, 2, 1, 1, NULL, NULL),
(117, 2, 1, 1, NULL, NULL),
(118, 2, 1, 1, NULL, NULL),
(119, 2, 1, 1, NULL, NULL),
(120, 2, 1, 1, NULL, NULL),
(121, 2, 1, 1, NULL, NULL),
(122, 2, 1, 1, NULL, NULL),
(123, 2, 1, 1, NULL, NULL),
(124, 2, 1, 1, NULL, NULL),
(125, 2, 1, 1, NULL, NULL),
(126, 2, 1, 1, NULL, NULL),
(127, 2, 1, 1, NULL, NULL),
(128, 2, 1, 1, NULL, NULL),
(129, 2, 1, 1, NULL, NULL),
(130, 2, 1, 1, NULL, NULL),
(131, 2, 1, 1, NULL, NULL),
(132, 2, 1, 1, NULL, NULL),
(133, 2, 1, 1, NULL, NULL),
(134, 2, 1, 1, NULL, NULL),
(135, 2, 1, 1, NULL, NULL),
(136, 2, 1, 1, NULL, NULL),
(137, 2, 1, 1, NULL, NULL),
(138, 2, 1, 1, NULL, NULL),
(139, 2, 1, 1, NULL, NULL),
(140, 2, 1, 1, NULL, NULL),
(141, 2, 1, 1, NULL, NULL),
(142, 2, 1, 1, NULL, NULL),
(143, 2, 1, 1, NULL, NULL),
(144, 2, 1, 1, NULL, NULL),
(145, 2, 1, 1, NULL, NULL),
(146, 2, 1, 1, NULL, NULL),
(147, 2, 1, 1, NULL, NULL),
(148, 2, 1, 1, NULL, NULL),
(149, 2, 1, 1, NULL, NULL),
(150, 2, 1, 1, NULL, NULL),
(151, 2, 1, 1, NULL, NULL),
(152, 2, 1, 1, NULL, NULL),
(153, 2, 1, 1, NULL, NULL),
(154, 2, 1, 1, NULL, NULL),
(155, 2, 1, 1, NULL, NULL),
(156, 2, 1, 1, NULL, NULL),
(157, 2, 1, 1, NULL, NULL),
(158, 2, 1, 1, NULL, NULL),
(159, 2, 1, 1, NULL, NULL),
(160, 2, 1, 1, NULL, NULL),
(161, 2, 1, 1, NULL, NULL),
(162, 2, 1, 1, NULL, NULL),
(163, 2, 1, 1, NULL, NULL),
(164, 2, 1, 1, NULL, NULL),
(165, 2, 1, 1, NULL, NULL),
(166, 2, 1, 1, NULL, NULL),
(167, 2, 1, 1, NULL, NULL),
(168, 2, 1, 1, NULL, NULL),
(169, 2, 1, 1, NULL, NULL),
(170, 2, 1, 1, NULL, NULL),
(171, 2, 1, 1, NULL, NULL),
(172, 2, 1, 1, NULL, NULL),
(173, 2, 1, 1, NULL, NULL),
(174, 2, 1, 1, NULL, NULL),
(175, 2, 1, 1, NULL, NULL),
(176, 2, 1, 1, NULL, NULL),
(177, 2, 1, 1, NULL, NULL),
(178, 2, 1, 1, NULL, NULL),
(179, 2, 1, 1, NULL, NULL),
(180, 2, 1, 1, NULL, NULL),
(181, 2, 1, 1, NULL, NULL),
(182, 2, 1, 1, NULL, NULL),
(183, 2, 1, 1, NULL, NULL),
(184, 2, 1, 1, NULL, NULL),
(185, 2, 1, 1, NULL, NULL),
(186, 2, 1, 1, NULL, NULL),
(187, 2, 1, 1, NULL, NULL),
(188, 2, 1, 1, NULL, NULL),
(189, 2, 1, 1, NULL, NULL),
(190, 2, 1, 1, NULL, NULL),
(191, 2, 1, 1, NULL, NULL),
(192, 2, 1, 1, NULL, NULL),
(193, 2, 1, 1, NULL, NULL),
(194, 2, 1, 1, NULL, NULL),
(195, 2, 1, 1, NULL, NULL),
(196, 2, 1, 1, NULL, NULL),
(197, 2, 1, 1, NULL, NULL),
(198, 2, 1, 1, NULL, NULL),
(199, 2, 1, 1, NULL, NULL),
(200, 2, 1, 1, NULL, NULL),
(201, 2, 1, 1, NULL, NULL),
(202, 2, 1, 1, NULL, NULL),
(203, 2, 1, 1, NULL, NULL),
(204, 2, 1, 1, NULL, NULL),
(205, 2, 1, 1, NULL, NULL),
(206, 2, 1, 1, NULL, NULL),
(207, 2, 1, 1, NULL, NULL),
(208, 2, 1, 1, NULL, NULL),
(209, 2, 1, 1, NULL, NULL),
(210, 2, 1, 1, NULL, NULL),
(211, 2, 1, 1, NULL, NULL),
(212, 2, 1, 1, NULL, NULL),
(213, 2, 1, 1, NULL, NULL),
(214, 2, 1, 1, NULL, NULL),
(215, 2, 1, 1, NULL, NULL),
(216, 2, 1, 1, NULL, NULL),
(217, 2, 1, 1, NULL, NULL),
(218, 2, 1, 1, NULL, NULL),
(219, 2, 1, 1, NULL, NULL),
(220, 2, 1, 1, NULL, NULL),
(221, 2, 1, 1, NULL, NULL),
(222, 2, 1, 1, NULL, NULL),
(223, 2, 1, 1, NULL, NULL),
(224, 2, 1, 1, NULL, NULL),
(225, 2, 1, 1, NULL, NULL),
(226, 2, 1, 1, NULL, NULL),
(227, 2, 1, 1, NULL, NULL),
(228, 2, 1, 1, NULL, NULL),
(229, 2, 1, 1, NULL, NULL),
(230, 2, 1, 1, NULL, NULL),
(231, 2, 1, 1, NULL, NULL),
(232, 2, 1, 1, NULL, NULL),
(233, 2, 1, 1, NULL, NULL),
(234, 2, 1, 1, NULL, NULL),
(235, 2, 1, 1, NULL, NULL),
(236, 2, 1, 1, NULL, NULL),
(237, 2, 1, 1, NULL, NULL),
(238, 2, 1, 1, NULL, NULL),
(239, 2, 1, 1, NULL, NULL),
(240, 2, 1, 1, NULL, NULL),
(241, 2, 1, 1, NULL, NULL),
(242, 2, 1, 1, NULL, NULL),
(243, 2, 1, 1, NULL, NULL),
(244, 2, 1, 1, NULL, NULL),
(245, 2, 1, 1, NULL, NULL),
(246, 2, 1, 1, NULL, NULL),
(247, 2, 1, 1, NULL, NULL),
(248, 2, 1, 1, NULL, NULL),
(249, 2, 1, 1, NULL, NULL),
(250, 2, 1, 1, NULL, NULL),
(251, 2, 1, 1, NULL, NULL),
(252, 2, 1, 1, NULL, NULL),
(253, 2, 1, 1, NULL, NULL),
(254, 2, 1, 1, NULL, NULL),
(255, 2, 1, 1, NULL, NULL),
(256, 2, 1, 1, NULL, NULL),
(257, 2, 1, 1, NULL, NULL),
(258, 2, 1, 1, NULL, NULL),
(259, 2, 1, 1, NULL, NULL),
(260, 2, 1, 1, NULL, NULL),
(261, 2, 1, 1, NULL, NULL),
(262, 2, 1, 1, NULL, NULL),
(263, 2, 1, 1, NULL, NULL),
(264, 2, 1, 1, NULL, NULL),
(265, 2, 1, 1, NULL, NULL),
(266, 2, 1, 1, NULL, NULL),
(267, 2, 1, 1, NULL, NULL),
(268, 2, 1, 1, NULL, NULL),
(269, 2, 1, 1, NULL, NULL),
(270, 2, 1, 1, NULL, NULL),
(271, 2, 1, 1, NULL, NULL),
(272, 2, 1, 1, NULL, NULL),
(273, 2, 1, 1, NULL, NULL),
(274, 2, 1, 1, NULL, NULL),
(275, 2, 1, 1, NULL, NULL),
(276, 2, 1, 1, NULL, NULL),
(277, 2, 1, 1, NULL, NULL),
(278, 2, 1, 1, NULL, NULL),
(279, 2, 1, 1, NULL, NULL),
(280, 2, 1, 1, NULL, NULL),
(281, 2, 1, 1, NULL, NULL),
(282, 2, 1, 1, NULL, NULL),
(283, 2, 1, 1, NULL, NULL),
(284, 2, 1, 1, NULL, NULL),
(285, 2, 1, 1, NULL, NULL),
(286, 2, 1, 1, NULL, NULL),
(287, 2, 1, 1, NULL, NULL),
(288, 2, 1, 1, NULL, NULL),
(289, 2, 1, 1, NULL, NULL),
(290, 2, 1, 1, NULL, NULL),
(291, 2, 1, 1, NULL, NULL),
(292, 2, 1, 1, NULL, NULL),
(293, 2, 1, 1, NULL, NULL),
(294, 2, 1, 1, NULL, NULL),
(295, 2, 1, 1, NULL, NULL),
(296, 2, 1, 1, NULL, NULL),
(297, 2, 1, 1, NULL, NULL),
(298, 2, 1, 1, NULL, NULL),
(299, 2, 1, 1, NULL, NULL),
(300, 2, 1, 1, NULL, NULL),
(301, 3, 1, 1, NULL, NULL),
(302, 3, 1, 1, NULL, NULL),
(303, 3, 1, 1, NULL, NULL),
(304, 3, 1, 1, NULL, NULL),
(305, 3, 1, 1, NULL, NULL),
(306, 3, 1, 1, NULL, NULL),
(307, 3, 1, 1, NULL, NULL),
(308, 3, 1, 1, NULL, NULL),
(309, 3, 1, 1, NULL, NULL),
(310, 3, 1, 1, NULL, NULL),
(311, 3, 1, 1, NULL, NULL),
(312, 3, 1, 1, NULL, NULL),
(313, 3, 1, 1, NULL, NULL),
(314, 3, 1, 1, NULL, NULL),
(315, 3, 1, 1, NULL, NULL),
(316, 3, 1, 1, NULL, NULL),
(317, 3, 1, 1, NULL, NULL),
(318, 3, 1, 1, NULL, NULL),
(319, 3, 1, 1, NULL, NULL),
(320, 3, 1, 1, NULL, NULL),
(321, 3, 1, 1, NULL, NULL),
(322, 3, 1, 1, NULL, NULL),
(323, 3, 1, 1, NULL, NULL),
(324, 3, 1, 1, NULL, NULL),
(325, 3, 1, 1, NULL, NULL),
(326, 3, 1, 1, NULL, NULL),
(327, 3, 1, 1, NULL, NULL),
(328, 3, 1, 1, NULL, NULL),
(329, 3, 1, 1, NULL, NULL),
(330, 3, 1, 1, NULL, NULL),
(331, 3, 1, 1, NULL, NULL),
(332, 3, 1, 1, NULL, NULL),
(333, 3, 1, 1, NULL, NULL),
(334, 3, 1, 1, NULL, NULL),
(335, 3, 1, 1, NULL, NULL),
(336, 3, 1, 1, NULL, NULL),
(337, 3, 1, 1, NULL, NULL),
(338, 3, 1, 1, NULL, NULL),
(339, 3, 1, 1, NULL, NULL),
(340, 3, 1, 1, NULL, NULL),
(341, 3, 1, 1, NULL, NULL),
(342, 3, 1, 1, NULL, NULL),
(343, 3, 1, 1, NULL, NULL),
(344, 3, 1, 1, NULL, NULL),
(345, 3, 1, 1, NULL, NULL),
(346, 3, 1, 1, NULL, NULL),
(347, 3, 1, 1, NULL, NULL),
(348, 3, 1, 1, NULL, NULL),
(349, 3, 1, 1, NULL, NULL),
(350, 3, 1, 1, NULL, NULL);

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
(1, 1, 1, 1, '2023-08-13 09:56', '2023-08-13 09:57', NULL, NULL),
(2, 1, 2, 1, '2023-08-13 09:57', '2023-08-13 09:58', NULL, NULL);

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
  `phone_no` varchar(1000) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `books_issued` tinyint(4) NOT NULL DEFAULT 0,
  `email` varchar(512) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `first_name`, `last_name`, `approved`, `rejected`, `category`, `roll_num`, `branch`, `year`, `phone_no`, `address`, `books_issued`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Mohamed', 'Abshir', 0, 0, 1, '29', 1, 2023, NULL, NULL, 0, 'nourabshir@gmail.com', '$2y$10$OgfqMzOHJGJKkVJ66AiNlOKUIK/qWZzI63cju.tsFokk3Qt3JUL.i', '2023-08-13 02:53:15', '2023-08-13 02:53:15'),
(2, 'Abdi', 'hafid', 0, 0, 1, '108858', 1, 2023, '0173094327798', 'satrakul, Dhaka', 0, 'abdihafid@gmail.com', '$2y$10$mFX5ZoJaUuTtp/.dQ03fROPsL6E7Fgq1NMhJ/iNV0ezZ6fl1FBCyu', '2023-08-13 05:49:48', '2023-08-13 05:49:48');

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
  `book_name` varchar(1000) DEFAULT NULL,
  `email_id` varchar(512) NOT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `approved`, `rejected`, `category`, `roll_num`, `branch`, `year`, `books_issued`, `book_name`, `email_id`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'Shariful', 'Islam', 1, 0, 1, '37897', 1, 2023, 0, 'Computer Networks', 'sharifulislam@gmail.com', NULL, NULL, NULL),
(2, 'Mohamed', 'Abshir', 1, 0, 1, '29', 1, 2023, 0, 'Computer Networks', 'nourabshir@gmail.com', NULL, NULL, NULL);

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
  `phone_no` varchar(1000) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `approved`, `rejected`, `category`, `id_num`, `branch`, `year`, `books_issued`, `email`, `phone_no`, `address`, `title`, `password`, `profile_image`, `created_at`, `updated_at`) VALUES
(1, 'Shariful', 'Islam', 0, 0, 1, '37897', 1, 2023, 0, 'sharifulislam@gmail.com', NULL, NULL, NULL, '$2y$10$1BTl1ytCwRrHVl3RqxdHm..aIfohm8weiRQTo7ZyRFG84svxGr/Uy', NULL, '2023-08-13 02:56:34', '2023-08-13 02:56:34'),
(2, 'Habibullah', 'Belali', 0, 0, 1, '112323434', 1, 2023, 0, 'habibulah@gmail.com', '0179324994', 'Panthapath, Dhaka', 'Assistant Professor', '$2y$10$JTlfoUkmwEbgHQY3d2COkOeKonmKW.xOwzxNL.JW3//krj4ofhJ9W', NULL, '2023-08-13 06:00:59', '2023-08-13 06:00:59');

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
(1, 'Admin', 'admin@gmail.com', 'admin@gmail.com', '1691175523.jpg', NULL, 0, '$2y$10$MtNlTbBZBicTV1XMNRoFheZuk0IiQ47yD7JScwcB8t2yT46/4l.QG', NULL, '2023-08-04 04:16:21', '2023-08-04 13:11:57');

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
  MODIFY `book_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `book_categories`
--
ALTER TABLE `book_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `book_issues`
--
ALTER TABLE `book_issues`
  MODIFY `issue_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;

--
-- AUTO_INCREMENT for table `book_issue_logs`
--
ALTER TABLE `book_issue_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `book_requests`
--
ALTER TABLE `book_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `student_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_categories`
--
ALTER TABLE `student_categories`
  MODIFY `cat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;