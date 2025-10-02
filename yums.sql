-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2025 at 03:13 PM
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
-- Database: `yums`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(6,2) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `name`, `description`, `price`, `category`, `image_path`) VALUES
(13, 'Chicken Burger', 'Crispy fried chicken patty with lettuce and mayo.', 5.99, 'Burgers', 'https://static.vecteezy.com/system/resources/previews/036/334/265/non_2x/ai-generated-crispy-chicken-burger-on-transparent-background-png.png'),
(14, 'Beef Burger', 'Juicy grilled beef patty with cheese and pickles.', 6.49, 'Burgers', 'https://th.bing.com/th/id/OIP.NSfyTqmOCuBUqqFsrTWQFQHaHa?w=198&h=198&c=7&r=0&o=5&dpr=2&pid=1.7'),
(15, 'Double Cheeseburger', 'Two flame-grilled beef patties with double cheddar.', 7.49, 'Burgers', 'https://th.bing.com/th/id/OIP.NUarcRqouLObb9NBdXqIjgHaHa?w=173&h=180&c=7&r=0&o=5&dpr=2&pid=1.7'),
(16, 'Veggie Burger', 'Grilled plant-based patty with vegan mayo and salad.', 5.49, 'Burgers', 'https://th.bing.com/th/id/OIP.BQArhmmlz4a4qiuMx8-5ZwAAAA?w=175&h=180&c=7&r=0&o=5&dpr=2&pid=1.7'),
(17, 'Turkey Burger', 'Lean turkey patty with cranberry mayo and lettuce.', 6.99, 'Burgers', 'https://th.bing.com/th/id/OIP.RdbYM1lJWRD4_lK5SCdueAHaE8?w=233&h=180&c=7&r=0&o=5&dpr=2&pid=1.7'),
(18, 'Skin-On Fries', 'Hand-cut fries with the skin left on, salted to perfection.', 2.49, 'Fries', 'https://th.bing.com/th/id/OIP.0G5fI4voxqRCGTsxV_Jt1gHaG2?w=206&h=190&c=7&r=0&o=5&dpr=2&pid=1.7'),
(19, 'Regular Fries', 'Classic golden fries, crispy on the outside, fluffy inside.', 2.29, 'Fries', 'https://th.bing.com/th/id/OIP.-AxHsIUhVItSEjPV7pYGSgHaEO?w=301&h=180&c=7&r=0&o=5&dpr=2&pid=1.7'),
(20, 'Curly Fries', 'Spiral-cut seasoned fries, twisted for extra crunch.', 2.99, 'Fries', 'https://th.bing.com/th/id/OIP.Ls_pJ5SdKe1eCiKO7s2ChQHaH_?w=180&h=194&c=7&r=0&o=5&dpr=2&pid=1.7'),
(21, 'Pepsi', 'Chilled Pepsi cola, 330ml can.', 1.99, 'Drinks', 'https://th.bing.com/th/id/OIP.lMmaJqvnYYJEBI4hQgeGMgHaKj?w=126&h=180&c=7&r=0&o=5&dpr=2&pid=1.7'),
(22, '7-Up', 'Crisp lemon-lime soda, 330ml can.', 1.99, 'Drinks', 'https://th.bing.com/th/id/OIP.H3PDNO969sO3YJzQkQ7dDQHaHa?w=165&h=180&c=7&r=0&o=5&dpr=2&pid=1.7'),
(23, 'Mirinda', 'Orange-flavoured soda, 330ml can.', 1.99, 'Drinks', 'https://th.bing.com/th/id/OIP.Kwkr_5OI5CUzjQQAtOWskwHaHa?w=193&h=193&c=7&r=0&o=5&dpr=2&pid=1.7'),
(24, 'Lemonade', 'Refreshing fresh lemonade, 330ml can.', 1.49, 'Drinks', 'https://th.bing.com/th/id/OIP.i7zkUPGFRWG562pU2YadjwHaJt?w=146&h=191&c=7&r=0&o=5&dpr=2&pid=1.7');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total` decimal(8,2) NOT NULL DEFAULT 0.00,
  `status` enum('open','submitted') NOT NULL DEFAULT 'open',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `status`, `created_at`) VALUES
(1, NULL, 47.68, 'open', '2025-05-06 00:19:51'),
(2, 6, 22.25, 'open', '2025-05-06 02:40:04'),
(3, NULL, 3.98, 'open', '2025-05-06 02:40:37'),
(4, 8, 16.96, 'open', '2025-05-06 12:53:14'),
(5, NULL, 12.48, 'open', '2025-05-06 13:24:01'),
(6, NULL, 5.99, 'open', '2025-05-19 13:00:23'),
(7, 11, 8.48, 'open', '2025-05-19 13:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `menu_item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `menu_item_id`, `quantity`, `price`) VALUES
(1, 1, 13, 1, 5.99),
(2, 1, 14, 1, 6.49),
(3, 1, 15, 1, 7.49),
(4, 1, 16, 1, 5.49),
(5, 1, 17, 1, 6.99),
(6, 1, 20, 1, 2.99),
(7, 1, 19, 1, 2.29),
(8, 1, 18, 1, 2.49),
(9, 1, 21, 1, 1.99),
(10, 1, 22, 1, 1.99),
(11, 1, 23, 1, 1.99),
(12, 1, 24, 1, 1.49),
(13, 2, 13, 1, 5.99),
(14, 2, 19, 1, 2.29),
(15, 2, 23, 1, 1.99),
(16, 2, 13, 1, 5.99),
(17, 2, 13, 1, 5.99),
(18, 3, 22, 1, 1.99),
(19, 3, 23, 1, 1.99),
(20, 4, 13, 1, 5.99),
(21, 4, 14, 1, 6.49),
(22, 4, 20, 1, 2.99),
(23, 4, 24, 1, 1.49),
(24, 5, 13, 1, 5.99),
(25, 5, 14, 1, 6.49),
(26, 6, 13, 1, 5.99),
(27, 7, 14, 1, 6.49),
(28, 7, 23, 1, 1.99);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `party_size` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `name`, `email`, `phone`, `date`, `time`, `party_size`, `created_at`) VALUES
(2, 11, 'John', 'John@gmail.com', '123', '2025-05-19', '12:20:00', 3, '2025-05-19 13:02:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password_hash`, `created_at`) VALUES
(6, 'aliyan', 'aliyanpieces122@gmail.com', '$2y$10$9ax/GjHwQs4z4b5nA/IrROWpiee.viMPSVFw/lKhevKKqiQdMAqmC', '2025-05-06 02:39:57'),
(8, 'Aliyan ALi', 'aliyanpieces12@gmail.com', '$2y$10$Qdfi8RH4bgbCqfbCy6.SfuSdBAQWo8nlrZ3yHi7gLFaqfmIDB6JEq', '2025-05-06 12:53:03'),
(11, 'John', 'John@gmail.com', '$2y$10$LbhBEgpIegBSGc.AzcPo.O8gl04q4WMxAo7Hv/jKduV8XPHMT2Fke', '2025-05-19 13:01:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `menu_item_id` (`menu_item_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
