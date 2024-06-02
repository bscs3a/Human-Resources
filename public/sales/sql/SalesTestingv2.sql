-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 02, 2024 at 12:09 PM
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
-- Database: `bscs3a`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounttype`
--

CREATE TABLE `accounttype` (
  `AccountType` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `grouptype` varchar(2) NOT NULL,
  `XactTypeCode` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounttype`
--

INSERT INTO `accounttype` (`AccountType`, `Description`, `grouptype`, `XactTypeCode`) VALUES
(1, 'Fixed assets', 'AA', 'DR'),
(2, 'Current assets', 'AA', 'DR'),
(3, 'Capital Accounts', 'LE', 'CR'),
(4, 'Accounts Payable', 'LE', 'CR'),
(5, 'Sales', 'IC', 'CR'),
(6, 'Contra-Revenue', 'IC', 'DR'),
(7, 'Direct Expense', 'EP', 'DR'),
(8, 'Indirect Expense', 'EP', 'DR'),
(9, 'Purchases', 'IC', 'DR'),
(10, 'Tax Payable', 'LE', 'Cr'),
(11, 'Retained', 'LE', 'Cr');

-- --------------------------------------------------------

--
-- Table structure for table `account_info`
--

CREATE TABLE `account_info` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `employees_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_info`
--

INSERT INTO `account_info` (`id`, `username`, `password`, `employees_id`) VALUES
(1, 'bscs3a001', '$2y$10$iQV1mMZ7wNqr8dz7tvLLGu7oW5B3nkui35vdRtGEzJs3dCsuptmcK', 1),
(2, 'bscs3a002', '$2y$10$iQV1mMZ7wNqr8dz7tvLLGu7oW5B3nkui35vdRtGEzJs3dCsuptmcK', 2),
(3, 'bscs3a003', '$2y$10$iQV1mMZ7wNqr8dz7tvLLGu7oW5B3nkui35vdRtGEzJs3dCsuptmcK', 3),
(4, 'bscs3a004', '$2y$10$iQV1mMZ7wNqr8dz7tvLLGu7oW5B3nkui35vdRtGEzJs3dCsuptmcK', 4),
(5, 'bscs3a005', '$2y$10$iQV1mMZ7wNqr8dz7tvLLGu7oW5B3nkui35vdRtGEzJs3dCsuptmcK', 5),
(6, 'bscs3a006', '$2y$10$Sipls.NxKvU5N7AGAEmy5.HvsXo2j080wk9cHih8h2puA.kSeJNna', 6),
(7, 'bscs3a007', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 7),
(8, 'bscs3a008', '$2y$10$uxtn/YaNWUUgbFmgNeuf3Orijlbu.kq1lbLt3jXYGf/ZRJZ2Ccgyq', 8),
(9, 'bscs3a009', '$2y$10$2zKFlxCS7GcQ6h3fnBSFMuSjMMP2J1GIRPF4u7jcRb848dOnZA7ZG', 9),
(10, 'bscs3a010', '$2y$10$vgUdfpy3TvypVuracMwvHu9.EYJeBmO2/tnMAfRstMIE20hm3TZJy', 10),
(11, 'bscs3a011', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 11),
(12, 'bscs3a012', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 12),
(13, 'bscs3a013', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 13),
(14, 'bscs3a014', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 14),
(15, 'bscs3a015', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 15),
(16, 'bscs3a016', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 16),
(17, 'bscs3a017', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 17),
(18, 'bscs3a018', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 18),
(19, 'bscs3a019', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 19),
(20, 'bscs3a020', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 20),
(21, 'bscs3a021', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 21),
(22, 'bscs3a022', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 22),
(23, 'bscs3a023', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 23),
(24, 'bscs3a024', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 24),
(25, 'bscs3a025', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 25),
(26, 'bscs3a026', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 26),
(27, 'bscs3a027', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 27),
(28, 'bscs3a028', '$2y$10$neqBp9NMNxCcmp43AyrPD.2dixlLkR/vcBbXM81YQ.XIpUDirgzLy', 28),
(29, 'bscs3a029', '$2y$10$G6ZoGIFIGVF8zWEfwkRK/eR0s2yaikrcUoRXTQYjjpAELPjDt6wCC', 29);

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(10) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) NOT NULL,
  `dateofbirth` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `civil_status` enum('Single','Married','Divorced','Widowed') NOT NULL,
  `applyingForDepartment` enum('Product Order','Human Resources','Point of Sales','Inventory','Finance','Delivery') NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(20) DEFAULT 'N/A',
  `email` varchar(30) DEFAULT 'Email not available',
  `applyingForPosition` varchar(30) NOT NULL,
  `apply_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(10) NOT NULL,
  `attendance_date` date NOT NULL,
  `clock_in` varchar(20) NOT NULL,
  `clock_out` varchar(20) DEFAULT NULL,
  `employees_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `attendance_date`, `clock_in`, `clock_out`, `employees_id`) VALUES
(1, '2024-06-02', '12:18:21', '12:18:22', 6),
(2, '2024-06-02', '12:43:21', '12:43:23', 5),
(3, '2024-06-02', '13:14:57', '13:14:57', 10),
(4, '2024-06-02', '13:42:19', NULL, 7),
(5, '2024-06-02', '13:47:30', NULL, 11),
(6, '2024-06-02', '13:47:40', NULL, 12),
(7, '2024-06-02', '13:47:50', NULL, 13);

-- --------------------------------------------------------

--
-- Table structure for table `audit_log`
--

CREATE TABLE `audit_log` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `action` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit_log`
--

INSERT INTO `audit_log` (`id`, `account_id`, `datetime`, `action`) VALUES
(1, 7, '2024-06-02 06:10:56', 'POST: /master/logout'),
(2, 1, '2024-06-02 06:16:54', 'POST: /master/login'),
(3, 1, '2024-06-02 06:18:15', 'POST: /master/logout'),
(4, 6, '2024-06-02 06:18:18', 'POST: /master/login'),
(5, 6, '2024-06-02 06:18:18', 'GET: /master/po/audit_logs/page=1'),
(6, 6, '2024-06-02 06:18:18', 'GET: /master/po/audit_logs/page=1'),
(7, 6, '2024-06-02 06:18:20', 'POST: /master/clock-in'),
(8, 6, '2024-06-02 06:18:21', 'GET: /master/po/audit_logs/page=1'),
(9, 6, '2024-06-02 06:18:21', 'GET: /master/po/audit_logs/page=1'),
(10, 6, '2024-06-02 06:18:22', 'POST: /master/clock-out'),
(11, 6, '2024-06-02 06:18:22', 'GET: /master/po/audit_logs/page=1'),
(12, 6, '2024-06-02 06:18:22', 'GET: /master/po/audit_logs/page=1'),
(13, 6, '2024-06-02 06:18:25', 'GET: /master/po/audit_logs/page=2'),
(14, 6, '2024-06-02 06:18:25', 'GET: /master/po/audit_logs/page=1'),
(15, 6, '2024-06-02 06:18:26', 'GET: /master/po/audit_logs/page=3'),
(16, 6, '2024-06-02 06:18:26', 'GET: /master/po/audit_logs/page=1'),
(17, 6, '2024-06-02 06:18:27', 'GET: /master/po/audit_logs/page=1'),
(18, 6, '2024-06-02 06:18:28', 'GET: /master/po/audit_logs/page=1'),
(19, 6, '2024-06-02 06:18:28', 'GET: /master/po/audit_logs/page=2'),
(20, 6, '2024-06-02 06:18:29', 'GET: /master/po/audit_logs/page=1'),
(21, 6, '2024-06-02 06:18:29', 'GET: /master/po/audit_logs/page=3'),
(22, 6, '2024-06-02 06:18:29', 'GET: /master/po/audit_logs/page=1'),
(23, 6, '2024-06-02 06:18:30', 'GET: /master/po/audit_logs/page=1'),
(24, 6, '2024-06-02 06:18:30', 'GET: /master/po/audit_logs/page=1'),
(25, 6, '2024-06-02 06:18:33', 'GET: /master/po/audit_logs/page=2'),
(26, 6, '2024-06-02 06:18:33', 'GET: /master/po/audit_logs/page=1'),
(27, 6, '2024-06-02 06:18:34', 'GET: /master/po/audit_logs/page=1'),
(28, 6, '2024-06-02 06:18:34', 'GET: /master/po/audit_logs/page=1'),
(29, 6, '2024-06-02 06:18:51', 'GET: /master/po/audit_logs/page=2'),
(30, 6, '2024-06-02 06:18:51', 'GET: /master/po/audit_logs/page=1'),
(31, 6, '2024-06-02 06:18:52', 'GET: /master/po/audit_logs/page=3'),
(32, 6, '2024-06-02 06:18:52', 'GET: /master/po/audit_logs/page=1'),
(33, 6, '2024-06-02 06:18:53', 'GET: /master/po/audit_logs/page=4'),
(34, 6, '2024-06-02 06:18:53', 'GET: /master/po/audit_logs/page=1'),
(35, 6, '2024-06-02 06:18:54', 'GET: /master/po/audit_logs/page=5'),
(36, 6, '2024-06-02 06:18:54', 'GET: /master/po/audit_logs/page=1'),
(37, 6, '2024-06-02 06:18:55', 'GET: /master/po/audit_logs/page=6'),
(38, 6, '2024-06-02 06:18:55', 'GET: /master/po/audit_logs/page=1'),
(39, 6, '2024-06-02 06:18:56', 'GET: /master/po/audit_logs/page=4'),
(40, 6, '2024-06-02 06:18:56', 'GET: /master/po/audit_logs/page=1'),
(41, 6, '2024-06-02 06:18:57', 'GET: /master/po/audit_logs/page=2'),
(42, 6, '2024-06-02 06:18:57', 'GET: /master/po/audit_logs/page=1'),
(43, 6, '2024-06-02 06:18:58', 'GET: /master/po/audit_logs/page=1'),
(44, 6, '2024-06-02 06:18:58', 'GET: /master/po/audit_logs/page=1'),
(45, 6, '2024-06-02 06:21:39', 'GET: /master/po/audit_logs/page=1'),
(46, 6, '2024-06-02 06:21:39', 'GET: /master/po/audit_logs/page=1'),
(47, 6, '2024-06-02 06:21:40', 'GET: /master/po/audit_logs/page=2'),
(48, 6, '2024-06-02 06:21:41', 'GET: /master/po/audit_logs/page=1'),
(49, 6, '2024-06-02 06:21:41', 'GET: /master/po/audit_logs/page=3'),
(50, 6, '2024-06-02 06:21:42', 'GET: /master/po/audit_logs/page=1'),
(51, 6, '2024-06-02 06:21:42', 'GET: /master/po/audit_logs/page=4'),
(52, 6, '2024-06-02 06:21:43', 'GET: /master/po/audit_logs/page=1'),
(53, 6, '2024-06-02 06:21:43', 'GET: /master/po/audit_logs/page=5'),
(54, 6, '2024-06-02 06:21:44', 'GET: /master/po/audit_logs/page=1'),
(55, 6, '2024-06-02 06:21:44', 'GET: /master/po/audit_logs/page=6'),
(56, 6, '2024-06-02 06:21:45', 'GET: /master/po/audit_logs/page=1'),
(57, 6, '2024-06-02 06:21:45', 'GET: /master/po/audit_logs/page=7'),
(58, 6, '2024-06-02 06:21:45', 'GET: /master/po/audit_logs/page=1'),
(59, 6, '2024-06-02 06:21:46', 'GET: /master/po/audit_logs/page=8'),
(60, 6, '2024-06-02 06:21:47', 'GET: /master/po/audit_logs/page=1'),
(61, 6, '2024-06-02 06:21:48', 'GET: /master/po/audit_logs/page=6'),
(62, 6, '2024-06-02 06:21:48', 'GET: /master/po/audit_logs/page=1'),
(63, 6, '2024-06-02 06:21:49', 'GET: /master/po/audit_logs/page=4'),
(64, 6, '2024-06-02 06:21:49', 'GET: /master/po/audit_logs/page=1'),
(65, 6, '2024-06-02 06:21:50', 'GET: /master/po/audit_logs/page=2'),
(66, 6, '2024-06-02 06:21:50', 'GET: /master/po/audit_logs/page=1'),
(67, 6, '2024-06-02 06:21:52', 'GET: /master/po/audit_logs/page=1'),
(68, 6, '2024-06-02 06:21:52', 'GET: /master/po/audit_logs/page=1'),
(69, 6, '2024-06-02 06:21:55', 'GET: /master/po/audit_logs/page=1'),
(70, 6, '2024-06-02 06:21:55', 'GET: /master/po/audit_logs/page=1'),
(71, 6, '2024-06-02 06:22:02', 'GET: /master/po/audit_logs/page=2'),
(72, 6, '2024-06-02 06:22:03', 'GET: /master/po/audit_logs/page=1'),
(73, 6, '2024-06-02 06:22:14', 'GET: /master/po/audit_logs/page=3'),
(74, 6, '2024-06-02 06:22:14', 'GET: /master/po/audit_logs/page=1'),
(75, 6, '2024-06-02 06:22:49', 'GET: /master/po/audit_logs/page=1'),
(76, 6, '2024-06-02 06:22:49', 'GET: /master/po/audit_logs/page=1'),
(77, 6, '2024-06-02 06:22:51', 'GET: /master/po/audit_logs/page=1'),
(78, 6, '2024-06-02 06:22:51', 'GET: /master/po/audit_logs/page=1'),
(79, 6, '2024-06-02 06:22:54', 'GET: /master/po/audit_logs/page=1'),
(80, 6, '2024-06-02 06:22:54', 'GET: /master/po/audit_logs/page=1'),
(81, 6, '2024-06-02 06:22:56', 'GET: /master/po/audit_logs/page=1'),
(82, 6, '2024-06-02 06:22:56', 'GET: /master/po/audit_logs/page=1'),
(83, 6, '2024-06-02 06:23:01', 'GET: /master/po/pondo/page=1'),
(84, 6, '2024-06-02 06:23:01', 'GET: /master/po/audit_logs/page=1'),
(85, 6, '2024-06-02 06:23:04', 'GET: /master/po/audit_logs/page=1'),
(86, 6, '2024-06-02 06:23:04', 'GET: /master/po/audit_logs/page=1'),
(87, 6, '2024-06-02 06:23:12', 'POST: /master/auditlogSearch'),
(88, 6, '2024-06-02 06:23:12', 'GET: /master/po/audit_logs/page=1'),
(89, 6, '2024-06-02 06:23:12', 'GET: /master/po/audit_logs/page=1'),
(90, 6, '2024-06-02 06:25:17', 'POST: /master/master/insert/addsupplier/'),
(91, 6, '2024-06-02 06:27:04', 'POST: /master/master/insert/addsupplier/'),
(92, 6, '2024-06-02 06:27:10', 'GET: /master/po/viewsupplierproduct/Supplier=1'),
(93, 6, '2024-06-02 06:27:10', 'GET: /master/po/audit_logs/page=1'),
(94, 6, '2024-06-02 06:27:14', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(95, 6, '2024-06-02 06:27:14', 'GET: /master/po/audit_logs/page=1'),
(96, 6, '2024-06-02 06:27:39', 'GET: /master/po/editsupplier/Supplier=1'),
(97, 6, '2024-06-02 06:27:40', 'GET: /master/po/audit_logs/page=1'),
(98, 6, '2024-06-02 06:27:43', 'POST: /master/master/delete/supplier'),
(99, 6, '2024-06-02 06:29:22', 'GET: /master/po/editsupplier/Supplier=1'),
(100, 6, '2024-06-02 06:29:22', 'GET: /master/po/audit_logs/page=1'),
(101, 6, '2024-06-02 06:29:29', 'GET: /master/po/viewsupplier/Supplier=2'),
(102, 6, '2024-06-02 06:29:30', 'GET: /master/po/audit_logs/page=1'),
(103, 6, '2024-06-02 06:29:37', 'GET: /master/po/audit_logs/page=1'),
(104, 6, '2024-06-02 06:29:38', 'GET: /master/po/audit_logs/page=1'),
(105, 6, '2024-06-02 06:29:41', 'GET: /master/po/audit_logs/page=1'),
(106, 6, '2024-06-02 06:29:41', 'GET: /master/po/audit_logs/page=1'),
(107, 6, '2024-06-02 06:30:48', 'GET: /master/po/editsupplier/Supplier=2'),
(108, 6, '2024-06-02 06:30:49', 'GET: /master/po/audit_logs/page=1'),
(109, 6, '2024-06-02 06:31:03', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(110, 6, '2024-06-02 06:31:03', 'GET: /master/po/audit_logs/page=1'),
(111, 6, '2024-06-02 06:31:09', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(112, 6, '2024-06-02 06:31:09', 'GET: /master/po/audit_logs/page=1'),
(113, 6, '2024-06-02 06:31:11', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(114, 6, '2024-06-02 06:31:11', 'GET: /master/po/audit_logs/page=1'),
(115, 6, '2024-06-02 06:32:01', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(116, 6, '2024-06-02 06:32:01', 'GET: /master/po/audit_logs/page=1'),
(117, 6, '2024-06-02 06:32:08', 'POST: /master/placeorder/supplier/'),
(118, 6, '2024-06-02 06:33:02', 'GET: /master/po/audit_logs/page=1'),
(119, 6, '2024-06-02 06:33:02', 'GET: /master/po/audit_logs/page=1'),
(120, 6, '2024-06-02 06:33:06', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(121, 6, '2024-06-02 06:33:07', 'GET: /master/po/audit_logs/page=1'),
(122, 6, '2024-06-02 06:33:12', 'POST: /master/placeorder/supplier/'),
(123, 6, '2024-06-02 06:33:44', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(124, 6, '2024-06-02 06:33:44', 'GET: /master/po/audit_logs/page=1'),
(125, 6, '2024-06-02 06:33:47', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(126, 6, '2024-06-02 06:33:48', 'GET: /master/po/audit_logs/page=1'),
(127, 6, '2024-06-02 06:33:52', 'POST: /master/placeorder/supplier/'),
(128, 6, '2024-06-02 06:33:53', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(129, 6, '2024-06-02 06:33:53', 'GET: /master/po/audit_logs/page=1'),
(130, 6, '2024-06-02 06:33:56', 'POST: /master/placeorder/supplier/'),
(131, 6, '2024-06-02 06:33:59', 'GET: /master/po/pondo/page=1'),
(132, 6, '2024-06-02 06:34:00', 'GET: /master/po/audit_logs/page=1'),
(133, 6, '2024-06-02 06:34:09', 'POST: /master/master/cancel/orderDetail'),
(134, 6, '2024-06-02 06:34:10', 'GET: /master/po/pondo/page=1'),
(135, 6, '2024-06-02 06:34:10', 'GET: /master/po/audit_logs/page=1'),
(136, 6, '2024-06-02 06:34:15', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(137, 6, '2024-06-02 06:34:15', 'GET: /master/po/audit_logs/page=1'),
(138, 6, '2024-06-02 06:34:17', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(139, 6, '2024-06-02 06:34:18', 'GET: /master/po/audit_logs/page=1'),
(140, 6, '2024-06-02 06:35:40', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(141, 6, '2024-06-02 06:35:40', 'GET: /master/po/audit_logs/page=1'),
(142, 6, '2024-06-02 06:35:47', 'GET: /master/po/addbulk/Supplier=2'),
(143, 6, '2024-06-02 06:35:48', 'GET: /master/po/audit_logs/page=1'),
(144, 6, '2024-06-02 06:35:49', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(145, 6, '2024-06-02 06:35:49', 'GET: /master/po/audit_logs/page=1'),
(146, 6, '2024-06-02 06:36:03', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(147, 6, '2024-06-02 06:36:04', 'GET: /master/po/audit_logs/page=1'),
(148, 6, '2024-06-02 06:36:10', 'GET: /master/po/addbulk/Supplier=2'),
(149, 6, '2024-06-02 06:36:10', 'GET: /master/po/audit_logs/page=1'),
(150, 6, '2024-06-02 06:36:17', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(151, 6, '2024-06-02 06:36:17', 'GET: /master/po/audit_logs/page=1'),
(152, 6, '2024-06-02 06:36:19', 'GET: /master/po/addbulk/Supplier=2'),
(153, 6, '2024-06-02 06:36:19', 'GET: /master/po/audit_logs/page=1'),
(154, 6, '2024-06-02 06:36:21', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(155, 6, '2024-06-02 06:36:21', 'GET: /master/po/audit_logs/page=1'),
(156, 6, '2024-06-02 06:36:57', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(157, 6, '2024-06-02 06:36:58', 'GET: /master/po/audit_logs/page=1'),
(158, 6, '2024-06-02 06:37:02', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(159, 6, '2024-06-02 06:37:02', 'GET: /master/po/audit_logs/page=1'),
(160, 6, '2024-06-02 06:37:12', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(161, 6, '2024-06-02 06:37:13', 'GET: /master/po/audit_logs/page=1'),
(162, 6, '2024-06-02 06:37:22', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(163, 6, '2024-06-02 06:37:22', 'GET: /master/po/audit_logs/page=1'),
(164, 6, '2024-06-02 06:37:29', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(165, 6, '2024-06-02 06:37:29', 'GET: /master/po/audit_logs/page=1'),
(166, 6, '2024-06-02 06:37:33', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(167, 6, '2024-06-02 06:37:34', 'GET: /master/po/audit_logs/page=1'),
(168, 6, '2024-06-02 06:37:40', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(169, 6, '2024-06-02 06:37:41', 'GET: /master/po/audit_logs/page=1'),
(170, 6, '2024-06-02 06:37:43', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(171, 6, '2024-06-02 06:37:43', 'GET: /master/po/audit_logs/page=1'),
(172, 6, '2024-06-02 06:37:49', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(173, 6, '2024-06-02 06:37:50', 'GET: /master/po/audit_logs/page=1'),
(174, 6, '2024-06-02 06:38:10', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(175, 6, '2024-06-02 06:38:11', 'GET: /master/po/audit_logs/page=1'),
(176, 6, '2024-06-02 06:38:11', 'GET: /master/po/audit_logs/page=1'),
(177, 6, '2024-06-02 06:38:11', 'GET: /master/po/audit_logs/page=1'),
(178, 6, '2024-06-02 06:38:17', 'GET: /master/po/audit_logs/page=1'),
(179, 6, '2024-06-02 06:38:17', 'GET: /master/po/audit_logs/page=1'),
(180, 6, '2024-06-02 06:38:21', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(181, 6, '2024-06-02 06:38:21', 'GET: /master/po/audit_logs/page=1'),
(182, 6, '2024-06-02 06:38:22', 'GET: /master/po/addbulk/Supplier=2'),
(183, 6, '2024-06-02 06:38:22', 'GET: /master/po/audit_logs/page=1'),
(184, 6, '2024-06-02 06:38:25', 'GET: /master/po/pondo/page=1'),
(185, 6, '2024-06-02 06:38:25', 'GET: /master/po/audit_logs/page=1'),
(186, 6, '2024-06-02 06:38:34', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(187, 6, '2024-06-02 06:38:35', 'GET: /master/po/audit_logs/page=1'),
(188, 6, '2024-06-02 06:38:35', 'GET: /master/po/addbulk/Supplier=2'),
(189, 6, '2024-06-02 06:38:35', 'GET: /master/po/audit_logs/page=1'),
(190, 6, '2024-06-02 06:39:07', 'POST: /master/master/po/addbulk/'),
(191, 6, '2024-06-02 06:39:07', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(192, 6, '2024-06-02 06:39:07', 'GET: /master/po/audit_logs/page=1'),
(193, 6, '2024-06-02 06:39:15', 'GET: /master/po/addbulk/Supplier=2'),
(194, 6, '2024-06-02 06:39:16', 'GET: /master/po/audit_logs/page=1'),
(195, 6, '2024-06-02 06:39:18', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(196, 6, '2024-06-02 06:39:19', 'GET: /master/po/audit_logs/page=1'),
(197, 6, '2024-06-02 06:39:23', 'POST: /master/placeorder/supplier/'),
(198, 6, '2024-06-02 06:39:26', 'GET: /master/po/pondo/page=1'),
(199, 6, '2024-06-02 06:39:26', 'GET: /master/po/audit_logs/page=1'),
(200, 6, '2024-06-02 06:39:50', 'POST: /master/master/delay/orderDetail'),
(201, 6, '2024-06-02 06:39:52', 'POST: /master/master/complete/orderDetail'),
(202, 6, '2024-06-02 06:39:57', 'GET: /master/po/pondo/page=1'),
(203, 6, '2024-06-02 06:39:57', 'GET: /master/po/audit_logs/page=1'),
(204, 6, '2024-06-02 06:39:59', 'GET: /master/po/pondo/page=1'),
(205, 6, '2024-06-02 06:39:59', 'GET: /master/po/audit_logs/page=1'),
(206, 6, '2024-06-02 06:40:05', 'GET: /master/po/audit_logs/page=1'),
(207, 6, '2024-06-02 06:40:13', 'POST: /master/master/addfeedback/viewtransaction'),
(208, 6, '2024-06-02 06:40:19', 'GET: /master/po/viewsupplier/Supplier=2'),
(209, 6, '2024-06-02 06:40:20', 'GET: /master/po/audit_logs/page=1'),
(210, 6, '2024-06-02 06:40:22', 'GET: /master/po/pondo/page=1'),
(211, 6, '2024-06-02 06:40:22', 'GET: /master/po/audit_logs/page=1'),
(212, 6, '2024-06-02 06:40:29', 'POST: /master/fin/fundSearch'),
(213, 6, '2024-06-02 06:40:29', 'GET: /master/po/pondo/page=1'),
(214, 6, '2024-06-02 06:40:30', 'GET: /master/po/audit_logs/page=1'),
(215, 6, '2024-06-02 06:40:36', 'POST: /master/fin/fundSearch'),
(216, 6, '2024-06-02 06:40:36', 'GET: /master/po/pondo/page=1'),
(217, 6, '2024-06-02 06:40:36', 'GET: /master/po/audit_logs/page=1'),
(218, 6, '2024-06-02 06:40:45', 'POST: /master/pondo/transaction'),
(219, 6, '2024-06-02 06:40:45', 'GET: /master/po/pondo/page=1'),
(220, 6, '2024-06-02 06:40:46', 'GET: /master/po/audit_logs/page=1'),
(221, 6, '2024-06-02 06:40:49', 'GET: /master/po/pondo/page=1'),
(222, 6, '2024-06-02 06:40:49', 'GET: /master/po/audit_logs/page=1'),
(223, 6, '2024-06-02 06:40:51', 'GET: /master/po/pondo/page=1'),
(224, 6, '2024-06-02 06:40:51', 'GET: /master/po/audit_logs/page=1'),
(225, 6, '2024-06-02 06:40:54', 'POST: /master/fin/fundSearch'),
(226, 6, '2024-06-02 06:40:54', 'GET: /master/po/pondo/page=1'),
(227, 6, '2024-06-02 06:40:54', 'GET: /master/po/audit_logs/page=1'),
(228, 6, '2024-06-02 06:40:57', 'GET: /master/po/pondo/page=1'),
(229, 6, '2024-06-02 06:40:57', 'GET: /master/po/audit_logs/page=1'),
(230, 6, '2024-06-02 06:40:59', 'GET: /master/po/audit_logs/page=1'),
(231, 6, '2024-06-02 06:41:00', 'GET: /master/po/audit_logs/page=1'),
(232, 6, '2024-06-02 06:41:03', 'GET: /master/po/pondo/page=1'),
(233, 6, '2024-06-02 06:41:04', 'GET: /master/po/audit_logs/page=1'),
(234, 6, '2024-06-02 06:41:05', 'GET: /master/po/pondo/page=1'),
(235, 6, '2024-06-02 06:41:05', 'GET: /master/po/audit_logs/page=1'),
(236, 6, '2024-06-02 06:41:06', 'GET: /master/po/pondo/page=1'),
(237, 6, '2024-06-02 06:41:06', 'GET: /master/po/audit_logs/page=1'),
(238, 6, '2024-06-02 06:41:16', 'POST: /master/logout'),
(239, 5, '2024-06-02 06:43:13', 'POST: /master/login'),
(240, 5, '2024-06-02 06:43:21', 'POST: /master/clock-in'),
(241, 5, '2024-06-02 06:43:22', 'POST: /master/clock-out'),
(242, 5, '2024-06-02 06:44:46', 'POST: /master/update-employees'),
(243, 5, '2024-06-02 06:44:59', 'POST: /master/update-employees'),
(244, 5, '2024-06-02 06:45:35', 'POST: /master/create/schedule'),
(245, 5, '2024-06-02 06:45:40', 'POST: /master/master/remove/schedule'),
(246, 5, '2024-06-02 06:48:53', 'GET: /master/hr/employees/page=1'),
(247, 5, '2024-06-02 06:49:03', 'POST: /master/hr/employees/page=1'),
(248, 5, '2024-06-02 06:49:11', 'POST: /master/hr/employees/page=1'),
(249, 5, '2024-06-02 06:49:11', 'GET: /master/hr/employees/page=1'),
(250, 5, '2024-06-02 06:49:15', 'POST: /master/hr/employees/page=1'),
(251, 5, '2024-06-02 06:49:19', 'POST: /master/hr/employees/page=1'),
(252, 5, '2024-06-02 06:49:19', 'GET: /master/hr/employees/page=1'),
(253, 5, '2024-06-02 06:49:20', 'GET: /master/hr/employees/page=2'),
(254, 5, '2024-06-02 06:49:21', 'GET: /master/hr/employees/page=3'),
(255, 5, '2024-06-02 06:49:22', 'GET: /master/hr/employees/page=4'),
(256, 5, '2024-06-02 06:49:23', 'GET: /master/hr/employees/page=2'),
(257, 5, '2024-06-02 06:49:24', 'GET: /master/hr/employees/page=3'),
(258, 5, '2024-06-02 06:49:25', 'GET: /master/hr/employees/page=1'),
(259, 5, '2024-06-02 06:49:29', 'GET: /master/hr/employees/page=1'),
(260, 5, '2024-06-02 06:52:47', 'POST: /master/add-employees'),
(261, 5, '2024-06-02 06:52:49', 'GET: /master/hr/employees/page=1'),
(262, 5, '2024-06-02 06:52:52', 'GET: /master/hr/employees/page=3'),
(263, 5, '2024-06-02 06:52:53', 'GET: /master/hr/employees/page=5'),
(264, 5, '2024-06-02 06:52:57', 'GET: /master/hr/departments/product-order/page=1'),
(265, 5, '2024-06-02 06:52:59', 'GET: /master/hr/departments/inventory/page=1'),
(266, 5, '2024-06-02 06:52:59', 'GET: /master/hr/departments/sales/page=1'),
(267, 5, '2024-06-02 06:53:00', 'GET: /master/hr/departments/finance/page=1'),
(268, 5, '2024-06-02 06:53:00', 'GET: /master/hr/departments/delivery/page=1'),
(269, 5, '2024-06-02 06:53:01', 'GET: /master/hr/departments/human-resources/page=1'),
(270, 5, '2024-06-02 06:53:02', 'GET: /master/hr/departments/delivery/page=1'),
(271, 5, '2024-06-02 06:53:02', 'GET: /master/hr/departments/finance/page=1'),
(272, 5, '2024-06-02 06:53:04', 'GET: /master/hr/departments/delivery/page=1'),
(273, 5, '2024-06-02 06:53:05', 'GET: /master/hr/departments/delivery/page=2'),
(274, 5, '2024-06-02 06:53:40', 'POST: /master/hr/leave-requests/file-leave'),
(275, 5, '2024-06-02 06:53:53', 'POST: /master/approve/leave-requests'),
(276, 5, '2024-06-02 06:54:01', 'GET: /master/hr/departments/product-order/page=1'),
(277, 5, '2024-06-02 06:54:35', 'POST: /master/hr/leave-requests/file-leave'),
(278, 5, '2024-06-02 06:54:40', 'POST: /master/approve/leave-requests'),
(279, 5, '2024-06-02 06:54:53', 'GET: /master/hr/funds/page=1'),
(280, 5, '2024-06-02 06:55:05', 'POST: /master/hr/leave-requests/file-leave'),
(281, 5, '2024-06-02 06:55:08', 'POST: /master/deny/leave-requests'),
(282, 5, '2024-06-02 06:55:20', 'GET: /master/hr/funds/page=1'),
(283, 5, '2024-06-02 06:55:23', 'GET: /master/hr/funds/page=1'),
(284, 5, '2024-06-02 06:55:32', 'POST: /master/pondo/transaction'),
(285, 5, '2024-06-02 06:55:33', 'GET: /master/hr/funds/page=1'),
(286, 5, '2024-06-02 06:55:38', 'POST: /master/fin/fundSearch'),
(287, 5, '2024-06-02 06:55:38', 'GET: /master/hr/funds/page=1'),
(288, 5, '2024-06-02 06:55:40', 'POST: /master/fin/fundSearch'),
(289, 5, '2024-06-02 06:55:40', 'GET: /master/hr/funds/page=1'),
(290, 5, '2024-06-02 06:55:42', 'POST: /master/fin/fundSearch'),
(291, 5, '2024-06-02 06:55:43', 'GET: /master/hr/funds/page=1'),
(292, 5, '2024-06-02 06:55:48', 'GET: /master/hr/generate-payslip/page=1'),
(293, 5, '2024-06-02 06:56:02', 'POST: /master/create/payslip'),
(294, 5, '2024-06-02 06:56:03', 'GET: /master/hr/generate-payslip/page=1'),
(295, 5, '2024-06-02 06:56:13', 'GET: /master/hr/funds/page=1'),
(296, 5, '2024-06-02 06:56:15', 'GET: /master/hr/funds/page=1'),
(297, 5, '2024-06-02 06:56:16', 'GET: /master/hr/funds/page=1'),
(298, 5, '2024-06-02 06:56:20', 'POST: /master/fin/fundSearch'),
(299, 5, '2024-06-02 06:56:20', 'GET: /master/hr/funds/page=1'),
(300, 5, '2024-06-02 06:56:23', 'GET: /master/hr/generate-payslip/page=1'),
(301, 5, '2024-06-02 06:56:43', 'POST: /master/create/payslip'),
(302, 5, '2024-06-02 06:56:44', 'GET: /master/hr/generate-payslip/page=1'),
(303, 5, '2024-06-02 06:59:49', 'GET: /master/hr/funds/page=1'),
(304, 5, '2024-06-02 07:00:01', 'GET: /master/hr/funds/page=1'),
(305, 5, '2024-06-02 07:00:05', 'POST: /master/pay-salary'),
(306, 5, '2024-06-02 07:00:12', 'GET: /master/hr/generate-payslip/page=1'),
(307, 5, '2024-06-02 07:00:14', 'GET: /master/hr/funds/page=1'),
(308, 5, '2024-06-02 07:01:39', 'POST: /master/logout'),
(309, 8, '2024-06-02 07:01:51', 'POST: /master/login'),
(310, 8, '2024-06-02 07:01:52', 'POST: /master/fin/getBalanceReport'),
(311, 8, '2024-06-02 07:01:52', 'POST: /master/fin/getEquityReport'),
(312, 8, '2024-06-02 07:01:52', 'POST: /master/fin/getCashFlowReport'),
(313, 8, '2024-06-02 07:01:57', 'POST: /master/fin/getBalanceReport'),
(314, 8, '2024-06-02 07:01:58', 'POST: /master/fin/getEquityReport'),
(315, 8, '2024-06-02 07:01:58', 'POST: /master/fin/getCashFlowReport'),
(316, 8, '2024-06-02 07:01:58', 'GET: /master/fin/funds/finance/page=1'),
(317, 8, '2024-06-02 07:01:59', 'GET: /master/fin/logs/page=1'),
(318, 8, '2024-06-02 07:02:00', 'POST: /master/fin/getBalanceReport'),
(319, 8, '2024-06-02 07:02:00', 'POST: /master/fin/getEquityReport'),
(320, 8, '2024-06-02 07:02:00', 'POST: /master/fin/getCashFlowReport'),
(321, 8, '2024-06-02 07:02:37', 'POST: /master/fin/getBalanceReport'),
(322, 8, '2024-06-02 07:02:37', 'POST: /master/fin/getEquityReport'),
(323, 8, '2024-06-02 07:02:37', 'POST: /master/fin/getCashFlowReport'),
(324, 8, '2024-06-02 07:02:42', 'GET: /master/fin/ledger/page=1'),
(325, 8, '2024-06-02 07:02:45', 'GET: /master/fin/funds/finance/page=1'),
(326, 8, '2024-06-02 07:02:45', 'GET: /master/fin/logs/page=1'),
(327, 8, '2024-06-02 07:02:48', 'POST: /master/fin/getBalanceReport'),
(328, 8, '2024-06-02 07:02:48', 'POST: /master/fin/getEquityReport'),
(329, 8, '2024-06-02 07:02:48', 'POST: /master/fin/getCashFlowReport'),
(330, 8, '2024-06-02 07:04:42', 'POST: /master/logout'),
(331, 6, '2024-06-02 07:04:53', 'POST: /master/login'),
(332, 6, '2024-06-02 07:04:53', 'GET: /master/po/audit_logs/page=1'),
(333, 6, '2024-06-02 07:04:54', 'GET: /master/po/audit_logs/page=1'),
(334, 6, '2024-06-02 07:05:00', 'GET: /master/po/audit_logs/page=1'),
(335, 6, '2024-06-02 07:05:00', 'GET: /master/po/audit_logs/page=1'),
(336, 6, '2024-06-02 07:05:43', 'GET: /master/po/audit_logs/page=1'),
(337, 6, '2024-06-02 07:05:43', 'GET: /master/po/audit_logs/page=1'),
(338, 6, '2024-06-02 07:05:56', 'GET: /master/po/audit_logs/page=1'),
(339, 6, '2024-06-02 07:05:56', 'GET: /master/po/audit_logs/page=1'),
(340, 6, '2024-06-02 07:06:16', 'POST: /master/logout'),
(341, 8, '2024-06-02 07:12:23', 'POST: /master/login'),
(342, 8, '2024-06-02 07:12:24', 'POST: /master/fin/getBalanceReport'),
(343, 8, '2024-06-02 07:12:24', 'POST: /master/fin/getEquityReport'),
(344, 8, '2024-06-02 07:12:24', 'POST: /master/fin/getCashFlowReport'),
(345, 8, '2024-06-02 07:12:29', 'POST: /master/fin/getBalanceReport'),
(346, 8, '2024-06-02 07:12:29', 'POST: /master/fin/getEquityReport'),
(347, 8, '2024-06-02 07:12:29', 'POST: /master/fin/getCashFlowReport'),
(348, 8, '2024-06-02 07:13:42', 'POST: /master/fin/getBalanceReport'),
(349, 8, '2024-06-02 07:13:42', 'POST: /master/fin/getEquityReport'),
(350, 8, '2024-06-02 07:13:42', 'POST: /master/fin/getCashFlowReport'),
(351, 8, '2024-06-02 07:13:43', 'POST: /master/fin/getBalanceReport'),
(352, 8, '2024-06-02 07:13:43', 'POST: /master/fin/getEquityReport'),
(353, 8, '2024-06-02 07:13:43', 'POST: /master/fin/getCashFlowReport'),
(354, 8, '2024-06-02 07:13:51', 'POST: /master/logout'),
(355, 10, '2024-06-02 07:14:20', 'POST: /master/login'),
(356, 10, '2024-06-02 07:14:31', 'POST: /master/logout'),
(357, 10, '2024-06-02 07:14:42', 'POST: /master/login'),
(358, 10, '2024-06-02 07:14:51', 'GET: /master/sls/Audit-Logs/page=1'),
(359, 10, '2024-06-02 07:14:57', 'POST: /master/clock-in'),
(360, 10, '2024-06-02 07:14:57', 'POST: /master/clock-out'),
(361, 10, '2024-06-02 07:16:28', 'POST: /master/addSales'),
(362, 10, '2024-06-02 07:17:23', 'POST: /master/logout'),
(363, 6, '2024-06-02 07:17:28', 'POST: /master/login'),
(364, 6, '2024-06-02 07:17:28', 'GET: /master/po/audit_logs/page=1'),
(365, 6, '2024-06-02 07:17:28', 'GET: /master/po/audit_logs/page=1'),
(366, 6, '2024-06-02 07:17:31', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(367, 6, '2024-06-02 07:17:31', 'GET: /master/po/audit_logs/page=1'),
(368, 6, '2024-06-02 07:17:42', 'POST: /master/placeorder/supplier/'),
(369, 6, '2024-06-02 07:17:45', 'POST: /master/master/complete/orderDetail'),
(370, 6, '2024-06-02 07:17:46', 'GET: /master/po/pondo/page=1'),
(371, 6, '2024-06-02 07:17:47', 'GET: /master/po/audit_logs/page=1'),
(372, 6, '2024-06-02 07:17:49', 'POST: /master/logout'),
(373, 10, '2024-06-02 07:18:03', 'POST: /master/login'),
(374, 10, '2024-06-02 07:18:49', 'POST: /master/addSales'),
(375, 10, '2024-06-02 07:23:18', 'GET: /master/sls/Audit-Logs/page=1'),
(376, 10, '2024-06-02 07:23:20', 'GET: /master/sls/funds/Sales/page=1'),
(377, 10, '2024-06-02 07:23:25', 'POST: /master/AddTarget'),
(378, 10, '2024-06-02 07:23:32', 'POST: /master/AddTarget'),
(379, 10, '2024-06-02 07:23:34', 'GET: /master/sls/funds/Sales/page=1'),
(380, 10, '2024-06-02 07:23:43', 'POST: /master/pondo/transaction'),
(381, 10, '2024-06-02 07:23:44', 'GET: /master/sls/funds/Sales/page=1'),
(382, 10, '2024-06-02 07:24:00', 'GET: /master/sls/Audit-Logs/page=1'),
(383, 10, '2024-06-02 07:24:54', 'GET: /master/sls/Audit-Logs/page=1'),
(384, 10, '2024-06-02 07:24:56', 'GET: /master/sls/Audit-Logs/page=1'),
(385, 10, '2024-06-02 07:24:58', 'GET: /master/sls/Audit-Logs/page=2'),
(386, 10, '2024-06-02 07:24:59', 'GET: /master/sls/Audit-Logs/page=3'),
(387, 10, '2024-06-02 07:25:00', 'GET: /master/sls/Audit-Logs/page=4'),
(388, 10, '2024-06-02 07:25:01', 'GET: /master/sls/Audit-Logs/page=2'),
(389, 10, '2024-06-02 07:25:02', 'GET: /master/sls/Audit-Logs/page=1'),
(390, 10, '2024-06-02 07:25:04', 'GET: /master/sls/Audit-Logs/page=1'),
(391, 10, '2024-06-02 07:25:09', 'GET: /master/sls/Audit-Logs/page=1'),
(392, 10, '2024-06-02 07:25:10', 'GET: /master/sls/Audit-Logs/page=1'),
(393, 10, '2024-06-02 07:25:43', 'GET: /master/sls/Audit-Logs/page=1'),
(394, 10, '2024-06-02 07:25:44', 'GET: /master/sls/Audit-Logs/page=2'),
(395, 10, '2024-06-02 07:25:44', 'GET: /master/sls/Audit-Logs/page=3'),
(396, 10, '2024-06-02 07:25:45', 'GET: /master/sls/Audit-Logs/page=4'),
(397, 10, '2024-06-02 07:25:47', 'GET: /master/sls/Audit-Logs/page=5'),
(398, 10, '2024-06-02 07:25:48', 'GET: /master/sls/Audit-Logs/page=4'),
(399, 10, '2024-06-02 07:25:49', 'GET: /master/sls/Audit-Logs/page=3'),
(400, 10, '2024-06-02 07:25:49', 'GET: /master/sls/Audit-Logs/page=3'),
(401, 10, '2024-06-02 07:25:50', 'GET: /master/sls/Audit-Logs/page=2'),
(402, 10, '2024-06-02 07:25:51', 'GET: /master/sls/Audit-Logs/page=1'),
(403, 10, '2024-06-02 07:25:51', 'GET: /master/sls/Audit-Logs/page=1'),
(404, 10, '2024-06-02 07:26:00', 'GET: /master/sls/Audit-Logs/page=1'),
(405, 10, '2024-06-02 07:26:04', 'GET: /master/sls/Audit-Logs/page=2'),
(406, 10, '2024-06-02 07:26:05', 'POST: /master/auditlogSearch'),
(407, 10, '2024-06-02 07:26:05', 'GET: /master/sls/Audit-Logs/page=2'),
(408, 10, '2024-06-02 07:26:07', 'POST: /master/auditlogSearch'),
(409, 10, '2024-06-02 07:26:07', 'GET: /master/sls/Audit-Logs/page=2'),
(410, 10, '2024-06-02 07:26:09', 'GET: /master/sls/Audit-Logs/page=3'),
(411, 10, '2024-06-02 07:26:10', 'GET: /master/sls/Audit-Logs/page=4'),
(412, 10, '2024-06-02 07:26:11', 'GET: /master/sls/Audit-Logs/page=5'),
(413, 10, '2024-06-02 07:26:11', 'GET: /master/sls/Audit-Logs/page=6'),
(414, 10, '2024-06-02 07:26:13', 'GET: /master/sls/Audit-Logs/page=7'),
(415, 10, '2024-06-02 07:26:14', 'GET: /master/sls/Audit-Logs/page=5'),
(416, 10, '2024-06-02 07:26:15', 'GET: /master/sls/Audit-Logs/page=3'),
(417, 10, '2024-06-02 07:26:55', 'GET: /master/sls/Audit-Logs/page=4'),
(418, 10, '2024-06-02 07:26:55', 'GET: /master/sls/Audit-Logs/page=5'),
(419, 10, '2024-06-02 07:26:56', 'GET: /master/sls/Audit-Logs/page=7'),
(420, 10, '2024-06-02 07:26:57', 'GET: /master/sls/Audit-Logs/page=7'),
(421, 10, '2024-06-02 07:26:58', 'GET: /master/sls/Audit-Logs/page=8'),
(422, 10, '2024-06-02 07:26:59', 'GET: /master/sls/Audit-Logs/page=7'),
(423, 10, '2024-06-02 07:26:59', 'GET: /master/sls/Audit-Logs/page=5'),
(424, 10, '2024-06-02 07:27:00', 'GET: /master/sls/Audit-Logs/page=3'),
(425, 10, '2024-06-02 07:27:01', 'GET: /master/sls/Audit-Logs/page=2'),
(426, 10, '2024-06-02 07:27:02', 'GET: /master/sls/Audit-Logs/page=1'),
(427, 10, '2024-06-02 07:27:03', 'POST: /master/logout'),
(428, 8, '2024-06-02 07:27:13', 'POST: /master/login'),
(429, 8, '2024-06-02 07:27:14', 'POST: /master/fin/getBalanceReport'),
(430, 8, '2024-06-02 07:27:14', 'POST: /master/fin/getEquityReport'),
(431, 8, '2024-06-02 07:27:14', 'POST: /master/fin/getCashFlowReport'),
(432, 8, '2024-06-02 07:27:17', 'GET: /master/fin/logs/page=1'),
(433, 8, '2024-06-02 07:27:19', 'GET: /master/fin/logs/page=3'),
(434, 8, '2024-06-02 07:27:20', 'GET: /master/fin/logs/page=4'),
(435, 8, '2024-06-02 07:27:22', 'GET: /master/fin/logs/page=6'),
(436, 8, '2024-06-02 07:27:23', 'GET: /master/fin/logs/page=7'),
(437, 8, '2024-06-02 07:27:24', 'GET: /master/fin/logs/page=5'),
(438, 8, '2024-06-02 07:27:25', 'GET: /master/fin/logs/page=3'),
(439, 8, '2024-06-02 07:27:27', 'GET: /master/fin/logs/page=1'),
(440, 8, '2024-06-02 07:27:29', 'POST: /master/logout'),
(441, 10, '2024-06-02 07:27:42', 'POST: /master/login'),
(442, 10, '2024-06-02 07:27:43', 'GET: /master/sls/funds/Sales/page=1'),
(443, 10, '2024-06-02 07:27:45', 'GET: /master/sls/Audit-Logs/page=1'),
(444, 10, '2024-06-02 07:31:07', 'POST: /master/login'),
(445, 10, '2024-06-02 07:31:13', 'GET: /master/sls/Audit-Logs/page=1'),
(446, 10, '2024-06-02 07:31:32', 'POST: /master/addSales'),
(447, 10, '2024-06-02 07:31:45', 'GET: /master/sls/Audit-Logs/page=1'),
(448, 10, '2024-06-02 07:31:56', 'GET: /master/sls/Audit-Logs/page=1'),
(449, 10, '2024-06-02 07:32:14', 'GET: /master/sls/Audit-Logs/page=1'),
(450, 10, '2024-06-02 07:32:19', 'GET: /master/sls/funds/Sales/page=1'),
(451, 10, '2024-06-02 07:33:52', 'GET: /master/sls/funds/Sales/page=1'),
(452, 10, '2024-06-02 07:33:55', 'POST: /master/fin/fundSearch'),
(453, 10, '2024-06-02 07:33:55', 'GET: /master/sls/funds/Sales/page=1'),
(454, 10, '2024-06-02 07:33:57', 'POST: /master/fin/fundSearch'),
(455, 10, '2024-06-02 07:33:57', 'GET: /master/sls/funds/Sales/page=1'),
(456, 10, '2024-06-02 07:34:00', 'POST: /master/fin/fundSearch'),
(457, 10, '2024-06-02 07:34:00', 'GET: /master/sls/funds/Sales/page=1'),
(458, 10, '2024-06-02 07:34:02', 'GET: /master/sls/funds/Sales/page=1'),
(459, 10, '2024-06-02 07:34:03', 'POST: /master/logout'),
(460, 11, '2024-06-02 07:34:58', 'POST: /master/login'),
(461, 11, '2024-06-02 07:35:11', 'POST: /master/logout'),
(462, 8, '2024-06-02 07:35:28', 'POST: /master/login'),
(463, 8, '2024-06-02 07:35:28', 'POST: /master/fin/getBalanceReport'),
(464, 8, '2024-06-02 07:35:28', 'POST: /master/fin/getEquityReport'),
(465, 8, '2024-06-02 07:35:29', 'POST: /master/fin/getCashFlowReport'),
(466, 8, '2024-06-02 07:36:41', 'POST: /master/logout'),
(467, 1, '2024-06-02 07:37:02', 'POST: /master/login'),
(468, 1, '2024-06-02 07:37:12', 'POST: /master/logout'),
(469, 6, '2024-06-02 07:37:16', 'POST: /master/login'),
(470, 6, '2024-06-02 07:37:17', 'GET: /master/po/audit_logs/page=1'),
(471, 6, '2024-06-02 07:37:17', 'GET: /master/po/audit_logs/page=1'),
(472, 6, '2024-06-02 07:39:20', 'GET: /master/po/audit_logs/page=1'),
(473, 6, '2024-06-02 07:39:20', 'GET: /master/po/audit_logs/page=1'),
(474, 6, '2024-06-02 07:39:22', 'POST: /master/logout'),
(475, 8, '2024-06-02 07:39:34', 'POST: /master/login'),
(476, 8, '2024-06-02 07:39:36', 'POST: /master/fin/getBalanceReport'),
(477, 8, '2024-06-02 07:39:36', 'POST: /master/fin/getEquityReport'),
(478, 8, '2024-06-02 07:39:36', 'POST: /master/fin/getCashFlowReport'),
(479, 8, '2024-06-02 07:40:35', 'POST: /master/fin/getBalanceReport'),
(480, 8, '2024-06-02 07:40:35', 'POST: /master/fin/getEquityReport'),
(481, 8, '2024-06-02 07:40:35', 'POST: /master/fin/getCashFlowReport'),
(482, 8, '2024-06-02 07:40:48', 'POST: /master/fin/getBalanceReport'),
(483, 8, '2024-06-02 07:40:48', 'POST: /master/fin/getEquityReport'),
(484, 8, '2024-06-02 07:40:49', 'POST: /master/fin/getCashFlowReport'),
(485, 8, '2024-06-02 07:41:00', 'POST: /master/logout'),
(486, 7, '2024-06-02 07:41:16', 'POST: /master/login'),
(487, 7, '2024-06-02 07:42:19', 'POST: /master/clock-in'),
(488, 7, '2024-06-02 07:42:21', 'POST: /master/clock-out'),
(489, 7, '2024-06-02 07:42:38', 'POST: /master/logout'),
(490, 7, '2024-06-02 07:42:50', 'POST: /master/login'),
(491, 7, '2024-06-02 07:47:17', 'POST: /master/logout'),
(492, 11, '2024-06-02 07:47:28', 'POST: /master/login'),
(493, 11, '2024-06-02 07:47:29', 'POST: /master/clock-in'),
(494, 11, '2024-06-02 07:47:33', 'POST: /master/logout'),
(495, 12, '2024-06-02 07:47:38', 'POST: /master/login'),
(496, 12, '2024-06-02 07:47:40', 'POST: /master/clock-in'),
(497, 12, '2024-06-02 07:47:42', 'POST: /master/logout'),
(498, 13, '2024-06-02 07:47:47', 'POST: /master/login'),
(499, 13, '2024-06-02 07:47:50', 'POST: /master/clock-in'),
(500, 13, '2024-06-02 07:47:53', 'GET: /master/dlv/assign/truckId=1'),
(501, 13, '2024-06-02 07:48:11', 'POST: /master/logout'),
(502, 10, '2024-06-02 07:48:22', 'POST: /master/login'),
(503, 10, '2024-06-02 07:48:42', 'POST: /master/addSales'),
(504, 10, '2024-06-02 07:49:12', 'POST: /master/logout'),
(505, 11, '2024-06-02 07:49:30', 'POST: /master/login'),
(506, 11, '2024-06-02 07:49:32', 'GET: /master/dlv/assign/truckId=1'),
(507, 11, '2024-06-02 07:49:39', 'POST: /master/truckassign'),
(508, 11, '2024-06-02 07:49:56', 'POST: /master/statusupdateview'),
(509, 11, '2024-06-02 07:50:32', 'GET: /master/dlv/pondo/page=1'),
(510, 11, '2024-06-02 07:52:01', 'GET: /master/dlv/pondo/page=1'),
(511, 11, '2024-06-02 07:52:09', 'POST: /master/pondo/transaction'),
(512, 11, '2024-06-02 07:52:09', 'GET: /master/dlv/pondo/page=1'),
(513, 11, '2024-06-02 07:52:13', 'POST: /master/fin/fundSearch'),
(514, 11, '2024-06-02 07:52:13', 'GET: /master/dlv/pondo/page=1'),
(515, 11, '2024-06-02 07:52:16', 'POST: /master/fin/fundSearch'),
(516, 11, '2024-06-02 07:52:16', 'GET: /master/dlv/pondo/page=1'),
(517, 11, '2024-06-02 07:52:17', 'GET: /master/dlv/audit/page=1'),
(518, 11, '2024-06-02 07:52:19', 'GET: /master/dlv/audit/page=2'),
(519, 11, '2024-06-02 07:52:19', 'GET: /master/dlv/audit/page=3'),
(520, 11, '2024-06-02 07:52:24', 'POST: /master/auditlogSearch'),
(521, 11, '2024-06-02 07:52:24', 'GET: /master/dlv/audit/page=3'),
(522, 11, '2024-06-02 07:52:26', 'GET: /master/dlv/audit/page=1'),
(523, 11, '2024-06-02 07:56:11', 'GET: /master/dlv/audit/page=2'),
(524, 11, '2024-06-02 07:56:13', 'GET: /master/dlv/audit/page=1'),
(525, 6, '2024-06-02 08:47:23', 'GET: /master/po/audit_logs/page=1'),
(526, 6, '2024-06-02 08:47:23', 'GET: /master/po/audit_logs/page=1'),
(527, 6, '2024-06-02 08:47:25', 'POST: /master/logout'),
(528, 6, '2024-06-02 08:47:54', 'POST: /master/login'),
(529, 6, '2024-06-02 08:47:54', 'GET: /master/po/audit_logs/page=1'),
(530, 6, '2024-06-02 08:47:54', 'GET: /master/po/audit_logs/page=1'),
(531, 6, '2024-06-02 08:47:58', 'GET: /master/po/audit_logs/page=1'),
(532, 6, '2024-06-02 08:47:58', 'GET: /master/po/audit_logs/page=1'),
(533, 6, '2024-06-02 08:48:00', 'GET: /master/po/audit_logs/page=1'),
(534, 6, '2024-06-02 08:48:00', 'GET: /master/po/audit_logs/page=1'),
(535, 6, '2024-06-02 08:48:03', 'GET: /master/po/pondo/page=1'),
(536, 6, '2024-06-02 08:48:03', 'GET: /master/po/audit_logs/page=1'),
(537, 6, '2024-06-02 08:48:07', 'GET: /master/po/audit_logs/page=1'),
(538, 6, '2024-06-02 08:48:07', 'GET: /master/po/audit_logs/page=1'),
(539, 6, '2024-06-02 08:48:08', 'GET: /master/po/audit_logs/page=1'),
(540, 6, '2024-06-02 08:48:08', 'GET: /master/po/audit_logs/page=1'),
(541, 6, '2024-06-02 08:48:10', 'GET: /master/po/audit_logs/page=1'),
(542, 6, '2024-06-02 08:48:10', 'GET: /master/po/audit_logs/page=1'),
(543, 6, '2024-06-02 08:48:14', 'GET: /master/po/audit_logs/page=1'),
(544, 6, '2024-06-02 08:48:14', 'GET: /master/po/audit_logs/page=1'),
(545, 6, '2024-06-02 08:48:26', 'GET: /master/po/audit_logs/page=1'),
(546, 6, '2024-06-02 08:48:26', 'GET: /master/po/audit_logs/page=1'),
(547, 6, '2024-06-02 08:48:28', 'GET: /master/po/pondo/page=1'),
(548, 6, '2024-06-02 08:48:28', 'GET: /master/po/audit_logs/page=1'),
(549, 6, '2024-06-02 08:48:33', 'GET: /master/po/pondo/page=1'),
(550, 6, '2024-06-02 08:48:33', 'GET: /master/po/audit_logs/page=1'),
(551, 6, '2024-06-02 08:48:35', 'GET: /master/po/audit_logs/page=1'),
(552, 6, '2024-06-02 08:48:35', 'GET: /master/po/audit_logs/page=1'),
(553, 6, '2024-06-02 08:48:37', 'GET: /master/po/audit_logs/page=1'),
(554, 6, '2024-06-02 08:48:37', 'GET: /master/po/audit_logs/page=1'),
(555, 6, '2024-06-02 08:48:39', 'GET: /master/po/audit_logs/page=1'),
(556, 6, '2024-06-02 08:48:39', 'GET: /master/po/audit_logs/page=1'),
(557, 6, '2024-06-02 08:48:43', 'POST: /master/auditlogSearch'),
(558, 6, '2024-06-02 08:48:43', 'GET: /master/po/audit_logs/page=1'),
(559, 6, '2024-06-02 08:48:43', 'GET: /master/po/audit_logs/page=1'),
(560, 6, '2024-06-02 08:48:44', 'POST: /master/auditlogSearch'),
(561, 6, '2024-06-02 08:48:45', 'GET: /master/po/audit_logs/page=1'),
(562, 6, '2024-06-02 08:48:45', 'GET: /master/po/audit_logs/page=1'),
(563, 6, '2024-06-02 08:48:47', 'POST: /master/auditlogSearch'),
(564, 6, '2024-06-02 08:48:47', 'GET: /master/po/audit_logs/page=1'),
(565, 6, '2024-06-02 08:48:47', 'GET: /master/po/audit_logs/page=1'),
(566, 6, '2024-06-02 08:48:51', 'GET: /master/po/audit_logs/page=1'),
(567, 6, '2024-06-02 08:48:51', 'GET: /master/po/audit_logs/page=1'),
(568, 6, '2024-06-02 08:48:52', 'GET: /master/po/audit_logs/page=1'),
(569, 6, '2024-06-02 08:48:52', 'GET: /master/po/audit_logs/page=1'),
(570, 6, '2024-06-02 08:49:11', 'GET: /master/po/audit_logs/page=1'),
(571, 6, '2024-06-02 08:49:11', 'GET: /master/po/audit_logs/page=1'),
(572, 6, '2024-06-02 08:49:22', 'GET: /master/po/audit_logs/page=1'),
(573, 6, '2024-06-02 08:49:23', 'GET: /master/po/audit_logs/page=1'),
(574, 6, '2024-06-02 08:49:29', 'GET: /master/po/audit_logs/page=1'),
(575, 6, '2024-06-02 08:49:29', 'GET: /master/po/audit_logs/page=1'),
(576, 6, '2024-06-02 08:49:29', 'GET: /master/po/audit_logs/page=1'),
(577, 6, '2024-06-02 08:49:29', 'GET: /master/po/audit_logs/page=1'),
(578, 6, '2024-06-02 08:49:34', 'GET: /master/po/audit_logs/page=1'),
(579, 6, '2024-06-02 08:49:35', 'GET: /master/po/audit_logs/page=1'),
(580, 6, '2024-06-02 08:49:37', 'GET: /master/po/audit_logs/page=1'),
(581, 6, '2024-06-02 08:49:37', 'GET: /master/po/audit_logs/page=1'),
(582, 6, '2024-06-02 08:49:37', 'GET: /master/po/audit_logs/page=1'),
(583, 6, '2024-06-02 08:49:38', 'GET: /master/po/audit_logs/page=1'),
(584, 6, '2024-06-02 08:49:38', 'GET: /master/po/audit_logs/page=1'),
(585, 6, '2024-06-02 08:49:38', 'GET: /master/po/audit_logs/page=1'),
(586, 6, '2024-06-02 08:49:41', 'GET: /master/po/audit_logs/page=1'),
(587, 6, '2024-06-02 08:49:41', 'GET: /master/po/audit_logs/page=1'),
(588, 6, '2024-06-02 08:49:53', 'GET: /master/po/audit_logs/page=1'),
(589, 6, '2024-06-02 08:49:53', 'GET: /master/po/audit_logs/page=1'),
(590, 6, '2024-06-02 08:50:10', 'GET: /master/po/audit_logs/page=2'),
(591, 6, '2024-06-02 08:50:10', 'GET: /master/po/audit_logs/page=1'),
(592, 6, '2024-06-02 08:50:11', 'GET: /master/po/audit_logs/page=3'),
(593, 6, '2024-06-02 08:50:11', 'GET: /master/po/audit_logs/page=1'),
(594, 6, '2024-06-02 08:50:12', 'GET: /master/po/audit_logs/page=5'),
(595, 6, '2024-06-02 08:50:12', 'GET: /master/po/audit_logs/page=1'),
(596, 6, '2024-06-02 08:50:12', 'GET: /master/po/audit_logs/page=6'),
(597, 6, '2024-06-02 08:50:12', 'GET: /master/po/audit_logs/page=1'),
(598, 6, '2024-06-02 08:50:13', 'GET: /master/po/audit_logs/page=8'),
(599, 6, '2024-06-02 08:50:13', 'GET: /master/po/audit_logs/page=1'),
(600, 6, '2024-06-02 08:50:13', 'GET: /master/po/audit_logs/page=9'),
(601, 6, '2024-06-02 08:50:13', 'GET: /master/po/audit_logs/page=1'),
(602, 6, '2024-06-02 08:50:14', 'GET: /master/po/audit_logs/page=11'),
(603, 6, '2024-06-02 08:50:14', 'GET: /master/po/audit_logs/page=1'),
(604, 6, '2024-06-02 08:50:14', 'GET: /master/po/audit_logs/page=12'),
(605, 6, '2024-06-02 08:50:14', 'GET: /master/po/audit_logs/page=1'),
(606, 6, '2024-06-02 08:50:15', 'GET: /master/po/audit_logs/page=13'),
(607, 6, '2024-06-02 08:50:15', 'GET: /master/po/audit_logs/page=1'),
(608, 6, '2024-06-02 08:50:16', 'GET: /master/po/audit_logs/page=14'),
(609, 6, '2024-06-02 08:50:16', 'GET: /master/po/audit_logs/page=1'),
(610, 6, '2024-06-02 08:50:17', 'GET: /master/po/audit_logs/page=15'),
(611, 6, '2024-06-02 08:50:17', 'GET: /master/po/audit_logs/page=1'),
(612, 6, '2024-06-02 08:50:17', 'GET: /master/po/audit_logs/page=16'),
(613, 6, '2024-06-02 08:50:17', 'GET: /master/po/audit_logs/page=1'),
(614, 6, '2024-06-02 08:50:17', 'GET: /master/po/audit_logs/page=17'),
(615, 6, '2024-06-02 08:50:17', 'GET: /master/po/audit_logs/page=1'),
(616, 6, '2024-06-02 08:50:18', 'GET: /master/po/audit_logs/page=18'),
(617, 6, '2024-06-02 08:50:18', 'GET: /master/po/audit_logs/page=1'),
(618, 6, '2024-06-02 08:50:18', 'GET: /master/po/audit_logs/page=20'),
(619, 6, '2024-06-02 08:50:18', 'GET: /master/po/audit_logs/page=1'),
(620, 6, '2024-06-02 08:50:19', 'GET: /master/po/audit_logs/page=21'),
(621, 6, '2024-06-02 08:50:19', 'GET: /master/po/audit_logs/page=1'),
(622, 6, '2024-06-02 08:50:21', 'GET: /master/po/pondo/page=1'),
(623, 6, '2024-06-02 08:50:21', 'GET: /master/po/audit_logs/page=1'),
(624, 6, '2024-06-02 08:50:25', 'GET: /master/po/audit_logs/page=1'),
(625, 6, '2024-06-02 08:50:25', 'GET: /master/po/audit_logs/page=1'),
(626, 6, '2024-06-02 08:50:29', 'GET: /master/po/audit_logs/page=1'),
(627, 6, '2024-06-02 08:50:29', 'GET: /master/po/audit_logs/page=1'),
(628, 6, '2024-06-02 08:50:32', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(629, 6, '2024-06-02 08:50:32', 'GET: /master/po/audit_logs/page=1'),
(630, 6, '2024-06-02 08:50:35', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(631, 6, '2024-06-02 08:50:36', 'GET: /master/po/audit_logs/page=1'),
(632, 6, '2024-06-02 08:50:58', 'GET: /master/po/addbulk/Supplier=2'),
(633, 6, '2024-06-02 08:50:58', 'GET: /master/po/audit_logs/page=1'),
(634, 6, '2024-06-02 08:51:00', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(635, 6, '2024-06-02 08:51:00', 'GET: /master/po/audit_logs/page=1'),
(636, 6, '2024-06-02 08:51:04', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(637, 6, '2024-06-02 08:51:05', 'GET: /master/po/audit_logs/page=1'),
(638, 6, '2024-06-02 08:51:08', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(639, 6, '2024-06-02 08:51:08', 'GET: /master/po/audit_logs/page=1'),
(640, 6, '2024-06-02 08:51:26', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(641, 6, '2024-06-02 08:51:30', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(642, 6, '2024-06-02 08:51:30', 'GET: /master/po/audit_logs/page=1'),
(643, 6, '2024-06-02 08:51:32', 'GET: /master/po/audit_logs/page=1'),
(644, 6, '2024-06-02 08:51:32', 'GET: /master/po/audit_logs/page=1'),
(645, 6, '2024-06-02 08:51:32', 'GET: /master/po/audit_logs/page=1'),
(646, 6, '2024-06-02 08:51:32', 'GET: /master/po/audit_logs/page=1'),
(647, 6, '2024-06-02 08:51:40', 'GET: /master/po/audit_logs/page=1'),
(648, 6, '2024-06-02 08:51:40', 'GET: /master/po/audit_logs/page=1'),
(649, 6, '2024-06-02 08:53:05', 'GET: /master/po/audit_logs/page=1'),
(650, 6, '2024-06-02 08:53:05', 'GET: /master/po/audit_logs/page=1'),
(651, 6, '2024-06-02 08:53:21', 'GET: /master/po/audit_logs/page=1'),
(652, 6, '2024-06-02 08:53:24', 'GET: /master/po/audit_logs/page=1'),
(653, 6, '2024-06-02 08:53:24', 'GET: /master/po/audit_logs/page=1'),
(654, 6, '2024-06-02 08:53:30', 'GET: /master/po/audit_logs/page=1'),
(655, 6, '2024-06-02 08:53:30', 'GET: /master/po/audit_logs/page=1'),
(656, 6, '2024-06-02 08:54:11', 'POST: /master/logout'),
(657, 6, '2024-06-02 08:54:25', 'POST: /master/login'),
(658, 6, '2024-06-02 08:54:25', 'GET: /master/po/audit_logs/page=1'),
(659, 6, '2024-06-02 08:54:25', 'GET: /master/po/audit_logs/page=1'),
(660, 6, '2024-06-02 08:54:26', 'GET: /master/po/audit_logs/page=1'),
(661, 6, '2024-06-02 08:54:26', 'GET: /master/po/audit_logs/page=1'),
(662, 6, '2024-06-02 08:54:28', 'GET: /master/po/audit_logs/page=1'),
(663, 6, '2024-06-02 08:54:28', 'GET: /master/po/audit_logs/page=1'),
(664, 6, '2024-06-02 08:54:30', 'GET: /master/po/audit_logs/page=1'),
(665, 6, '2024-06-02 08:54:30', 'GET: /master/po/audit_logs/page=1'),
(666, 6, '2024-06-02 08:54:31', 'GET: /master/po/audit_logs/page=1'),
(667, 6, '2024-06-02 08:54:31', 'GET: /master/po/audit_logs/page=1'),
(668, 6, '2024-06-02 08:54:33', 'GET: /master/po/pondo/page=1'),
(669, 6, '2024-06-02 08:54:33', 'GET: /master/po/audit_logs/page=1'),
(670, 6, '2024-06-02 08:54:36', 'GET: /master/po/audit_logs/page=1'),
(671, 6, '2024-06-02 08:54:36', 'GET: /master/po/audit_logs/page=1'),
(672, 6, '2024-06-02 08:54:37', 'GET: /master/po/pondo/page=1'),
(673, 6, '2024-06-02 08:54:37', 'GET: /master/po/audit_logs/page=1'),
(674, 6, '2024-06-02 08:54:37', 'GET: /master/po/audit_logs/page=1'),
(675, 6, '2024-06-02 08:54:37', 'GET: /master/po/audit_logs/page=1'),
(676, 6, '2024-06-02 08:54:46', 'GET: /master/po/audit_logs/page=1'),
(677, 6, '2024-06-02 08:54:46', 'GET: /master/po/audit_logs/page=1'),
(678, 6, '2024-06-02 08:54:50', 'GET: /master/po/audit_logs/page=1'),
(679, 6, '2024-06-02 08:54:50', 'GET: /master/po/audit_logs/page=1'),
(680, 6, '2024-06-02 08:54:51', 'GET: /master/po/audit_logs/page=1'),
(681, 6, '2024-06-02 08:54:51', 'GET: /master/po/audit_logs/page=1'),
(682, 6, '2024-06-02 08:54:52', 'GET: /master/po/audit_logs/page=1'),
(683, 6, '2024-06-02 08:54:52', 'GET: /master/po/audit_logs/page=1'),
(684, 6, '2024-06-02 08:54:56', 'GET: /master/po/viewsupplier/Supplier=2'),
(685, 6, '2024-06-02 08:54:56', 'GET: /master/po/audit_logs/page=1'),
(686, 6, '2024-06-02 08:57:20', 'GET: /master/po/audit_logs/page=1'),
(687, 6, '2024-06-02 08:57:20', 'GET: /master/po/audit_logs/page=1'),
(688, 6, '2024-06-02 08:57:25', 'GET: /master/po/audit_logs/page=1'),
(689, 6, '2024-06-02 08:57:28', 'GET: /master/po/pondo/page=1'),
(690, 6, '2024-06-02 08:57:28', 'GET: /master/po/audit_logs/page=1'),
(691, 6, '2024-06-02 08:57:32', 'GET: /master/po/audit_logs/page=1'),
(692, 6, '2024-06-02 08:57:33', 'GET: /master/po/audit_logs/page=1'),
(693, 6, '2024-06-02 08:57:34', 'GET: /master/po/audit_logs/page=2'),
(694, 6, '2024-06-02 08:57:34', 'GET: /master/po/audit_logs/page=1'),
(695, 6, '2024-06-02 08:57:35', 'GET: /master/po/audit_logs/page=1'),
(696, 6, '2024-06-02 08:57:35', 'GET: /master/po/audit_logs/page=1'),
(697, 6, '2024-06-02 08:59:53', 'GET: /master/po/pondo/page=1'),
(698, 6, '2024-06-02 08:59:53', 'GET: /master/po/audit_logs/page=1'),
(699, 6, '2024-06-02 08:59:55', 'GET: /master/po/audit_logs/page=1'),
(700, 6, '2024-06-02 08:59:55', 'GET: /master/po/audit_logs/page=1'),
(701, 6, '2024-06-02 09:35:58', 'GET: /master/po/editsupplier/Supplier=2'),
(702, 6, '2024-06-02 09:35:58', 'GET: /master/po/audit_logs/page=1'),
(703, 6, '2024-06-02 09:37:45', 'GET: /master/po/editsupplier/Supplier=2'),
(704, 6, '2024-06-02 09:37:45', 'GET: /master/po/audit_logs/page=1'),
(705, 6, '2024-06-02 09:38:24', 'GET: /master/po/editsupplier/Supplier=2'),
(706, 6, '2024-06-02 09:38:24', 'GET: /master/po/audit_logs/page=1'),
(707, 6, '2024-06-02 09:41:30', 'POST: /master/master/edit/editsupplier'),
(708, 6, '2024-06-02 09:41:30', 'GET: /master/po/editsupplier/Supplier=2'),
(709, 6, '2024-06-02 09:41:30', 'GET: /master/po/audit_logs/page=1'),
(710, 6, '2024-06-02 09:42:04', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(711, 6, '2024-06-02 09:42:04', 'GET: /master/po/audit_logs/page=1'),
(712, 6, '2024-06-02 09:47:49', 'POST: /master/master/insert/addsupplier/'),
(713, 6, '2024-06-02 09:47:51', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(714, 6, '2024-06-02 09:47:51', 'GET: /master/po/audit_logs/page=1'),
(715, 6, '2024-06-02 09:47:55', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(716, 6, '2024-06-02 09:47:55', 'GET: /master/po/audit_logs/page=1'),
(717, 6, '2024-06-02 09:47:58', 'GET: /master/po/addbulk/Supplier=3'),
(718, 6, '2024-06-02 09:47:58', 'GET: /master/po/audit_logs/page=1'),
(719, 6, '2024-06-02 09:50:05', 'POST: /master/master/po/addbulk/'),
(720, 6, '2024-06-02 09:50:05', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(721, 6, '2024-06-02 09:50:05', 'GET: /master/po/audit_logs/page=1'),
(722, 6, '2024-06-02 09:51:22', 'POST: /master/master/insert/addsupplier/'),
(723, 6, '2024-06-02 09:51:23', 'GET: /master/po/viewsupplierproduct/Supplier=4'),
(724, 6, '2024-06-02 09:51:23', 'GET: /master/po/audit_logs/page=1'),
(725, 6, '2024-06-02 09:51:25', 'GET: /master/po/addbulk/Supplier=4'),
(726, 6, '2024-06-02 09:51:25', 'GET: /master/po/audit_logs/page=1'),
(727, 6, '2024-06-02 09:53:34', 'GET: /master/po/addbulk/Supplier=4'),
(728, 6, '2024-06-02 09:53:34', 'GET: /master/po/audit_logs/page=1'),
(729, 6, '2024-06-02 09:53:35', 'GET: /master/po/viewsupplierproduct/Supplier=4'),
(730, 6, '2024-06-02 09:53:35', 'GET: /master/po/audit_logs/page=1'),
(731, 6, '2024-06-02 09:53:46', 'GET: /master/po/editsupplier/Supplier=3'),
(732, 6, '2024-06-02 09:53:46', 'GET: /master/po/audit_logs/page=1'),
(733, 6, '2024-06-02 09:53:51', 'GET: /master/po/audit_logs/page=1'),
(734, 6, '2024-06-02 09:53:51', 'GET: /master/po/audit_logs/page=1'),
(735, 6, '2024-06-02 09:53:55', 'GET: /master/po/audit_logs/page=1'),
(736, 6, '2024-06-02 09:53:55', 'GET: /master/po/audit_logs/page=1'),
(737, 6, '2024-06-02 09:53:58', 'GET: /master/po/pondo/page=1'),
(738, 6, '2024-06-02 09:53:58', 'GET: /master/po/audit_logs/page=1');
INSERT INTO `audit_log` (`id`, `account_id`, `datetime`, `action`) VALUES
(739, 6, '2024-06-02 09:54:06', 'GET: /master/po/audit_logs/page=1'),
(740, 6, '2024-06-02 09:54:06', 'GET: /master/po/audit_logs/page=1'),
(741, 6, '2024-06-02 09:54:15', 'GET: /master/po/pondo/page=1'),
(742, 6, '2024-06-02 09:54:15', 'GET: /master/po/audit_logs/page=1'),
(743, 6, '2024-06-02 09:54:16', 'GET: /master/po/audit_logs/page=1'),
(744, 6, '2024-06-02 09:54:16', 'GET: /master/po/audit_logs/page=1'),
(745, 6, '2024-06-02 10:01:04', 'GET: /master/po/viewsupplierproduct/Supplier=4'),
(746, 6, '2024-06-02 10:01:04', 'GET: /master/po/audit_logs/page=1'),
(747, 6, '2024-06-02 10:01:06', 'GET: /master/po/addbulk/Supplier=4'),
(748, 6, '2024-06-02 10:01:06', 'GET: /master/po/audit_logs/page=1'),
(749, 6, '2024-06-02 10:02:08', 'POST: /master/master/po/addbulk/'),
(750, 6, '2024-06-02 10:02:08', 'GET: /master/po/viewsupplierproduct/Supplier=4'),
(751, 6, '2024-06-02 10:02:08', 'GET: /master/po/audit_logs/page=1'),
(752, 6, '2024-06-02 10:03:53', 'GET: /master/po/viewsupplierproduct/Supplier=4'),
(753, 6, '2024-06-02 10:03:53', 'GET: /master/po/audit_logs/page=1'),
(754, 6, '2024-06-02 10:03:54', 'GET: /master/po/pondo/page=1'),
(755, 6, '2024-06-02 10:03:54', 'GET: /master/po/audit_logs/page=1'),
(756, 6, '2024-06-02 10:03:55', 'GET: /master/po/pondo/page=1'),
(757, 6, '2024-06-02 10:03:55', 'GET: /master/po/audit_logs/page=1'),
(758, 6, '2024-06-02 10:03:58', 'GET: /master/po/audit_logs/page=1'),
(759, 6, '2024-06-02 10:03:58', 'GET: /master/po/audit_logs/page=1'),
(760, 6, '2024-06-02 10:04:00', 'GET: /master/po/audit_logs/page=1'),
(761, 6, '2024-06-02 10:04:00', 'GET: /master/po/audit_logs/page=1'),
(762, 6, '2024-06-02 10:04:21', 'POST: /master/logout'),
(763, 6, '2024-06-02 10:04:42', 'POST: /master/login'),
(764, 6, '2024-06-02 10:04:42', 'GET: /master/po/audit_logs/page=1'),
(765, 6, '2024-06-02 10:04:42', 'GET: /master/po/audit_logs/page=1'),
(766, 6, '2024-06-02 10:04:46', 'GET: /master/po/pondo/page=1'),
(767, 6, '2024-06-02 10:04:46', 'GET: /master/po/audit_logs/page=1'),
(768, 6, '2024-06-02 10:04:48', 'GET: /master/po/audit_logs/page=1'),
(769, 6, '2024-06-02 10:04:48', 'GET: /master/po/audit_logs/page=1'),
(770, 6, '2024-06-02 10:05:35', 'GET: /master/po/editsupplier/Supplier=3'),
(771, 6, '2024-06-02 10:05:35', 'GET: /master/po/audit_logs/page=1'),
(772, 6, '2024-06-02 10:05:39', 'POST: /master/master/edit/editsupplier'),
(773, 6, '2024-06-02 10:05:39', 'GET: /master/po/editsupplier/Supplier=3'),
(774, 6, '2024-06-02 10:05:39', 'GET: /master/po/audit_logs/page=1'),
(775, 6, '2024-06-02 10:05:44', 'GET: /master/po/editsupplier/Supplier=2'),
(776, 6, '2024-06-02 10:05:44', 'GET: /master/po/audit_logs/page=1'),
(777, 6, '2024-06-02 10:05:50', 'GET: /master/po/editsupplier/Supplier=3'),
(778, 6, '2024-06-02 10:05:50', 'GET: /master/po/audit_logs/page=1'),
(779, 6, '2024-06-02 10:05:53', 'GET: /master/po/editsupplier/Supplier=2'),
(780, 6, '2024-06-02 10:05:53', 'GET: /master/po/audit_logs/page=1'),
(781, 6, '2024-06-02 10:05:55', 'GET: /master/po/editsupplier/Supplier=3'),
(782, 6, '2024-06-02 10:05:55', 'GET: /master/po/audit_logs/page=1'),
(783, 6, '2024-06-02 10:05:58', 'GET: /master/po/editsupplier/Supplier=4'),
(784, 6, '2024-06-02 10:05:58', 'GET: /master/po/audit_logs/page=1'),
(785, 6, '2024-06-02 10:07:03', 'POST: /master/master/edit/editsupplier'),
(786, 6, '2024-06-02 10:07:03', 'GET: /master/po/editsupplier/Supplier=4'),
(787, 6, '2024-06-02 10:07:03', 'GET: /master/po/audit_logs/page=1'),
(788, 6, '2024-06-02 10:08:44', 'POST: /master/master/edit/editsupplier'),
(789, 6, '2024-06-02 10:08:44', 'GET: /master/po/editsupplier/Supplier=4'),
(790, 6, '2024-06-02 10:08:44', 'GET: /master/po/audit_logs/page=1'),
(791, 6, '2024-06-02 10:09:22', 'GET: /master/po/editsupplier/Supplier=4'),
(792, 6, '2024-06-02 10:09:23', 'GET: /master/po/audit_logs/page=1'),
(793, 6, '2024-06-02 10:09:26', 'POST: /master/master/edit/editsupplier'),
(794, 6, '2024-06-02 10:09:26', 'GET: /master/po/editsupplier/Supplier=4'),
(795, 6, '2024-06-02 10:09:26', 'GET: /master/po/audit_logs/page=1'),
(796, 6, '2024-06-02 10:09:35', 'POST: /master/master/edit/editsupplier'),
(797, 6, '2024-06-02 10:09:35', 'GET: /master/po/editsupplier/Supplier=4'),
(798, 6, '2024-06-02 10:09:35', 'GET: /master/po/audit_logs/page=1'),
(799, 6, '2024-06-02 10:09:38', 'POST: /master/master/edit/editsupplier'),
(800, 6, '2024-06-02 10:09:38', 'GET: /master/po/editsupplier/Supplier=4'),
(801, 6, '2024-06-02 10:09:38', 'GET: /master/po/audit_logs/page=1'),
(802, 6, '2024-06-02 10:11:14', 'GET: /master/po/editsupplier/Supplier=4'),
(803, 6, '2024-06-02 10:11:14', 'GET: /master/po/audit_logs/page=1'),
(804, 6, '2024-06-02 10:13:30', 'POST: /master/master/edit/editsupplier'),
(805, 6, '2024-06-02 10:13:30', 'GET: /master/po/editsupplier/Supplier=4'),
(806, 6, '2024-06-02 10:13:30', 'GET: /master/po/audit_logs/page=1'),
(807, 6, '2024-06-02 10:13:38', 'GET: /master/po/editsupplier/Supplier=2'),
(808, 6, '2024-06-02 10:13:38', 'GET: /master/po/audit_logs/page=1'),
(809, 6, '2024-06-02 10:13:41', 'POST: /master/master/edit/editsupplier'),
(810, 6, '2024-06-02 10:13:41', 'GET: /master/po/editsupplier/Supplier=2'),
(811, 6, '2024-06-02 10:13:41', 'GET: /master/po/audit_logs/page=1'),
(812, 6, '2024-06-02 10:13:45', 'GET: /master/po/editsupplier/Supplier=3'),
(813, 6, '2024-06-02 10:13:45', 'GET: /master/po/audit_logs/page=1'),
(814, 6, '2024-06-02 10:13:47', 'POST: /master/master/edit/editsupplier'),
(815, 6, '2024-06-02 10:13:47', 'GET: /master/po/editsupplier/Supplier=3'),
(816, 6, '2024-06-02 10:13:47', 'GET: /master/po/audit_logs/page=1'),
(817, 6, '2024-06-02 10:13:58', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(818, 6, '2024-06-02 10:13:58', 'GET: /master/po/audit_logs/page=1'),
(819, 6, '2024-06-02 10:14:00', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(820, 6, '2024-06-02 10:14:00', 'GET: /master/po/audit_logs/page=1'),
(821, 6, '2024-06-02 10:14:03', 'GET: /master/po/addbulk/Supplier=2'),
(822, 6, '2024-06-02 10:14:03', 'GET: /master/po/audit_logs/page=1'),
(823, 6, '2024-06-02 10:14:55', 'POST: /master/master/po/addbulk/'),
(824, 6, '2024-06-02 10:14:55', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(825, 6, '2024-06-02 10:14:55', 'GET: /master/po/audit_logs/page=1'),
(826, 6, '2024-06-02 10:14:58', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(827, 6, '2024-06-02 10:14:58', 'GET: /master/po/audit_logs/page=1'),
(828, 6, '2024-06-02 10:15:00', 'GET: /master/po/addbulk/Supplier=3'),
(829, 6, '2024-06-02 10:15:00', 'GET: /master/po/audit_logs/page=1'),
(830, 6, '2024-06-02 10:23:27', 'POST: /master/master/po/addbulk/'),
(831, 6, '2024-06-02 10:23:27', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(832, 6, '2024-06-02 10:23:27', 'GET: /master/po/audit_logs/page=1'),
(833, 6, '2024-06-02 10:23:32', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(834, 6, '2024-06-02 10:23:33', 'GET: /master/po/audit_logs/page=1'),
(835, 6, '2024-06-02 10:23:42', 'GET: /master/po/addbulk/Supplier=2'),
(836, 6, '2024-06-02 10:23:42', 'GET: /master/po/audit_logs/page=1'),
(837, 6, '2024-06-02 10:24:24', 'POST: /master/master/po/addbulk/'),
(838, 6, '2024-06-02 10:24:24', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(839, 6, '2024-06-02 10:24:24', 'GET: /master/po/audit_logs/page=1'),
(840, 6, '2024-06-02 10:24:28', 'GET: /master/po/viewsupplierproduct/Supplier=4'),
(841, 6, '2024-06-02 10:24:28', 'GET: /master/po/audit_logs/page=1'),
(842, 6, '2024-06-02 10:24:31', 'GET: /master/po/addbulk/Supplier=4'),
(843, 6, '2024-06-02 10:24:31', 'GET: /master/po/audit_logs/page=1'),
(844, 6, '2024-06-02 10:28:38', 'POST: /master/master/po/addbulk/'),
(845, 6, '2024-06-02 10:28:38', 'GET: /master/po/viewsupplierproduct/Supplier=4'),
(846, 6, '2024-06-02 10:28:38', 'GET: /master/po/audit_logs/page=1'),
(847, 6, '2024-06-02 10:28:47', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(848, 6, '2024-06-02 10:28:47', 'GET: /master/po/audit_logs/page=1'),
(849, 6, '2024-06-02 10:28:49', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(850, 6, '2024-06-02 10:28:49', 'GET: /master/po/audit_logs/page=1'),
(851, 6, '2024-06-02 10:28:53', 'GET: /master/po/viewsupplierproduct/Supplier=4'),
(852, 6, '2024-06-02 10:28:54', 'GET: /master/po/audit_logs/page=1'),
(853, 6, '2024-06-02 10:28:55', 'GET: /master/po/addbulk/Supplier=4'),
(854, 6, '2024-06-02 10:28:55', 'GET: /master/po/audit_logs/page=1'),
(855, 6, '2024-06-02 10:32:08', 'POST: /master/master/po/addbulk/'),
(856, 6, '2024-06-02 10:32:08', 'GET: /master/po/viewsupplierproduct/Supplier=4'),
(857, 6, '2024-06-02 10:32:08', 'GET: /master/po/audit_logs/page=1'),
(858, 6, '2024-06-02 10:37:30', 'POST: /master/master/insert/addsupplier/'),
(859, 6, '2024-06-02 10:37:32', 'GET: /master/po/viewsupplierproduct/Supplier=5'),
(860, 6, '2024-06-02 10:37:32', 'GET: /master/po/audit_logs/page=1'),
(861, 6, '2024-06-02 10:37:34', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(862, 6, '2024-06-02 10:37:34', 'GET: /master/po/audit_logs/page=1'),
(863, 6, '2024-06-02 10:37:37', 'GET: /master/po/editsupplier/Supplier=5'),
(864, 6, '2024-06-02 10:37:38', 'GET: /master/po/audit_logs/page=1'),
(865, 6, '2024-06-02 10:37:45', 'GET: /master/po/editsupplier/Supplier=5'),
(866, 6, '2024-06-02 10:37:45', 'GET: /master/po/audit_logs/page=1'),
(867, 6, '2024-06-02 10:37:47', 'GET: /master/po/editsupplier/Supplier=3'),
(868, 6, '2024-06-02 10:37:47', 'GET: /master/po/audit_logs/page=1'),
(869, 6, '2024-06-02 10:37:51', 'GET: /master/po/editsupplier/Supplier=4'),
(870, 6, '2024-06-02 10:37:51', 'GET: /master/po/audit_logs/page=1'),
(871, 6, '2024-06-02 10:37:54', 'GET: /master/po/editsupplier/Supplier=2'),
(872, 6, '2024-06-02 10:37:54', 'GET: /master/po/audit_logs/page=1'),
(873, 6, '2024-06-02 10:37:57', 'GET: /master/po/viewsupplier/Supplier=5'),
(874, 6, '2024-06-02 10:37:57', 'GET: /master/po/audit_logs/page=1'),
(875, 6, '2024-06-02 10:37:59', 'GET: /master/po/editsupplier/Supplier=5'),
(876, 6, '2024-06-02 10:37:59', 'GET: /master/po/audit_logs/page=1'),
(877, 6, '2024-06-02 10:38:01', 'GET: /master/po/viewsupplierproduct/Supplier=5'),
(878, 6, '2024-06-02 10:38:01', 'GET: /master/po/audit_logs/page=1'),
(879, 6, '2024-06-02 10:38:03', 'GET: /master/po/addbulk/Supplier=5'),
(880, 6, '2024-06-02 10:38:03', 'GET: /master/po/audit_logs/page=1'),
(881, 6, '2024-06-02 10:38:29', 'GET: /master/po/viewsupplierproduct/Supplier=5'),
(882, 6, '2024-06-02 10:38:29', 'GET: /master/po/audit_logs/page=1'),
(883, 6, '2024-06-02 10:38:33', 'GET: /master/po/editsupplier/Supplier=5'),
(884, 6, '2024-06-02 10:38:33', 'GET: /master/po/audit_logs/page=1'),
(885, 6, '2024-06-02 10:38:36', 'GET: /master/po/viewsupplierproduct/Supplier=5'),
(886, 6, '2024-06-02 10:38:36', 'GET: /master/po/audit_logs/page=1'),
(887, 6, '2024-06-02 10:38:37', 'GET: /master/po/addbulk/Supplier=5'),
(888, 6, '2024-06-02 10:38:37', 'GET: /master/po/audit_logs/page=1'),
(889, 6, '2024-06-02 10:39:43', 'POST: /master/master/po/addbulk/'),
(890, 6, '2024-06-02 10:39:43', 'GET: /master/po/viewsupplierproduct/Supplier=5'),
(891, 6, '2024-06-02 10:39:43', 'GET: /master/po/audit_logs/page=1'),
(892, 6, '2024-06-02 10:39:45', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(893, 6, '2024-06-02 10:39:45', 'GET: /master/po/audit_logs/page=1'),
(894, 6, '2024-06-02 10:39:47', 'GET: /master/po/addbulk/Supplier=2'),
(895, 6, '2024-06-02 10:39:47', 'GET: /master/po/audit_logs/page=1'),
(896, 6, '2024-06-02 10:42:51', 'POST: /master/master/po/addbulk/'),
(897, 6, '2024-06-02 10:42:51', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(898, 6, '2024-06-02 10:42:52', 'GET: /master/po/audit_logs/page=1'),
(899, 6, '2024-06-02 10:43:51', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(900, 6, '2024-06-02 10:43:51', 'GET: /master/po/audit_logs/page=1'),
(901, 6, '2024-06-02 10:43:57', 'GET: /master/po/viewsupplier/Supplier=3'),
(902, 6, '2024-06-02 10:43:57', 'GET: /master/po/audit_logs/page=1'),
(903, 6, '2024-06-02 10:43:59', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(904, 6, '2024-06-02 10:43:59', 'GET: /master/po/audit_logs/page=1'),
(905, 6, '2024-06-02 10:44:02', 'GET: /master/po/viewsupplierproduct/Supplier=4'),
(906, 6, '2024-06-02 10:44:02', 'GET: /master/po/audit_logs/page=1'),
(907, 6, '2024-06-02 10:44:05', 'GET: /master/po/viewsupplierproduct/Supplier=5'),
(908, 6, '2024-06-02 10:44:05', 'GET: /master/po/audit_logs/page=1'),
(909, 6, '2024-06-02 10:44:08', 'GET: /master/po/editsupplier/Supplier=2'),
(910, 6, '2024-06-02 10:44:08', 'GET: /master/po/audit_logs/page=1'),
(911, 6, '2024-06-02 10:44:12', 'POST: /master/master/edit/editsupplier'),
(912, 6, '2024-06-02 10:44:12', 'GET: /master/po/editsupplier/Supplier=2'),
(913, 6, '2024-06-02 10:44:12', 'GET: /master/po/audit_logs/page=1'),
(914, 6, '2024-06-02 10:44:16', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(915, 6, '2024-06-02 10:44:16', 'GET: /master/po/audit_logs/page=1'),
(916, 6, '2024-06-02 10:44:23', 'POST: /master/placeorder/supplier/'),
(917, 6, '2024-06-02 10:44:30', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(918, 6, '2024-06-02 10:44:30', 'GET: /master/po/audit_logs/page=1'),
(919, 6, '2024-06-02 10:44:34', 'GET: /master/po/editsupplier/Supplier=2'),
(920, 6, '2024-06-02 10:44:34', 'GET: /master/po/audit_logs/page=1'),
(921, 6, '2024-06-02 10:44:38', 'POST: /master/master/edit/editsupplier'),
(922, 6, '2024-06-02 10:44:38', 'GET: /master/po/editsupplier/Supplier=2'),
(923, 6, '2024-06-02 10:44:38', 'GET: /master/po/audit_logs/page=1'),
(924, 6, '2024-06-02 10:44:42', 'GET: /master/po/editsupplier/Supplier=2'),
(925, 6, '2024-06-02 10:44:42', 'GET: /master/po/audit_logs/page=1'),
(926, 6, '2024-06-02 10:44:46', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(927, 6, '2024-06-02 10:44:46', 'GET: /master/po/audit_logs/page=1'),
(928, 6, '2024-06-02 10:44:49', 'POST: /master/placeorder/supplier/'),
(929, 6, '2024-06-02 10:44:51', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(930, 6, '2024-06-02 10:44:51', 'GET: /master/po/audit_logs/page=1'),
(931, 6, '2024-06-02 10:44:54', 'POST: /master/placeorder/supplier/'),
(932, 6, '2024-06-02 10:44:59', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(933, 6, '2024-06-02 10:44:59', 'GET: /master/po/audit_logs/page=1'),
(934, 6, '2024-06-02 10:45:11', 'GET: /master/po/editsupplier/Supplier=2'),
(935, 6, '2024-06-02 10:45:11', 'GET: /master/po/audit_logs/page=1'),
(936, 6, '2024-06-02 10:45:16', 'POST: /master/master/edit/editsupplier'),
(937, 6, '2024-06-02 10:45:16', 'GET: /master/po/editsupplier/Supplier=2'),
(938, 6, '2024-06-02 10:45:16', 'GET: /master/po/audit_logs/page=1'),
(939, 6, '2024-06-02 10:45:21', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(940, 6, '2024-06-02 10:45:21', 'GET: /master/po/audit_logs/page=1'),
(941, 6, '2024-06-02 10:45:23', 'POST: /master/placeorder/supplier/'),
(942, 6, '2024-06-02 10:45:26', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(943, 6, '2024-06-02 10:45:26', 'GET: /master/po/audit_logs/page=1'),
(944, 6, '2024-06-02 10:45:30', 'GET: /master/po/editsupplier/Supplier=2'),
(945, 6, '2024-06-02 10:45:30', 'GET: /master/po/audit_logs/page=1'),
(946, 6, '2024-06-02 10:45:34', 'POST: /master/master/edit/editsupplier'),
(947, 6, '2024-06-02 10:45:34', 'GET: /master/po/editsupplier/Supplier=2'),
(948, 6, '2024-06-02 10:45:34', 'GET: /master/po/audit_logs/page=1'),
(949, 6, '2024-06-02 10:45:38', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(950, 6, '2024-06-02 10:45:38', 'GET: /master/po/audit_logs/page=1'),
(951, 6, '2024-06-02 10:45:45', 'POST: /master/placeorder/supplier/'),
(952, 6, '2024-06-02 10:45:48', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(953, 6, '2024-06-02 10:45:48', 'GET: /master/po/audit_logs/page=1'),
(954, 6, '2024-06-02 10:46:10', 'GET: /master/po/editsupplier/Supplier=2'),
(955, 6, '2024-06-02 10:46:10', 'GET: /master/po/audit_logs/page=1'),
(956, 6, '2024-06-02 10:46:18', 'GET: /master/po/viewsupplierproduct/Supplier=5'),
(957, 6, '2024-06-02 10:46:19', 'GET: /master/po/audit_logs/page=1'),
(958, 6, '2024-06-02 10:46:25', 'GET: /master/po/addbulk/Supplier=5'),
(959, 6, '2024-06-02 10:46:25', 'GET: /master/po/audit_logs/page=1'),
(960, 6, '2024-06-02 10:50:15', 'POST: /master/master/po/addbulk/'),
(961, 6, '2024-06-02 10:50:15', 'GET: /master/po/viewsupplierproduct/Supplier=5'),
(962, 6, '2024-06-02 10:50:15', 'GET: /master/po/audit_logs/page=1'),
(963, 6, '2024-06-02 10:50:20', 'GET: /master/po/viewsupplierproduct/Supplier=4'),
(964, 6, '2024-06-02 10:50:20', 'GET: /master/po/audit_logs/page=1'),
(965, 6, '2024-06-02 10:50:23', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(966, 6, '2024-06-02 10:50:23', 'GET: /master/po/audit_logs/page=1'),
(967, 6, '2024-06-02 10:50:27', 'GET: /master/po/viewsupplierproduct/Supplier=5'),
(968, 6, '2024-06-02 10:50:27', 'GET: /master/po/audit_logs/page=1'),
(969, 6, '2024-06-02 10:50:30', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(970, 6, '2024-06-02 10:50:30', 'GET: /master/po/audit_logs/page=1'),
(971, 6, '2024-06-02 10:50:30', 'GET: /master/po/addbulk/Supplier=3'),
(972, 6, '2024-06-02 10:50:30', 'GET: /master/po/audit_logs/page=1'),
(973, 6, '2024-06-02 10:52:26', 'POST: /master/master/po/addbulk/'),
(974, 6, '2024-06-02 10:52:26', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(975, 6, '2024-06-02 10:52:26', 'GET: /master/po/audit_logs/page=1'),
(976, 6, '2024-06-02 10:52:29', 'GET: /master/po/viewsupplierproduct/Supplier=4'),
(977, 6, '2024-06-02 10:52:30', 'GET: /master/po/audit_logs/page=1'),
(978, 6, '2024-06-02 10:52:32', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(979, 6, '2024-06-02 10:52:33', 'GET: /master/po/audit_logs/page=1'),
(980, 6, '2024-06-02 10:52:37', 'GET: /master/po/viewsupplierproduct/Supplier=4'),
(981, 6, '2024-06-02 10:52:37', 'GET: /master/po/audit_logs/page=1'),
(982, 6, '2024-06-02 10:52:38', 'GET: /master/po/addbulk/Supplier=4'),
(983, 6, '2024-06-02 10:52:38', 'GET: /master/po/audit_logs/page=1'),
(984, 6, '2024-06-02 10:52:40', 'GET: /master/po/viewsupplierproduct/Supplier=4'),
(985, 6, '2024-06-02 10:52:40', 'GET: /master/po/audit_logs/page=1'),
(986, 6, '2024-06-02 10:52:42', 'GET: /master/po/viewsupplierproduct/Supplier=5'),
(987, 6, '2024-06-02 10:52:42', 'GET: /master/po/audit_logs/page=1'),
(988, 6, '2024-06-02 10:57:51', 'POST: /master/master/insert/addsupplier/'),
(989, 8, '2024-06-02 11:52:26', 'POST: /master/investAsset'),
(990, 6, '2024-06-02 11:52:36', 'GET: /master/po/viewsupplierproduct/Supplier=4'),
(991, 6, '2024-06-02 11:52:37', 'GET: /master/po/audit_logs/page=1'),
(992, 6, '2024-06-02 11:53:01', 'GET: /master/po/viewsupplierproduct/Supplier=4'),
(993, 6, '2024-06-02 11:53:02', 'GET: /master/po/audit_logs/page=1'),
(994, 6, '2024-06-02 11:53:53', 'POST: /master/placeorder/supplier/'),
(995, 6, '2024-06-02 11:53:55', 'GET: /master/po/viewsupplierproduct/Supplier=4'),
(996, 6, '2024-06-02 11:53:57', 'GET: /master/po/audit_logs/page=1'),
(997, 6, '2024-06-02 11:54:07', 'POST: /master/placeorder/supplier/'),
(998, 6, '2024-06-02 11:54:10', 'POST: /master/master/complete/orderDetail'),
(999, 6, '2024-06-02 11:54:14', 'GET: /master/po/viewsupplierproduct/Supplier=4'),
(1000, 6, '2024-06-02 11:54:16', 'GET: /master/po/audit_logs/page=1'),
(1001, 6, '2024-06-02 11:54:34', 'POST: /master/placeorder/supplier/'),
(1002, 6, '2024-06-02 11:54:37', 'GET: /master/po/viewsupplierproduct/Supplier=4'),
(1003, 6, '2024-06-02 11:54:38', 'GET: /master/po/audit_logs/page=1'),
(1004, 6, '2024-06-02 11:54:55', 'POST: /master/placeorder/supplier/'),
(1005, 6, '2024-06-02 11:54:59', 'POST: /master/master/complete/orderDetail'),
(1006, 6, '2024-06-02 11:55:04', 'GET: /master/po/viewsupplierproduct/Supplier=5'),
(1007, 6, '2024-06-02 11:55:06', 'GET: /master/po/audit_logs/page=1'),
(1008, 6, '2024-06-02 11:55:26', 'POST: /master/placeorder/supplier/'),
(1009, 6, '2024-06-02 11:55:31', 'POST: /master/master/complete/orderDetail'),
(1010, 6, '2024-06-02 11:55:43', 'GET: /master/po/viewsupplierproduct/Supplier=6'),
(1011, 6, '2024-06-02 11:55:45', 'GET: /master/po/audit_logs/page=1'),
(1012, 6, '2024-06-02 11:55:55', 'POST: /master/placeorder/supplier/'),
(1013, 6, '2024-06-02 11:55:58', 'POST: /master/master/complete/orderDetail'),
(1014, 8, '2024-06-02 11:56:05', 'POST: /master/logout'),
(1015, 10, '2024-06-02 11:56:20', 'POST: /master/login'),
(1016, 10, '2024-06-02 12:02:16', 'POST: /master/addSales'),
(1017, 10, '2024-06-02 12:02:53', 'GET: /master/sls/Transaction-Details/sale=1'),
(1018, 10, '2024-06-02 12:02:57', 'GET: /master/sls/ReturnProduct/sale=1/saledetails=1/product=17'),
(1019, 10, '2024-06-02 12:03:09', 'POST: /master/returnProduct'),
(1020, 10, '2024-06-02 12:03:21', 'POST: /master/AddTarget'),
(1021, 10, '2024-06-02 12:03:34', 'POST: /master/AddTarget'),
(1022, 10, '2024-06-02 12:08:42', 'GET: /master/sls/Audit-Logs/page=1'),
(1023, 10, '2024-06-02 12:08:46', 'GET: /master/sls/funds/Sales/page=1');

-- --------------------------------------------------------

--
-- Table structure for table `batch_orders`
--

CREATE TABLE `batch_orders` (
  `Batch_ID` int(11) NOT NULL,
  `Supplier_ID` int(11) NOT NULL,
  `Time_Ordered` time NOT NULL DEFAULT current_timestamp(),
  `Date_Ordered` date NOT NULL DEFAULT current_timestamp(),
  `Items_Subtotal` int(11) NOT NULL,
  `Total_Amount` int(11) NOT NULL,
  `Order_Status` varchar(35) NOT NULL,
  `Pay_Using` varchar(35) NOT NULL,
  `Funds_Transact_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch_orders`
--

INSERT INTO `batch_orders` (`Batch_ID`, `Supplier_ID`, `Time_Ordered`, `Date_Ordered`, `Items_Subtotal`, `Total_Amount`, `Order_Status`, `Pay_Using`, `Funds_Transact_ID`) VALUES
(1, 2, '12:33:56', '2024-06-02', 1, 112, 'Cancelled', 'Cash on bank', 3),
(2, 2, '12:39:23', '2024-06-02', 2, 235, 'Completed + Delayed', 'Cash on bank', 4),
(3, 2, '13:17:42', '2024-06-02', 200, 22312, 'Completed', 'Cash on bank', 10),
(4, 4, '17:54:07', '2024-06-02', 250, 148705, 'Completed', 'Cash on bank', 13),
(5, 4, '17:54:55', '2024-06-02', 350, 279205, 'Completed', 'Cash on bank', 14),
(6, 5, '17:55:26', '2024-06-02', 400, 62290, 'Completed', 'Cash on bank', 15),
(7, 6, '17:55:55', '2024-06-02', 200, 34100, 'Completed', 'Cash on bank', 16);

-- --------------------------------------------------------

--
-- Table structure for table `benefit_info`
--

CREATE TABLE `benefit_info` (
  `id` int(10) NOT NULL,
  `philhealth` decimal(10,2) NOT NULL,
  `sss_fund` decimal(10,2) NOT NULL,
  `pagibig_fund` decimal(10,2) NOT NULL,
  `thirteenth_month` decimal(10,2) NOT NULL,
  `salary_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `benefit_info`
--

INSERT INTO `benefit_info` (`id`, `philhealth`, `sss_fund`, `pagibig_fund`, `thirteenth_month`, `salary_id`) VALUES
(1, 4000.00, 3584.00, 200.00, 80000.00, 1),
(2, 2250.00, 2016.00, 200.00, 45000.00, 2),
(3, 1750.00, 1568.00, 200.00, 35000.00, 3),
(4, 1500.00, 1344.00, 200.00, 30000.00, 4),
(5, 1250.00, 1120.00, 200.00, 25000.00, 5),
(6, 900.00, 806.40, 200.00, 18000.00, 6),
(7, 1000.00, 896.00, 200.00, 20000.00, 7),
(8, 2250.00, 2016.00, 200.00, 45000.00, 8),
(9, 1750.00, 1568.00, 200.00, 35000.00, 9),
(10, 2250.00, 2016.00, 200.00, 45000.00, 10),
(11, 750.00, 672.00, 200.00, 15000.00, 11),
(12, 900.00, 806.40, 200.00, 18000.00, 12),
(13, 750.00, 672.00, 200.00, 15000.00, 13),
(14, 750.00, 672.00, 200.00, 15000.00, 14),
(15, 900.00, 806.40, 200.00, 18000.00, 15),
(16, 750.00, 672.00, 200.00, 15000.00, 16),
(17, 750.00, 672.00, 200.00, 15000.00, 17),
(18, 900.00, 806.40, 200.00, 18000.00, 18),
(19, 750.00, 672.00, 200.00, 15000.00, 19),
(20, 750.00, 672.00, 200.00, 15000.00, 20),
(21, 900.00, 806.40, 200.00, 18000.00, 21),
(22, 750.00, 672.00, 200.00, 15000.00, 22),
(23, 750.00, 672.00, 200.00, 15000.00, 23),
(24, 900.00, 806.40, 200.00, 18000.00, 24),
(25, 750.00, 672.00, 200.00, 15000.00, 25),
(26, 750.00, 672.00, 200.00, 15000.00, 26),
(27, 900.00, 806.40, 200.00, 18000.00, 27),
(28, 750.00, 672.00, 200.00, 15000.00, 28),
(29, 900.00, 806.40, 200.00, 18000.00, 29);

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(10) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `day` enum('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Category_ID` int(11) NOT NULL,
  `Category_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_ID`, `Category_Name`) VALUES
(1, 'Tools'),
(2, 'Building Materials'),
(3, 'Art Supplies'),
(4, 'Safety Gear'),
(5, 'Paints and Chemicals');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `Name`, `Phone`, `Email`) VALUES
(1, 'Karleigh', '+1 (808) 268-2524', 'xylepysyr@mailinator.com'),
(2, 'Jayme', '+1 (368) 738-9216', 'xylepysyr@mailinator.com'),
(3, 'Jayme', '+1 (368) 738-9216', 'xylepysyr@mailinator.com'),
(4, 'Yoshio Stokes', '+1 (146) 618-8326', 'lowo@mailinator.com'),
(5, 'Yoshio Stokes', '+1 (146) 618-8326', 'lowo@mailinator.com'),
(6, 'Isabella Erickson', '+1 (151) 109-3246', 'taloz@mailinator.com'),
(7, 'Odysseus Lawson', '+1 (896) 629-3289', 'tajoxus@mailinator.com'),
(8, 'Brianna Guthrie', '+1 (923) 609-6678', 'hejozulyle@mailinator.com'),
(9, 'Brianna Guthrie', '+1 (923) 609-6678', 'hejozulyle@mailinator.com'),
(10, 'Brianna Guthrie', '+1 (923) 609-6678', 'hejozulyle@mailinator.com'),
(11, 'Brianna Guthrie', '+1 (923) 609-6678', 'hejozulyle@mailinator.com'),
(12, 'Brianna Guthrie', '+1 (923) 609-6678', 'hejozulyle@mailinator.com'),
(13, 'Brianna Guthrie', '+1 (923) 609-6678', 'hejozulyle@mailinator.com'),
(14, 'Emmanuel Delaney', '+1 (462) 652-4078', 'xafuruh@mailinator.com'),
(15, 'Deanna Bruce', '+1 (507) 122-4291', 'kyfidewa@mailinator.com'),
(16, 'Bruce Salas', '+1 (655) 236-2264', 'tyqusilyhu@mailinator.com'),
(17, 'Carol Reid', '+1 (233) 586-5253', 'cixozeraso@mailinator.com'),
(18, 'Carol Reid', '+1 (233) 586-5253', 'cixozeraso@mailinator.com'),
(19, 'Malik Abbott', '+1 (473) 919-6409', 'hecukas@mailinator.com'),
(20, 'mr helm', '09123456711', 'colineberde1@example.com'),
(21, 'something', 'something', 'something@email'),
(22, '123', '123', '123@em'),
(23, 'mr 1 helm', '09123456711', 'colineberde1@example.com'),
(24, 'Ana Nieves', '09999999999', 'aian@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `deliveryorders`
--

CREATE TABLE `deliveryorders` (
  `DeliveryOrderID` int(11) NOT NULL,
  `SaleID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `ProductWeight` decimal(10,2) DEFAULT NULL,
  `Province` varchar(255) DEFAULT NULL,
  `Municipality` varchar(255) DEFAULT NULL,
  `StreetBarangayAddress` varchar(255) DEFAULT NULL,
  `DeliveryDate` date DEFAULT NULL,
  `ReceivedDate` date DEFAULT NULL,
  `DeliveryStatus` enum('Pending','In Transit','Delivered','Failed to Deliver') DEFAULT 'Pending',
  `TruckID` int(11) DEFAULT NULL,
  `Region` enum('North','South','West','East') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) NOT NULL,
  `dateofbirth` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(20) DEFAULT 'N/A',
  `email` varchar(30) DEFAULT 'N/A',
  `civil_status` enum('Single','Married','Divorced','Widowed') NOT NULL,
  `department` enum('Product Order','Human Resources','Point of Sales','Inventory','Finance','Delivery') NOT NULL,
  `position` varchar(50) NOT NULL,
  `sss_number` varchar(20) DEFAULT NULL,
  `philhealth_number` varchar(20) DEFAULT NULL,
  `tin_number` varchar(20) DEFAULT NULL,
  `pagibig_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `image_url`, `first_name`, `middle_name`, `last_name`, `dateofbirth`, `gender`, `nationality`, `address`, `contact_no`, `email`, `civil_status`, `department`, `position`, `sss_number`, `philhealth_number`, `tin_number`, `pagibig_number`) VALUES
(1, 'https://pbs.twimg.com/profile_images/1786051436142596096/wD5JGLmb_400x400.jpg', 'Jarelle Anne', 'Cañada', 'Pamintuan', '2001-08-31', 'Female', 'Filipino', 'Rias-Eveland Boulevard', '09675222420', 'jarelleannepamintuan@gmail.com', 'Single', 'Human Resources', 'HR Manager/Director', '3934191496', '254323228890', '811863948', '077652901241'),
(2, 'https://pbs.twimg.com/profile_images/1556154158860107776/1eTSWQJx_400x400.jpg', 'Ziggy', 'Castro', 'Co', '2001-12-19', 'Female', 'Filipino', 'Pampanga', '09123456789', 'ziggyco@example.com', 'Single', 'Human Resources', 'Compensation and Benefits Specialist', '9842683190', '222904801483', '398938596', '393260427062'),
(3, 'https://pbs.twimg.com/profile_images/1591010546899308544/9_n476w9_400x400.png', 'Nathaniel', '', 'Fernandez', '2003-04-06', 'Male', 'Filipino', 'Pampanga', '09123456789', 'nathZ@example.com', 'Single', 'Human Resources', 'HR Legal Compliance Specialist', '3217127657', '982459800458', '175523699', '723082092314'),
(4, 'https://pbs.twimg.com/profile_images/1788847774337044480/hkqRySjw_400x400.jpg', 'Emmanuel Louise', '', 'Gonzales', '2001-01-27', 'Male', 'Filipino', 'Pampanga', '09123456789', 'emman@example.com', 'Divorced', 'Human Resources', 'Recruiter', '3831913601', '296757397697', '136729120', '687715123719'),
(5, 'publichumanResourcesimg\noPhotoAvailable.png', 'Joshua', '', 'Casupang', '2003-06-21', 'Male', 'Filipino', 'Pampanga', '09123456789', 'joshua@example.com', 'Married', 'Human Resources', 'HR Coordinator', '1788631721', '493539660119', '579494717', '254144900265'),
(6, 'publichumanResourcesimg\noPhotoAvailable.png', 'Marc', 'Cruz', 'David', '2002-02-09', 'Male', 'Filipino', 'Pampanga', '09293883802', 'sinicchi123@gmail.com', 'Single', 'Product Order', 'Order Processor', '5239186621', '113821417235', '293860405', '677900026630'),
(7, 'publichumanResourcesimg\noPhotoAvailable.png', 'Sean Kenji', '', 'Ferrer', '2002-04-22', 'Male', 'Filipino', 'Pampanga', '09123456789', 'seanferrer@example.com', 'Single', 'Delivery', 'Customer Service Representative', '8422736704', '199055286298', '764442924', '092261301180'),
(8, 'publichumanResourcesimg\noPhotoAvailable.png', 'Aries Joseph', 'Vergara', 'Tagle', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'ariestagle@example.com', 'Single', 'Finance', 'Financial Analyst', '6715934476', '786694635416', '004821400', '284885227548'),
(9, 'publichumanResourcesimg\noPhotoAvailable.png', 'Jared Gilmonde', '', 'Ambrocio', '2003-03-05', 'Male', 'Filipino', 'Pampanga', '09123456789', 'jared@example.com', 'Single', 'Inventory', 'Inventory Planner', '7177011845', '518287693103', '182964876', '853988041841'),
(10, 'publichumanResourcesimg\noPhotoAvailable.png', 'Aian Louise', '', 'Alfaro', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'aian@example.com', 'Single', 'Point of Sales', 'Business Analyst', '901919206', '225738265529', '3856950537', '480432989856'),
(11, 'publichumanResourcesimg\noPhotoAvailable.png', 'Vince Gerald', '', 'Bantigue', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'vincegerald@example.com', 'Single', 'Delivery', 'Delivery Driver', '8422736704', '199055286298', '764442924', '092261301180'),
(12, 'publichumanResourcesimg\noPhotoAvailable.png', 'Mark John', '', 'Beltran', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'mjbeltran@example.com', 'Single', 'Delivery', 'Courier', '8422736704', '199055286298', '764442924', '092261301180'),
(13, 'publichumanResourcesimg\noPhotoAvailable.png', 'Shania', '', 'Castro', '2002-01-01', 'Female', 'Filipino', 'Pampanga', '09123456789', 'shania@example.com', 'Single', 'Delivery', 'Parcel Sorter', '8422736704', '199055286298', '764442924', '092261301180'),
(14, 'publichumanResourcesimg\noPhotoAvailable.png', 'Mark Kevin', '', 'de Dios', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'markkevin@example.com', 'Single', 'Delivery', 'Delivery Driver', '8422736704', '199055286298', '764442924', '092261301180'),
(15, 'publichumanResourcesimg\noPhotoAvailable.png', 'Niel Joshua', '', 'Dizon', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'nieljoshua@example.com', 'Single', 'Delivery', 'Courier', '8422736704', '199055286298', '764442924', '092261301180'),
(16, 'publichumanResourcesimg\noPhotoAvailable.png', 'Alfred', '', 'Laxamana', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'alfred@example.com', 'Single', 'Delivery', 'Parcel Sorter', '8422736704', '199055286298', '764442924', '092261301180'),
(17, 'publichumanResourcesimg\noPhotoAvailable.png', 'Ryand', '', 'Soriano', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'ryand@example.com', 'Single', 'Delivery', 'Delivery Driver', '8422736704', '199055286298', '764442924', '092261301180'),
(18, 'publichumanResourcesimg\noPhotoAvailable.png', 'Simon', '', 'Mackay', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'simonmackay@example.com', 'Single', 'Delivery', 'Courier', '8422736704', '199055286298', '764442924', '092261301180'),
(19, 'publichumanResourcesimg\noPhotoAvailable.png', 'Steven', '', 'Graham', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'steven@example.com', 'Single', 'Delivery', 'Parcel Sorter', '8422736704', '199055286298', '764442924', '092261301180'),
(20, 'publichumanResourcesimg\noPhotoAvailable.png', 'Peter', '', 'Dyer', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'peter@example.com', 'Single', 'Delivery', 'Delivery Driver', '8422736704', '199055286298', '764442924', '092261301180'),
(21, 'publichumanResourcesimg\noPhotoAvailable.png', 'Benjamin', '', 'Scott', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'scott@example.com', 'Single', 'Delivery', 'Courier', '8422736704', '199055286298', '764442924', '092261301180'),
(22, 'publichumanResourcesimg\noPhotoAvailable.png', 'David', '', 'Mathis', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'davidmathis@example.com', 'Single', 'Delivery', 'Parcel Sorter', '8422736704', '199055286298', '764442924', '092261301180'),
(23, 'publichumanResourcesimg\noPhotoAvailable.png', 'Stewart', '', 'Butler', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'stewart@example.com', 'Single', 'Delivery', 'Delivery Driver', '8422736704', '199055286298', '764442924', '092261301180'),
(24, 'publichumanResourcesimg\noPhotoAvailable.png', 'Anthony', '', 'Underwood', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'underwood@example.com', 'Single', 'Delivery', 'Courier', '8422736704', '199055286298', '764442924', '092261301180'),
(25, 'publichumanResourcesimg\noPhotoAvailable.png', 'Keith', '', 'Glover', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'gloverkeith@example.com', 'Single', 'Delivery', 'Parcel Sorter', '8422736704', '199055286298', '764442924', '092261301180'),
(26, 'publichumanResourcesimg\noPhotoAvailable.png', 'Joseph', '', 'Carr', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'carr@example.com', 'Single', 'Delivery', 'Delivery Driver', '8422736704', '199055286298', '764442924', '092261301180'),
(27, 'publichumanResourcesimg\noPhotoAvailable.png', 'Michael', '', 'Sanderson', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'michaelsanderson@example.com', 'Single', 'Delivery', 'Courier', '8422736704', '199055286298', '764442924', '092261301180'),
(28, 'publichumanResourcesimg\noPhotoAvailable.png', 'Colin1', '1', 'Greene1', '2002-01-02', 'Female', 'us', 'san juan', '0912345671', 'colineberde1@example.com', 'Divorced', 'Delivery', 'Parcel Sorter', '8422736704', '199055286298', '764442924', '092261301180'),
(29, '/master/public/humanResources/img/Hard_Hat_with_Ear_Protection.png', 'mr', '1', 'helm', '2024-06-01', 'Male', 'Filipino', 'san juan', '09123456711', 'colineberde1@example.com', 'Married', 'Product Order', 'Order Processor', '1231231231', '123123121231', '231231231', '123123123111');

-- --------------------------------------------------------

--
-- Table structure for table `employeetrucks`
--

CREATE TABLE `employeetrucks` (
  `EmployeeID` int(11) DEFAULT NULL,
  `TruckID` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employeetrucks`
--

INSERT INTO `employeetrucks` (`EmployeeID`, `TruckID`, `id`) VALUES
(11, 1, 1),
(12, 1, 2),
(13, 1, 3),
(14, 2, 4),
(15, 2, 5),
(16, 2, 6),
(17, 3, 7),
(18, 3, 8),
(19, 3, 9),
(20, 4, 10),
(21, 4, 11),
(22, 4, 12),
(23, 5, 13),
(24, 5, 14),
(25, 5, 15),
(26, 6, 16),
(27, 6, 17),
(28, 6, 18);

-- --------------------------------------------------------

--
-- Table structure for table `employment_info`
--

CREATE TABLE `employment_info` (
  `id` int(10) NOT NULL,
  `dateofhire` date NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date DEFAULT NULL,
  `employees_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employment_info`
--

INSERT INTO `employment_info` (`id`, `dateofhire`, `startdate`, `enddate`, `employees_id`) VALUES
(1, '2021-01-01', '2021-01-01', NULL, 1),
(2, '2021-01-01', '2021-01-01', NULL, 2),
(3, '2021-01-01', '2021-01-01', NULL, 3),
(4, '2021-01-01', '2021-01-01', NULL, 4),
(5, '2021-01-01', '2021-01-01', NULL, 5),
(6, '2024-04-11', '2024-04-11', NULL, 6),
(7, '2024-04-11', '2024-04-11', NULL, 7),
(8, '2024-04-11', '2024-04-11', NULL, 8),
(9, '2024-04-11', '2024-04-11', NULL, 9),
(10, '2024-04-11', '2024-04-11', NULL, 10),
(11, '2024-04-11', '2024-04-11', NULL, 11),
(12, '2024-04-11', '2024-04-11', NULL, 12),
(13, '2024-04-11', '2024-04-11', NULL, 13),
(14, '2024-04-11', '2024-04-11', NULL, 14),
(15, '2024-04-11', '2024-04-11', NULL, 15),
(16, '2024-04-11', '2024-04-11', NULL, 16),
(17, '2024-04-11', '2024-04-11', NULL, 17),
(18, '2024-04-11', '2024-04-11', NULL, 18),
(19, '2024-04-11', '2024-04-11', NULL, 19),
(20, '2024-04-11', '2024-04-11', NULL, 20),
(21, '2024-04-11', '2024-04-11', NULL, 21),
(22, '2024-04-11', '2024-04-11', NULL, 22),
(23, '2024-04-11', '2024-04-11', NULL, 23),
(24, '2024-04-11', '2024-04-11', NULL, 24),
(25, '2024-04-11', '2024-04-11', NULL, 25),
(26, '2024-04-11', '2024-04-11', NULL, 26),
(27, '2024-04-11', '2024-04-11', NULL, 27),
(28, '2024-04-11', '2024-04-11', '2024-12-26', 28),
(29, '2024-05-08', '2024-05-11', '2024-06-12', 29);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_ID` int(11) NOT NULL,
  `supplier_ID` int(11) NOT NULL,
  `batch_ID` int(11) NOT NULL,
  `user` varchar(35) NOT NULL,
  `reviews` varchar(150) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedback_ID`, `supplier_ID`, `batch_ID`, `user`, `reviews`, `date`) VALUES
(1, 2, 2, 'bscs3a006', 'fuck you ung nag deliver', '2024-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `funds_transaction`
--

CREATE TABLE `funds_transaction` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `lt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `funds_transaction`
--

INSERT INTO `funds_transaction` (`id`, `employee_id`, `lt_id`) VALUES
(4, 6, 5),
(5, 6, 6),
(6, 5, 7),
(7, 1, 8),
(8, 5, 12),
(9, 5, 13),
(10, 6, 17),
(11, 10, 21),
(12, 11, 28),
(13, 6, 30),
(14, 6, 31),
(15, 6, 32),
(16, 6, 33);

-- --------------------------------------------------------

--
-- Table structure for table `grouptype`
--

CREATE TABLE `grouptype` (
  `grouptype` varchar(2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `requiresinfo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grouptype`
--

INSERT INTO `grouptype` (`grouptype`, `description`, `requiresinfo`) VALUES
('AA', 'Asset', 0),
('EP', 'Expenses', 0),
('IC', 'Income', 0),
('LE', 'liabilities and owner\'s equity', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leave_requests`
--

CREATE TABLE `leave_requests` (
  `id` int(10) NOT NULL,
  `type` enum('Sick Leave','Vacation Leave','5 Days Forced Leave','Special Privilege Leave','Maternity Leave','Paternity Leave','Parental Leave','Rehabilitation Leave','Special Leave (For Women)','Study Leave','Terminal Leave','Special Emergency Leave') NOT NULL,
  `details` varchar(255) DEFAULT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT current_timestamp(),
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('Pending','Approved','Denied') DEFAULT 'Pending',
  `employees_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_requests`
--

INSERT INTO `leave_requests` (`id`, `type`, `details`, `date_submitted`, `start_date`, `end_date`, `status`, `employees_id`) VALUES
(1, 'Vacation Leave', '', '2024-06-02 04:53:41', '2024-06-27', '2024-06-27', 'Approved', 29),
(2, 'Vacation Leave', '', '2024-06-02 04:54:36', '2024-06-02', '2024-06-06', 'Approved', 1),
(3, 'Sick Leave', '', '2024-06-02 04:55:05', '2024-06-03', '2024-06-04', 'Denied', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE `ledger` (
  `ledgerno` int(11) NOT NULL,
  `AccountType` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contactIfLE` varchar(255) DEFAULT NULL,
  `contactName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ledger`
--

INSERT INTO `ledger` (`ledgerno`, `AccountType`, `name`, `contactIfLE`, `contactName`) VALUES
(1, 1, 'Equipment', NULL, NULL),
(2, 1, 'Land', NULL, NULL),
(3, 2, 'Cash on hand', NULL, NULL),
(4, 2, 'Cash on bank', NULL, NULL),
(5, 2, 'Insurance', NULL, NULL),
(6, 2, 'Inventory', NULL, NULL),
(7, 3, 'A account', NULL, NULL),
(8, 3, 'B account', NULL, NULL),
(9, 4, 'C account', NULL, NULL),
(10, 4, 'D account', NULL, NULL),
(11, 5, 'Sales', NULL, NULL),
(12, 6, 'Discount', NULL, NULL),
(13, 6, 'Allowance', NULL, NULL),
(14, 6, 'Returns', NULL, NULL),
(15, 7, 'Payroll', NULL, NULL),
(16, 7, 'Fuel/Gas', NULL, NULL),
(17, 8, 'Rent', NULL, NULL),
(18, 8, 'Tax Expense', NULL, NULL),
(19, 8, 'Insurance Expense', NULL, NULL),
(20, 8, 'Utilities', NULL, NULL),
(21, 8, 'Theft Expense', NULL, NULL),
(22, 8, 'Interest Expense', NULL, NULL),
(23, 8, 'Other Operating Expense', NULL, NULL),
(24, 9, 'Cost of Goods Sold', NULL, NULL),
(25, 11, 'Retained Earnings/Loss', NULL, NULL),
(26, 10, 'Income Tax Payable', NULL, NULL),
(27, 10, 'Withholding Tax Payable', NULL, NULL),
(28, 4, 'Salary Payable', NULL, NULL),
(29, 10, 'Value Added Tax Payable', NULL, NULL),
(32, 3, 'aries', '123456789', 'aries tagle assitant'),
(33, 3, 'a2', 'a2', 'a2'),
(36, 4, 'a3', 'a3', 'a3'),
(37, 10, 'a4', 'a4', 'a4'),
(38, 3, 'sample', 'sample', 'sample'),
(39, 4, '123', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `ledgertransaction`
--

CREATE TABLE `ledgertransaction` (
  `LedgerXactID` int(11) NOT NULL,
  `LedgerNo` int(11) NOT NULL,
  `DateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `LedgerNo_Dr` int(11) NOT NULL,
  `amount` double NOT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ledgertransaction`
--

INSERT INTO `ledgertransaction` (`LedgerXactID`, `LedgerNo`, `DateTime`, `LedgerNo_Dr`, `amount`, `details`) VALUES
(1, 32, '2024-05-01 12:31:43', 4, 500000, NULL),
(5, 4, '2024-06-02 06:39:23', 6, 235, 'Pondo expense for Product Order'),
(6, 4, '2024-06-02 06:40:45', 1, 100, 'Pondo expense for Product Order'),
(7, 4, '2024-06-02 06:55:32', 1, 100, 'Pondo expense for Human Resources'),
(8, 4, '2024-06-02 06:56:03', 15, 68124.87, 'Pondo expense for Human Resources'),
(9, 28, '2024-06-02 06:56:44', 15, 68124.87, NULL),
(10, 27, '2024-06-02 06:56:44', 15, 11875.13, NULL),
(11, 32, '2024-05-02 12:59:41', 4, 500000, NULL),
(12, 4, '2024-06-02 07:00:05', 28, 68124.87, 'Pondo expense for Human Resources'),
(13, 4, '2024-06-02 07:00:05', 27, 11875.13, 'Pondo expense for Human Resources'),
(17, 4, '2024-06-02 07:17:42', 6, 22312, 'Pondo expense for Product Order'),
(21, 4, '2024-06-02 07:23:43', 1, 100, 'Pondo expense for Point of Sales'),
(28, 4, '2024-06-02 07:52:09', 16, 100, 'Pondo expense for Delivery'),
(29, 32, '2024-05-30 11:52:26', 4, 20000000, 'Investment of 32 in 4 with 20000000'),
(30, 4, '2024-06-02 11:54:07', 6, 148705, 'Pondo expense for Product Order'),
(31, 4, '2024-06-02 11:54:55', 6, 279205, 'Pondo expense for Product Order'),
(32, 4, '2024-06-02 11:55:26', 6, 62290, 'Pondo expense for Product Order'),
(33, 4, '2024-06-02 11:55:55', 6, 34100, 'Pondo expense for Product Order');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `Order_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Supplier_ID` int(11) NOT NULL,
  `Batch_ID` int(11) NOT NULL,
  `Product_Quantity` int(11) DEFAULT NULL,
  `Time_Ordered` time NOT NULL DEFAULT current_timestamp(),
  `Date_Ordered` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`Order_ID`, `Product_ID`, `Supplier_ID`, `Batch_ID`, `Product_Quantity`, `Time_Ordered`, `Date_Ordered`) VALUES
(4, 2, 2, 1, 1, '12:33:56', '2024-06-02'),
(5, 2, 2, 2, 1, '12:39:23', '2024-06-02'),
(6, 3, 2, 2, 1, '12:39:23', '2024-06-02'),
(7, 2, 2, 3, 100, '13:17:42', '2024-06-02'),
(8, 3, 2, 3, 100, '13:17:42', '2024-06-02'),
(16, 6, 4, 4, 50, '17:54:07', '2024-06-02'),
(17, 14, 4, 4, 50, '17:54:07', '2024-06-02'),
(18, 15, 4, 4, 50, '17:54:07', '2024-06-02'),
(19, 16, 4, 4, 50, '17:54:07', '2024-06-02'),
(20, 17, 4, 4, 50, '17:54:07', '2024-06-02'),
(26, 6, 4, 5, 50, '17:54:55', '2024-06-02'),
(27, 14, 4, 5, 100, '17:54:55', '2024-06-02'),
(28, 15, 4, 5, 100, '17:54:55', '2024-06-02'),
(29, 16, 4, 5, 50, '17:54:55', '2024-06-02'),
(30, 17, 4, 5, 50, '17:54:55', '2024-06-02'),
(31, 18, 5, 6, 50, '17:55:26', '2024-06-02'),
(32, 19, 5, 6, 50, '17:55:26', '2024-06-02'),
(33, 20, 5, 6, 50, '17:55:26', '2024-06-02'),
(34, 21, 5, 6, 50, '17:55:26', '2024-06-02'),
(35, 22, 5, 6, 50, '17:55:26', '2024-06-02'),
(36, 27, 5, 6, 50, '17:55:26', '2024-06-02'),
(37, 28, 5, 6, 50, '17:55:26', '2024-06-02'),
(38, 29, 5, 6, 50, '17:55:26', '2024-06-02'),
(39, 32, 6, 7, 50, '17:55:55', '2024-06-02'),
(40, 33, 6, 7, 50, '17:55:55', '2024-06-02'),
(41, 34, 6, 7, 50, '17:55:55', '2024-06-02'),
(42, 35, 6, 7, 50, '17:55:55', '2024-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(10) NOT NULL,
  `pay_date` date NOT NULL,
  `month` varchar(20) NOT NULL,
  `status` enum('Pending','Paid') DEFAULT 'Pending',
  `paid_type` enum('Cash on hand','Cash on bank') NOT NULL,
  `salary_id` int(10) NOT NULL,
  `employees_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `pay_date`, `month`, `status`, `paid_type`, `salary_id`, `employees_id`) VALUES
(1, '2024-06-02', 'June', 'Paid', 'Cash on bank', 1, 1),
(2, '2024-06-05', 'June', 'Paid', 'Cash on bank', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `Supplier_ID` int(11) NOT NULL,
  `Category_ID` int(11) NOT NULL,
  `ProductImage` varchar(250) NOT NULL,
  `ProductName` varchar(100) DEFAULT NULL,
  `Supplier` varchar(50) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `DeliveryRequired` varchar(3) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Supplier_Price` decimal(10,2) DEFAULT NULL,
  `Stocks` int(11) DEFAULT NULL,
  `UnitOfMeasurement` varchar(20) DEFAULT NULL,
  `TaxRate` decimal(5,2) DEFAULT NULL,
  `ProductWeight` decimal(10,2) DEFAULT NULL,
  `Status` varchar(35) NOT NULL,
  `Availability` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `Supplier_ID`, `Category_ID`, `ProductImage`, `ProductName`, `Supplier`, `Description`, `Category`, `DeliveryRequired`, `Price`, `Supplier_Price`, `Stocks`, `UnitOfMeasurement`, `TaxRate`, `ProductWeight`, `Status`, `Availability`) VALUES
(2, 2, 3, 'uploads/Acrylic_Paint_Set.png', 'Acrylic Paint Set', 'MRS DIY', 'Set of vibrant acrylic paints suitable for various surfaces', 'Art Supplies', NULL, 99.00, 65.00, 96, 'pcs', 0.12, 0.70, '', 'Not Available'),
(3, 2, 2, 'uploads/Adjustable_Wrench_(12_inches).png', 'Adjustable Wrench (12 inches)', 'MRS DIY', 'Adjustable wrench for plumbing and mechanical work', 'Tools', NULL, 109.00, 86.00, 97, 'pcs', 0.12, 1.20, '', 'Available'),
(4, 3, 1, 'uploads/Hammer_(Large).png', 'Hammer (Large)(Large)', 'MR DIY', 'Heavy-duty hammer for construction work', 'Tools', NULL, 329.00, 260.00, NULL, 'pcs', 0.12, 1.50, '', 'Available'),
(5, 3, 1, 'uploads/Screwdriver_Set_(Standard).png', 'Screwdriver Set (Standard)', 'MR DIY', 'Set of 6 screwdrivers with various sizes', 'Tools', NULL, 969.00, 670.00, NULL, 'set', 0.12, 0.80, '', 'Available'),
(6, 4, 2, 'uploads/Cement_(50kg).png', 'Cement (50kg)', 'Girlsen', 'Portland cement for construction purposes', 'Building Materials', NULL, 240.00, 160.00, 100, 'pcs', 0.12, 50.00, '', 'Available'),
(7, 2, 3, 'uploads/Paint_Brush_Set.png', 'Paint Brush Set', 'MRS DIY', 'Set of 10 paint brushes for art projects', 'Art Supplies', NULL, 209.00, 180.00, NULL, 'set', 0.12, 0.50, '', 'Available'),
(8, 3, 4, 'uploads/Safety_Helmet.png', 'Safety Helmet', 'MR DIY', 'Hard hat helmet for construction safety', 'Safety Gear', NULL, 470.00, 415.00, NULL, 'pcs', 0.12, 0.30, '', 'Available'),
(9, 3, 1, 'uploads/drill machine.jpg', 'Drill Machine', 'MR DIY', 'Cordless drill machine with rechargeable batteries', 'Tools', NULL, 1100.00, 860.00, NULL, 'pcs', 0.12, 2.00, '', 'Available'),
(10, 3, 2, 'uploads/Plywood (4x8 feet).jpg', 'Plywood (4x8 feet)', 'MR DIY', 'Plywood sheets for carpentry and construction', 'Building Materials', NULL, 650.00, 560.00, NULL, 'sheet', 0.12, 20.00, '', 'Available'),
(11, 3, 2, 'uploads/Steel_Bar_(1_meter).png', 'Steel Bar (1 meter)', 'MR DIY', 'Deformed steel bars for reinforcement in concrete ...', 'Building Materials', NULL, 55.00, 35.00, NULL, 'meter', 0.12, 2.50, '', 'Available'),
(12, 3, 2, 'uploads/Concrete Blocks (Standard).jpg', 'Concrete Blocks (Standard)', 'MR DIY', 'Standard concrete blocks for building walls', 'Building Materials', NULL, 12.00, 8.00, NULL, 'pcs', 0.12, 2.30, '', 'Available'),
(13, 2, 5, 'uploads/Paint_Thinner.png', 'Paint Thinner', 'MRS DIY', 'Solvent used for thinning oil-based paints and cleaning paint brushes', 'Paints and Chemicals', NULL, 170.00, 135.00, NULL, 'pcs', 0.12, 1.00, '', 'Available'),
(14, 4, 2, 'uploads/Roofing_Shingles_(Bundle).png', 'Roofing Shingles (Bundle)', 'Girlsen', 'Bundle of roofing shingles for covering roofs', 'Building Materials', NULL, 1750.00, 1360.00, 150, 'bundle', 0.12, 13.61, '', 'Available'),
(15, 4, 2, 'uploads/Sand_(1_cubic_yard).jpg', 'Sand (1 cubic yard)', 'Girlsen', 'Fine aggregate sand for various construction applications', 'Building Materials', NULL, 1500.00, 1250.00, 150, 'cubic yard', 0.12, 1088.62, '', 'Available'),
(16, 4, 2, 'uploads/Brick_(Standard).png', 'Brick (Standard)', 'Girlsen', 'Standard clay bricks for construction', 'Building Materials', NULL, 12.00, 7.00, 100, 'pcs', 0.12, 2.50, '', 'Available'),
(17, 4, 2, 'uploads/Wood_Studs_(8_feet).png', 'Wood Studs (8 feet)', 'Girlsen', 'Standard wood studs for framing walls', 'Building Materials', NULL, 225.00, 196.00, 98, '8 feet', 0.12, 3.63, '', 'Available'),
(18, 5, 2, 'uploads/Galvanized_Nails_(5_lbs).png', 'Galvanized Nails (5 lbs)', 'Edward Shop', 'Galvanized nails for various construction applicat...', 'Building Materials', NULL, 50.00, 24.00, 50, 'lbs', 0.12, 2.27, '', 'Available'),
(19, 5, 2, 'uploads/Drywall_(4x8_feet).png', 'Drywall (4x8 feet)', 'Edward Shop', 'Drywall sheets for interior wall finishing', 'Building Materials', NULL, 450.00, 395.00, 50, 'sheet', 0.12, 22.68, '', 'Available'),
(20, 5, 2, 'uploads/Concrete_Mix_(50_lb).png', 'Concrete Mix (50 lb)', 'Edward Shop', 'Pre-mixed concrete for small-scale construction projects', 'Building Materials', NULL, 365.00, 315.00, 50, 'lb', 0.12, 18.68, '', 'Available'),
(21, 5, 1, 'uploads/Adjustable_Wrench_(12_inches).png', 'Adjustable Wrench (12 inches)', 'Edward Shop', 'Adjustable wrench for plumbing and mechanical work', 'Tools', NULL, 115.00, 107.00, 49, 'pcs', 0.12, 1.20, '', 'Available'),
(22, 5, 1, 'uploads/Electric_Screwdriver.png', 'Electric Screwdriver', 'Edward Shop', 'Electric screwdriver with multiple torque settings', 'Tools', NULL, 269.00, 253.00, 49, 'pcs', 0.12, 1.80, '', 'Available'),
(23, 2, 2, 'uploads/PVC_Pipes_(10_feet).png', 'PVC Pipes (10 feet)', 'MRS DIY', 'PVC pipes for plumbing and drainage systems', 'Building Materials', NULL, 42.00, 38.00, NULL, 'feet', 0.12, 6.00, '', 'Available'),
(24, 2, 2, 'uploads/Insulation_Foam_Board_(4x8_feet).png', 'Insulation Foam Board (4x8 feet)', 'MRS DIY', 'Foam boards for insulation purposes in construction', 'Building Materials', NULL, 380.00, 369.00, NULL, 'sheet', 0.12, 12.00, '', 'Available'),
(25, 2, 3, 'uploads/Watercolor_Paint_Set.png', 'Watercolor Paint Set', 'MRS DIY', 'Set of high-quality watercolor paints for artists', 'Art Supplies', NULL, 109.00, 87.00, NULL, 'set', 0.12, 0.60, '', 'Available'),
(26, 2, 3, 'uploads/Acrylic_Paint_Set.png', 'Acrylic Paint Set', 'MRS DIY', 'Set of vibrant acrylic paints suitable for various surfaces', 'Art Supplies', NULL, 75.00, 55.00, NULL, 'set', 0.12, 0.65, '', 'Available'),
(27, 5, 5, 'uploads/Oil_Paint_Set.png', 'Oil Paint Set', 'Edward Shop', 'Set of high-quality oil paints for professional artists', 'Paints and Chemicals', NULL, 129.00, 97.00, 50, 'set', 0.12, 0.80, '', 'Available'),
(28, 5, 3, 'uploads/Sketching_Pencils_(Set_of_12).png', 'Sketching Pencils (Set of 12)', 'Edward Shop', 'Set of graphite sketching pencils for drawing and ...', 'Art Supplies', NULL, 45.00, 25.00, 50, 'set', 0.12, 0.30, '', 'Available'),
(29, 5, 3, 'uploads/Canvas_Roll_(6_feet).png', 'Canvas Roll (6 feet)', 'Edward Shop', 'Roll of primed canvas for painting', 'Art Supplies', NULL, 40.00, 29.00, 50, 'roll', 0.12, 3.00, '', 'Available'),
(30, 3, 4, 'uploads/Hard_Hat_with_Ear_Protection.png', 'Hard Hat with Ear Protection', 'MR DIY', 'Safety hard hat with built-in ear protection for noisy environments', 'Safety Gear', NULL, 305.00, 287.00, NULL, 'pcs', 0.12, 0.50, '', 'Available'),
(31, 3, 4, 'uploads/Steel-Toed_Boots.png', 'Steel-Toed Boots', 'MR DIY', 'Heavy-duty steel-toed boots for foot protection in...', 'Safety Gear', NULL, 799.00, 650.00, NULL, 'pair', 0.12, 2.00, '', 'Available'),
(32, 6, 4, 'uploads/Reflective_Safety_Tape_(Roll).png', 'Reflective Safety Tape (Roll)', 'Kobe Shop', 'Roll of reflective tape for enhancing visibility on safety gear', 'Safety Gear', NULL, 40.00, 25.00, 50, 'roll', 0.12, 0.20, '', 'Available'),
(33, 6, 2, 'uploads/Wood_Stain_(1_quart).jpg', 'Wood Stain (1 quart)', 'Kobe Shop', 'High-quality wood stain for finishing wood surface...', 'Building Materials', NULL, 215.00, 185.00, 50, 'quart', 0.12, 2.00, '', 'Available'),
(34, 6, 1, 'uploads/Paint_Roller_Set.png', 'Paint Roller Set', 'Kobe Shop', 'Set of paint rollers for applying paint smoothly on surfaces', 'Tools', NULL, 300.00, 280.00, 49, 'set', 0.12, 0.80, '', 'Available'),
(35, 6, 5, 'uploads/Adhesive_Primer_(1_gallon).png', 'Adhesive Primer (1 gallon)', 'Kobe Shop', 'Adhesive primer for preparing surfaces before pain...', 'Paints and Chemicals', NULL, 210.00, 190.00, 50, 'gallon', 0.12, 8.00, '', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `returnproducts`
--

CREATE TABLE `returnproducts` (
  `ReturnID` int(11) NOT NULL,
  `SaleID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Reason` varchar(255) DEFAULT NULL,
  `PaymentReturned` decimal(10,2) DEFAULT NULL,
  `ProductStatus` varchar(255) DEFAULT NULL,
  `ReturnDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_info`
--

CREATE TABLE `salary_info` (
  `id` int(10) NOT NULL,
  `monthly_salary` decimal(10,2) NOT NULL,
  `daily_rate` decimal(10,2) NOT NULL,
  `total_deductions` decimal(10,2) NOT NULL,
  `total_salary` decimal(10,2) NOT NULL,
  `employees_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary_info`
--

INSERT INTO `salary_info` (`id`, `monthly_salary`, `daily_rate`, `total_deductions`, `total_salary`, `employees_id`) VALUES
(1, 80000.00, 0.00, 34492.46, 45507.54, 1),
(2, 45000.00, 0.00, 14091.00, 30909.00, 2),
(3, 35000.00, 0.00, 8643.00, 26357.00, 3),
(4, 30000.00, 0.00, 6252.33, 23747.67, 4),
(5, 25000.00, 0.00, 4028.33, 20971.67, 5),
(6, 18000.00, 0.00, 1906.40, 16093.60, 6),
(7, 20000.00, 0.00, 2096.00, 17904.00, 7),
(8, 45000.00, 0.00, 14091.00, 30909.00, 8),
(9, 35000.00, 0.00, 8643.00, 26357.00, 9),
(10, 45000.00, 0.00, 14091.00, 30909.00, 10),
(11, 15000.00, 0.00, 1622.00, 13378.00, 11),
(12, 18000.00, 0.00, 1906.40, 16093.60, 12),
(13, 15000.00, 0.00, 1622.00, 13378.00, 13),
(14, 15000.00, 0.00, 1622.00, 13378.00, 14),
(15, 18000.00, 0.00, 1906.40, 16093.60, 15),
(16, 15000.00, 0.00, 1622.00, 13378.00, 16),
(17, 15000.00, 0.00, 1622.00, 13378.00, 17),
(18, 18000.00, 0.00, 1906.40, 16093.60, 18),
(19, 15000.00, 0.00, 1622.00, 13378.00, 19),
(20, 15000.00, 0.00, 1622.00, 13378.00, 20),
(21, 18000.00, 0.00, 1906.40, 16093.60, 21),
(22, 15000.00, 0.00, 1622.00, 13378.00, 22),
(23, 15000.00, 0.00, 1622.00, 13378.00, 23),
(24, 18000.00, 0.00, 1906.40, 16093.60, 24),
(25, 15000.00, 0.00, 1622.00, 13378.00, 25),
(26, 15000.00, 0.00, 1622.00, 13378.00, 26),
(27, 18000.00, 0.00, 1906.40, 16093.60, 27),
(28, 15000.00, 0.00, 1622.00, 13378.00, 28),
(29, 18000.00, 0.00, 1906.40, 16093.60, 29);

-- --------------------------------------------------------

--
-- Table structure for table `saledetails`
--

CREATE TABLE `saledetails` (
  `SaleDetailID` int(11) NOT NULL,
  `SaleID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `ProductWeight` decimal(10,2) DEFAULT NULL,
  `UnitPrice` decimal(10,2) DEFAULT NULL,
  `Subtotal` decimal(10,2) DEFAULT NULL,
  `Tax` decimal(10,2) DEFAULT NULL,
  `TotalAmount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SaleID` int(11) NOT NULL,
  `SaleDate` datetime DEFAULT NULL,
  `SalePreference` enum('Delivery','Pick-up') DEFAULT NULL,
  `ShippingFee` decimal(10,2) DEFAULT NULL,
  `PaymentMode` enum('Cash','Card') DEFAULT NULL,
  `CardNumber` varchar(16) DEFAULT NULL,
  `ExpiryDate` text DEFAULT NULL,
  `CVV` varchar(3) DEFAULT NULL,
  `Discount` decimal(10,2) NOT NULL,
  `TotalAmount` decimal(10,2) DEFAULT NULL,
  `EmployeeID` int(11) DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('Product Order','Human Resources','Point of Sales','Inventory','Finance','Delivery') NOT NULL,
  `account_info_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `Supplier_ID` int(11) NOT NULL,
  `Supplier_Name` varchar(50) DEFAULT NULL,
  `Contact_Name` varchar(35) NOT NULL,
  `Contact_Number` varchar(50) DEFAULT NULL,
  `Status` varchar(25) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Estimated_Delivery` varchar(50) NOT NULL,
  `Shipping_fee` varchar(150) NOT NULL,
  `Working_days` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`Supplier_ID`, `Supplier_Name`, `Contact_Name`, `Contact_Number`, `Status`, `Email`, `Address`, `Estimated_Delivery`, `Shipping_fee`, `Working_days`) VALUES
(2, 'MRS DIY', 'Do it yourself', '091238578', 'Inactive', 'mrsdiy@gmail.com', 'Nueva Ecija', '5 - 7 days', '25', 'Monday - Friday'),
(3, 'MR DIY', 'Don’t Inquire Yourself', '091235645', 'Active', 'mrdiy@gmail.com', 'Bataan', '12 - 23 days', '35', 'Sunday - Saturday'),
(4, 'Girlsen', 'Kate Ocampo', '099231845', 'Active', 'girlsen@gmail.com', 'Bulacan', '3 - 7 days', '55', 'Wednesday - Friday'),
(5, 'Edward Shop', 'Edward Santiago', '01395782', 'Active', 'boysin@gmail.com', 'Arayat', ' 2 - 4 days', '40', 'Saturday - Sunday'),
(6, 'Kobe Shop', 'Bryant', '01259634', 'Active', 'kobeshop@gmail.com', 'Mindanao', '12 - 24 days', '100', 'Monday - Thursday');

-- --------------------------------------------------------

--
-- Table structure for table `targetsales`
--

CREATE TABLE `targetsales` (
  `TargetID` int(11) NOT NULL,
  `MonthYear` date DEFAULT NULL,
  `TargetAmount` decimal(10,2) DEFAULT NULL,
  `EmployeeID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_info`
--

CREATE TABLE `tax_info` (
  `id` int(10) NOT NULL,
  `income_tax` decimal(10,2) NOT NULL,
  `withholding_tax` decimal(10,2) NOT NULL,
  `salary_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tax_info`
--

INSERT INTO `tax_info` (`id`, `income_tax`, `withholding_tax`, `salary_id`) VALUES
(1, 14833.33, 11875.13, 1),
(2, 5416.67, 4208.33, 2),
(3, 2916.67, 2208.33, 3),
(4, 1833.33, 1375.00, 4),
(5, 833.33, 625.00, 5),
(6, 0.00, 0.00, 6),
(7, 0.00, 0.00, 7),
(8, 5416.67, 4208.33, 8),
(9, 2916.67, 2208.33, 9),
(10, 5416.67, 4208.33, 10),
(11, 0.00, 0.00, 11),
(12, 0.00, 0.00, 12),
(13, 0.00, 0.00, 13),
(14, 0.00, 0.00, 14),
(15, 0.00, 0.00, 15),
(16, 0.00, 0.00, 16),
(17, 0.00, 0.00, 17),
(18, 0.00, 0.00, 18),
(19, 0.00, 0.00, 19),
(20, 0.00, 0.00, 20),
(21, 0.00, 0.00, 21),
(22, 0.00, 0.00, 22),
(23, 0.00, 0.00, 23),
(24, 0.00, 0.00, 24),
(25, 0.00, 0.00, 25),
(26, 0.00, 0.00, 26),
(27, 0.00, 0.00, 27),
(28, 0.00, 0.00, 28),
(29, 0.00, 0.00, 29);

-- --------------------------------------------------------

--
-- Table structure for table `transactiontype_de`
--

CREATE TABLE `transactiontype_de` (
  `XactTypeCode` varchar(2) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactiontype_de`
--

INSERT INTO `transactiontype_de` (`XactTypeCode`, `name`) VALUES
('Cr', 'Credit'),
('Dr', 'Debit');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `Transaction_ID` int(11) NOT NULL,
  `Batch_ID` int(11) NOT NULL,
  `Supplier_ID` int(11) NOT NULL,
  `Date_Delivered` date DEFAULT current_timestamp(),
  `Time_Delivered` time DEFAULT current_timestamp(),
  `Order_Status` varchar(50) DEFAULT NULL,
  `Feedback` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`Transaction_ID`, `Batch_ID`, `Supplier_ID`, `Date_Delivered`, `Time_Delivered`, `Order_Status`, `Feedback`) VALUES
(1, 1, 2, '2024-06-02', '12:34:09', 'Cancelled', NULL),
(2, 2, 2, '2024-06-02', '12:39:53', 'Completed + Delayed', 'Done'),
(3, 3, 2, '2024-06-02', '13:17:45', 'Completed', NULL),
(4, 4, 4, '2024-06-02', '17:54:10', 'Completed', NULL),
(5, 5, 4, '2024-06-02', '17:54:59', 'Completed', NULL),
(6, 6, 5, '2024-06-02', '17:55:31', 'Completed', NULL),
(7, 7, 6, '2024-06-02', '17:55:58', 'Completed', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trucks`
--

CREATE TABLE `trucks` (
  `TruckID` int(11) NOT NULL,
  `PlateNumber` varchar(20) DEFAULT NULL,
  `TruckType` enum('Light-Duty','Heavy-Duty') DEFAULT NULL,
  `Capacity` decimal(10,2) DEFAULT NULL,
  `TruckStatus` enum('Available','In Transit','Unavailable') DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trucks`
--

INSERT INTO `trucks` (`TruckID`, `PlateNumber`, `TruckType`, `Capacity`, `TruckStatus`) VALUES
(1, 'ALD123', 'Light-Duty', 4000.00, 'Available'),
(2, 'DUY234', 'Light-Duty', 4000.00, 'Unavailable'),
(3, 'VRR125', 'Light-Duty', 4000.00, 'Unavailable'),
(4, 'DJD233', 'Heavy-Duty', 20000.00, 'Unavailable'),
(5, 'PGD994', 'Heavy-Duty', 20000.00, 'Unavailable'),
(6, 'UHD535', 'Heavy-Duty', 20000.00, 'Unavailable');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounttype`
--
ALTER TABLE `accounttype`
  ADD PRIMARY KEY (`AccountType`),
  ADD KEY `grouptype` (`grouptype`),
  ADD KEY `XactTypeCode` (`XactTypeCode`);

--
-- Indexes for table `account_info`
--
ALTER TABLE `account_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `employees_id` (`employees_id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_id` (`employees_id`);

--
-- Indexes for table `audit_log`
--
ALTER TABLE `audit_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `batch_orders`
--
ALTER TABLE `batch_orders`
  ADD PRIMARY KEY (`Batch_ID`);

--
-- Indexes for table `benefit_info`
--
ALTER TABLE `benefit_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salary_id` (`salary_id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `deliveryorders`
--
ALTER TABLE `deliveryorders`
  ADD PRIMARY KEY (`DeliveryOrderID`),
  ADD KEY `SaleID` (`SaleID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `TruckID` (`TruckID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeetrucks`
--
ALTER TABLE `employeetrucks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `TruckID` (`TruckID`);

--
-- Indexes for table `employment_info`
--
ALTER TABLE `employment_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_id` (`employees_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_ID`);

--
-- Indexes for table `funds_transaction`
--
ALTER TABLE `funds_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lt_id` (`lt_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `grouptype`
--
ALTER TABLE `grouptype`
  ADD PRIMARY KEY (`grouptype`);

--
-- Indexes for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_id` (`employees_id`);

--
-- Indexes for table `ledger`
--
ALTER TABLE `ledger`
  ADD PRIMARY KEY (`ledgerno`),
  ADD KEY `AccountType` (`AccountType`);

--
-- Indexes for table `ledgertransaction`
--
ALTER TABLE `ledgertransaction`
  ADD PRIMARY KEY (`LedgerXactID`),
  ADD KEY `LedgerNo` (`LedgerNo`),
  ADD KEY `LedgerNo_Dr` (`LedgerNo_Dr`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_id` (`employees_id`),
  ADD KEY `salary_id` (`salary_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `Category_ID` (`Category_ID`);

--
-- Indexes for table `returnproducts`
--
ALTER TABLE `returnproducts`
  ADD PRIMARY KEY (`ReturnID`),
  ADD KEY `SaleID` (`SaleID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `salary_info`
--
ALTER TABLE `salary_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_id` (`employees_id`);

--
-- Indexes for table `saledetails`
--
ALTER TABLE `saledetails`
  ADD PRIMARY KEY (`SaleDetailID`),
  ADD KEY `SaleID` (`SaleID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`SaleID`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `account_info_id` (`account_info_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`Supplier_ID`);

--
-- Indexes for table `targetsales`
--
ALTER TABLE `targetsales`
  ADD PRIMARY KEY (`TargetID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indexes for table `tax_info`
--
ALTER TABLE `tax_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salary_id` (`salary_id`);

--
-- Indexes for table `transactiontype_de`
--
ALTER TABLE `transactiontype_de`
  ADD PRIMARY KEY (`XactTypeCode`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`Transaction_ID`);

--
-- Indexes for table `trucks`
--
ALTER TABLE `trucks`
  ADD PRIMARY KEY (`TruckID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounttype`
--
ALTER TABLE `accounttype`
  MODIFY `AccountType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `account_info`
--
ALTER TABLE `account_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `audit_log`
--
ALTER TABLE `audit_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1024;

--
-- AUTO_INCREMENT for table `batch_orders`
--
ALTER TABLE `batch_orders`
  MODIFY `Batch_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `benefit_info`
--
ALTER TABLE `benefit_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `deliveryorders`
--
ALTER TABLE `deliveryorders`
  MODIFY `DeliveryOrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `employeetrucks`
--
ALTER TABLE `employeetrucks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `employment_info`
--
ALTER TABLE `employment_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `funds_transaction`
--
ALTER TABLE `funds_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ledger`
--
ALTER TABLE `ledger`
  MODIFY `ledgerno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `ledgertransaction`
--
ALTER TABLE `ledgertransaction`
  MODIFY `LedgerXactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `returnproducts`
--
ALTER TABLE `returnproducts`
  MODIFY `ReturnID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_info`
--
ALTER TABLE `salary_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `saledetails`
--
ALTER TABLE `saledetails`
  MODIFY `SaleDetailID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SaleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `Supplier_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `targetsales`
--
ALTER TABLE `targetsales`
  MODIFY `TargetID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_info`
--
ALTER TABLE `tax_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `Transaction_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trucks`
--
ALTER TABLE `trucks`
  MODIFY `TruckID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounttype`
--
ALTER TABLE `accounttype`
  ADD CONSTRAINT `grptype` FOREIGN KEY (`grouptype`) REFERENCES `grouptype` (`grouptype`),
  ADD CONSTRAINT `xacttype` FOREIGN KEY (`XactTypeCode`) REFERENCES `transactiontype_de` (`XactTypeCode`);

--
-- Constraints for table `account_info`
--
ALTER TABLE `account_info`
  ADD CONSTRAINT `account_info_ibfk_1` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `audit_log`
--
ALTER TABLE `audit_log`
  ADD CONSTRAINT `audit_log_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account_info` (`id`);

--
-- Constraints for table `benefit_info`
--
ALTER TABLE `benefit_info`
  ADD CONSTRAINT `benefit_info_ibfk_1` FOREIGN KEY (`salary_id`) REFERENCES `salary_info` (`id`);

--
-- Constraints for table `deliveryorders`
--
ALTER TABLE `deliveryorders`
  ADD CONSTRAINT `deliveryorders_ibfk_1` FOREIGN KEY (`SaleID`) REFERENCES `sales` (`SaleID`),
  ADD CONSTRAINT `deliveryorders_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`),
  ADD CONSTRAINT `deliveryorders_ibfk_3` FOREIGN KEY (`TruckID`) REFERENCES `trucks` (`TruckID`);

--
-- Constraints for table `employeetrucks`
--
ALTER TABLE `employeetrucks`
  ADD CONSTRAINT `employeetrucks_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `employeetrucks_ibfk_2` FOREIGN KEY (`TruckID`) REFERENCES `trucks` (`TruckID`);

--
-- Constraints for table `employment_info`
--
ALTER TABLE `employment_info`
  ADD CONSTRAINT `employment_info_ibfk_1` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `funds_transaction`
--
ALTER TABLE `funds_transaction`
  ADD CONSTRAINT `funds_transaction_ibfk_1` FOREIGN KEY (`lt_id`) REFERENCES `ledgertransaction` (`LedgerXactID`),
  ADD CONSTRAINT `funds_transaction_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD CONSTRAINT `leave_requests_ibfk_1` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `ledger`
--
ALTER TABLE `ledger`
  ADD CONSTRAINT `acctype` FOREIGN KEY (`AccountType`) REFERENCES `accounttype` (`AccountType`);

--
-- Constraints for table `ledgertransaction`
--
ALTER TABLE `ledgertransaction`
  ADD CONSTRAINT `creditLedger` FOREIGN KEY (`LedgerNo`) REFERENCES `ledger` (`ledgerno`),
  ADD CONSTRAINT `debitLedger` FOREIGN KEY (`LedgerNo_Dr`) REFERENCES `ledger` (`ledgerno`);

--
-- Constraints for table `payroll`
--
ALTER TABLE `payroll`
  ADD CONSTRAINT `payroll_ibfk_1` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `payroll_ibfk_2` FOREIGN KEY (`salary_id`) REFERENCES `salary_info` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`Category_ID`) REFERENCES `categories` (`Category_ID`);

--
-- Constraints for table `returnproducts`
--
ALTER TABLE `returnproducts`
  ADD CONSTRAINT `returnproducts_ibfk_1` FOREIGN KEY (`SaleID`) REFERENCES `sales` (`SaleID`),
  ADD CONSTRAINT `returnproducts_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `salary_info`
--
ALTER TABLE `salary_info`
  ADD CONSTRAINT `salary_info_ibfk_1` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `saledetails`
--
ALTER TABLE `saledetails`
  ADD CONSTRAINT `saledetails_ibfk_1` FOREIGN KEY (`SaleID`) REFERENCES `sales` (`SaleID`),
  ADD CONSTRAINT `saledetails_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`);

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`account_info_id`) REFERENCES `account_info` (`id`);

--
-- Constraints for table `targetsales`
--
ALTER TABLE `targetsales`
  ADD CONSTRAINT `targetsales_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`id`);

--
-- Constraints for table `tax_info`
--
ALTER TABLE `tax_info`
  ADD CONSTRAINT `tax_info_ibfk_1` FOREIGN KEY (`salary_id`) REFERENCES `salary_info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
