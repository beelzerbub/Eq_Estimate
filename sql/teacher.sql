-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 01, 2017 at 02:50 AM
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
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `T_id` int(4) NOT NULL,
  `T_name` varchar(50) COLLATE utf32_unicode_ci DEFAULT NULL,
  `T_surname` varchar(50) COLLATE utf32_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci COMMENT='ครูประจำชั้น';

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`T_id`, `T_name`, `T_surname`) VALUES
(1, 'มยุรี', 'กตะศิลา'),
(2, 'รำพึง', 'สุขช่วย'),
(3, 'วันเพ็ญ', 'รังสิกุล'),
(4, 'ชุติมา', 'รัตนนท์'),
(5, 'วราภรณ์', 'ตันญบุตร'),
(6, 'มินตรา', 'ทองกรณ์'),
(7, 'พัชนี', 'พลเผือก'),
(8, 'สุภาวดี', 'บุญพูล'),
(9, 'อภิญญา ', 'ภูคะสินธ์'),
(10, 'ณัทอร', 'ผิดพันธ์'),
(11, 'สังวาลย์', 'เหมือนกรุด'),
(12, 'พูลทรัพย์', 'คนขยัน'),
(13, 'ชลชนก', 'สุทธิอาคาร');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`T_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `T_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
