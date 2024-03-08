-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2024 at 11:26 AM
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
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `AccountNo` int(11) NOT NULL,
  `AccountType_Ext` varchar(2) NOT NULL,
  `EntityType` varchar(1) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `ContactInformation` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accountstatement`
--

CREATE TABLE `accountstatement` (
  `AccountStaID` int(11) NOT NULL,
  `AccountNo` int(11) NOT NULL,
  `Date` date NOT NULL,
  `ClosingBalance` double NOT NULL,
  `TotalDebit` double NOT NULL,
  `TotalCredit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accounttransaction`
--

CREATE TABLE `accounttransaction` (
  `AccountXactID` int(11) NOT NULL,
  `LedgerNo` int(11) NOT NULL,
  `DateTime` datetime NOT NULL,
  `XactTypeCode` varchar(2) NOT NULL,
  `XactTypeCode_Ext` varchar(2) NOT NULL,
  `AccountNo` int(11) NOT NULL,
  `Amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accounttype`
--

CREATE TABLE `accounttype` (
  `AccountType` varchar(2) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounttype`
--

INSERT INTO `accounttype` (`AccountType`, `Description`) VALUES
('AA', 'Asset'),
('CR', 'Contra-Revenue'),
('EX', 'Expenses'),
('LA', 'Liability'),
('RV', 'Revenue');

-- --------------------------------------------------------

--
-- Table structure for table `accounttype_ext`
--

CREATE TABLE `accounttype_ext` (
  `AccountType_Ext` varchar(2) NOT NULL,
  `XactTypeCode` varchar(2) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounttype_ext`
--

INSERT INTO `accounttype_ext` (`AccountType_Ext`, `XactTypeCode`, `Description`) VALUES
('AP', 'CR', 'Accounts Payable'),
('AR', 'DR', 'Accounts Receivable'),
('IT', 'CR', 'Investor'),
('TP', 'CR', 'Tax Payable');

-- --------------------------------------------------------

--
-- Table structure for table `entitytype`
--

CREATE TABLE `entitytype` (
  `EntityType` varchar(1) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entitytype`
--

INSERT INTO `entitytype` (`EntityType`, `Name`) VALUES
('O', 'Organization'),
('P', 'Person');

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE `ledger` (
  `LedgerNo` int(11) NOT NULL,
  `AccountType` varchar(2) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ledger`
--

INSERT INTO `ledger` (`LedgerNo`, `AccountType`, `Name`) VALUES
(101, 'AA', 'Cash'),
(102, 'AA', 'Equipment'),
(103, 'AA', 'Insurance'),
(104, 'AA', 'Inventory'),
(301, 'EX', 'Cost of Goods Sold'),
(302, 'EX', 'Rent'),
(303, 'EX', 'Tax'),
(304, 'EX', 'Insurance Expense'),
(305, 'EX', 'Payroll'),
(306, 'EX', 'Utilities'),
(307, 'EX', 'Theft Expense'),
(308, 'EX', 'Interest Expense'),
(309, 'EX', 'Other Operating Expense'),
(401, 'CR', 'Discount'),
(402, 'CR', 'Allowance'),
(403, 'CR', 'Returns\r\n'),
(501, 'RV', 'Sales');

-- --------------------------------------------------------

--
-- Table structure for table `ledgerstatement`
--

CREATE TABLE `ledgerstatement` (
  `StatementID` int(11) NOT NULL,
  `LedgerNo` int(11) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `ClosingBalance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ledgertransaction`
--

CREATE TABLE `ledgertransaction` (
  `LedgerXactID` int(11) NOT NULL,
  `LedgerNo` int(11) NOT NULL,
  `Date_Time` datetime NOT NULL DEFAULT current_timestamp(),
  `LedgerNo_Dr` int(11) NOT NULL,
  `Amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactiontype_de`
--

CREATE TABLE `transactiontype_de` (
  `XactTypeCode` varchar(2) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactiontype_de`
--

INSERT INTO `transactiontype_de` (`XactTypeCode`, `Name`) VALUES
('CR', 'Credit'),
('DR', 'Debit');

-- --------------------------------------------------------

--
-- Table structure for table `transactiontype_ext`
--

CREATE TABLE `transactiontype_ext` (
  `XactTypeCode_Ext` varchar(2) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactiontype_ext`
--

INSERT INTO `transactiontype_ext` (`XactTypeCode_Ext`, `Description`) VALUES
('BR', 'Borrow'),
('IV', 'Invest'),
('LL', 'Lend'),
('PD', 'Paid'),
('RP', 'Receive Payment'),
('WD', 'Withdraw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AccountNo`),
  ADD KEY `AccountType_Ext` (`AccountType_Ext`),
  ADD KEY `EntityType` (`EntityType`);

--
-- Indexes for table `accountstatement`
--
ALTER TABLE `accountstatement`
  ADD PRIMARY KEY (`AccountStaID`),
  ADD KEY `AccountNo` (`AccountNo`);

--
-- Indexes for table `accounttransaction`
--
ALTER TABLE `accounttransaction`
  ADD PRIMARY KEY (`AccountXactID`),
  ADD KEY `LedgerNo` (`LedgerNo`),
  ADD KEY `WhatAction` (`XactTypeCode_Ext`),
  ADD KEY `DebOrCred?` (`XactTypeCode`);

--
-- Indexes for table `accounttype`
--
ALTER TABLE `accounttype`
  ADD PRIMARY KEY (`AccountType`);

--
-- Indexes for table `accounttype_ext`
--
ALTER TABLE `accounttype_ext`
  ADD PRIMARY KEY (`AccountType_Ext`),
  ADD KEY `XactTypeCode` (`XactTypeCode`);

--
-- Indexes for table `entitytype`
--
ALTER TABLE `entitytype`
  ADD PRIMARY KEY (`EntityType`);

--
-- Indexes for table `ledger`
--
ALTER TABLE `ledger`
  ADD PRIMARY KEY (`LedgerNo`),
  ADD KEY `AccountType` (`AccountType`);

--
-- Indexes for table `ledgerstatement`
--
ALTER TABLE `ledgerstatement`
  ADD PRIMARY KEY (`StatementID`),
  ADD KEY `LedgerNo` (`LedgerNo`);

--
-- Indexes for table `ledgertransaction`
--
ALTER TABLE `ledgertransaction`
  ADD PRIMARY KEY (`LedgerXactID`),
  ADD KEY `LedgerNo` (`LedgerNo`),
  ADD KEY `LedgerNo_Dr` (`LedgerNo_Dr`);

--
-- Indexes for table `transactiontype_de`
--
ALTER TABLE `transactiontype_de`
  ADD PRIMARY KEY (`XactTypeCode`);

--
-- Indexes for table `transactiontype_ext`
--
ALTER TABLE `transactiontype_ext`
  ADD PRIMARY KEY (`XactTypeCode_Ext`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `AccountNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accountstatement`
--
ALTER TABLE `accountstatement`
  MODIFY `AccountStaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accounttransaction`
--
ALTER TABLE `accounttransaction`
  MODIFY `AccountXactID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ledgerstatement`
--
ALTER TABLE `ledgerstatement`
  MODIFY `StatementID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ledgertransaction`
--
ALTER TABLE `ledgertransaction`
  MODIFY `LedgerXactID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `EntityType` FOREIGN KEY (`EntityType`) REFERENCES `entitytype` (`EntityType`),
  ADD CONSTRAINT `WhatsTheAccountFor?` FOREIGN KEY (`AccountType_Ext`) REFERENCES `accounttype_ext` (`AccountType_Ext`);

--
-- Constraints for table `accountstatement`
--
ALTER TABLE `accountstatement`
  ADD CONSTRAINT `WhosAccountIsThis?` FOREIGN KEY (`AccountNo`) REFERENCES `account` (`AccountNo`);

--
-- Constraints for table `accounttransaction`
--
ALTER TABLE `accounttransaction`
  ADD CONSTRAINT `DebOrCred?` FOREIGN KEY (`XactTypeCode`) REFERENCES `transactiontype_de` (`XactTypeCode`),
  ADD CONSTRAINT `LedgerNo c` FOREIGN KEY (`LedgerNo`) REFERENCES `ledger` (`LedgerNo`),
  ADD CONSTRAINT `WhatAction` FOREIGN KEY (`XactTypeCode_Ext`) REFERENCES `transactiontype_ext` (`XactTypeCode_Ext`);

--
-- Constraints for table `accounttype_ext`
--
ALTER TABLE `accounttype_ext`
  ADD CONSTRAINT `DebitOrCredit` FOREIGN KEY (`XactTypeCode`) REFERENCES `transactiontype_de` (`XactTypeCode`);

--
-- Constraints for table `ledger`
--
ALTER TABLE `ledger`
  ADD CONSTRAINT `Ledger Classification` FOREIGN KEY (`AccountType`) REFERENCES `accounttype` (`AccountType`);

--
-- Constraints for table `ledgerstatement`
--
ALTER TABLE `ledgerstatement`
  ADD CONSTRAINT `LedgerNo` FOREIGN KEY (`LedgerNo`) REFERENCES `ledger` (`LedgerNo`);

--
-- Constraints for table `ledgertransaction`
--
ALTER TABLE `ledgertransaction`
  ADD CONSTRAINT `Dr Ledge no to Ledger` FOREIGN KEY (`LedgerNo_Dr`) REFERENCES `ledger` (`LedgerNo`),
  ADD CONSTRAINT `Ledger no to Ledger` FOREIGN KEY (`LedgerNo`) REFERENCES `ledger` (`LedgerNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
