-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 02, 2023 at 06:35 PM
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
(11, 'Meat', 'C102', '2023-07-13 12:30:21');

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
  `InvoiceGenDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `ProductId`, `Quantity`, `InvoiceNumber`, `CustomerName`, `CustomerContactNo`, `PaymentMode`, `InvoiceGenDate`) VALUES
(7, 14, 134, 719340562, 'janak', 89374792323, 'card', '2023-08-02 16:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL,
  `ProductName` varchar(150) DEFAULT NULL,
  `ProductPrice` decimal(10,0) DEFAULT current_timestamp(),
  `LeftQuantity` decimal(10,2) DEFAULT NULL,
  `TotalQuantity` decimal(10,2) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `CategoryName`, `ProductName`, `ProductPrice`, `LeftQuantity`, `TotalQuantity`, `PostingDate`, `UpdationDate`) VALUES
(11, 'Vegetables', 'Tomatoes', 50, NULL, 1000.00, '2023-07-13 12:31:12', NULL),
(12, 'Chicken', 'Boilers ', 450, NULL, 800.00, '2023-07-13 12:32:05', NULL);

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
(4, 'Lun Farm Pvt. Ltd', 'sudiplun', 9746271464, 'sudiplun@gmail.com', 'wahtever', '_e.png', '2023-07-01 11:50:13', '2023-08-02 15:55:37'),
(6, 'Lun Farm Pvt. Ltd', 'cool', 98611835712, 'pop@gmail.com', 'pop321', '', '2023-08-01 14:29:25', '2023-08-02 16:30:05');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
