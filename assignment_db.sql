-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 06:24 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(11) NOT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `size` double(11,4) DEFAULT 0.0000,
  `price` double(11,4) DEFAULT 0.0000,
  `sold` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `product_id`, `brand`, `color`, `size`, `price`, `sold`, `status`, `created_at`, `updated_at`) VALUES
(1, 'T-101', 'DELL', 'White', 15.0000, 22.5000, 12, 1, '2020-04-23 15:00:01', NULL),
(2, 'T-102', 'DELL', 'Black', 15.0000, 300.0000, 50, 1, '2020-06-09 17:16:24', NULL),
(3, 'T-103', 'ACER', 'Rose Gold', 15.0000, 300.0000, 50, 1, '2020-06-09 17:16:24', NULL),
(4, 'T-104', 'ACER', 'Silver', 13.0000, 300.0000, 50, 1, '2020-07-02 15:38:11', NULL),
(5, 'T-105', 'ACER', 'Grey', 15.0000, 300.0000, 50, 1, '2020-06-09 17:16:24', NULL),
(6, 'T-106', 'ACER', 'White', 17.0000, 300.0000, 50, 1, '2020-07-02 15:38:26', NULL),
(7, 'T-107', 'ACER', 'Black', 19.0000, 300.0000, 10, 1, '2020-07-02 15:17:10', NULL),
(8, 'T-108', 'HP', 'Grey', 13.0000, 400.0000, 10, 1, '2020-07-02 15:19:35', NULL),
(9, 'T-109', 'Apple', 'Black', 13.0000, 400.0000, 10, 1, '2020-07-02 15:15:18', NULL),
(10, 'T-110', 'ASUS', 'Black', 13.0000, 400.0000, 10, 1, '2020-07-02 15:15:49', NULL),
(11, 'T-111', 'DELL', 'White', 13.0000, 400.0000, 10, 1, '2020-07-02 15:16:12', NULL),
(12, 'T-112', 'Lenovo', 'Black', 13.0000, 400.0000, 70, 1, '2020-07-02 15:17:30', NULL),
(13, 'T-113', 'ASUS', 'Grey', 21.0000, 800.0000, 70, 1, '2020-07-02 15:18:55', NULL),
(14, 'T-114', 'Microsoft Surface', 'Black', 21.0000, 800.0000, 70, 1, '2020-07-03 04:20:12', NULL),
(15, 'T-115', 'HP', 'White', 21.0000, 800.0000, 70, 1, '2020-06-09 17:16:24', NULL),
(16, 'T-116', 'HP', 'Black', 17.0000, 800.0000, 70, 1, '2020-06-09 17:16:24', NULL),
(17, 'T-117', 'Samsung', 'Black', 17.0000, 800.0000, 70, 1, '2020-07-02 15:18:13', NULL),
(18, 'T-118', 'ACER', 'Silver', 15.0000, 1500.0000, 60, 1, '2020-06-09 17:16:24', NULL),
(19, 'T-119', 'Apple', 'Rose Gold', 17.0000, 1500.0000, 60, 1, '2020-07-02 15:28:45', NULL),
(20, 'T-1500', 'Apple', 'Grey', 19.0000, 1500.0000, 60, 1, '2020-07-02 15:43:30', NULL),
(21, 'T-121', 'ACER', 'Rose Gold', 19.0000, 1500.0000, 60, 1, '2020-06-09 17:16:24', NULL),
(22, 'T-122', 'ACER', 'White', 21.0000, 1500.0000, 60, 1, '2020-06-09 17:16:24', NULL),
(23, 'T-123', 'DELL', 'Black', 21.0000, 1500.0000, 60, 1, '2020-06-09 17:16:24', NULL),
(24, 'T-124', 'DELL', 'Silver', 21.0000, 1500.0000, 60, 1, '2020-06-09 17:16:24', NULL),
(25, 'T-126', 'Toshiba', 'Black', 15.0000, 500.0000, 22, 1, '2020-07-02 15:18:26', NULL),
(26, 'T-126', 'DELL', 'White', 15.0000, 500.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(27, 'T-127', 'DELL', 'Black', 15.0000, 500.0000, 60, 1, '2020-06-09 17:16:24', NULL),
(28, 'T-128', 'DELL', 'Grey', 13.0000, 500.0000, 60, 1, '2020-06-09 17:16:24', NULL),
(29, 'T-129', 'DELL', 'Black', 13.0000, 500.0000, 60, 1, '2020-06-09 17:16:24', NULL),
(30, 'T-130', 'Apple', 'Silver', 13.0000, 1997.0000, 40, 1, '2020-06-09 17:16:24', NULL),
(31, 'T-131', 'ASUS', 'Silver', 13.0000, 1997.0000, 40, 1, '2020-07-02 15:32:21', NULL),
(32, 'T-132', 'Apple', 'White', 17.0000, 1997.0000, 40, 1, '2020-06-09 17:16:24', NULL),
(33, 'T-133', 'Apple', 'Grey', 17.0000, 1997.0000, 40, 1, '2020-06-09 17:16:24', NULL),
(34, 'T-134', 'HP', 'Silver', 17.0000, 3500.0000, 40, 1, '2020-07-02 15:33:03', NULL),
(35, 'T-135', 'Apple', 'Silver', 17.0000, 3500.0000, 40, 1, '2020-06-09 17:16:24', NULL),
(36, 'T-136', 'Apple', 'Silver', 17.0000, 3500.0000, 40, 1, '2020-06-09 17:16:24', NULL),
(37, 'T-137', 'Apple', 'White', 15.0000, 3500.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(38, 'T-138', 'Apple', 'Grey', 15.0000, 3500.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(39, 'T-139', 'Apple', 'Silver', 15.0000, 3500.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(40, 'T-140', 'Apple', 'Silver', 15.0000, 500.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(41, 'T-141', 'ASUS', 'Black', 15.0000, 500.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(42, 'T-142', 'ASUS', 'White', 13.0000, 500.0000, 22, 1, '2020-07-03 00:25:30', NULL),
(43, 'T-143', 'ASUS', 'Black', 17.0000, 500.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(44, 'T-144', 'ASUS', 'Rose Gold', 15.0000, 500.0000, 40, 1, '2020-07-03 00:25:16', NULL),
(45, 'T-145', 'ASUS', 'Grey', 17.0000, 500.0000, 40, 1, '2020-06-09 17:16:24', NULL),
(46, 'T-146', 'ASUS', 'Black', 15.0000, 120.0000, 40, 1, '2020-06-09 17:16:24', NULL),
(47, 'T-147', 'Lenovo', 'White', 15.0000, 120.0000, 40, 1, '2020-07-02 15:35:51', NULL),
(48, 'T-148', 'ASUS', 'Black', 15.0000, 120.0000, 40, 1, '2020-06-09 17:16:24', NULL),
(49, 'T-149', 'ASUS', 'Black', 15.0000, 120.0000, 35, 1, '2020-06-09 17:16:24', NULL),
(50, 'T-150', 'ASUS', 'Black', 17.0000, 120.0000, 35, 1, '2020-06-09 17:16:24', NULL),
(51, 'T-151', 'ASUS', 'White', 17.0000, 600.0000, 35, 1, '2020-06-09 17:16:24', NULL),
(52, 'T-152', 'ASUS', 'Grey', 17.0000, 600.0000, 35, 1, '2020-06-09 17:16:24', NULL),
(53, 'T-153', 'DELL', 'Rose Gold', 17.0000, 600.0000, 35, 1, '2020-07-02 15:29:00', NULL),
(54, 'T-154', 'ASUS', 'Rose Gold', 17.0000, 600.0000, 35, 1, '2020-06-09 17:16:24', NULL),
(55, 'T-155', 'ASUS', 'Rose Gold', 17.0000, 600.0000, 35, 1, '2020-06-09 17:16:24', NULL),
(56, 'T-156', 'ASUS', 'Grey', 17.0000, 700.0000, 35, 1, '2020-06-09 17:16:24', NULL),
(57, 'T-157', 'HP', 'Rose Gold', 17.0000, 700.0000, 5, 1, '2020-07-02 15:30:13', NULL),
(58, 'T-158', 'ASUS', 'Rose Gold', 17.0000, 700.0000, 5, 1, '2020-06-09 17:16:24', NULL),
(59, 'T-159', 'ASUS', 'Rose Gold', 17.0000, 700.0000, 5, 1, '2020-06-09 17:16:24', NULL),
(60, 'T-160', 'ASUS', 'Rose Gold', 17.0000, 700.0000, 5, 1, '2020-06-09 17:16:24', NULL),
(61, 'T-161', 'Lenovo', 'Silver', 17.0000, 700.0000, 5, 1, '2020-06-09 17:16:24', NULL),
(62, 'T-162', 'Lenovo', 'Rose Gold', 17.0000, 700.0000, 5, 1, '2020-06-09 17:16:24', NULL),
(63, 'T-163', 'Lenovo', 'Rose Gold', 17.0000, 700.0000, 5, 1, '2020-06-09 17:16:24', NULL),
(64, 'T-164', 'Lenovo', 'Rose Gold', 17.0000, 700.0000, 15, 1, '2020-06-09 17:16:24', NULL),
(65, 'T-165', 'Lenovo', 'Grey', 17.0000, 900.0000, 15, 1, '2020-06-09 17:16:24', NULL),
(66, 'T-166', 'Lenovo', 'Rose Gold', 17.0000, 900.0000, 15, 1, '2020-06-09 17:16:24', NULL),
(67, 'T-167', 'Lenovo', 'Rose Gold', 17.0000, 900.0000, 15, 1, '2020-06-09 17:16:24', NULL),
(68, 'T-168', 'Lenovo', 'Rose Gold', 15.0000, 900.0000, 15, 1, '2020-06-09 17:16:24', NULL),
(69, 'T-169', 'Lenovo', 'Rose Gold', 15.0000, 900.0000, 15, 1, '2020-06-09 17:16:24', NULL),
(70, 'T-170', 'Lenovo', 'Grey', 15.0000, 900.0000, 15, 1, '2020-06-09 17:16:24', NULL),
(71, 'T-171', 'Microsoft Surface', 'Black', 13.0000, 900.0000, 15, 1, '2020-06-09 17:16:24', NULL),
(72, 'T-172', 'Microsoft Surface', 'Rose Gold', 13.0000, 1000.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(73, 'T-173', 'Microsoft Surface', 'Rose Gold', 13.0000, 1000.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(74, 'T-174', 'Microsoft Surface', 'Grey', 13.0000, 1000.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(75, 'T-175', 'Microsoft Surface', 'White', 13.0000, 1000.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(76, 'T-176', 'Microsoft Surface', 'Rose Gold', 21.0000, 1000.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(77, 'T-177', 'Microsoft Surface', 'Rose Gold', 21.0000, 1000.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(78, 'T-178', 'Microsoft Surface', 'Grey', 21.0000, 1000.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(79, 'T-179', 'Samsung', 'Rose Gold', 21.0000, 1000.0000, 22, 1, '2020-07-02 15:30:58', NULL),
(80, 'T-180', 'Microsoft Surface', 'White', 21.0000, 1000.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(81, 'T-181', 'Toshiba', 'Silver', 17.0000, 1000.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(82, 'T-182', 'Toshiba', 'Rose Gold', 17.0000, 1000.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(83, 'T-183', 'Toshiba', 'Rose Gold', 17.0000, 1200.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(84, 'T-184', 'Toshiba', 'Rose Gold', 17.0000, 1200.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(85, 'T-185', 'Toshiba', 'White', 17.0000, 1200.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(86, 'T-186', 'Toshiba', 'Rose Gold', 17.0000, 1200.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(87, 'T-187', 'Toshiba', 'Rose Gold', 17.0000, 1200.0000, 20, 1, '2020-06-09 17:16:24', NULL),
(88, 'T-188', 'Toshiba', 'Rose Gold', 17.0000, 1200.0000, 20, 1, '2020-06-09 17:16:24', NULL),
(89, 'T-189', 'Toshiba', 'Rose Gold', 17.0000, 1200.0000, 20, 1, '2020-06-09 17:16:24', NULL),
(90, 'T-190', 'Toshiba', 'White', 17.0000, 1200.0000, 20, 1, '2020-06-09 17:16:24', NULL),
(91, 'T-191', 'Microsoft Surface', 'Silver', 17.0000, 1200.0000, 20, 1, '2020-07-03 04:20:29', NULL),
(92, 'T-192', 'Samsung', 'Silver', 21.0000, 1200.0000, 20, 1, '2020-06-09 17:16:24', NULL),
(93, 'T-193', 'Samsung', 'Silver', 21.0000, 1200.0000, 20, 1, '2020-06-09 17:16:24', NULL),
(94, 'T-194', 'Samsung', 'Grey', 21.0000, 200.0000, 20, 1, '2020-06-09 17:16:24', NULL),
(95, 'T-195', 'Samsung', 'Silver', 13.0000, 200.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(96, 'T-196', 'Samsung', 'White', 13.0000, 200.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(97, 'T-197', 'Samsung', 'Silver', 13.0000, 500.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(98, 'T-198', 'Samsung', 'Silver', 15.0000, 500.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(99, 'T-199', 'Samsung', 'Grey', 15.0000, 500.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(100, 'T-200', 'Samsung', 'White', 15.0000, 500.0000, 22, 1, '2020-06-09 17:16:24', NULL),
(101, 'T-201', 'Lenovo', 'Grey', 13.0000, 2000.0000, 50, 1, '2020-07-02 15:24:03', NULL),
(102, 'T-202', 'Microsoft Surface', 'Grey', 15.0000, 1000.0000, 50, 1, '2020-07-02 15:24:45', NULL),
(103, 'T-203', 'Samsung', 'Grey', 15.0000, 1500.0000, 25, 1, '2020-07-02 15:25:11', NULL),
(104, 'T-204', 'Toshiba', 'Grey', 19.0000, 1500.0000, 20, 1, '2020-07-02 15:25:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `status`) VALUES
(1, 'Admin', 'admin@mail.com', '123456789', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
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
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
