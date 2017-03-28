-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2017 at 11:03 PM
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
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Std_no` int(11) NOT NULL,
  `Std_id` varchar(13) COLLATE utf32_unicode_ci NOT NULL,
  `Std_name` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `Std_surname` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `Std_age` int(2) NOT NULL,
  `Std_gender` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Std_no`, `Std_id`, `Std_name`, `Std_surname`, `Std_age`, `Std_gender`) VALUES
(2, '1250101843115', 'ปาณัสม์', 'สีทองเพีย', 3, 2),
(3, '1103400244969', 'กาญจน์นลิน', 'โอสถาพงษ์กาญจน์', 3, 1),
(4, '1250101833241', 'บุญญิสา', 'คนหลัก', 3, 1),
(5, '1250101856136', 'กัณพล', 'ฟักเปีย', 3, 2),
(6, '1250101840043', 'ฐปนวัฒน์', 'สุ่นปาน', 3, 2),
(7, '1250101840906', 'บุญสิตา', 'ชาญฉลาด', 3, 1),
(8, '1250101855911', 'ธนกฤต', 'ฝั่งมงคลกิจ', 3, 2),
(9, '1259900105393', 'พรประภัสสร', 'พาดวงจันทร์', 3, 1),
(10, '1250101828051', 'ณฎา', 'สหพงศ์', 3, 1),
(11, '1250101830692', 'สิริบูรณ์', 'บุญพิทักษ์', 3, 1),
(12, '1250101854826', 'พิชยุตม์', 'หงษ์ทอง', 3, 2),
(13, '1250101857116', 'ภูริชญาฐ์', 'จิตรบุญ', 3, 1),
(14, '1250101828116', 'ชยวรรธน์', 'ขาวสุริยจันทร์', 3, 2),
(15, '1250101839037', 'ภัทราภรณ์', 'พลายวัน', 3, 1),
(16, '1469900966087', 'พงศพัฒฐ์', 'ภูวเกียรติกำจร', 3, 2),
(17, '1250101837417', 'ปณศภัทร', 'ไพเราะ', 3, 1),
(18, '1250101846998', 'พัสวีพิชญ์', 'ภูวิศปภาวงษ์', 3, 1),
(19, '1260401261758', 'อรณิชชา', 'เสริมทอง', 3, 1),
(20, '1103400273616', 'ปณิตา', 'เลิศวิไล', 3, 1),
(21, '1104700257056', 'จุตรภัทร', 'เคี่ยนคำ', 3, 2),
(22, '1101000446287', 'วิลาวัลย์', 'วิทเมธีกุล', 3, 1),
(23, '1101000446279', 'พีรนีย์', 'วิทเมธีกุล', 3, 1),
(24, '1250101858481', 'เอวีเนีย', 'ปรุงจิตร์', 3, 1),
(25, '1250101861121', 'กมลทิพย์', 'พิสุทธิ์เสรีวงศ์', 3, 1),
(26, '1139400082751', 'ปันสุข', 'พรประสิทธิ์', 3, 1),
(27, '1250101858881', 'นดล', 'ภู่ประสม', 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Std_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Std_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
