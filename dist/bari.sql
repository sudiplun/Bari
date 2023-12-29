-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 29, 2023 at 04:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bari`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `CategoryCode` varchar(50) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `CategoryName`, `CategoryCode`, `PostingDate`) VALUES
(9, 'Vegetables', 'T100', '2023-07-13 12:27:28'),
(13, 'Meat', 'M100', '2023-12-25 01:36:19'),
(14, 'Friuts', 'F100', '2023-12-25 02:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `ProductId` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `InvoiceNumber` int(11) DEFAULT NULL,
  `CustomerName` varchar(150) DEFAULT NULL,
  `CustomerContactNo` bigint(12) DEFAULT NULL,
  `PaymentMode` varchar(100) DEFAULT NULL,
  `InvoiceGenDate` timestamp NULL DEFAULT current_timestamp(),
  `ApprovalStatus` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `ProductId`, `Quantity`, `InvoiceNumber`, `CustomerName`, `CustomerContactNo`, `PaymentMode`, `InvoiceGenDate`, `ApprovalStatus`) VALUES
(18, 27, 5, 238111, 'Bikash', 98328289239, 'cash', '2023-12-25 02:35:44', 'Approved'),
(19, 32, 2000, 822033, 'test123', 97323723772, 'cash', '2023-12-25 03:49:12', 'Rejected'),
(20, 11, 433, 128724, 'sd', 45678978675645342, 'cash', '2023-12-28 13:48:03', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL,
  `ProductName` varchar(150) DEFAULT NULL,
  `ProductPrice` decimal(10,0) DEFAULT current_timestamp(),
  `LeftQuantity` decimal(10,2) DEFAULT 0.00,
  `TotalQuantity` decimal(10,2) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `CategoryCode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `CategoryName`, `ProductName`, `ProductPrice`, `LeftQuantity`, `TotalQuantity`, `PostingDate`, `UpdationDate`, `CategoryCode`) VALUES
(11, 'Vegetables', 'Tomatoes', 140, 100.00, 1000.00, '2023-08-11 08:18:59', '2023-08-11 08:18:59', NULL),
(24, 'Vegetables', 'Potatoes ', 160, 500.00, 5555.00, '2023-12-23 07:49:36', '2023-12-23 07:49:36', 'T100'),
(25, 'Vegetables', 'Cauliflower', 20, 2000.00, 2000.00, '2023-12-23 07:38:00', '2023-12-23 07:38:00', 'T100'),
(26, 'Meat', 'Chicken', 360, 100.00, 400.00, '2023-12-25 01:37:04', '2023-12-25 01:37:04', 'M100'),
(27, 'Meat', 'Goat', 15000, 12.00, 20.00, '2023-12-25 02:34:22', '2023-12-25 02:34:22', 'M100'),
(28, 'Vegetables', 'Carrot', 50, 500.00, 2000.00, '2023-12-25 02:34:37', '2023-12-25 02:34:37', 'T100'),
(29, 'Vegetables', 'Cucumber', 80, 0.00, 300.00, '2023-12-25 02:31:13', NULL, 'T100'),
(30, 'Vegetables', 'Little Finger', 34, 0.00, 5000.00, '2023-12-25 02:32:43', NULL, 'T100'),
(31, 'Friuts', 'Apple', 300, 200.00, 300.00, '2023-12-25 02:35:06', '2023-12-25 02:35:06', 'T100'),
(32, 'Vegetables', 'test', 200, 0.00, 1000.00, '2023-12-25 03:48:43', NULL, 'T100');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `ID` int(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `UserName` char(45) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`ID`, `Name`, `UserName`, `MobileNumber`, `Email`, `Password`, `Image`, `AdminRegdate`, `UpdationDate`) VALUES
(4, 'Sudip Farm ', 'sudiplun', 9746271464, 'sudipfarm@bari.com', 'whatever', '_e.png', '2023-06-15 08:21:09', '2023-08-11 08:22:53'),
(8, 'test', NULL, NULL, 'test@xyz.com', '1234', '', '2023-12-25 03:47:52', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
