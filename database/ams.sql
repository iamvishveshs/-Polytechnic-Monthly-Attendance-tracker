-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql303.byetcluster.com
-- Generation Time: Jun 23, 2024 at 07:20 AM
-- Server version: 10.4.17-MariaDB
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
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_teacher`
--

CREATE TABLE `assigned_teacher` (
  `subject_id` varchar(255) NOT NULL,
  `teacher_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assigned_teacher`
--

INSERT INTO `assigned_teacher` (`subject_id`, `teacher_id`) VALUES
('4', '17'),
('3', '17'),
('7', '17'),
('10', '17'),
('11', '17'),
('2', '17'),
('12', '17'),
('6', '17');

-- --------------------------------------------------------

--
-- Table structure for table `Attendance5thSem`
--

CREATE TABLE `Attendance5thSem` (
  `student_id` int(11) NOT NULL,
  `s4` varchar(255) DEFAULT NULL,
  `s3` varchar(255) DEFAULT NULL,
  `s7` varchar(255) DEFAULT NULL,
  `s10` varchar(255) DEFAULT NULL,
  `s11` varchar(255) DEFAULT NULL,
  `s2` varchar(255) DEFAULT NULL,
  `s6` varchar(255) DEFAULT NULL,
  `s12` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Attendance5thSem`
--

INSERT INTO `Attendance5thSem` (`student_id`, `s4`, `s3`, `s7`, `s10`, `s11`, `s2`, `s6`, `s12`) VALUES
(191, '45/45', '111/111', '111/111', '111/111', '111/111', '111/111', '111/111', '111/111'),
(192, '45/21', '111/57', '111/57', '111/57', '111/57', '111/57', '111/57', '111/57'),
(193, '45/23', '111/69', '111/69', '111/69', '111/69', '111/69', '111/69', '111/69'),
(194, '45/32', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89'),
(195, '45/12', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89'),
(196, '45/34', '111/88', '111/88', '111/88', '111/88', '111/88', '111/88', '111/88'),
(197, '45/45', '111/90', '111/90', '111/90', '111/90', '111/90', '111/90', '111/90'),
(198, '45/23', '111/99', '111/99', '111/99', '111/99', '111/99', '111/99', '111/99'),
(199, '45/12', '111/67', '111/67', '111/67', '111/67', '111/67', '111/67', '111/67'),
(200, '45/13', '111/56', '111/56', '111/56', '111/56', '111/56', '111/56', '111/56'),
(201, '45/23', '111/67', '111/67', '111/67', '111/67', '111/67', '111/67', '111/67'),
(202, '45/23', '111/88', '111/88', '111/88', '111/88', '111/88', '111/88', '111/88'),
(203, '45/34', '111/78', '111/78', '111/78', '111/78', '111/78', '111/78', '111/78'),
(204, '45/23', '111/77', '111/77', '111/77', '111/77', '111/77', '111/77', '111/77'),
(205, '45/23', '111/98', '111/98', '111/98', '111/98', '111/98', '111/98', '111/98'),
(206, '45/23', '111/90', '111/90', '111/90', '111/90', '111/90', '111/90', '111/90'),
(207, '45/23', '111/80', '111/80', '111/80', '111/80', '111/80', '111/80', '111/80'),
(208, '45/23', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89'),
(209, '45/34', '111/88', '111/88', '111/88', '111/88', '111/88', '111/88', '111/88'),
(210, '45/23', '111/74', '111/74', '111/74', '111/74', '111/74', '111/74', '111/74'),
(211, '45/34', '111/102', '111/102', '111/102', '111/102', '111/102', '111/102', '111/102'),
(212, '45/23', '111/59', '111/59', '111/59', '111/59', '111/59', '111/59', '111/59'),
(213, '45/23', '111/50', '111/50', '111/50', '111/50', '111/50', '111/50', '111/50'),
(214, '45/34', '111/70', '111/70', '111/70', '111/70', '111/70', '111/70', '111/70'),
(215, '45/34', '98/49', '111/49', '111/49', '111/49', '111/49', '111/49', '111/49'),
(216, '45/23', '111/78', '111/78', '111/78', '111/78', '111/78', '111/78', '111/78'),
(217, '45/23', '111/100', '111/100', '111/100', '111/100', '111/100', '111/100', '111/100'),
(218, '45/23', '111/56', '111/56', '111/56', '111/56', '111/56', '111/56', '111/56'),
(219, '45/23', '111/78', '111/78', '111/78', '111/78', '111/78', '111/78', '111/78'),
(220, '45/23', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89'),
(221, '45/34', '111/90', '111/90', '111/90', '111/90', '111/90', '111/90', '111/90'),
(222, '45/34', '111/50', '111/50', '111/50', '111/50', '111/50', '111/50', '111/50'),
(223, '45/23', '111/67', '111/67', '111/67', '111/67', '111/67', '111/67', '111/67'),
(224, '45/23', '111/78', '111/78', '111/78', '111/78', '111/78', '111/78', '111/78'),
(225, '45/34', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89'),
(226, '45/23', '111/76', '111/76', '111/76', '111/76', '111/76', '111/76', '111/76'),
(227, '45/34', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89'),
(228, '45/45', '111/111', '111/111', '111/111', '111/111', '111/111', '111/111', '111/111'),
(229, '45/34', '111/79', '111/79', '111/79', '111/79', '111/79', '111/79', '111/79'),
(230, '45/23', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89'),
(231, '45/34', '111/90', '111/90', '111/90', '111/90', '111/90', '111/90', '111/90'),
(232, '45/34', '111/50', '111/50', '111/50', '111/50', '111/50', '111/50', '111/50'),
(233, '45/23', '111/67', '111/67', '111/67', '111/67', '111/67', '111/67', '111/67'),
(234, '45/23', '111/78', '111/78', '111/78', '111/78', '111/78', '111/78', '111/78'),
(235, '45/34', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89'),
(236, '45/34', '111/45', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89'),
(237, '45/23', '111/76', '111/76', '111/76', '111/76', '111/76', '111/76', '111/76'),
(238, '45/34', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89'),
(239, '45/45', '111/111', '111/111', '111/111', '111/111', '111/111', '111/111', '111/111'),
(240, '45/34', '111/79', '111/79', '111/79', '111/79', '111/79', '111/79', '111/79');

-- --------------------------------------------------------

--
-- Table structure for table `class_teacher`
--

CREATE TABLE `class_teacher` (
  `teacher_id` int(11) DEFAULT NULL,
  `sem` enum('1','2','3','4','5','6') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_teacher`
--

INSERT INTO `class_teacher` (`teacher_id`, `sem`) VALUES
(NULL, '1'),
(NULL, '2'),
(NULL, '3'),
(NULL, '4'),
(17, '5'),
(NULL, '6');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `deptt_id` int(20) NOT NULL,
  `deptt_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(20) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `sem` int(11) NOT NULL,
  `sbrn` bigint(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `sem`, `sbrn`, `father_name`, `address`) VALUES
(191, 'Alice Johnson', 5, 1001, 'Michael Johnson', '123 Maple St'),
(192, 'Bob Smith', 5, 1002, 'John Smith', '456 Oak St'),
(193, 'Charlie Brown', 5, 1003, 'James Brown', '789 Pine St'),
(194, 'David Wilson', 5, 1004, 'Robert Wilson', '101 Birch St'),
(195, 'Emma Davis', 5, 1005, 'William Davis', '202 Cedar St'),
(196, 'Fiona White', 5, 1006, 'Richard White', '303 Elm St'),
(197, 'George Harris', 5, 1007, 'Thomas Harris', '404 Fir St'),
(198, 'Hannah Martin', 5, 1008, 'Edward Martin', '505 Spruce St'),
(199, 'Ian Thompson', 5, 1009, 'Charles Thompson', '606 Walnut St'),
(200, 'Jane Lee', 5, 1010, 'Henry Lee', '707 Ash St'),
(201, 'Kevin Turner', 5, 1011, 'Peter Turner', '808 Poplar St'),
(202, 'Laura Clark', 5, 1012, 'Frank Clark', '909 Willow St'),
(203, 'Michael Wright', 5, 1013, 'Patrick Wright', '111 Chestnut St'),
(204, 'Nina Young', 5, 1014, 'Samuel Young', '222 Redwood St'),
(205, 'Oscar Hill', 5, 1015, 'Douglas Hill', '333 Cypress St'),
(206, 'Paula Scott', 5, 1016, 'Steven Scott', '444 Alder St'),
(207, 'Quincy Green', 5, 1017, 'Anthony Green', '555 Sycamore St'),
(208, 'Rachel Adams', 5, 1018, 'Raymond Adams', '666 Beech St'),
(209, 'Steven Baker', 5, 1019, 'Lawrence Baker', '777 Hemlock St'),
(210, 'Tina Edwards', 5, 1020, 'Kenneth Edwards', '888 Dogwood St'),
(211, 'Ursula Ford', 5, 1021, 'Howard Ford', '999 Hawthorn St'),
(212, 'Victor Garcia', 5, 1022, 'Philip Garcia', '100 Locust St'),
(213, 'Wendy Hall', 5, 1023, 'Martin Hall', '200 Magnolia St'),
(214, 'Xander Lewis', 5, 1024, 'Bruce Lewis', '300 Cottonwood St'),
(215, 'Yvonne Nelson', 5, 1025, 'Gerald Nelson', '400 Palm St'),
(216, 'Zachary Moore', 5, 1026, 'Russell Moore', '500 Mimosa St'),
(217, 'Amanda Perez', 5, 1027, 'Bryan Perez', '600 Juniper St'),
(218, 'Brandon Ross', 5, 1028, 'Louis Ross', '700 Olive St'),
(219, 'Catherine Taylor', 5, 1029, 'Vincent Taylor', '800 Linden St'),
(220, 'Daniel Walker', 5, 1030, 'Stuart Walker', '900 Hickory St'),
(221, 'Eleanor Young', 5, 1031, 'Travis Young', '1000 Laurel St'),
(222, 'Franklin Carter', 5, 1032, 'Warren Carter', '1100 Mulberry St'),
(223, 'Gloria Brown', 5, 1033, 'Clifford Brown', '1200 Holly St'),
(224, 'Harold Stewart', 5, 1034, 'Eugene Stewart', '1300 Myrtle St'),
(225, 'Isabelle Sanders', 5, 1035, 'Frederick Sanders', '1400 Cedar St'),
(226, 'Jack Kelly', 5, 1036, 'Matthew Kelly', '1500 Birch St'),
(227, 'Katherine Ward', 5, 1037, 'Norman Ward', '1600 Maple St'),
(228, 'Leonard Cooper', 5, 1038, 'Wayne Cooper', '1700 Oak St'),
(229, 'Madeline Jenkins', 5, 1039, 'Harvey Jenkins', '1800 Pine St'),
(230, 'Nathaniel Griffin', 5, 1040, 'Derek Griffin', '1900 Elm St'),
(231, 'Olivia Foster', 5, 1041, 'Alfred Foster', '2000 Fir St'),
(232, 'Peter Murphy', 5, 1042, 'Arnold Murphy', '2100 Spruce St'),
(233, 'Quinn Henderson', 5, 1043, 'Clyde Henderson', '2200 Walnut St'),
(234, 'Rebecca Rogers', 5, 1044, 'Lloyd Rogers', '2300 Chestnut St'),
(235, 'Samuel Barnes', 5, 1045, 'Marvin Barnes', '2400 Redwood St'),
(236, 'Teresa Bell', 5, 1046, 'Gilbert Bell', '2500 Cypress St'),
(237, 'Ulysses Campbell', 5, 1047, 'Milton Campbell', '2600 Alder St'),
(238, 'Veronica Coleman', 5, 1048, 'Wallace Coleman', '2700 Sycamore St'),
(239, 'Walter Diaz', 5, 1049, 'Clayton Diaz', '2800 Beech St'),
(240, 'Xenia Graham', 5, 1050, 'Emmett Graham', '2900 Hemlock St');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(20) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `scheme` varchar(50) NOT NULL,
  `type` enum('theory','practical') NOT NULL,
  `sem` enum('1','2','3','4','5','6') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `scheme`, `type`, `sem`) VALUES
(2, 'Programming using Java ', 'N-2017', 'theory', '5'),
(3, 'Computer Hardware and Peripherals ', 'N-2017', 'theory', '5'),
(4, 'Cloud Computing', 'N-2017', 'theory', '5'),
(6, 'Programming using Java ', 'N-2017', 'practical', '5'),
(7, 'Computer Hardware and Peripherals ', 'N-2017', 'practical', '5'),
(10, 'Graphics and Animation', 'N-2017', 'practical', '5'),
(11, 'Minor Project', 'N-2017', 'practical', '5'),
(12, 'Student Centred Activities ', 'N-2017', 'practical', '5'),
(13, 'Web Programming', 'N-2017', 'theory', '4'),
(14, 'Web Programming', 'N-2017', 'practical', '4'),
(15, 'Relational Database Management System', 'N-2017', 'theory', '4'),
(16, 'Relational Database Management System', 'N-2017', 'practical', '4'),
(17, 'Data Structures using C', 'N-2017', 'practical', '4'),
(18, 'Data Structures using C', 'N-2017', 'theory', '4'),
(19, 'Computer Organization and Architecture', 'N-2017', 'theory', '4'),
(20, 'Computer Organization and Architecture', 'N-2017', 'practical', '4'),
(21, 'Software Engineering', 'N-2017', 'theory', '4'),
(22, 'Student Centred Activities', 'N-2017', 'practical', '4'),
(40, 'LOS', 'N-2017', 'theory', '6'),
(41, 'LOS', 'N-2017', 'practical', '6'),
(42, 'Wc& mc', 'N-2017', 'theory', '6'),
(43, 'Python', 'N-2017', 'theory', '6'),
(44, 'Python', 'N-2017', 'practical', '6'),
(45, 'Wc& mc', 'N-2017', 'practical', '6'),
(46, 'IoT ', 'N-2017', 'practical', '6'),
(47, 'Major project', 'N-2017', 'practical', '6'),
(48, 'PCS', 'N-2017', 'practical', '6'),
(49, 'SCA ', 'N-2017', 'practical', '6'),
(50, 'Library', 'N-2017', 'practical', '6'),
(53, 'DSA', 'N-2017', 'theory', '3'),
(54, 'DSA', 'N-2017', 'practical', '3'),
(55, 'IT', 'N-2017', 'theory', '3'),
(56, 'IT', 'N-2017', 'practical', '3'),
(57, 'OS', 'N-2017', 'theory', '3'),
(58, 'OS', 'N-2017', 'practical', '3'),
(60, 'APCL', 'N-2017', 'practical', '3'),
(61, 'DC&CN', 'N-2017', 'theory', '3'),
(62, 'DC&CN', 'N-2017', 'practical', '3'),
(63, 'SCA', 'N-2017', 'practical', '3'),
(64, 'APCL', 'N-2017', 'theory', '3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` enum('admin','teacher','classTeacher') NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `otp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `phone_number`, `designation`, `department`, `otp`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '8976543210', 'HOD', 'computer', NULL),
(17, 'Vishvesh Shivam', 'teacher1@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'classTeacher', '9871253640', 'lecturer', 'computer', NULL),
(30, 'Shyam Sharma', 'teacher2gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'teacher', '9876512340', 'Assistant Professor', 'computer', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Attendance5thSem`
--
ALTER TABLE `Attendance5thSem`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `class_teacher`
--
ALTER TABLE `class_teacher`
  ADD UNIQUE KEY `sem` (`sem`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone number` (`phone_number`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `sbrn` (`sbrn`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
