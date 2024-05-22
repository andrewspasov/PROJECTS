-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 23, 2023 at 06:12 PM
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
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `image_cover_url` varchar(2000) NOT NULL,
  `main_title` varchar(100) NOT NULL,
  `subtitle` varchar(2000) NOT NULL,
  `info` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `location` varchar(50) NOT NULL,
  `select_option_id` int(10) UNSIGNED DEFAULT NULL,
  `first_image_url` varchar(1000) NOT NULL,
  `first_desc` text NOT NULL,
  `second_image_url` varchar(1000) NOT NULL,
  `second_desc` text NOT NULL,
  `third_image_url` varchar(1000) NOT NULL,
  `third_desc` text NOT NULL,
  `company_desc` text NOT NULL,
  `linkedin` varchar(1000) NOT NULL,
  `facebook` varchar(1000) NOT NULL,
  `twitter` varchar(1000) NOT NULL,
  `google` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `select_option`
--

CREATE TABLE `select_option` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `select_option`
--

INSERT INTO `select_option` (`id`, `type`) VALUES
(1, 'Products'),
(2, 'Services');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `select_option_id` (`select_option_id`);

--
-- Indexes for table `select_option`
--
ALTER TABLE `select_option`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `select_option`
--
ALTER TABLE `select_option`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`select_option_id`) REFERENCES `select_option` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
