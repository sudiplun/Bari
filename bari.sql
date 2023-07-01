-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 01, 2023 at 02:05 PM
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
(1, 'Milk', 'MK01', '2023-03-10 16:27:43'),
(2, 'Butter', 'BT01', '2023-03-09 18:30:00'),
(3, 'Bread', 'BD01', '2023-03-09 18:30:00'),
(4, 'Paneer', 'PN01', '2023-03-09 18:30:00'),
(5, 'Soya', 'SY01', '2023-03-09 18:30:00'),
(7, 'Ghee', 'GH01', '2023-03-09 18:30:00'),
(8, 'Panner', 'PN01', '2023-03-19 15:47:58');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `CompanyName` varchar(150) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `CompanyName`, `PostingDate`) VALUES
(2, 'Mother Diary', '2023-03-14 03:30:51'),
(3, 'Patanjali', '2023-03-14 03:30:51'),
(10, 'Paras', '2023-03-14 03:30:51'),
(11, 'Ananda', '2023-03-19 15:48:27'),
(12, 'Gharwal', '2023-03-19 15:48:33');

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
(1, 1, 1, 270491112, 'Anuj Kumar', 1425362541, 'cash', '2023-03-19 15:47:14'),
(2, 5, 1, 270491112, 'Anuj Kumar', 1425362541, 'cash', '2023-03-19 15:47:14'),
(3, 7, 1, 464760346, 'Rahul Kumar', 12345632145, 'cash', '2023-03-19 15:49:47'),
(4, 8, 1, 464760346, 'Rahul Kumar', 12345632145, 'cash', '2023-03-19 15:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL,
  `CompanyName` varchar(150) DEFAULT NULL,
  `ProductName` varchar(150) DEFAULT NULL,
  `ProductPrice` decimal(10,0) DEFAULT current_timestamp(),
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `CategoryName`, `CompanyName`, `ProductName`, `ProductPrice`, `PostingDate`, `UpdationDate`) VALUES
(1, 'Milk', 'Amul', 'Toned milk 500ml', 22, '2023-03-19 15:46:13', NULL),
(2, 'Milk', 'Amul', 'Toned milk 1ltr', 42, '2023-03-19 15:46:13', '2023-03-19 15:46:31'),
(3, 'Milk', 'Mother Diary', 'Full Cream Milk 500ml', 26, '2023-03-19 15:46:21', NULL),
(4, 'Milk', 'Mother Diary', 'Full Cream Milk 1ltr', 50, '2023-03-19 15:46:21', NULL),
(5, 'Butter', 'Amul', 'Butter 100mg', 46, '2023-03-19 15:46:21', NULL),
(6, 'Bread', 'Patanjali', 'Sandwich Bread', 30, '2023-03-19 15:46:13', '2023-03-19 15:46:36'),
(7, 'Ghee', 'Paras', 'Ghee 500mg', 350, '2023-03-19 15:46:21', NULL),
(8, 'Panner', 'Ananda', 'Paneer 250gm', 80, '2023-03-19 15:49:21', NULL),
(9, 'Ghee', 'Mother Diary', 'tomatoes', 40, '2023-06-27 13:39:33', NULL);

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
(3, 'sudeeplun', NULL, NULL, 'sudeeplun@gmail.com', '929cd3260c926e21e222e6aebd7eb68e', '_e.png', '2023-06-29 16:11:04', NULL),
(4, 'sudiplun', NULL, NULL, 'sudiplun@gmail.com', 'gameisneuron', '_e.png', '2023-07-01 11:50:13', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
