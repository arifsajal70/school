-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2017 at 10:54 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soft_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE `alert` (
  `alertID` int(11) UNSIGNED NOT NULL,
  `noticeID` int(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `usertype` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendanceID` int(200) UNSIGNED NOT NULL,
  `studentID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `monthyear` varchar(10) NOT NULL,
  `a1` varchar(3) DEFAULT 'A',
  `a2` varchar(3) DEFAULT 'A',
  `a3` varchar(3) DEFAULT 'A',
  `a4` varchar(3) DEFAULT 'A',
  `a5` varchar(3) DEFAULT 'A',
  `a6` varchar(3) DEFAULT 'A',
  `a7` varchar(3) DEFAULT 'A',
  `a8` varchar(3) DEFAULT 'A',
  `a9` varchar(3) DEFAULT 'A',
  `a10` varchar(3) DEFAULT 'A',
  `a11` varchar(3) DEFAULT 'A',
  `a12` varchar(3) DEFAULT 'A',
  `a13` varchar(3) DEFAULT 'A',
  `a14` varchar(3) DEFAULT 'A',
  `a15` varchar(3) DEFAULT 'A',
  `a16` varchar(3) DEFAULT 'A',
  `a17` varchar(3) DEFAULT 'A',
  `a18` varchar(3) DEFAULT 'A',
  `a19` varchar(3) DEFAULT 'A',
  `a20` varchar(3) DEFAULT 'A',
  `a21` varchar(3) DEFAULT 'A',
  `a22` varchar(3) DEFAULT 'A',
  `a23` varchar(3) DEFAULT 'A',
  `a24` varchar(3) DEFAULT 'A',
  `a25` varchar(3) DEFAULT 'A',
  `a26` varchar(3) DEFAULT 'A',
  `a27` varchar(3) DEFAULT 'A',
  `a28` varchar(3) DEFAULT 'A',
  `a29` varchar(3) DEFAULT 'A',
  `a30` varchar(3) DEFAULT 'A',
  `a31` varchar(3) DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendanceID`, `studentID`, `classesID`, `sectionID`, `username`, `usertype`, `monthyear`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`, `a9`, `a10`, `a11`, `a12`, `a13`, `a14`, `a15`, `a16`, `a17`, `a18`, `a19`, `a20`, `a21`, `a22`, `a23`, `a24`, `a25`, `a26`, `a27`, `a28`, `a29`, `a30`, `a31`) VALUES
(3, 4, 4, 8, 'admin', 'Admin', '2017-06', 'A', 'P', 'A', 'A', 'A', 'A', 'A', 'A', 'P', 'A', 'A', 'A', 'P', 'A', 'P', 'P', 'A', 'A', 'A', 'A', 'A', 'A', 'P', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A'),
(4, 3, 4, 8, 'admin', 'Admin', '2017-06', 'P', 'P', 'A', 'A', 'A', 'A', 'A', 'A', 'P', 'A', 'A', 'A', 'P', 'A', 'P', 'P', 'A', 'A', 'A', 'A', 'A', 'A', 'P', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A'),
(5, 4, 4, 8, 'admin', 'Admin', '2017-07', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'P', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A'),
(6, 3, 4, 8, 'admin', 'Admin', '2017-07', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'P', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A'),
(7, 4, 4, 8, 'admin', 'Admin', '2017-02', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'P', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A'),
(8, 3, 4, 8, 'admin', 'Admin', '2017-02', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'P', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `automation_rec`
--

CREATE TABLE `automation_rec` (
  `automation_recID` int(11) UNSIGNED NOT NULL,
  `studentID` int(11) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(3) NOT NULL,
  `month` varchar(3) NOT NULL,
  `year` year(4) NOT NULL,
  `nofmodule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `automation_shudulu`
--

CREATE TABLE `automation_shudulu` (
  `automation_shuduluID` int(11) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `day` varchar(3) NOT NULL,
  `month` varchar(3) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookID` int(11) UNSIGNED NOT NULL,
  `book` varchar(60) NOT NULL,
  `book_code` tinytext NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `due_quantity` int(11) NOT NULL,
  `rack` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookID`, `book`, `book_code`, `author`, `price`, `quantity`, `due_quantity`, `rack`) VALUES
(2, 'Roktakto Prantor', 'UP-0001', 'Jafor Ikbal', 250, 150, 0, '3'),
(3, 'Kobor', 'KB-111101', 'Monir', 120, 500, 0, '50');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) UNSIGNED NOT NULL,
  `hostelID` int(11) NOT NULL,
  `class_type` varchar(60) NOT NULL,
  `hbalance` varchar(20) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `classesID` int(11) UNSIGNED NOT NULL,
  `classes` varchar(60) NOT NULL,
  `classes_numeric` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`classesID`, `classes`, `classes_numeric`, `teacherID`, `note`) VALUES
(4, 'One', 1, 14, ''),
(5, 'Tow', 2, 13, ''),
(6, 'Three', 3, 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `eattendance`
--

CREATE TABLE `eattendance` (
  `eattendanceID` int(200) UNSIGNED NOT NULL,
  `examscheduleID` int(11) NOT NULL,
  `date` date NOT NULL,
  `studentID` int(11) DEFAULT NULL,
  `attendance` varchar(20) DEFAULT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eattendance`
--

INSERT INTO `eattendance` (`eattendanceID`, `examscheduleID`, `date`, `studentID`, `attendance`, `year`) VALUES
(1, 4, '2017-06-18', 3, 'P', 2017),
(2, 4, '2017-06-18', 4, 'P', 2017),
(3, 3, '2017-06-18', 3, 'P', 2017),
(4, 3, '2017-06-18', 4, 'P', 2017),
(5, 5, '2017-07-11', 4, 'P', 2017),
(6, 5, '2017-07-11', 3, 'P', 2017),
(7, 6, '2017-08-13', 4, 'P', 2017),
(8, 6, '2017-08-13', 3, 'P', 2017),
(9, 7, '2017-08-13', 4, 'P', 2017),
(10, 7, '2017-08-13', 3, 'P', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `examID` int(11) UNSIGNED NOT NULL,
  `exam` varchar(60) NOT NULL,
  `date` date NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`examID`, `exam`, `date`, `note`) VALUES
(1, '1st Term', '2017-06-16', 'Dhur Mia Note Nai'),
(2, '2nd Term', '2017-06-17', ''),
(3, '3rd Term', '2017-07-19', 'IS that Note ?');

-- --------------------------------------------------------

--
-- Table structure for table `examschedule`
--

CREATE TABLE `examschedule` (
  `examscheduleID` int(11) UNSIGNED NOT NULL,
  `examID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `edate` date NOT NULL,
  `examfrom` varchar(10) NOT NULL,
  `examto` varchar(10) NOT NULL,
  `room` tinytext,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `examschedule`
--

INSERT INTO `examschedule` (`examscheduleID`, `examID`, `classesID`, `sectionID`, `subjectID`, `edate`, `examfrom`, `examto`, `room`, `year`) VALUES
(3, 1, 4, 8, 2, '2017-06-19', '09:30', '12:30', '30', 2017),
(4, 2, 4, 8, 2, '2017-06-18', '06:31', '09:30', '', 2017),
(5, 3, 4, 8, 2, '2017-09-21', '07:30', '10:00', '250', 2017),
(6, 1, 4, 8, 2, '2017-08-08', '06:35', '07:35', '250', 2017),
(7, 1, 4, 8, 2, '2017-08-14', '06:30', '06:30', '250', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expenseID` int(11) UNSIGNED NOT NULL,
  `create_date` date NOT NULL,
  `date` date NOT NULL,
  `expense` varchar(128) NOT NULL,
  `amount` varchar(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `uname` varchar(60) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `expenseyear` year(4) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `feetype`
--

CREATE TABLE `feetype` (
  `feetypeID` int(11) UNSIGNED NOT NULL,
  `feetype` varchar(60) NOT NULL,
  `amount` int(11) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feetype`
--

INSERT INTO `feetype` (`feetypeID`, `feetype`, `amount`, `note`) VALUES
(1, 'Admission Fee', 3000, 'This is some note');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `gradeID` int(11) UNSIGNED NOT NULL,
  `grade` varchar(60) NOT NULL,
  `point` varchar(11) NOT NULL,
  `gradefrom` int(11) NOT NULL,
  `gradeupto` int(11) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`gradeID`, `grade`, `point`, `gradefrom`, `gradeupto`, `note`) VALUES
(5, 'A+', '5', 80, 100, 'Note'),
(6, 'A', '4', 70, 79, 'This is something'),
(7, 'a-', '3.5', 60, 69, 'Nothinng'),
(8, 'B', '3', 50, 59, ''),
(9, 'C', '2.5', 40, 49, ''),
(10, 'F', '0', 0, 39, '');

-- --------------------------------------------------------

--
-- Table structure for table `hmember`
--

CREATE TABLE `hmember` (
  `hmemberID` int(11) UNSIGNED NOT NULL,
  `hostelID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `hbalance` varchar(20) DEFAULT NULL,
  `hjoindate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `hostelID` int(11) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `htype` varchar(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ini_config`
--

CREATE TABLE `ini_config` (
  `configID` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `config_key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ini_config`
--

INSERT INTO `ini_config` (`configID`, `type`, `config_key`, `value`) VALUES
(1, 'paypal', 'paypal_api_username', ''),
(2, 'paypal', 'paypal_api_password', ''),
(3, 'paypal', 'paypal_api_signature', ''),
(4, 'paypal', 'paypal_email', ''),
(5, 'paypal', 'paypal_demo', ''),
(6, 'stripe', 'stripe_private_key', ''),
(7, 'stripe', 'stripe_public_key', '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceID` int(11) UNSIGNED NOT NULL,
  `classesID` int(11) NOT NULL,
  `classes` varchar(128) NOT NULL,
  `studentID` int(11) NOT NULL,
  `student` varchar(128) NOT NULL,
  `roll` varchar(128) NOT NULL,
  `feetype` varchar(128) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `paidamount` varchar(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `usertype` varchar(20) DEFAULT NULL,
  `uname` varchar(60) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `paymenttype` varchar(128) DEFAULT NULL,
  `date` date NOT NULL,
  `paiddate` date DEFAULT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `issueID` int(11) UNSIGNED NOT NULL,
  `lID` varchar(128) NOT NULL,
  `bookID` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `due_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `fine` varchar(11) DEFAULT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`issueID`, `lID`, `bookID`, `issue_date`, `due_date`, `return_date`, `fine`, `note`) VALUES
(1, '2001', 3, '2017-07-06', '2017-07-19', '2017-07-07', '', ''),
(2, '2001', 2, '2017-07-06', '2017-07-19', '2017-07-07', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lmember`
--

CREATE TABLE `lmember` (
  `lmemberID` int(11) UNSIGNED NOT NULL,
  `lID` varchar(40) NOT NULL,
  `studentID` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `lbalance` varchar(20) DEFAULT NULL,
  `ljoindate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lmember`
--

INSERT INTO `lmember` (`lmemberID`, `lID`, `studentID`, `name`, `email`, `phone`, `lbalance`, `ljoindate`) VALUES
(8, '2001', 3, '', NULL, NULL, '', '2017-07-04'),
(9, '549', 4, '', NULL, NULL, '10', '2017-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `mailandsms`
--

CREATE TABLE `mailandsms` (
  `mailandsmsID` int(11) UNSIGNED NOT NULL,
  `users` varchar(15) NOT NULL,
  `type` varchar(10) NOT NULL,
  `message` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mailandsmstemplate`
--

CREATE TABLE `mailandsmstemplate` (
  `mailandsmstemplateID` int(11) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `user` varchar(15) NOT NULL,
  `type` varchar(10) NOT NULL,
  `template` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mailandsmstemplatetag`
--

CREATE TABLE `mailandsmstemplatetag` (
  `mailandsmstemplatetagID` int(11) UNSIGNED NOT NULL,
  `usersID` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `tagname` varchar(128) NOT NULL,
  `mailandsmstemplatetag_extra` varchar(255) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mailandsmstemplatetag`
--

INSERT INTO `mailandsmstemplatetag` (`mailandsmstemplatetagID`, `usersID`, `name`, `tagname`, `mailandsmstemplatetag_extra`, `create_date`) VALUES
(1, 1, 'student', '[student_name]', NULL, '2015-06-30 17:44:10'),
(2, 1, 'student', '[student_class]', NULL, '2015-06-30 17:43:56'),
(3, 1, 'student', '[student_roll]', NULL, '2015-06-30 17:44:21'),
(4, 1, 'student', '[student_dob]', NULL, '2015-06-30 17:45:24'),
(5, 1, 'student', '[student_gender]', NULL, '2015-06-30 17:47:01'),
(6, 1, 'student', '[student_religion]', NULL, '2015-06-30 17:47:01'),
(7, 1, 'student', '[student_email]', NULL, '2015-06-30 17:47:40'),
(8, 1, 'student', '[student_phone]', NULL, '2015-06-30 17:47:40'),
(9, 1, 'student', '[student_section]', NULL, '2015-06-30 17:48:47'),
(10, 1, 'student', '[student_username]', NULL, '2015-06-30 17:48:47'),
(11, 2, 'parents', '[guardian_name]', NULL, '2015-07-06 09:09:16'),
(12, 2, 'parents', '[father\'s_name]', NULL, '2015-07-06 09:11:42'),
(13, 2, 'parents', '[mother\'s_name]', NULL, '2015-07-06 09:11:42'),
(14, 2, 'parents', '[father\'s_profession]', NULL, '2015-07-06 09:14:32'),
(15, 2, 'parents', '[mother\'s_profession]', NULL, '2015-07-06 09:14:32'),
(16, 2, 'parents', '[parents_email]', NULL, '2015-07-06 09:20:37'),
(17, 2, 'parents', '[parents_phone]', NULL, '2015-07-06 09:20:44'),
(18, 2, 'parents', '[parents_address]', NULL, '2015-07-06 09:20:53'),
(19, 2, 'parents', '[parents_username]', NULL, '2015-07-06 09:21:00'),
(20, 3, 'teacher', '[teacher_name]\r\n', NULL, '2015-07-06 09:41:13'),
(21, 3, 'teacher', '[teacher_designation]', NULL, '2015-07-06 09:41:13'),
(22, 3, 'teacher', '[teacher_dob]', NULL, '2015-07-06 09:41:13'),
(23, 3, 'teacher', '[teacher_gender]', NULL, '2015-07-06 09:41:13'),
(24, 3, 'teacher', '[teacher_religion]', NULL, '2015-07-06 09:41:13'),
(25, 3, 'teacher', '[teacher_email]', NULL, '2015-07-06 09:41:13'),
(26, 3, 'teacher', '[teacher_phone]\r\n', NULL, '2015-07-06 09:41:13'),
(27, 3, 'teacher', '[teacher_address]', NULL, '2015-07-06 09:41:13'),
(28, 3, 'teacher', '[teacher_jod]', NULL, '2015-07-06 11:25:07'),
(29, 3, 'teacher', '[teacher_username]', NULL, '2015-07-06 09:41:13'),
(30, 4, 'librarian', '[librarian_name]', NULL, '2015-07-06 10:05:44'),
(31, 4, 'librarian', '[librarian_dob]', NULL, '2015-07-06 10:05:48'),
(32, 4, 'librarian', '[librarian_gender]', NULL, '2015-07-06 10:05:52'),
(33, 4, 'librarian', '[librarian_religion]', NULL, '2015-07-06 10:05:55'),
(34, 4, 'librarian', '[librarian_email]', NULL, '2015-07-06 10:05:59'),
(35, 4, 'librarian', '[librarian_phone]', NULL, '2015-07-06 10:06:20'),
(36, 4, 'librarian', '[librarian_address]', NULL, '2015-07-06 10:06:27'),
(37, 4, 'librarian', '[librarian_jod]', NULL, '2015-07-06 11:25:17'),
(38, 4, 'librarian', '[librarian_username]', NULL, '2015-07-06 10:06:36'),
(39, 5, 'accountant', '[accountant_name]', NULL, '2015-07-06 10:06:59'),
(40, 5, 'accountant', '[accountant_dob]', NULL, '2015-07-06 10:07:02'),
(41, 5, 'accountant', '[accountant_gender]', NULL, '2015-07-06 10:07:04'),
(42, 5, 'accountant', '[accountant_religion]', NULL, '2015-07-06 10:07:07'),
(43, 5, 'accountant', '[accountant_email]', NULL, '2015-07-06 10:07:10'),
(44, 5, 'accountant', '[accountant_phone]', NULL, '2015-07-06 10:07:13'),
(45, 5, 'accountant', '[accountant_address]', NULL, '2015-07-06 10:07:15'),
(46, 5, 'accountant', '[accountant_jod]', NULL, '2015-07-06 11:25:24'),
(47, 5, 'accountant', '[accountant_username]', NULL, '2015-07-06 10:07:21'),
(48, 1, 'student', '[student_result_table]', NULL, '2015-09-08 03:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `markID` int(200) UNSIGNED NOT NULL,
  `examID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `mark` int(11) DEFAULT '0',
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`markID`, `examID`, `studentID`, `classesID`, `sectionID`, `subjectID`, `mark`, `year`) VALUES
(9, 1, 3, 4, 8, 2, 60, 2017),
(10, 1, 4, 4, 8, 2, 100, 2017),
(11, 1, 3, 4, 8, 1, 70, 2017),
(12, 1, 4, 4, 8, 1, 55, 2017),
(13, 2, 3, 4, 8, 2, 90, 2017),
(14, 2, 4, 4, 8, 2, 33, 2017),
(15, 1, 3, 4, 8, 4, 90, 2017),
(16, 1, 4, 4, 8, 4, 40, 2017),
(17, 1, 3, 4, 8, 5, 100, 2017),
(18, 1, 4, 4, 8, 5, 100, 2017),
(19, 1, 3, 4, 8, 6, 45, 2017),
(20, 1, 4, 4, 8, 6, 30, 2017),
(21, 1, 3, 4, 8, 3, 90, 2017),
(22, 1, 4, 4, 8, 3, 30, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `mediaID` int(11) UNSIGNED NOT NULL,
  `userID` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `mcategoryID` int(11) NOT NULL DEFAULT '0',
  `file_name` varchar(255) NOT NULL,
  `file_name_display` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `media_category`
--

CREATE TABLE `media_category` (
  `mcategoryID` int(11) UNSIGNED NOT NULL,
  `userID` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `folder_name` varchar(255) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `media_share`
--

CREATE TABLE `media_share` (
  `shareID` int(11) UNSIGNED NOT NULL,
  `classesID` int(11) NOT NULL,
  `public` int(11) NOT NULL,
  `file_or_folder` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `messageID` int(11) UNSIGNED NOT NULL,
  `email` varchar(128) NOT NULL,
  `receiverID` int(11) NOT NULL,
  `receiverType` varchar(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `attach` text,
  `attach_file_name` text,
  `userID` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `useremail` varchar(40) NOT NULL,
  `year` year(4) NOT NULL,
  `date` date NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `read_status` tinyint(1) NOT NULL,
  `from_status` int(11) NOT NULL,
  `to_status` int(11) NOT NULL,
  `fav_status` tinyint(1) NOT NULL,
  `fav_status_sent` tinyint(1) NOT NULL,
  `reply_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(46);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `noticeID` int(11) UNSIGNED NOT NULL,
  `title` varchar(128) NOT NULL,
  `notice` text NOT NULL,
  `year` year(4) NOT NULL,
  `date` date NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parentID` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `father_name` varchar(60) NOT NULL,
  `mother_name` varchar(60) NOT NULL,
  `father_profession` varchar(40) NOT NULL,
  `mother_profession` varchar(40) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `address` text,
  `photo` varchar(200) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `status` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parentID`, `name`, `father_name`, `mother_name`, `father_profession`, `mother_profession`, `email`, `phone`, `address`, `photo`, `username`, `password`, `status`, `usertype`) VALUES
(2, 'Arafat Hossain', 'Kala Mia', 'Bibi something', 'Farmer', 'House wife', 'arafathossain@gamil.com', '01716124280', 'House 08 Road 03 Bochila Mohammadour', '1496264945MeTfwL6kcIJnqRF53OKa.png', 'arafat', 'a5ca124e0e76a9160a7796ad7573f51da5418e33a7ea243a17409eb2dd94544f6eff07523d48f8b3dd65bdda4a69709c7a4f152af5f3a820384a8842c26666ce', 1, 'Parents'),
(3, 'Farida Begum', 'Imam Hossain', 'Helena Begum', 'Jobholder', 'House wife', 'faridabegum@gmail.com', '01623598671', 'House 08 Road 03 Bochila Mohammadour', '', 'farida', 'a5ca124e0e76a9160a7796ad7573f51da5418e33a7ea243a17409eb2dd94544f6eff07523d48f8b3dd65bdda4a69709c7a4f152af5f3a820384a8842c26666ce', 1, 'Parents');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) UNSIGNED NOT NULL,
  `invoiceID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `paymentamount` varchar(20) NOT NULL,
  `paymenttype` varchar(128) NOT NULL,
  `paymentdate` date NOT NULL,
  `paymentmonth` varchar(10) NOT NULL,
  `paymentyear` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `promotionsubject`
--

CREATE TABLE `promotionsubject` (
  `promotionSubjectID` int(11) UNSIGNED NOT NULL,
  `classesID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `subjectCode` tinytext NOT NULL,
  `subjectMark` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reply_msg`
--

CREATE TABLE `reply_msg` (
  `replyID` int(11) UNSIGNED NOT NULL,
  `messageID` int(11) NOT NULL,
  `reply_msg` text NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reset`
--

CREATE TABLE `reset` (
  `resetID` int(11) UNSIGNED NOT NULL,
  `keyID` varchar(128) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE `routine` (
  `routineID` int(11) UNSIGNED NOT NULL,
  `classesID` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `day` varchar(60) NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `room` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `routine`
--

INSERT INTO `routine` (`routineID`, `classesID`, `sectionID`, `subjectID`, `day`, `start_time`, `end_time`, `room`) VALUES
(13, 4, 8, 3, 'SUNDAY', '07:30', '08:00', '125'),
(15, 4, 8, 2, 'SUNDAY', '07:00', '07:30', '125'),
(16, 4, 8, 4, 'TUESDAY', '07:30', '07:30', '105');

-- --------------------------------------------------------

--
-- Table structure for table `school_sessions`
--

CREATE TABLE `school_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school_sessions`
--

INSERT INTO `school_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('2087baa39f3429c6d2a85ee315dd2a7b', '0.0.0.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 UBrowser/6.0.1308.1003 S', 1493849536, 'a:8:{s:9:\"user_data\";s:0:\"\";s:4:\"name\";s:12:\"Ariful Islam\";s:5:\"email\";s:26:\"sajalarifulislam@gmail.com\";s:8:\"usertype\";s:5:\"Admin\";s:8:\"username\";s:5:\"admin\";s:5:\"photo\";s:8:\"site.png\";s:4:\"lang\";s:7:\"bengali\";s:8:\"loggedin\";b:1;}'),
('362c1a086a715076e89bc5fad75f36e8', '0.0.0.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 UBrowser/6.0.1308.1003 S', 1493721642, 'a:8:{s:9:\"user_data\";s:0:\"\";s:4:\"name\";s:12:\"Ariful Islam\";s:5:\"email\";s:26:\"sajalarifulislam@gmail.com\";s:8:\"usertype\";s:5:\"Admin\";s:8:\"username\";s:5:\"admin\";s:5:\"photo\";s:8:\"site.png\";s:4:\"lang\";s:7:\"english\";s:8:\"loggedin\";b:1;}'),
('783243f19da47eaccd662d121b0b265e', '0.0.0.0', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:38.0) Gecko/20100101 Firefox/38.0', 1561580923, 'a:8:{s:9:\"user_data\";s:0:\"\";s:4:\"name\";s:5:\"Dipok\";s:5:\"email\";s:16:\"info@inilabs.net\";s:8:\"usertype\";s:5:\"Admin\";s:8:\"username\";s:5:\"admin\";s:5:\"photo\";s:8:\"site.png\";s:4:\"lang\";s:7:\"english\";s:8:\"loggedin\";b:1;}'),
('c64c42ddfa9774dabebcfaeb26100942', '0.0.0.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 UBrowser/6.0.1308.1003 S', 1493745808, 'a:8:{s:9:\"user_data\";s:0:\"\";s:4:\"name\";s:12:\"Ariful Islam\";s:5:\"email\";s:26:\"sajalarifulislam@gmail.com\";s:8:\"usertype\";s:5:\"Admin\";s:8:\"username\";s:5:\"admin\";s:5:\"photo\";s:8:\"site.png\";s:4:\"lang\";s:7:\"english\";s:8:\"loggedin\";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sectionID` int(11) UNSIGNED NOT NULL,
  `section` varchar(60) NOT NULL,
  `classesID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sectionID`, `section`, `classesID`, `teacherID`, `note`) VALUES
(8, 'A', 4, 14, 'This is note'),
(9, 'B', 4, 14, ''),
(10, 'A', 5, 13, ''),
(11, 'B', 5, 13, ''),
(12, 'A', 6, 12, ''),
(13, 'B', 6, 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `settingID` int(11) UNSIGNED NOT NULL,
  `sname` text,
  `name` varchar(60) DEFAULT NULL,
  `phone` tinytext,
  `address` text,
  `email` varchar(40) DEFAULT NULL,
  `automation` int(11) DEFAULT NULL,
  `currency_code` varchar(11) DEFAULT NULL,
  `currency_symbol` text,
  `footer` text,
  `photo` varchar(128) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `usertype` varchar(128) DEFAULT NULL,
  `purchase_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`settingID`, `sname`, `name`, `phone`, `address`, `email`, `automation`, `currency_code`, `currency_symbol`, `footer`, `photo`, `username`, `password`, `status`, `usertype`, `purchase_code`) VALUES
(1, 'Test School', 'Ariful Islam', '1954465596', 'House 08 Road 03 Bochila Mohammadour', 'sajalarifulislam@gmail.com', 5, 'BDT', 'TK', NULL, 'site.png', 'admin', '927128455075130109d815346b288352e667928f06f96010d9e8e02075514f71663048594d92a26aab0b8e417508e1593bc60a339916416ff5eb5bce54f40ead', 1, 'Admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `smssettings`
--

CREATE TABLE `smssettings` (
  `smssettingsID` int(11) UNSIGNED NOT NULL,
  `types` varchar(255) DEFAULT NULL,
  `field_names` varchar(255) DEFAULT NULL,
  `field_values` varchar(255) DEFAULT NULL,
  `smssettings_extra` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `smssettings`
--

INSERT INTO `smssettings` (`smssettingsID`, `types`, `field_names`, `field_values`, `smssettings_extra`) VALUES
(1, 'clickatell', 'clickatell_username', '', NULL),
(2, 'clickatell', 'clickatell_password', '', NULL),
(3, 'clickatell', 'clickatell_api_key', '', NULL),
(4, 'twilio', 'twilio_accountSID', '', NULL),
(5, 'twilio', 'twilio_authtoken', '', NULL),
(6, 'twilio', 'twilio_fromnumber', '', NULL),
(7, 'bulk', 'bulk_username', '', NULL),
(8, 'bulk', 'bulk_password', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `religion` varchar(25) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `address` text,
  `classesID` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `roll` tinytext NOT NULL,
  `library` int(11) NOT NULL,
  `hostel` int(11) NOT NULL,
  `transport` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `totalamount` varchar(128) DEFAULT NULL,
  `paidamount` varchar(128) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `parentID` int(11) NOT NULL,
  `year` year(4) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `status` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `name`, `dob`, `sex`, `religion`, `email`, `phone`, `address`, `classesID`, `sectionID`, `roll`, `library`, `hostel`, `transport`, `create_date`, `totalamount`, `paidamount`, `photo`, `parentID`, `year`, `username`, `password`, `status`, `usertype`) VALUES
(3, 'Asraful Islam Kajol', '1998-01-07', 'Male', 'Muslim', 'kajol1515@gmail.com', '01971230239', 'House 08 Road 03 Bochila Mohammadour', 4, 8, '11', 1, 0, 0, '0000-00-00', NULL, NULL, '1499714566ZNs6VEQanLg37Wlx2Uvu.png', 3, NULL, 'kajol', 'ba91269d30108eec466906ca20c8d4b64c7ea55c55017c3d2a012aa2a970ca3139872eb83ce16102986b6bc37bc0ea0027531123551c9bf5a818ce709286c912', 1, 'Student'),
(4, 'Ariful Islam Sajal', '1995-02-27', 'Male', 'Muslim', 'sajalarifulislam@gmail.com', '01954465596', 'House 08 Road 03 Bochila Mohammadopur', 4, 8, '10', 1, 0, 0, '0000-00-00', NULL, NULL, 'SadeemPC_com.txt', 2, NULL, 'sajal', 'a5ca124e0e76a9160a7796ad7573f51da5418e33a7ea243a17409eb2dd94544f6eff07523d48f8b3dd65bdda4a69709c7a4f152af5f3a820384a8842c26666ce', 1, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectID` int(11) UNSIGNED NOT NULL,
  `classesID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `subject_author` varchar(100) DEFAULT NULL,
  `subject_code` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectID`, `classesID`, `teacherID`, `subject`, `subject_author`, `subject_code`) VALUES
(1, 5, 14, 'Bangla Part-2', 'dhur mia', 'sa56d'),
(2, 4, 12, 'Bangla', 'Dont know', 'df4sdf'),
(3, 4, 14, 'English', 'AMi jani na', 'dfd4d5dsf'),
(4, 4, 12, 'Math', 'Jani na', 'M-1201'),
(5, 4, 12, 'Chemistry', 'Dont know', 'C-2001'),
(6, 4, 12, 'Physics', 'Dhur Mia', '54165');

-- --------------------------------------------------------

--
-- Table structure for table `tattendance`
--

CREATE TABLE `tattendance` (
  `tattendanceID` int(200) UNSIGNED NOT NULL,
  `teacherID` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `monthyear` varchar(10) NOT NULL,
  `a1` varchar(3) DEFAULT NULL,
  `a2` varchar(3) DEFAULT NULL,
  `a3` varchar(3) DEFAULT NULL,
  `a4` varchar(3) DEFAULT NULL,
  `a5` varchar(3) DEFAULT NULL,
  `a6` varchar(3) DEFAULT NULL,
  `a7` varchar(3) DEFAULT NULL,
  `a8` varchar(3) DEFAULT NULL,
  `a9` varchar(3) DEFAULT NULL,
  `a10` varchar(3) DEFAULT NULL,
  `a11` varchar(3) DEFAULT NULL,
  `a12` varchar(3) DEFAULT NULL,
  `a13` varchar(3) DEFAULT NULL,
  `a14` varchar(3) DEFAULT NULL,
  `a15` varchar(3) DEFAULT NULL,
  `a16` varchar(3) DEFAULT NULL,
  `a17` varchar(3) DEFAULT NULL,
  `a18` varchar(3) DEFAULT NULL,
  `a19` varchar(3) DEFAULT NULL,
  `a20` varchar(3) DEFAULT NULL,
  `a21` varchar(3) DEFAULT NULL,
  `a22` varchar(3) DEFAULT NULL,
  `a23` varchar(3) DEFAULT NULL,
  `a24` varchar(3) DEFAULT NULL,
  `a25` varchar(3) DEFAULT NULL,
  `a26` varchar(3) DEFAULT NULL,
  `a27` varchar(3) DEFAULT NULL,
  `a28` varchar(3) DEFAULT NULL,
  `a29` varchar(3) DEFAULT NULL,
  `a30` varchar(3) DEFAULT NULL,
  `a31` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacherID` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `designation` varchar(128) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `religion` varchar(25) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `address` text,
  `doj` date NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `status` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherID`, `name`, `designation`, `dob`, `sex`, `religion`, `email`, `phone`, `address`, `doj`, `photo`, `username`, `password`, `status`, `usertype`) VALUES
(12, 'Nur Hossain', 'Assistant Teacher', '1984-02-16', 'Male', 'Muslim', 'nurhossain@gmail.com', '01754213592', 'Kollan Pur Housing society and smoomething else', '2017-04-20', '1499799579IPKHRsZ8279amlODck1r.png', 'nurhossain', 'b38f0a57e95eedf458aa9c9ccd7ed4028d5ce968b2a8aad071c11fb3ba5eee98e63b4f03063e11c0605f34c15bc1b741627e6458522da0b8f8bd9d6cd2f99375', 1, 'Teacher'),
(13, 'Haradhon Chokroborti', 'Assistant Teacher', '1985-07-23', 'Male', 'Hindu', 'haradhon@gmail.com', '01765243952', 'Kotbari moddho para mosjid songlogno', '2017-04-10', '', 'haradhon', '59ea74512ffa5dce85022d246c15652ade77da27fec929202f6ff62fea28a85e31f04693694868e344574b78ba178f8317a3fb3d8e82fab1726b9cc5d5167a6e', 1, 'Teacher'),
(14, 'Basonti Chatarjee', 'Assistant Teacher', '1989-03-16', 'Female', 'Hindu', 'basonti@gmail.com', '01632865901', 'amin bazar ar baki ta jani na', '2017-04-08', '1499722788zV75RDPpfmXgLbtyslYx.png', 'basonti', '91a817485b8e9f125a5853ea1fb2dcd934767d27eaeb4be793a65e482837c971daae9934e4646c5ed38384f17886e06f69d9ec95a012ba5cfec4093dd9e428e2', 1, 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `tmember`
--

CREATE TABLE `tmember` (
  `tmemberID` int(11) UNSIGNED NOT NULL,
  `studentID` int(11) NOT NULL,
  `transportID` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `tbalance` varchar(11) DEFAULT NULL,
  `tjoindate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `transportID` int(11) UNSIGNED NOT NULL,
  `route` text NOT NULL,
  `vehicle` int(11) NOT NULL,
  `fare` varchar(11) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `religion` varchar(25) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `address` text,
  `doj` date NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `status` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `name`, `dob`, `sex`, `religion`, `email`, `phone`, `address`, `doj`, `photo`, `username`, `password`, `status`, `usertype`) VALUES
(3, 'Ariful Islam Sajal', '2017-06-11', 'Male', 'Muslim', 'sajalarifulislams@gmail.com', '1954465596', 'House 08 Road 03 Bochila Mohammadour', '2017-06-11', '1497124632IPrluUYFiedf0zyLE6Vv.png', 'roots', 'c324d0a83612fe2d5f9d51271a7389bdca6043748342b46d5afa730471ef61c0bf10b0ff8af4c3026b1cc6a368dcaa724a48846ed56c5dd56e01a40c99c9353e', 1, 'Admin'),
(4, 'Ariful Islam', '1995-02-27', 'Male', 'Islam', 'arifulislamsajal1109@gmail.com', '01954465596', 'House 08 Road 03 Bochila Mohammadour', '2017-06-27', '1498726398wqv2HBnkbMo6DjmzGI5f.png', 'sajals', 'a5ca124e0e76a9160a7796ad7573f51da5418e33a7ea243a17409eb2dd94544f6eff07523d48f8b3dd65bdda4a69709c7a4f152af5f3a820384a8842c26666ce', 1, 'Admin'),
(6, 'Howard T. Maldonado', '2017-06-12', 'Male', 'Hindu', 'kamrulkir@gmail.com', '8086568199', 'House 08 Road 03 Bochila Mohammadour', '2017-06-13', '1498731805dvq8MDl3Q0SyfpahHYbJ.jpg', 'sajalss', 'a5ca124e0e76a9160a7796ad7573f51da5418e33a7ea243a17409eb2dd94544f6eff07523d48f8b3dd65bdda4a69709c7a4f152af5f3a820384a8842c26666ce', 1, 'Accountant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`alertID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendanceID`);

--
-- Indexes for table `automation_rec`
--
ALTER TABLE `automation_rec`
  ADD PRIMARY KEY (`automation_recID`);

--
-- Indexes for table `automation_shudulu`
--
ALTER TABLE `automation_shudulu`
  ADD PRIMARY KEY (`automation_shuduluID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`classesID`);

--
-- Indexes for table `eattendance`
--
ALTER TABLE `eattendance`
  ADD PRIMARY KEY (`eattendanceID`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`examID`);

--
-- Indexes for table `examschedule`
--
ALTER TABLE `examschedule`
  ADD PRIMARY KEY (`examscheduleID`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expenseID`);

--
-- Indexes for table `feetype`
--
ALTER TABLE `feetype`
  ADD PRIMARY KEY (`feetypeID`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`gradeID`);

--
-- Indexes for table `hmember`
--
ALTER TABLE `hmember`
  ADD PRIMARY KEY (`hmemberID`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`hostelID`);

--
-- Indexes for table `ini_config`
--
ALTER TABLE `ini_config`
  ADD PRIMARY KEY (`configID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceID`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`issueID`);

--
-- Indexes for table `lmember`
--
ALTER TABLE `lmember`
  ADD PRIMARY KEY (`lmemberID`);

--
-- Indexes for table `mailandsms`
--
ALTER TABLE `mailandsms`
  ADD PRIMARY KEY (`mailandsmsID`);

--
-- Indexes for table `mailandsmstemplate`
--
ALTER TABLE `mailandsmstemplate`
  ADD PRIMARY KEY (`mailandsmstemplateID`);

--
-- Indexes for table `mailandsmstemplatetag`
--
ALTER TABLE `mailandsmstemplatetag`
  ADD PRIMARY KEY (`mailandsmstemplatetagID`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`markID`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`mediaID`);

--
-- Indexes for table `media_category`
--
ALTER TABLE `media_category`
  ADD PRIMARY KEY (`mcategoryID`);

--
-- Indexes for table `media_share`
--
ALTER TABLE `media_share`
  ADD PRIMARY KEY (`shareID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageID`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`noticeID`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parentID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `promotionsubject`
--
ALTER TABLE `promotionsubject`
  ADD PRIMARY KEY (`promotionSubjectID`);

--
-- Indexes for table `reply_msg`
--
ALTER TABLE `reply_msg`
  ADD PRIMARY KEY (`replyID`);

--
-- Indexes for table `reset`
--
ALTER TABLE `reset`
  ADD PRIMARY KEY (`resetID`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`routineID`);

--
-- Indexes for table `school_sessions`
--
ALTER TABLE `school_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sectionID`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`settingID`);

--
-- Indexes for table `smssettings`
--
ALTER TABLE `smssettings`
  ADD PRIMARY KEY (`smssettingsID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectID`);

--
-- Indexes for table `tattendance`
--
ALTER TABLE `tattendance`
  ADD PRIMARY KEY (`tattendanceID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherID`);

--
-- Indexes for table `tmember`
--
ALTER TABLE `tmember`
  ADD PRIMARY KEY (`tmemberID`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`transportID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alert`
--
ALTER TABLE `alert`
  MODIFY `alertID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendanceID` int(200) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `automation_rec`
--
ALTER TABLE `automation_rec`
  MODIFY `automation_recID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `automation_shudulu`
--
ALTER TABLE `automation_shudulu`
  MODIFY `automation_shuduluID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `classesID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `eattendance`
--
ALTER TABLE `eattendance`
  MODIFY `eattendanceID` int(200) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `examID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `examschedule`
--
ALTER TABLE `examschedule`
  MODIFY `examscheduleID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expenseID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feetype`
--
ALTER TABLE `feetype`
  MODIFY `feetypeID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `gradeID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hmember`
--
ALTER TABLE `hmember`
  MODIFY `hmemberID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hostel`
--
ALTER TABLE `hostel`
  MODIFY `hostelID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ini_config`
--
ALTER TABLE `ini_config`
  MODIFY `configID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `issueID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lmember`
--
ALTER TABLE `lmember`
  MODIFY `lmemberID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `mailandsms`
--
ALTER TABLE `mailandsms`
  MODIFY `mailandsmsID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mailandsmstemplate`
--
ALTER TABLE `mailandsmstemplate`
  MODIFY `mailandsmstemplateID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mailandsmstemplatetag`
--
ALTER TABLE `mailandsmstemplatetag`
  MODIFY `mailandsmstemplatetagID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `markID` int(200) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `mediaID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `media_category`
--
ALTER TABLE `media_category`
  MODIFY `mcategoryID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `media_share`
--
ALTER TABLE `media_share`
  MODIFY `shareID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `noticeID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parentID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `promotionsubject`
--
ALTER TABLE `promotionsubject`
  MODIFY `promotionSubjectID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reply_msg`
--
ALTER TABLE `reply_msg`
  MODIFY `replyID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reset`
--
ALTER TABLE `reset`
  MODIFY `resetID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `routineID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sectionID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `settingID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `smssettings`
--
ALTER TABLE `smssettings`
  MODIFY `smssettingsID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subjectID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tattendance`
--
ALTER TABLE `tattendance`
  MODIFY `tattendanceID` int(200) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacherID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tmember`
--
ALTER TABLE `tmember`
  MODIFY `tmemberID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `transportID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
