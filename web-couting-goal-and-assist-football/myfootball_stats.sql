-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2024 at 12:46 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myfootball_stats`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 1),
(2, 'nvth', '12345', 2);

-- --------------------------------------------------------

--
-- Table structure for table `myshoes`
--

CREATE TABLE `myshoes` (
  `shoe_id` int(50) NOT NULL,
  `nameshoes` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(255) NOT NULL,
  `owner_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shoeinformation`
--

CREATE TABLE `shoeinformation` (
  `info_id` int(11) NOT NULL,
  `shoe_id` int(11) NOT NULL,
  `scored` int(11) NOT NULL,
  `assisted` int(11) NOT NULL,
  `stadium_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `matchday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myshoes`
--
ALTER TABLE `myshoes`
  ADD PRIMARY KEY (`shoe_id`),
  ADD KEY `fk_owner` (`owner_id`);

--
-- Indexes for table `shoeinformation`
--
ALTER TABLE `shoeinformation`
  ADD PRIMARY KEY (`info_id`),
  ADD KEY `shoe_id` (`shoe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `myshoes`
--
ALTER TABLE `myshoes`
  MODIFY `shoe_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `shoeinformation`
--
ALTER TABLE `shoeinformation`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `myshoes`
--
ALTER TABLE `myshoes`
  ADD CONSTRAINT `fk_owner` FOREIGN KEY (`owner_id`) REFERENCES `account` (`id`);

--
-- Constraints for table `shoeinformation`
--
ALTER TABLE `shoeinformation`
  ADD CONSTRAINT `shoeinformation_ibfk_1` FOREIGN KEY (`shoe_id`) REFERENCES `myshoes` (`shoe_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
