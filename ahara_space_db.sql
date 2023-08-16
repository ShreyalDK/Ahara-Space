-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 04:24 PM
-- Server version: 8.0.31
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahara_space_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cutomer_phone` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- --------------------------------------------------------

--
-- Table structure for table `feed`
--

CREATE TABLE `feed` (
  `order_id` varchar(25) NOT NULL,
  `customer_phone` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `staff_id` int DEFAULT NULL,
  `staff_delivery_id` int DEFAULT NULL,
  `bill_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `time` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `item_id` int NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(25) NOT NULL,
  `staff_id` int DEFAULT NULL,
  `staff_delivery_id` int DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `bill_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `delivery_status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_id` varchar(25) NOT NULL,
  `item_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` int NOT NULL DEFAULT '0',
  `item_name` varchar(20) NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `name` varchar(20) NOT NULL,
  `staff_id` int NOT NULL,
  `role` varchar(20) NOT NULL,
  `age` int DEFAULT NULL,
  `password` int NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cutomer_phone`);

--
-- Indexes for table `feed`
--
ALTER TABLE `feed`
  ADD PRIMARY KEY (`time`),
  ADD KEY `customer_phone` (`customer_phone`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `staff_delivery_id` (`staff_delivery_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `staff_delivery_id` (`staff_delivery_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feed`
--
ALTER TABLE `feed`
  ADD CONSTRAINT `feed_ibfk_2` FOREIGN KEY (`customer_phone`) REFERENCES `customer` (`cutomer_phone`) ON UPDATE CASCADE,
  ADD CONSTRAINT `feed_ibfk_3` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `feed_ibfk_4` FOREIGN KEY (`staff_delivery_id`) REFERENCES `staff` (`staff_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `feed_ibfk_5` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`staff_delivery_id`) REFERENCES `staff` (`staff_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `menu` (`item_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
