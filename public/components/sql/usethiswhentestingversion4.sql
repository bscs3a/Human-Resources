-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 02:42 PM
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
(1, 6, '2024-06-02 11:22:24', 'POST: /master/login'),
(2, 6, '2024-06-02 11:22:24', 'GET: /master/po/audit_logs/page=1'),
(3, 6, '2024-06-02 11:22:25', 'GET: /master/po/audit_logs/page=1'),
(4, 6, '2024-06-02 11:22:33', 'GET: /master/po/audit_logs/page=1'),
(5, 6, '2024-06-02 11:22:33', 'GET: /master/po/audit_logs/page=1'),
(6, 6, '2024-06-02 11:22:38', 'GET: /master/po/audit_logs/page=1'),
(7, 6, '2024-06-02 11:22:38', 'GET: /master/po/audit_logs/page=1'),
(8, 6, '2024-06-02 11:23:15', 'GET: /master/po/audit_logs/page=1'),
(9, 6, '2024-06-02 11:23:15', 'GET: /master/po/audit_logs/page=1'),
(10, 6, '2024-06-02 11:23:24', 'GET: /master/po/audit_logs/page=1'),
(11, 6, '2024-06-02 11:23:24', 'GET: /master/po/audit_logs/page=1'),
(12, 6, '2024-06-02 11:23:31', 'GET: /master/po/audit_logs/page=1'),
(13, 6, '2024-06-02 11:23:31', 'GET: /master/po/audit_logs/page=1'),
(14, 6, '2024-06-02 11:23:33', 'GET: /master/po/audit_logs/page=1'),
(15, 6, '2024-06-02 11:23:33', 'GET: /master/po/audit_logs/page=1'),
(16, 6, '2024-06-02 11:23:36', 'GET: /master/po/audit_logs/page=1'),
(17, 6, '2024-06-02 11:23:36', 'GET: /master/po/audit_logs/page=1'),
(18, 6, '2024-06-02 11:27:13', 'GET: /master/po/audit_logs/page=1'),
(19, 6, '2024-06-02 11:27:13', 'GET: /master/po/audit_logs/page=1'),
(20, 6, '2024-06-02 11:28:46', 'POST: /master/logout'),
(21, 8, '2024-06-02 11:29:19', 'POST: /master/login'),
(22, 8, '2024-06-02 11:29:27', 'POST: /master/fin/getBalanceReport'),
(23, 8, '2024-06-02 11:29:27', 'POST: /master/fin/getEquityReport'),
(24, 8, '2024-06-02 11:29:27', 'POST: /master/fin/getCashFlowReport'),
(25, 8, '2024-06-02 11:29:43', 'GET: /master/fin/logs/page=1'),
(26, 8, '2024-06-02 11:29:45', 'GET: /master/fin/logs/page=1'),
(27, 8, '2024-06-02 11:29:46', 'GET: /master/fin/funds/finance/page=1'),
(28, 8, '2024-06-02 11:29:47', 'GET: /master/fin/logs/page=1'),
(29, 8, '2024-06-02 11:30:01', 'POST: /master/logout'),
(30, 10, '2024-06-02 11:30:17', 'POST: /master/login'),
(31, 10, '2024-06-02 11:30:19', 'GET: /master/sls/Audit-Logs/page=1'),
(32, 10, '2024-06-02 11:30:23', 'GET: /master/sls/Audit-Logs/page=1'),
(33, 10, '2024-06-02 11:30:28', 'GET: /master/sls/Audit-Logs/page=1'),
(34, 10, '2024-06-02 11:30:30', 'GET: /master/sls/funds/Sales/page=1'),
(35, 10, '2024-06-02 11:30:32', 'GET: /master/sls/Audit-Logs/page=1'),
(36, 10, '2024-06-02 11:30:36', 'GET: /master/sls/Audit-Logs/page=1'),
(37, 10, '2024-06-02 11:30:41', 'GET: /master/sls/Audit-Logs/page=1'),
(38, 10, '2024-06-02 11:30:42', 'GET: /master/sls/funds/Sales/page=1'),
(39, 10, '2024-06-02 11:30:43', 'GET: /master/sls/Audit-Logs/page=1'),
(40, 10, '2024-06-02 11:30:47', 'GET: /master/sls/funds/Sales/page=1'),
(41, 10, '2024-06-02 11:30:48', 'GET: /master/sls/Audit-Logs/page=1'),
(42, 10, '2024-06-02 11:30:52', 'GET: /master/sls/Audit-Logs/page=1'),
(43, 10, '2024-06-02 11:31:26', 'GET: /master/sls/Audit-Logs/page=1'),
(44, 10, '2024-06-02 11:31:49', 'POST: /master/logout'),
(45, 1, '2024-06-02 11:32:02', 'POST: /master/login'),
(46, 1, '2024-06-02 11:32:13', 'GET: /master/hr/funds/page=1'),
(47, 1, '2024-06-02 11:32:18', 'GET: /master/hr/generate-payslip/page=1'),
(48, 1, '2024-06-02 11:32:27', 'GET: /master/hr/funds/page=1'),
(49, 1, '2024-06-02 11:32:29', 'GET: /master/hr/departments/product-order/page=1'),
(50, 1, '2024-06-02 11:32:31', 'GET: /master/hr/funds/page=1'),
(51, 1, '2024-06-02 11:32:59', 'GET: /master/hr/departments/product-order/page=1'),
(52, 1, '2024-06-02 11:33:00', 'GET: /master/hr/funds/page=1'),
(53, 1, '2024-06-02 11:33:19', 'POST: /master/logout'),
(54, 7, '2024-06-02 11:33:25', 'POST: /master/login'),
(55, 7, '2024-06-02 11:33:28', 'GET: /master/dlv/audit/page=1'),
(56, 7, '2024-06-02 11:33:31', 'GET: /master/dlv/audit/page=1'),
(57, 7, '2024-06-02 11:33:33', 'GET: /master/dlv/audit/page=1'),
(58, 7, '2024-06-02 11:33:34', 'GET: /master/dlv/pondo/page=1'),
(59, 7, '2024-06-02 11:33:35', 'GET: /master/dlv/audit/page=1'),
(60, 7, '2024-06-02 11:34:04', 'GET: /master/dlv/audit/page=1'),
(61, 7, '2024-06-02 11:34:06', 'GET: /master/dlv/audit/page=1'),
(62, 7, '2024-06-02 11:34:37', 'GET: /master/dlv/audit/page=1'),
(63, 7, '2024-06-02 11:34:40', 'GET: /master/dlv/pondo/page=1'),
(64, 7, '2024-06-02 11:34:40', 'GET: /master/dlv/audit/page=1'),
(65, 7, '2024-06-02 11:36:17', 'POST: /master/logout'),
(66, 9, '2024-06-02 11:36:28', 'POST: /master/login'),
(67, 8, '2024-06-02 11:38:48', 'POST: /master/login'),
(68, 8, '2024-06-02 11:38:49', 'POST: /master/fin/getBalanceReport'),
(69, 8, '2024-06-02 11:38:49', 'POST: /master/fin/getEquityReport'),
(70, 8, '2024-06-02 11:38:49', 'POST: /master/fin/getCashFlowReport'),
(71, 8, '2024-06-02 11:38:54', 'POST: /master/fin/getBalanceReport'),
(72, 8, '2024-06-02 11:38:55', 'POST: /master/fin/getEquityReport'),
(73, 8, '2024-06-02 11:38:55', 'POST: /master/fin/getCashFlowReport'),
(74, 8, '2024-06-02 11:38:55', 'GET: /master/fin/logs/page=1'),
(75, 8, '2024-06-02 11:38:58', 'GET: /master/fin/funds/finance/page=1'),
(76, 8, '2024-06-02 11:39:00', 'GET: /master/fin/logs/page=1'),
(77, 8, '2024-06-02 11:39:03', 'GET: /master/fin/ledger/page=1'),
(78, 8, '2024-06-02 11:39:04', 'GET: /master/fin/logs/page=1'),
(79, 8, '2024-06-02 11:40:29', 'POST: /master/fin/getBalanceReport'),
(80, 8, '2024-06-02 11:40:29', 'POST: /master/fin/getEquityReport'),
(81, 8, '2024-06-02 11:40:29', 'POST: /master/fin/getCashFlowReport');

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
(3, 2, '13:17:42', '2024-06-02', 200, 22312, 'Completed', 'Cash on bank', 10);

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
(23, 'mr 1 helm', '09123456711', 'colineberde1@example.com');

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

--
-- Dumping data for table `deliveryorders`
--

INSERT INTO `deliveryorders` (`DeliveryOrderID`, `SaleID`, `ProductID`, `Quantity`, `ProductWeight`, `Province`, `Municipality`, `StreetBarangayAddress`, `DeliveryDate`, `ReceivedDate`, `DeliveryStatus`, `TruckID`, `Region`) VALUES
(1, 4, 2, 2, 2.00, 'Pampanga', 'San Fernando', 'san juan', '2024-06-18', '0000-00-00', 'Failed to Deliver', 1, NULL),
(2, 4, 3, 1, 1.00, 'Pampanga', 'San Fernando', 'san juan', '2024-06-18', NULL, 'Pending', NULL, NULL);

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
(12, 11, 28);

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
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `product` varchar(255) NOT NULL,
  `price` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `stock_id`, `image`, `product`, `price`, `quantity`, `category`, `status`, `date_added`) VALUES
(6, 3, NULL, 'Cement (50kg)', 240, 0, 'Building Materials', 'Overstock', '2024-06-02 01:43:33');

-- --------------------------------------------------------

--
-- Table structure for table `inventoryorders`
--

CREATE TABLE `inventoryorders` (
  `order_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_ordered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventoryorders`
--

INSERT INTO `inventoryorders` (`order_id`, `product_name`, `product_id`, `quantity`, `date_ordered`) VALUES
(2, 'Screwdriver Set (Standard)', 2, 155, '2024-06-02 01:17:14');

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
(14, 6, '2024-06-02 13:16:28', 24, 223, 'Recount Inventory'),
(15, 11, '2024-06-02 13:16:28', 3, 800, 'made a sale with tax'),
(16, 29, '2024-06-02 13:16:28', 18, 96, 'made a sale with tax'),
(17, 4, '2024-06-02 07:17:42', 6, 22312, 'Pondo expense for Product Order'),
(18, 6, '2024-06-02 13:18:50', 24, 223, 'Recount Inventory'),
(19, 11, '2024-06-02 13:18:50', 4, 800, 'made a sale with tax'),
(20, 29, '2024-06-02 13:18:50', 18, 96, 'made a sale with tax'),
(21, 4, '2024-06-02 07:23:43', 1, 100, 'Pondo expense for Point of Sales'),
(22, 6, '2024-06-02 13:31:33', 24, 223, 'Recount Inventory'),
(23, 11, '2024-06-02 13:31:33', 3, 800, 'made a sale with tax'),
(24, 29, '2024-06-02 13:31:33', 18, 96, 'made a sale with tax'),
(25, 6, '2024-06-02 13:48:43', 24, 323, 'Recount Inventory'),
(26, 11, '2024-06-02 13:48:43', 3, 1350, 'made a sale with tax'),
(27, 29, '2024-06-02 13:48:44', 18, 156, 'made a sale with tax'),
(28, 4, '2024-06-02 07:52:09', 16, 100, 'Pondo expense for Delivery');

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
(8, 3, 2, 3, 100, '13:17:42', '2024-06-02');

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
(2, 2, 3, 'uploads/Acrylic_Paint_Set.png', 'Acrylic Paint Set', 'MRS DIY', 'Set of vibrant acrylic paints suitable for various surfaces', 'Art Supplies', 'No', 99.00, 65.00, 96, 'pcs', 0.12, 0.70, '', 'Not Available'),
(3, 2, 2, 'uploads/Adjustable_Wrench_(12_inches).png', 'Adjustable Wrench (12 inches)', 'MRS DIY', 'Adjustable wrench for plumbing and mechanical work', 'Tools', 'No', 109.00, 86.00, 97, 'pcs', 0.12, 1.20, '', 'Available'),
(4, 3, 1, 'uploads/Hammer_(Large).png', 'Hammer (Large)(Large)', 'MR DIY', 'Heavy-duty hammer for construction work', 'Tools', 'No', 329.00, 260.00, NULL, 'pcs', 0.12, 1.50, '', 'Available'),
(5, 3, 1, 'uploads/Screwdriver_Set_(Standard).png', 'Screwdriver Set (Standard)', 'MR DIY', 'Set of 6 screwdrivers with various sizes', 'Tools', 'No', 969.00, 670.00, NULL, 'set', 0.12, 0.80, '', 'Available'),
(6, 4, 2, 'uploads/Cement_(50kg).png', 'Cement (50kg)', 'Girlsen', 'Portland cement for construction purposes', 'Building Materials', 'Yes', 240.00, 160.00, NULL, 'pcs', 0.12, 50.00, '', 'Available'),
(7, 2, 3, 'uploads/Paint_Brush_Set.png', 'Paint Brush Set', 'MRS DIY', 'Set of 10 paint brushes for art projects', 'Art Supplies', 'No', 209.00, 180.00, NULL, 'set', 0.12, 0.50, '', 'Available'),
(8, 3, 4, 'uploads/Safety_Helmet.png', 'Safety Helmet', 'MR DIY', 'Hard hat helmet for construction safety', 'Safety Gear', 'No', 470.00, 415.00, NULL, 'pcs', 0.12, 0.30, '', 'Available'),
(9, 3, 1, 'uploads/drill machine.jpg', 'Drill Machine', 'MR DIY', 'Cordless drill machine with rechargeable batteries', 'Tools', 'No', 1100.00, 860.00, NULL, 'pcs', 0.12, 2.00, '', 'Available'),
(10, 3, 2, 'uploads/Plywood (4x8 feet).jpg', 'Plywood (4x8 feet)', 'MR DIY', 'Plywood sheets for carpentry and construction', 'Building Materials', 'Yes', 650.00, 560.00, NULL, 'sheet', 0.12, 20.00, '', 'Available'),
(11, 3, 2, 'uploads/Steel_Bar_(1_meter).png', 'Steel Bar (1 meter)', 'MR DIY', 'Deformed steel bars for reinforcement in concrete ...', 'Building Materials', 'Yes', 55.00, 35.00, NULL, 'meter', 0.12, 2.50, '', 'Available'),
(12, 3, 2, 'uploads/Concrete Blocks (Standard).jpg', 'Concrete Blocks (Standard)', 'MR DIY', 'Standard concrete blocks for building walls', 'Building Materials', 'Yes', 12.00, 8.00, NULL, 'pcs', 0.12, 2.30, '', 'Available'),
(13, 2, 5, 'uploads/Paint_Thinner.png', 'Paint Thinner', 'MRS DIY', 'Solvent used for thinning oil-based paints and cleaning paint brushes', 'Paints and Chemicals', 'No', 170.00, 135.00, NULL, 'pcs', 0.12, 1.00, '', 'Available'),
(14, 4, 2, 'uploads/Roofing_Shingles_(Bundle).png', 'Roofing Shingles (Bundle)', 'Girlsen', 'Bundle of roofing shingles for covering roofs', 'Building Materials', 'Yes', 1750.00, 1360.00, NULL, 'bundle', 0.12, 13.61, '', 'Available'),
(15, 4, 2, 'uploads/Sand_(1_cubic_yard).jpg', 'Sand (1 cubic yard)', 'Girlsen', 'Fine aggregate sand for various construction applications', 'Building Materials', 'Yes', 1500.00, 1250.00, NULL, 'cubic yard', 0.12, 1088.62, '', 'Available'),
(16, 4, 2, 'uploads/Brick_(Standard).png', 'Brick (Standard)', 'Girlsen', 'Standard clay bricks for construction', 'Building Materials', 'Yes', 12.00, 7.00, NULL, 'pcs', 0.12, 2.50, '', 'Available'),
(17, 4, 1, 'uploads/Wood_Studs_(8_feet).png', 'Wood Studs (8 feet)', 'Girlsen', 'Standard wood studs for framing walls', 'Tools', 'Yes', 225.00, 196.00, NULL, '8 feet', 0.12, 3.63, '', 'Available'),
(18, 5, 2, 'uploads/Galvanized_Nails_(5_lbs).png', 'Galvanized Nails (5 lbs)', 'Edward Shop', 'Galvanized nails for various construction applicat...', 'Building Materials', 'Yes', 50.00, 24.00, NULL, 'lbs', 0.12, 2.27, '', 'Available'),
(19, 5, 2, 'uploads/Drywall_(4x8_feet).png', 'Drywall (4x8 feet)', 'Edward Shop', 'Drywall sheets for interior wall finishing', 'Building Materials', 'Yes', 450.00, 395.00, NULL, 'sheet', 0.12, 22.68, '', 'Available'),
(20, 5, 2, 'uploads/Concrete_Mix_(50_lb).png', 'Concrete Mix (50 lb)', 'Edward Shop', 'Pre-mixed concrete for small-scale construction projects', 'Building Materials', 'Yes', 365.00, 315.00, NULL, 'lb', 0.12, 18.68, '', 'Available'),
(21, 5, 1, 'uploads/Adjustable_Wrench_(12_inches).png', 'Adjustable Wrench (12 inches)', 'Edward Shop', 'Adjustable wrench for plumbing and mechanical work', 'Tools', 'No', 115.00, 107.00, NULL, 'pcs', 0.12, 1.20, '', 'Available'),
(22, 5, 1, 'uploads/Electric_Screwdriver.png', 'Electric Screwdriver', 'Edward Shop', 'Electric screwdriver with multiple torque settings', 'Tools', 'No', 269.00, 253.00, NULL, 'pcs', 0.12, 1.80, '', 'Available'),
(23, 2, 2, 'uploads/PVC_Pipes_(10_feet).png', 'PVC Pipes (10 feet)', 'MRS DIY', 'PVC pipes for plumbing and drainage systems', 'Building Materials', 'Yes', 42.00, 38.00, NULL, 'feet', 0.12, 6.00, '', 'Available'),
(24, 2, 2, 'uploads/Insulation_Foam_Board_(4x8_feet).png', 'Insulation Foam Board (4x8 feet)', 'MRS DIY', 'Foam boards for insulation purposes in construction', 'Building Materials', 'Yes', 380.00, 369.00, NULL, 'sheet', 0.12, 12.00, '', 'Available'),
(25, 2, 3, 'uploads/Watercolor_Paint_Set.png', 'Watercolor Paint Set', 'MRS DIY', 'Set of high-quality watercolor paints for artists', 'Art Supplies', 'No', 109.00, 87.00, NULL, 'set', 0.12, 0.60, '', 'Available'),
(26, 2, 3, 'uploads/Acrylic_Paint_Set.png', 'Acrylic Paint Set', 'MRS DIY', 'Set of vibrant acrylic paints suitable for various surfaces', 'Art Supplies', 'No', 75.00, 55.00, NULL, 'set', 0.12, 0.65, '', 'Available'),
(27, 5, 5, 'uploads/Oil_Paint_Set.png', 'Oil Paint Set', 'Edward Shop', 'Set of high-quality oil paints for professional artists', 'Paints and Chemicals', 'No', 129.00, 97.00, NULL, 'set', 0.12, 0.80, '', 'Available'),
(28, 5, 3, 'uploads/Sketching_Pencils_(Set_of_12).png', 'Sketching Pencils (Set of 12)', 'Edward Shop', 'Set of graphite sketching pencils for drawing and ...', 'Art Supplies', 'No', 45.00, 25.00, NULL, 'set', 0.12, 0.30, '', 'Available'),
(29, 5, 3, 'uploads/Canvas_Roll_(6_feet).png', 'Canvas Roll (6 feet)', 'Edward Shop', 'Roll of primed canvas for painting', 'Art Supplies', 'Yes', 40.00, 29.00, NULL, 'roll', 0.12, 3.00, '', 'Available'),
(30, 3, 4, 'uploads/Hard_Hat_with_Ear_Protection.png', 'Hard Hat with Ear Protection', 'MR DIY', 'Safety hard hat with built-in ear protection for noisy environments', 'Safety Gear', 'No', 305.00, 287.00, NULL, 'pcs', 0.12, 0.50, '', 'Available'),
(31, 3, 4, 'uploads/Steel-Toed_Boots.png', 'Steel-Toed Boots', 'MR DIY', 'Heavy-duty steel-toed boots for foot protection in...', 'Safety Gear', 'No', 799.00, 0.00, NULL, 'pair', 0.12, 2.00, '', 'Available'),
(32, 6, 4, 'uploads/Reflective_Safety_Tape_(Roll).png', 'Reflective Safety Tape (Roll)', 'Kobe Shop', 'Roll of reflective tape for enhancing visibility on safety gear', 'Safety Gear', 'No', 40.00, 25.00, NULL, 'roll', 0.12, 0.20, '', 'Available'),
(33, 6, 2, 'uploads/Wood_Stain_(1_quart).jpg', 'Wood Stain (1 quart)', 'Kobe Shop', 'High-quality wood stain for finishing wood surface...', 'Building Materials', 'No', 215.00, 185.00, NULL, 'quart', 0.12, 2.00, '', 'Available'),
(34, 6, 1, 'uploads/Paint_Roller_Set.png', 'Paint Roller Set', 'Kobe Shop', 'Set of paint rollers for applying paint smoothly on surfaces', 'Tools', 'No', 300.00, 280.00, NULL, 'set', 0.12, 0.80, '', 'Available'),
(35, 6, 5, 'uploads/Adhesive_Primer_(1_gallon).png', 'Adhesive Primer (1 gallon)', 'Kobe Shop', 'Adhesive primer for preparing surfaces before pain...', 'Paints and Chemicals', 'No', 210.00, 190.00, NULL, 'gallon', 0.12, 8.00, '', 'Available');

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

--
-- Dumping data for table `saledetails`
--

INSERT INTO `saledetails` (`SaleDetailID`, `SaleID`, `ProductID`, `Quantity`, `ProductWeight`, `UnitPrice`, `Subtotal`, `Tax`, `TotalAmount`) VALUES
(1, 1, 2, 1, 1.00, 500.00, 500.00, 60.00, 560.00),
(2, 1, 3, 1, 1.00, 300.00, 300.00, 36.00, 336.00),
(3, 2, 2, 1, 1.00, 500.00, 500.00, 60.00, 560.00),
(4, 2, 3, 1, 1.00, 300.00, 300.00, 36.00, 336.00),
(5, 3, 2, 1, 1.00, 500.00, 500.00, 60.00, 560.00),
(6, 3, 3, 1, 1.00, 300.00, 300.00, 36.00, 336.00),
(7, 4, 2, 2, 2.00, 500.00, 1000.00, 120.00, 1120.00),
(8, 4, 3, 1, 1.00, 300.00, 300.00, 36.00, 336.00);

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

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`SaleID`, `SaleDate`, `SalePreference`, `ShippingFee`, `PaymentMode`, `CardNumber`, `ExpiryDate`, `CVV`, `Discount`, `TotalAmount`, `EmployeeID`, `CustomerID`) VALUES
(1, '2024-06-02 13:16:28', 'Pick-up', 0.00, 'Cash', '', '', '', 0.00, 896.00, 10, 20),
(2, '2024-06-02 13:18:49', 'Pick-up', 0.00, 'Card', '123123', '123123123', '123', 0.00, 896.00, 10, 21),
(3, '2024-06-02 13:31:32', 'Pick-up', 0.00, 'Cash', '', '', '', 0.00, 896.00, 10, 22),
(4, '2024-06-02 13:48:42', 'Delivery', 50.00, 'Cash', '', '', '', 0.00, 1506.00, 10, 23);

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

--
-- Dumping data for table `targetsales`
--

INSERT INTO `targetsales` (`TargetID`, `MonthYear`, `TargetAmount`, `EmployeeID`) VALUES
(1, '2024-06-01', 1000.00, NULL),
(2, '2024-01-01', 200.00, NULL);

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
(3, 3, 2, '2024-06-02', '13:17:45', 'Completed', NULL);

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
(1, 'ALD123', 'Light-Duty', 4000.00, 'Unavailable'),
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
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stock_id` (`stock_id`);

--
-- Indexes for table `inventoryorders`
--
ALTER TABLE `inventoryorders`
  ADD PRIMARY KEY (`order_id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audit_log`
--
ALTER TABLE `audit_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `batch_orders`
--
ALTER TABLE `batch_orders`
  MODIFY `Batch_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `deliveryorders`
--
ALTER TABLE `deliveryorders`
  MODIFY `DeliveryOrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inventoryorders`
--
ALTER TABLE `inventoryorders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `LedgerXactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `SaleDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SaleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `TargetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tax_info`
--
ALTER TABLE `tax_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `Transaction_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
