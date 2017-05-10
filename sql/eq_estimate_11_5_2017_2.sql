-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 11, 2017 at 03:23 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eq_estimate`
--

-- --------------------------------------------------------

--
-- Table structure for table `estimate_time`
--

CREATE TABLE `estimate_time` (
  `Es_id` int(5) NOT NULL,
  `Es_year` int(4) NOT NULL,
  `Es_term` int(1) NOT NULL,
  `Std_no` int(12) NOT NULL,
  `As_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `estimate_time`
--

INSERT INTO `estimate_time` (`Es_id`, `Es_year`, `Es_term`, `Std_no`, `As_id`) VALUES
(1, 2559, 2, 2, 1),
(2, 2559, 2, 2, 2),
(3, 2559, 2, 228, 3),
(4, 2559, 2, 228, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estimate_time`
--
ALTER TABLE `estimate_time`
  ADD PRIMARY KEY (`Es_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estimate_time`
--
ALTER TABLE `estimate_time`
  MODIFY `Es_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
