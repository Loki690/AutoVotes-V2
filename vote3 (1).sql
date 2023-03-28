-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 08:41 AM
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
(11, 'admin', 'admin', 'Bobo', 'admin1234', 'admin', 'active'),
(17, 'COMELEC', 'COMELEC', 'COMELEC', 'comelec', 'comelec', 'active'),
(19, 'suaybaguio', 'John ', 'cesar', '12345', 'admin', 'active'),
(35, 'Comelec 1', 'Comelec 2', 'Comelec 2', 'loki123', 'comelec', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
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
  `x` enum('active','deleted') NOT NULL DEFAULT 'active',
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `student_id`, `election_id`, `date_filed`, `position_id`, `party_id`, `last_name`, `first_name`, `middle_name`, `gender`, `age`, `date_birth`, `place_birth`, `height`, `weight`, `home_add`, `status`, `religion`, `language`, `citizenship`, `contact_num`, `email`, `spouse_name`, `spouse_add`, `num_child`, `tertiary_lev`, `course`, `year_lev`, `major`, `second_lev`, `secondary_grad`, `elementary`, `elementary_grad`, `achievements`, `organization`, `requirements`, `url`, `application_status`, `x`, `photo`) VALUES
(1, '19', 29, '2023-03-24', 1, 1, 'Suaybaguio', 'John ', 'Cesar ', 'Male', '21', '2023-03-24', 'Davao City', '152cm', '53kg', 'Ramihan ', 'Single', 'Catholic', 'Bisaya', 'Filipino', '098765543212', 'sample@gmail.com', 'Wala', 'Wala', '0', 'Dcc', 'BSIT', '4th Year', 'Web Development', 'DCC', '2023-03-08', 'wala', '0000-00-00', '2023-03-24', 'Wala', '2', 'wala', 'for_interview', 'active', '37575-335016204_528739549379749_1584288210885176839_n.jpg'),
(2, '19', 28, '2023-03-27', 2, 1, 'Asilum', 'Jerecho ', 'M', 'Male', '21', '2023-03-01', 'Davao', '21', '3213', '', 'Single', '321312', '312312', '312321', '123312', '2ssdas@gmail.com', '312312', '312312', '2', 'dcc', 'BSIT', '1st Year', 'dcc', 'dcc', '2023-03-26', 'adsasaasfas', '0000-00-00', '2023-03-11', 'dasdasd', '', 'dsadsadsadsa', 'for_interview', 'active', '5628-317846318_5532449466804584_423713337250769750_n.jpg'),
(3, '19-000070', 28, '2023-03-27', 4, 1, 'Salvani', 'Welgen', 'S.', 'Male', '21', '2023-03-16', 'Davo', 'wala', 'wala', 'toril', 'Single', 'N/A', 'BIsaya', 'Pinoy', '0909021212', 'email@email.com', 'N/A', 'N/A', '0', 'dcc', 'BSIT', '1st Year', 'dcc', 'dcc', '2023-03-16', 'wadasdsadsadsa', '0000-00-00', '2023-03-27', 'SIncotecs', '0', 'ambutlang wala pa', 'denied', 'deleted', '709560-22154317_729671347242226_9148255462697277221_n.jpg'),
(4, '19-000066', 28, '2023-03-27', 2, 1, '34234', '324234', '4324', 'Male', '432', '2023-03-08', '434234', '432423', '423432', '423423', 'Single', '4324', '432432', '4324', '423423', '423423@gmail.com', '432432', '4234234', '324', 'dcc', 'BSCRIM', '1st Year', 'cccdfa', 'dsad', '2023-03-15', 'sadasdsa', '0000-00-00', '2023-03-30', 'dasd', '2,5,8', 'sadsad', 'for_interview', 'active', '741797-yjdfvhri.png');

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

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `election_id` varchar(255) NOT NULL,
  `applicant_id` varchar(255) NOT NULL,
  `position_id` varchar(255) NOT NULL,
  `x` enum('active','deleted','','') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `x` enum('active','inactive','complete','deleted') NOT NULL DEFAULT 'active',
  `election_poster` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`election_id`, `election_name`, `start_date`, `end_date`, `x`, `election_poster`) VALUES
(28, 'EIM Election', '1970-01-01 01:00:00', '1970-01-01 01:00:00', 'active', '31373-317846318_5532449466804584_423713337250769750_n.jpg'),
(29, 'Dcc Election', '1970-01-01 01:00:00', '1970-01-01 01:00:00', 'active', '105219-yjdfvhri.png');

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
(2, 'LP', 'active'),
(3, 'wala panty', 'active'),
(4, 'Team DropBOX', 'active');

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
(7, 'Muse', 'single', 1, 'active'),
(8, 'Governor', 'single', 0, 'deleted'),
(9, 'ewrwerew', 'single', 1, 'deleted'),
(10, 'rewrewrwe', 'multiple', 21, 'deleted');

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
(1, 'SPR', 'deleted'),
(2, 'SCHOOL ID', 'active'),
(3, 'waa', 'deleted'),
(4, 'jkjkjkj', 'deleted'),
(5, 'SPR', 'active'),
(6, 'w', 'deleted'),
(7, 'wala', 'deleted'),
(8, 'asdasd', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `school_id` varchar(255) NOT NULL,
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
(3, '14-000321', 'Saavedra', 'Yaser', 'G.', 'M', 'BSIT', '4', 'yas', 'deleted'),
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
(2, '19-000066', ''),
(3, '19-000011', 'active'),
(4, '19-000067', 'active'),
(5, '19-000068', 'active'),
(6, '19-000069', 'active'),
(7, '19-000070', 'active');

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
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `applicant_logs`
--
ALTER TABLE `applicant_logs`
  MODIFY `applicant_log_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comelec`
--
ALTER TABLE `comelec`
  MODIFY `comelec_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `election`
--
ALTER TABLE `election`
  MODIFY `election_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `log_details`
--
ALTER TABLE `log_details`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `party_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `requirement_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student_id`
--
ALTER TABLE `student_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
