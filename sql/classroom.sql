-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 01, 2017 at 02:55 AM
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
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `class_id` int(4) NOT NULL,
  `class_grade` varchar(20) COLLATE utf32_unicode_ci NOT NULL COMMENT 'ระดับชั้น',
  `Class_number` int(2) NOT NULL COMMENT 'เลขที่ห้อง',
  `Class_status` int(1) NOT NULL COMMENT 'สถานะห้องเรียน'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci COMMENT='ห้องเรียน';

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`class_id`, `class_grade`, `Class_number`, `Class_status`) VALUES
(1, 'อนุบาลปีที่ 1', 1, 1),
(2, 'อนุบาลปีที่ 1', 2, 1),
(3, 'อนุบาลปีที่ 1', 3, 1),
(4, 'อนุบาลปีที่ 2', 1, 1),
(5, 'อนุบาลปีที่ 2', 2, 1),
(6, 'อนุบาลปีที่ 3', 1, 1),
(7, 'อนุบาลปีที่ 3', 2, 1),
(8, 'ประถมศึกษาปีที่ 1', 1, 1),
(9, 'ประถมศึกษาปีที่ 2', 1, 1),
(10, 'ประถมศึกษาปีที่ 3', 1, 1),
(11, 'ประถมศึกษาปีที่ 4', 1, 1),
(12, 'ประถมศึกษาปีที่ 5', 1, 1),
(13, 'ประถมศึกษาปีที่ 6', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`class_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `class_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
