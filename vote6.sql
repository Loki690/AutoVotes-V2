-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2017 at 10:13 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vote4`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `accesscode` varchar(15) NOT NULL,
  `x` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `last_name`, `first_name`, `middle_name`, `accesscode`, `x`) VALUES
(4, 'Estoque', 'Fernand John', 'Puno', 'fer', 'active'),
(5, 'Soliman', 'Samuel', 'Ligue', 'sam', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE IF NOT EXISTS `applicants` (
  `applicant_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `election_id` int(11) NOT NULL,
  `date_filed` date NOT NULL,
  `position_id` int(11) NOT NULL,
  `party_id` int(11) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `middle_name` varchar(25) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` varchar(3) NOT NULL,
  `date_birth` date NOT NULL,
  `place_birth` varchar(150) NOT NULL,
  `height` varchar(12) NOT NULL,
  `weight` varchar(12) NOT NULL,
  `home_add` varchar(150) NOT NULL,
  `status` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `language` varchar(100) NOT NULL,
  `citizenship` varchar(50) NOT NULL,
  `contact_num` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `spouse_name` varchar(50) NOT NULL,
  `spouse_add` varchar(150) NOT NULL,
  `num_child` varchar(3) NOT NULL,
  `tertiary_lev` varchar(120) NOT NULL,
  `course` varchar(50) NOT NULL,
  `year_lev` varchar(25) NOT NULL,
  `major` varchar(50) NOT NULL,
  `second_lev` varchar(120) NOT NULL,
  `secondary_grad` date NOT NULL,
  `elementary` varchar(120) NOT NULL,
  `elementary_grad` date NOT NULL,
  `achievements` varchar(150) NOT NULL,
  `organization` varchar(150) NOT NULL,
  `requirements` varchar(200) NOT NULL,
  `application_status` enum('initial','for_interview','final','denied') NOT NULL DEFAULT 'initial',
  `x` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`applicant_id`, `student_id`, `election_id`, `date_filed`, `position_id`, `party_id`, `last_name`, `first_name`, `middle_name`, `gender`, `age`, `date_birth`, `place_birth`, `height`, `weight`, `home_add`, `status`, `religion`, `language`, `citizenship`, `contact_num`, `email`, `spouse_name`, `spouse_add`, `num_child`, `tertiary_lev`, `course`, `year_lev`, `major`, `second_lev`, `secondary_grad`, `elementary`, `elementary_grad`, `achievements`, `organization`, `requirements`, `application_status`, `x`) VALUES
(27, 24, 1, '2017-12-17', 11, 1, 'Estoque', 'Fernand John', 'Puno', 'Male', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1,2', 'final', 'active'),
(28, 18, 1, '2017-12-17', 11, 2, 'Camarillo', 'Danica Jane', 'Hilado', 'Female', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1,2', 'final', 'active'),
(29, 17, 1, '2017-12-17', 14, 1, 'Saavedra', 'Yaser', 'Gandawali', 'Male', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1,2', 'final', 'active'),
(30, 26, 1, '2017-12-17', 14, 1, 'Soliman', 'Samuel', 'Ligue', 'Male', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1,2', 'final', 'active'),
(31, 25, 1, '2017-12-17', 14, 2, 'Lasaca', 'Jeffson', 'Darunday', 'Male', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1,2', 'final', 'active'),
(32, 23, 1, '2017-12-17', 14, 2, 'Sembrano', 'Adolfo', 'A.', 'Male', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1,2', 'final', 'active'),
(33, 22, 1, '2017-12-17', 14, 1, 'Delmar', 'Vince Michael', 'M.', 'Male', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1,2', 'final', 'active'),
(34, 21, 1, '2017-12-17', 14, 2, 'Bernabe', 'Redjhon', 'Gil', 'Male', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1,2', 'final', 'active'),
(35, 20, 1, '2017-12-17', 14, 1, 'Uyanguren', 'Gabriel', 'K.', 'Male', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1,2', 'final', 'active'),
(36, 19, 1, '2017-12-17', 14, 1, 'Simbajon', 'Kristian', 'D.', 'Male', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1,2', 'final', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_logs`
--

CREATE TABLE IF NOT EXISTS `applicant_logs` (
  `applicant_log_id` int(50) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `application_status` enum('initial','for_interview','final','denied') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant_logs`
--

INSERT INTO `applicant_logs` (`applicant_log_id`, `applicant_id`, `note`, `application_status`, `timestamp`) VALUES
(1, 1, 'applied', 'initial', '2017-10-24 00:23:39'),
(2, 2, 'applied', 'initial', '2017-10-24 00:24:22'),
(3, 1, 'interview', 'for_interview', '2017-10-24 00:38:43'),
(4, 1, 'good', 'final', '2017-10-24 00:41:08'),
(5, 3, 'applied', 'initial', '2017-10-24 00:45:06'),
(6, 3, 'interview', 'for_interview', '2017-10-24 00:45:38'),
(7, 3, 'good', 'final', '2017-10-24 00:46:00'),
(8, 2, 'interview', 'for_interview', '2017-12-10 02:21:17'),
(9, 4, 'applied', 'initial', '2017-12-15 13:12:54'),
(10, 4, 'interview', 'for_interview', '2017-12-15 13:14:49'),
(11, 5, 'applied', 'initial', '2017-12-17 00:10:35'),
(12, 6, 'applied', 'initial', '2017-12-17 00:11:32'),
(13, 7, 'applied', 'initial', '2017-12-17 00:12:22'),
(14, 8, 'applied', 'initial', '2017-12-17 00:13:36'),
(15, 9, 'applied', 'initial', '2017-12-17 00:14:30'),
(16, 10, 'applied', 'initial', '2017-12-17 00:15:26'),
(17, 11, 'applied', 'initial', '2017-12-17 00:16:15'),
(18, 12, 'applied', 'initial', '2017-12-17 00:16:51'),
(19, 13, 'applied', 'initial', '2017-12-17 00:17:44'),
(20, 14, 'applied', 'initial', '2017-12-17 00:18:25'),
(21, 5, 'interview', 'for_interview', '2017-12-17 00:21:27'),
(22, 15, 'applied', 'initial', '2017-12-17 02:21:20'),
(23, 16, 'applied', 'initial', '2017-12-17 02:22:27'),
(24, 15, 'interview', 'for_interview', '2017-12-17 02:24:53'),
(25, 16, 'interview', 'for_interview', '2017-12-17 02:25:05'),
(26, 15, 'Passed', 'final', '2017-12-17 02:25:33'),
(27, 16, 'Passed', 'final', '2017-12-17 02:25:42'),
(28, 17, 'applied', 'initial', '2017-12-17 11:47:17'),
(29, 18, 'applied', 'initial', '2017-12-17 11:48:26'),
(30, 19, 'applied', 'initial', '2017-12-17 11:49:04'),
(31, 20, 'applied', 'initial', '2017-12-17 11:49:47'),
(32, 21, 'applied', 'initial', '2017-12-17 11:50:57'),
(33, 22, 'applied', 'initial', '2017-12-17 11:51:54'),
(34, 23, 'applied', 'initial', '2017-12-17 11:52:35'),
(35, 24, 'applied', 'initial', '2017-12-17 11:55:39'),
(36, 25, 'applied', 'initial', '2017-12-17 11:57:01'),
(37, 26, 'applied', 'initial', '2017-12-17 11:57:49'),
(38, 25, 'interview', 'for_interview', '2017-12-17 11:58:26'),
(39, 26, 'interview', 'for_interview', '2017-12-17 11:58:33'),
(40, 19, 'interview', 'for_interview', '2017-12-17 11:59:59'),
(41, 21, 'interview', 'for_interview', '2017-12-17 12:01:50'),
(42, 22, 'interview', 'for_interview', '2017-12-17 12:01:58'),
(43, 23, 'interview', 'for_interview', '2017-12-17 12:02:02'),
(44, 24, 'interview', 'for_interview', '2017-12-17 12:02:09'),
(45, 18, 'interview', 'for_interview', '2017-12-17 12:02:15'),
(46, 21, 'Passed', 'final', '2017-12-17 12:07:42'),
(47, 22, 'Passed', 'final', '2017-12-17 12:07:54'),
(48, 26, 'Passed', 'final', '2017-12-17 12:08:00'),
(49, 19, 'Passed', 'final', '2017-12-17 12:08:10'),
(50, 25, 'Passed', 'final', '2017-12-17 12:08:31'),
(51, 18, 'Passed', 'final', '2017-12-17 12:08:36'),
(52, 24, 'Passed', 'final', '2017-12-17 12:09:05'),
(53, 23, 'Passed', 'final', '2017-12-17 12:09:10'),
(54, 27, 'applied', 'initial', '2017-12-17 12:23:07'),
(55, 28, 'applied', 'initial', '2017-12-17 12:24:06'),
(56, 29, 'applied', 'initial', '2017-12-17 12:24:46'),
(57, 30, 'applied', 'initial', '2017-12-17 12:25:41'),
(58, 31, 'applied', 'initial', '2017-12-17 12:26:28'),
(59, 32, 'applied', 'initial', '2017-12-17 12:27:27'),
(60, 33, 'applied', 'initial', '2017-12-17 12:28:08'),
(61, 34, 'applied', 'initial', '2017-12-17 12:28:47'),
(62, 35, 'applied', 'initial', '2017-12-17 12:29:38'),
(63, 36, 'applied', 'initial', '2017-12-17 12:30:22'),
(64, 28, 'interview', 'for_interview', '2017-12-17 12:32:59'),
(65, 27, 'interview', 'for_interview', '2017-12-17 12:33:05'),
(66, 35, 'interview', 'for_interview', '2017-12-17 12:33:14'),
(67, 36, 'interview', 'for_interview', '2017-12-17 12:33:20'),
(68, 30, 'interview', 'for_interview', '2017-12-17 12:33:29'),
(69, 31, 'interview', 'for_interview', '2017-12-17 12:33:39'),
(70, 32, 'interview', 'for_interview', '2017-12-17 12:33:46'),
(71, 33, 'interview', 'for_interview', '2017-12-17 12:33:52'),
(72, 34, 'interview', 'for_interview', '2017-12-17 12:33:58'),
(73, 29, 'interview', 'for_interview', '2017-12-17 12:34:04'),
(74, 28, 'Passed', 'final', '2017-12-17 12:34:35'),
(75, 27, 'Passed', 'final', '2017-12-17 12:34:39'),
(76, 29, 'Passed', 'final', '2017-12-17 12:34:44'),
(77, 33, 'Passed', 'final', '2017-12-17 12:34:48'),
(78, 32, 'Passed', 'final', '2017-12-17 12:34:51'),
(79, 36, 'Passed', 'final', '2017-12-17 12:34:55'),
(80, 31, 'Passed', 'final', '2017-12-17 12:34:59'),
(81, 35, 'Passed', 'final', '2017-12-17 12:35:02'),
(82, 30, 'Passed', 'final', '2017-12-17 12:35:07'),
(83, 34, 'Passed', 'final', '2017-12-17 12:35:10');

-- --------------------------------------------------------

--
-- Table structure for table `comelec`
--

CREATE TABLE IF NOT EXISTS `comelec` (
  `comelec_id` int(11) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `accesscode` varchar(15) NOT NULL,
  `x` enum('active','deleted','','') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comelec`
--

INSERT INTO `comelec` (`comelec_id`, `last_name`, `first_name`, `middle_name`, `accesscode`, `x`) VALUES
(4, 'Estoque', 'Fernand John', 'Puno', 'fer', 'active'),
(5, 'Soliman', 'Samuel', 'Ligue', 'sam', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE IF NOT EXISTS `election` (
  `election_id` int(11) NOT NULL,
  `election_name` varchar(50) NOT NULL,
  `x` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`election_id`, `election_name`, `x`) VALUES
(1, '2017 Supreme Student Government Election', 'active'),
(2, '2018 SSG Election', 'deleted'),
(3, '2017 Something Election', 'deleted'),
(4, '2018', 'deleted'),
(5, '12', 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `log_details`
--

CREATE TABLE IF NOT EXISTS `log_details` (
  `userid` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `log` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE IF NOT EXISTS `party` (
  `party_id` int(11) NOT NULL,
  `party` varchar(50) NOT NULL,
  `x` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`party_id`, `party`, `x`) VALUES
(1, 'Kabataan', 'active'),
(2, 'LP', 'active'),
(3, 'UNO', 'deleted'),
(4, 'UNOS', 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `position_id` int(11) NOT NULL,
  `position_title` varchar(255) NOT NULL,
  `type` enum('single','multiple') DEFAULT 'single',
  `count` smallint(10) NOT NULL DEFAULT '1',
  `x` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position_title`, `type`, `count`, `x`) VALUES
(11, 'President', 'single', 1, 'active'),
(12, 'Vice President', 'single', 1, 'active'),
(13, 'Secretary', 'single', 1, 'active'),
(14, 'Senators', 'multiple', 7, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE IF NOT EXISTS `requirements` (
  `requirement_id` int(50) NOT NULL,
  `requirement` varchar(100) NOT NULL,
  `x` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`requirement_id`, `requirement`, `x`) VALUES
(1, 'SPR', 'active'),
(2, 'SCHOOL ID', 'active'),
(5, 'HANDBOOK', 'deleted'),
(6, 'SPSS', 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL,
  `school_id` varchar(15) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `middle_name` varchar(150) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `year_level` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `x` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `school_id`, `last_name`, `first_name`, `middle_name`, `gender`, `course`, `year_level`, `password`, `x`) VALUES
(17, '13-001681', 'Saavedra', 'Yaser', 'G.', 'M', 'BSIT', '4', '', 'active'),
(18, '14-000051', 'Camarillo', 'Danica Jane', 'H.', 'F', 'BSIT', '4', '', 'active'),
(19, '14-000819', 'Simbajon', 'Kristian', 'D.', 'M', 'BSIT', '4', '', 'active'),
(20, '14-000818', 'Uyanguren', 'Gabriel', 'K.', 'M', 'BSIT', '4', '', 'active'),
(21, '14-000817', 'Bernabe', 'Redjhon', 'R.', 'M', 'BSIT', '4', '', 'active'),
(22, '14-000816', 'Delmar', 'Michael Vince', 'M.', 'M', 'BSIT', '4', '', 'active'),
(23, '14-000815', 'Sembrano', 'Adolfo', 'A.', 'M', 'BSIT', '4', '', 'active'),
(24, '14-000825', 'Estoque', 'Fernand', 'P.', 'M', 'BSIT', '4', '', 'active'),
(25, '14-000824', 'Lasaca', 'Jeffson', 'D.', 'M', 'BSIT', '4', '', 'active'),
(26, '14-000823', 'Soliman', 'Samuel', 'L.', 'M', 'BSIT', '4', '', 'active'),
(27, '14-000822', 'Bernabe', 'Redjohn', 'G.', 'M', 'BSIT', '4', '', 'deleted'),
(28, '14-000821', 'Delmar', 'Michael Vince', 'M.', 'M', 'BSIT', '4', '', 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `vote_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `election_id` int(11) NOT NULL,
  `x` enum('active','deleted') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`vote_id`, `student_id`, `applicant_id`, `election_id`, `x`) VALUES
(1, 24, 15, 1, 'active'),
(2, 25, 23, 1, 'active'),
(3, 25, 24, 1, 'active'),
(4, 25, 18, 1, 'active'),
(5, 25, 26, 1, 'active'),
(6, 25, 25, 1, 'active'),
(7, 25, 22, 1, 'active'),
(8, 25, 19, 1, 'active'),
(9, 25, 21, 1, 'active'),
(10, 23, 27, 1, 'active'),
(11, 23, 34, 1, 'active'),
(12, 23, 33, 1, 'active'),
(13, 23, 31, 1, 'active'),
(14, 23, 29, 1, 'active'),
(15, 23, 32, 1, 'active'),
(16, 23, 36, 1, 'active'),
(17, 23, 30, 1, 'active'),
(18, 22, 28, 1, 'active'),
(19, 22, 33, 1, 'active'),
(20, 22, 31, 1, 'active'),
(21, 22, 29, 1, 'active'),
(22, 22, 32, 1, 'active'),
(23, 22, 36, 1, 'active'),
(24, 22, 30, 1, 'active'),
(25, 22, 35, 1, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`applicant_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `applicant_logs`
--
ALTER TABLE `applicant_logs`
  ADD PRIMARY KEY (`applicant_log_id`),
  ADD KEY `student_id` (`applicant_id`);

--
-- Indexes for table `comelec`
--
ALTER TABLE `comelec`
  ADD PRIMARY KEY (`comelec_id`);

--
-- Indexes for table `election`
--
ALTER TABLE `election`
  ADD PRIMARY KEY (`election_id`);

--
-- Indexes for table `log_details`
--
ALTER TABLE `log_details`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`party_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`requirement_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`vote_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `applicant_logs`
--
ALTER TABLE `applicant_logs`
  MODIFY `applicant_log_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `comelec`
--
ALTER TABLE `comelec`
  MODIFY `comelec_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `election`
--
ALTER TABLE `election`
  MODIFY `election_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `log_details`
--
ALTER TABLE `log_details`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `party_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `requirement_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
