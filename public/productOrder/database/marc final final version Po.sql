-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 06:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
CREATE DATABASE IF NOT EXISTS `bscs3a` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bscs3a`;

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
  `role` enum('Product Order','Human Resources','Point of Sales','Inventory','Finance','Delivery') NOT NULL,
  `employees_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_info`
--

INSERT INTO `account_info` (`id`, `username`, `password`, `role`, `employees_id`) VALUES
(1, '123', '$2y$10$8K/6vCFaTj0H6q.qpAnpCOq1X4HxVSHEs7hdgaxd6vn1X8Abu6x1u', 'Point of Sales', 1),
(2, 'bscs3a001', 'bscs3a1HR', 'Human Resources', 1),
(3, 'bscs3a002', 'bscs3a2HR', 'Human Resources', 2),
(4, 'bscs3a003', 'bscs3a3HR', 'Human Resources', 3),
(5, 'bscs3a004', 'bscs3a4HR', 'Human Resources', 4),
(6, 'bscs3a005', 'bscs3a5HR', 'Human Resources', 5),
(7, 'bscs3a006', '$2y$10$8K/6vCFaTj0H6q.qpAnpCOq1X4HxVSHEs7hdgaxd6vn1X8Abu6x1u', 'Product Order', 6);

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
(1, '2024-06-01', '22:59:53', '22:59:57', 6),
(2, '2024-06-02', '10:09:52', NULL, 6);

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
(1, 1, '2024-05-31 09:21:44', 'POST: /sales/addSales'),
(2, 1, '2024-05-31 09:46:49', 'GET: /sales/sls/Audit-Logs/page=1'),
(3, 1, '2024-05-31 09:47:18', 'GET: /sales/sls/Audit-Logs/page=1'),
(4, 1, '2024-05-31 09:47:24', 'GET: /sales/sls/Audit-Logs/page=1'),
(5, 1, '2024-05-31 09:47:32', 'GET: /sales/sls/Audit-Logs/page=1'),
(6, 1, '2024-05-31 09:47:42', 'GET: /sales/sls/Audit-Logs/page=1'),
(7, 1, '2024-05-31 09:48:03', 'POST: /sales/logout'),
(8, 1, '2024-05-31 09:48:10', 'POST: /sales/login'),
(9, 1, '2024-05-31 09:48:15', 'GET: /sales/sls/Audit-Logs/page=1'),
(10, 1, '2024-05-31 09:48:44', 'POST: /sales/addSales'),
(11, 1, '2024-05-31 09:52:52', 'POST: /sales/addSales'),
(12, 1, '2024-05-31 09:52:57', 'GET: /sales/sls/Audit-Logs/page=1'),
(13, 1, '2024-05-31 10:17:24', 'GET: /sales/sls/funds/Sales/page=1'),
(14, 1, '2024-05-31 10:17:32', 'GET: /sales/sls/Transaction-Details/sale=28'),
(15, 1, '2024-05-31 10:17:37', 'GET: /sales/sls/ReturnProduct/sale=28/saledetails=1/product=3'),
(16, 1, '2024-05-31 10:17:41', 'POST: /sales/returnProduct'),
(17, 1, '2024-05-31 10:29:15', 'POST: /sales/AddTarget'),
(18, 1, '2024-05-31 10:29:53', 'GET: /sales/sls/Audit-Logs/page=1'),
(19, 1, '2024-05-31 10:30:00', 'GET: /sales/sls/funds/Sales/page=1'),
(20, 1, '2024-05-31 10:30:11', 'GET: /sales/sls/Audit-Logs/page=1'),
(21, 1, '2024-05-31 10:30:28', 'GET: /sales/sls/Audit-Logs/page=2'),
(22, 1, '2024-05-31 10:30:32', 'GET: /sales/sls/Audit-Logs/page=1'),
(23, 1, '2024-05-31 10:30:44', 'POST: /sales/auditlogSearch'),
(24, 1, '2024-05-31 10:30:50', 'GET: /sales/sls/Audit-Logs/page=1'),
(25, 1, '2024-05-31 10:30:58', 'POST: /sales/auditlogSearch'),
(26, 1, '2024-05-31 10:31:53', 'POST: /sales/logout'),
(27, 1, '2024-05-31 10:32:53', 'POST: /sales/login'),
(28, 1, '2024-05-31 10:32:59', 'GET: /sales/sls/Transaction-Details/sale=30'),
(29, 1, '2024-05-31 10:33:02', 'GET: /sales/sls/ReturnProduct/sale=30/saledetails=4/product=1'),
(30, 1, '2024-05-31 10:33:10', 'POST: /sales/returnProduct'),
(31, 1, '2024-05-31 10:33:17', 'GET: /sales/sls/funds/Sales/page=1'),
(32, 7, '2024-06-01 05:20:59', 'POST: /master/login'),
(33, 7, '2024-06-01 05:24:35', 'POST: /master/login'),
(34, 7, '2024-06-01 05:25:17', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(35, 7, '2024-06-01 05:25:52', 'POST: /master/placeorder/supplier/'),
(36, 7, '2024-06-01 05:26:02', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(37, 7, '2024-06-01 05:27:23', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(38, 7, '2024-06-01 05:27:56', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(39, 7, '2024-06-01 05:28:02', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(40, 7, '2024-06-01 05:28:05', 'GET: /master/po/suppliers'),
(41, 7, '2024-06-01 05:28:06', 'GET: /master/po/transactionHistory'),
(42, 7, '2024-06-01 05:28:07', 'GET: /master/po/dashboard'),
(43, 7, '2024-06-01 05:28:08', 'GET: /master/po/orderDetail'),
(44, 7, '2024-06-01 05:28:08', 'GET: /master/po/transactionHistory'),
(45, 7, '2024-06-01 05:28:09', 'GET: /master/po/pondo'),
(46, 7, '2024-06-01 05:28:10', 'GET: /master/po/orderDetail'),
(47, 7, '2024-06-01 05:28:11', 'GET: /master/po/suppliers'),
(48, 7, '2024-06-01 05:28:14', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(49, 7, '2024-06-01 05:28:20', 'GET: /master/po/suppliers'),
(50, 7, '2024-06-01 05:28:21', 'GET: /master/po/orderDetail'),
(51, 7, '2024-06-01 05:28:22', 'GET: /master/po/transactionHistory'),
(52, 7, '2024-06-01 05:28:22', 'GET: /master/po/pondo'),
(53, 7, '2024-06-01 05:28:22', 'GET: /master/po/suppliers'),
(54, 7, '2024-06-01 05:28:23', 'GET: /master/po/dashboard'),
(55, 7, '2024-06-01 05:28:24', 'GET: /master/po/suppliers'),
(56, 7, '2024-06-01 05:28:36', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(57, 7, '2024-06-01 05:28:53', 'GET: /master/po/suppliers'),
(58, 7, '2024-06-01 05:28:53', 'GET: /master/po/pondo'),
(59, 7, '2024-06-01 05:29:00', 'GET: /master/po/dashboard'),
(60, 7, '2024-06-01 05:29:01', 'GET: /master/po/orderDetail'),
(61, 7, '2024-06-01 05:29:02', 'GET: /master/po/suppliers'),
(62, 7, '2024-06-01 05:29:03', 'GET: /master/po/transactionHistory'),
(63, 7, '2024-06-01 05:29:04', 'GET: /master/po/orderDetail'),
(64, 7, '2024-06-01 05:29:04', 'GET: /master/po/transactionHistory'),
(65, 7, '2024-06-01 05:29:05', 'GET: /master/po/orderDetail'),
(66, 7, '2024-06-01 05:29:05', 'GET: /master/po/suppliers'),
(67, 7, '2024-06-01 05:29:06', 'GET: /master/po/orderDetail'),
(68, 7, '2024-06-01 05:29:07', 'GET: /master/po/transactionHistory'),
(69, 7, '2024-06-01 05:29:07', 'GET: /master/po/orderDetail'),
(70, 7, '2024-06-01 05:29:08', 'GET: /master/po/dashboard'),
(71, 7, '2024-06-01 05:29:09', 'GET: /master/po/dashboard'),
(72, 7, '2024-06-01 05:29:09', 'GET: /master/po/suppliers'),
(73, 7, '2024-06-01 05:29:10', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(74, 7, '2024-06-01 05:29:30', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(75, 7, '2024-06-01 05:29:33', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(76, 7, '2024-06-01 05:29:59', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(77, 7, '2024-06-01 05:30:03', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(78, 7, '2024-06-01 05:30:07', 'GET: /master/po/suppliers'),
(79, 7, '2024-06-01 05:30:08', 'GET: /master/po/suppliers'),
(80, 7, '2024-06-01 05:30:09', 'GET: /master/po/dashboard'),
(81, 7, '2024-06-01 05:30:09', 'GET: /master/po/orderDetail'),
(82, 7, '2024-06-01 05:30:09', 'GET: /master/po/transactionHistory'),
(83, 7, '2024-06-01 05:30:10', 'GET: /master/po/pondo'),
(84, 7, '2024-06-01 05:30:10', 'GET: /master/po/suppliers'),
(85, 7, '2024-06-01 05:30:11', 'GET: /master/po/dashboard'),
(86, 7, '2024-06-01 05:30:19', 'GET: /master/po/orderDetail'),
(87, 7, '2024-06-01 05:30:19', 'GET: /master/po/suppliers'),
(88, 7, '2024-06-01 05:30:21', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(89, 7, '2024-06-01 05:31:11', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(90, 7, '2024-06-01 05:32:46', 'GET: /master/po/suppliers'),
(91, 7, '2024-06-01 05:32:47', 'GET: /master/po/pondo'),
(92, 7, '2024-06-01 05:33:53', 'GET: /master/po/pondo'),
(93, 7, '2024-06-01 05:33:53', 'GET: /master/po/dashboard'),
(94, 7, '2024-06-01 05:33:54', 'GET: /master/po/orderDetail'),
(95, 7, '2024-06-01 05:33:54', 'GET: /master/po/suppliers'),
(96, 7, '2024-06-01 05:33:55', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(97, 7, '2024-06-01 05:33:56', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(98, 7, '2024-06-01 05:34:57', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(99, 7, '2024-06-01 05:34:57', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(100, 7, '2024-06-01 05:34:57', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(101, 7, '2024-06-01 05:38:22', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(102, 7, '2024-06-01 05:40:01', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(103, 7, '2024-06-01 05:41:00', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(104, 7, '2024-06-01 05:41:00', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(105, 7, '2024-06-01 05:41:01', 'POST: /master/placeorder/supplier/'),
(106, 7, '2024-06-01 05:41:02', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(107, 7, '2024-06-01 05:44:17', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(108, 7, '2024-06-01 05:49:05', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(109, 7, '2024-06-01 05:52:03', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(110, 7, '2024-06-01 05:52:03', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(111, 7, '2024-06-01 05:57:55', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(112, 7, '2024-06-01 05:58:30', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(113, 7, '2024-06-01 05:59:15', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(114, 7, '2024-06-01 05:59:19', 'GET: /master/po/suppliers'),
(115, 7, '2024-06-01 05:59:20', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(116, 7, '2024-06-01 05:59:26', 'POST: /master/master/placeorder/supplier/'),
(117, 7, '2024-06-01 05:59:26', 'GET: /master/po/orderDetail'),
(118, 7, '2024-06-01 05:59:28', 'GET: /master/po/viewdetails/Batch=2'),
(119, 7, '2024-06-01 05:59:40', 'GET: /master/po/orderDetail'),
(120, 7, '2024-06-01 05:59:41', 'GET: /master/po/pondo'),
(121, 7, '2024-06-01 05:59:42', 'GET: /master/po/pondo'),
(122, 7, '2024-06-01 05:59:42', 'GET: /master/po/pondo'),
(123, 7, '2024-06-01 05:59:42', 'GET: /master/po/pondo'),
(124, 7, '2024-06-01 05:59:49', 'GET: /master/po/dashboard'),
(125, 7, '2024-06-01 06:02:01', 'GET: /master/po/dashboard'),
(126, 7, '2024-06-01 06:02:02', 'GET: /master/po/suppliers'),
(127, 7, '2024-06-01 06:02:02', 'GET: /master/po/pondo'),
(128, 7, '2024-06-01 06:02:03', 'GET: /master/po/pondo'),
(129, 7, '2024-06-01 06:02:04', 'GET: /master/po/orderDetail'),
(130, 7, '2024-06-01 06:02:04', 'GET: /master/po/dashboard'),
(131, 7, '2024-06-01 06:02:05', 'GET: /master/po/suppliers'),
(132, 7, '2024-06-01 06:02:05', 'GET: /master/po/suppliers'),
(133, 7, '2024-06-01 06:02:07', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(134, 7, '2024-06-01 06:02:15', 'GET: /master/po/suppliers'),
(135, 7, '2024-06-01 06:02:16', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(136, 7, '2024-06-01 06:02:27', 'POST: /master/master/placeorder/supplier/'),
(137, 7, '2024-06-01 06:03:26', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(138, 7, '2024-06-01 06:03:27', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(139, 7, '2024-06-01 06:03:28', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(140, 7, '2024-06-01 06:03:28', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(141, 7, '2024-06-01 06:03:37', 'POST: /master/master/placeorder/supplier/'),
(142, 7, '2024-06-01 06:03:45', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(143, 7, '2024-06-01 06:03:46', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(144, 7, '2024-06-01 06:04:27', 'POST: /master/master/placeorder/supplier/'),
(145, 7, '2024-06-01 06:04:29', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(146, 7, '2024-06-01 06:07:02', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(147, 7, '2024-06-01 06:07:13', 'GET: /master/po/suppliers'),
(148, 7, '2024-06-01 06:07:14', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(149, 7, '2024-06-01 06:08:07', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(150, 7, '2024-06-01 06:08:07', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(151, 7, '2024-06-01 06:08:07', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(152, 7, '2024-06-01 06:08:12', 'POST: /master/master/placeorder/supplier/'),
(153, 7, '2024-06-01 06:08:17', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(154, 7, '2024-06-01 06:08:28', 'POST: /master/master/placeorder/supplier/'),
(155, 7, '2024-06-01 06:08:30', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(156, 7, '2024-06-01 06:08:40', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(157, 7, '2024-06-01 06:09:02', 'GET: /master/po/pondo'),
(158, 7, '2024-06-01 06:09:03', 'GET: /master/po/pondo'),
(159, 7, '2024-06-01 06:10:46', 'GET: /master/po/pondo'),
(160, 7, '2024-06-01 06:10:53', 'GET: /master/po/dashboard'),
(161, 7, '2024-06-01 06:10:56', 'GET: /master/po/suppliers'),
(162, 7, '2024-06-01 06:10:57', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(163, 7, '2024-06-01 06:11:02', 'POST: /master/master/placeorder/supplier/'),
(164, 7, '2024-06-01 06:11:02', 'GET: /master/po/orderDetail'),
(165, 7, '2024-06-01 06:11:05', 'GET: /master/po/pondo'),
(166, 7, '2024-06-01 06:11:20', 'GET: /master/po/dashboard'),
(167, 7, '2024-06-01 06:11:21', 'GET: /master/po/transactionHistory'),
(168, 7, '2024-06-01 06:11:21', 'GET: /master/po/orderDetail'),
(169, 7, '2024-06-01 06:11:22', 'GET: /master/po/suppliers'),
(170, 7, '2024-06-01 06:11:23', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(171, 7, '2024-06-01 06:11:28', 'GET: /master/po/pondo'),
(172, 7, '2024-06-01 06:11:30', 'GET: /master/po/dashboard'),
(173, 7, '2024-06-01 06:12:43', 'GET: /master/po/suppliers'),
(174, 7, '2024-06-01 06:12:44', 'GET: /master/po/orderDetail'),
(175, 7, '2024-06-01 06:12:44', 'GET: /master/po/orderDetail'),
(176, 7, '2024-06-01 06:12:44', 'GET: /master/po/orderDetail'),
(177, 7, '2024-06-01 06:12:44', 'GET: /master/po/suppliers'),
(178, 7, '2024-06-01 06:12:44', 'GET: /master/po/suppliers'),
(179, 7, '2024-06-01 06:12:45', 'GET: /master/po/suppliers'),
(180, 7, '2024-06-01 06:12:45', 'GET: /master/po/suppliers'),
(181, 7, '2024-06-01 06:12:45', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(182, 7, '2024-06-01 06:12:51', 'POST: /master/placeorder/supplier/'),
(183, 7, '2024-06-01 06:12:56', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(184, 7, '2024-06-01 06:12:59', 'POST: /master/placeorder/supplier/'),
(185, 7, '2024-06-01 06:12:59', 'GET: /master/po/orderDetail'),
(186, 7, '2024-06-01 06:13:29', 'GET: /master/po/viewdetails/Batch=2'),
(187, 7, '2024-06-01 06:13:30', 'GET: /master/po/orderDetail'),
(188, 7, '2024-06-01 06:13:49', 'POST: /master/master/cancel/orderDetail'),
(189, 7, '2024-06-01 06:13:49', 'GET: /master/po/orderDetail'),
(190, 7, '2024-06-01 06:13:50', 'GET: /master/po/transactionHistory'),
(191, 7, '2024-06-01 06:13:52', 'GET: /master/po/viewtransaction/Batch=2'),
(192, 7, '2024-06-01 06:13:54', 'GET: /master/po/transactionHistory'),
(193, 7, '2024-06-01 06:14:13', 'GET: /master/po/suppliers'),
(194, 7, '2024-06-01 06:14:14', 'GET: /master/po/orderDetail'),
(195, 7, '2024-06-01 06:14:40', 'GET: /master/po/orderDetail'),
(196, 7, '2024-06-01 06:14:41', 'GET: /master/po/orderDetail'),
(197, 7, '2024-06-01 06:14:41', 'GET: /master/po/suppliers'),
(198, 7, '2024-06-01 06:14:43', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(199, 7, '2024-06-01 06:14:49', 'GET: /master/po/suppliers'),
(200, 7, '2024-06-01 06:16:10', 'GET: /master/po/orderDetail'),
(201, 7, '2024-06-01 06:17:25', 'GET: /master/po/orderDetail'),
(202, 7, '2024-06-01 06:18:43', 'GET: /master/po/viewdetails/Batch=3'),
(203, 7, '2024-06-01 06:18:47', 'GET: /master/po/orderDetail'),
(204, 7, '2024-06-01 06:19:24', 'GET: /master/po/viewdetails/Batch=3'),
(205, 7, '2024-06-01 06:19:27', 'GET: /master/po/orderDetail'),
(206, 7, '2024-06-01 06:19:28', 'GET: /master/po/viewdetails/Batch=4'),
(207, 7, '2024-06-01 06:19:33', 'GET: /master/po/orderDetail'),
(208, 7, '2024-06-01 06:19:34', 'GET: /master/po/viewdetails/Batch=3'),
(209, 7, '2024-06-01 06:23:19', 'GET: /master/po/orderDetail'),
(210, 7, '2024-06-01 06:23:20', 'GET: /master/po/orderDetail'),
(211, 7, '2024-06-01 06:23:20', 'GET: /master/po/suppliers'),
(212, 7, '2024-06-01 06:23:20', 'GET: /master/po/suppliers'),
(213, 7, '2024-06-01 06:23:21', 'GET: /master/po/suppliers'),
(214, 7, '2024-06-01 06:23:22', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(215, 7, '2024-06-01 06:23:26', 'GET: /master/po/suppliers'),
(216, 7, '2024-06-01 06:23:47', 'GET: /master/po/viewsupplier/Supplier=3'),
(217, 7, '2024-06-01 06:23:48', 'GET: /master/po/suppliers'),
(218, 7, '2024-06-01 06:23:49', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(219, 7, '2024-06-01 06:23:52', 'POST: /master/placeorder/supplier/'),
(220, 7, '2024-06-01 06:23:52', 'GET: /master/po/orderDetail'),
(221, 7, '2024-06-01 06:23:53', 'GET: /master/po/orderDetail'),
(222, 7, '2024-06-01 06:25:37', 'GET: /master/po/audit_logs'),
(223, 7, '2024-06-01 06:25:59', 'GET: /master/po/audit_logs'),
(224, 7, '2024-06-01 06:26:04', 'GET: /master/po/audit_logs'),
(225, 7, '2024-06-01 06:26:22', 'GET: /master/po/audit_logs'),
(226, 7, '2024-06-01 06:26:23', 'GET: /master/po/audit_logs'),
(227, 7, '2024-06-01 06:26:23', 'GET: /master/po/audit_logs'),
(228, 7, '2024-06-01 06:26:32', 'GET: /master/po/audit_logs'),
(229, 7, '2024-06-01 06:26:38', 'GET: /master/po/audit_logs'),
(230, 7, '2024-06-01 06:27:11', 'GET: /master/po/audit_logs'),
(231, 7, '2024-06-01 06:27:12', 'GET: /master/po/orderDetail'),
(232, 7, '2024-06-01 06:27:13', 'GET: /master/po/orderDetail'),
(233, 7, '2024-06-01 06:27:13', 'GET: /master/po/orderDetail'),
(234, 7, '2024-06-01 06:27:43', 'GET: /master/po/orderDetail'),
(235, 7, '2024-06-01 06:27:44', 'GET: /master/po/pondo'),
(236, 7, '2024-06-01 06:27:45', 'GET: /master/po/audit_logs'),
(237, 7, '2024-06-01 06:27:47', 'GET: /master/po/pondo'),
(238, 7, '2024-06-01 06:27:48', 'GET: /master/po/dashboard'),
(239, 7, '2024-06-01 06:27:49', 'GET: /master/po/audit_logs'),
(240, 7, '2024-06-01 06:28:00', 'GET: /master/po/audit_logs'),
(241, 7, '2024-06-01 06:28:09', 'GET: /master/po/dashboard'),
(242, 7, '2024-06-01 06:28:11', 'GET: /master/po/audit_logs'),
(243, 7, '2024-06-01 06:30:00', 'GET: /master/po/dashboard'),
(244, 7, '2024-06-01 06:30:01', 'GET: /master/po/audit_logs/page=1'),
(245, 7, '2024-06-01 06:30:07', 'GET: /master/po/audit_logs/page=1'),
(246, 7, '2024-06-01 06:30:33', 'GET: /master/po/audit_logs/page=1'),
(247, 7, '2024-06-01 06:30:36', 'GET: /master/po/audit_logs/page=1'),
(248, 7, '2024-06-01 06:30:57', 'GET: /master/po/audit_logs/page=1'),
(249, 7, '2024-06-01 06:31:38', 'GET: /master/po/audit_logs/page=1'),
(250, 7, '2024-06-01 06:31:39', 'GET: /master/po/suppliers'),
(251, 7, '2024-06-01 06:31:39', 'GET: /master/po/dashboard'),
(252, 7, '2024-06-01 06:31:40', 'GET: /master/po/pondo'),
(253, 7, '2024-06-01 06:31:41', 'GET: /master/po/audit_logs/page=1'),
(254, 7, '2024-06-01 06:31:47', 'GET: /master/po/dashboard'),
(255, 7, '2024-06-01 06:32:27', 'GET: /master/po/dashboard'),
(256, 7, '2024-06-01 06:33:01', 'GET: /master/po/suppliers'),
(257, 7, '2024-06-01 06:33:02', 'GET: /master/po/audit_logs/page=1'),
(258, 7, '2024-06-01 06:33:16', 'GET: /master/po/transactionHistory'),
(259, 7, '2024-06-01 06:33:18', 'GET: /master/po/audit_logs/page=1'),
(260, 7, '2024-06-01 06:33:28', 'GET: /master/po/suppliers'),
(261, 7, '2024-06-01 06:33:29', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(262, 7, '2024-06-01 06:33:31', 'GET: /master/po/suppliers'),
(263, 7, '2024-06-01 06:33:31', 'GET: /master/po/suppliers'),
(264, 7, '2024-06-01 06:33:31', 'GET: /master/po/orderDetail'),
(265, 7, '2024-06-01 06:33:32', 'GET: /master/po/suppliers'),
(266, 7, '2024-06-01 06:33:32', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(267, 7, '2024-06-01 06:33:34', 'GET: /master/po/transactionHistory'),
(268, 7, '2024-06-01 06:33:35', 'GET: /master/po/pondo'),
(269, 7, '2024-06-01 06:33:36', 'GET: /master/po/dashboard'),
(270, 7, '2024-06-01 06:33:37', 'GET: /master/po/orderDetail'),
(271, 7, '2024-06-01 06:33:38', 'GET: /master/po/transactionHistory'),
(272, 7, '2024-06-01 06:33:38', 'GET: /master/po/pondo'),
(273, 7, '2024-06-01 06:33:39', 'GET: /master/po/orderDetail'),
(274, 7, '2024-06-01 06:33:39', 'GET: /master/po/orderDetail'),
(275, 7, '2024-06-01 06:33:40', 'GET: /master/po/transactionHistory'),
(276, 7, '2024-06-01 06:33:40', 'GET: /master/po/pondo'),
(277, 7, '2024-06-01 06:33:47', 'GET: /master/po/audit_logs/page=1'),
(278, 7, '2024-06-01 06:33:50', 'GET: /master/po/dashboard'),
(279, 7, '2024-06-01 06:33:51', 'GET: /master/po/audit_logs/page=1'),
(280, 7, '2024-06-01 06:33:53', 'GET: /master/po/suppliers'),
(281, 7, '2024-06-01 06:33:58', 'GET: /master/po/suppliers'),
(282, 7, '2024-06-01 06:33:59', 'GET: /master/po/dashboard'),
(283, 7, '2024-06-01 06:33:59', 'GET: /master/po/orderDetail'),
(284, 7, '2024-06-01 06:34:00', 'GET: /master/po/transactionHistory'),
(285, 7, '2024-06-01 06:34:01', 'GET: /master/po/pondo'),
(286, 7, '2024-06-01 06:34:18', 'GET: /master/po/pondo'),
(287, 7, '2024-06-01 06:34:20', 'GET: /master/po/audit_logs/page=1'),
(288, 7, '2024-06-01 06:34:24', 'GET: /master/po/dashboard'),
(289, 7, '2024-06-01 06:34:44', 'GET: /master/po/audit_logs/page=1'),
(290, 7, '2024-06-01 06:34:46', 'GET: /master/po/dashboard'),
(291, 7, '2024-06-01 06:34:48', 'GET: /master/po/audit_logs/page=1'),
(292, 7, '2024-06-01 06:34:49', 'GET: /master/po/dashboard'),
(293, 7, '2024-06-01 06:34:51', 'GET: /master/po/dashboard'),
(294, 7, '2024-06-01 06:34:52', 'GET: /master/po/audit_logs/page=1'),
(295, 7, '2024-06-01 06:34:53', 'GET: /master/po/dashboard'),
(296, 7, '2024-06-01 06:35:17', 'GET: /master/po/dashboard'),
(297, 7, '2024-06-01 06:35:19', 'GET: /master/po/audit_logs/page=1'),
(298, 7, '2024-06-01 06:35:23', 'GET: /master/po/audit_logs/page=1'),
(299, 7, '2024-06-01 06:35:27', 'GET: /master/po/audit_logs/page=1'),
(300, 7, '2024-06-01 06:35:28', 'GET: /master/po/audit_logs/page=1'),
(301, 7, '2024-06-01 06:35:30', 'GET: /master/po/audit_logs/page=1'),
(302, 7, '2024-06-01 06:35:50', 'GET: /master/po/audit_logs/page=1'),
(303, 7, '2024-06-01 06:35:57', 'GET: /master/po/audit_logs/page=1'),
(304, 7, '2024-06-01 06:35:58', 'GET: /master/po/audit_logs/page=1'),
(305, 7, '2024-06-01 06:36:38', 'GET: /master/po/audit_logs/page=1'),
(306, 7, '2024-06-01 06:36:39', 'GET: /master/po/pondo'),
(307, 7, '2024-06-01 06:36:40', 'GET: /master/po/suppliers'),
(308, 7, '2024-06-01 06:36:40', 'GET: /master/po/audit_logs/page=1'),
(309, 7, '2024-06-01 06:36:41', 'GET: /master/po/orderDetail'),
(310, 7, '2024-06-01 06:36:42', 'GET: /master/po/transactionHistory'),
(311, 7, '2024-06-01 06:36:42', 'GET: /master/po/orderDetail'),
(312, 7, '2024-06-01 06:36:44', 'GET: /master/po/transactionHistory'),
(313, 7, '2024-06-01 06:36:45', 'GET: /master/po/audit_logs/page=1'),
(314, 7, '2024-06-01 06:39:40', 'GET: /master/po/dashboard'),
(315, 7, '2024-06-01 06:39:42', 'GET: /master/po/dashboard'),
(316, 7, '2024-06-01 06:39:43', 'GET: /master/po/audit_logs/page=1'),
(317, 7, '2024-06-01 06:39:44', 'GET: /master/po/audit_logs/page=1'),
(318, 7, '2024-06-01 06:39:44', 'GET: /master/po/suppliers'),
(319, 7, '2024-06-01 06:40:52', 'GET: /master/po/dashboard'),
(320, 7, '2024-06-01 06:40:54', 'GET: /master/po/audit_logs/page=1'),
(321, 7, '2024-06-01 06:41:25', 'GET: /master/po/dashboard'),
(322, 7, '2024-06-01 06:41:42', 'GET: /master/po/dashboard'),
(323, 7, '2024-06-01 06:42:13', 'GET: /master/po/dashboard'),
(324, 7, '2024-06-01 06:42:14', 'GET: /master/po/dashboard'),
(325, 7, '2024-06-01 06:42:16', 'GET: /master/po/dashboard'),
(326, 7, '2024-06-01 06:42:17', 'GET: /master/po/audit_logs/page=1'),
(327, 7, '2024-06-01 06:42:19', 'GET: /master/po/suppliers'),
(328, 7, '2024-06-01 06:42:19', 'GET: /master/po/audit_logs/page=1'),
(329, 7, '2024-06-01 06:43:10', 'GET: /master/po/audit_logs/page=1'),
(330, 7, '2024-06-01 06:43:11', 'GET: /master/po/suppliers'),
(331, 7, '2024-06-01 06:43:12', 'GET: /master/po/audit_logs/page=1'),
(332, 7, '2024-06-01 06:43:12', 'GET: /master/po/audit_logs/page=1'),
(333, 7, '2024-06-01 06:43:14', 'GET: /master/po/audit_logs/page=1'),
(334, 7, '2024-06-01 06:43:14', 'GET: /master/po/suppliers'),
(335, 7, '2024-06-01 06:43:15', 'GET: /master/po/orderDetail'),
(336, 7, '2024-06-01 06:43:16', 'GET: /master/po/transactionHistory'),
(337, 7, '2024-06-01 06:43:16', 'GET: /master/po/pondo'),
(338, 7, '2024-06-01 06:43:17', 'GET: /master/po/audit_logs/page=1'),
(339, 7, '2024-06-01 06:43:22', 'GET: /master/po/audit_logs/page=1'),
(340, 7, '2024-06-01 06:43:22', 'GET: /master/po/orderDetail'),
(341, 7, '2024-06-01 06:43:23', 'GET: /master/po/transactionHistory'),
(342, 7, '2024-06-01 06:43:23', 'GET: /master/po/orderDetail'),
(343, 7, '2024-06-01 06:43:24', 'GET: /master/po/audit_logs/page=1'),
(344, 7, '2024-06-01 06:43:25', 'GET: /master/po/suppliers'),
(345, 7, '2024-06-01 06:43:35', 'GET: /master/po/audit_logs/page=1'),
(346, 7, '2024-06-01 06:43:45', 'GET: /master/po/audit_logs/page=1'),
(347, 7, '2024-06-01 06:44:32', 'GET: /master/po/audit_logs/page=1'),
(348, 7, '2024-06-01 06:44:33', 'GET: /master/po/audit_logs/page=1'),
(349, 7, '2024-06-01 06:44:35', 'GET: /master/po/audit_logs/page=1'),
(350, 7, '2024-06-01 06:44:39', 'GET: /master/po/audit_logs/page=1'),
(351, 7, '2024-06-01 06:44:54', 'GET: /master/po/audit_logs/page=1'),
(352, 7, '2024-06-01 06:44:55', 'GET: /master/po/audit_logs/page=2'),
(353, 7, '2024-06-01 06:44:58', 'GET: /master/po/audit_logs/page=3'),
(354, 7, '2024-06-01 06:44:59', 'GET: /master/po/transactionHistory'),
(355, 7, '2024-06-01 06:44:59', 'GET: /master/po/pondo'),
(356, 7, '2024-06-01 06:45:01', 'GET: /master/po/pondo/page=1'),
(357, 7, '2024-06-01 06:45:03', 'GET: /master/po/pondo'),
(358, 7, '2024-06-01 06:45:12', 'GET: /master/po/pondo'),
(359, 7, '2024-06-01 06:45:12', 'GET: /master/po/pondo'),
(360, 7, '2024-06-01 06:45:13', 'GET: /master/po/transactionHistory'),
(361, 7, '2024-06-01 06:45:13', 'GET: /master/po/pondo'),
(362, 7, '2024-06-01 06:45:16', 'GET: /master/po/pondo'),
(363, 7, '2024-06-01 06:45:29', 'GET: /master/po/pondo'),
(364, 7, '2024-06-01 06:45:29', 'GET: /master/po/audit_logs/page=1'),
(365, 7, '2024-06-01 06:45:30', 'GET: /master/po/pondo/page=1'),
(366, 7, '2024-06-01 06:45:31', 'GET: /master/po/pondo/page=1'),
(367, 7, '2024-06-01 06:45:38', 'GET: /master/po/pondo/page=1'),
(368, 7, '2024-06-01 06:46:04', 'GET: /master/po/pondo/page=1'),
(369, 7, '2024-06-01 06:46:05', 'GET: /master/po/pondo/page=1'),
(370, 7, '2024-06-01 06:46:06', 'GET: /master/po/pondo/page=1'),
(371, 7, '2024-06-01 06:46:06', 'GET: /master/po/pondo/page=1'),
(372, 7, '2024-06-01 06:46:07', 'GET: /master/po/pondo/page=1'),
(373, 7, '2024-06-01 06:46:07', 'GET: /master/po/pondo/page=1'),
(374, 7, '2024-06-01 06:46:07', 'GET: /master/po/pondo/page=1'),
(375, 7, '2024-06-01 06:46:10', 'GET: /master/po/suppliers'),
(376, 7, '2024-06-01 06:46:11', 'GET: /master/po/transactionHistory'),
(377, 7, '2024-06-01 06:46:11', 'GET: /master/po/suppliers'),
(378, 7, '2024-06-01 06:46:12', 'GET: /master/po/audit_logs/page=1'),
(379, 7, '2024-06-01 06:46:14', 'GET: /master/po/audit_logs/page=3'),
(380, 7, '2024-06-01 06:46:17', 'GET: /master/po/audit_logs/page=5'),
(381, 7, '2024-06-01 06:46:18', 'GET: /master/po/orderDetail'),
(382, 7, '2024-06-01 06:46:18', 'GET: /master/po/transactionHistory'),
(383, 7, '2024-06-01 06:46:19', 'GET: /master/po/suppliers'),
(384, 7, '2024-06-01 06:46:19', 'GET: /master/po/audit_logs/page=1'),
(385, 7, '2024-06-01 06:49:02', 'GET: /master/po/audit_logs/page=1'),
(386, 7, '2024-06-01 06:49:03', 'GET: /master/po/suppliers'),
(387, 7, '2024-06-01 06:49:05', 'GET: /master/po/viewsupplier/Supplier=3'),
(388, 7, '2024-06-01 06:49:06', 'GET: /master/po/suppliers'),
(389, 7, '2024-06-01 06:49:07', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(390, 7, '2024-06-01 06:49:11', 'GET: /master/po/suppliers'),
(391, 7, '2024-06-01 06:49:12', 'GET: /master/po/transactionHistory'),
(392, 7, '2024-06-01 06:49:13', 'GET: /master/po/orderDetail'),
(393, 7, '2024-06-01 06:49:13', 'GET: /master/po/transactionHistory'),
(394, 7, '2024-06-01 06:49:15', 'GET: /master/po/orderDetail'),
(395, 7, '2024-06-01 06:49:17', 'GET: /master/po/pondo/page=1'),
(396, 7, '2024-06-01 06:49:19', 'GET: /master/po/pondo/page=1'),
(397, 7, '2024-06-01 06:49:24', 'GET: /master/po/audit_logs/page=1'),
(398, 7, '2024-06-01 06:49:25', 'GET: /master/po/suppliers'),
(399, 7, '2024-06-01 06:49:26', 'GET: /master/po/transactionHistory'),
(400, 7, '2024-06-01 06:49:27', 'GET: /master/po/orderDetail'),
(401, 7, '2024-06-01 06:49:29', 'GET: /master/po/viewdetails/Batch=3'),
(402, 7, '2024-06-01 06:49:30', 'GET: /master/po/orderDetail'),
(403, 7, '2024-06-01 06:49:32', 'GET: /master/po/viewdetails/Batch=4'),
(404, 7, '2024-06-01 06:49:33', 'GET: /master/po/orderDetail'),
(405, 7, '2024-06-01 06:49:36', 'GET: /master/po/transactionHistory'),
(406, 7, '2024-06-01 06:49:36', 'GET: /master/po/orderDetail'),
(407, 7, '2024-06-01 06:49:37', 'GET: /master/po/audit_logs/page=1'),
(408, 7, '2024-06-01 06:49:38', 'GET: /master/po/suppliers'),
(409, 7, '2024-06-01 06:49:43', 'GET: /master/po/editsupplier/Supplier=2'),
(410, 7, '2024-06-01 06:49:45', 'GET: /master/po/suppliers'),
(411, 7, '2024-06-01 06:50:28', 'GET: /master/po/orderDetail'),
(412, 7, '2024-06-01 06:50:29', 'GET: /master/po/suppliers'),
(413, 7, '2024-06-01 06:50:30', 'GET: /master/po/transactionHistory'),
(414, 7, '2024-06-01 06:50:31', 'GET: /master/po/pondo/page=1'),
(415, 7, '2024-06-01 06:50:31', 'GET: /master/po/suppliers'),
(416, 7, '2024-06-01 06:50:32', 'GET: /master/po/audit_logs/page=1'),
(417, 7, '2024-06-01 06:50:32', 'GET: /master/po/suppliers'),
(418, 7, '2024-06-01 06:50:33', 'GET: /master/po/audit_logs/page=1'),
(419, 7, '2024-06-01 06:50:33', 'GET: /master/po/transactionHistory'),
(420, 7, '2024-06-01 06:50:34', 'GET: /master/po/transactionHistory'),
(421, 7, '2024-06-01 06:50:34', 'GET: /master/po/transactionHistory'),
(422, 7, '2024-06-01 06:50:35', 'GET: /master/po/orderDetail'),
(423, 7, '2024-06-01 06:50:35', 'GET: /master/po/transactionHistory'),
(424, 7, '2024-06-01 06:50:35', 'GET: /master/po/pondo/page=1'),
(425, 7, '2024-06-01 06:50:36', 'GET: /master/po/suppliers'),
(426, 7, '2024-06-01 06:50:36', 'GET: /master/po/audit_logs/page=1'),
(427, 7, '2024-06-01 06:50:39', 'GET: /master/po/audit_logs/page=2'),
(428, 7, '2024-06-01 06:50:41', 'GET: /master/po/audit_logs/page=3'),
(429, 7, '2024-06-01 06:50:44', 'GET: /master/po/audit_logs/page=2'),
(430, 7, '2024-06-01 06:50:45', 'GET: /master/po/audit_logs/page=1'),
(431, 7, '2024-06-01 06:50:57', 'POST: /master/auditlogSearch'),
(432, 7, '2024-06-01 06:51:05', 'GET: /master/po/audit_logs/page=1'),
(433, 7, '2024-06-01 06:51:22', 'POST: /master/auditlogSearch'),
(434, 7, '2024-06-01 06:51:52', 'GET: /master/po/audit_logs/page=1'),
(435, 7, '2024-06-01 06:51:53', 'GET: /master/po/audit_logs/page=1'),
(436, 7, '2024-06-01 06:51:57', 'POST: /master/auditlogSearch'),
(437, 7, '2024-06-01 06:53:10', 'GET: /master/po/audit_logs/page=1'),
(438, 7, '2024-06-01 06:53:31', 'GET: /master/po/audit_logs/page=1'),
(439, 7, '2024-06-01 06:53:36', 'POST: /master/auditlogSearch'),
(440, 7, '2024-06-01 06:53:36', 'GET: /master/po/audit_logs/page=1'),
(441, 7, '2024-06-01 06:53:41', 'POST: /master/auditlogSearch'),
(442, 7, '2024-06-01 06:53:41', 'GET: /master/po/audit_logs/page=1'),
(443, 7, '2024-06-01 06:53:45', 'POST: /master/auditlogSearch'),
(444, 7, '2024-06-01 06:53:45', 'GET: /master/po/audit_logs/page=1'),
(445, 7, '2024-06-01 06:55:34', 'GET: /master/po/pondo/page=1'),
(446, 7, '2024-06-01 06:56:34', 'GET: /master/po/audit_logs/page=1'),
(447, 7, '2024-06-01 06:56:36', 'GET: /master/po/audit_logs/page=1'),
(448, 7, '2024-06-01 06:56:36', 'GET: /master/po/suppliers'),
(449, 7, '2024-06-01 06:56:37', 'GET: /master/po/orderDetail'),
(450, 7, '2024-06-01 06:56:38', 'GET: /master/po/suppliers'),
(451, 7, '2024-06-01 06:56:39', 'GET: /master/po/orderDetail'),
(452, 7, '2024-06-01 06:56:40', 'GET: /master/po/viewdetails/Batch=3'),
(453, 7, '2024-06-01 06:56:41', 'GET: /master/po/orderDetail'),
(454, 7, '2024-06-01 06:56:50', 'GET: /master/po/audit_logs/page=1'),
(455, 7, '2024-06-01 06:56:51', 'GET: /master/po/suppliers'),
(456, 7, '2024-06-01 06:56:52', 'GET: /master/po/audit_logs/page=1'),
(457, 7, '2024-06-01 06:56:53', 'GET: /master/po/orderDetail'),
(458, 7, '2024-06-01 06:56:55', 'GET: /master/po/transactionHistory'),
(459, 7, '2024-06-01 06:56:56', 'GET: /master/po/suppliers'),
(460, 7, '2024-06-01 06:56:57', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(461, 7, '2024-06-01 06:57:03', 'POST: /master/placeorder/supplier/'),
(462, 7, '2024-06-01 06:57:05', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(463, 7, '2024-06-01 07:01:53', 'GET: /master/po/audit_logs/page=1'),
(464, 7, '2024-06-01 07:01:56', 'GET: /master/po/audit_logs/page=1'),
(465, 7, '2024-06-01 07:01:57', 'GET: /master/po/pondo/page=1'),
(466, 7, '2024-06-01 07:01:57', 'GET: /master/po/orderDetail'),
(467, 7, '2024-06-01 07:01:58', 'GET: /master/po/suppliers'),
(468, 7, '2024-06-01 07:01:58', 'GET: /master/po/audit_logs/page=1'),
(469, 7, '2024-06-01 07:02:00', 'POST: /master/auditlogSearch'),
(470, 7, '2024-06-01 07:02:00', 'GET: /master/po/audit_logs/page=1'),
(471, 7, '2024-06-01 07:15:19', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(472, 7, '2024-06-01 07:15:22', 'POST: /master/placeorder/supplier/'),
(473, 7, '2024-06-01 07:16:06', 'POST: /master/placeorder/supplier/'),
(474, 7, '2024-06-01 07:20:01', 'POST: /master/placeorder/supplier/'),
(475, 7, '2024-06-01 07:20:01', 'GET: /master/po/orderDetail'),
(476, 7, '2024-06-01 07:20:41', 'GET: /master/po/viewdetails/Batch=3'),
(477, 7, '2024-06-01 07:21:33', 'GET: /master/po/viewdetails/Batch=3'),
(478, 7, '2024-06-01 07:21:35', 'GET: /master/po/orderDetail'),
(479, 7, '2024-06-01 07:21:35', 'GET: /master/po/pondo/page=1'),
(480, 7, '2024-06-01 07:21:36', 'GET: /master/po/pondo/page=1'),
(481, 7, '2024-06-01 07:21:38', 'GET: /master/po/audit_logs/page=1'),
(482, 7, '2024-06-01 07:21:39', 'GET: /master/po/suppliers'),
(483, 7, '2024-06-01 07:21:40', 'GET: /master/po/transactionHistory'),
(484, 7, '2024-06-01 07:21:40', 'GET: /master/po/pondo/page=1'),
(485, 7, '2024-06-01 07:21:41', 'GET: /master/po/orderDetail'),
(486, 7, '2024-06-01 07:21:42', 'GET: /master/po/suppliers'),
(487, 7, '2024-06-01 07:21:42', 'GET: /master/po/audit_logs/page=1'),
(488, 7, '2024-06-01 07:22:11', 'GET: /master/po/audit_logs/page=1'),
(489, 7, '2024-06-01 07:22:11', 'GET: /master/po/suppliers'),
(490, 7, '2024-06-01 07:22:12', 'GET: /master/po/orderDetail'),
(491, 7, '2024-06-01 07:22:14', 'GET: /master/po/viewdetails/Batch=3'),
(492, 7, '2024-06-01 07:25:13', 'GET: /master/po/orderDetail'),
(493, 7, '2024-06-01 07:25:14', 'GET: /master/po/orderDetail'),
(494, 7, '2024-06-01 07:25:15', 'GET: /master/po/orderDetail'),
(495, 7, '2024-06-01 07:25:16', 'GET: /master/po/suppliers'),
(496, 7, '2024-06-01 07:25:17', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(497, 7, '2024-06-01 07:25:19', 'POST: /master/placeorder/supplier/'),
(498, 7, '2024-06-01 07:25:19', 'GET: /master/po/orderDetail'),
(499, 7, '2024-06-01 07:27:52', 'GET: /master/po/viewdetails/Batch=3'),
(500, 7, '2024-06-01 07:32:10', 'GET: /master/po/orderDetail'),
(501, 7, '2024-06-01 07:32:11', 'GET: /master/po/suppliers'),
(502, 7, '2024-06-01 07:32:11', 'GET: /master/po/orderDetail'),
(503, 7, '2024-06-01 07:32:12', 'GET: /master/po/suppliers'),
(504, 7, '2024-06-01 07:32:13', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(505, 7, '2024-06-01 07:32:16', 'POST: /master/placeorder/supplier/'),
(506, 7, '2024-06-01 07:32:23', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(507, 7, '2024-06-01 07:32:25', 'POST: /master/placeorder/supplier/'),
(508, 7, '2024-06-01 07:32:25', 'GET: /master/po/orderDetail'),
(509, 7, '2024-06-01 07:34:39', 'GET: /master/po/pondo/page=1'),
(510, 7, '2024-06-01 07:36:22', 'GET: /master/po/suppliers'),
(511, 7, '2024-06-01 07:36:25', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(512, 7, '2024-06-01 07:36:28', 'POST: /master/placeorder/supplier/'),
(513, 7, '2024-06-01 07:36:28', 'GET: /master/po/orderDetail'),
(514, 7, '2024-06-01 07:36:29', 'GET: /master/po/viewdetails/Batch=2'),
(515, 7, '2024-06-01 07:36:31', 'GET: /master/po/viewdetails/Batch=2'),
(516, 7, '2024-06-01 07:36:31', 'GET: /master/po/viewdetails/Batch=2'),
(517, 7, '2024-06-01 07:37:49', 'GET: /master/po/pondo/page=1'),
(518, 7, '2024-06-01 07:37:55', 'GET: /master/po/pondo/page=1'),
(519, 7, '2024-06-01 07:39:15', 'GET: /master/po/suppliers'),
(520, 7, '2024-06-01 07:39:16', 'GET: /master/po/orderDetail'),
(521, 7, '2024-06-01 07:39:22', 'GET: /master/po/suppliers'),
(522, 7, '2024-06-01 07:39:23', 'GET: /master/po/audit_logs/page=1'),
(523, 7, '2024-06-01 07:39:23', 'GET: /master/po/suppliers'),
(524, 7, '2024-06-01 07:39:25', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(525, 7, '2024-06-01 07:39:29', 'POST: /master/placeorder/supplier/'),
(526, 7, '2024-06-01 07:39:29', 'GET: /master/po/orderDetail'),
(527, 7, '2024-06-01 07:39:31', 'GET: /master/po/viewdetails/Batch=2'),
(528, 7, '2024-06-01 07:39:34', 'GET: /master/po/orderDetail'),
(529, 7, '2024-06-01 07:39:38', 'GET: /master/po/viewdetails/Batch=3'),
(530, 7, '2024-06-01 07:39:40', 'GET: /master/po/orderDetail'),
(531, 7, '2024-06-01 07:39:41', 'GET: /master/po/suppliers'),
(532, 7, '2024-06-01 07:39:41', 'GET: /master/po/orderDetail'),
(533, 7, '2024-06-01 07:40:16', 'GET: /master/po/viewdetails/Batch=2'),
(534, 7, '2024-06-01 07:40:19', 'GET: /master/po/orderDetail'),
(535, 7, '2024-06-01 07:40:21', 'GET: /master/po/orderDetail'),
(536, 7, '2024-06-01 07:40:21', 'GET: /master/po/transactionHistory'),
(537, 7, '2024-06-01 07:40:22', 'GET: /master/po/suppliers'),
(538, 7, '2024-06-01 07:40:24', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(539, 7, '2024-06-01 07:40:27', 'POST: /master/placeorder/supplier/'),
(540, 7, '2024-06-01 07:40:27', 'GET: /master/po/orderDetail'),
(541, 7, '2024-06-01 07:40:30', 'GET: /master/po/viewdetails/Batch=4'),
(542, 7, '2024-06-01 07:41:24', 'GET: /master/po/viewdetails/Batch=4'),
(543, 7, '2024-06-01 07:47:33', 'GET: /master/po/suppliers'),
(544, 7, '2024-06-01 07:47:33', 'GET: /master/po/orderDetail'),
(545, 7, '2024-06-01 07:47:34', 'GET: /master/po/transactionHistory'),
(546, 7, '2024-06-01 07:47:35', 'GET: /master/po/orderDetail'),
(547, 7, '2024-06-01 07:47:35', 'GET: /master/po/orderDetail'),
(548, 7, '2024-06-01 07:47:36', 'GET: /master/po/pondo/page=1'),
(549, 7, '2024-06-01 07:47:36', 'GET: /master/po/transactionHistory'),
(550, 7, '2024-06-01 07:47:37', 'GET: /master/po/orderDetail'),
(551, 7, '2024-06-01 07:47:37', 'GET: /master/po/audit_logs/page=1'),
(552, 7, '2024-06-01 07:47:38', 'GET: /master/po/suppliers'),
(553, 7, '2024-06-01 07:47:40', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(554, 7, '2024-06-01 07:47:48', 'POST: /master/placeorder/supplier/'),
(555, 7, '2024-06-01 07:47:48', 'GET: /master/po/orderDetail'),
(556, 7, '2024-06-01 07:47:50', 'GET: /master/po/viewdetails/Batch=5'),
(557, 7, '2024-06-01 07:49:09', 'GET: /master/po/orderDetail'),
(558, 7, '2024-06-01 07:49:09', 'GET: /master/po/orderDetail'),
(559, 7, '2024-06-01 07:49:11', 'GET: /master/po/orderDetail'),
(560, 7, '2024-06-01 07:49:11', 'GET: /master/po/orderDetail'),
(561, 7, '2024-06-01 07:49:12', 'GET: /master/po/transactionHistory'),
(562, 7, '2024-06-01 07:49:12', 'GET: /master/po/audit_logs/page=1'),
(563, 7, '2024-06-01 07:49:13', 'GET: /master/po/suppliers'),
(564, 7, '2024-06-01 07:49:23', 'GET: /master/po/viewsupplierproduct/Supplier=1'),
(565, 7, '2024-06-01 07:49:24', 'GET: /master/po/suppliers'),
(566, 7, '2024-06-01 07:49:25', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(567, 7, '2024-06-01 07:49:27', 'POST: /master/placeorder/supplier/'),
(568, 7, '2024-06-01 07:49:27', 'GET: /master/po/orderDetail'),
(569, 7, '2024-06-01 07:53:30', 'GET: /master/po/orderDetail'),
(570, 7, '2024-06-01 07:53:31', 'GET: /master/po/orderDetail'),
(571, 7, '2024-06-01 07:53:38', 'GET: /master/po/orderDetail'),
(572, 7, '2024-06-01 07:53:42', 'POST: /master/master/cancel/orderDetail'),
(573, 7, '2024-06-01 07:54:01', 'GET: /master/po/orderDetail'),
(574, 7, '2024-06-01 07:54:55', 'GET: /master/po/orderDetail'),
(575, 7, '2024-06-01 07:55:01', 'POST: /master/master/cancel/orderDetail'),
(576, 7, '2024-06-01 07:55:01', 'GET: /master/po/orderDetail'),
(577, 7, '2024-06-01 07:55:04', 'POST: /master/master/delay/orderDetail'),
(578, 7, '2024-06-01 07:55:04', 'GET: /master/po/orderDetail'),
(579, 7, '2024-06-01 07:55:08', 'POST: /master/master/cancel/orderDetail'),
(580, 7, '2024-06-01 07:55:09', 'GET: /master/po/orderDetail'),
(581, 7, '2024-06-01 07:58:01', 'GET: /master/po/orderDetail'),
(582, 7, '2024-06-01 07:58:02', 'POST: /master/logout/user'),
(583, 7, '2024-06-01 07:58:38', 'POST: /master/login'),
(584, 7, '2024-06-01 07:58:38', 'GET: /master/po/dashboard'),
(585, 7, '2024-06-01 07:58:58', 'GET: /master/po/orderDetail'),
(586, 7, '2024-06-01 07:58:58', 'GET: /master/po/orderDetail'),
(587, 7, '2024-06-01 07:59:00', 'POST: /master/logout/user'),
(588, 7, '2024-06-01 07:59:35', 'POST: /master/login'),
(589, 7, '2024-06-01 08:00:59', 'GET: /master/po/audit_logs/page=1'),
(590, 7, '2024-06-01 08:01:01', 'POST: /master/logout'),
(591, 7, '2024-06-01 08:01:06', 'POST: /master/login'),
(592, 7, '2024-06-01 08:01:06', 'GET: /master/po/audit_logs/page=1'),
(593, 7, '2024-06-01 08:01:49', 'GET: /master/po/audit_logs/page=1'),
(594, 7, '2024-06-01 08:03:11', 'GET: /master/po/pondo/page=1'),
(595, 7, '2024-06-01 08:03:13', 'GET: /master/po/pondo/page=1'),
(596, 7, '2024-06-01 08:03:17', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(597, 7, '2024-06-01 08:03:21', 'POST: /master/placeorder/supplier/'),
(598, 7, '2024-06-01 08:03:26', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(599, 7, '2024-06-01 08:07:38', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(600, 7, '2024-06-01 08:09:57', 'GET: /master/po/audit_logs/page=1'),
(601, 7, '2024-06-01 08:09:58', 'GET: /master/po/pondo/page=1'),
(602, 7, '2024-06-01 08:10:00', 'GET: /master/po/audit_logs/page=1'),
(603, 7, '2024-06-01 08:10:01', 'GET: /master/po/pondo/page=1'),
(604, 7, '2024-06-01 08:10:06', 'GET: /master/po/audit_logs/page=1'),
(605, 7, '2024-06-01 08:10:22', 'GET: /master/po/audit_logs/page=1'),
(606, 7, '2024-06-01 08:10:41', 'GET: /master/po/pondo/page=1'),
(607, 7, '2024-06-01 08:10:43', 'GET: /master/po/audit_logs/page=1'),
(608, 7, '2024-06-01 08:10:44', 'GET: /master/po/audit_logs/page=1'),
(609, 7, '2024-06-01 08:10:46', 'GET: /master/po/audit_logs/page=1'),
(610, 7, '2024-06-01 08:10:50', 'GET: /master/po/audit_logs/page=1'),
(611, 7, '2024-06-01 08:10:52', 'GET: /master/po/pondo/page=1'),
(612, 7, '2024-06-01 08:10:54', 'GET: /master/po/pondo/page=1'),
(613, 7, '2024-06-01 08:10:56', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(614, 7, '2024-06-01 08:11:06', 'POST: /master/master/cancel/orderDetail'),
(615, 7, '2024-06-01 08:11:07', 'POST: /master/master/cancel/orderDetail'),
(616, 7, '2024-06-01 08:11:09', 'POST: /master/master/cancel/orderDetail'),
(617, 7, '2024-06-01 08:11:11', 'POST: /master/master/cancel/orderDetail'),
(618, 7, '2024-06-01 08:11:11', 'GET: /master/po/audit_logs/page=1'),
(619, 7, '2024-06-01 08:11:14', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(620, 7, '2024-06-01 08:11:17', 'POST: /master/placeorder/supplier/'),
(621, 7, '2024-06-01 08:11:31', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(622, 7, '2024-06-01 08:11:39', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(623, 7, '2024-06-01 08:13:46', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(624, 7, '2024-06-01 08:13:51', 'POST: /master/placeorder/supplier/'),
(625, 7, '2024-06-01 08:14:08', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(626, 7, '2024-06-01 08:14:24', 'POST: /master/placeorder/supplier/'),
(627, 7, '2024-06-01 08:14:29', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(628, 7, '2024-06-01 08:14:37', 'POST: /master/placeorder/supplier/'),
(629, 7, '2024-06-01 08:14:40', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(630, 7, '2024-06-01 08:15:20', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(631, 7, '2024-06-01 08:15:21', 'POST: /master/placeorder/supplier/'),
(632, 7, '2024-06-01 08:15:22', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(633, 7, '2024-06-01 08:15:41', 'GET: /master/po/pondo/page=1'),
(634, 7, '2024-06-01 08:15:54', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(635, 7, '2024-06-01 08:16:38', 'GET: /master/po/audit_logs/page=1'),
(636, 7, '2024-06-01 08:16:43', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(637, 7, '2024-06-01 08:17:03', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(638, 7, '2024-06-01 08:17:30', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(639, 7, '2024-06-01 08:17:32', 'POST: /master/logout/user'),
(640, 7, '2024-06-01 08:19:17', 'POST: /master/login'),
(641, 7, '2024-06-01 08:19:17', 'GET: /master/po/audit_logs/page=1'),
(642, 7, '2024-06-01 08:19:17', 'GET: /master/po/audit_logs/page=1'),
(643, 7, '2024-06-01 08:19:19', 'POST: /master/logout'),
(644, 7, '2024-06-01 08:19:23', 'POST: /master/login'),
(645, 7, '2024-06-01 08:19:23', 'GET: /master/po/audit_logs/page=1'),
(646, 7, '2024-06-01 08:19:23', 'GET: /master/po/audit_logs/page=1'),
(647, 7, '2024-06-01 08:19:30', 'GET: /master/po/audit_logs/page=1'),
(648, 7, '2024-06-01 08:19:31', 'GET: /master/po/audit_logs/page=1'),
(649, 7, '2024-06-01 08:19:50', 'GET: /master/po/audit_logs/page=1'),
(650, 7, '2024-06-01 08:19:50', 'GET: /master/po/audit_logs/page=1'),
(651, 7, '2024-06-01 08:19:52', 'GET: /master/po/audit_logs/page=1'),
(652, 7, '2024-06-01 08:19:52', 'GET: /master/po/audit_logs/page=1'),
(653, 7, '2024-06-01 08:19:59', 'GET: /master/po/audit_logs/page=1'),
(654, 7, '2024-06-01 08:20:00', 'GET: /master/po/audit_logs/page=1'),
(655, 7, '2024-06-01 08:20:00', 'GET: /master/po/audit_logs/page=1'),
(656, 7, '2024-06-01 08:20:00', 'GET: /master/po/audit_logs/page=1'),
(657, 7, '2024-06-01 08:20:08', 'GET: /master/po/audit_logs/page=1'),
(658, 7, '2024-06-01 08:20:08', 'GET: /master/po/audit_logs/page=1'),
(659, 7, '2024-06-01 08:20:08', 'GET: /master/po/audit_logs/page=1'),
(660, 7, '2024-06-01 08:20:08', 'GET: /master/po/audit_logs/page=1'),
(661, 7, '2024-06-01 08:20:12', 'GET: /master/po/audit_logs/page=1'),
(662, 7, '2024-06-01 08:20:13', 'GET: /master/po/audit_logs/page=1'),
(663, 7, '2024-06-01 08:20:13', 'GET: /master/po/audit_logs/page=1'),
(664, 7, '2024-06-01 08:20:13', 'GET: /master/po/audit_logs/page=1'),
(665, 7, '2024-06-01 08:20:25', 'GET: /master/po/audit_logs/page=1'),
(666, 7, '2024-06-01 08:20:25', 'GET: /master/po/audit_logs/page=1'),
(667, 7, '2024-06-01 08:20:46', 'GET: /master/po/audit_logs/page=1'),
(668, 7, '2024-06-01 08:20:46', 'GET: /master/po/audit_logs/page=1'),
(669, 7, '2024-06-01 08:20:49', 'GET: /master/po/pondo/page=1'),
(670, 7, '2024-06-01 08:20:49', 'GET: /master/po/audit_logs/page=1'),
(671, 7, '2024-06-01 08:20:53', 'GET: /master/po/pondo/page=1'),
(672, 7, '2024-06-01 08:20:53', 'GET: /master/po/audit_logs/page=1'),
(673, 7, '2024-06-01 08:20:56', 'GET: /master/po/audit_logs/page=1'),
(674, 7, '2024-06-01 08:20:57', 'GET: /master/po/audit_logs/page=1'),
(675, 7, '2024-06-01 08:21:00', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(676, 7, '2024-06-01 08:21:00', 'GET: /master/po/audit_logs/page=1'),
(677, 7, '2024-06-01 08:21:19', 'POST: /master/placeorder/supplier/'),
(678, 7, '2024-06-01 08:21:21', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(679, 7, '2024-06-01 08:21:21', 'GET: /master/po/audit_logs/page=1'),
(680, 7, '2024-06-01 08:22:15', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(681, 7, '2024-06-01 08:22:15', 'GET: /master/po/audit_logs/page=1'),
(682, 7, '2024-06-01 08:22:31', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(683, 7, '2024-06-01 08:22:31', 'GET: /master/po/audit_logs/page=1'),
(684, 7, '2024-06-01 08:22:52', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(685, 7, '2024-06-01 08:22:52', 'GET: /master/po/audit_logs/page=1'),
(686, 7, '2024-06-01 08:22:52', 'GET: /master/po/audit_logs/page=1'),
(687, 7, '2024-06-01 08:22:52', 'GET: /master/po/audit_logs/page=1'),
(688, 7, '2024-06-01 08:22:55', 'GET: /master/po/pondo/page=1'),
(689, 7, '2024-06-01 08:22:55', 'GET: /master/po/audit_logs/page=1'),
(690, 7, '2024-06-01 08:23:02', 'GET: /master/po/audit_logs/page=1'),
(691, 7, '2024-06-01 08:23:02', 'GET: /master/po/audit_logs/page=1'),
(692, 7, '2024-06-01 08:23:03', 'GET: /master/po/pondo/page=1'),
(693, 7, '2024-06-01 08:23:03', 'GET: /master/po/audit_logs/page=1'),
(694, 7, '2024-06-01 08:23:06', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(695, 7, '2024-06-01 08:23:06', 'GET: /master/po/audit_logs/page=1'),
(696, 7, '2024-06-01 08:24:22', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(697, 7, '2024-06-01 08:24:22', 'GET: /master/po/audit_logs/page=1'),
(698, 7, '2024-06-01 08:24:30', 'POST: /master/placeorder/supplier/'),
(699, 7, '2024-06-01 08:24:32', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(700, 7, '2024-06-01 08:24:32', 'GET: /master/po/audit_logs/page=1'),
(701, 7, '2024-06-01 08:24:35', 'GET: /master/po/pondo/page=1'),
(702, 7, '2024-06-01 08:24:35', 'GET: /master/po/audit_logs/page=1'),
(703, 7, '2024-06-01 08:24:36', 'GET: /master/po/audit_logs/page=1'),
(704, 7, '2024-06-01 08:24:36', 'GET: /master/po/audit_logs/page=1'),
(705, 7, '2024-06-01 08:24:37', 'GET: /master/po/pondo/page=1'),
(706, 7, '2024-06-01 08:24:37', 'GET: /master/po/audit_logs/page=1'),
(707, 7, '2024-06-01 08:24:47', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(708, 7, '2024-06-01 08:24:47', 'GET: /master/po/audit_logs/page=1'),
(709, 7, '2024-06-01 08:30:07', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(710, 7, '2024-06-01 08:30:07', 'GET: /master/po/audit_logs/page=1'),
(711, 7, '2024-06-01 08:30:12', 'POST: /master/placeorder/supplier/'),
(712, 7, '2024-06-01 08:30:16', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(713, 7, '2024-06-01 08:30:16', 'GET: /master/po/audit_logs/page=1'),
(714, 7, '2024-06-01 08:30:29', 'GET: /master/po/audit_logs/page=1'),
(715, 7, '2024-06-01 08:30:36', 'GET: /master/po/pondo/page=1'),
(716, 7, '2024-06-01 08:30:36', 'GET: /master/po/audit_logs/page=1'),
(717, 7, '2024-06-01 08:30:49', 'GET: /master/po/audit_logs/page=1'),
(718, 7, '2024-06-01 08:30:49', 'GET: /master/po/audit_logs/page=1'),
(719, 7, '2024-06-01 08:30:50', 'GET: /master/po/audit_logs/page=1'),
(720, 7, '2024-06-01 08:30:50', 'GET: /master/po/audit_logs/page=1'),
(721, 7, '2024-06-01 08:30:52', 'GET: /master/po/audit_logs/page=1'),
(722, 7, '2024-06-01 08:30:52', 'GET: /master/po/audit_logs/page=1'),
(723, 7, '2024-06-01 08:30:52', 'GET: /master/po/pondo/page=1'),
(724, 7, '2024-06-01 08:30:52', 'GET: /master/po/audit_logs/page=1'),
(725, 7, '2024-06-01 08:30:54', 'GET: /master/po/pondo/page=1'),
(726, 7, '2024-06-01 08:30:54', 'GET: /master/po/audit_logs/page=1'),
(727, 7, '2024-06-01 08:30:56', 'GET: /master/po/audit_logs/page=1'),
(728, 7, '2024-06-01 08:30:56', 'GET: /master/po/audit_logs/page=1'),
(729, 7, '2024-06-01 08:30:59', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(730, 7, '2024-06-01 08:30:59', 'GET: /master/po/audit_logs/page=1'),
(731, 7, '2024-06-01 08:31:05', 'POST: /master/placeorder/supplier/'),
(732, 7, '2024-06-01 08:31:06', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(733, 7, '2024-06-01 08:31:07', 'GET: /master/po/audit_logs/page=1'),
(734, 7, '2024-06-01 08:31:08', 'GET: /master/po/pondo/page=1'),
(735, 7, '2024-06-01 08:31:08', 'GET: /master/po/audit_logs/page=1'),
(736, 7, '2024-06-01 08:31:14', 'GET: /master/po/audit_logs/page=1'),
(737, 7, '2024-06-01 08:31:14', 'GET: /master/po/audit_logs/page=1'),
(738, 7, '2024-06-01 08:31:16', 'GET: /master/po/audit_logs/page=1'),
(739, 7, '2024-06-01 08:31:16', 'GET: /master/po/audit_logs/page=1'),
(740, 7, '2024-06-01 08:34:12', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(741, 7, '2024-06-01 08:34:12', 'GET: /master/po/audit_logs/page=1'),
(742, 7, '2024-06-01 08:36:45', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(743, 7, '2024-06-01 08:38:24', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(744, 7, '2024-06-01 08:38:25', 'GET: /master/po/audit_logs/page=1'),
(745, 7, '2024-06-01 08:39:42', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(746, 7, '2024-06-01 08:39:42', 'GET: /master/po/audit_logs/page=1'),
(747, 7, '2024-06-01 08:39:45', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(748, 7, '2024-06-01 08:39:45', 'GET: /master/po/audit_logs/page=1'),
(749, 7, '2024-06-01 08:39:52', 'GET: /master/po/viewsupplierproduct/Supplier=3');
INSERT INTO `audit_log` (`id`, `account_id`, `datetime`, `action`) VALUES
(750, 7, '2024-06-01 08:39:52', 'GET: /master/po/audit_logs/page=1'),
(751, 7, '2024-06-01 08:39:57', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(752, 7, '2024-06-01 08:39:57', 'GET: /master/po/audit_logs/page=1'),
(753, 7, '2024-06-01 08:40:36', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(754, 7, '2024-06-01 08:40:36', 'GET: /master/po/audit_logs/page=1'),
(755, 7, '2024-06-01 08:41:49', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(756, 7, '2024-06-01 08:41:49', 'GET: /master/po/audit_logs/page=1'),
(757, 7, '2024-06-01 08:42:40', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(758, 7, '2024-06-01 08:42:40', 'GET: /master/po/audit_logs/page=1'),
(759, 7, '2024-06-01 08:43:30', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(760, 7, '2024-06-01 08:43:30', 'GET: /master/po/audit_logs/page=1'),
(761, 7, '2024-06-01 08:43:40', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(762, 7, '2024-06-01 08:43:40', 'GET: /master/po/audit_logs/page=1'),
(763, 7, '2024-06-01 08:44:42', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(764, 7, '2024-06-01 08:44:42', 'GET: /master/po/audit_logs/page=1'),
(765, 7, '2024-06-01 08:44:50', 'POST: /master/placeorder/supplier/'),
(766, 7, '2024-06-01 08:44:52', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(767, 7, '2024-06-01 08:44:52', 'GET: /master/po/audit_logs/page=1'),
(768, 7, '2024-06-01 08:46:17', 'POST: /master/logout/user'),
(769, 7, '2024-06-01 15:31:25', 'POST: /master/login'),
(770, 7, '2024-06-01 15:31:26', 'GET: /master/po/audit_logs/page=1'),
(771, 7, '2024-06-01 15:31:26', 'GET: /master/po/audit_logs/page=1'),
(772, 7, '2024-06-01 15:31:27', 'GET: /master/po/audit_logs/page=1'),
(773, 7, '2024-06-01 15:31:27', 'GET: /master/po/audit_logs/page=1'),
(774, 7, '2024-06-01 15:32:46', 'GET: /master/po/audit_logs/page=1'),
(775, 7, '2024-06-01 15:32:46', 'GET: /master/po/audit_logs/page=1'),
(776, 7, '2024-06-01 15:32:47', 'GET: /master/po/audit_logs/page=1'),
(777, 7, '2024-06-01 15:32:47', 'GET: /master/po/audit_logs/page=1'),
(778, 7, '2024-06-01 15:32:51', 'GET: /master/po/audit_logs/page=1'),
(779, 7, '2024-06-01 15:32:51', 'GET: /master/po/audit_logs/page=1'),
(780, 7, '2024-06-01 15:32:53', 'GET: /master/po/pondo/page=1'),
(781, 7, '2024-06-01 15:32:53', 'GET: /master/po/audit_logs/page=1'),
(782, 7, '2024-06-01 15:33:00', 'GET: /master/po/editsupplier/Supplier=1'),
(783, 7, '2024-06-01 15:33:00', 'GET: /master/po/audit_logs/page=1'),
(784, 7, '2024-06-01 15:33:02', 'GET: /master/po/viewsupplierproduct/Supplier=1'),
(785, 7, '2024-06-01 15:33:02', 'GET: /master/po/audit_logs/page=1'),
(786, 7, '2024-06-01 15:33:26', 'GET: /master/po/pondo/page=1'),
(787, 7, '2024-06-01 15:33:26', 'GET: /master/po/audit_logs/page=1'),
(788, 7, '2024-06-01 15:33:27', 'GET: /master/po/pondo/page=1'),
(789, 7, '2024-06-01 15:33:27', 'GET: /master/po/audit_logs/page=1'),
(790, 7, '2024-06-01 15:33:48', 'GET: /master/po/audit_logs/page=1'),
(791, 7, '2024-06-01 15:33:48', 'GET: /master/po/audit_logs/page=1'),
(792, 7, '2024-06-01 15:33:50', 'GET: /master/po/audit_logs/page=1'),
(793, 7, '2024-06-01 15:33:50', 'GET: /master/po/audit_logs/page=1'),
(794, 7, '2024-06-01 15:33:51', 'GET: /master/po/audit_logs/page=1'),
(795, 7, '2024-06-01 15:33:51', 'GET: /master/po/audit_logs/page=1'),
(796, 7, '2024-06-01 15:33:57', 'GET: /master/po/pondo/page=1'),
(797, 7, '2024-06-01 15:33:57', 'GET: /master/po/audit_logs/page=1'),
(798, 7, '2024-06-01 15:34:03', 'GET: /master/po/audit_logs/page=1'),
(799, 7, '2024-06-01 15:34:03', 'GET: /master/po/audit_logs/page=1'),
(800, 7, '2024-06-01 15:34:11', 'GET: /master/po/audit_logs/page=1'),
(801, 7, '2024-06-01 15:34:11', 'GET: /master/po/audit_logs/page=1'),
(802, 7, '2024-06-01 15:34:12', 'GET: /master/po/audit_logs/page=1'),
(803, 7, '2024-06-01 15:34:12', 'GET: /master/po/audit_logs/page=1'),
(804, 7, '2024-06-01 15:34:25', 'GET: /master/po/audit_logs/page=1'),
(805, 7, '2024-06-01 15:34:26', 'GET: /master/po/audit_logs/page=1'),
(806, 7, '2024-06-01 15:34:27', 'GET: /master/po/pondo/page=1'),
(807, 7, '2024-06-01 15:34:27', 'GET: /master/po/audit_logs/page=1'),
(808, 7, '2024-06-01 15:34:34', 'GET: /master/po/audit_logs/page=1'),
(809, 7, '2024-06-01 15:34:34', 'GET: /master/po/audit_logs/page=1'),
(810, 7, '2024-06-01 15:34:54', 'GET: /master/po/audit_logs/page=1'),
(811, 7, '2024-06-01 15:34:55', 'GET: /master/po/audit_logs/page=1'),
(812, 7, '2024-06-01 15:34:57', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(813, 7, '2024-06-01 15:34:57', 'GET: /master/po/audit_logs/page=1'),
(814, 7, '2024-06-01 15:35:05', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(815, 7, '2024-06-01 15:35:05', 'GET: /master/po/audit_logs/page=1'),
(816, 7, '2024-06-01 15:35:44', 'POST: /master/placeorder/supplier/'),
(817, 7, '2024-06-01 15:35:47', 'GET: /master/po/audit_logs/page=1'),
(818, 7, '2024-06-01 15:35:52', 'GET: /master/po/audit_logs/page=1'),
(819, 7, '2024-06-01 15:36:00', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(820, 7, '2024-06-01 15:36:00', 'GET: /master/po/audit_logs/page=1'),
(821, 7, '2024-06-01 15:36:05', 'GET: /master/po/audit_logs/page=1'),
(822, 7, '2024-06-01 15:36:44', 'POST: /master/master/delay/orderDetail'),
(823, 7, '2024-06-01 15:36:50', 'GET: /master/po/audit_logs/page=1'),
(824, 7, '2024-06-01 15:36:58', 'GET: /master/po/audit_logs/page=1'),
(825, 7, '2024-06-01 15:36:58', 'GET: /master/po/audit_logs/page=1'),
(826, 7, '2024-06-01 15:37:13', 'GET: /master/po/audit_logs/page=1'),
(827, 7, '2024-06-01 15:37:13', 'GET: /master/po/audit_logs/page=1'),
(828, 7, '2024-06-01 15:37:20', 'GET: /master/po/viewsupplier/Supplier=3'),
(829, 7, '2024-06-01 15:37:20', 'GET: /master/po/audit_logs/page=1'),
(830, 7, '2024-06-01 15:37:22', 'GET: /master/po/viewsupplier/Supplier=2'),
(831, 7, '2024-06-01 15:37:22', 'GET: /master/po/audit_logs/page=1'),
(832, 7, '2024-06-01 15:37:25', 'GET: /master/po/pondo/page=1'),
(833, 7, '2024-06-01 15:37:25', 'GET: /master/po/audit_logs/page=1'),
(834, 7, '2024-06-01 15:37:29', 'GET: /master/po/audit_logs/page=1'),
(835, 7, '2024-06-01 15:37:48', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(836, 7, '2024-06-01 15:37:48', 'GET: /master/po/audit_logs/page=1'),
(837, 7, '2024-06-01 15:37:54', 'GET: /master/po/audit_logs/page=1'),
(838, 7, '2024-06-01 15:37:58', 'POST: /master/master/addfeedback/viewtransaction'),
(839, 7, '2024-06-01 15:38:00', 'GET: /master/po/audit_logs/page=1'),
(840, 7, '2024-06-01 15:38:09', 'POST: /master/master/addfeedback/viewtransaction'),
(841, 7, '2024-06-01 15:38:11', 'GET: /master/po/audit_logs/page=1'),
(842, 7, '2024-06-01 15:38:13', 'POST: /master/master/addfeedback/viewtransaction'),
(843, 7, '2024-06-01 15:38:14', 'GET: /master/po/audit_logs/page=1'),
(844, 7, '2024-06-01 15:38:17', 'POST: /master/master/addfeedback/viewtransaction'),
(845, 7, '2024-06-01 15:38:18', 'GET: /master/po/audit_logs/page=1'),
(846, 7, '2024-06-01 15:38:20', 'POST: /master/master/addfeedback/viewtransaction'),
(847, 7, '2024-06-01 15:38:21', 'GET: /master/po/audit_logs/page=1'),
(848, 7, '2024-06-01 15:38:25', 'POST: /master/master/addfeedback/viewtransaction'),
(849, 7, '2024-06-01 15:38:28', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(850, 7, '2024-06-01 15:38:28', 'GET: /master/po/audit_logs/page=1'),
(851, 7, '2024-06-01 15:38:59', 'POST: /master/placeorder/supplier/'),
(852, 7, '2024-06-01 15:39:01', 'GET: /master/po/audit_logs/page=1'),
(853, 7, '2024-06-01 15:39:08', 'POST: /master/master/complete/orderDetail'),
(854, 7, '2024-06-01 15:39:10', 'GET: /master/po/audit_logs/page=1'),
(855, 7, '2024-06-01 15:39:15', 'GET: /master/po/audit_logs/page=1'),
(856, 7, '2024-06-01 15:40:07', 'GET: /master/po/audit_logs/page=1'),
(857, 7, '2024-06-01 15:40:30', 'GET: /master/po/audit_logs/page=1'),
(858, 7, '2024-06-01 15:40:39', 'GET: /master/po/audit_logs/page=1'),
(859, 7, '2024-06-01 15:41:04', 'POST: /master/master/addfeedback/viewtransaction'),
(860, 7, '2024-06-01 15:41:06', 'GET: /master/po/audit_logs/page=1'),
(861, 7, '2024-06-01 15:41:06', 'GET: /master/po/audit_logs/page=1'),
(862, 7, '2024-06-01 15:41:09', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(863, 7, '2024-06-01 15:41:09', 'GET: /master/po/audit_logs/page=1'),
(864, 7, '2024-06-01 15:41:11', 'GET: /master/po/viewsupplier/Supplier=2'),
(865, 7, '2024-06-01 15:41:11', 'GET: /master/po/audit_logs/page=1'),
(866, 7, '2024-06-01 15:41:24', 'GET: /master/po/viewsupplier/Supplier=3'),
(867, 7, '2024-06-01 15:41:24', 'GET: /master/po/audit_logs/page=1'),
(868, 7, '2024-06-01 15:41:30', 'GET: /master/po/editsupplier/Supplier=2'),
(869, 7, '2024-06-01 15:41:30', 'GET: /master/po/audit_logs/page=1'),
(870, 7, '2024-06-01 15:44:06', 'GET: /master/po/editsupplier/Supplier=2'),
(871, 7, '2024-06-01 15:44:06', 'GET: /master/po/audit_logs/page=1'),
(872, 7, '2024-06-01 15:44:15', 'GET: /master/po/viewsupplier/Supplier=2'),
(873, 7, '2024-06-01 15:44:15', 'GET: /master/po/audit_logs/page=1'),
(874, 7, '2024-06-01 15:44:20', 'GET: /master/po/editsupplier/Supplier=2'),
(875, 7, '2024-06-01 15:44:21', 'GET: /master/po/audit_logs/page=1'),
(876, 7, '2024-06-01 15:45:34', 'GET: /master/po/editsupplier/Supplier=2'),
(877, 7, '2024-06-01 15:45:34', 'GET: /master/po/audit_logs/page=1'),
(878, 7, '2024-06-01 15:46:08', 'GET: /master/po/editsupplier/Supplier=2'),
(879, 7, '2024-06-01 15:46:08', 'GET: /master/po/audit_logs/page=1'),
(880, 7, '2024-06-01 15:46:12', 'GET: /master/po/editsupplier/Supplier=2'),
(881, 7, '2024-06-01 15:46:13', 'GET: /master/po/audit_logs/page=1'),
(882, 7, '2024-06-01 15:46:28', 'GET: /master/po/editsupplier/Supplier=2'),
(883, 7, '2024-06-01 15:46:28', 'GET: /master/po/audit_logs/page=1'),
(884, 7, '2024-06-01 15:46:51', 'GET: /master/po/editsupplier/Supplier=2'),
(885, 7, '2024-06-01 15:46:51', 'GET: /master/po/audit_logs/page=1'),
(886, 7, '2024-06-01 15:55:44', 'GET: /master/po/editsupplier/Supplier=2'),
(887, 7, '2024-06-01 15:55:44', 'GET: /master/po/audit_logs/page=1'),
(888, 7, '2024-06-01 15:55:47', 'POST: /master/master/edit/editsupplier'),
(889, 7, '2024-06-01 15:55:48', 'GET: /master/po/editsupplier/Supplier=2'),
(890, 7, '2024-06-01 15:55:48', 'GET: /master/po/audit_logs/page=1'),
(891, 7, '2024-06-01 15:55:48', 'GET: /master/po/editsupplier/Supplier=2'),
(892, 7, '2024-06-01 15:55:49', 'GET: /master/po/audit_logs/page=1'),
(893, 7, '2024-06-01 16:05:05', 'GET: /master/po/editsupplier/Supplier=2'),
(894, 7, '2024-06-01 16:05:05', 'GET: /master/po/audit_logs/page=1'),
(895, 7, '2024-06-01 16:05:19', 'GET: /master/po/editsupplier/Supplier=2'),
(896, 7, '2024-06-01 16:05:19', 'GET: /master/po/audit_logs/page=1'),
(897, 7, '2024-06-01 16:05:32', 'POST: /master/master/edit/editsupplier'),
(898, 7, '2024-06-01 16:05:32', 'GET: /master/po/editsupplier/Supplier=2'),
(899, 7, '2024-06-01 16:05:32', 'GET: /master/po/audit_logs/page=1'),
(900, 7, '2024-06-01 16:06:26', 'GET: /master/po/editsupplier/Supplier=2'),
(901, 7, '2024-06-01 16:06:26', 'GET: /master/po/audit_logs/page=1'),
(902, 7, '2024-06-01 16:07:19', 'GET: /master/po/editsupplier/Supplier=2'),
(903, 7, '2024-06-01 16:07:19', 'GET: /master/po/audit_logs/page=1'),
(904, 7, '2024-06-01 16:07:20', 'GET: /master/po/editsupplier/Supplier=2'),
(905, 7, '2024-06-01 16:07:20', 'GET: /master/po/audit_logs/page=1'),
(906, 7, '2024-06-01 16:08:11', 'GET: /master/po/editsupplier/Supplier=2'),
(907, 7, '2024-06-01 16:08:12', 'GET: /master/po/audit_logs/page=1'),
(908, 7, '2024-06-01 16:08:24', 'GET: /master/po/editsupplier/Supplier=2'),
(909, 7, '2024-06-01 16:08:24', 'GET: /master/po/audit_logs/page=1'),
(910, 7, '2024-06-01 16:09:25', 'GET: /master/po/editsupplier/Supplier=2'),
(911, 7, '2024-06-01 16:09:25', 'GET: /master/po/audit_logs/page=1'),
(912, 7, '2024-06-01 16:09:28', 'POST: /master/master/edit/editsupplier'),
(913, 7, '2024-06-01 16:09:48', 'POST: /master/master/edit/editsupplier'),
(914, 7, '2024-06-01 16:09:48', 'GET: /master/po/editsupplier/Supplier=2'),
(915, 7, '2024-06-01 16:09:48', 'GET: /master/po/audit_logs/page=1'),
(916, 7, '2024-06-01 16:09:55', 'POST: /master/master/edit/editsupplier'),
(917, 7, '2024-06-01 16:09:55', 'GET: /master/po/editsupplier/Supplier=2'),
(918, 7, '2024-06-01 16:09:55', 'GET: /master/po/audit_logs/page=1'),
(919, 7, '2024-06-01 16:12:24', 'GET: /master/po/editsupplier/Supplier=2'),
(920, 7, '2024-06-01 16:12:24', 'GET: /master/po/audit_logs/page=1'),
(921, 7, '2024-06-01 16:12:50', 'GET: /master/po/editsupplier/Supplier=2'),
(922, 7, '2024-06-01 16:12:50', 'GET: /master/po/audit_logs/page=1'),
(923, 7, '2024-06-01 16:13:00', 'GET: /master/po/editsupplier/Supplier=2'),
(924, 7, '2024-06-01 16:13:01', 'GET: /master/po/audit_logs/page=1'),
(925, 7, '2024-06-01 16:15:48', 'GET: /master/po/editsupplier/Supplier=2'),
(926, 7, '2024-06-01 16:15:48', 'GET: /master/po/audit_logs/page=1'),
(927, 7, '2024-06-01 16:15:58', 'POST: /master/master/edit/editsupplier'),
(928, 7, '2024-06-01 16:15:58', 'GET: /master/po/editsupplier/Supplier=2'),
(929, 7, '2024-06-01 16:15:58', 'GET: /master/po/audit_logs/page=1'),
(930, 7, '2024-06-01 16:16:03', 'GET: /master/po/editsupplier/Supplier=2'),
(931, 7, '2024-06-01 16:16:03', 'GET: /master/po/audit_logs/page=1'),
(932, 7, '2024-06-01 16:16:30', 'GET: /master/po/editsupplier/Supplier=2'),
(933, 7, '2024-06-01 16:16:30', 'GET: /master/po/audit_logs/page=1'),
(934, 7, '2024-06-01 16:16:36', 'POST: /master/master/edit/editsupplier'),
(935, 7, '2024-06-01 16:16:36', 'GET: /master/po/editsupplier/Supplier=2'),
(936, 7, '2024-06-01 16:16:36', 'GET: /master/po/audit_logs/page=1'),
(937, 7, '2024-06-01 16:16:46', 'POST: /master/master/edit/editsupplier'),
(938, 7, '2024-06-01 16:16:46', 'GET: /master/po/editsupplier/Supplier=2'),
(939, 7, '2024-06-01 16:16:46', 'GET: /master/po/audit_logs/page=1'),
(940, 7, '2024-06-01 16:16:53', 'GET: /master/po/editsupplier/Supplier=2'),
(941, 7, '2024-06-01 16:16:53', 'GET: /master/po/audit_logs/page=1'),
(942, 7, '2024-06-01 16:17:38', 'POST: /master/master/delete/product'),
(943, 7, '2024-06-01 16:17:38', 'GET: /master/po/editsupplier/Supplier=2'),
(944, 7, '2024-06-01 16:17:38', 'GET: /master/po/audit_logs/page=1'),
(945, 7, '2024-06-01 16:17:50', 'POST: /master/master/edit/editsupplier'),
(946, 7, '2024-06-01 16:17:50', 'GET: /master/po/editsupplier/Supplier=2'),
(947, 7, '2024-06-01 16:17:50', 'GET: /master/po/audit_logs/page=1'),
(948, 7, '2024-06-01 16:17:55', 'GET: /master/po/viewsupplier/Supplier=3'),
(949, 7, '2024-06-01 16:17:55', 'GET: /master/po/audit_logs/page=1'),
(950, 7, '2024-06-01 16:17:57', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(951, 7, '2024-06-01 16:17:57', 'GET: /master/po/audit_logs/page=1'),
(952, 7, '2024-06-01 16:18:13', 'GET: /master/po/viewsupplierproduct/Supplier=1'),
(953, 7, '2024-06-01 16:18:13', 'GET: /master/po/audit_logs/page=1'),
(954, 7, '2024-06-01 16:18:18', 'GET: /master/po/viewsupplierproduct/Supplier=1'),
(955, 7, '2024-06-01 16:18:18', 'GET: /master/po/audit_logs/page=1'),
(956, 7, '2024-06-01 16:18:20', 'GET: /master/po/viewsupplierproduct/Supplier=1'),
(957, 7, '2024-06-01 16:18:20', 'GET: /master/po/audit_logs/page=1'),
(958, 7, '2024-06-01 16:28:36', 'GET: /master/po/viewsupplierproduct/Supplier=1'),
(959, 7, '2024-06-01 16:28:36', 'GET: /master/po/audit_logs/page=1'),
(960, 7, '2024-06-01 16:28:37', 'GET: /master/po/audit_logs/page=1'),
(961, 7, '2024-06-01 16:28:37', 'GET: /master/po/audit_logs/page=1'),
(962, 7, '2024-06-01 16:28:38', 'GET: /master/po/audit_logs/page=1'),
(963, 7, '2024-06-01 16:28:38', 'GET: /master/po/audit_logs/page=1'),
(964, 7, '2024-06-01 16:28:50', 'GET: /master/po/pondo/page=1'),
(965, 7, '2024-06-01 16:28:50', 'GET: /master/po/audit_logs/page=1'),
(966, 7, '2024-06-01 16:28:55', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(967, 7, '2024-06-01 16:28:55', 'GET: /master/po/audit_logs/page=1'),
(968, 7, '2024-06-01 16:29:26', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(969, 7, '2024-06-01 16:29:26', 'GET: /master/po/audit_logs/page=1'),
(970, 7, '2024-06-01 16:29:29', 'GET: /master/po/editsupplier/Supplier=2'),
(971, 7, '2024-06-01 16:29:29', 'GET: /master/po/audit_logs/page=1'),
(972, 7, '2024-06-01 16:29:34', 'GET: /master/po/audit_logs/page=1'),
(973, 7, '2024-06-01 16:29:34', 'GET: /master/po/audit_logs/page=1'),
(974, 7, '2024-06-01 16:29:43', 'GET: /master/po/pondo/page=1'),
(975, 7, '2024-06-01 16:29:43', 'GET: /master/po/audit_logs/page=1'),
(976, 7, '2024-06-01 16:29:45', 'GET: /master/po/viewsupplierproduct/Supplier=1'),
(977, 7, '2024-06-01 16:29:45', 'GET: /master/po/audit_logs/page=1'),
(978, 7, '2024-06-01 16:29:50', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(979, 7, '2024-06-01 16:29:50', 'GET: /master/po/audit_logs/page=1'),
(980, 7, '2024-06-01 16:30:21', 'GET: /master/po/editsupplier/Supplier=2'),
(981, 7, '2024-06-01 16:30:21', 'GET: /master/po/audit_logs/page=1'),
(982, 7, '2024-06-01 16:30:22', 'GET: /master/po/editsupplier/Supplier=2'),
(983, 7, '2024-06-01 16:30:22', 'GET: /master/po/audit_logs/page=1'),
(984, 7, '2024-06-01 16:30:33', 'GET: /master/po/editsupplier/Supplier=2'),
(985, 7, '2024-06-01 16:30:33', 'GET: /master/po/audit_logs/page=1'),
(986, 7, '2024-06-01 16:30:47', 'GET: /master/po/editsupplier/Supplier=2'),
(987, 7, '2024-06-01 16:30:47', 'GET: /master/po/audit_logs/page=1'),
(988, 7, '2024-06-01 16:30:56', 'GET: /master/po/editsupplier/Supplier=2'),
(989, 7, '2024-06-01 16:30:56', 'GET: /master/po/audit_logs/page=1'),
(990, 7, '2024-06-01 16:31:07', 'POST: /master/master/edit/editsupplier'),
(991, 7, '2024-06-01 16:31:07', 'GET: /master/po/editsupplier/Supplier=2'),
(992, 7, '2024-06-01 16:31:07', 'GET: /master/po/audit_logs/page=1'),
(993, 7, '2024-06-01 16:31:14', 'POST: /master/master/edit/editsupplier'),
(994, 7, '2024-06-01 16:31:14', 'GET: /master/po/editsupplier/Supplier=2'),
(995, 7, '2024-06-01 16:31:14', 'GET: /master/po/audit_logs/page=1'),
(996, 7, '2024-06-01 16:36:41', 'GET: /master/po/editsupplier/Supplier=2'),
(997, 7, '2024-06-01 16:36:41', 'GET: /master/po/audit_logs/page=1'),
(998, 7, '2024-06-01 16:36:42', 'GET: /master/po/audit_logs/page=1'),
(999, 7, '2024-06-01 16:36:42', 'GET: /master/po/audit_logs/page=1'),
(1000, 7, '2024-06-01 16:36:44', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(1001, 7, '2024-06-01 16:36:45', 'GET: /master/po/audit_logs/page=1'),
(1002, 7, '2024-06-01 16:37:00', 'GET: /master/po/editsupplier/Supplier=2'),
(1003, 7, '2024-06-01 16:37:00', 'GET: /master/po/audit_logs/page=1'),
(1004, 7, '2024-06-01 16:37:08', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1005, 7, '2024-06-01 16:37:08', 'GET: /master/po/audit_logs/page=1'),
(1006, 7, '2024-06-01 16:37:25', 'GET: /master/po/editsupplier/Supplier=2'),
(1007, 7, '2024-06-01 16:37:25', 'GET: /master/po/audit_logs/page=1'),
(1008, 7, '2024-06-01 16:37:34', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1009, 7, '2024-06-01 16:37:34', 'GET: /master/po/audit_logs/page=1'),
(1010, 7, '2024-06-01 16:38:08', 'GET: /master/po/pondo/page=1'),
(1011, 7, '2024-06-01 16:38:08', 'GET: /master/po/audit_logs/page=1'),
(1012, 7, '2024-06-01 16:38:09', 'GET: /master/po/audit_logs/page=1'),
(1013, 7, '2024-06-01 16:38:09', 'GET: /master/po/audit_logs/page=1'),
(1014, 7, '2024-06-01 16:38:12', 'GET: /master/po/viewsupplier/Supplier=3'),
(1015, 7, '2024-06-01 16:38:12', 'GET: /master/po/audit_logs/page=1'),
(1016, 7, '2024-06-01 16:38:14', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1017, 7, '2024-06-01 16:38:14', 'GET: /master/po/audit_logs/page=1'),
(1018, 7, '2024-06-01 16:38:25', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1019, 7, '2024-06-01 16:38:25', 'GET: /master/po/audit_logs/page=1'),
(1020, 7, '2024-06-01 16:38:28', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1021, 7, '2024-06-01 16:38:28', 'GET: /master/po/audit_logs/page=1'),
(1022, 7, '2024-06-01 16:38:45', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1023, 7, '2024-06-01 16:38:45', 'GET: /master/po/audit_logs/page=1'),
(1024, 7, '2024-06-01 16:39:37', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1025, 7, '2024-06-01 16:39:37', 'GET: /master/po/audit_logs/page=1'),
(1026, 7, '2024-06-01 16:39:38', 'GET: /master/po/addbulk/Supplier=2'),
(1027, 7, '2024-06-01 16:39:38', 'GET: /master/po/audit_logs/page=1'),
(1028, 7, '2024-06-01 16:39:43', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1029, 7, '2024-06-01 16:39:43', 'GET: /master/po/audit_logs/page=1'),
(1030, 7, '2024-06-01 16:42:02', 'POST: /master/logout/user'),
(1031, 1, '2024-06-01 16:42:05', 'POST: /master/login'),
(1032, 7, '2024-06-01 16:43:18', 'POST: /master/login'),
(1033, 7, '2024-06-01 16:43:18', 'GET: /master/po/audit_logs/page=1'),
(1034, 7, '2024-06-01 16:43:18', 'GET: /master/po/audit_logs/page=1'),
(1035, 7, '2024-06-01 16:45:19', 'GET: /master/po/audit_logs/page=1'),
(1036, 7, '2024-06-01 16:45:19', 'GET: /master/po/audit_logs/page=1'),
(1037, 7, '2024-06-01 16:45:21', 'GET: /master/po/audit_logs/page=1'),
(1038, 7, '2024-06-01 16:45:21', 'GET: /master/po/audit_logs/page=1'),
(1039, 7, '2024-06-01 16:45:49', 'GET: /master/po/viewsupplierproduct/Supplier=1'),
(1040, 7, '2024-06-01 16:45:49', 'GET: /master/po/audit_logs/page=1'),
(1041, 7, '2024-06-01 16:45:52', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1042, 7, '2024-06-01 16:45:53', 'GET: /master/po/audit_logs/page=1'),
(1043, 7, '2024-06-01 16:48:53', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1044, 7, '2024-06-01 16:48:54', 'GET: /master/po/audit_logs/page=1'),
(1045, 7, '2024-06-01 16:57:08', 'GET: /master/po/audit_logs/page=1'),
(1046, 7, '2024-06-01 16:57:08', 'GET: /master/po/audit_logs/page=1'),
(1047, 7, '2024-06-01 16:57:21', 'GET: /master/po/audit_logs/page=1'),
(1048, 7, '2024-06-01 16:57:26', 'GET: /master/po/audit_logs/page=1'),
(1049, 7, '2024-06-01 16:57:30', 'GET: /master/po/audit_logs/page=1'),
(1050, 7, '2024-06-01 16:57:33', 'GET: /master/po/audit_logs/page=1'),
(1051, 7, '2024-06-01 16:57:33', 'GET: /master/po/audit_logs/page=1'),
(1052, 7, '2024-06-01 16:57:39', 'GET: /master/po/audit_logs/page=1'),
(1053, 7, '2024-06-01 16:57:43', 'GET: /master/po/audit_logs/page=1'),
(1054, 7, '2024-06-01 16:57:49', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1055, 7, '2024-06-01 16:57:49', 'GET: /master/po/audit_logs/page=1'),
(1056, 7, '2024-06-01 16:57:52', 'GET: /master/po/editsupplier/Supplier=2'),
(1057, 7, '2024-06-01 16:57:52', 'GET: /master/po/audit_logs/page=1'),
(1058, 7, '2024-06-01 16:58:04', 'GET: /master/po/audit_logs/page=1'),
(1059, 7, '2024-06-01 16:58:59', 'GET: /master/po/audit_logs/page=1'),
(1060, 7, '2024-06-01 16:58:59', 'GET: /master/po/audit_logs/page=1'),
(1061, 7, '2024-06-01 16:59:17', 'GET: /master/po/pondo/page=1'),
(1062, 7, '2024-06-01 16:59:18', 'GET: /master/po/audit_logs/page=1'),
(1063, 7, '2024-06-01 16:59:21', 'GET: /master/po/pondo/page=2'),
(1064, 7, '2024-06-01 16:59:21', 'GET: /master/po/audit_logs/page=1'),
(1065, 7, '2024-06-01 16:59:23', 'GET: /master/po/pondo/page=1'),
(1066, 7, '2024-06-01 16:59:23', 'GET: /master/po/audit_logs/page=1'),
(1067, 7, '2024-06-01 16:59:24', 'GET: /master/po/audit_logs/page=1'),
(1068, 7, '2024-06-01 16:59:24', 'GET: /master/po/audit_logs/page=1'),
(1069, 7, '2024-06-01 16:59:26', 'GET: /master/po/audit_logs/page=2'),
(1070, 7, '2024-06-01 16:59:26', 'GET: /master/po/audit_logs/page=1'),
(1071, 7, '2024-06-01 16:59:26', 'GET: /master/po/audit_logs/page=4'),
(1072, 7, '2024-06-01 16:59:26', 'GET: /master/po/audit_logs/page=1'),
(1073, 7, '2024-06-01 16:59:27', 'GET: /master/po/audit_logs/page=6'),
(1074, 7, '2024-06-01 16:59:28', 'GET: /master/po/audit_logs/page=1'),
(1075, 7, '2024-06-01 16:59:33', 'GET: /master/po/editsupplier/Supplier=2'),
(1076, 7, '2024-06-01 16:59:33', 'GET: /master/po/audit_logs/page=1'),
(1077, 7, '2024-06-01 16:59:37', 'GET: /master/po/pondo/page=1'),
(1078, 7, '2024-06-01 16:59:37', 'GET: /master/po/audit_logs/page=1'),
(1079, 7, '2024-06-01 16:59:39', 'GET: /master/po/audit_logs/page=1'),
(1080, 7, '2024-06-01 16:59:39', 'GET: /master/po/audit_logs/page=1'),
(1081, 7, '2024-06-01 16:59:41', 'GET: /master/po/editsupplier/Supplier=3'),
(1082, 7, '2024-06-01 16:59:41', 'GET: /master/po/audit_logs/page=1'),
(1083, 7, '2024-06-01 16:59:47', 'GET: /master/po/audit_logs/page=1'),
(1084, 7, '2024-06-01 16:59:47', 'GET: /master/po/audit_logs/page=1'),
(1085, 7, '2024-06-01 16:59:50', 'GET: /master/po/audit_logs/page=1'),
(1086, 7, '2024-06-01 16:59:50', 'GET: /master/po/audit_logs/page=1'),
(1087, 7, '2024-06-01 16:59:53', 'POST: /master/clock-in'),
(1088, 7, '2024-06-01 16:59:53', 'GET: /master/po/audit_logs/page=1'),
(1089, 7, '2024-06-01 16:59:53', 'GET: /master/po/audit_logs/page=1'),
(1090, 7, '2024-06-01 16:59:57', 'POST: /master/clock-out'),
(1091, 7, '2024-06-01 16:59:57', 'GET: /master/po/audit_logs/page=1'),
(1092, 7, '2024-06-01 16:59:57', 'GET: /master/po/audit_logs/page=1'),
(1093, 1, '2024-06-02 04:05:57', 'POST: /master/login'),
(1094, 7, '2024-06-02 04:08:38', 'POST: /master/login'),
(1095, 7, '2024-06-02 04:08:38', 'GET: /master/po/audit_logs/page=1'),
(1096, 7, '2024-06-02 04:08:38', 'GET: /master/po/audit_logs/page=1'),
(1097, 7, '2024-06-02 04:09:33', 'GET: /master/po/audit_logs/page=1'),
(1098, 7, '2024-06-02 04:09:34', 'GET: /master/po/audit_logs/page=1'),
(1099, 7, '2024-06-02 04:09:36', 'POST: /master/auditlogSearch'),
(1100, 7, '2024-06-02 04:09:37', 'GET: /master/po/audit_logs/page=1'),
(1101, 7, '2024-06-02 04:09:37', 'GET: /master/po/audit_logs/page=1'),
(1102, 7, '2024-06-02 04:09:44', 'POST: /master/auditlogSearch'),
(1103, 7, '2024-06-02 04:09:44', 'GET: /master/po/audit_logs/page=1'),
(1104, 7, '2024-06-02 04:09:44', 'GET: /master/po/audit_logs/page=1'),
(1105, 7, '2024-06-02 04:09:46', 'GET: /master/po/audit_logs/page=1'),
(1106, 7, '2024-06-02 04:09:46', 'GET: /master/po/audit_logs/page=1'),
(1107, 7, '2024-06-02 04:09:49', 'POST: /master/auditlogSearch'),
(1108, 7, '2024-06-02 04:09:49', 'GET: /master/po/audit_logs/page=1'),
(1109, 7, '2024-06-02 04:09:49', 'GET: /master/po/audit_logs/page=1'),
(1110, 7, '2024-06-02 04:09:52', 'POST: /master/clock-in'),
(1111, 7, '2024-06-02 04:09:53', 'GET: /master/po/audit_logs/page=1'),
(1112, 7, '2024-06-02 04:09:53', 'GET: /master/po/audit_logs/page=1'),
(1113, 7, '2024-06-02 04:10:02', 'GET: /master/po/audit_logs/page=1'),
(1114, 7, '2024-06-02 04:10:02', 'GET: /master/po/audit_logs/page=1'),
(1115, 7, '2024-06-02 04:11:14', 'GET: /master/po/viewsupplier/Supplier=1'),
(1116, 7, '2024-06-02 04:11:14', 'GET: /master/po/audit_logs/page=1'),
(1117, 7, '2024-06-02 04:11:16', 'GET: /master/po/viewsupplier/Supplier=2'),
(1118, 7, '2024-06-02 04:11:16', 'GET: /master/po/audit_logs/page=1'),
(1119, 7, '2024-06-02 04:11:19', 'GET: /master/po/viewsupplier/Supplier=3'),
(1120, 7, '2024-06-02 04:11:19', 'GET: /master/po/audit_logs/page=1'),
(1121, 7, '2024-06-02 04:12:47', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1122, 7, '2024-06-02 04:12:47', 'GET: /master/po/audit_logs/page=1'),
(1123, 7, '2024-06-02 04:12:56', 'POST: /master/placeorder/supplier/'),
(1124, 7, '2024-06-02 04:12:58', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1125, 7, '2024-06-02 04:12:58', 'GET: /master/po/audit_logs/page=1'),
(1126, 7, '2024-06-02 04:13:01', 'GET: /master/po/audit_logs/page=1'),
(1127, 7, '2024-06-02 04:13:07', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1128, 7, '2024-06-02 04:13:07', 'GET: /master/po/audit_logs/page=1'),
(1129, 7, '2024-06-02 04:13:15', 'POST: /master/placeorder/supplier/'),
(1130, 7, '2024-06-02 04:13:17', 'GET: /master/po/audit_logs/page=1'),
(1131, 7, '2024-06-02 04:13:42', 'GET: /master/po/audit_logs/page=1'),
(1132, 7, '2024-06-02 04:13:45', 'POST: /master/master/complete/orderDetail'),
(1133, 7, '2024-06-02 04:13:55', 'GET: /master/po/audit_logs/page=1'),
(1134, 7, '2024-06-02 04:14:23', 'GET: /master/po/editsupplier/Supplier=2'),
(1135, 7, '2024-06-02 04:14:23', 'GET: /master/po/audit_logs/page=1'),
(1136, 7, '2024-06-02 04:17:28', 'POST: /master/master/edit/editsupplier'),
(1137, 7, '2024-06-02 04:17:28', 'GET: /master/po/editsupplier/Supplier=2'),
(1138, 7, '2024-06-02 04:17:28', 'GET: /master/po/audit_logs/page=1'),
(1139, 7, '2024-06-02 04:17:31', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1140, 7, '2024-06-02 04:17:31', 'GET: /master/po/audit_logs/page=1'),
(1141, 7, '2024-06-02 04:17:36', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1142, 7, '2024-06-02 04:17:36', 'GET: /master/po/audit_logs/page=1'),
(1143, 7, '2024-06-02 04:18:39', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1144, 7, '2024-06-02 04:18:39', 'GET: /master/po/audit_logs/page=1'),
(1145, 7, '2024-06-02 04:18:42', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1146, 7, '2024-06-02 04:18:42', 'GET: /master/po/audit_logs/page=1'),
(1147, 7, '2024-06-02 04:18:43', 'GET: /master/po/editsupplier/Supplier=2'),
(1148, 7, '2024-06-02 04:18:43', 'GET: /master/po/audit_logs/page=1'),
(1149, 7, '2024-06-02 04:18:49', 'POST: /master/master/edit/editsupplier'),
(1150, 7, '2024-06-02 04:22:23', 'POST: /master/master/edit/editsupplier'),
(1151, 7, '2024-06-02 04:22:23', 'GET: /master/po/editsupplier/Supplier=2'),
(1152, 7, '2024-06-02 04:22:23', 'GET: /master/po/audit_logs/page=1'),
(1153, 7, '2024-06-02 04:22:27', 'GET: /master/po/viewsupplier/Supplier=2'),
(1154, 7, '2024-06-02 04:22:27', 'GET: /master/po/audit_logs/page=1'),
(1155, 7, '2024-06-02 04:22:29', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1156, 7, '2024-06-02 04:22:29', 'GET: /master/po/audit_logs/page=1'),
(1157, 7, '2024-06-02 04:22:34', 'GET: /master/po/viewsupplier/Supplier=3'),
(1158, 7, '2024-06-02 04:22:34', 'GET: /master/po/audit_logs/page=1'),
(1159, 7, '2024-06-02 04:22:36', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(1160, 7, '2024-06-02 04:22:36', 'GET: /master/po/audit_logs/page=1'),
(1161, 7, '2024-06-02 04:22:38', 'GET: /master/po/editsupplier/Supplier=3'),
(1162, 7, '2024-06-02 04:22:39', 'GET: /master/po/audit_logs/page=1'),
(1163, 7, '2024-06-02 04:22:42', 'POST: /master/master/edit/editsupplier'),
(1164, 7, '2024-06-02 04:22:42', 'GET: /master/po/editsupplier/Supplier=3'),
(1165, 7, '2024-06-02 04:22:42', 'GET: /master/po/audit_logs/page=1'),
(1166, 7, '2024-06-02 04:22:44', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(1167, 7, '2024-06-02 04:22:44', 'GET: /master/po/audit_logs/page=1'),
(1168, 7, '2024-06-02 04:22:46', 'GET: /master/po/editsupplier/Supplier=3'),
(1169, 7, '2024-06-02 04:22:46', 'GET: /master/po/audit_logs/page=1'),
(1170, 7, '2024-06-02 04:22:51', 'POST: /master/master/edit/editsupplier'),
(1171, 7, '2024-06-02 04:22:51', 'GET: /master/po/editsupplier/Supplier=3'),
(1172, 7, '2024-06-02 04:22:51', 'GET: /master/po/audit_logs/page=1'),
(1173, 7, '2024-06-02 04:23:56', 'GET: /master/po/editsupplier/Supplier=3'),
(1174, 7, '2024-06-02 04:23:56', 'GET: /master/po/audit_logs/page=1'),
(1175, 7, '2024-06-02 04:24:02', 'GET: /master/po/audit_logs/page=1'),
(1176, 7, '2024-06-02 04:24:29', 'GET: /master/po/pondo/page=1'),
(1177, 7, '2024-06-02 04:24:29', 'GET: /master/po/audit_logs/page=1'),
(1178, 7, '2024-06-02 04:24:31', 'GET: /master/po/pondo/page=1'),
(1179, 7, '2024-06-02 04:24:31', 'GET: /master/po/audit_logs/page=1'),
(1180, 7, '2024-06-02 04:24:33', 'GET: /master/po/audit_logs/page=1'),
(1181, 7, '2024-06-02 04:24:37', 'GET: /master/po/audit_logs/page=1'),
(1182, 7, '2024-06-02 04:24:41', 'GET: /master/po/audit_logs/page=1'),
(1183, 7, '2024-06-02 04:25:22', 'GET: /master/po/audit_logs/page=1'),
(1184, 7, '2024-06-02 04:25:50', 'GET: /master/po/pondo/page=1'),
(1185, 7, '2024-06-02 04:25:50', 'GET: /master/po/audit_logs/page=1'),
(1186, 7, '2024-06-02 04:25:52', 'GET: /master/po/pondo/page=2'),
(1187, 7, '2024-06-02 04:25:52', 'GET: /master/po/audit_logs/page=1'),
(1188, 7, '2024-06-02 04:25:54', 'GET: /master/po/pondo/page=1'),
(1189, 7, '2024-06-02 04:25:54', 'GET: /master/po/audit_logs/page=1'),
(1190, 7, '2024-06-02 04:25:59', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(1191, 7, '2024-06-02 04:26:00', 'GET: /master/po/audit_logs/page=1'),
(1192, 7, '2024-06-02 04:26:02', 'GET: /master/po/pondo/page=1'),
(1193, 7, '2024-06-02 04:26:02', 'GET: /master/po/audit_logs/page=1'),
(1194, 7, '2024-06-02 04:26:04', 'GET: /master/po/audit_logs/page=1'),
(1195, 7, '2024-06-02 04:26:35', 'GET: /master/po/audit_logs/page=1'),
(1196, 7, '2024-06-02 04:27:00', 'GET: /master/po/audit_logs/page=1'),
(1197, 7, '2024-06-02 04:27:12', 'GET: /master/po/audit_logs/page=1'),
(1198, 7, '2024-06-02 04:27:19', 'GET: /master/po/audit_logs/page=1'),
(1199, 7, '2024-06-02 04:27:21', 'GET: /master/po/audit_logs/page=1'),
(1200, 7, '2024-06-02 04:27:26', 'GET: /master/po/audit_logs/page=1'),
(1201, 7, '2024-06-02 04:27:29', 'GET: /master/po/audit_logs/page=1'),
(1202, 7, '2024-06-02 04:27:36', 'GET: /master/po/audit_logs/page=1'),
(1203, 7, '2024-06-02 04:27:43', 'GET: /master/po/audit_logs/page=1'),
(1204, 7, '2024-06-02 04:27:47', 'GET: /master/po/audit_logs/page=1'),
(1205, 7, '2024-06-02 04:27:57', 'GET: /master/po/audit_logs/page=1'),
(1206, 7, '2024-06-02 04:27:59', 'GET: /master/po/audit_logs/page=1'),
(1207, 7, '2024-06-02 04:28:08', 'GET: /master/po/audit_logs/page=1'),
(1208, 7, '2024-06-02 04:28:28', 'GET: /master/po/audit_logs/page=1'),
(1209, 7, '2024-06-02 04:29:45', 'GET: /master/po/audit_logs/page=1'),
(1210, 7, '2024-06-02 04:30:08', 'GET: /master/po/audit_logs/page=1'),
(1211, 7, '2024-06-02 04:30:11', 'GET: /master/po/pondo/page=1'),
(1212, 7, '2024-06-02 04:30:11', 'GET: /master/po/audit_logs/page=1'),
(1213, 7, '2024-06-02 04:30:15', 'GET: /master/po/audit_logs/page=1'),
(1214, 7, '2024-06-02 04:30:20', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(1215, 7, '2024-06-02 04:30:20', 'GET: /master/po/audit_logs/page=1'),
(1216, 7, '2024-06-02 04:30:43', 'GET: /master/po/viewsupplierproduct/Supplier=1'),
(1217, 7, '2024-06-02 04:30:43', 'GET: /master/po/audit_logs/page=1'),
(1218, 7, '2024-06-02 04:30:47', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(1219, 7, '2024-06-02 04:30:47', 'GET: /master/po/audit_logs/page=1'),
(1220, 7, '2024-06-02 04:31:35', 'GET: /master/po/audit_logs/page=1'),
(1221, 7, '2024-06-02 04:32:04', 'GET: /master/po/audit_logs/page=1'),
(1222, 7, '2024-06-02 04:32:05', 'GET: /master/po/audit_logs/page=1'),
(1223, 7, '2024-06-02 04:32:22', 'GET: /master/po/audit_logs/page=1'),
(1224, 7, '2024-06-02 04:32:34', 'GET: /master/po/audit_logs/page=1'),
(1225, 7, '2024-06-02 04:32:44', 'GET: /master/po/audit_logs/page=1'),
(1226, 7, '2024-06-02 04:33:10', 'GET: /master/po/audit_logs/page=1'),
(1227, 7, '2024-06-02 04:33:15', 'GET: /master/po/audit_logs/page=1'),
(1228, 7, '2024-06-02 04:34:20', 'GET: /master/po/audit_logs/page=1'),
(1229, 7, '2024-06-02 04:34:24', 'GET: /master/po/audit_logs/page=1'),
(1230, 7, '2024-06-02 04:34:26', 'GET: /master/po/audit_logs/page=1'),
(1231, 7, '2024-06-02 04:34:49', 'GET: /master/po/audit_logs/page=1'),
(1232, 7, '2024-06-02 04:34:56', 'GET: /master/po/audit_logs/page=1'),
(1233, 7, '2024-06-02 04:35:21', 'GET: /master/po/audit_logs/page=1'),
(1234, 7, '2024-06-02 04:35:21', 'GET: /master/po/audit_logs/page=1'),
(1235, 7, '2024-06-02 04:35:32', 'GET: /master/po/audit_logs/page=1'),
(1236, 7, '2024-06-02 04:35:51', 'GET: /master/po/audit_logs/page=1'),
(1237, 7, '2024-06-02 04:36:35', 'GET: /master/po/audit_logs/page=1'),
(1238, 7, '2024-06-02 04:37:12', 'GET: /master/po/audit_logs/page=1'),
(1239, 7, '2024-06-02 04:38:13', 'GET: /master/po/audit_logs/page=1'),
(1240, 7, '2024-06-02 04:38:15', 'GET: /master/po/audit_logs/page=1'),
(1241, 7, '2024-06-02 04:38:17', 'GET: /master/po/audit_logs/page=1'),
(1242, 7, '2024-06-02 04:38:20', 'GET: /master/po/pondo/page=1'),
(1243, 7, '2024-06-02 04:38:20', 'GET: /master/po/audit_logs/page=1'),
(1244, 7, '2024-06-02 04:38:24', 'GET: /master/po/audit_logs/page=1'),
(1245, 7, '2024-06-02 04:38:29', 'GET: /master/po/audit_logs/page=1'),
(1246, 7, '2024-06-02 04:38:32', 'GET: /master/po/audit_logs/page=1'),
(1247, 7, '2024-06-02 04:38:36', 'GET: /master/po/audit_logs/page=1'),
(1248, 7, '2024-06-02 04:38:52', 'GET: /master/po/audit_logs/page=1'),
(1249, 7, '2024-06-02 04:38:58', 'GET: /master/po/audit_logs/page=1'),
(1250, 7, '2024-06-02 04:39:06', 'GET: /master/po/audit_logs/page=1'),
(1251, 7, '2024-06-02 04:39:08', 'GET: /master/po/audit_logs/page=1'),
(1252, 7, '2024-06-02 04:39:14', 'GET: /master/po/audit_logs/page=1'),
(1253, 7, '2024-06-02 04:39:17', 'GET: /master/po/audit_logs/page=1'),
(1254, 7, '2024-06-02 04:42:34', 'GET: /master/po/audit_logs/page=1'),
(1255, 7, '2024-06-02 04:43:07', 'GET: /master/po/audit_logs/page=1'),
(1256, 7, '2024-06-02 04:43:11', 'POST: /master/master/complete/orderDetail'),
(1257, 7, '2024-06-02 04:43:13', 'GET: /master/po/pondo/page=1'),
(1258, 7, '2024-06-02 04:43:13', 'GET: /master/po/audit_logs/page=1'),
(1259, 7, '2024-06-02 04:43:19', 'GET: /master/po/audit_logs/page=1'),
(1260, 7, '2024-06-02 04:43:25', 'GET: /master/po/audit_logs/page=1'),
(1261, 7, '2024-06-02 04:43:31', 'GET: /master/po/pondo/page=1'),
(1262, 7, '2024-06-02 04:43:31', 'GET: /master/po/audit_logs/page=1'),
(1263, 7, '2024-06-02 04:43:33', 'GET: /master/po/audit_logs/page=1'),
(1264, 7, '2024-06-02 04:43:37', 'GET: /master/po/audit_logs/page=1'),
(1265, 7, '2024-06-02 04:43:41', 'POST: /master/master/complete/orderDetail'),
(1266, 7, '2024-06-02 04:43:42', 'GET: /master/po/pondo/page=1'),
(1267, 7, '2024-06-02 04:43:42', 'GET: /master/po/audit_logs/page=1'),
(1268, 7, '2024-06-02 04:43:49', 'GET: /master/po/audit_logs/page=1'),
(1269, 7, '2024-06-02 04:43:53', 'GET: /master/po/audit_logs/page=1'),
(1270, 7, '2024-06-02 04:43:59', 'GET: /master/po/audit_logs/page=1'),
(1271, 7, '2024-06-02 04:43:59', 'GET: /master/po/audit_logs/page=1'),
(1272, 7, '2024-06-02 04:44:00', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1273, 7, '2024-06-02 04:44:01', 'GET: /master/po/audit_logs/page=1'),
(1274, 7, '2024-06-02 04:44:03', 'POST: /master/placeorder/supplier/'),
(1275, 7, '2024-06-02 04:44:15', 'POST: /master/master/complete/orderDetail'),
(1276, 7, '2024-06-02 04:44:29', 'GET: /master/po/audit_logs/page=1'),
(1277, 7, '2024-06-02 04:45:01', 'GET: /master/po/audit_logs/page=1'),
(1278, 7, '2024-06-02 04:45:17', 'GET: /master/po/audit_logs/page=1'),
(1279, 7, '2024-06-02 04:45:52', 'GET: /master/po/audit_logs/page=1'),
(1280, 7, '2024-06-02 04:46:20', 'GET: /master/po/audit_logs/page=1'),
(1281, 7, '2024-06-02 04:46:42', 'GET: /master/po/audit_logs/page=1'),
(1282, 7, '2024-06-02 04:47:22', 'GET: /master/po/audit_logs/page=1'),
(1283, 7, '2024-06-02 04:47:49', 'GET: /master/po/audit_logs/page=1'),
(1284, 7, '2024-06-02 04:47:53', 'GET: /master/po/audit_logs/page=1'),
(1285, 7, '2024-06-02 04:47:55', 'GET: /master/po/audit_logs/page=1'),
(1286, 7, '2024-06-02 04:47:56', 'GET: /master/po/audit_logs/page=1'),
(1287, 7, '2024-06-02 04:47:59', 'GET: /master/po/audit_logs/page=1'),
(1288, 7, '2024-06-02 04:48:01', 'GET: /master/po/audit_logs/page=1'),
(1289, 7, '2024-06-02 04:49:41', 'GET: /master/po/pondo/page=1'),
(1290, 7, '2024-06-02 04:49:41', 'GET: /master/po/audit_logs/page=1'),
(1291, 7, '2024-06-02 04:49:42', 'GET: /master/po/audit_logs/page=1'),
(1292, 7, '2024-06-02 04:49:42', 'GET: /master/po/audit_logs/page=1'),
(1293, 7, '2024-06-02 04:49:44', 'GET: /master/po/viewsupplier/Supplier=2'),
(1294, 7, '2024-06-02 04:49:44', 'GET: /master/po/audit_logs/page=1'),
(1295, 7, '2024-06-02 04:49:47', 'GET: /master/po/viewsupplier/Supplier=3'),
(1296, 7, '2024-06-02 04:49:48', 'GET: /master/po/audit_logs/page=1'),
(1297, 7, '2024-06-02 04:50:22', 'GET: /master/po/viewsupplier/Supplier=3'),
(1298, 7, '2024-06-02 04:50:22', 'GET: /master/po/audit_logs/page=1'),
(1299, 7, '2024-06-02 04:50:27', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1300, 7, '2024-06-02 04:50:27', 'GET: /master/po/audit_logs/page=1'),
(1301, 7, '2024-06-02 04:50:32', 'POST: /master/placeorder/supplier/'),
(1302, 7, '2024-06-02 04:50:43', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(1303, 7, '2024-06-02 04:50:43', 'GET: /master/po/audit_logs/page=1'),
(1304, 7, '2024-06-02 04:50:47', 'POST: /master/placeorder/supplier/'),
(1305, 7, '2024-06-02 04:50:50', 'POST: /master/master/complete/orderDetail'),
(1306, 7, '2024-06-02 04:50:54', 'GET: /master/po/audit_logs/page=1'),
(1307, 7, '2024-06-02 04:51:01', 'POST: /master/master/delay/orderDetail'),
(1308, 7, '2024-06-02 04:51:03', 'POST: /master/master/cancel/orderDetail'),
(1309, 7, '2024-06-02 04:51:06', 'GET: /master/po/audit_logs/page=1'),
(1310, 7, '2024-06-02 04:51:55', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(1311, 7, '2024-06-02 04:51:55', 'GET: /master/po/audit_logs/page=1'),
(1312, 7, '2024-06-02 04:51:57', 'POST: /master/placeorder/supplier/'),
(1313, 7, '2024-06-02 04:52:00', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1314, 7, '2024-06-02 04:52:00', 'GET: /master/po/audit_logs/page=1'),
(1315, 7, '2024-06-02 04:52:04', 'POST: /master/placeorder/supplier/'),
(1316, 7, '2024-06-02 04:52:05', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1317, 7, '2024-06-02 04:52:05', 'GET: /master/po/audit_logs/page=1'),
(1318, 7, '2024-06-02 04:52:10', 'POST: /master/placeorder/supplier/'),
(1319, 7, '2024-06-02 04:52:12', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1320, 7, '2024-06-02 04:52:12', 'GET: /master/po/audit_logs/page=1'),
(1321, 7, '2024-06-02 04:52:14', 'POST: /master/placeorder/supplier/'),
(1322, 7, '2024-06-02 04:52:16', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1323, 7, '2024-06-02 04:52:16', 'GET: /master/po/audit_logs/page=1'),
(1324, 7, '2024-06-02 04:52:26', 'POST: /master/placeorder/supplier/'),
(1325, 7, '2024-06-02 04:52:40', 'GET: /master/po/audit_logs/page=1'),
(1326, 7, '2024-06-02 04:52:45', 'GET: /master/po/pondo/page=1'),
(1327, 7, '2024-06-02 04:52:45', 'GET: /master/po/audit_logs/page=1'),
(1328, 7, '2024-06-02 04:52:47', 'GET: /master/po/pondo/page=1'),
(1329, 7, '2024-06-02 04:52:47', 'GET: /master/po/audit_logs/page=1'),
(1330, 7, '2024-06-02 04:52:48', 'GET: /master/po/pondo/page=1'),
(1331, 7, '2024-06-02 04:52:48', 'GET: /master/po/audit_logs/page=1'),
(1332, 7, '2024-06-02 04:52:49', 'GET: /master/po/pondo/page=1'),
(1333, 7, '2024-06-02 04:52:49', 'GET: /master/po/audit_logs/page=1'),
(1334, 7, '2024-06-02 04:52:49', 'GET: /master/po/pondo/page=1'),
(1335, 7, '2024-06-02 04:52:49', 'GET: /master/po/audit_logs/page=1'),
(1336, 7, '2024-06-02 04:52:49', 'GET: /master/po/pondo/page=1'),
(1337, 7, '2024-06-02 04:52:49', 'GET: /master/po/audit_logs/page=1'),
(1338, 7, '2024-06-02 04:52:50', 'GET: /master/po/pondo/page=1'),
(1339, 7, '2024-06-02 04:52:50', 'GET: /master/po/audit_logs/page=1'),
(1340, 7, '2024-06-02 04:52:50', 'GET: /master/po/pondo/page=1'),
(1341, 7, '2024-06-02 04:52:51', 'GET: /master/po/audit_logs/page=1'),
(1342, 7, '2024-06-02 04:52:52', 'GET: /master/po/pondo/page=1'),
(1343, 7, '2024-06-02 04:52:52', 'GET: /master/po/audit_logs/page=1'),
(1344, 7, '2024-06-02 04:52:52', 'GET: /master/po/pondo/page=1'),
(1345, 7, '2024-06-02 04:52:52', 'GET: /master/po/audit_logs/page=1'),
(1346, 7, '2024-06-02 04:52:52', 'GET: /master/po/pondo/page=1'),
(1347, 7, '2024-06-02 04:52:52', 'GET: /master/po/audit_logs/page=1'),
(1348, 7, '2024-06-02 04:52:53', 'GET: /master/po/pondo/page=1'),
(1349, 7, '2024-06-02 04:52:53', 'GET: /master/po/audit_logs/page=1'),
(1350, 7, '2024-06-02 04:52:58', 'GET: /master/po/pondo/page=1'),
(1351, 7, '2024-06-02 04:52:58', 'GET: /master/po/audit_logs/page=1'),
(1352, 7, '2024-06-02 04:53:05', 'POST: /master/master/delay/orderDetail'),
(1353, 7, '2024-06-02 04:53:08', 'POST: /master/master/complete/orderDetail'),
(1354, 7, '2024-06-02 04:53:25', 'GET: /master/po/audit_logs/page=1'),
(1355, 7, '2024-06-02 04:54:18', 'POST: /master/master/delay/orderDetail'),
(1356, 7, '2024-06-02 04:54:20', 'POST: /master/master/complete/orderDetail'),
(1357, 7, '2024-06-02 04:54:22', 'GET: /master/po/pondo/page=1'),
(1358, 7, '2024-06-02 04:54:22', 'GET: /master/po/audit_logs/page=1'),
(1359, 7, '2024-06-02 04:54:33', 'GET: /master/po/audit_logs/page=1'),
(1360, 7, '2024-06-02 04:54:38', 'GET: /master/po/audit_logs/page=1'),
(1361, 7, '2024-06-02 04:54:54', 'POST: /master/master/cancel/orderDetail'),
(1362, 7, '2024-06-02 04:54:55', 'GET: /master/po/pondo/page=1'),
(1363, 7, '2024-06-02 04:54:55', 'GET: /master/po/audit_logs/page=1'),
(1364, 7, '2024-06-02 04:54:58', 'GET: /master/po/audit_logs/page=1'),
(1365, 7, '2024-06-02 04:55:02', 'GET: /master/po/audit_logs/page=1'),
(1366, 7, '2024-06-02 04:55:24', 'GET: /master/po/audit_logs/page=1'),
(1367, 7, '2024-06-02 04:55:38', 'GET: /master/po/audit_logs/page=1'),
(1368, 7, '2024-06-02 05:04:23', 'POST: /master/master/delay/orderDetail'),
(1369, 7, '2024-06-02 05:08:56', 'GET: /master/po/pondo/page=1'),
(1370, 7, '2024-06-02 05:08:56', 'GET: /master/po/audit_logs/page=1'),
(1371, 7, '2024-06-02 05:08:58', 'GET: /master/po/pondo/page=1'),
(1372, 7, '2024-06-02 05:08:58', 'GET: /master/po/audit_logs/page=1'),
(1373, 7, '2024-06-02 05:19:51', 'GET: /master/po/audit_logs/page=1'),
(1374, 7, '2024-06-02 05:19:51', 'GET: /master/po/audit_logs/page=1'),
(1375, 7, '2024-06-02 05:19:58', 'GET: /master/po/pondo/page=1'),
(1376, 7, '2024-06-02 05:19:58', 'GET: /master/po/audit_logs/page=1'),
(1377, 7, '2024-06-02 05:19:59', 'GET: /master/po/pondo/page=1'),
(1378, 7, '2024-06-02 05:19:59', 'GET: /master/po/audit_logs/page=1'),
(1379, 7, '2024-06-02 05:20:02', 'GET: /master/po/audit_logs/page=1'),
(1380, 7, '2024-06-02 05:20:02', 'GET: /master/po/audit_logs/page=1'),
(1381, 7, '2024-06-02 05:20:04', 'GET: /master/po/pondo/page=1'),
(1382, 7, '2024-06-02 05:20:04', 'GET: /master/po/audit_logs/page=1'),
(1383, 7, '2024-06-02 05:20:16', 'GET: /master/po/audit_logs/page=1'),
(1384, 7, '2024-06-02 05:20:17', 'GET: /master/po/audit_logs/page=1'),
(1385, 7, '2024-06-02 05:20:19', 'GET: /master/po/audit_logs/page=1'),
(1386, 7, '2024-06-02 05:20:19', 'GET: /master/po/audit_logs/page=1'),
(1387, 7, '2024-06-02 05:20:51', 'GET: /master/po/audit_logs/page=1'),
(1388, 7, '2024-06-02 05:20:52', 'GET: /master/po/audit_logs/page=1'),
(1389, 7, '2024-06-02 05:21:00', 'GET: /master/po/audit_logs/page=1'),
(1390, 7, '2024-06-02 05:21:00', 'GET: /master/po/audit_logs/page=1'),
(1391, 7, '2024-06-02 05:21:00', 'GET: /master/po/audit_logs/page=1'),
(1392, 7, '2024-06-02 05:21:14', 'GET: /master/po/audit_logs/page=1'),
(1393, 7, '2024-06-02 05:21:14', 'GET: /master/po/audit_logs/page=1'),
(1394, 7, '2024-06-02 05:21:22', 'GET: /master/po/audit_logs/page=1'),
(1395, 7, '2024-06-02 05:21:23', 'GET: /master/po/audit_logs/page=1'),
(1396, 7, '2024-06-02 05:21:29', 'GET: /master/po/audit_logs/page=1'),
(1397, 7, '2024-06-02 05:21:29', 'GET: /master/po/audit_logs/page=1'),
(1398, 7, '2024-06-02 05:21:29', 'GET: /master/po/audit_logs/page=1'),
(1399, 7, '2024-06-02 05:21:29', 'GET: /master/po/audit_logs/page=1'),
(1400, 7, '2024-06-02 05:21:38', 'GET: /master/po/audit_logs/page=1'),
(1401, 7, '2024-06-02 05:21:38', 'GET: /master/po/audit_logs/page=1'),
(1402, 7, '2024-06-02 05:21:42', 'GET: /master/po/audit_logs/page=1'),
(1403, 7, '2024-06-02 05:21:42', 'GET: /master/po/audit_logs/page=1'),
(1404, 7, '2024-06-02 05:21:45', 'GET: /master/po/audit_logs/page=1'),
(1405, 7, '2024-06-02 05:21:45', 'GET: /master/po/audit_logs/page=1'),
(1406, 7, '2024-06-02 05:21:48', 'GET: /master/po/audit_logs/page=1'),
(1407, 7, '2024-06-02 05:21:48', 'GET: /master/po/audit_logs/page=1'),
(1408, 7, '2024-06-02 05:21:51', 'GET: /master/po/audit_logs/page=1'),
(1409, 7, '2024-06-02 05:21:51', 'GET: /master/po/audit_logs/page=1'),
(1410, 7, '2024-06-02 05:21:52', 'GET: /master/po/audit_logs/page=1'),
(1411, 7, '2024-06-02 05:21:53', 'GET: /master/po/audit_logs/page=1'),
(1412, 7, '2024-06-02 05:21:53', 'GET: /master/po/audit_logs/page=1'),
(1413, 7, '2024-06-02 05:21:55', 'GET: /master/po/audit_logs/page=1'),
(1414, 7, '2024-06-02 05:21:55', 'GET: /master/po/audit_logs/page=1'),
(1415, 7, '2024-06-02 05:21:58', 'GET: /master/po/audit_logs/page=1'),
(1416, 7, '2024-06-02 05:21:58', 'GET: /master/po/audit_logs/page=1'),
(1417, 7, '2024-06-02 05:21:58', 'GET: /master/po/audit_logs/page=1'),
(1418, 7, '2024-06-02 05:22:03', 'GET: /master/po/audit_logs/page=1'),
(1419, 7, '2024-06-02 05:22:03', 'GET: /master/po/audit_logs/page=1'),
(1420, 7, '2024-06-02 05:22:23', 'GET: /master/po/audit_logs/page=1'),
(1421, 7, '2024-06-02 05:22:23', 'GET: /master/po/audit_logs/page=1'),
(1422, 7, '2024-06-02 05:22:23', 'GET: /master/po/audit_logs/page=1'),
(1423, 7, '2024-06-02 05:22:23', 'GET: /master/po/audit_logs/page=1'),
(1424, 7, '2024-06-02 05:22:23', 'GET: /master/po/audit_logs/page=1'),
(1425, 7, '2024-06-02 05:22:24', 'GET: /master/po/audit_logs/page=1'),
(1426, 7, '2024-06-02 05:23:01', 'GET: /master/po/audit_logs/page=1'),
(1427, 7, '2024-06-02 05:23:01', 'GET: /master/po/audit_logs/page=1'),
(1428, 7, '2024-06-02 05:23:11', 'POST: /master/logout'),
(1429, 7, '2024-06-02 05:29:44', 'POST: /master/login'),
(1430, 7, '2024-06-02 05:29:44', 'GET: /master/po/audit_logs/page=1'),
(1431, 7, '2024-06-02 05:29:44', 'GET: /master/po/audit_logs/page=1'),
(1432, 7, '2024-06-02 05:29:48', 'GET: /master/po/audit_logs/page=1'),
(1433, 7, '2024-06-02 05:29:48', 'GET: /master/po/audit_logs/page=1'),
(1434, 7, '2024-06-02 05:29:49', 'GET: /master/po/pondo/page=1'),
(1435, 7, '2024-06-02 05:29:50', 'GET: /master/po/audit_logs/page=1'),
(1436, 7, '2024-06-02 05:29:52', 'GET: /master/po/pondo/page=1'),
(1437, 7, '2024-06-02 05:29:53', 'GET: /master/po/audit_logs/page=1'),
(1438, 7, '2024-06-02 05:29:57', 'GET: /master/po/audit_logs/page=1'),
(1439, 7, '2024-06-02 05:29:57', 'GET: /master/po/audit_logs/page=1'),
(1440, 7, '2024-06-02 05:30:15', 'GET: /master/po/audit_logs/page=1'),
(1441, 7, '2024-06-02 05:30:15', 'GET: /master/po/audit_logs/page=1'),
(1442, 7, '2024-06-02 05:30:17', 'GET: /master/po/audit_logs/page=2'),
(1443, 7, '2024-06-02 05:30:17', 'GET: /master/po/audit_logs/page=1'),
(1444, 7, '2024-06-02 05:30:18', 'GET: /master/po/audit_logs/page=4'),
(1445, 7, '2024-06-02 05:30:18', 'GET: /master/po/audit_logs/page=1'),
(1446, 7, '2024-06-02 05:30:18', 'GET: /master/po/audit_logs/page=5'),
(1447, 7, '2024-06-02 05:30:18', 'GET: /master/po/audit_logs/page=1'),
(1448, 7, '2024-06-02 05:30:19', 'GET: /master/po/audit_logs/page=1'),
(1449, 7, '2024-06-02 05:30:19', 'GET: /master/po/audit_logs/page=1'),
(1450, 7, '2024-06-02 05:30:22', 'GET: /master/po/pondo/page=1'),
(1451, 7, '2024-06-02 05:30:22', 'GET: /master/po/audit_logs/page=1'),
(1452, 7, '2024-06-02 05:30:24', 'GET: /master/po/pondo/page=2'),
(1453, 7, '2024-06-02 05:30:24', 'GET: /master/po/audit_logs/page=1'),
(1454, 7, '2024-06-02 05:30:25', 'GET: /master/po/pondo/page=1'),
(1455, 7, '2024-06-02 05:30:25', 'GET: /master/po/audit_logs/page=1'),
(1456, 7, '2024-06-02 05:30:26', 'GET: /master/po/audit_logs/page=1'),
(1457, 7, '2024-06-02 05:30:26', 'GET: /master/po/audit_logs/page=1'),
(1458, 7, '2024-06-02 05:32:30', 'GET: /master/po/audit_logs/page=1'),
(1459, 7, '2024-06-02 05:32:30', 'GET: /master/po/audit_logs/page=1'),
(1460, 7, '2024-06-02 05:34:20', 'GET: /master/po/editsupplier/Supplier=1');
INSERT INTO `audit_log` (`id`, `account_id`, `datetime`, `action`) VALUES
(1461, 7, '2024-06-02 05:34:20', 'GET: /master/po/audit_logs/page=1'),
(1462, 7, '2024-06-02 05:34:24', 'GET: /master/po/viewsupplier/Supplier=2'),
(1463, 7, '2024-06-02 05:34:24', 'GET: /master/po/audit_logs/page=1'),
(1464, 7, '2024-06-02 05:34:25', 'GET: /master/po/editsupplier/Supplier=2'),
(1465, 7, '2024-06-02 05:34:25', 'GET: /master/po/audit_logs/page=1'),
(1466, 7, '2024-06-02 05:34:35', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1467, 7, '2024-06-02 05:34:35', 'GET: /master/po/audit_logs/page=1'),
(1468, 7, '2024-06-02 05:34:41', 'GET: /master/po/editsupplier/Supplier=2'),
(1469, 7, '2024-06-02 05:34:41', 'GET: /master/po/audit_logs/page=1'),
(1470, 7, '2024-06-02 05:35:07', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(1471, 7, '2024-06-02 05:35:07', 'GET: /master/po/audit_logs/page=1'),
(1472, 7, '2024-06-02 05:35:12', 'POST: /master/placeorder/supplier/'),
(1473, 7, '2024-06-02 05:35:14', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(1474, 7, '2024-06-02 05:35:14', 'GET: /master/po/audit_logs/page=1'),
(1475, 7, '2024-06-02 05:35:32', 'GET: /master/po/editsupplier/Supplier=3'),
(1476, 7, '2024-06-02 05:35:32', 'GET: /master/po/audit_logs/page=1'),
(1477, 7, '2024-06-02 05:35:42', 'GET: /master/po/editsupplier/Supplier=2'),
(1478, 7, '2024-06-02 05:35:42', 'GET: /master/po/audit_logs/page=1'),
(1479, 7, '2024-06-02 05:35:44', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1480, 7, '2024-06-02 05:35:45', 'GET: /master/po/audit_logs/page=1'),
(1481, 7, '2024-06-02 05:36:05', 'GET: /master/po/editsupplier/Supplier=2'),
(1482, 7, '2024-06-02 05:36:05', 'GET: /master/po/audit_logs/page=1'),
(1483, 7, '2024-06-02 05:36:14', 'GET: /master/po/editsupplier/Supplier=2'),
(1484, 7, '2024-06-02 05:36:14', 'GET: /master/po/audit_logs/page=1'),
(1485, 7, '2024-06-02 05:36:24', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1486, 7, '2024-06-02 05:36:24', 'GET: /master/po/audit_logs/page=1'),
(1487, 7, '2024-06-02 05:36:25', 'GET: /master/po/addbulk/Supplier=2'),
(1488, 7, '2024-06-02 05:36:25', 'GET: /master/po/audit_logs/page=1'),
(1489, 7, '2024-06-02 05:36:30', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(1490, 7, '2024-06-02 05:36:30', 'GET: /master/po/audit_logs/page=1'),
(1491, 7, '2024-06-02 05:37:26', 'GET: /master/po/audit_logs/page=1'),
(1492, 7, '2024-06-02 05:37:26', 'GET: /master/po/audit_logs/page=1');

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
(1, 2, '10:50:32', '2024-06-02', 3, 2121, 'Cancelled + Delayed', 'Cash on hand', 41),
(2, 3, '10:50:47', '2024-06-02', 5, 140, 'Completed', 'Cash on hand', 42),
(3, 3, '10:51:57', '2024-06-02', 1, 135, 'Completed + Delayed', 'Cash on hand', 43),
(4, 2, '10:52:04', '2024-06-02', 2, 381, 'to receive + Delayed', 'Cash on hand', 44),
(5, 2, '10:52:10', '2024-06-02', 3, 1221, 'Cancelled', 'Cash on hand', 45),
(6, 2, '10:52:26', '2024-06-02', 1, 171, 'Completed + Delayed', 'Cash on hand', 46);

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
(6, 900.00, 806.40, 200.00, 18000.00, 6);

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
  `FirstName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `FirstName`, `LastName`, `Phone`, `Email`) VALUES
(1, 'Karleigh', 'Clark', '+1 (808) 268-2524', 'xylepysyr@mailinator.com'),
(2, 'Jayme', 'Fisher', '+1 (368) 738-9216', 'xylepysyr@mailinator.com'),
(3, 'Jayme', 'Fisher', '+1 (368) 738-9216', 'xylepysyr@mailinator.com');

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
  `DeliveryStatus` enum('Pending','In Transit','Delivered','Failed to deliver') DEFAULT 'Pending',
  `TruckID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deliveryorders`
--

INSERT INTO `deliveryorders` (`DeliveryOrderID`, `SaleID`, `ProductID`, `Quantity`, `ProductWeight`, `Province`, `Municipality`, `StreetBarangayAddress`, `DeliveryDate`, `ReceivedDate`, `DeliveryStatus`, `TruckID`) VALUES
(1, 28, 2, 21, 16.80, 'Pampanga', 'San Fernando', 'aasas', '2024-06-07', NULL, 'Pending', NULL),
(2, 28, 3, 14, 700.00, 'Pampanga', 'San Fernando', 'aasas', '2024-06-07', NULL, 'Pending', NULL);

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
(1, '123', 'bs', 'cs', '3a', '2024-05-01', 'Male', 'filipino', 'america', 'N/A', 'N/A', 'Single', 'Point of Sales', 'manager', '123', '123', '12', '123'),
(2, 'https://pbs.twimg.com/profile_images/1776936838118404096/cxF34bgy_400x400.jpg', 'Jarelle Anne', 'Cañada', 'Pamintuan', '2001-08-31', 'Female', 'Filipino', 'Rias-Eveland Boulevard', '09675222420', 'jarelleannepamintuan@gmail.com', 'Single', 'Human Resources', 'HR Manager/Director', '3934191496', '254323228890', '811863948', '077652901241'),
(3, 'https://pbs.twimg.com/profile_images/1556154158860107776/1eTSWQJx_400x400.jpg', 'Ziggy', 'Castro', 'Co', '2001-12-19', 'Female', 'Filipino', 'Pampanga', '09123456789', 'ziggyco@example.com', 'Single', 'Human Resources', 'Compensation and Benefits Specialist', '9842683190', '222904801483', '398938596', '393260427062'),
(4, 'https://pbs.twimg.com/profile_images/1591010546899308544/9_n476w9_400x400.png', 'Nathaniel', '', 'Fernandez', '2003-04-06', 'Male', 'Filipino', 'Pampanga', '09123456789', 'nathZ@example.com', 'Single', 'Human Resources', 'HR Legal Compliance Specialist', '3217127657', '982459800458', '175523699', '723082092314'),
(5, 'https://pbs.twimg.com/profile_images/1746139769342742528/cDQRzJIV_400x400.jpg', 'Emmanuel Louise', '', 'Gonzales', '2001-01-27', 'Male', 'Filipino', 'Pampanga', '09123456789', 'emman@example.com', 'Divorced', 'Human Resources', 'Recruiter', '3831913601', '296757397697', '136729120', '687715123719'),
(6, '/master/public/humanResources/img/noPhotoAvailable.png', 'Joshua', '', 'Casupang', '2003-06-21', 'Male', 'Filipino', 'Pampanga', '09123456789', 'joshua@example.com', 'Married', 'Product Order', 'HR Coordinator', '1788631721', '493539660119', '579494717', '254144900265'),
(7, '/master/public/humanResources/img/noPhotoAvailable.png', 'Marc', 'Cruz', 'David', '2002-02-09', 'Male', 'Filipino', 'Pampanga', '09293883802', 'sinicchi123@gmail.com', 'Single', 'Product Order', 'Order Processor', '5239186621', '113821417235', '293860405', '677900026630'),
(8, 'https://pbs.twimg.com/profile_images/1776936838118404096/cxF34bgy_400x400.jpg', 'Jarelle Anne', 'Cañada', 'Pamintuan', '2001-08-31', 'Female', 'Filipino', 'Rias-Eveland Boulevard', '09675222420', 'jarelleannepamintuan@gmail.com', 'Single', 'Human Resources', 'HR Manager/Director', '3934191496', '254323228890', '811863948', '077652901241'),
(9, 'https://pbs.twimg.com/profile_images/1556154158860107776/1eTSWQJx_400x400.jpg', 'Ziggy', 'Castro', 'Co', '2001-12-19', 'Female', 'Filipino', 'Pampanga', '09123456789', 'ziggyco@example.com', 'Single', 'Human Resources', 'Compensation and Benefits Specialist', '9842683190', '222904801483', '398938596', '393260427062'),
(10, 'https://pbs.twimg.com/profile_images/1591010546899308544/9_n476w9_400x400.png', 'Nathaniel', '', 'Fernandez', '2003-04-06', 'Male', 'Filipino', 'Pampanga', '09123456789', 'nathZ@example.com', 'Single', 'Human Resources', 'HR Legal Compliance Specialist', '3217127657', '982459800458', '175523699', '723082092314'),
(11, 'https://pbs.twimg.com/profile_images/1746139769342742528/cDQRzJIV_400x400.jpg', 'Emmanuel Louise', '', 'Gonzales', '2001-01-27', 'Male', 'Filipino', 'Pampanga', '09123456789', 'emman@example.com', 'Divorced', 'Human Resources', 'Recruiter', '3831913601', '296757397697', '136729120', '687715123719'),
(12, '/master/public/humanResources/img/noPhotoAvailable.png', 'Joshua', '', 'Casupang', '2003-06-21', 'Male', 'Filipino', 'Pampanga', '09123456789', 'joshua@example.com', 'Married', 'Human Resources', 'HR Coordinator', '1788631721', '493539660119', '579494717', '254144900265'),
(13, '/master/public/humanResources/img/noPhotoAvailable.png', 'Marc', 'Cruz', 'David', '2002-02-09', 'Male', 'Filipino', 'Pampanga', '09293883802', 'sinicchi123@gmail.com', 'Single', 'Product Order', 'Order Processor', '5239186621', '113821417235', '293860405', '677900026630');

-- --------------------------------------------------------

--
-- Table structure for table `employeetrucks`
--

CREATE TABLE `employeetrucks` (
  `EmployeeID` int(11) DEFAULT NULL,
  `TruckID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(6, '2024-04-11', '2024-04-11', '2025-04-11', 6);

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
(7, 1, 33828),
(19, 1, 33860),
(20, 1, 33862),
(21, 1, 35232),
(22, 1, 35239),
(23, 1, 35240),
(24, 6, 35241),
(25, 6, 35242),
(26, 6, 35243),
(27, 6, 35244),
(30, 6, 35247),
(31, 6, 35248),
(32, 6, 35249),
(33, 6, 35250),
(36, 6, 35253),
(37, 6, 35254),
(38, 6, 35255),
(39, 6, 35256),
(40, 6, 35257),
(42, 6, 35259),
(43, 6, 35260),
(44, 6, 35261),
(46, 6, 35263);

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
(37, 10, 'a4', 'a4', 'a4');

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
(33828, 3, '2024-05-14 09:31:14', 1, 10, 'Pondo expense for Finance'),
(33832, 3, '2024-05-14 11:30:04', 1, 10, 'Pondo expense for Human Resources'),
(33833, 4, '2024-05-15 18:04:46', 6, 100, NULL),
(33834, 6, '2024-05-15 12:05:27', 21, 10, 'Missing Inventory'),
(33835, 6, '2024-05-15 12:05:50', 24, 10, 'Recount Inventory'),
(33844, 11, '2024-05-15 12:37:08', 4, 90, 'made a sale with tax'),
(33845, 29, '2024-05-15 12:37:09', 4, 10, 'made a sale with tax'),
(33846, 4, '2024-05-15 12:37:09', 12, 10, 'Discount given'),
(33847, 4, '2024-05-15 12:40:40', 13, 10, 'Sales allowance'),
(33848, 4, '2024-05-15 12:40:56', 14, 10, 'Sales return'),
(33855, 28, '2024-05-17 11:54:45', 4, 100, 'Boroww on 28 with 4'),
(33856, 4, '2024-05-17 11:55:21', 28, 100, 'Paid 28 using 4'),
(33857, 28, '2024-05-17 11:57:33', 4, 100, 'Boroww on 28 with 4'),
(33858, 4, '2024-05-17 11:57:38', 28, 100, 'Paid 28 using 4'),
(33859, 28, '2024-05-17 11:58:55', 4, 100, 'Boroww on 28 with 4'),
(33860, 4, '2024-05-17 12:00:12', 28, 100, 'Pondo expense for Human Resources'),
(33861, 27, '2024-05-17 12:01:13', 4, 100, 'Boroww on 27 with 4'),
(33862, 4, '2024-05-17 12:01:13', 27, 100, 'Pondo expense for Human Resources'),
(33864, 32, '2024-05-17 12:08:16', 4, 100, 'Investment of 32 in 4 with 100'),
(33865, 4, '2024-05-17 12:08:38', 32, 100, 'Investment of 32 in 4'),
(34070, 32, '2024-05-17 13:14:13', 1, 100, 'Investment of 32 in 1 with 100'),
(34071, 3, '2024-05-17 13:14:19', 32, 100, 'Investment of 32 in 3'),
(34072, 36, '2024-05-17 13:15:58', 1, 100, 'Boroww on 36 with 1'),
(34073, 3, '2024-05-17 13:16:03', 36, 100, 'Paid 36 using 3'),
(34083, 37, '2024-05-17 13:18:46', 2, 100, 'Boroww on 37 with 2'),
(34084, 4, '2024-05-17 13:19:16', 37, 100, 'Paid 37 using 4'),
(35225, 11, '2024-04-01 08:53:46', 4, 100, 'sales try'),
(35230, 25, '2024-04-30 23:59:59', 11, 100, 'closing of account'),
(35231, 7, '2024-04-30 23:59:59', 25, 100, 'giving the remaining to the owner'),
(35232, 4, '2024-05-31 06:06:39', 2, 10, 'Pondo expense for Point of Sales'),
(35233, 11, '2024-05-31 15:21:44', 3, 23709, 'made a sale with tax'),
(35234, 11, '2024-05-31 15:48:44', 3, 658, 'made a sale with tax'),
(35235, 11, '2024-05-31 15:52:52', 3, 658, 'made a sale with tax'),
(35236, 29, '2024-05-31 15:52:52', 18, 78.96, 'made a sale with tax'),
(35237, 3, '2024-05-31 10:17:41', 14, 1075.2, 'Sales return'),
(35238, 3, '2024-05-31 10:33:10', 14, 368.48, 'Sales return'),
(35239, 4, '2024-05-31 18:21:44', 1, 20, 'Pondo expense for Product Order'),
(35240, 4, '2024-05-31 18:27:39', 1, 20, 'Pondo expense for Product Order'),
(35241, 3, '2024-06-01 05:59:26', 6, 108, 'Pondo expense for Product Order'),
(35242, 3, '2024-06-01 06:11:02', 6, 135, 'Pondo expense for Product Order'),
(35243, 3, '2024-06-01 06:12:59', 6, 108, 'Pondo expense for Product Order'),
(35244, 3, '2024-06-01 06:23:52', 6, 135, 'Pondo expense for Product Order'),
(35247, 3, '2024-06-01 07:20:01', 6, 108, 'Pondo expense for Product Order'),
(35248, 3, '2024-06-01 07:25:19', 6, 108, 'Pondo expense for Product Order'),
(35249, 3, '2024-06-01 07:32:25', 6, 108, 'Pondo expense for Product Order'),
(35250, 3, '2024-06-01 07:36:28', 6, 20, 'Pondo expense for Product Order'),
(35253, 3, '2024-06-01 08:11:17', 6, 170, 'Pondo expense for Product Order'),
(35254, 3, '2024-06-01 15:35:44', 6, 135, 'Pondo expense for Product Order'),
(35255, 3, '2024-06-01 15:38:59', 6, 420, 'Pondo expense for Product Order'),
(35256, 3, '2024-06-02 04:13:15', 6, 381, 'Pondo expense for Product Order'),
(35257, 3, '2024-06-02 04:44:03', 6, 421, 'Pondo expense for Product Order'),
(35259, 3, '2024-06-02 04:50:47', 6, 140, 'Pondo expense for Product Order'),
(35260, 3, '2024-06-02 04:51:57', 6, 135, 'Pondo expense for Product Order'),
(35261, 3, '2024-06-02 04:52:04', 6, 381, 'Pondo expense for Product Order'),
(35263, 3, '2024-06-02 04:52:26', 6, 171, 'Pondo expense for Product Order');

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
(1, 2, 2, 1, 3, '10:50:32', '2024-06-02'),
(2, 7, 3, 2, 5, '10:50:47', '2024-06-02'),
(3, 6, 3, 3, 1, '10:51:57', '2024-06-02'),
(4, 3, 2, 4, 2, '10:52:04', '2024-06-02'),
(5, 4, 2, 5, 3, '10:52:10', '2024-06-02'),
(7, 5, 2, 6, 1, '10:52:26', '2024-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(10) NOT NULL,
  `pay_date` date NOT NULL,
  `month` varchar(20) NOT NULL,
  `monthly_salary` decimal(10,2) NOT NULL,
  `status` enum('Pending','Paid') DEFAULT 'Pending',
  `salary_id` int(10) NOT NULL,
  `employees_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poauditlogs`
--

CREATE TABLE `poauditlogs` (
  `audit_ID` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `user` varchar(135) NOT NULL,
  `action` varchar(135) NOT NULL,
  `time_in` time NOT NULL DEFAULT current_timestamp(),
  `time_out` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poauditlogs`
--

INSERT INTO `poauditlogs` (`audit_ID`, `date`, `user`, `action`, `time_in`, `time_out`) VALUES
(1, '2024-05-30', 'bscs3a006', 'Logged In', '22:14:08', '00:00:00'),
(2, '2024-05-30', 'bscs3a006', 'Added Supplier: Marc XD', '22:15:08', '00:00:00'),
(3, '2024-05-30', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '22:18:20', '00:00:00'),
(4, '2024-05-30', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '22:26:39', '00:00:00'),
(7, '2024-05-30', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '22:37:36', '00:00:00'),
(8, '2024-05-30', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '22:37:49', '00:00:00'),
(9, '2024-05-30', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '22:37:54', '00:00:00'),
(10, '2024-05-30', 'bscs3a006', 'Logged Out', '22:37:54', '22:54:25'),
(11, '2024-05-30', '123', 'Logged In', '22:55:49', '00:00:00'),
(12, '2024-05-30', 'bscs3a006', 'Logged In', '22:56:32', '00:00:00'),
(13, '2024-05-30', 'bscs3a006', 'Logged Out', '22:56:32', '22:57:08'),
(14, '2024-05-30', '123', 'Logged In', '22:57:14', '00:00:00'),
(15, '2024-05-30', 'bscs3a006', 'Logged In', '22:57:41', '00:00:00'),
(16, '2024-05-30', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '23:08:51', '00:00:00'),
(17, '2024-05-30', 'bscs3a006', 'Cancelled Order #2', '23:13:45', '00:00:00'),
(21, '2024-05-30', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '23:16:41', '00:00:00'),
(22, '2024-05-30', 'bscs3a006', 'Added feedback a for Order #2', '23:17:30', '00:00:00'),
(23, '2024-05-30', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '23:17:50', '00:00:00'),
(24, '2024-05-30', 'bscs3a006', 'Delayed Order #4', '23:49:35', '00:00:00'),
(25, '2024-05-30', 'bscs3a006', 'Delayed Order #4', '23:58:39', '00:00:00'),
(26, '2024-05-30', 'bscs3a006', 'Delayed Order #4', '23:58:50', '00:00:00'),
(27, '2024-05-31', 'bscs3a006', 'Delayed Order #4', '00:02:54', '00:00:00'),
(28, '2024-05-31', 'bscs3a006', 'Logged Out', '00:02:54', '00:12:55'),
(29, '2024-05-31', 'bscs3a006', 'Logged In', '00:13:09', '00:00:00'),
(30, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '00:15:38', '00:00:00'),
(31, '2024-05-31', 'bscs3a006', 'Cancelled Order #4', '00:18:26', '00:00:00'),
(32, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '00:19:13', '00:00:00'),
(33, '2024-05-31', 'bscs3a006', 'Delayed Order #6', '00:19:16', '00:00:00'),
(34, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '00:20:00', '00:00:00'),
(35, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '00:20:12', '00:00:00'),
(36, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '00:20:18', '00:00:00'),
(37, '2024-05-31', 'bscs3a006', 'Delayed Order #8', '00:20:21', '00:00:00'),
(38, '2024-05-31', 'bscs3a006', 'Cancelled Order #9', '00:20:23', '00:00:00'),
(39, '2024-05-31', 'bscs3a006', 'Cancelled Order #8', '00:20:25', '00:00:00'),
(40, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '00:23:43', '00:00:00'),
(41, '2024-05-31', 'bscs3a006', 'Delayed Order #10', '00:27:11', '00:00:00'),
(42, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #8', '00:29:19', '00:00:00'),
(43, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #4', '00:30:03', '00:00:00'),
(44, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #9', '00:30:20', '00:00:00'),
(45, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #1', '00:30:36', '00:00:00'),
(46, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #3', '00:30:43', '00:00:00'),
(47, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #5', '00:30:53', '00:00:00'),
(48, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #7', '00:30:57', '00:00:00'),
(49, '2024-05-31', 'bscs3a006', 'Logged Out', '00:30:57', '00:34:31'),
(50, '2024-05-31', '123', 'Logged In', '00:50:59', '00:00:00'),
(51, '2024-05-31', 'bscs3a006', 'Logged In', '01:00:20', '00:00:00'),
(52, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '01:40:36', '00:00:00'),
(53, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '01:42:32', '00:00:00'),
(54, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '01:42:37', '00:00:00'),
(55, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Marc XD', '01:50:44', '00:00:00'),
(56, '2024-05-31', 'bscs3a006', 'Added Supplier: San Dy', '01:59:03', '00:00:00'),
(57, '2024-05-31', 'bscs3a006', 'Added items for Supplier: San Dy', '02:12:14', '00:00:00'),
(58, '2024-05-31', 'bscs3a006', 'Added Supplier: Nature\'s Bounty', '02:24:39', '00:00:00'),
(59, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Nature\'s Bounty', '02:25:01', '00:00:00'),
(60, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '02:28:17', '00:00:00'),
(61, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: San Dy', '02:28:29', '00:00:00'),
(62, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Nature\'s Bounty', '02:28:34', '00:00:00'),
(63, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Marc XD', '02:29:49', '00:00:00'),
(64, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Marc XD', '02:34:22', '00:00:00'),
(65, '2024-05-31', 'bscs3a006', 'Added Supplier: Edward Shop', '02:38:23', '00:00:00'),
(66, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Edward Shop', '02:39:15', '00:00:00'),
(67, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Nature\'s Bounty', '02:39:48', '00:00:00'),
(68, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Marc XD', '02:43:34', '00:00:00'),
(69, '2024-05-31', 'bscs3a006', 'Added items for Supplier: San Dy', '02:47:01', '00:00:00'),
(70, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Edward Shop', '02:50:15', '00:00:00'),
(71, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Edward Shop', '02:51:38', '00:00:00'),
(72, '2024-05-31', '123', 'Logged In', '02:55:49', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Logged Out', '02:51:38', '21:59:56'),
(0, '2024-05-31', '123', 'Logged In', '22:01:18', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Logged In', '22:01:55', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added Supplier: Test', '22:08:33', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Test', '22:14:31', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Test', '22:16:52', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Test', '22:17:59', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Test', '22:20:39', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Test', '22:22:53', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Test', '22:23:24', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added Supplier: Mark', '22:29:08', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Test', '22:38:50', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added Supplier: Marc Shop', '22:45:54', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added Supplier: Marc Shop', '22:57:50', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Deleted Supplier: Marc Shop', '22:58:27', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added Supplier: Aian\'s Bakery', '23:00:36', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Aian\'s Bakery', '23:01:34', '00:00:00'),
(1, '2024-05-30', 'bscs3a006', 'Logged In', '22:14:08', '00:00:00'),
(2, '2024-05-30', 'bscs3a006', 'Added Supplier: Marc XD', '22:15:08', '00:00:00'),
(3, '2024-05-30', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '22:18:20', '00:00:00'),
(4, '2024-05-30', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '22:26:39', '00:00:00'),
(7, '2024-05-30', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '22:37:36', '00:00:00'),
(8, '2024-05-30', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '22:37:49', '00:00:00'),
(9, '2024-05-30', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '22:37:54', '00:00:00'),
(10, '2024-05-30', 'bscs3a006', 'Logged Out', '22:37:54', '22:54:25'),
(11, '2024-05-30', '123', 'Logged In', '22:55:49', '00:00:00'),
(12, '2024-05-30', 'bscs3a006', 'Logged In', '22:56:32', '00:00:00'),
(13, '2024-05-30', 'bscs3a006', 'Logged Out', '22:56:32', '22:57:08'),
(14, '2024-05-30', '123', 'Logged In', '22:57:14', '00:00:00'),
(15, '2024-05-30', 'bscs3a006', 'Logged In', '22:57:41', '00:00:00'),
(16, '2024-05-30', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '23:08:51', '00:00:00'),
(17, '2024-05-30', 'bscs3a006', 'Cancelled Order #2', '23:13:45', '00:00:00'),
(21, '2024-05-30', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '23:16:41', '00:00:00'),
(22, '2024-05-30', 'bscs3a006', 'Added feedback a for Order #2', '23:17:30', '00:00:00'),
(23, '2024-05-30', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '23:17:50', '00:00:00'),
(24, '2024-05-30', 'bscs3a006', 'Delayed Order #4', '23:49:35', '00:00:00'),
(25, '2024-05-30', 'bscs3a006', 'Delayed Order #4', '23:58:39', '00:00:00'),
(26, '2024-05-30', 'bscs3a006', 'Delayed Order #4', '23:58:50', '00:00:00'),
(27, '2024-05-31', 'bscs3a006', 'Delayed Order #4', '00:02:54', '00:00:00'),
(28, '2024-05-31', 'bscs3a006', 'Logged Out', '00:02:54', '00:12:55'),
(29, '2024-05-31', 'bscs3a006', 'Logged In', '00:13:09', '00:00:00'),
(30, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '00:15:38', '00:00:00'),
(31, '2024-05-31', 'bscs3a006', 'Cancelled Order #4', '00:18:26', '00:00:00'),
(32, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '00:19:13', '00:00:00'),
(33, '2024-05-31', 'bscs3a006', 'Delayed Order #6', '00:19:16', '00:00:00'),
(34, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '00:20:00', '00:00:00'),
(35, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '00:20:12', '00:00:00'),
(36, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '00:20:18', '00:00:00'),
(37, '2024-05-31', 'bscs3a006', 'Delayed Order #8', '00:20:21', '00:00:00'),
(38, '2024-05-31', 'bscs3a006', 'Cancelled Order #9', '00:20:23', '00:00:00'),
(39, '2024-05-31', 'bscs3a006', 'Cancelled Order #8', '00:20:25', '00:00:00'),
(40, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '00:23:43', '00:00:00'),
(41, '2024-05-31', 'bscs3a006', 'Delayed Order #10', '00:27:11', '00:00:00'),
(42, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #8', '00:29:19', '00:00:00'),
(43, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #4', '00:30:03', '00:00:00'),
(44, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #9', '00:30:20', '00:00:00'),
(45, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #1', '00:30:36', '00:00:00'),
(46, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #3', '00:30:43', '00:00:00'),
(47, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #5', '00:30:53', '00:00:00'),
(48, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #7', '00:30:57', '00:00:00'),
(49, '2024-05-31', 'bscs3a006', 'Logged Out', '00:30:57', '00:34:31'),
(50, '2024-05-31', '123', 'Logged In', '00:50:59', '00:00:00'),
(51, '2024-05-31', 'bscs3a006', 'Logged In', '01:00:20', '00:00:00'),
(52, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '01:40:36', '00:00:00'),
(53, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '01:42:32', '00:00:00'),
(54, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '01:42:37', '00:00:00'),
(55, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Marc XD', '01:50:44', '00:00:00'),
(56, '2024-05-31', 'bscs3a006', 'Added Supplier: San Dy', '01:59:03', '00:00:00'),
(57, '2024-05-31', 'bscs3a006', 'Added items for Supplier: San Dy', '02:12:14', '00:00:00'),
(58, '2024-05-31', 'bscs3a006', 'Added Supplier: Nature\'s Bounty', '02:24:39', '00:00:00'),
(59, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Nature\'s Bounty', '02:25:01', '00:00:00'),
(60, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '02:28:17', '00:00:00'),
(61, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: San Dy', '02:28:29', '00:00:00'),
(62, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Nature\'s Bounty', '02:28:34', '00:00:00'),
(63, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Marc XD', '02:29:49', '00:00:00'),
(64, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Marc XD', '02:34:22', '00:00:00'),
(65, '2024-05-31', 'bscs3a006', 'Added Supplier: Edward Shop', '02:38:23', '00:00:00'),
(66, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Edward Shop', '02:39:15', '00:00:00'),
(67, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Nature\'s Bounty', '02:39:48', '00:00:00'),
(68, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Marc XD', '02:43:34', '00:00:00'),
(69, '2024-05-31', 'bscs3a006', 'Added items for Supplier: San Dy', '02:47:01', '00:00:00'),
(70, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Edward Shop', '02:50:15', '00:00:00'),
(71, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Edward Shop', '02:51:38', '00:00:00'),
(72, '2024-05-31', '123', 'Logged In', '02:55:49', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Logged Out', '02:51:38', '21:59:56'),
(0, '2024-05-31', '123', 'Logged In', '22:01:18', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Logged In', '22:01:55', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added Supplier: Test', '22:08:33', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Test', '22:14:31', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Test', '22:16:52', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Test', '22:17:59', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Test', '22:20:39', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Test', '22:22:53', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Test', '22:23:24', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added Supplier: Mark', '22:29:08', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Test', '22:38:50', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added Supplier: Marc Shop', '22:45:54', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added Supplier: Marc Shop', '22:57:50', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Deleted Supplier: Marc Shop', '22:58:27', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added Supplier: Aian\'s Bakery', '23:00:36', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Aian\'s Bakery', '23:01:34', '00:00:00'),
(1, '2024-05-30', 'bscs3a006', 'Logged In', '22:14:08', '00:00:00'),
(2, '2024-05-30', 'bscs3a006', 'Added Supplier: Marc XD', '22:15:08', '00:00:00'),
(3, '2024-05-30', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '22:18:20', '00:00:00'),
(4, '2024-05-30', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '22:26:39', '00:00:00'),
(7, '2024-05-30', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '22:37:36', '00:00:00'),
(8, '2024-05-30', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '22:37:49', '00:00:00'),
(9, '2024-05-30', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '22:37:54', '00:00:00'),
(10, '2024-05-30', 'bscs3a006', 'Logged Out', '22:37:54', '22:54:25'),
(11, '2024-05-30', '123', 'Logged In', '22:55:49', '00:00:00'),
(12, '2024-05-30', 'bscs3a006', 'Logged In', '22:56:32', '00:00:00'),
(13, '2024-05-30', 'bscs3a006', 'Logged Out', '22:56:32', '22:57:08'),
(14, '2024-05-30', '123', 'Logged In', '22:57:14', '00:00:00'),
(15, '2024-05-30', 'bscs3a006', 'Logged In', '22:57:41', '00:00:00'),
(16, '2024-05-30', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '23:08:51', '00:00:00'),
(17, '2024-05-30', 'bscs3a006', 'Cancelled Order #2', '23:13:45', '00:00:00'),
(21, '2024-05-30', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '23:16:41', '00:00:00'),
(22, '2024-05-30', 'bscs3a006', 'Added feedback a for Order #2', '23:17:30', '00:00:00'),
(23, '2024-05-30', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '23:17:50', '00:00:00'),
(24, '2024-05-30', 'bscs3a006', 'Delayed Order #4', '23:49:35', '00:00:00'),
(25, '2024-05-30', 'bscs3a006', 'Delayed Order #4', '23:58:39', '00:00:00'),
(26, '2024-05-30', 'bscs3a006', 'Delayed Order #4', '23:58:50', '00:00:00'),
(27, '2024-05-31', 'bscs3a006', 'Delayed Order #4', '00:02:54', '00:00:00'),
(28, '2024-05-31', 'bscs3a006', 'Logged Out', '00:02:54', '00:12:55'),
(29, '2024-05-31', 'bscs3a006', 'Logged In', '00:13:09', '00:00:00'),
(30, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '00:15:38', '00:00:00'),
(31, '2024-05-31', 'bscs3a006', 'Cancelled Order #4', '00:18:26', '00:00:00'),
(32, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '00:19:13', '00:00:00'),
(33, '2024-05-31', 'bscs3a006', 'Delayed Order #6', '00:19:16', '00:00:00'),
(34, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '00:20:00', '00:00:00'),
(35, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '00:20:12', '00:00:00'),
(36, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '00:20:18', '00:00:00'),
(37, '2024-05-31', 'bscs3a006', 'Delayed Order #8', '00:20:21', '00:00:00'),
(38, '2024-05-31', 'bscs3a006', 'Cancelled Order #9', '00:20:23', '00:00:00'),
(39, '2024-05-31', 'bscs3a006', 'Cancelled Order #8', '00:20:25', '00:00:00'),
(40, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '00:23:43', '00:00:00'),
(41, '2024-05-31', 'bscs3a006', 'Delayed Order #10', '00:27:11', '00:00:00'),
(42, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #8', '00:29:19', '00:00:00'),
(43, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #4', '00:30:03', '00:00:00'),
(44, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #9', '00:30:20', '00:00:00'),
(45, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #1', '00:30:36', '00:00:00'),
(46, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #3', '00:30:43', '00:00:00'),
(47, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #5', '00:30:53', '00:00:00'),
(48, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #7', '00:30:57', '00:00:00'),
(49, '2024-05-31', 'bscs3a006', 'Logged Out', '00:30:57', '00:34:31'),
(50, '2024-05-31', '123', 'Logged In', '00:50:59', '00:00:00'),
(51, '2024-05-31', 'bscs3a006', 'Logged In', '01:00:20', '00:00:00'),
(52, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '01:40:36', '00:00:00'),
(53, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '01:42:32', '00:00:00'),
(54, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '01:42:37', '00:00:00'),
(55, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Marc XD', '01:50:44', '00:00:00'),
(56, '2024-05-31', 'bscs3a006', 'Added Supplier: San Dy', '01:59:03', '00:00:00'),
(57, '2024-05-31', 'bscs3a006', 'Added items for Supplier: San Dy', '02:12:14', '00:00:00'),
(58, '2024-05-31', 'bscs3a006', 'Added Supplier: Nature\'s Bounty', '02:24:39', '00:00:00'),
(59, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Nature\'s Bounty', '02:25:01', '00:00:00'),
(60, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '02:28:17', '00:00:00'),
(61, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: San Dy', '02:28:29', '00:00:00'),
(62, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Nature\'s Bounty', '02:28:34', '00:00:00'),
(63, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Marc XD', '02:29:49', '00:00:00'),
(64, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Marc XD', '02:34:22', '00:00:00'),
(65, '2024-05-31', 'bscs3a006', 'Added Supplier: Edward Shop', '02:38:23', '00:00:00'),
(66, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Edward Shop', '02:39:15', '00:00:00'),
(67, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Nature\'s Bounty', '02:39:48', '00:00:00'),
(68, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Marc XD', '02:43:34', '00:00:00'),
(69, '2024-05-31', 'bscs3a006', 'Added items for Supplier: San Dy', '02:47:01', '00:00:00'),
(70, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Edward Shop', '02:50:15', '00:00:00'),
(71, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Edward Shop', '02:51:38', '00:00:00'),
(72, '2024-05-31', '123', 'Logged In', '02:55:49', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Logged Out', '02:51:38', '21:59:56'),
(0, '2024-05-31', '123', 'Logged In', '22:01:18', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Logged In', '22:01:55', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added Supplier: Test', '22:08:33', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Test', '22:14:31', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Test', '22:16:52', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Test', '22:17:59', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Test', '22:20:39', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Test', '22:22:53', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Test', '22:23:24', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added Supplier: Mark', '22:29:08', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Test', '22:38:50', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added Supplier: Marc Shop', '22:45:54', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added Supplier: Marc Shop', '22:57:50', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Deleted Supplier: Marc Shop', '22:58:27', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added Supplier: Aian\'s Bakery', '23:00:36', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Aian\'s Bakery', '23:01:34', '00:00:00'),
(1, '2024-05-30', 'bscs3a006', 'Logged In', '22:14:08', '00:00:00'),
(2, '2024-05-30', 'bscs3a006', 'Added Supplier: Marc XD', '22:15:08', '00:00:00'),
(3, '2024-05-30', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '22:18:20', '00:00:00'),
(4, '2024-05-30', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '22:26:39', '00:00:00'),
(7, '2024-05-30', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '22:37:36', '00:00:00'),
(8, '2024-05-30', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '22:37:49', '00:00:00'),
(9, '2024-05-30', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '22:37:54', '00:00:00'),
(10, '2024-05-30', 'bscs3a006', 'Logged Out', '22:37:54', '22:54:25'),
(11, '2024-05-30', '123', 'Logged In', '22:55:49', '00:00:00'),
(12, '2024-05-30', 'bscs3a006', 'Logged In', '22:56:32', '00:00:00'),
(13, '2024-05-30', 'bscs3a006', 'Logged Out', '22:56:32', '22:57:08'),
(14, '2024-05-30', '123', 'Logged In', '22:57:14', '00:00:00'),
(15, '2024-05-30', 'bscs3a006', 'Logged In', '22:57:41', '00:00:00'),
(16, '2024-05-30', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '23:08:51', '00:00:00'),
(17, '2024-05-30', 'bscs3a006', 'Cancelled Order #2', '23:13:45', '00:00:00'),
(21, '2024-05-30', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '23:16:41', '00:00:00'),
(22, '2024-05-30', 'bscs3a006', 'Added feedback a for Order #2', '23:17:30', '00:00:00'),
(23, '2024-05-30', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '23:17:50', '00:00:00'),
(24, '2024-05-30', 'bscs3a006', 'Delayed Order #4', '23:49:35', '00:00:00'),
(25, '2024-05-30', 'bscs3a006', 'Delayed Order #4', '23:58:39', '00:00:00'),
(26, '2024-05-30', 'bscs3a006', 'Delayed Order #4', '23:58:50', '00:00:00'),
(27, '2024-05-31', 'bscs3a006', 'Delayed Order #4', '00:02:54', '00:00:00'),
(28, '2024-05-31', 'bscs3a006', 'Logged Out', '00:02:54', '00:12:55'),
(29, '2024-05-31', 'bscs3a006', 'Logged In', '00:13:09', '00:00:00'),
(30, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '00:15:38', '00:00:00'),
(31, '2024-05-31', 'bscs3a006', 'Cancelled Order #4', '00:18:26', '00:00:00'),
(32, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '00:19:13', '00:00:00'),
(33, '2024-05-31', 'bscs3a006', 'Delayed Order #6', '00:19:16', '00:00:00'),
(34, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '00:20:00', '00:00:00'),
(35, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '00:20:12', '00:00:00'),
(36, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '00:20:18', '00:00:00'),
(37, '2024-05-31', 'bscs3a006', 'Delayed Order #8', '00:20:21', '00:00:00'),
(38, '2024-05-31', 'bscs3a006', 'Cancelled Order #9', '00:20:23', '00:00:00'),
(39, '2024-05-31', 'bscs3a006', 'Cancelled Order #8', '00:20:25', '00:00:00'),
(40, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '00:23:43', '00:00:00'),
(41, '2024-05-31', 'bscs3a006', 'Delayed Order #10', '00:27:11', '00:00:00'),
(42, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #8', '00:29:19', '00:00:00'),
(43, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #4', '00:30:03', '00:00:00'),
(44, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #9', '00:30:20', '00:00:00'),
(45, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #1', '00:30:36', '00:00:00'),
(46, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #3', '00:30:43', '00:00:00'),
(47, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #5', '00:30:53', '00:00:00'),
(48, '2024-05-31', 'bscs3a006', 'Added feedback a for Order #7', '00:30:57', '00:00:00'),
(49, '2024-05-31', 'bscs3a006', 'Logged Out', '00:30:57', '00:34:31'),
(50, '2024-05-31', '123', 'Logged In', '00:50:59', '00:00:00'),
(51, '2024-05-31', 'bscs3a006', 'Logged In', '01:00:20', '00:00:00'),
(52, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '01:40:36', '00:00:00'),
(53, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '01:42:32', '00:00:00'),
(54, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Marc XD', '01:42:37', '00:00:00'),
(55, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Marc XD', '01:50:44', '00:00:00'),
(56, '2024-05-31', 'bscs3a006', 'Added Supplier: San Dy', '01:59:03', '00:00:00'),
(57, '2024-05-31', 'bscs3a006', 'Added items for Supplier: San Dy', '02:12:14', '00:00:00'),
(58, '2024-05-31', 'bscs3a006', 'Added Supplier: Nature\'s Bounty', '02:24:39', '00:00:00'),
(59, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Nature\'s Bounty', '02:25:01', '00:00:00'),
(60, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc XD', '02:28:17', '00:00:00'),
(61, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: San Dy', '02:28:29', '00:00:00'),
(62, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Nature\'s Bounty', '02:28:34', '00:00:00'),
(63, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Marc XD', '02:29:49', '00:00:00'),
(64, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Marc XD', '02:34:22', '00:00:00'),
(65, '2024-05-31', 'bscs3a006', 'Added Supplier: Edward Shop', '02:38:23', '00:00:00'),
(66, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Edward Shop', '02:39:15', '00:00:00'),
(67, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Nature\'s Bounty', '02:39:48', '00:00:00'),
(68, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Marc XD', '02:43:34', '00:00:00'),
(69, '2024-05-31', 'bscs3a006', 'Added items for Supplier: San Dy', '02:47:01', '00:00:00'),
(70, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Edward Shop', '02:50:15', '00:00:00'),
(71, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Edward Shop', '02:51:38', '00:00:00'),
(72, '2024-05-31', '123', 'Logged In', '02:55:49', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Logged Out', '02:51:38', '21:59:56'),
(0, '2024-05-31', '123', 'Logged In', '22:01:18', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Logged In', '22:01:55', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added Supplier: Test', '22:08:33', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Test', '22:14:31', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Test', '22:16:52', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Test', '22:17:59', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Placed an Order for Supplier: Test', '22:20:39', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Test', '22:22:53', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Test', '22:23:24', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added Supplier: Mark', '22:29:08', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Test', '22:38:50', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added Supplier: Marc Shop', '22:45:54', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added Supplier: Marc Shop', '22:57:50', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Deleted Supplier: Marc Shop', '22:58:27', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added Supplier: Aian\'s Bakery', '23:00:36', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Added items for Supplier: Aian\'s Bakery', '23:01:34', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Logged In', '23:40:02', '00:00:00'),
(0, '2024-05-31', 'bscs3a006', 'Logged Out', '02:51:38', '23:40:21'),
(0, '2024-05-31', '123', 'Logged In', '23:40:30', '00:00:00'),
(0, '2024-05-31', '123', 'Logged In', '23:46:27', '00:00:00'),
(0, '2024-05-31', '123', 'Logged Out', '02:55:49', '23:46:36'),
(0, '2024-05-31', '123', 'Logged In', '23:46:38', '00:00:00'),
(0, '2024-05-31', '123', 'Added items for Supplier: Marc Shop', '23:51:20', '00:00:00'),
(0, '2024-05-31', '123', 'Placed an Order for Supplier: Marc Shop', '23:51:33', '00:00:00'),
(0, '2024-05-31', '123', 'Placed an Order for Supplier: Marc Shop', '23:51:33', '00:00:00'),
(0, '2024-05-31', '123', 'Placed an Order for Supplier: Marc Shop', '23:51:33', '00:00:00'),
(0, '2024-05-31', '123', 'Added Supplier: 21da', '23:55:46', '00:00:00'),
(0, '2024-05-31', '123', 'Added Supplier: awdaw', '23:56:02', '00:00:00'),
(0, '2024-06-01', '123', 'Logged In', '00:30:08', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Logged In', '00:33:57', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Logged In', '11:20:59', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Placed an Order for Supplier: Aian\'s Bakery', '11:59:26', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Placed an Order for Supplier: Aian\'s Bakery', '12:11:02', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Placed an Order for Supplier: Aian\'s Bakery', '12:12:59', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Cancelled Order #2', '12:13:49', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Placed an Order for Supplier: Aian\'s Bakery', '12:23:52', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Placed an Order for Supplier: Marc Shop', '13:47:48', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Placed an Order for Supplier: Aian\'s Bakery', '13:49:27', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Cancelled Order #6', '13:55:01', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Delayed Order #5', '13:55:04', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Cancelled Order #5', '13:55:08', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Logged Out', '02:51:38', '13:58:02'),
(0, '2024-06-01', 'bscs3a006', 'Logged Out', '02:51:38', '13:59:00'),
(0, '2024-06-01', 'bscs3a006', 'Cancelled Order #1', '14:11:06', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Cancelled Order #2', '14:11:07', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Cancelled Order #3', '14:11:09', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Cancelled Order #4', '14:11:11', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Placed an Order for Supplier: Aian\'s Bakery', '14:11:17', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Logged Out', '02:51:38', '14:17:32'),
(0, '2024-06-01', 'bscs3a006', 'Logged Out', '02:51:38', '14:46:17'),
(0, '2024-06-01', 'bscs3a006', 'Placed an Order for Supplier: Aian\'s Bakery', '21:35:44', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Delayed Order #7', '21:36:44', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Added feedback a for Order #1', '21:37:59', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Added feedback a for Order #2', '21:38:09', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Added feedback a for Order #3', '21:38:13', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Added feedback a for Order #4', '21:38:17', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Added feedback a for Order #5', '21:38:20', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Added feedback a for Order #6', '21:38:25', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Placed an Order for Supplier: Marc Shop', '21:38:59', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Added feedback a for Order #9', '21:41:04', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc Shop', '21:55:47', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc Shop', '22:05:32', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc Shop', '22:09:48', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc Shop', '22:09:55', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc Shop', '22:15:58', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc Shop', '22:16:36', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc Shop', '22:16:46', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Deleted a Product from Supplier: Marc Shop', '22:17:38', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc Shop', '22:17:50', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc Shop', '22:31:07', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc Shop', '22:31:14', '00:00:00'),
(0, '2024-06-01', 'bscs3a006', 'Logged Out', '02:51:38', '22:42:02'),
(0, '2024-06-02', 'bscs3a006', 'Placed an Order for Supplier: Marc Shop', '10:13:15', '00:00:00'),
(0, '2024-06-02', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc AKAKAN', '10:17:28', '00:00:00'),
(0, '2024-06-02', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Marc Shop', '10:22:23', '00:00:00'),
(0, '2024-06-02', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Aian\'s Bakery OWSHEE', '10:22:42', '00:00:00'),
(0, '2024-06-02', 'bscs3a006', 'Updated the Supplier Information and Products on Supplier: Aian\'s Bakery', '10:22:51', '00:00:00'),
(0, '2024-06-02', 'bscs3a006', 'Placed an Order for Supplier: Marc Shop', '10:44:03', '00:00:00'),
(0, '2024-06-02', 'bscs3a006', 'Placed an Order for Supplier: Marc Shop', '10:50:32', '00:00:00'),
(0, '2024-06-02', 'bscs3a006', 'Placed an Order for Supplier: Aian\'s Bakery', '10:50:47', '00:00:00'),
(0, '2024-06-02', 'bscs3a006', 'Delayed Order #1', '10:51:01', '00:00:00'),
(0, '2024-06-02', 'bscs3a006', 'Cancelled Order #1', '10:51:03', '00:00:00'),
(0, '2024-06-02', 'bscs3a006', 'Placed an Order for Supplier: Aian\'s Bakery', '10:51:57', '00:00:00'),
(0, '2024-06-02', 'bscs3a006', 'Placed an Order for Supplier: Marc Shop', '10:52:04', '00:00:00'),
(0, '2024-06-02', 'bscs3a006', 'Placed an Order for Supplier: Marc Shop', '10:52:10', '00:00:00'),
(0, '2024-06-02', 'bscs3a006', 'Placed an Order for Supplier: Marc Shop', '10:52:26', '00:00:00'),
(0, '2024-06-02', 'bscs3a006', 'Delayed Order #6', '10:53:05', '00:00:00'),
(0, '2024-06-02', 'bscs3a006', 'Delayed Order #3', '10:54:18', '00:00:00'),
(0, '2024-06-02', 'bscs3a006', 'Cancelled Order #5', '10:54:54', '00:00:00'),
(0, '2024-06-02', 'bscs3a006', 'Delayed Order #4', '11:04:23', '00:00:00');

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
(1, 2, 1, 'uploads/Hammer_(Large).png', 'Hammer (Large)', 'Marc Shop', 'Heavy-duty hammer for construction work', 'Tools', NULL, 329.00, 200.00, 1, 'pcs', 0.12, 1.50, '', 'Not Available'),
(2, 2, 1, 'uploads/Screwdriver_Set_(Standard).png', 'Screwdriver Set (Standard)', 'Marc Shop', 'Set of 6 screwdrivers with various sizes', 'Tools', NULL, 969.00, 700.00, 2, 'set', 0.12, 0.80, '', 'Available'),
(3, 2, 2, 'uploads/Cement_(50kg).png', 'Cement (50kg)', 'Marc Shop', 'Portland cement for construction purposes', 'Building Materials', NULL, 240.00, 180.00, 5, 'pcs', 0.12, 50.00, '', 'Available'),
(4, 2, 2, 'uploads/Gravel_(1_ton).png', 'Gravel (1 ton)', 'Marc Shop', 'Crushed stone for construction projects', 'Building Materials', NULL, 550.00, 400.00, 2, 'ton', 0.12, 907.19, '', 'Available'),
(5, 2, 3, 'uploads/Paint_Brush_Set.png', 'Paint Brush Set', 'Marc Shop', 'Set of 10 paint brushes for art projects', 'Art Supplies', NULL, 209.00, 150.00, 1, 'set', 0.12, 0.50, '', 'Available'),
(6, 3, 2, 'uploads/Galvanized_Nails_(5_lbs).png', 'Galvanized Nails (5 lbs)', 'Aian\'s Bakery', 'Galvanized nails for various construction applicat...', 'Building Materials', NULL, 50.00, 35.00, 4, 'lbs', 0.12, 2.27, '', 'Available'),
(7, 3, 2, 'uploads/Concrete_Blocks_(Standard).png', 'Concrete Blocks (Standard)', 'Aian\'s Bakery', 'Standard concrete blocks for building walls', 'Building Materials', NULL, 12.00, 8.00, 5, 'pcs', 0.12, 2.30, '', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `Request_ID` int(11) NOT NULL,
  `Product_Quantity` int(11) DEFAULT NULL,
  `Product_Total_Price` int(11) DEFAULT NULL,
  `Items_Subtotal` int(11) DEFAULT NULL,
  `Total_Amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

--
-- Dumping data for table `returnproducts`
--

INSERT INTO `returnproducts` (`ReturnID`, `SaleID`, `ProductID`, `Quantity`, `Reason`, `PaymentReturned`, `ProductStatus`, `ReturnDate`) VALUES
(1, 28, 3, 4, 'Sit eveniet amet c', 1075.20, 'Defective', '2024-05-31 08:17:41'),
(2, 30, 1, 1, 'Aute corporis cum vo', 368.48, 'Defective', '2024-05-31 08:33:10');

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
(6, 18000.00, 0.00, 1906.40, 16093.60, 6);

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

--
-- Dumping data for table `saledetails`
--

INSERT INTO `saledetails` (`SaleDetailID`, `SaleID`, `ProductID`, `Quantity`, `ProductWeight`, `UnitPrice`, `Subtotal`, `Tax`, `TotalAmount`) VALUES
(1, 28, 2, 21, 16.80, 969.00, 20349.00, 116.28, 22790.88),
(2, 28, 3, 14, 700.00, 240.00, 3360.00, 28.80, 3763.20),
(3, 29, 1, 2, 3.00, 329.00, 658.00, 39.48, 736.96),
(4, 30, 1, 2, 3.00, 329.00, 658.00, 39.48, 736.96);

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
  `TotalAmount` decimal(10,2) DEFAULT NULL,
  `EmployeeID` int(11) DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`SaleID`, `SaleDate`, `SalePreference`, `ShippingFee`, `PaymentMode`, `CardNumber`, `ExpiryDate`, `CVV`, `TotalAmount`, `EmployeeID`, `CustomerID`) VALUES
(1, '2022-01-15 10:30:00', 'Delivery', 10.00, 'Cash', NULL, NULL, NULL, 150.00, 1, NULL),
(2, '2022-02-05 14:45:00', 'Pick-up', 0.00, 'Card', NULL, NULL, NULL, 250.00, 2, NULL),
(3, '2022-03-20 11:00:00', 'Delivery', 20.00, 'Cash', NULL, NULL, NULL, 180.00, 3, NULL),
(4, '2022-04-10 09:15:00', 'Delivery', 15.00, 'Cash', NULL, NULL, NULL, 200.00, 1, NULL),
(5, '2022-05-22 13:00:00', 'Pick-up', 0.00, 'Cash', NULL, NULL, NULL, 300.00, 2, NULL),
(6, '2022-06-08 16:30:00', 'Delivery', 25.00, 'Card', NULL, NULL, NULL, 350.00, 3, NULL),
(7, '2022-07-14 10:00:00', 'Delivery', 10.00, 'Cash', NULL, NULL, NULL, 180.00, 1, NULL),
(8, '2022-08-29 12:45:00', 'Pick-up', 0.00, 'Cash', NULL, NULL, NULL, 270.00, 2, NULL),
(9, '2022-09-05 15:20:00', 'Delivery', 20.00, 'Card', NULL, NULL, NULL, 400.00, 3, NULL),
(10, '2022-10-18 09:30:00', 'Delivery', 15.00, 'Cash', NULL, NULL, NULL, 220.00, 1, NULL),
(11, '2022-11-25 11:45:00', 'Pick-up', 0.00, 'Cash', NULL, NULL, NULL, 280.00, 2, NULL),
(12, '2022-12-30 14:00:00', 'Delivery', 25.00, 'Card', NULL, NULL, NULL, 320.00, 3, NULL),
(13, '2023-01-15 10:30:00', 'Delivery', 10.00, 'Cash', NULL, NULL, NULL, 200.00, 1, NULL),
(14, '2023-02-05 14:45:00', 'Pick-up', 0.00, 'Card', NULL, NULL, NULL, 300.00, 2, NULL),
(15, '2023-03-20 11:00:00', 'Delivery', 20.00, 'Cash', NULL, NULL, NULL, 250.00, 3, NULL),
(16, '2023-04-10 09:15:00', 'Delivery', 15.00, 'Cash', NULL, NULL, NULL, 350.00, 1, NULL),
(17, '2023-05-22 13:00:00', 'Pick-up', 0.00, 'Cash', NULL, NULL, NULL, 400.00, 2, NULL),
(18, '2023-06-08 16:30:00', 'Delivery', 25.00, 'Card', NULL, NULL, NULL, 450.00, 3, NULL),
(19, '2023-07-14 10:00:00', 'Delivery', 10.00, 'Cash', NULL, NULL, NULL, 300.00, 1, NULL),
(20, '2023-08-29 12:45:00', 'Pick-up', 0.00, 'Cash', NULL, NULL, NULL, 350.00, 2, NULL),
(21, '2023-09-05 15:20:00', 'Delivery', 20.00, 'Card', NULL, NULL, NULL, 500.00, 3, NULL),
(22, '2023-10-18 09:30:00', 'Delivery', 15.00, 'Cash', NULL, NULL, NULL, 400.00, 1, NULL),
(23, '2023-11-25 11:45:00', 'Pick-up', 0.00, 'Cash', NULL, NULL, NULL, 450.00, 2, NULL),
(24, '2023-12-30 14:00:00', 'Delivery', 25.00, 'Card', NULL, NULL, NULL, 500.00, 3, NULL),
(25, '2024-01-15 10:30:00', 'Delivery', 10.00, 'Cash', NULL, NULL, NULL, 210.00, 1, NULL),
(26, '2024-02-05 14:45:00', 'Pick-up', 0.00, 'Card', NULL, NULL, NULL, 310.00, 2, NULL),
(27, '2024-03-20 11:00:00', 'Delivery', 20.00, 'Cash', NULL, NULL, NULL, 260.00, 3, NULL),
(28, '2024-05-31 15:21:44', 'Delivery', 0.00, 'Cash', '', '', '', 26554.08, NULL, 1),
(29, '2024-05-31 15:48:44', 'Pick-up', 0.00, 'Cash', '', '', '', 736.96, NULL, 2),
(30, '2024-05-31 15:52:52', 'Pick-up', 0.00, 'Cash', '', '', '', 736.96, NULL, 3);

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
  `Contact_Number` int(20) DEFAULT NULL,
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
(1, 'Tester', 'Test', 123456789, 'Inactive', 'test@gmail.com', 'Test', '1 Day', '666', 'Monday'),
(2, 'Marc Shop', 'Marc', 9128317, 'Active', 'marc@gmail.com', 'Porac', '5 - 7 Days', '21', 'Monday - Wednesday'),
(3, 'Aian\'s Bakery', 'Aian', 9278173, 'Active', 'aian@gmail.com', 'Bataan', '1 - 2 Days', '100', 'Sunday');

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

--
-- Dumping data for table `targetsales`
--

INSERT INTO `targetsales` (`TargetID`, `MonthYear`, `TargetAmount`, `EmployeeID`) VALUES
(1, '2022-01-01', 5000.00, 1),
(2, '2022-02-01', 6000.00, 2),
(3, '2022-03-01', 7000.00, 3),
(4, '2022-04-01', 5500.00, 1),
(5, '2022-05-01', 6500.00, 2),
(6, '2022-06-01', 7500.00, 3),
(7, '2022-07-01', 6000.00, 1),
(8, '2022-08-01', 7000.00, 2),
(9, '2022-09-01', 8000.00, 3),
(10, '2022-10-01', 6000.00, 1),
(11, '2022-11-01', 6500.00, 2),
(12, '2022-12-01', 7500.00, 3),
(13, '2023-01-01', 6000.00, 1),
(14, '2023-02-01', 7000.00, 2),
(15, '2023-03-01', 8000.00, 3),
(16, '2023-04-01', 6500.00, 1),
(17, '2023-05-01', 7500.00, 2),
(18, '2023-06-01', 8500.00, 3),
(19, '2023-07-01', 7000.00, 1),
(20, '2023-08-01', 8000.00, 2),
(21, '2023-09-01', 9000.00, 3),
(22, '2023-10-01', 7000.00, 1),
(23, '2023-11-01', 7500.00, 2),
(24, '2023-12-01', 8500.00, 3),
(25, '2024-01-01', 6100.00, 1),
(26, '2024-02-01', 7100.00, 2),
(27, '2024-03-01', 8100.00, 3),
(28, '2024-05-01', 55000.00, NULL);

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
(6, 0.00, 0.00, 6);

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
(1, 2, 3, '2024-06-02', '10:50:50', 'Completed', NULL),
(2, 1, 2, '2024-06-02', '10:51:03', 'Cancelled + Delayed', NULL),
(3, 6, 2, '2024-06-02', '10:53:08', 'Completed + Delayed', NULL),
(4, 3, 3, '2024-06-02', '10:54:20', 'Completed + Delayed', NULL),
(5, 5, 2, '2024-06-02', '10:54:54', 'Cancelled', NULL);

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
  ADD PRIMARY KEY (`ProductID`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `audit_log`
--
ALTER TABLE `audit_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1493;

--
-- AUTO_INCREMENT for table `batch_orders`
--
ALTER TABLE `batch_orders`
  MODIFY `Batch_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `benefit_info`
--
ALTER TABLE `benefit_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deliveryorders`
--
ALTER TABLE `deliveryorders`
  MODIFY `DeliveryOrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employment_info`
--
ALTER TABLE `employment_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funds_transaction`
--
ALTER TABLE `funds_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ledger`
--
ALTER TABLE `ledger`
  MODIFY `ledgerno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `ledgertransaction`
--
ALTER TABLE `ledgertransaction`
  MODIFY `LedgerXactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35264;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `returnproducts`
--
ALTER TABLE `returnproducts`
  MODIFY `ReturnID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salary_info`
--
ALTER TABLE `salary_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `saledetails`
--
ALTER TABLE `saledetails`
  MODIFY `SaleDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SaleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `Supplier_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `targetsales`
--
ALTER TABLE `targetsales`
  MODIFY `TargetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tax_info`
--
ALTER TABLE `tax_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `Transaction_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trucks`
--
ALTER TABLE `trucks`
  MODIFY `TruckID` int(11) NOT NULL AUTO_INCREMENT;

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
