-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 04, 2017 at 03:16 AM
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
  MODIFY `As_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `class_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
  MODIFY `Std_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `t_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `Term_id` int(5) NOT NULL AUTO_INCREMENT;
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
