-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2024 at 10:58 AM
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
(1, 'Bang'),
(2, 'Bing'),
(3, 'Boom'),
(4, 'Hand Tools');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `Order_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Request_ID` int(11) NOT NULL,
  `Supplier_ID` int(11) NOT NULL,
  `Category_ID` int(11) NOT NULL,
  `Date_Ordered` date DEFAULT current_timestamp(),
  `Time_Ordered` time DEFAULT current_timestamp(),
  `Order_Status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`Order_ID`, `Product_ID`, `Request_ID`, `Supplier_ID`, `Category_ID`, `Date_Ordered`, `Time_Ordered`, `Order_Status`) VALUES
(1, 3, 1, 2, 3, '2024-03-27', '23:48:47', 'Completed'),
(2, 2, 2, 1, 4, '2024-03-27', '23:52:31', 'Completed'),
(3, 1, 3, 1, 4, '2024-03-27', '23:54:20', 'Completed'),
(4, 2, 4, 1, 4, '2024-03-27', '23:58:04', 'Completed'),
(5, 1, 5, 1, 4, '2024-03-27', '23:58:04', 'Completed'),
(6, 3, 6, 2, 3, '2024-03-27', '23:58:04', 'Completed'),
(7, 3, 7, 2, 3, '2024-03-28', '00:23:35', 'Completed'),
(8, 2, 8, 1, 4, '2024-03-28', '00:23:35', 'Canceled'),
(9, 1, 9, 1, 4, '2024-03-28', '00:23:35', 'Completed'),
(10, 2, 10, 1, 4, '2024-03-28', '00:23:35', 'Completed'),
(11, 3, 11, 2, 3, '2024-03-28', '00:23:35', 'Canceled'),
(12, 2, 12, 1, 4, '2024-03-29', '00:46:29', 'Canceled'),
(13, 2, 12, 1, 4, '2024-03-29', '00:46:30', 'Canceled'),
(14, 2, 12, 1, 4, '2024-03-29', '00:46:31', 'to receive'),
(15, 2, 12, 1, 4, '2024-03-29', '00:46:32', 'to receive');

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
  `Stocks` int(11) DEFAULT NULL,
  `UnitOfMeasurement` varchar(20) DEFAULT NULL,
  `TaxRate` decimal(5,2) DEFAULT NULL,
  `ProductWeight` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `Supplier_ID`, `Category_ID`, `ProductImage`, `ProductName`, `Supplier`, `Description`, `Category`, `DeliveryRequired`, `Price`, `Stocks`, `UnitOfMeasurement`, `TaxRate`, `ProductWeight`) VALUES
(1, 1, 4, 'uploads/hammer.jpg', 'Hammer', 'Edgward Tools', 'A hammer is a tool, most often a hand tool, consisting of a weighted \"head\" fixed to a long handle that is swung to deliver an impact to a small area of an object.', 'Hand Tools', NULL, 250.00, NULL, NULL, NULL, 18.00),
(2, 1, 4, 'uploads/pliers.jpg', 'Pliers', 'Edgward Tools', 'Pliers are a hand tool used to hold objects firmly, possibly developed from tongs used to handle hot metal in Bronze Age Europe.', 'Hand Tools', NULL, 120.00, NULL, NULL, NULL, 8.00),
(3, 2, 3, 'uploads/staple gun.jpg', 'Staple Gun', 'Markiplier Dept', 'A staple gun or powered stapler is a hand-held machine used to drive heavy metal staples into wood, plastic, or masonry.', 'Boom', NULL, 420.00, NULL, NULL, NULL, 12.00);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `Request_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Supplier_ID` int(11) NOT NULL,
  `Product_Quantity` int(11) DEFAULT NULL,
  `Product_Total_Price` int(11) DEFAULT NULL,
  `Items_Subtotal` int(11) DEFAULT NULL,
  `Total_Amount` int(11) DEFAULT NULL,
  `request_Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`Request_ID`, `Product_ID`, `Supplier_ID`, `Product_Quantity`, `Product_Total_Price`, `Items_Subtotal`, `Total_Amount`, `request_Status`) VALUES
(1, 3, 2, 10, 4200, NULL, NULL, 'accepted'),
(2, 2, 1, 5, 600, NULL, NULL, 'accepted'),
(3, 1, 1, 3, 750, NULL, NULL, 'accepted'),
(4, 2, 1, 1, 120, NULL, NULL, 'accepted'),
(5, 1, 1, 3, 750, NULL, NULL, 'accepted'),
(6, 3, 2, 5, 2100, NULL, NULL, 'accepted'),
(7, 3, 2, 1, 420, NULL, NULL, 'accepted'),
(8, 2, 1, 1, 120, NULL, NULL, 'accepted'),
(9, 1, 1, 1, 250, NULL, NULL, 'accepted'),
(10, 2, 1, 1, 120, NULL, NULL, 'accepted'),
(11, 3, 2, 1, 420, NULL, NULL, 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `Supplier_ID` int(11) NOT NULL,
  `Category_ID` int(11) NOT NULL,
  `Transcation_ID` int(11) NOT NULL,
  `Supplier_Name` varchar(50) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `Contact_Number` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`Supplier_ID`, `Category_ID`, `Transcation_ID`, `Supplier_Name`, `Location`, `Contact_Number`) VALUES
(1, 0, 0, 'Edgward Tools', 'xd', 23),
(2, 0, 0, 'Markiplier Dept', 'xd', 123);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `Transaction_ID` int(11) NOT NULL,
  `Order_ID` int(11) NOT NULL,
  `Request_ID` int(11) NOT NULL,
  `Supplier_ID` int(11) NOT NULL,
  `Date_Delivered` date DEFAULT current_timestamp(),
  `Time_Delivered` time DEFAULT current_timestamp(),
  `Order_Status` varchar(50) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Feedback` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`Transaction_ID`, `Order_ID`, `Request_ID`, `Supplier_ID`, `Date_Delivered`, `Time_Delivered`, `Order_Status`, `Rating`, `Feedback`) VALUES
(1, 1, 1, 2, '2024-03-28', '00:22:39', 'Completed', NULL, NULL),
(2, 2, 2, 1, '2024-03-28', '00:22:46', 'Completed', NULL, NULL),
(3, 3, 3, 1, '2024-03-28', '00:22:46', 'Completed', NULL, NULL),
(4, 4, 4, 1, '2024-03-28', '00:22:47', 'Completed', NULL, NULL),
(5, 5, 5, 1, '2024-03-28', '00:22:48', 'Completed', NULL, NULL),
(6, 6, 6, 2, '2024-03-28', '00:22:49', 'Completed', NULL, NULL),
(7, 7, 7, 2, '2024-03-28', '00:24:04', 'Completed', NULL, NULL),
(8, 8, 8, 1, '2024-03-28', '00:24:06', 'Canceled', NULL, NULL),
(9, 10, 10, 1, '2024-03-28', '00:24:09', 'Completed', NULL, NULL),
(10, 11, 11, 2, '2024-03-28', '00:24:10', 'Canceled', NULL, NULL),
(11, 9, 9, 1, '2024-03-28', '00:24:15', 'Completed', NULL, NULL),
(12, 12, 12, 1, '2024-03-29', '00:50:49', 'Canceled', NULL, NULL),
(13, 13, 12, 1, '2024-03-29', '00:50:50', 'Canceled', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`Request_ID`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`Supplier_ID`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`Transaction_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `Request_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `Supplier_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `Transaction_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
