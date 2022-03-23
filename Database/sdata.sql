-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2022 at 05:45 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('storeadmin@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(30) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `amount` int(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `currency` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name`, `email`, `phone`, `amount`, `address`, `status`, `transaction_id`, `currency`) VALUES
(5, 1, 'Sany Mohammad Khaled', 'sanymohammadkhaled@gmail.com', '01953604877', 2800, 'Gazipur', 'Processing', 'SSLCZ_TEST_61cc3c4e62d90', 'BDT'),
(6, 1, 'Sany Mohammad Khaled', 'sanymohammadkhaled@gmail.com', '01953604877', 6000, 'Gazipur', 'Processing', 'SSLCZ_TEST_61cc5776264dc', 'BDT'),
(7, 1, 'Sany Mohammad Khaled', 'sanymohammadkhaled@gmail.com', '01953604877', 4150, 'Gazipur', 'Processing', 'SSLCZ_TEST_61cc596b426c2', 'BDT'),
(8, 3, 'Sany M Khaled', 'sany.khaled@northsouth.edu', '01739573965', 7300, 'Bashundhara', 'Falied', 'SSLCZ_TEST_61cc5a1b19930', 'BDT'),
(9, 3, 'Sany M Khaled', 'sany.khaled@northsouth.edu', '01739573965', 7300, 'Bashundhara', 'Processing', 'SSLCZ_TEST_61cc5ab9609ed', 'BDT'),
(10, 1, 'Sany Mohammad Khaled', 'sanymohammadkhaled@gmail.com', '01953604877', 6000, 'Gazipur', 'Pending', 'SSLCZ_TEST_61cd3dc495648', 'BDT'),
(11, 1, 'Sany Mohammad Khaled', 'sanymohammadkhaled@gmail.com', '01953604877', 6000, 'Gazipur', 'Pending', 'SSLCZ_TEST_61cd3dcd67933', 'BDT'),
(12, 1, 'Sany Mohammad Khaled', 'sanymohammadkhaled@gmail.com', '01953604877', 6000, 'Gazipur', 'Pending', 'SSLCZ_TEST_61cd3de88ca0c', 'BDT'),
(13, 1, 'Sany Mohammad Khaled', 'sanymohammadkhaled@gmail.com', '01953604877', 6000, 'Gazipur', 'Pending', 'SSLCZ_TEST_61cd3e2d23512', 'BDT'),
(14, 1, 'Sany Mohammad Khaled', 'sanymohammadkhaled@gmail.com', '01953604877', 6000, 'Gazipur', 'Pending', 'SSLCZ_TEST_61cd3e2e2010a', 'BDT'),
(15, 1, 'Sany Mohammad Khaled', 'sanymohammadkhaled@gmail.com', '01953604877', 6000, 'Gazipur', 'Pending', 'SSLCZ_TEST_61cd3ea84a68b', 'BDT'),
(16, 1, 'Sany Mohammad Khaled', 'sanymohammadkhaled@gmail.com', '01953604877', 6000, 'Gazipur', 'Pending', 'SSLCZ_TEST_61cd3ec89faa3', 'BDT'),
(17, 1, 'Sany Mohammad Khaled', 'sanymohammadkhaled@gmail.com', '01953604877', 3200, 'Gazipur', 'Processing', 'SSLCZ_TEST_61cd43604f2b4', 'BDT'),
(18, 1, 'Sany Mohammad Khaled', 'sanymohammadkhaled@gmail.com', '01953604877', 4400, 'Gazipur', 'Pending', 'SSLCZ_TEST_61cd47bc4ce43', 'BDT'),
(19, 1, 'Sany Mohammad Khaled', 'sanymohammadkhaled@gmail.com', '01953604877', 4400, 'Gazipur', 'Pending', 'SSLCZ_TEST_61cd47bd63aff', 'BDT'),
(20, 1, 'Sany Mohammad Khaled', 'sanymohammadkhaled@gmail.com', '01953604877', 6000, 'Gazipur', 'Pending', 'SSLCZ_TEST_61cd5be5f06d1', 'BDT'),
(21, 1, 'Sany Mohammad Khaled', 'sanymohammadkhaled@gmail.com', '01953604877', 4150, 'Gazipur', 'Pending', 'SSLCZ_TEST_61d715ba7bbf2', 'BDT'),
(22, 1, 'Sany Mohammad Khaled', 'sanymohammadkhaled@gmail.com', '01953604877', 4150, 'Gazipur', 'Pending', 'SSLCZ_TEST_61d715c76e7b9', 'BDT');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `weight` varchar(30) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `weight`, `price`, `photo`) VALUES
(1, 'Fresh', '35KG', 3200, 'images/F30.jpg'),
(2, 'Bashundhara', '30KG', 2800, 'images/B30.jpg'),
(3, 'Bashundhara', '12KG', 1350, 'images/B12.jpg'),
(4, 'Orion', '12KG', 1200, 'images/OR12.jpg'),
(5, 'Omera', '12KG', 1400, 'images/O12.jpg'),
(6, 'Portmax', '12KG', 1300, 'images/P12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sensordata`
--

CREATE TABLE `sensordata` (
  `id` int(6) UNSIGNED NOT NULL,
  `sensor` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `weight` varchar(10) DEFAULT NULL,
  `reading_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sensordata`
--

INSERT INTO `sensordata` (`id`, `sensor`, `location`, `weight`, `reading_time`) VALUES
(103, '1', 'Gazipur', '50', '2021-12-29 17:07:23'),
(104, '2', 'Dhaka', '30', '2021-12-29 17:20:55'),
(105, '3', 'Dhaka', '80', '2021-12-29 17:21:28'),
(106, '1', 'Bashundhara', '90', '2021-12-29 17:26:37'),
(107, '1', 'Gazipur', '55.5', '2021-12-29 19:10:41'),
(108, '1', 'Gazipur', '51.4', '2021-12-29 19:11:28'),
(109, '1', 'Gazipur', '51.4', '2021-12-29 19:11:34'),
(110, '1', 'Gazipur', '51.4', '2021-12-29 19:11:51'),
(111, '1', 'Gazipur', '51.4', '2021-12-29 19:11:52'),
(112, '1', 'Gazipur', '51.4', '2021-12-29 19:12:04'),
(203, '1', 'Gazipur', '252.5', '2021-12-29 19:41:24'),
(204, '1', 'Gazipur', '252.5', '2021-12-29 19:41:24'),
(205, '1', 'Gazipur', '252.5', '2021-12-29 19:41:24'),
(206, '1', 'Gazipur', '252.5', '2021-12-29 19:41:24'),
(207, '1', 'Gazipur', '252.5', '2021-12-29 19:41:24'),
(208, '1', 'Gazipur', '252.5', '2021-12-29 19:41:24'),
(214, '1', 'Gazipur', '-0.1', '2021-12-29 19:41:32'),
(230, '1', 'Gazipur', '258.9', '2021-12-29 19:42:23'),
(231, '1', 'Gazipur', '258.9', '2021-12-29 19:42:23'),
(232, '1', 'Gazipur', '258.9', '2021-12-29 19:42:23'),
(233, '1', 'Gazipur', '258.9', '2021-12-29 19:42:23'),
(234, '1', 'Gazipur', '258.9', '2021-12-29 19:42:23'),
(235, '1', 'Gazipur', '256.7', '2021-12-29 19:42:23'),
(236, '1', 'Gazipur', '258.9', '2021-12-29 19:42:44'),
(237, '1', 'Gazipur', '258.9', '2021-12-29 19:42:44'),
(238, '1', 'Gazipur', '258.9', '2021-12-29 19:42:45'),
(239, '1', 'Gazipur', '258.9', '2021-12-29 19:42:45'),
(240, '1', 'Gazipur', '258.9', '2021-12-29 19:42:45'),
(241, '1', 'Gazipur', '258.9', '2021-12-29 19:42:45'),
(242, '1', 'Gazipur', '258.9', '2021-12-29 19:42:45'),
(243, '1', 'Gazipur', '258.9', '2021-12-29 19:43:19'),
(244, '1', 'Gazipur', '258.9', '2021-12-29 19:43:20'),
(245, '1', 'Gazipur', '258.9', '2021-12-29 19:43:20'),
(246, '1', 'Gazipur', '258.9', '2021-12-29 19:43:20'),
(247, '1', 'Gazipur', '258.9', '2021-12-29 19:43:20'),
(248, '1', 'Gazipur', '258.9', '2021-12-29 19:43:20'),
(249, '1', 'Gazipur', '258.9', '2021-12-29 19:43:20'),
(250, '1', 'Gazipur', '258.9', '2021-12-29 19:43:35'),
(251, '1', 'Gazipur', '258.9', '2021-12-29 19:43:35'),
(252, '1', 'Gazipur', '258.9', '2021-12-29 19:43:35'),
(253, '1', 'Gazipur', '258.9', '2021-12-29 19:43:35'),
(254, '1', 'Gazipur', '258.9', '2021-12-29 19:43:35'),
(255, '1', 'Gazipur', '258.9', '2021-12-29 19:43:36'),
(256, '1', 'Gazipur', '258.9', '2021-12-29 19:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `Location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `email`, `password`, `code`, `status`, `Location`) VALUES
(1, 'Sany Mohammad Khaled', '01953604877', 'sanymohammadkhaled@gmail.com', '$2y$10$K3HqCzySZw95ZsV86jbuY.CV5tzQMQQW1MRSa/6oh3Wseemapa.2i', 0, 'verified', 'Gazipur'),
(3, 'Sany M Khaled', '01739573965', 'sany.khaled@northsouth.edu', '$2y$10$A8laxEyB29lRpPHDPQ9ma.baL59EesVhqx8X/GnLZDvqdmbF4Imsq', 0, 'verified', 'Bashundhara');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `sensordata`
--
ALTER TABLE `sensordata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `sensordata`
--
ALTER TABLE `sensordata`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=478;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
