-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 03, 2017 at 03:17 AM
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
  `As_name` varchar(50) COLLATE utf32_unicode_ci DEFAULT NULL,
  `As_surname` varchar(50) COLLATE utf32_unicode_ci DEFAULT NULL,
  `As_type` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `User_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `assessor`
--

INSERT INTO `assessor` (`As_id`, `As_name`, `As_surname`, `As_type`, `User_id`) VALUES
(1, 'ผู้ประเมิน (ครูประจำชั้น)', 'ผู้ประเมิน (ครูประจำชั้น)', 'ครูประจำชั้น', 0),
(2, 'ผู้ประเมิน (ผู้ปกครอง)', 'ผู้ประเมิน (ผู้ปกครอง)', 'ผู้ปกครอง', 0),
(3, '', '', 'ครูประจำชั้น', 0),
(4, '', '', 'ผู้ปกครอง', 0);

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `class_id` int(4) NOT NULL,
  `class_grade` varchar(20) COLLATE utf32_unicode_ci NOT NULL COMMENT 'ระดับชั้น',
  `class_number` int(2) NOT NULL COMMENT 'เลขที่ห้อง',
  `class_status` int(1) NOT NULL COMMENT 'สถานะห้องเรียน'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci COMMENT='ห้องเรียน';

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`class_id`, `class_grade`, `class_number`, `class_status`) VALUES
(0, 'ไม่ระบุ', 0, 1),
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

--
-- Dumping data for table `estimate_score`
--

INSERT INTO `estimate_score` (`Ess_id`, `Es_score`, `Sg_id`, `Es_id`) VALUES
(1, 18, 1, 1),
(2, 19, 2, 1),
(3, 0, 3, 1),
(4, 0, 4, 1),
(5, 0, 5, 1),
(6, 0, 6, 1),
(7, 0, 7, 1),
(8, 0, 8, 1),
(9, 0, 9, 1),
(10, 16, 1, 2),
(11, 29, 2, 2),
(12, 0, 3, 2),
(13, 0, 4, 2),
(14, 0, 5, 2),
(15, 0, 6, 2),
(16, 0, 7, 2),
(17, 0, 8, 2),
(18, 0, 9, 2),
(19, 0, 1, 3),
(20, 0, 2, 3),
(21, 0, 3, 3),
(22, 0, 4, 3),
(23, 0, 5, 3),
(24, 0, 6, 3),
(25, 0, 7, 3),
(26, 0, 8, 3),
(27, 0, 9, 3),
(28, 0, 1, 4),
(29, 0, 2, 4),
(30, 0, 3, 4),
(31, 0, 4, 4),
(32, 0, 5, 4),
(33, 0, 6, 4),
(34, 0, 7, 4),
(35, 0, 8, 4),
(36, 0, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `estimate_time`
--

CREATE TABLE `estimate_time` (
  `Es_id` int(5) NOT NULL,
  `Es_year` int(11) NOT NULL,
  `Es_term` int(1) NOT NULL,
  `Std_no` int(12) NOT NULL,
  `As_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `estimate_time`
--

INSERT INTO `estimate_time` (`Es_id`, `Es_year`, `Es_term`, `Std_no`, `As_id`) VALUES
(1, 2559, 2, 28, 1),
(2, 2559, 2, 28, 2),
(3, 2559, 2, 2, 3),
(4, 2559, 2, 2, 4);

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
(27, '1250101858881', 'นดล', 'ภู่ประสม', 3, 2),
(28, '5506021612040', 'ทดสอบการประเมิน', 'ทดสอบการประเมิน', 23, 2);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` int(4) NOT NULL,
  `t_name` varchar(50) COLLATE utf32_unicode_ci DEFAULT NULL,
  `t_surname` varchar(50) COLLATE utf32_unicode_ci DEFAULT NULL,
  `t_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci COMMENT='ครูประจำชั้น';

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `t_name`, `t_surname`, `t_status`) VALUES
(1, 'มยุรี', 'กตะศิลา', 0),
(2, 'รำพึง', 'สุขช่วย', 0),
(3, 'วันเพ็ญ', 'รังสิกุล', 0),
(4, 'ชุติมา', 'รัตนนท์', 0),
(5, 'วราภรณ์', 'ตันญบุตร', 0),
(6, 'มินตรา', 'ทองกรณ์', 0),
(7, 'พัชนี', 'พลเผือก', 0),
(8, 'สุภาวดี', 'บุญพูล', 0),
(9, 'อภิญญา ', 'ภูคะสินธ์', 0),
(10, 'ณัทอร', 'ผิดพันธ์', 0),
(11, 'สังวาลย์', 'เหมือนกรุด', 0),
(12, 'พูลทรัพย์', 'คนขยัน', 0),
(13, 'ชลชนก', 'สุทธิอาคาร', 0);

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `Term_id` int(5) NOT NULL,
  `Term_year` int(4) NOT NULL,
  `Term` int(11) NOT NULL,
  `Class_id` int(4) NOT NULL,
  `Std_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`Term_id`, `Term_year`, `Term`, `Class_id`, `Std_no`) VALUES
(2, 2559, 2, 1, 2),
(3, 2559, 2, 1, 3),
(4, 2559, 2, 1, 4),
(5, 2559, 2, 1, 5),
(6, 2559, 2, 1, 6),
(7, 2559, 2, 1, 7),
(8, 2559, 2, 1, 8),
(9, 2559, 2, 1, 9),
(10, 2559, 2, 1, 10),
(11, 2559, 2, 1, 11),
(12, 2559, 2, 1, 12),
(13, 2559, 2, 1, 13),
(14, 2559, 2, 1, 14),
(15, 2559, 2, 1, 15),
(16, 2559, 2, 1, 16),
(17, 2559, 2, 1, 17),
(18, 2559, 2, 1, 18),
(19, 2559, 2, 1, 19),
(20, 2559, 2, 1, 20),
(21, 2559, 2, 1, 21),
(22, 2559, 2, 1, 22),
(23, 2559, 2, 1, 23),
(24, 2559, 2, 1, 24),
(25, 2559, 2, 1, 25),
(26, 2559, 2, 1, 26),
(27, 2559, 2, 1, 27),
(28, 2559, 2, 1, 28);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(4) NOT NULL,
  `username` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `user_email` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `user_surname` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `user_role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `user_email`, `user_name`, `user_surname`, `user_role`) VALUES
(1, 'beelzerbub', 'gCrktdb0hsm', 'beelzerbub@hotmail.com', 'Ratchakran', 'Prapanon', 8),
(2, 'guest', 'guest', 'guest@hotmail.com', 'guest_name', 'guest_surname', 1),
(3, 'teacher_user', 'gCrktdb0hsm', 'teacher@hotmail.com', 'teacher_name', 'teacher_surname', 2);

-- --------------------------------------------------------

--
-- Table structure for table `work_time`
--

CREATE TABLE `work_time` (
  `wt_id` int(10) NOT NULL,
  `wt_year` int(11) NOT NULL,
  `wt_term` int(1) NOT NULL,
  `t_id` int(4) NOT NULL,
  `class_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `work_time`
--

INSERT INTO `work_time` (`wt_id`, `wt_year`, `wt_term`, `t_id`, `class_id`) VALUES
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
-- Indexes for table `assessor`
--
ALTER TABLE `assessor`
  ADD PRIMARY KEY (`As_id`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`class_id`);

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
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`Term_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `work_time`
--
ALTER TABLE `work_time`
  ADD PRIMARY KEY (`wt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessor`
--
ALTER TABLE `assessor`
  MODIFY `As_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `class_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `estimate_score`
--
ALTER TABLE `estimate_score`
  MODIFY `Ess_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `estimate_time`
--
ALTER TABLE `estimate_time`
  MODIFY `Es_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `score_group`
--
ALTER TABLE `score_group`
  MODIFY `Sg_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Std_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `t_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `Term_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `work_time`
--
ALTER TABLE `work_time`
  MODIFY `wt_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
