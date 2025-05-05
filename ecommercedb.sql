-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2025 at 10:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_transactions`
--

CREATE TABLE `customer_transactions` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `pdctid` int(10) NOT NULL,
  `datecaptured` date NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_transactions`
--

INSERT INTO `customer_transactions` (`id`, `userid`, `pdctid`, `datecaptured`, `quantity`, `price`, `total`) VALUES
(1, 1, 1, '2025-05-03', 2, 4500000, 9000000),
(2, 1, 2, '2025-05-03', 3, 500000, 1500000),
(3, 1, 1, '2025-05-03', 2, 4500000, 9000000),
(4, 1, 2, '2025-05-03', 3, 500000, 1500000),
(5, 1, 2, '2025-05-03', 3, 500000, 1500000),
(6, 1, 2, '2025-05-05', 3, 500000, 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pdctid` int(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `details` text NOT NULL,
  `cost` decimal(10,0) NOT NULL,
  `selling` decimal(10,0) NOT NULL,
  `quantity` int(10) NOT NULL,
  `imageurl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pdctid`, `name`, `details`, `cost`, `selling`, `quantity`, `imageurl`) VALUES
(1, 'Lenovo r3 LT2', 'RAM 16GB, SDD - 1TB', 3000000, 4500000, 5, 'products/Lenovo-idea-pad-3-core-i5.jpg'),
(2, 'Lenovo Legion R3000', 'Gaming PC. 16GB RAM, 1TB SSD', 3100000, 500000, 4, 'products/lenovo-legion.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_chart`
--

CREATE TABLE `shopping_chart` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `pdctid` int(10) NOT NULL,
  `datecaptured` date NOT NULL,
  `quantity` int(10) NOT NULL,
  `selling` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `status` enum('processing','pending','completed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shopping_chart`
--

INSERT INTO `shopping_chart` (`id`, `userid`, `pdctid`, `datecaptured`, `quantity`, `selling`, `total`, `status`) VALUES
(1, 1, 1, '2025-05-03', 1, 4500000, 4500000, 'completed'),
(2, 1, 2, '2025-05-03', 1, 500000, 500000, 'completed'),
(3, 1, 2, '2025-05-03', 1, 500000, 500000, 'completed'),
(4, 1, 1, '2025-05-05', 1, 4500000, 4500000, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `stock_tracking`
--

CREATE TABLE `stock_tracking` (
  `id` int(10) NOT NULL,
  `pdctid` int(10) NOT NULL,
  `datecaptured` date NOT NULL,
  `quantity` int(10) NOT NULL,
  `cost` decimal(10,0) NOT NULL,
  `selling` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(10) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` enum('customer','administrator','buyer') NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `fname`, `email`, `password`, `role`, `address`) VALUES
(1, 'mannu', 'mannu@example.com', '1234', 'customer', 'Kamukuzi, Mbarara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_transactions`
--
ALTER TABLE `customer_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pdctid`);

--
-- Indexes for table `shopping_chart`
--
ALTER TABLE `shopping_chart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_tracking`
--
ALTER TABLE `stock_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_transactions`
--
ALTER TABLE `customer_transactions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pdctid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shopping_chart`
--
ALTER TABLE `shopping_chart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock_tracking`
--
ALTER TABLE `stock_tracking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
