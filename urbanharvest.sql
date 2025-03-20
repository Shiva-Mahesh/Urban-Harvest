-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2025 at 02:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urbanharvest`
--

-- --------------------------------------------------------

--
-- Table structure for table `produce`
--

CREATE TABLE `produce` (
  `produce_name` varchar(26) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `produce_price` decimal(3,1) DEFAULT NULL,
  `produce_farm` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `produce_discount` decimal(3,2) DEFAULT NULL,
  `produce_carbonCredit` int(11) DEFAULT NULL,
  `produce_category` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `produce_image` varchar(27) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `produce_quantity` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produce`
--

INSERT INTO `produce` (`produce_name`, `produce_price`, `produce_farm`, `produce_discount`, `produce_carbonCredit`, `produce_category`, `produce_image`, `produce_quantity`) VALUES
('Tomato', 2.5, 'Green Valley ', 0.10, 5, 'Vegetables', 'images/Tomato.jpg', '5 lb'),
('Beets', 3.0, 'Root Harvest', 0.15, 4, 'Vegetables', 'images/Beets.jpg', '1 bunch'),
('Blueberries', 5.0, 'Berry Patch', 0.05, 3, 'Fruits', 'images/Blueberries.jpg', '1 pint'),
('Baby Salad', 4.0, 'Leafy Greens Co.', 0.10, 2, 'Vegetables', 'images/Baby_Salad_Mix.jpg', '1 bag'),
('Blackberries', 1.8, 'Berry Patch', 0.20, 1, 'Fruits', 'images/Blackberries.jpg', '1 bulb'),
('Kale', 3.5, 'Green Valley', 0.10, 4, 'Vegetables', 'images/Kale.jpg', '1 bunch'),
('Apples', 2.2, 'Sunny Orchard', 0.05, 3, 'Fruits', 'images/Apples.jpg', '1 apple'),
('Lemons', 1.5, 'Citrus Grove', 0.10, 2, 'Fruits', 'images/Lemons.jpg', '1 lemon'),
('Oranges', 3.5, 'Citrus Grove', 0.10, 2, 'Fruits', 'images/oranges.jpeg', '1 lemon'),
('Limes', 1.4, 'Citrus Grove', 0.10, 2, 'Fruits', 'images/Limes.jpg', '1 lime'),
('Potatoes Russet', 3.0, 'Fresh Farms', 0.05, 5, 'Vegetables', 'images/Potatoes_Russet.jpg', '5 lb'),
('Swiss Chard', 3.5, 'Leafy Greens Co.', 0.20, 3, 'Vegetables', 'images/Swiss_Chard.jpg', '1 bunch'),
('Carrots', 1.5, 'Fresh Roots Farm', 0.05, 3, 'Vegetables', 'images/Carrots.jpg', '1 bunch'),
('Broccoli', 2.0, 'Green Valley', 0.10, 4, 'Vegetables', 'images/Broccoli.jpg', '1 stalk'),
('Cucumber', 1.2, 'Fresh Farms', 0.10, 3, 'Vegetables', 'images/Cucumber.jpg', '1 cucumber'),
('Onions- Green', 1.0, 'Root Harvest', 0.10, 2, 'Vegetables', 'images/Green_Onions.jpg', '1 bunch'),
('Onions', 2.0, 'Green Valley', 0.05, 3, 'Vegetables', 'images/Onions.jpg', '1 onion'),
('Parsnips', 3.2, 'Root Harvest', 0.10, 4, 'Vegetables', 'images/Parsnips.jpg', '1 bunch'),
('Cabbage', 2.0, 'Fresh Farms', 0.10, 4, 'Vegetables', 'images/Cabbage.jpg', '1 head'),
('Zucchini', 1.8, 'Green Valley', 0.10, 3, 'Vegetables', 'images/Zucchini.jpg', '1 zucchini'),
('Scotch Bonnet', 4.0, 'Root Harvest', 0.10, 5, 'Vegetables', 'images/Scotch_Bonnet.jpg', '1 lb'),
('Mushrooms', 3.0, 'Shroomery', 0.05, 2, 'Vegetables', 'images/Mushrooms.jpg', '8 oz'),
('Cilantro', 1.5, 'Herb Farm', 0.10, 1, 'Vegetables', 'images/Cilantro.jpg', '1 bunch'),
('Potatoes - Red', 2.8, 'Fresh Farms', 0.05, 4, 'Vegetables', 'images/Potatoes_Red.jpg', '5 lb'),
('Potatoes - Yellow', 3.0, 'Fresh Farms', 0.05, 4, 'Vegetables', 'images/Potatoes_Yellow.jpg', '5 lb'),
('Mixed Peppers', 2.5, 'Green Valley', 0.10, 3, 'Vegetables', 'images/Pepper.jpg', '1 pepper'),
('Curated Box: All Seasons', 25.0, 'Urban Harvest', 0.10, 10, 'Curated Box', 'images/All_Seasons_Box.jpg', '1'),
('Curated Box: Spring Fling', 22.0, 'Urban Harvest', 0.10, 8, 'Curated Box', 'images/Spring_Box.jpg', '1'),
('Curated Box: Taco Tuesdays', 22.0, 'Urban Harvest', 0.10, 8, 'Curated Box', 'images/Taco_Tuesday_Box.jpg', '1'),
('Curated Box: Get Inspired', 22.0, 'Urban Harvest', 0.10, 8, 'Curated Box', 'images/Get_Inspired_Box.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `producepromotions`
--

CREATE TABLE `producepromotions` (
  `produce_name` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `produce_price` decimal(3,1) DEFAULT NULL,
  `produce_farm` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `produce_discount` decimal(3,2) DEFAULT NULL,
  `produce_carbonCredit` int(11) DEFAULT NULL,
  `produce_category` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `produce_image` varchar(27) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `produce_quantity` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producepromotions`
--

INSERT INTO `producepromotions` (`produce_name`, `produce_price`, `produce_farm`, `produce_discount`, `produce_carbonCredit`, `produce_category`, `produce_image`, `produce_quantity`) VALUES
('Potatoes Russet', 3.0, 'Fresh Farms', 0.05, 5, 'Vegetables', 'images/Potatoes_Russet.jpg', '5 lb'),
('Swiss Chard', 3.5, 'Leafy Greens Co.', 0.20, 3, 'Vegetables', 'images/Swiss_Chard.jpg', '1 bunch'),
('Carrots', 1.5, 'Fresh Roots Farm', 0.05, 3, 'Vegetables', 'images/Carrots.jpg', '1 bunch'),
('Onions- Green', 1.0, 'Root Harvest', 0.10, 2, 'Vegetables', 'images/Green_Onions.jpg', '1 bunch'),
('Parsnips', 3.2, 'Root Harvest', 0.10, 4, 'Vegetables', 'images/Parsnips.jpg', '1 bunch'),
('Mushrooms', 3.0, 'Shroomery', 0.05, 2, 'Vegetables', 'images/Mushrooms.jpg', '8 oz'),
('Mixed Peppers', 2.5, 'Green Valley', 0.10, 3, 'Vegetables', 'images/Pepper.jpg', '1 pepper'),
('Curated Box: 1', 22.0, 'Urban Harvest', 0.10, 8, 'Curated Box', 'images/Get_Inspired_Box.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `farm` varchar(255) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `carbonCredit` int(11) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `name`, `price`, `farm`, `discount`, `carbonCredit`, `category`, `image`, `quantity`) VALUES
(1, 'Potatoes Russet', 3.00, 'Fresh Farms', 0.05, 5, 'Vegetables', 'images/Potatoes_Russet.jpg', '5 lb'),
(2, 'Swiss Chard', 3.50, 'Leafy Greens Co.', 0.20, 3, 'Vegetables', 'images/Swiss_Chard.jpg', '1 bunch'),
(3, 'Carrots', 1.50, 'Fresh Roots Farm', 0.05, 3, 'Vegetables', 'images/Carrots.jpg', '1 bunch'),
(4, 'Onions- Green', 1.00, 'Root Harvest', 0.10, 2, 'Vegetables', 'images/Green_Onions.jpg', '1 bunch'),
(5, 'Parsnips', 3.20, 'Root Harvest', 0.10, 4, 'Vegetables', 'images/Parsnips.jpg', '1 bunch'),
(6, 'Mushrooms', 3.00, 'Shroomery', 0.05, 2, 'Vegetables', 'images/Mushrooms.jpg', '8 oz'),
(7, 'Mixed Peppers', 2.50, 'Green Valley', 0.10, 3, 'Vegetables', 'images/Pepper.jpg', '1 pepper'),
(8, 'Curated Box: 1', 22.00, 'Urban Harvest', 0.10, 8, 'Curated Box', 'images/Get_Inspired_Box.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `apt_no` varchar(20) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone`, `email`, `password`, `street_address`, `apt_no`, `city`, `province`, `postal_code`, `created_at`) VALUES
(1, 'John', 'Doe', '1234567890', 'john.doe@example.com', '$2y$10$jhn2wL.dNNRB8TdqfN90vexqsbHGelsyRhtJlSlcMxl3tIBQHPsvy', '123 Main St', '4B', 'Toronto', 'Ontario', 'M1A 2B3', '2025-03-19 02:18:09'),
(4, 'Shiva', 'Mahesh', '1122334455', 'shivamahesh@gmail.com', '$2y$10$jp5UCCC9D786Sv058fm0PO1ouep61iJJ6R86Bi2YRfpZB6fXA0a7W', '123', '1010', 'Waterloo', 'Ontario', 'N2L 3R8', '2025-03-19 23:30:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
