-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2026 at 05:31 AM
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
-- Database: `vendor_inventory_multi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$gwD.mooAg1MVYthuHGd1cu.wr4GMUWzmgofqoJvDQ73SapJB/xasi', '2026-02-09 20:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_items`
--

CREATE TABLE `inventory_items` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `low_stock_threshold` int(11) DEFAULT 5,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_items`
--

INSERT INTO `inventory_items` (`id`, `vendor_id`, `name`, `sku`, `quantity`, `price`, `low_stock_threshold`, `created_at`, `updated_at`) VALUES
(1, 1, 'shoes', '12345', 50, 100.00, 10, '2026-02-09 15:14:34', '2026-02-09 15:14:34'),
(2, 3, 'nike', '09877', 4, 100.00, 5, '2026-02-09 15:50:10', '2026-02-09 15:50:10'),
(3, 3, 'Addiash', '77777', 155, 100.00, 5, '2026-02-09 15:51:07', '2026-02-09 15:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `login_email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `login_email`, `phone`, `address`, `password`, `status`, `created_at`) VALUES
(1, 'SURAJ SINGH', 'surajfoujdar39@gmail.com', '08239840816', NULL, '$2y$10$yMBRJADwTxeLlozqnNwX/.02Gj5pf1pDYXXL5Vb4ox8RotOYrifW.', 'active', '2026-02-09 20:25:52'),
(3, 'SURAJ SINGH', 'surajfoujdar45@gmail.com', '08239840816', NULL, '$2y$10$Gx75OHnsIixWBcX1QMTOdexZclEAuAFT.p0Jht4ygsC2lSHYPcmga', 'active', '2026-02-09 21:14:03'),
(5, 'manoj', 'manoj@gmail.com', '9024244731', '', '$2y$10$hS1eUSZkXy788MWy3XcW/eQYJf3vRtSCxI3q0t2nWfdppTSnmkttC', 'active', '2026-02-09 21:33:12'),
(6, 'sanju', 'sanju@gmail.com', '8619060680', NULL, '$2y$10$CUX9ehS.5m/XzeUjZyDRKOZwJyrFA98c/l7XpbMepKsiWMG7ksRm2', 'active', '2026-02-09 21:35:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `inventory_items`
--
ALTER TABLE `inventory_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `fk_inventory_vendor_multi` (`vendor_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_email` (`login_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory_items`
--
ALTER TABLE `inventory_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory_items`
--
ALTER TABLE `inventory_items`
  ADD CONSTRAINT `fk_inventory_vendor_multi` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
