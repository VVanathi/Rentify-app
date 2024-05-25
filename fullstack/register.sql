-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2024 at 12:35 PM
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
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `generals`
--

CREATE TABLE `generals` (
  `id` int(11) NOT NULL,
  `img1` mediumtext NOT NULL,
  `openhouse` datetime DEFAULT NULL,
  `availability` text DEFAULT NULL,
  `movein` date DEFAULT NULL,
  `property` varchar(255) DEFAULT NULL,
  `year1` year(4) DEFAULT NULL,
  `square` decimal(10,2) DEFAULT NULL,
  `lotsize` decimal(10,2) DEFAULT NULL,
  `bedroom` int(11) DEFAULT NULL,
  `bathroom` int(11) DEFAULT NULL,
  `parking` varchar(50) DEFAULT NULL,
  `propertydesc` text DEFAULT NULL,
  `renovation` text DEFAULT NULL,
  `neighbour` text DEFAULT NULL,
  `villaname` varchar(255) DEFAULT NULL,
  `listingprice` decimal(10,2) DEFAULT NULL,
  `email1` varchar(255) DEFAULT NULL,
  `phonenum` varchar(20) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `statee` varchar(100) DEFAULT NULL,
  `zip` varchar(20) DEFAULT NULL,
  `propertytax` text DEFAULT NULL,
  `legaldesc` text DEFAULT NULL,
  `zonninginfo` varchar(255) DEFAULT NULL,
  `zonning` text DEFAULT NULL,
  `ownership1` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `passwor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phone`, `passwor`) VALUES
(9, 'Vanathi', 'V', 'vvanathi02@gmail.com', 0, '$2y$10$oQOGHexgUKk.AINkAX9c0O3oP5dd/9PcaUmMQ3/R9Dzu0SO6qTBCG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `generals`
--
ALTER TABLE `generals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `generals`
--
ALTER TABLE `generals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
