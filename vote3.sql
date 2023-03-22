-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 07:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vote3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `accesscode` varchar(15) NOT NULL,
  `type` enum('admin','comelec') NOT NULL DEFAULT 'admin',
  `x` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `last_name`, `first_name`, `middle_name`, `accesscode`, `type`, `x`) VALUES
(11, 'admin', 'admin', 'Biot', 'admin', 'admin', 'active'),
(17, 'COMELEC', 'COMELEC', 'COMELEC', 'comelec', 'admin', 'active'),
(19, 'suaybaguio', 'John ', 'cesar', '12345', 'admin', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
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
  `url` varchar(100) NOT NULL,
  `application_status` enum('initial','for_interview','final','denied') NOT NULL DEFAULT 'initial',
  `x` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `student_id`, `election_id`, `date_filed`, `position_id`, `party_id`, `last_name`, `first_name`, `middle_name`, `gender`, `age`, `date_birth`, `place_birth`, `height`, `weight`, `home_add`, `status`, `religion`, `language`, `citizenship`, `contact_num`, `email`, `spouse_name`, `spouse_add`, `num_child`, `tertiary_lev`, `course`, `year_lev`, `major`, `second_lev`, `secondary_grad`, `elementary`, `elementary_grad`, `achievements`, `organization`, `requirements`, `url`, `application_status`, `x`) VALUES
(8, 1, 18, '2018-03-31', 1, 1, 'Soliman', 'Samuel', 'L.', 'Male', '19', '1998-08-14', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1,2', '', 'final', 'active'),
(9, 2, 18, '2018-03-31', 2, 2, 'Lasaca', 'Jeffson', 'M.', 'Male', '20', '1997-04-05', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1,2', '', 'final', 'active'),
(10, 3, 18, '2018-03-31', 6, 1, 'Saavedra', 'Yaser', 'G.', 'Male', '20', '1997-05-07', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1,2', '', 'final', 'active'),
(11, 1, 19, '2018-03-31', 1, 1, 'Soliman', 'Samuel', 'M.', 'Male', '19', '1997-08-14', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1,2', '', 'final', 'active'),
(12, 2, 20, '2018-03-31', 1, 1, 'Lasaca', 'Jeffson', 'M.', 'Male', '20', '1997-04-15', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1,2', '', 'final', 'active'),
(13, 0, 0, '0000-00-00', 0, 0, '', '', '', 'Select Gen', '', '0000-00-00', '', '', '', '', 'Select Status', '', '', '', '', '', '', '', '', '', 'Select Course', 'Select Year Level', '', '', '0000-00-00', '', '0000-00-00', '', '', '0', '', 'initial', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_logs`
--

CREATE TABLE `applicant_logs` (
  `applicant_log_id` int(50) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `application_status` enum('initial','for_interview','final','denied') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(9, 3, 'interview', 'for_interview', '2018-01-21 02:05:04'),
(10, 3, 'good', 'final', '2018-01-21 06:28:00'),
(11, 4, 'applied', 'initial', '2018-03-31 04:14:27'),
(12, 5, 'applied', 'initial', '2018-03-31 04:16:08'),
(13, 6, 'applied', 'initial', '2018-03-31 04:17:37'),
(14, 6, 'interview', 'for_interview', '2018-03-31 04:19:40'),
(15, 4, 'interview', 'for_interview', '2018-03-31 04:19:43'),
(16, 5, 'interview', 'for_interview', '2018-03-31 04:19:46'),
(17, 5, 'Good', 'final', '2018-03-31 04:20:21'),
(18, 4, 'Good', 'final', '2018-03-31 04:20:23'),
(19, 6, 'Good', 'final', '2018-03-31 04:20:25'),
(20, 2, 'interview', 'for_interview', '2018-03-31 04:23:12'),
(21, 2, 'failed', 'denied', '2018-03-31 04:23:33'),
(22, 7, 'applied', 'initial', '2018-03-31 04:28:37'),
(23, 8, 'applied', 'initial', '2018-03-31 04:33:35'),
(24, 9, 'applied', 'initial', '2018-03-31 04:34:26'),
(25, 10, 'applied', 'initial', '2018-03-31 04:35:25'),
(26, 10, 'interview', 'for_interview', '2018-03-31 04:35:54'),
(27, 9, 'interview', 'for_interview', '2018-03-31 04:35:56'),
(28, 8, 'interview', 'for_interview', '2018-03-31 04:35:59'),
(29, 8, 'Good', 'final', '2018-03-31 04:36:16'),
(30, 9, 'Good', 'final', '2018-03-31 04:36:17'),
(31, 10, 'Good', 'final', '2018-03-31 04:36:22'),
(32, 11, 'applied', 'initial', '2018-03-31 04:45:04'),
(33, 11, 'interview', 'for_interview', '2018-03-31 04:45:37'),
(34, 11, 'Good', 'final', '2018-03-31 04:45:49'),
(35, 12, 'applied', 'initial', '2018-03-31 04:51:22'),
(36, 12, 'interview', 'for_interview', '2018-03-31 04:51:36'),
(37, 12, 'Good', 'final', '2018-03-31 04:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `comelec`
--

CREATE TABLE `comelec` (
  `comelec_id` int(11) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `accesscode` varchar(15) NOT NULL,
  `x` enum('active','deleted','','') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE `election` (
  `election_id` int(11) NOT NULL,
  `election_name` varchar(50) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `x` enum('active','inactive','complete','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`election_id`, `election_name`, `start_date`, `end_date`, `x`) VALUES
(1, '2017 Supreme Student Government Election', '2018-03-29 00:00:00', '2018-03-29 00:00:00', 'deleted'),
(2, '2018 SSG Election', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'deleted'),
(3, '2017 Something Election', '2018-03-29 01:00:00', '2018-03-29 01:00:00', 'deleted'),
(4, 'sample election with date', '2018-03-29 00:00:00', '0000-00-00 00:00:00', 'deleted'),
(5, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'deleted'),
(6, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'deleted'),
(7, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'deleted'),
(8, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'deleted'),
(9, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'deleted'),
(10, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'deleted'),
(11, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'deleted'),
(12, 'sample election with date', '2018-03-26 00:00:00', '0000-00-00 00:00:00', 'deleted'),
(13, 'sdfs', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'deleted'),
(14, 'sample', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'deleted'),
(15, 'sample1', '2018-03-30 07:00:00', '2018-03-30 19:00:00', 'deleted'),
(16, 'IT Election', '2018-03-31 07:00:00', '2018-03-31 17:00:00', 'deleted'),
(17, 'IT Department', '2018-03-31 19:00:00', '2018-03-31 17:00:00', 'deleted'),
(18, 'IT Department Election', '2018-03-31 07:00:00', '2018-03-31 17:00:00', 'active'),
(19, 'IT Student Election', '2018-04-03 07:00:00', '2018-04-03 17:00:00', 'active'),
(20, 'IT Student', '2018-03-31 13:00:00', '2018-03-31 17:00:00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `log_details`
--

CREATE TABLE `log_details` (
  `userid` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `log` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `party_id` int(11) NOT NULL,
  `party` varchar(50) NOT NULL,
  `x` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`party_id`, `party`, `x`) VALUES
(1, 'Kabataan', 'active'),
(2, 'LP', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(11) NOT NULL,
  `position_title` varchar(255) NOT NULL,
  `type` enum('single','multiple') DEFAULT 'single',
  `count` smallint(10) NOT NULL DEFAULT 1,
  `x` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position_title`, `type`, `count`, `x`) VALUES
(1, 'President', 'single', 1, 'active'),
(2, 'Vice President', 'single', 1, 'active'),
(3, 'Auditor', 'single', 1, 'deleted'),
(4, 'Secretary', 'single', 1, 'active'),
(5, 'Members', 'multiple', 5, 'active'),
(6, 'Senator', 'multiple', 11, 'active'),
(7, 'Muse', 'single', 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `requirement_id` int(50) NOT NULL,
  `requirement` varchar(100) NOT NULL,
  `x` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`requirement_id`, `requirement`, `x`) VALUES
(1, 'SPR', 'active'),
(2, 'SCHOOL ID', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `school_id`, `last_name`, `first_name`, `middle_name`, `gender`, `course`, `year_level`, `password`, `x`) VALUES
(1, '10-000241', 'Soliman', 'Samuel', 'L.', 'M', 'BSIT', '4', 'sam', 'active'),
(2, '13-000123', 'Lasaca', 'Jeffson', 'S.', 'M', 'BSIT', '4', 'jeff', 'active'),
(3, '14-000321', 'Saavedra', 'Yaser', 'G.', 'M', 'BSIT', '4', 'yas', 'active'),
(5, 'Jerecho', 'Rosales', 'Male', '', 'BSIT', '4th Year', '10-221213', '1234', 'active'),
(6, '10-000069', 'Mharc', 'Ivan', '', 'Male', 'BSIT', '4th Year', '1234', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `student_id`
--

CREATE TABLE `student_id` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_id`
--

INSERT INTO `student_id` (`id`, `student_id`, `status`) VALUES
(1, '15-000589', ''),
(2, '19-000066', '');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `vote_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `election_id` int(11) NOT NULL,
  `x` enum('active','deleted') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`vote_id`, `student_id`, `applicant_id`, `position_id`, `election_id`, `x`) VALUES
(1, 1, 3, 2, 1, 'active'),
(2, 1, 1, 1, 1, 'active'),
(3, 1, 8, 1, 18, 'active'),
(4, 1, 9, 2, 18, 'active'),
(5, 1, 10, 6, 18, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `accesscode_2` (`accesscode`),
  ADD KEY `accesscode` (`accesscode`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
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
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `school_id_2` (`school_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `student_id`
--
ALTER TABLE `student_id`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `applicant_logs`
--
ALTER TABLE `applicant_logs`
  MODIFY `applicant_log_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `comelec`
--
ALTER TABLE `comelec`
  MODIFY `comelec_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `election`
--
ALTER TABLE `election`
  MODIFY `election_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `log_details`
--
ALTER TABLE `log_details`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `party_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `requirement_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student_id`
--
ALTER TABLE `student_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
