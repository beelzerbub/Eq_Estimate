-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 01, 2017 at 02:43 AM
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
-- Table structure for table `work_time`
--

CREATE TABLE `work_time` (
  `wt_id` int(10) NOT NULL,
  `wt_year` int(11) NOT NULL,
  `wt_term` int(1) NOT NULL,
  `T_id` int(4) NOT NULL,
  `Class_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `work_time`
--

INSERT INTO `work_time` (`wt_id`, `wt_year`, `wt_term`, `T_id`, `Class_id`) VALUES
(1, 2559, 2, 1, 1),
(2, 2559, 2, 2, 2),
(3, 2559, 2, 3, 3),
(4, 2559, 2, 4, 4),
(5, 2559, 2, 5, 5),
(6, 2559, 2, 6, 6),
(7, 2559, 2, 7, 7),
(8, 2559, 2, 8, 8),
(9, 2559, 2, 9, 9),
(10, 2559, 2, 10, 10),
(11, 2559, 2, 11, 11),
(12, 2559, 2, 12, 12),
(13, 2559, 2, 13, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `work_time`
--
ALTER TABLE `work_time`
  ADD PRIMARY KEY (`wt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `work_time`
--
ALTER TABLE `work_time`
  MODIFY `wt_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
