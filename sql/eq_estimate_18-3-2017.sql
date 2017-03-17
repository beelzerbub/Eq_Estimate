-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 18, 2017 at 04:21 AM
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
-- Table structure for table `assessor`
--

CREATE TABLE `assessor` (
  `As_id` int(5) NOT NULL,
  `As_name` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `As_surname` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `As_type` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `User_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `assessor`
--

INSERT INTO `assessor` (`As_id`, `As_name`, `As_surname`, `As_type`, `User_id`) VALUES
(1, 'ชื่อ', 'นามสกุล', 'ครูประจำชั้น', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `Class_id` int(4) NOT NULL,
  `Class_grade` int(4) NOT NULL COMMENT 'ระดับชั้น',
  `Class_number` int(2) NOT NULL COMMENT 'เลขที่ห้อง',
  `Class_status` int(1) NOT NULL COMMENT 'สถานะห้องเรียน'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci COMMENT='ห้องเรียน';

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`Class_id`, `Class_grade`, `Class_number`, `Class_status`) VALUES
(1, -1, 1, 1),
(2, -1, 2, 1),
(3, -2, 1, 1),
(4, -2, 2, 1),
(5, -3, 1, 1),
(6, 1, 1, 1),
(7, 2, 1, 1),
(8, 3, 1, 1),
(9, 4, 1, 1),
(10, 5, 1, 1),
(11, 6, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `estimate_score`
--

CREATE TABLE `estimate_score` (
  `Ess_id` int(7) NOT NULL,
  `Es_score` int(2) NOT NULL,
  `Sg_id` int(1) NOT NULL,
  `Es_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estimate_time`
--

CREATE TABLE `estimate_time` (
  `Es_id` int(5) NOT NULL,
  `Es_time` int(11) NOT NULL,
  `Es_term` int(1) NOT NULL,
  `Std_id` varchar(13) COLLATE utf32_unicode_ci NOT NULL,
  `As_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `score_group`
--

CREATE TABLE `score_group` (
  `Sg_id` int(1) NOT NULL,
  `Sg_name` varchar(20) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci COMMENT='กลุ่มของคะแนน';

--
-- Dumping data for table `score_group`
--

INSERT INTO `score_group` (`Sg_id`, `Sg_name`) VALUES
(1, 'ควบคุมอารมณ์'),
(2, 'ใส่ใจและเข้าใจอารมณ์'),
(3, 'ยอมรับถูกผิด'),
(4, 'มุ่งมั่นพยายาม'),
(5, 'ปรับตัวต่อปัญหา'),
(6, 'กล้าแสดงออก'),
(7, 'พอใจในตนเอง'),
(8, 'รู้จักปรับใจ'),
(9, 'รื่นเริงเบิกบาน');

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

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `T_id` int(4) NOT NULL,
  `T_name` varchar(50) COLLATE utf32_unicode_ci DEFAULT NULL,
  `T_surname` varchar(50) COLLATE utf32_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci COMMENT='ครูประจำชั้น';

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `Term_id` int(5) NOT NULL,
  `Term_year` int(4) NOT NULL,
  `Class_id` int(4) NOT NULL,
  `Std_id` varchar(13) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`Term_id`, `Term_year`, `Class_id`, `Std_id`) VALUES
(2, 2560, 1, '1250101843115'),
(3, 2560, 1, '1103400244969'),
(4, 2560, 1, '1250101833241'),
(5, 2560, 1, '1250101856136'),
(6, 2560, 1, '1250101840043'),
(7, 2560, 1, '1250101840906'),
(8, 2560, 1, '1250101855911'),
(9, 2560, 1, '1259900105393'),
(10, 2560, 1, '1250101828051'),
(11, 2560, 1, '1250101830692'),
(12, 2560, 1, '1250101854826'),
(13, 2560, 1, '1250101857116'),
(14, 2560, 1, '1250101828116'),
(15, 2560, 1, '1250101839037'),
(16, 2560, 1, '1469900966087'),
(17, 2560, 1, '1250101837417'),
(18, 2560, 1, '1250101846998'),
(19, 2560, 1, '1260401261758'),
(20, 2560, 1, '1103400273616'),
(21, 2560, 1, '1104700257056'),
(22, 2560, 1, '1101000446287'),
(23, 2560, 1, '1101000446279'),
(24, 2560, 1, '1250101858481'),
(25, 2560, 1, '1250101861121'),
(26, 2560, 1, '1139400082751'),
(27, 2560, 1, '1250101858881');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_id` int(4) NOT NULL,
  `Username` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `Password` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `User_email` varchar(30) COLLATE utf32_unicode_ci DEFAULT NULL,
  `User_question` int(2) NOT NULL,
  `User_answer` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `User_name` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `User_surname` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `user_role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_time`
--

CREATE TABLE `work_time` (
  `Wt_time` int(10) NOT NULL,
  `Wt_year` int(11) NOT NULL,
  `T_id` int(4) NOT NULL,
  `Class_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessor`
--
ALTER TABLE `assessor`
  ADD PRIMARY KEY (`As_id`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`Class_id`);

--
-- Indexes for table `estimate_score`
--
ALTER TABLE `estimate_score`
  ADD PRIMARY KEY (`Ess_id`);

--
-- Indexes for table `estimate_time`
--
ALTER TABLE `estimate_time`
  ADD PRIMARY KEY (`Es_id`);

--
-- Indexes for table `score_group`
--
ALTER TABLE `score_group`
  ADD PRIMARY KEY (`Sg_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Std_no`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`T_id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`Term_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `work_time`
--
ALTER TABLE `work_time`
  ADD PRIMARY KEY (`Wt_time`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessor`
--
ALTER TABLE `assessor`
  MODIFY `As_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `Class_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `estimate_score`
--
ALTER TABLE `estimate_score`
  MODIFY `Ess_id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `estimate_time`
--
ALTER TABLE `estimate_time`
  MODIFY `Es_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `score_group`
--
ALTER TABLE `score_group`
  MODIFY `Sg_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Std_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `T_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `Term_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `work_time`
--
ALTER TABLE `work_time`
  MODIFY `Wt_time` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
