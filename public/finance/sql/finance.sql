-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2024 at 02:10 PM
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
(18, 8, 'Tax', NULL, NULL),
(19, 8, 'Insurance Expense', NULL, NULL),
(20, 8, 'Utilities', NULL, NULL),
(21, 8, 'Theft Expense', NULL, NULL),
(22, 8, 'Interest Expense', NULL, NULL),
(23, 8, 'Other Operating Expense', NULL, NULL),
(24, 9, 'Cost of Goods Sold', NULL, NULL),
(25, 11, 'Retained Earnings/Loss', NULL, NULL),
(26, 10, 'Tax Payable', NULL, NULL);

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
(1, 11, '2024-02-15 08:13:19', 3, 1000, 'ez'),
(2, 11, '2024-01-17 08:13:19', 3, 2000, 'ez');

-- --------------------------------------------------------

--
-- Table structure for table `requestexpense`
--

CREATE TABLE `requestexpense` (
  `re_id` int(11) NOT NULL,
  `payusing` int(11) NOT NULL,
  `amount` double NOT NULL,
  `payfor` int(11) NOT NULL,
  `proofofinvoice` text NOT NULL,
  `status` enum('pending','confirm','deny') NOT NULL,
  `details` text NOT NULL,
  `department` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `grouptype`
--
ALTER TABLE `grouptype`
  ADD PRIMARY KEY (`grouptype`);

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
-- Indexes for table `requestexpense`
--
ALTER TABLE `requestexpense`
  ADD PRIMARY KEY (`re_id`),
  ADD KEY `payusing` (`payusing`),
  ADD KEY `payfor` (`payfor`);

--
-- Indexes for table `transactiontype_de`
--
ALTER TABLE `transactiontype_de`
  ADD PRIMARY KEY (`XactTypeCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounttype`
--
ALTER TABLE `accounttype`
  MODIFY `AccountType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ledger`
--
ALTER TABLE `ledger`
  MODIFY `ledgerno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `ledgertransaction`
--
ALTER TABLE `ledgertransaction`
  MODIFY `LedgerXactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `requestexpense`
--
ALTER TABLE `requestexpense`
  MODIFY `re_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `requestexpense`
--
ALTER TABLE `requestexpense`
  ADD CONSTRAINT `payfor` FOREIGN KEY (`payfor`) REFERENCES `ledger` (`ledgerno`),
  ADD CONSTRAINT `payusing` FOREIGN KEY (`payusing`) REFERENCES `ledger` (`ledgerno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
