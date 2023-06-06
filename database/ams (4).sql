-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2023 at 07:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
('46', '17'),
('50', '17'),
('40', '17'),
('41', '17'),
('47', '17'),
('48', '17'),
('43', '17'),
('44', '17'),
('49', '17'),
('42', '17'),
('45', '17');

-- --------------------------------------------------------

--
-- Table structure for table `attendance5thsem`
--

CREATE TABLE `attendance5thsem` (
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
-- Dumping data for table `attendance5thsem`
--

INSERT INTO `attendance5thsem` (`student_id`, `s4`, `s3`, `s7`, `s10`, `s11`, `s2`, `s6`, `s12`) VALUES
(1, '111/111', '111/111', '111/111', '111/111', '111/111', '111/111', '111/111', '111/111'),
(2, '111/57', '111/57', '111/57', '111/57', '111/57', '111/57', '111/57', '111/57'),
(3, '111/69', '111/69', '111/69', '111/69', '111/69', '111/69', '111/69', '111/69'),
(4, '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89'),
(5, '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89'),
(6, '111/88', '111/88', '111/88', '111/88', '111/88', '111/88', '111/88', '111/88'),
(7, '111/90', '111/90', '111/90', '111/90', '111/90', '111/90', '111/90', '111/90'),
(8, '111/99', '111/99', '111/99', '111/99', '111/99', '111/99', '111/99', '111/99'),
(9, '111/67', '111/67', '111/67', '111/67', '111/67', '111/67', '111/67', '111/67'),
(10, '111/56', '111/56', '111/56', '111/56', '111/56', '111/56', '111/56', '111/56'),
(11, '111/67', '111/67', '111/67', '111/67', '111/67', '111/67', '111/67', '111/67'),
(12, '111/88', '111/88', '111/88', '111/88', '111/88', '111/88', '111/88', '111/88'),
(13, '111/78', '111/78', '111/78', '111/78', '111/78', '111/78', '111/78', '111/78'),
(14, '111/77', '111/77', '111/77', '111/77', '111/77', '111/77', '111/77', '111/77'),
(15, '111/98', '111/98', '111/98', '111/98', '111/98', '111/98', '111/98', '111/98'),
(16, '111/90', '111/90', '111/90', '111/90', '111/90', '111/90', '111/90', '111/90'),
(17, '111/80', '111/80', '111/80', '111/80', '111/80', '111/80', '111/80', '111/80'),
(18, '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89'),
(19, '111/88', '111/88', '111/88', '111/88', '111/88', '111/88', '111/88', '111/88'),
(20, '111/74', '111/74', '111/74', '111/74', '111/74', '111/74', '111/74', '111/74'),
(21, '111/102', '111/102', '111/102', '111/102', '111/102', '111/102', '111/102', '111/102'),
(22, '111/59', '111/59', '111/59', '111/59', '111/59', '111/59', '111/59', '111/59'),
(23, '111/50', '111/50', '111/50', '111/50', '111/50', '111/50', '111/50', '111/50'),
(24, '111/70', '111/70', '111/70', '111/70', '111/70', '111/70', '111/70', '111/70'),
(25, '111/49', '98/49', '111/49', '111/49', '111/49', '111/49', '111/49', '111/49'),
(26, '111/78', '111/78', '111/78', '111/78', '111/78', '111/78', '111/78', '111/78'),
(27, '111/100', '111/100', '111/100', '111/100', '111/100', '111/100', '111/100', '111/100'),
(28, '111/56', '111/56', '111/56', '111/56', '111/56', '111/56', '111/56', '111/56'),
(29, '111/78', '111/78', '111/78', '111/78', '111/78', '111/78', '111/78', '111/78'),
(30, '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89'),
(31, '111/90', '111/90', '111/90', '111/90', '111/90', '111/90', '111/90', '111/90'),
(32, '111/50', '111/50', '111/50', '111/50', '111/50', '111/50', '111/50', '111/50'),
(33, '111/67', '111/67', '111/67', '111/67', '111/67', '111/67', '111/67', '111/67'),
(34, '111/78', '111/78', '111/78', '111/78', '111/78', '111/78', '111/78', '111/78'),
(35, '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89'),
(36, '111/76', '111/76', '111/76', '111/76', '111/76', '111/76', '111/76', '111/76'),
(37, '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89'),
(38, '111/111', '111/111', '111/111', '111/111', '111/111', '111/111', '111/111', '111/111'),
(39, '111/79', '111/79', '111/79', '111/79', '111/79', '111/79', '111/79', '111/79'),
(40, '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89'),
(41, '111/78', '111/78', '111/78', '111/78', '111/78', '111/78', '111/78', '111/78'),
(42, '111/80', '111/80', '111/80', '111/80', '111/80', '111/80', '111/80', '111/80'),
(43, '111/45', '111/45', '111/45', '111/45', '111/45', '111/45', '111/45', '111/45'),
(44, '111/110', '111/110', '111/110', '111/110', '111/110', '111/110', '111/110', '111/110'),
(45, '111/100', '111/100', '111/100', '111/100', '111/100', '111/100', '111/100', '111/100'),
(46, '111/67', '111/67', '111/67', '111/67', '111/67', '111/67', '111/67', '111/67'),
(47, '111/90', '111/90', '111/90', '111/90', '111/90', '111/90', '111/90', '111/90'),
(48, '111/111', '111/111', '111/111', '111/111', '111/111', '111/111', '111/111', '111/111'),
(49, '111/110', '111/110', '111/110', '111/110', '111/110', '111/110', '111/110', '111/110'),
(50, '111/56', '111/56', '111/56', '111/56', '111/56', '111/56', '111/56', '111/56'),
(51, '111/67', '111/67', '111/67', '111/67', '111/67', '111/67', '111/67', '111/67'),
(52, '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89', '111/89'),
(170, '111/90', '111/90', '111/90', '111/90', '111/90', '111/90', '111/90', '111/90');

-- --------------------------------------------------------

--
-- Table structure for table `attendance6thsem`
--

CREATE TABLE `attendance6thsem` (
  `student_id` int(11) NOT NULL,
  `s46` varchar(255) DEFAULT NULL,
  `s50` varchar(255) DEFAULT NULL,
  `s40` varchar(255) DEFAULT NULL,
  `s41` varchar(255) DEFAULT NULL,
  `s47` varchar(255) DEFAULT NULL,
  `s48` varchar(255) DEFAULT NULL,
  `s43` varchar(255) DEFAULT NULL,
  `s44` varchar(255) DEFAULT NULL,
  `s49` varchar(255) DEFAULT NULL,
  `s42` varchar(255) DEFAULT NULL,
  `s45` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance6thsem`
--

INSERT INTO `attendance6thsem` (`student_id`, `s46`, `s50`, `s40`, `s41`, `s47`, `s48`, `s43`, `s44`, `s49`, `s42`, `s45`) VALUES
(1, NULL, NULL, '28/21', NULL, NULL, NULL, '33/23', NULL, NULL, '38/32', NULL),
(2, NULL, NULL, '28/20', NULL, NULL, NULL, '33/21', NULL, NULL, '38/33', NULL),
(3, NULL, NULL, '28/17', NULL, NULL, NULL, '33/19', NULL, NULL, '38/32', NULL),
(4, NULL, NULL, '28/22', NULL, NULL, NULL, '33/26', NULL, NULL, '38/34', NULL),
(5, NULL, NULL, '28/21', NULL, NULL, NULL, '33/23', NULL, NULL, '38/33', NULL),
(6, NULL, NULL, '28/20', NULL, NULL, NULL, '33/24', NULL, NULL, '38/25', NULL),
(7, NULL, NULL, '28/27', NULL, NULL, NULL, '33/28', NULL, NULL, '38/35', NULL),
(8, NULL, NULL, '28/26', NULL, NULL, NULL, '33/30', NULL, NULL, '38/37', NULL),
(9, NULL, NULL, '28/0', NULL, NULL, NULL, '33/0', NULL, NULL, '38/0', NULL),
(10, NULL, NULL, '28/22', NULL, NULL, NULL, '33/25', NULL, NULL, '38/32', NULL),
(11, NULL, NULL, '28/20', NULL, NULL, NULL, '33/25', NULL, NULL, '38/33', NULL),
(12, NULL, NULL, '28/19', NULL, NULL, NULL, '33/18', NULL, NULL, '38/31', NULL),
(13, NULL, NULL, '28/25', NULL, NULL, NULL, '33/28', NULL, NULL, '38/37', NULL),
(14, NULL, NULL, '28/24', NULL, NULL, NULL, '33/23', NULL, NULL, '38/35', NULL),
(15, NULL, NULL, '28/24', NULL, NULL, NULL, '33/26', NULL, NULL, '38/35', NULL),
(16, NULL, NULL, '28/17', NULL, NULL, NULL, '33/18', NULL, NULL, '38/30', NULL),
(17, NULL, NULL, '28/22', NULL, NULL, NULL, '33/27', NULL, NULL, '38/36', NULL),
(18, NULL, NULL, '28/25', NULL, NULL, NULL, '33/25', NULL, NULL, '38/34', NULL),
(19, NULL, NULL, '28/24', NULL, NULL, NULL, '33/27', NULL, NULL, '38/36', NULL),
(20, NULL, NULL, '28/26', NULL, NULL, NULL, '33/31', NULL, NULL, '38/34', NULL),
(21, NULL, NULL, '28/18', NULL, NULL, NULL, '33/21', NULL, NULL, '38/34', NULL),
(22, NULL, NULL, '28/25', NULL, NULL, NULL, '33/29', NULL, NULL, '38/35', NULL),
(23, NULL, NULL, '28/26', NULL, NULL, NULL, '33/28', NULL, NULL, '38/37', NULL),
(24, NULL, NULL, '28/21', NULL, NULL, NULL, '33/23', NULL, NULL, '38/33', NULL),
(25, NULL, NULL, '28/27', NULL, NULL, NULL, '33/31', NULL, NULL, '38/37', NULL),
(26, NULL, NULL, '28/21', NULL, NULL, NULL, '33/23', NULL, NULL, '38/32', NULL),
(27, NULL, NULL, '28/22', NULL, NULL, NULL, '33/26', NULL, NULL, '38/35', NULL),
(28, NULL, NULL, '28/18', NULL, NULL, NULL, '33/21', NULL, NULL, '38/34', NULL),
(29, NULL, NULL, '28/19', NULL, NULL, NULL, '33/25', NULL, NULL, '38/35', NULL),
(30, NULL, NULL, '28/20', NULL, NULL, NULL, '33/26', NULL, NULL, '38/36', NULL),
(31, NULL, NULL, '28/25', NULL, NULL, NULL, '33/29', NULL, NULL, '38/36', NULL),
(32, NULL, NULL, '28/21', NULL, NULL, NULL, '33/27', NULL, NULL, '38/36', NULL),
(33, NULL, NULL, '28/27', NULL, NULL, NULL, '33/31', NULL, NULL, '38/38', NULL),
(34, NULL, NULL, '28/19', NULL, NULL, NULL, '33/24', NULL, NULL, '38/33', NULL),
(35, NULL, NULL, '28/20', NULL, NULL, NULL, '33/27', NULL, NULL, '38/34', NULL),
(36, NULL, NULL, '28/24', NULL, NULL, NULL, '33/24', NULL, NULL, '38/34', NULL),
(37, NULL, NULL, '28/19', NULL, NULL, NULL, '33/24', NULL, NULL, '38/34', NULL),
(38, NULL, NULL, '28/24', NULL, NULL, NULL, '33/27', NULL, NULL, '38/37', NULL),
(39, NULL, NULL, '28/21', NULL, NULL, NULL, '33/25', NULL, NULL, '38/35', NULL),
(40, NULL, NULL, '28/21', NULL, NULL, NULL, '33/20', NULL, NULL, '38/37', NULL),
(41, NULL, NULL, '28/25', NULL, NULL, NULL, '33/31', NULL, NULL, '38/38', NULL),
(42, NULL, NULL, '28/24', NULL, NULL, NULL, '33/26', NULL, NULL, '38/36', NULL),
(43, NULL, NULL, '28/21', NULL, NULL, NULL, '33/23', NULL, NULL, '38/34', NULL),
(44, NULL, NULL, '28/24', NULL, NULL, NULL, '33/30', NULL, NULL, '38/36', NULL),
(45, NULL, NULL, '28/21', NULL, NULL, NULL, '33/22', NULL, NULL, '38/35', NULL),
(46, NULL, NULL, '28/23', NULL, NULL, NULL, '33/26', NULL, NULL, '38/33', NULL),
(47, NULL, NULL, '28/16', NULL, NULL, NULL, '33/21', NULL, NULL, '38/32', NULL),
(48, NULL, NULL, '28/13', NULL, NULL, NULL, '33/21', NULL, NULL, '38/30', NULL),
(49, NULL, NULL, '28/18', NULL, NULL, NULL, '33/24', NULL, NULL, '38/33', NULL),
(50, NULL, NULL, '28/26', NULL, NULL, NULL, '32/27', NULL, NULL, '38/36', NULL),
(51, NULL, NULL, '27/14', NULL, NULL, NULL, '27/16', NULL, NULL, '31/27', NULL),
(52, NULL, NULL, '19/9', NULL, NULL, NULL, '18/15', NULL, NULL, '21/15', NULL);

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
(NULL, '5'),
(17, '6');

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
(1, 'Isha Sharma', 6, 190710204015, 'raghav', 'vill'),
(2, 'Rahul Jamwal', 6, 190710204033, 'Rajendra jamwal', 'vill.Badla po.masyana teh.& distt.hamirpur'),
(3, 'Abhishek Negi', 6, 200710204002, 'Som Dutt', 'vpo maseran teh.sarkaghat distt. mandi'),
(4, 'Abhishek Sharma', 6, 200710204003, 'Ashwani kumar', 'vpo chamned teh. bhoranj'),
(5, 'akshit thakur', 6, 200710204005, 'lal singh', 'vill namhol distt. bilaspur'),
(6, 'Alisha', 6, 200710204006, 'Pawan kumar', 'vill.lahar  po.Dugha teh.& distt hmr'),
(7, 'Anjali', 6, 200710204009, 'Sanjeev kumar', 'vill.amned po.barthin teh.& distt. hmr'),
(8, 'Diksha', 6, 200710204010, 'Balwant rai', 'vill.chatrout po.kanjyan teh. bhoranj distt.hmr'),
(9, 'Diksha Kumari', 6, 200710204011, 'Satish kumar', 'vill.ratehal po.ghumarwin teh.ghumarwin distt. bilaspur'),
(10, 'Gurjeet Kaur', 6, 200710204013, 'Ranbir singh', 'vill.kuthar kalan po.teh.&distt.una'),
(11, 'Harithik Sharma', 6, 200710204014, 'Ashwani sharma', 'vill.mattani po.daruhi distt.hmr'),
(12, 'Harshdeep Singh', 6, 200710204015, 'kuldeep singh', 'vpo.tipnala teh.kundian distt.kangra '),
(13, 'Isha', 6, 200710204016, 'satwant kumar', 'vill.chatrout po.kanjyan teh. bhoranj distt.hmr'),
(14, 'Kartik Sharma', 6, 200710204017, 'Ashwani kumar', 'vpo.kot teh ghumarwin distt.bilaspur'),
(15, 'Kusum Lata', 6, 200710204018, 'Vinod kumar', 'vpo. majhog sultani distt.&teh hmr '),
(16, 'Mohit choudhary', 6, 200710204020, 'jagdish chand ', 'vill.dol po.adhwani teh.jawalamukhi distt.kangra'),
(17, 'Mridula', 6, 200710204021, 'Ravinder kumar', 'vill.lahar po.dugha teh.&distt.hmr'),
(18, 'Nauseen Khurishi', 6, 200710204022, 'Feroj khan', 'vpo.bhojpur bajar 167.8 teh.snr distt.mandi'),
(19, 'Neha Katna', 6, 200710204023, 'Randhir katna', 'vpo.tikkar khatrian teh.tauni devi distt.hmr'),
(20, 'Nishchla Suman', 6, 200710204024, 'Krishan chand', 'vill.derin po.bagwara teh. tauni devi distt.hmr'),
(21, 'Nitish Rangra', 6, 200710204025, 'Dinesh kumar', 'vill.bani po.karara teh.& distt.hmr'),
(22, 'Palak Bhanwal', 6, 200710204026, 'Narender singh', 'vill.takerehar po.sandhol distt.mandi'),
(23, 'Palak Sharma', 6, 200710204027, 'Gagan kumar', 'vill.ser swahal po.mohin distt.hmr'),
(24, 'Payal', 6, 200710204028, 'Rajesh kumar', 'vill.ropa po.karara teh.& distt.hmr'),
(25, 'Priya', 6, 200710204029, 'Sandeep kumar', 'vill.baru po.mohin teh.distt.hmr'),
(26, 'Sahil Chandla', 6, 200710204031, 'Raj kumar', 'vill.sasan masanda po.sanahi teh.nadaun distt.hmr'),
(27, 'Sahil Pathania', 6, 200710204032, 'Ashok kumar ', 'vpo.dimmi teh.tauni devi distt. hmr'),
(28, 'Shailesh Sharma', 6, 200710204033, 'Suresh kumar sharma', 'vpo. ghori po. smaila tehsil balwara distt. mandi'),
(29, 'Shakshi Thakur', 6, 200710204035, 'Dinesh kumar rawat', 'vpo.dhirwin teh. bhoranj.distt.hmr'),
(30, 'Shaurya Rana', 6, 200710204036, 'Ashwani rana', 'vill.shastri nagar po.&teh palampur distt.kangra'),
(31, 'Shivali Sharma', 6, 200710204037, 'Pawan kumar ', 'vill. kasiri  po.chouri teh.sujanpur distt. hmr'),
(32, 'Shivam Sharma', 6, 200710204038, 'suman kumar', 'vill. jhandui po.putrial teh.nadaun distt.hmr'),
(33, 'Shivani Devi', 6, 200710204039, 'Rakesh kumar', 'vill.derin po.bagwara teh. tauni devi distt.hmr'),
(34, 'Sonali Thakur', 6, 200710204041, 'Dharmender thakur', 'vill.bajoura po.bukkar teh.bhoranj distt hamirpur'),
(35, 'Sumna Kumari', 6, 200710204042, 'Kuldeep kumar', 'vill.androli po.chhat teh.ghumarwin distt.bilaspur'),
(36, 'Sweta Sharma', 6, 200710204043, 'suman kumar', 'vpo chamned teh.&distt hamirpur'),
(37, 'Tarun Thakur', 6, 200710204044, 'balbir singh thakur', 'v.p.o.rohalwin teh distt.hamirpur'),
(38, 'Vishvesh Shivam', 6, 200710204046, 'Rajkumar', 'vill.talaoo po.fatehpur distt.mandi'),
(39, 'Yukta', 6, 200710204047, 'shyam lal', 'vill.tarna hill po.mandi teh sadar distt.mandi'),
(40, 'Nitish Sharma', 6, 200730204004, 'Anil kumar', 'vill.nehalwin po.changer teh distt.hamirpur'),
(41, 'Anjali', 6, 210720204001, 'vipan chand', 'vill.balu po.bharthain teh distt.hamirpur'),
(42, 'Riya', 6, 210720204002, 'ranbir singh', 'vill.jhandwin po. ludder mahadev teh.bhoranj distt.hamirpur'),
(43, 'Sachin Kapoor', 6, 210720204003, 'papu ram', 'v.p.o.uhrala teh.baijnath distt.kangra '),
(44, 'Vibhanshu Sharma', 6, 210720204004, 'kamal dutt', 'v.p.o.dhabiri teh.bijhri distt.hamirpur'),
(45, 'Pawan Kumar', 6, 210720204005, 'jeevan lal', 'vill.kotlu teh.tauni devi p.o.thana distt.hamirpur'),
(46, 'Raksha', 6, 210730204003, 'vijay kumar', 'vill.dhagwani p.o.khoudr teh.tihra distt.mandi'),
(47, 'Mahesh Kumar', 6, 210730204004, 'dilip kumar', 'vill.sadwal po.gehra teh baldwara distt mandi'),
(48, 'Harsh Singh Thakur', 6, 210730204005, 'rajinder kumar', 'vill.karhwin,bani khas po.bani teh.barsar distt.hamirpur'),
(49, 'Abhishek Sharma', 6, 210730204006, 'Sanjeev Kumar', 'vill.dakri po'),
(50, 'Komal Sharma', 6, 190710204019, 'santosh kumar', 'vill.badwal po.booni teh.nadaun distt.hamirpur'),
(51, 'Bhanu Pratap Singh', 6, 180710204013, '', ''),
(52, 'Jai Singh', 6, 200730204003, '', ''),
(53, 'Abhay Choudhary ', 4, 210710204001, 'sunil kumar', 'vpo.sehal teh.baijnath distt.kangra'),
(54, 'Abhay sharma', 4, 210710204002, 'Ravi kumar', 'vpo.sudhangal teh.jawalamukhi distt.kangra'),
(55, 'Abhinav sharma', 4, 210710204003, 'Shambhu dutt sharma', 'vpo.karsai teh.barsar distt.hamirpur'),
(56, 'Abhishek sharma', 4, 210710204004, 'Pawan kumar sharma', 'vill.kargu po.badhera teh.nadaun distt.hamirpur'),
(57, 'Aditya khanari ', 4, 210710204005, 'Mangal singh', 'vpo.jikhli beath teh.baijnath distt.kangra'),
(58, 'Aman kumar', 4, 210710204006, 'Dinesh kumar', 'vill.sakander po.tikker khatriyan teh.tauni devi distt.hamirpur'),
(59, 'Anchal sharma', 4, 210710204007, 'Raj kumar ', 'viil.balute po.chamned teh & istt. hamirpur'),
(60, 'Anjali ', 4, 210710204008, 'Sanjeev kumar', 'vill. jhanikkar po.barara teh.bamson tauni devi distt.hamirpur'),
(61, 'Ankita sharma', 4, 210710204009, 'Ashok kumar', 'vill.bhaddu po.khiah teh. & distt. hamirpur'),
(62, 'Apurav Sharma', 4, 210710204011, 'Pawan kumar', 'vill.baleta khurd po.sanahi teh. & distt.hamirpur'),
(63, 'Arpita', 4, 210710204012, 'late. sh. mohinder singh', 'vill.nara po. galore teh.galore distt. hamirpur'),
(64, 'Aryan ', 4, 210710204013, 'Rakesh kumar', 'vill.rawara po.& teh.sandhole distt. mandi'),
(65, 'Devang thakur', 4, 210710204014, 'Prakash chand', 'vill. bhayarda po. chunahan teh.balh distt.mandi'),
(66, 'Isha sharma', 4, 210710204017, 'Naresh kumar', 'vill.alampur po.alampur teh. jaisinghpur distt.kangra'),
(67, 'Kamayani devi', 4, 210710204018, 'Rajan kumar', 'vill.bhol khas po.larath teh.jawali distt.kangra'),
(68, 'Khilesh bharti', 4, 210710204019, 'Hemraj ', 'vill.jaryad po.jachh distt.chachiot distt.mandi'),
(69, 'Mannat thakur', 4, 210710204021, 'Pradeep kumar', 'vill. siharal po.paunta teh.sarkaghat distt. mandi'),
(70, 'Neha kumari', 4, 210710204022, 'Jeevan lal', 'vpo.lamlehri distt.una'),
(71, 'Nikhil garg ', 4, 210710204023, 'Ashwani kumar', 'vill.kehrwin po. Baloh teh.bhoranj distt.hamirpur'),
(72, 'Nikhil moudgil', 4, 210710204024, 'Sunil kumar', 'vpo.kohrda teh.bangana distt.una '),
(73, 'Nikhil sharma', 4, 210710204025, 'Ravinder nath ', 'vill.bhalwani po.bahanwin teh.bhoranj distt.hamirpur'),
(74, 'Nikita sharma', 4, 210710204026, 'Sunil kumar', 'vill.dakohal po.nalti teh.& distt. hamirpur'),
(75, 'Nishant sharma', 4, 210710204027, 'Kamla kumar', 'vill. tropka po.booni teh. & distt.  hmairpur'),
(76, 'Palak ', 4, 210710204028, 'Madan lal', 'vill.sawalwa po.& teh. tauni devi distt. hamirpur'),
(77, 'Parikshit sharma', 4, 210710204029, 'Dinesh kumar', 'opposite civil hospital ghumarwin teh.ghumarwin distt.bilaspur'),
(78, 'Payal', 4, 210710204031, 'Sanjay kumar', 'vill. & po. patlander teh.sujanpur distt. hamirpur'),
(79, 'Payal', 4, 210710204030, 'Raghuvir singh', 'vill.fatehwal po.jakhera teh.& distt. una'),
(80, 'Pooja devi', 4, 210710204032, 'Anil kumar', 'po.longni teh.dharmpur distt.mandi'),
(81, 'Rhaul ', 4, 210710204033, 'Suresh kumar', 'vpo. lag devi teh. tauni devi distt.hamirpur '),
(82, 'Rahul sharma', 4, 210710204034, 'Balak ram', 'vpo.khodra teh.bangana distt.una'),
(83, 'Reetika thakur ', 4, 210710204035, 'chuni lal', 'vpo.tanbol teh.naina devi distt.bilaspur'),
(84, 'Ribhu sharma', 4, 210710204036, 'kuldeep sharma', 'vpo.bhareri distt.hamirpur'),
(85, 'Rishabh kapoor', 4, 210710204037, 'joginder singh', 'vill.rachiyara po.saparu teh.palampur distt.kangra'),
(86, 'Ritik sharma ', 4, 210710204038, 'Shiv kumar', 'vill.sahnwin po. taal teh & distt. hamirpur'),
(87, 'Sapna devi', 4, 210710204040, 'Pawan kumar', 'vill.katoh po.karkwari teh.bhoranj distt. hamirpur'),
(88, 'Shivangi soni ', 4, 210710204041, 'Rajesh soni', 'vpo.bhota teh.barsar distt.hamirpur'),
(89, 'Shivani ', 4, 210710204042, 'Desh raj', 'vill.kakon po.taal distt.& teh. hamirpur'),
(90, 'Shreya banyal', 4, 210710204044, 'Rakesh kumar', 'vill.tella po.choithara teh.sarkaghat distt. mandi'),
(91, 'Sneha rana', 4, 210710204045, 'Rakesh kumar', 'vill.samsai po. paplog teh.sarkaghat distt. mandi'),
(184, 'Amit Sarna', 2, 230710204001, 'amrinder', 'Florida'),
(185, 'Sagar Gada', 2, 230710204002, 'gogi', 'California'),
(186, 'Ricky Marck', 2, 230710204003, 'pankaj', 'Nevada'),
(187, 'Sunita Devgan', 2, 230710204005, 'shivam', 'Colorado'),
(189, 'SCA', 0, 0, '3', '');

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
(1, 'admin', 'admin@gmail.com', 'e6e061838856bf47e1de730719fb2609', 'admin', '8976543210', 'HOD', 'computer', NULL),
(17, 'Vishvesh Shivam', 'vishvesh482003@gmail.com', '84503148d75b3fc42a28bdaec218fc6d', 'classTeacher', '9459331009', 'lecturer', 'computer', '248117'),
(26, 'abhishek Sharma', 'sharma383abhishek@gmail.com', '688ad2062b453cc2d3f23cc0ddb8e568', 'teacher', '7876612192', 'sr. lecturer', 'computer', '486402');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance5thsem`
--
ALTER TABLE `attendance5thsem`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `attendance6thsem`
--
ALTER TABLE `attendance6thsem`
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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
