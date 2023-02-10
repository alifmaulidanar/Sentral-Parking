-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Sep 14, 2022 at 05:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_sentral_parking`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_admin`
--

CREATE TABLE `data_admin` (
  `id_admin` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='berisi username dan password admin';

--
-- Dumping data for table `data_admin`
--

INSERT INTO `data_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin1', '$2y$10$RijsIchR3Txwh2vu/PhTVePVuJonHMusrWKjee08KQSAqC4nwUjiK'),
(2, 'admin2', '$2y$10$Y0HC.DceBjkztwZHobr/Rev5j0O1tKwO9aML6pbr/wh28L1vKVaH2');

-- --------------------------------------------------------

--
-- Table structure for table `data_aktivitas`
--

CREATE TABLE `data_aktivitas` (
  `id` int(255) NOT NULL,
  `id_petugas` int(3) DEFAULT NULL,
  `id_mitra` int(3) DEFAULT NULL,
  `id_admin` int(3) DEFAULT NULL,
  `waktu_login` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='record waktu dan tanggal login petugas, mitra, dan admin';

--
-- Dumping data for table `data_aktivitas`
--

INSERT INTO `data_aktivitas` (`id`, `id_petugas`, `id_mitra`, `id_admin`, `waktu_login`, `deleted`) VALUES
(1, 15, NULL, NULL, '2022-07-08 11:17:54', 0),
(3, NULL, 19, NULL, '2022-07-08 11:28:57', 1),
(4, NULL, NULL, 1, '2022-09-08 12:37:25', 0),
(5, NULL, NULL, 1, '2022-09-08 12:38:37', 0),
(6, NULL, NULL, 1, '2022-09-08 12:47:53', 0),
(7, NULL, NULL, 1, '2022-09-08 12:56:54', 0),
(8, NULL, NULL, 1, '2022-09-08 12:58:15', 0),
(9, NULL, NULL, 1, '2022-09-08 13:05:21', 0),
(10, NULL, NULL, 1, '2022-09-08 13:06:24', 0),
(11, NULL, NULL, 1, '2022-09-08 13:06:41', 0),
(12, NULL, NULL, 1, '2022-09-08 13:06:57', 0),
(13, NULL, NULL, 1, '2022-09-08 13:07:23', 0),
(14, NULL, NULL, 1, '2022-09-08 13:25:01', 0),
(15, NULL, NULL, 1, '2022-09-08 13:33:42', 0),
(16, 15, NULL, NULL, '2022-08-08 13:35:13', 0),
(17, NULL, NULL, 1, '2022-09-08 13:36:27', 0),
(18, 15, NULL, NULL, '2022-08-08 13:37:22', 0),
(19, NULL, NULL, 1, '2022-09-08 13:37:59', 0),
(20, 15, NULL, NULL, '2022-09-08 13:39:18', 1),
(21, 15, NULL, NULL, '2022-09-08 20:09:00', 1),
(22, 15, NULL, NULL, '2022-09-08 20:10:48', 1),
(23, 15, NULL, NULL, '2022-09-08 20:13:18', 1),
(24, 15, NULL, NULL, '2022-09-08 20:18:07', 1),
(25, 15, NULL, NULL, '2022-09-08 20:20:53', 1),
(26, 15, NULL, NULL, '2022-09-08 20:21:45', 1),
(27, 15, NULL, NULL, '2022-09-08 20:22:02', 1),
(28, 15, NULL, NULL, '2022-09-08 20:22:15', 1),
(29, 15, NULL, NULL, '2022-09-08 20:22:26', 1),
(30, 15, NULL, NULL, '2022-09-08 20:22:37', 1),
(31, 15, NULL, NULL, '2022-09-08 20:23:27', 1),
(32, 15, NULL, NULL, '2022-09-08 20:24:14', 1),
(33, 15, NULL, NULL, '2022-09-08 20:24:26', 1),
(34, 13, NULL, NULL, '2022-09-08 20:25:02', 1),
(35, 15, NULL, NULL, '2022-09-08 20:25:21', 1),
(36, 13, NULL, NULL, '2022-09-08 20:25:37', 1),
(37, 15, NULL, NULL, '2022-09-08 20:25:53', 1),
(38, NULL, 19, NULL, '2022-08-08 20:29:30', 1),
(39, 15, NULL, NULL, '2022-09-08 20:32:04', 1),
(40, NULL, 19, NULL, '2022-08-08 20:36:35', 1),
(41, NULL, 19, NULL, '2022-09-08 20:43:15', 1),
(42, NULL, NULL, 1, '2022-09-08 20:43:35', 0),
(43, NULL, NULL, 1, '2022-09-08 20:45:55', 0),
(44, NULL, NULL, 1, '2022-09-08 20:46:15', 0),
(45, NULL, NULL, 1, '2022-09-08 20:47:09', 0),
(46, NULL, NULL, 1, '2022-09-08 20:48:06', 0),
(47, NULL, NULL, 1, '2022-09-08 20:54:03', 0),
(48, NULL, NULL, 1, '2022-09-08 20:54:46', 0),
(49, NULL, NULL, 1, '2022-09-08 20:57:36', 0),
(50, NULL, NULL, 1, '2022-09-08 21:00:53', 0),
(51, NULL, NULL, 1, '2022-09-08 21:02:32', 0),
(52, NULL, NULL, 1, '2022-09-08 21:04:24', 0),
(53, NULL, NULL, 1, '2022-09-08 21:13:01', 0),
(54, NULL, NULL, 1, '2022-09-08 21:20:28', 0),
(55, NULL, NULL, 1, '2022-09-08 21:22:22', 0),
(56, NULL, NULL, 1, '2022-09-08 21:24:12', 0),
(57, NULL, NULL, 1, '2022-09-08 21:25:55', 0),
(58, NULL, NULL, 1, '2022-09-08 21:33:01', 0),
(59, NULL, NULL, 1, '2022-09-08 21:34:12', 0),
(60, NULL, 19, NULL, '2022-09-08 21:44:49', 1),
(61, NULL, NULL, 1, '2022-09-08 21:45:42', 0),
(62, NULL, 19, NULL, '2022-09-08 21:46:00', 1),
(63, NULL, NULL, 1, '2022-09-08 21:52:17', 0),
(64, NULL, 19, NULL, '2022-09-08 21:52:28', 1),
(65, 19, NULL, NULL, '2022-09-08 21:55:37', 1),
(66, NULL, NULL, 1, '2022-09-08 21:58:55', 0),
(67, NULL, 19, NULL, '2022-09-08 21:59:23', 1),
(68, 19, NULL, NULL, '2022-09-08 21:59:36', 1),
(69, 19, NULL, NULL, '2022-09-08 22:00:45', 1),
(70, NULL, NULL, 1, '2022-09-08 22:03:31', 0),
(71, NULL, 19, NULL, '2022-09-08 22:05:47', 1),
(72, 19, NULL, NULL, '2022-09-08 22:17:40', 1),
(73, 19, NULL, NULL, '2022-09-09 07:42:41', 1),
(74, NULL, NULL, 1, '2022-09-09 07:48:56', 0),
(75, NULL, NULL, 1, '2022-09-09 07:49:20', 0),
(76, NULL, NULL, 1, '2022-09-09 07:50:05', 0),
(77, NULL, NULL, 1, '2022-09-09 08:35:47', 0),
(78, NULL, NULL, 1, '2022-09-09 08:37:30', 0),
(79, NULL, NULL, 1, '2022-09-09 08:38:19', 0),
(80, NULL, NULL, 1, '2022-09-09 08:38:54', 0),
(81, NULL, NULL, 1, '2022-09-09 08:39:51', 0),
(82, NULL, NULL, 1, '2022-09-09 08:40:08', 0),
(83, NULL, NULL, 1, '2022-09-09 08:42:28', 0),
(84, NULL, NULL, 1, '2022-09-09 08:50:10', 0),
(85, NULL, NULL, 1, '2022-09-09 08:59:19', 0),
(86, NULL, NULL, 1, '2022-09-09 08:59:37', 0),
(87, NULL, NULL, 1, '2022-09-09 08:59:59', 0),
(88, NULL, NULL, 1, '2022-09-09 09:00:20', 0),
(89, 21, NULL, NULL, '2022-09-09 09:03:43', 1),
(90, 22, NULL, NULL, '2022-09-09 09:04:24', 1),
(91, NULL, NULL, 1, '2022-09-09 09:19:22', 0),
(92, 22, NULL, NULL, '2022-09-09 09:30:12', 1),
(93, NULL, 19, NULL, '2022-09-09 09:30:52', 1),
(94, NULL, 19, NULL, '2022-09-09 09:31:21', 1),
(95, NULL, 19, NULL, '2022-09-09 09:33:22', 1),
(96, NULL, 19, NULL, '2022-09-09 09:34:06', 1),
(97, 22, NULL, NULL, '2022-09-09 18:35:20', 1),
(98, 22, NULL, NULL, '2022-09-09 18:35:44', 1),
(99, 22, NULL, NULL, '2022-09-09 19:31:18', 1),
(100, 22, NULL, NULL, '2022-09-09 19:32:01', 1),
(101, 22, NULL, NULL, '2022-09-09 22:03:09', 1),
(102, 22, NULL, NULL, '2022-09-09 22:21:38', 1),
(103, 22, NULL, NULL, '2022-09-09 22:21:48', 1),
(104, 22, NULL, NULL, '2022-09-09 22:32:00', 1),
(105, 22, NULL, NULL, '2022-09-09 22:32:10', 1),
(106, 22, NULL, NULL, '2022-09-10 18:16:23', 1),
(107, 22, NULL, NULL, '2022-09-11 09:41:23', 1),
(108, 22, NULL, NULL, '2022-09-11 09:49:37', 1),
(109, NULL, 19, NULL, '2022-09-11 09:49:52', 1),
(110, NULL, NULL, 1, '2022-09-11 09:50:23', 0),
(111, NULL, NULL, 1, '2022-09-11 11:00:54', 0),
(112, NULL, NULL, 1, '2022-09-11 18:22:07', 0),
(113, 22, NULL, NULL, '2022-11-11 18:25:58', 0),
(114, NULL, NULL, 1, '2022-09-12 11:02:45', 0),
(115, NULL, NULL, 1, '2022-09-12 11:03:21', 0),
(116, NULL, NULL, 2, '2022-09-12 11:12:29', 0),
(117, NULL, NULL, 2, '2022-09-12 11:12:44', 0),
(118, NULL, NULL, 2, '2022-09-12 11:13:46', 0),
(119, NULL, NULL, 1, '2022-09-12 11:14:32', 0),
(120, NULL, NULL, 2, '2022-09-12 11:29:59', 0),
(121, NULL, NULL, 1, '2022-09-12 11:31:04', 0),
(122, NULL, NULL, 1, '2022-09-12 11:33:12', 0),
(123, NULL, NULL, 1, '2022-09-12 14:03:49', 0),
(124, NULL, NULL, 2, '2022-09-12 14:05:23', 0),
(125, NULL, NULL, 1, '2022-09-12 14:09:42', 0),
(126, 23, NULL, NULL, '2022-09-12 14:20:52', 1),
(127, NULL, 25, NULL, '2022-09-12 14:23:58', 1),
(128, NULL, NULL, 1, '2022-09-12 14:24:54', 0),
(129, NULL, NULL, 1, '2022-09-12 14:32:02', 0),
(130, NULL, NULL, 1, '2022-09-12 14:32:13', 0),
(131, NULL, NULL, 1, '2022-09-12 14:36:43', 0),
(132, NULL, NULL, 1, '2022-09-12 14:37:39', 0),
(133, NULL, NULL, 1, '2022-09-12 14:41:11', 0),
(134, NULL, NULL, 1, '2022-09-12 14:43:12', 0),
(135, NULL, NULL, 1, '2022-09-12 14:48:56', 0),
(136, NULL, NULL, 1, '2022-09-12 14:54:50', 0),
(137, NULL, NULL, 1, '2022-09-12 14:55:00', 0),
(138, NULL, NULL, 1, '2022-09-12 14:55:29', 0),
(139, NULL, NULL, 1, '2022-09-12 15:13:51', 0),
(140, NULL, NULL, 1, '2022-09-12 15:14:52', 0),
(141, NULL, NULL, 1, '2022-09-12 15:17:43', 0),
(142, NULL, NULL, 1, '2022-09-12 15:17:58', 0),
(143, NULL, NULL, 1, '2022-09-12 15:18:42', 0),
(144, NULL, NULL, 1, '2022-09-12 15:21:05', 0),
(145, NULL, NULL, 1, '2022-09-12 15:21:40', 0),
(146, NULL, NULL, 1, '2022-09-12 15:23:04', 0),
(147, NULL, NULL, 1, '2022-09-12 15:38:08', 0),
(148, NULL, NULL, 1, '2022-09-12 15:41:48', 0),
(149, NULL, NULL, 1, '2022-09-12 15:49:23', 0),
(150, NULL, NULL, 1, '2022-09-12 15:50:08', 0),
(151, NULL, NULL, 1, '2022-09-12 15:50:42', 0),
(152, NULL, NULL, 1, '2022-09-12 15:56:09', 0),
(153, NULL, NULL, 1, '2022-09-12 15:56:38', 0),
(154, NULL, NULL, 1, '2022-09-12 15:57:50', 0),
(155, NULL, NULL, 1, '2022-09-12 15:58:59', 0),
(156, NULL, NULL, 1, '2022-09-12 15:59:06', 0),
(157, NULL, NULL, 1, '2022-09-12 15:59:44', 0),
(158, NULL, NULL, 1, '2022-09-12 16:02:15', 0),
(159, NULL, NULL, 1, '2022-09-12 16:04:40', 0),
(160, NULL, NULL, 1, '2022-09-12 18:09:28', 0),
(161, NULL, NULL, 1, '2022-09-12 18:10:52', 0),
(162, NULL, NULL, 1, '2022-09-12 18:11:04', 0),
(163, NULL, NULL, 1, '2022-09-12 18:18:03', 0),
(164, NULL, NULL, 1, '2022-09-12 18:22:27', 0),
(165, NULL, NULL, 1, '2022-09-12 18:57:14', 0),
(166, NULL, NULL, 1, '2022-09-12 19:01:31', 0),
(167, NULL, NULL, 1, '2022-09-12 19:26:34', 0),
(168, NULL, NULL, 1, '2022-09-12 19:30:35', 0),
(169, NULL, NULL, 1, '2022-09-12 19:30:47', 0),
(170, NULL, NULL, 1, '2022-09-12 19:31:07', 0),
(171, NULL, NULL, 1, '2022-09-12 19:33:06', 0),
(172, NULL, NULL, 1, '2022-09-13 09:27:32', 0),
(173, 26, NULL, NULL, '2022-09-13 09:27:51', 1),
(174, NULL, 29, NULL, '2022-09-13 09:29:14', 1),
(175, 27, NULL, NULL, '2022-09-13 09:37:39', 1),
(176, NULL, NULL, 1, '2022-09-13 11:14:13', 0),
(177, NULL, 29, NULL, '2022-09-13 12:55:16', 1),
(178, NULL, NULL, 1, '2022-09-13 13:32:23', 0),
(179, NULL, 29, NULL, '2022-09-13 19:12:17', 1),
(180, NULL, 29, NULL, '2022-09-13 19:15:41', 1),
(181, NULL, 29, NULL, '2022-09-13 19:15:54', 1),
(182, NULL, 29, NULL, '2022-09-13 19:16:08', 1),
(183, 27, NULL, NULL, '2022-09-13 19:35:40', 1),
(184, NULL, 29, NULL, '2022-09-13 19:49:01', 1),
(185, NULL, NULL, 1, '2022-09-13 20:42:05', 0),
(186, 27, NULL, NULL, '2022-09-13 21:27:04', 1),
(187, 27, NULL, NULL, '2022-09-13 21:28:10', 1),
(188, 27, NULL, NULL, '2022-09-13 21:28:48', 1),
(189, 27, NULL, NULL, '2022-09-13 21:29:39', 1),
(190, 27, NULL, NULL, '2022-09-13 21:29:50', 1),
(191, 27, NULL, NULL, '2022-09-13 21:32:54', 1),
(192, 27, NULL, NULL, '2022-09-13 21:34:59', 1),
(193, 27, NULL, NULL, '2022-09-13 21:35:18', 1),
(194, 27, NULL, NULL, '2022-09-13 21:35:35', 1),
(195, 27, NULL, NULL, '2022-09-13 21:38:51', 1),
(196, 27, NULL, NULL, '2022-09-13 21:39:03', 1),
(197, 27, NULL, NULL, '2022-09-13 21:39:15', 1),
(198, NULL, 29, NULL, '2022-09-13 21:45:18', 1),
(199, NULL, 29, NULL, '2022-09-13 21:46:34', 1),
(200, NULL, 29, NULL, '2022-09-13 21:54:42', 1),
(201, NULL, 29, NULL, '2022-09-13 21:54:53', 1),
(202, NULL, 29, NULL, '2022-09-13 21:55:12', 1),
(203, NULL, 29, NULL, '2022-09-13 21:55:22', 1),
(204, NULL, 29, NULL, '2022-09-13 21:57:05', 1),
(205, NULL, 29, NULL, '2022-09-13 21:57:14', 1),
(206, NULL, 29, NULL, '2022-09-13 21:57:26', 1),
(207, NULL, 29, NULL, '2022-09-13 21:57:44', 1),
(208, 27, NULL, NULL, '2022-09-13 21:58:00', 1),
(209, NULL, 29, NULL, '2022-09-13 21:59:54', 1),
(210, NULL, 29, NULL, '2022-09-13 22:00:14', 1),
(211, NULL, 29, NULL, '2022-09-13 22:00:25', 1),
(212, NULL, 29, NULL, '2022-09-13 22:00:35', 1),
(213, NULL, NULL, 1, '2022-09-13 22:13:14', 0),
(214, NULL, NULL, 1, '2022-09-13 22:14:19', 0),
(215, NULL, NULL, 1, '2022-09-13 22:14:37', 0),
(216, NULL, NULL, 1, '2022-09-13 22:15:46', 0),
(217, NULL, NULL, 1, '2022-09-13 22:16:03', 0),
(218, NULL, NULL, 1, '2022-09-13 22:16:12', 0),
(219, NULL, NULL, 1, '2022-09-13 22:16:20', 0),
(220, NULL, NULL, 1, '2022-09-13 22:16:28', 0),
(221, NULL, NULL, 1, '2022-09-13 22:25:03', 0),
(222, NULL, NULL, 1, '2022-09-13 22:25:12', 0),
(223, NULL, NULL, 1, '2022-09-13 22:25:21', 0),
(224, NULL, NULL, 1, '2022-09-13 22:25:32', 0),
(225, NULL, NULL, 1, '2022-09-13 22:25:44', 0),
(226, NULL, NULL, 1, '2022-09-13 22:25:54', 0),
(227, NULL, NULL, 1, '2022-09-13 22:26:03', 0),
(228, NULL, NULL, 1, '2022-09-13 22:26:12', 0),
(229, NULL, NULL, 1, '2022-09-13 22:27:29', 0),
(230, NULL, NULL, 1, '2022-09-13 22:31:18', 0),
(231, NULL, NULL, 1, '2022-09-13 22:33:07', 0),
(232, NULL, NULL, 1, '2022-09-13 22:33:56', 0),
(233, NULL, NULL, 1, '2022-09-13 22:34:10', 0),
(234, NULL, NULL, 1, '2022-09-13 22:35:49', 0),
(235, NULL, NULL, 1, '2022-09-13 22:36:25', 0),
(236, NULL, NULL, 1, '2022-09-13 22:36:33', 0),
(237, NULL, NULL, 1, '2022-09-13 22:37:26', 0),
(238, NULL, NULL, 1, '2022-09-13 22:37:39', 0),
(239, NULL, NULL, 1, '2022-09-13 22:39:13', 0),
(240, NULL, NULL, 1, '2022-09-13 22:48:51', 0),
(241, NULL, NULL, 1, '2022-09-13 22:49:05', 0),
(242, NULL, NULL, 1, '2022-09-13 22:49:13', 0),
(243, NULL, NULL, 1, '2022-09-13 22:55:03', 0),
(244, NULL, NULL, 1, '2022-09-13 22:55:14', 0),
(245, NULL, NULL, 1, '2022-09-13 22:58:10', 0),
(246, NULL, NULL, 1, '2022-09-13 22:58:19', 0),
(247, NULL, NULL, 1, '2022-09-13 22:58:31', 0),
(248, NULL, NULL, 1, '2022-09-13 22:58:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_mitra`
--

CREATE TABLE `data_mitra` (
  `id_mitra` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='berisi username dan password mitra';

--
-- Dumping data for table `data_mitra`
--

INSERT INTO `data_mitra` (`id_mitra`, `username`, `password`, `deleted`) VALUES
(16, 'mitra1', '12345678', 1),
(17, 'mitra2', '12345678', 1),
(18, 'mitra baru', 'qwertyui', 1),
(19, 'mitra', '12345678', 1),
(20, 'mitra baru', '09876543', 1),
(21, 'mitra2', 'qwertyui', 1),
(22, 'mitra2', 'qwertyui', 1),
(23, 'mitra baru', 'qwertyui', 1),
(24, 'petugas baru', 'asdfghjk', 1),
(25, 'mitra2', '$2y$10$YRFTfcK8RshUIJK9s2VIy.jzFYUrhmOHHIxHXkU5HH9TmuI0ytigi', 1),
(26, 'mitra2', '$2y$10$8k3biimjotp7oFIgQGWXSuIJKcvKF8nbrFL1y8OdLasAbG2PRAklu', 1),
(27, 'mitra2', '$2y$10$9QRSkL8bC/MLicmR8kVdiOb0IscVIpKXHB4TS8ZGHtIbZ/7SPIqOG', 1),
(28, 'mitra baru', '$2y$10$0GWkENuqzLikEHHr1bopnOXyq8OBXZ9yWck8xWBSAP6hwxiEqr/NS', 1),
(29, 'mitra1', '$2y$10$3/v1xh2oow8FmLbfkTbQ7.0MyKgaxHlMkDCV84bc8/ekM.7S0rmR6', 1),
(30, 'mitra2', '$2y$10$8E2ajfwCKQi.Gf5pqwvrPe6fO.xCur1dBpChU0Mu0hmJTU7skU6RK', 1),
(31, 'mitra1', '$2y$10$A0XhHvmJKxFqNEh3HvDBIOr8lO3932vqB1HSW0i80ZI/kKwcsEoBG', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_petugas`
--

CREATE TABLE `data_petugas` (
  `id_petugas` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='berisi username dan password petugas';

--
-- Dumping data for table `data_petugas`
--

INSERT INTO `data_petugas` (`id_petugas`, `username`, `password`, `deleted`) VALUES
(1, 'petugas1', '12345678', 1),
(2, 'petugas baru', '12345678', 1),
(6, 'petugas2', 'qwertyui', 1),
(12, 'petugas2', '12345678', 1),
(13, 'petugas baru', '12345678', 1),
(14, 'petugas2', '12345678', 1),
(15, 'petugas2', '09876543', 1),
(17, 'petugas2', '09876543', 1),
(18, 'petugas2', '09876543', 1),
(19, 'petugas2', '12345678', 1),
(20, 'petugas3', 'qwertyui', 1),
(21, 'petugas1', '12345678', 1),
(22, 'petugas2', '12345678', 1),
(23, 'petugas1', '$2y$10$H38v7B5HDhGNa6jz8Knh..wo5L4XhB4QPWTOJ/WLcpGgZWNXfUNtC', 1),
(24, 'petugas baru', '$2y$10$A/VOdkXLtQapSJgOSXbo.eIWnDV22QDbyF9ySwf28SaG17i4wS9ra', 1),
(25, 'petugas1', '$2y$10$hJKM0M4mGRplGePEXWrWweshZINh9n9CrHRYIxpuHU36bBUCaGaTa', 1),
(26, 'petugas1', '$2y$10$VYqDqQf9frz1iGoeFL3BUO3MF48HdtlwYRCePgaX4GNk5L2i4mA32', 1),
(27, 'petugas1', '$2y$10$fIC.s4tW5/mXCtQ4t9qo9O3TzEq9DGWzRpcKXF63AGz2dmAhNyNFG', 1),
(28, 'petugas2', '$2y$10$OvimY3w.iRPcU/a7Mq61gejcOdZyjCvzmY1m.zy2RajvJ9j36OLWi', 1),
(29, 'petugas2', '$2y$10$IWbV7vYM4/p7rnbtA4o.B.4Ee4El5osmye154NmK6mB5mR7QVEfMW', 1),
(30, 'petugas1', '$2y$10$8WO/MeOewu7WlLNv8FYhDuM4diQ6zDdOHr3aI2MYx0VbZaIedp8pi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jumlah_kendaraan`
--

CREATE TABLE `jumlah_kendaraan` (
  `mobil` int(5) NOT NULL,
  `motor` int(5) NOT NULL,
  `total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kartu_daftar`
--

CREATE TABLE `kartu_daftar` (
  `id` int(5) NOT NULL,
  `id_kode_kartu` int(5) NOT NULL,
  `id_status` int(1) NOT NULL,
  `id_jenis` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kartu_daftar`
--

INSERT INTO `kartu_daftar` (`id`, `id_kode_kartu`, `id_status`, `id_jenis`) VALUES
(28, 28, 1, 2),
(29, 29, 2, 1),
(30, 30, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `kartu_jenis`
--

CREATE TABLE `kartu_jenis` (
  `id_jenis` int(1) NOT NULL,
  `jenis` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kartu_jenis`
--

INSERT INTO `kartu_jenis` (`id_jenis`, `jenis`) VALUES
(1, 'Mobil'),
(2, 'Motor'),
(3, '-');

-- --------------------------------------------------------

--
-- Table structure for table `kartu_kartu`
--

CREATE TABLE `kartu_kartu` (
  `id_kode_kartu` int(5) NOT NULL,
  `kode_kartu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kartu_kartu`
--

INSERT INTO `kartu_kartu` (`id_kode_kartu`, `kode_kartu`) VALUES
(28, '0008781869'),
(29, '0008742164'),
(30, '0014386783');

-- --------------------------------------------------------

--
-- Table structure for table `kartu_status`
--

CREATE TABLE `kartu_status` (
  `id_status` int(1) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kartu_status`
--

INSERT INTO `kartu_status` (`id_status`, `status`) VALUES
(1, 'Visitor'),
(2, 'Member'),
(3, 'Guest'),
(4, 'VIP');

-- --------------------------------------------------------

--
-- Table structure for table `parkir_daftar`
--

CREATE TABLE `parkir_daftar` (
  `id` int(255) NOT NULL,
  `id_kode_kartu` int(5) NOT NULL,
  `id_status` int(1) NOT NULL,
  `id_jenis` int(1) NOT NULL,
  `waktu_masuk` datetime NOT NULL,
  `waktu_keluar` datetime DEFAULT NULL,
  `durasi` varchar(20) DEFAULT NULL,
  `id_tarif` int(1) NOT NULL,
  `tarif_parkir` varchar(10) DEFAULT NULL,
  `deleted` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parkir_daftar`
--

INSERT INTO `parkir_daftar` (`id`, `id_kode_kartu`, `id_status`, `id_jenis`, `waktu_masuk`, `waktu_keluar`, `durasi`, `id_tarif`, `tarif_parkir`, `deleted`) VALUES
(13, 1, 1, 2, '2022-09-05 12:00:34', '2022-09-06 09:53:42', '21 jam 53 menit', 2, '5000', 1),
(14, 3, 2, 1, '2022-09-05 12:00:44', '2022-09-06 09:50:25', '21 jam 49 menit', 3, 'Gratis', 1),
(19, 2, 4, 3, '2022-09-06 09:25:34', '2022-09-06 09:50:16', '0 jam 24 menit', 3, 'Gratis', 1),
(24, 1, 1, 2, '2022-09-05 10:12:46', '2022-09-05 10:19:21', '0 jam 6 menit', 2, 'Gratis', 1),
(25, 2, 4, 3, '2022-09-04 10:30:21', '2022-09-04 10:44:04', '0 jam 13 menit', 3, 'Gratis', 1),
(26, 3, 2, 1, '2022-09-02 10:31:04', '2022-09-02 10:44:08', '0 jam 13 menit', 3, 'Gratis', 1),
(27, 1, 1, 2, '2022-09-06 10:31:59', '2022-09-06 10:44:00', '0 jam 12 menit', 2, '2000', 1),
(28, 1, 1, 2, '2022-09-06 10:47:19', '2022-09-06 10:53:27', '0 jam 6 menit', 2, 'Gratis', 1),
(29, 3, 2, 1, '2022-09-06 10:47:22', '2022-09-06 10:52:28', '0 jam 5 menit', 3, 'Gratis', 1),
(30, 2, 4, 3, '2022-09-06 10:47:24', '2022-09-06 10:52:50', '0 jam 5 menit', 3, 'Gratis', 1),
(31, 3, 2, 1, '2022-09-06 10:52:30', '2022-09-06 10:53:35', '0 jam 1 menit', 3, 'Gratis', 1),
(32, 2, 4, 3, '2022-09-06 10:53:08', '2022-09-06 10:53:32', '0 jam 0 menit', 3, 'Gratis', 1),
(34, 1, 1, 2, '2022-09-06 10:55:42', '2022-09-07 10:02:00', '23 jam 6 menit', 2, '5000', 1),
(35, 3, 2, 1, '2022-09-07 10:02:03', '2022-09-07 10:02:32', '0 jam 0 menit', 3, 'Gratis', 1),
(36, 2, 4, 3, '2022-09-07 10:02:07', '2022-09-07 10:02:15', '0 jam 0 menit', 3, 'Gratis', 1),
(37, 3, 2, 1, '2022-09-07 13:09:37', '2022-09-08 10:58:46', '21 jam 49 menit', 3, 'Gratis', 1),
(38, 2, 4, 3, '2022-09-07 13:09:40', '2022-09-08 10:58:03', '21 jam 48 menit', 3, 'Gratis', 1),
(39, 1, 1, 2, '2022-09-07 13:09:44', '2022-09-08 10:59:19', '21 jam 49 menit', 2, '5000', 1),
(40, 2, 4, 3, '2022-09-08 10:58:56', '2022-09-08 10:59:42', '0 jam 0 menit', 3, 'Gratis', 1),
(41, 1, 1, 2, '2022-09-08 10:59:30', '2022-09-08 13:38:36', '2 jam 39 menit', 2, '4000', 1),
(42, 3, 2, 1, '2022-09-08 10:59:44', '2022-09-10 18:33:07', '55 jam 33 menit', 3, 'Gratis', 1),
(43, 2, 4, 3, '2022-09-08 10:59:48', '2022-09-10 18:32:53', '55 jam 33 menit', 3, 'Gratis', 1),
(44, 1, 1, 2, '2022-09-10 17:33:00', '2022-09-10 18:34:17', '1 jam 1 menit', 2, '3000', 1),
(45, 2, 4, 3, '2022-09-13 18:28:48', '2022-09-13 18:29:09', '0 jam 0 menit', 3, 'Gratis', 1),
(46, 3, 2, 1, '2022-09-13 18:29:01', '2022-09-13 18:30:01', '0 jam 1 menit', 3, 'Gratis', 1),
(47, 1, 1, 2, '2022-09-13 18:29:15', '2022-09-13 18:29:54', '0 jam 0 menit', 2, 'Gratis', 1),
(48, 2, 4, 3, '2022-09-13 18:29:36', '2022-09-13 18:29:50', '0 jam 0 menit', 3, 'Gratis', 1),
(49, 2, 4, 3, '2022-09-13 20:09:33', '2022-09-13 20:10:06', '0 jam 0 menit', 3, 'Gratis', 1),
(50, 1, 1, 2, '2022-09-13 20:09:41', '2022-09-13 20:09:48', '0 jam 0 menit', 2, 'Gratis', 1),
(51, 1, 1, 2, '2022-09-13 20:15:54', '2022-09-13 21:31:43', '1 jam 15 menit', 2, '3000', 1),
(52, 2, 4, 3, '2022-09-13 20:15:57', '2022-09-13 21:32:13', '1 jam 16 menit', 3, 'Gratis', 1),
(53, 3, 2, 1, '2022-09-13 20:15:59', '2022-09-13 21:31:52', '1 jam 15 menit', 3, 'Gratis', 1),
(54, 2, 4, 3, '2022-09-13 21:33:22', '2022-09-13 21:33:31', '0 jam 0 menit', 3, 'Gratis', 1),
(55, 2, 4, 3, '2022-09-13 21:35:53', '2022-09-13 21:36:28', '0 jam 0 menit', 3, 'Gratis', 1),
(56, 1, 1, 2, '2022-09-13 21:36:05', '2022-09-13 21:36:37', '0 jam 0 menit', 2, 'Gratis', 1),
(57, 3, 2, 1, '2022-09-13 21:36:12', '2022-09-13 21:36:20', '0 jam 0 menit', 3, 'Gratis', 1),
(58, 2, 4, 3, '2022-09-13 21:58:06', '2022-09-13 21:58:59', '0 jam 0 menit', 3, 'Gratis', 1),
(59, 3, 2, 1, '2022-09-13 21:58:13', '2022-09-13 21:58:35', '0 jam 0 menit', 3, 'Gratis', 1),
(60, 1, 1, 2, '2022-09-13 21:58:23', '2022-09-13 21:58:51', '0 jam 0 menit', 2, 'Gratis', 1),
(61, 3, 2, 1, '2022-09-13 21:59:07', '2022-09-13 21:59:12', '0 jam 0 menit', 3, 'Gratis', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parkir_jenis`
--

CREATE TABLE `parkir_jenis` (
  `id_jenis` int(1) NOT NULL,
  `jenis` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parkir_jenis`
--

INSERT INTO `parkir_jenis` (`id_jenis`, `jenis`) VALUES
(1, 'Mobil'),
(2, 'Motor'),
(3, '-');

-- --------------------------------------------------------

--
-- Table structure for table `parkir_kartu`
--

CREATE TABLE `parkir_kartu` (
  `id_kode_kartu` int(5) NOT NULL,
  `kode_kartu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parkir_kartu`
--

INSERT INTO `parkir_kartu` (`id_kode_kartu`, `kode_kartu`) VALUES
(1, '0008781869'),
(2, '0014386783'),
(3, '0008742164'),
(4, '0008781869'),
(5, '0014386783'),
(6, '0008742164'),
(7, '0008781869'),
(8, '0014386783'),
(9, '0008742164'),
(10, '0008781869'),
(11, '0008742164'),
(12, '0014386783'),
(13, '0008781869'),
(14, '0014386783'),
(15, '0008742164'),
(16, '0008742164'),
(17, '0014386783'),
(18, '0008781869'),
(19, '0008781869'),
(20, '0008742164'),
(21, '0014386783'),
(22, '0014386783'),
(23, '0008742164'),
(24, '0008781869'),
(25, '0008781869'),
(26, '0008742164'),
(27, '0014386783'),
(28, '0008781869'),
(29, '0008742164'),
(30, '0014386783');

-- --------------------------------------------------------

--
-- Table structure for table `parkir_status`
--

CREATE TABLE `parkir_status` (
  `id_status` int(1) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parkir_status`
--

INSERT INTO `parkir_status` (`id_status`, `status`) VALUES
(1, 'Visitor'),
(2, 'Member'),
(3, 'Guest'),
(4, 'VIP');

-- --------------------------------------------------------

--
-- Table structure for table `parkir_tarif`
--

CREATE TABLE `parkir_tarif` (
  `id_tarif` int(1) NOT NULL,
  `tarif` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parkir_tarif`
--

INSERT INTO `parkir_tarif` (`id_tarif`, `tarif`) VALUES
(1, '4000'),
(2, '2000'),
(3, '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `data_aktivitas`
--
ALTER TABLE `data_aktivitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `deleted` (`deleted`),
  ADD KEY `id_mitra` (`id_mitra`);

--
-- Indexes for table `data_mitra`
--
ALTER TABLE `data_mitra`
  ADD PRIMARY KEY (`id_mitra`),
  ADD KEY `deleted` (`deleted`);

--
-- Indexes for table `data_petugas`
--
ALTER TABLE `data_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `kartu_daftar`
--
ALTER TABLE `kartu_daftar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_kartu` (`id_status`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_kode_kartu` (`id_kode_kartu`);

--
-- Indexes for table `kartu_jenis`
--
ALTER TABLE `kartu_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kartu_kartu`
--
ALTER TABLE `kartu_kartu`
  ADD PRIMARY KEY (`id_kode_kartu`);

--
-- Indexes for table `kartu_status`
--
ALTER TABLE `kartu_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `parkir_daftar`
--
ALTER TABLE `parkir_daftar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_kode_kartu` (`id_kode_kartu`),
  ADD KEY `id_tarif` (`id_tarif`);

--
-- Indexes for table `parkir_jenis`
--
ALTER TABLE `parkir_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `parkir_kartu`
--
ALTER TABLE `parkir_kartu`
  ADD PRIMARY KEY (`id_kode_kartu`);

--
-- Indexes for table `parkir_status`
--
ALTER TABLE `parkir_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `parkir_tarif`
--
ALTER TABLE `parkir_tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_aktivitas`
--
ALTER TABLE `data_aktivitas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `data_mitra`
--
ALTER TABLE `data_mitra`
  MODIFY `id_mitra` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `data_petugas`
--
ALTER TABLE `data_petugas`
  MODIFY `id_petugas` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `kartu_daftar`
--
ALTER TABLE `kartu_daftar`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `kartu_kartu`
--
ALTER TABLE `kartu_kartu`
  MODIFY `id_kode_kartu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `parkir_daftar`
--
ALTER TABLE `parkir_daftar`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `parkir_kartu`
--
ALTER TABLE `parkir_kartu`
  MODIFY `id_kode_kartu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_aktivitas`
--
ALTER TABLE `data_aktivitas`
  ADD CONSTRAINT `id_admin` FOREIGN KEY (`id_admin`) REFERENCES `data_admin` (`id_admin`),
  ADD CONSTRAINT `id_mitra` FOREIGN KEY (`id_mitra`) REFERENCES `data_mitra` (`id_mitra`) ON UPDATE CASCADE,
  ADD CONSTRAINT `id_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `data_petugas` (`id_petugas`);

--
-- Constraints for table `kartu_daftar`
--
ALTER TABLE `kartu_daftar`
  ADD CONSTRAINT `id_jenis` FOREIGN KEY (`id_jenis`) REFERENCES `kartu_jenis` (`id_jenis`),
  ADD CONSTRAINT `id_kode_kartu` FOREIGN KEY (`id_kode_kartu`) REFERENCES `kartu_kartu` (`id_kode_kartu`),
  ADD CONSTRAINT `id_status` FOREIGN KEY (`id_status`) REFERENCES `kartu_status` (`id_status`);

--
-- Constraints for table `parkir_daftar`
--
ALTER TABLE `parkir_daftar`
  ADD CONSTRAINT `id_jenis_parkir` FOREIGN KEY (`id_jenis`) REFERENCES `parkir_jenis` (`id_jenis`),
  ADD CONSTRAINT `id_kode_kartu_parkir` FOREIGN KEY (`id_kode_kartu`) REFERENCES `parkir_kartu` (`id_kode_kartu`),
  ADD CONSTRAINT `id_status_parkir` FOREIGN KEY (`id_status`) REFERENCES `parkir_status` (`id_status`),
  ADD CONSTRAINT `id_tarif_parkir` FOREIGN KEY (`id_tarif`) REFERENCES `parkir_tarif` (`id_tarif`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
