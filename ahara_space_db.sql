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

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cutomer_phone`, `customer_name`, `address`, `email`) VALUES
('9448696840', 'yash', NULL, 'ashealthcare190@gmail.com'),
('9449990742', 'shreyal', 'bejai mangalore', 'ashealthcare190@gmail.com'),
('9731934981', 'abhi', 'parapadi karkala', 'ashealthcare190@gmail.com');

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

--
-- Dumping data for table `feed`
--

INSERT INTO `feed` (`order_id`, `customer_phone`, `customer_name`, `staff_id`, `staff_delivery_id`, `bill_amt`, `time`, `status`) VALUES
('ord639b5b875f24a', '9449990742', 'shreyal', 103, NULL, '120.00', '2022-12-15 11:08:15pm', 1),
('ord639b5c5831e05', '9448696840', 'yash', 103, NULL, '325.00', '2022-12-15 11:11:44pm', 1),
('ord639b5d1f6cd65', '9731934981', 'abhi', 103, 105, '400.00', '2022-12-15 11:15:03pm', 1),
('ord639d6c7f4d04c', '9449990742', 'shreyal', 103, NULL, '180.00', '2022-12-17 12:45:11pm', 1),
('ord639d6ce9032e9', '9449990742', 'shreyal', 103, 105, '140.00', '2022-12-17 12:46:57pm', 1),
('ord63a0134a28627', '9449990742', 'shreyal', 103, NULL, '240.00', '2022-12-19 01:01:22pm', 1),
('ord63a01530be29f', '9449990742', 'shreyal', 103, 105, '20.00', '2022-12-19 01:09:28pm', 1),
('ord639f7a09816b4', '9449990742', 'shreyal', 103, NULL, '70.00', '2022-12-19 02:07:29am', 1),
('ord639f7a45b65f2', '9731934981', 'abhi', 103, 105, '220.00', '2022-12-19 02:08:29am', 1),
('ord639fc46d76a48', '9449990742', 'shreyal', 103, 105, '80.00', '2022-12-19 07:24:53am', 1),
('ord639fef2e95b2a', '9449990742', 'shreyal', 103, 105, '300.00', '2022-12-19 10:27:18am', 1),
('ord64c2c7961316e', '9449990742', 'shreyal', 103, 105, '40.00', '2023-07-28 01:07:58am', 1),
('ord64c2bb0e0f2ed', '9449990742', 'shreyal', 103, NULL, '0.00', '2023-07-28 12:14:30am', 0),
('ord64c2be55b0e17', '9449990742', 'shreyal', 103, NULL, '20.00', '2023-07-28 12:28:29am', 1),
('ord64c6690d71bad', '9449990742', 'shreyal', 103, 105, '40.00', '2023-07-30 07:13:41pm', 1),
('ord64c8c8b0a0fe0', '9449990742', 'shreyal', 103, 105, '40.00', '2023-08-01 02:26:16pm', 1);

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
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`item_id`, `item_name`, `price`) VALUES
(101, 'Samosa', '20.00'),
(102, 'Aloo Gobi', '100.00'),
(103, 'Matar Paneer', '120.00'),
(104, 'Naan', '30.00'),
(105, 'Dosai', '40.00'),
(106, 'Pav Bhaji', '35.00'),
(107, 'Biryani', '110.00'),
(108, 'Gulab Jamun', '30.00'),
(109, 'Veg soup', '40.00'),
(110, 'Gajar ka halwa', '30.00');

-- --------------------------------------------------------

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
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `staff_id`, `staff_delivery_id`, `type`, `status`, `bill_amt`, `delivery_status`) VALUES
('ord639b5b875f24a', 103, NULL, 'in-house', 1, '120.00', NULL),
('ord639b5c5831e05', 103, NULL, 'in-house', 1, '325.00', NULL),
('ord639b5d1f6cd65', 103, 105, 'online', 1, '400.00', 1),
('ord639d6c7f4d04c', 103, NULL, 'in-house', 1, '180.00', NULL),
('ord639d6ce9032e9', 103, 105, 'online', 1, '140.00', 1),
('ord639f7a09816b4', 103, NULL, 'in-house', 1, '70.00', NULL),
('ord639f7a45b65f2', 103, 105, 'online', 1, '220.00', 1),
('ord639fc46d76a48', 103, 105, 'online', 1, '80.00', 1),
('ord639fef2e95b2a', 103, 105, 'online', 1, '300.00', 1),
('ord63a0134a28627', 103, NULL, 'in-house', 1, '240.00', NULL),
('ord63a01530be29f', 103, 105, 'online', 1, '20.00', 1),
('ord64c2bb0e0f2ed', 103, NULL, 'in-house', 0, '0.00', NULL),
('ord64c2be55b0e17', 103, NULL, 'in-house', 1, '20.00', NULL),
('ord64c2c7961316e', 103, 105, 'online', 1, '40.00', 1),
('ord64c6690d71bad', 103, 105, 'online', 1, '40.00', 1),
('ord64c8c8b0a0fe0', 103, 105, 'online', 1, '40.00', 1);

-- --------------------------------------------------------

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
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_id`, `item_id`, `quantity`, `price`, `status`, `item_name`, `id`) VALUES
('ord639b5b875f24a', 101, 2, '40.00', 1, 'Samosa', 67),
('ord639b5b875f24a', 105, 2, '80.00', 1, 'Dosai', 68),
('ord639b5c5831e05', 107, 1, '110.00', 1, 'Biryani', 69),
('ord639b5c5831e05', 109, 2, '80.00', 1, 'Veg soup', 70),
('ord639b5c5831e05', 110, 1, '30.00', 1, 'Gajar ka halwa', 71),
('ord639b5c5831e05', 106, 3, '105.00', 1, 'Pav Bhaji', 72),
('ord639b5d1f6cd65', 102, 1, '100.00', 1, 'Aloo Gobi', 73),
('ord639b5d1f6cd65', 103, 1, '120.00', 1, 'Matar Paneer', 74),
('ord639b5d1f6cd65', 104, 4, '120.00', 1, 'Naan', 75),
('ord639b5d1f6cd65', 108, 2, '60.00', 1, 'Gulab Jamun', 76),
('ord639d6c7f4d04c', 103, 1, '120.00', 1, 'Matar Paneer', 77),
('ord639d6c7f4d04c', 104, 2, '60.00', 1, 'Naan', 78),
('ord639d6ce9032e9', 105, 2, '80.00', 1, 'Dosai', 79),
('ord639d6ce9032e9', 108, 2, '60.00', 1, 'Gulab Jamun', 80),
('ord639f7a09816b4', 106, 2, '70.00', 1, 'Pav Bhaji', 81),
('ord639f7a45b65f2', 107, 2, '220.00', 1, 'Biryani', 82),
('ord639fc46d76a48', 105, 2, '80.00', 1, 'Dosai', 83),
('ord639fef2e95b2a', 105, 2, '80.00', 1, 'Dosai', 84),
('ord639fef2e95b2a', 101, 1, '20.00', 1, 'Samosa', 85),
('ord639fef2e95b2a', 102, 2, '200.00', 1, 'Aloo Gobi', 86),
('ord63a0134a28627', 101, 0, '0.00', 0, 'Samosa', 87),
('ord63a0134a28627', 103, 2, '240.00', 1, 'Matar Paneer', 88),
('ord63a01530be29f', 101, 1, '20.00', 1, 'Samosa', 89),
('ord64c2be55b0e17', 101, 1, '20.00', 1, 'Samosa', 90),
('ord64c2c7961316e', 105, 0, '0.00', 1, 'Dosai', 91),
('ord64c2c7961316e', 105, 1, '40.00', 1, 'Dosai', 92),
('ord64c6690d71bad', 105, 1, '40.00', 1, 'Dosai', 93),
('ord64c8c8b0a0fe0', 105, 1, '40.00', 1, 'Dosai', 94);

-- --------------------------------------------------------

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
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`name`, `staff_id`, `role`, `age`, `password`, `username`) VALUES
('Shreyal', 101, 'admin', 21, 12345, 'shreyalA'),
('Abhishek', 102, 'admin', 20, 12345, 'abhiA'),
('Rahul', 103, 'waiter', 30, 12345, 'rahulW'),
('Shikhar', 104, 'waiter', 37, 12345, 'ShikharW'),
('Liam', 105, 'delivery', 27, 12345, 'liamD'),
('Arshdeep', 106, 'delivery', 23, 12345, 'arshdeepD'),
('bumrah', 107, 'delivery', 29, 12345, 'bumrahD'),
('virat', 108, 'waiter', 34, 12345, 'viratW');

--
-- Indexes for dumped tables
--

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
