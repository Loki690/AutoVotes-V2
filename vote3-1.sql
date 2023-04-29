-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 03:53 PM
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
(17, 'COMELEC', 'COMELEC', 'COMELEC', 'comelec', 'comelec', 'active'),
(19, 'suaybaguio', 'John ', 'cesar', '12345', 'admin', 'active'),
(48, 'M', 'Jerec', 'Cho', 'comelec1', 'comelec', 'active');

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
(1, 'Angel', 29, '0000-00-00', 1, 1, 'Shortland', 'Amye', 'Antonia', 'Female', '82', '2001-04-07', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'final', 'active', 'http://dummyimage.com/115x100.png/5fa2dd/ffffff'),
(2, 'Brigitta', 28, '0000-00-00', 1, 1, 'Hedin', 'Doralynn', 'Susette', 'Female', '73', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'initial', 'active', 'http://dummyimage.com/115x100.png/ff4444/ffffff'),
(3, 'Erie', 29, '0000-00-00', 4, 1, 'Berriball', 'Dukie', 'Melvyn', 'Male', '91', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'initial', 'active', 'http://dummyimage.com/127x100.png/5fa2dd/ffffff'),
(4, 'Ban', 29, '0000-00-00', 5, 1, 'Livesley', 'Hayes', 'Giffy', 'Male', '38', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'initial', 'active', 'http://dummyimage.com/207x100.png/dddddd/000000'),
(5, 'Fraze', 29, '0000-00-00', 5, 1, 'Djekic', 'Neale', 'Temple', 'Male', '74', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'final', 'active', 'http://dummyimage.com/171x100.png/dddddd/000000'),
(6, 'Adoree', 29, '0000-00-00', 6, 2, 'Broomer', 'Latia', 'Crystie', 'Female', '82', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'final', 'active', 'http://dummyimage.com/169x100.png/cc0000/ffffff'),
(7, 'Zelig', 29, '0000-00-00', 6, 2, 'Gulleford', 'Myron', 'Smitty', 'Male', '88', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'final', 'active', 'http://dummyimage.com/216x100.png/cc0000/ffffff'),
(8, 'Rossy', 29, '0000-00-00', 6, 1, 'Bracey', 'Rhett', 'Fredric', 'Male', '38', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'final', 'active', 'http://dummyimage.com/195x100.png/dddddd/000000'),
(9, 'Celinda', 29, '0000-00-00', 6, 2, 'MacCrachen', 'Deane', 'Izabel', 'Female', '41', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'final', 'active', 'http://dummyimage.com/151x100.png/5fa2dd/ffffff'),
(10, 'Nariko', 29, '0000-00-00', 6, 2, 'Gilbart', 'Maressa', 'Karlotte', 'Female', '81', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'final', 'active', 'http://dummyimage.com/154x100.png/5fa2dd/ffffff'),
(11, 'Tansy', 29, '0000-00-00', 1, 2, 'Eastbrook', 'Harrie', 'Sallee', 'Female', '52', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'final', 'active', 'http://dummyimage.com/141x100.png/ff4444/ffffff'),
(12, 'Althea', 31, '0000-00-00', 1, 1, 'Blazdell', 'Shaine', 'Calla', 'Female', '43', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'final', 'active', 'http://dummyimage.com/204x100.png/5fa2dd/ffffff'),
(13, 'Chanda', 29, '0000-00-00', 1, 2, 'Skaife d\'Ingerthorpe', 'Tiphani', 'Dulcea', 'Female', '23', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'final', 'active', 'http://dummyimage.com/202x100.png/cc0000/ffffff'),
(14, 'Fran', 29, '0000-00-00', 6, 2, 'Boot', 'Carolee', 'Abigail', 'Female', '38', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'final', 'active', 'http://dummyimage.com/131x100.png/5fa2dd/ffffff'),
(15, 'Clarine', 29, '0000-00-00', 6, 1, 'Ladewig', 'Nancee', 'Faythe', 'Female', '80', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'final', 'active', 'http://dummyimage.com/117x100.png/dddddd/000000'),
(16, 'Biron', 29, '0000-00-00', 1, 2, 'Pickford', 'Lothaire', 'Dillon', 'Male', '84', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'initial', 'active', 'http://dummyimage.com/113x100.png/dddddd/000000'),
(17, 'Marietta', 28, '0000-00-00', 1, 1, 'McIlwaine', 'Rosco', 'Art', 'Male', '49', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'initial', 'active', 'http://dummyimage.com/210x100.png/ff4444/ffffff'),
(18, 'Cissy', 28, '0000-00-00', 1, 1, 'Yve', 'Birgit', 'Jordanna', 'Female', '95', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'initial', 'active', 'http://dummyimage.com/212x100.png/ff4444/ffffff'),
(19, 'Rudolfo', 28, '0000-00-00', 4, 2, 'Wiggam', 'Gabe', 'Ingram', 'Male', '23', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'initial', 'active', 'http://dummyimage.com/107x100.png/ff4444/ffffff'),
(20, 'Bud', 29, '0000-00-00', 1, 2, 'Juza', 'Art', 'Farlay', 'Male', '88', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'initial', 'active', 'http://dummyimage.com/225x100.png/dddddd/000000'),
(21, 'Selma', 29, '0000-00-00', 2, 2, 'Cothey', 'Fredelia', 'Ilse', 'Female', '99', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'initial', 'active', 'http://dummyimage.com/171x100.png/ff4444/ffffff'),
(22, 'Bessie', 28, '0000-00-00', 5, 1, 'Jansema', 'Ninon', 'Marjory', 'Female', '34', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1,2', '', 'for_interview', 'active', 'http://dummyimage.com/206x100.png/dddddd/000000'),
(23, 'Bondy', 29, '0000-00-00', 5, 1, 'Urwin', 'Tally', 'Yale', 'Male', '67', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '2', '', 'for_interview', 'active', 'http://dummyimage.com/145x100.png/5fa2dd/ffffff'),
(24, 'Storm', 29, '0000-00-00', 5, 1, 'Elves', 'Cynthy', 'Drusi', 'Female', '35', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1,2', '', 'for_interview', 'active', 'http://dummyimage.com/123x100.png/5fa2dd/ffffff'),
(25, 'Stanfield', 29, '0000-00-00', 6, 2, 'Cortez', 'Titus', 'Leonid', 'Male', '78', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1', '', 'for_interview', 'active', 'http://dummyimage.com/192x100.png/dddddd/000000'),
(26, 'Orel', 28, '0000-00-00', 4, 2, 'Gotcliffe', 'Timmy', 'Ortensia', 'Female', '48', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1,2', '', 'for_interview', 'active', 'http://dummyimage.com/237x100.png/ff4444/ffffff'),
(27, 'Edwina', 29, '0000-00-00', 4, 2, 'Olifaunt', 'Kaila', 'Gwyn', 'Female', '54', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1,2', '', 'for_interview', 'active', 'http://dummyimage.com/195x100.png/dddddd/000000'),
(28, 'Julian', 29, '0000-00-00', 2, 2, 'Sapsed', 'Rooney', 'Stewart', 'Male', '81', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1,2', '', 'for_interview', 'active', 'http://dummyimage.com/226x100.png/cc0000/ffffff'),
(29, 'Linell', 29, '0000-00-00', 2, 1, 'Quin', 'Bird', 'Diahann', 'Female', '83', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1', '', 'for_interview', 'active', 'http://dummyimage.com/189x100.png/ff4444/ffffff'),
(30, 'Julietta', 28, '0000-00-00', 5, 1, 'Rontree', 'Arlena', 'Farah', 'Female', '20', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1,2', '', 'for_interview', 'active', 'http://dummyimage.com/185x100.png/ff4444/ffffff'),
(31, 'Hilarius', 28, '0000-00-00', 4, 2, 'Crockett', 'Chucho', 'Currie', 'Male', '26', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1', '', 'for_interview', 'active', 'http://dummyimage.com/124x100.png/ff4444/ffffff'),
(32, 'Hervey', 29, '0000-00-00', 6, 2, 'Martyntsev', 'Sasha', 'Brendin', 'Male', '59', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'final', 'active', 'http://dummyimage.com/103x100.png/5fa2dd/ffffff'),
(33, 'Avrit', 29, '0000-00-00', 5, 2, 'Ducker', 'Lindsay', 'Ardine', 'Female', '33', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'final', 'active', 'http://dummyimage.com/199x100.png/cc0000/ffffff'),
(34, 'Harold', 29, '0000-00-00', 5, 1, 'Sewart', 'Cornell', 'Abran', 'Male', '50', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'final', 'active', 'http://dummyimage.com/200x100.png/5fa2dd/ffffff'),
(35, 'Benjy', 29, '0000-00-00', 5, 2, 'Laite', 'Waldo', 'Malcolm', 'Male', '68', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'final', 'active', 'http://dummyimage.com/245x100.png/cc0000/ffffff'),
(36, 'Clayborn', 29, '0000-00-00', 5, 1, 'Benneton', 'Leonerd', 'Harland', 'Male', '44', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'final', 'active', 'http://dummyimage.com/136x100.png/dddddd/000000'),
(37, 'Bernardina', 28, '0000-00-00', 2, 2, 'Magovern', 'Merline', 'Roanne', 'Female', '44', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '1,2', '', 'for_interview', 'active', 'http://dummyimage.com/235x100.png/ff4444/ffffff'),
(38, 'Ezra', 28, '0000-00-00', 6, 2, 'Rousell', 'Tye', 'Clare', 'Male', '80', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'initial', 'active', 'http://dummyimage.com/153x100.png/dddddd/000000'),
(39, 'Bryon', 28, '0000-00-00', 4, 2, 'Decaze', 'Adan', 'Dario', 'Male', '32', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'initial', 'active', 'http://dummyimage.com/127x100.png/cc0000/ffffff'),
(40, 'Kirsteni', 29, '0000-00-00', 5, 1, 'Inger', 'Gilbertine', 'Natassia', 'Female', '23', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'final', 'active', 'http://dummyimage.com/154x100.png/cc0000/ffffff'),
(41, 'Zak', 28, '0000-00-00', 2, 1, 'Richold', 'Sherwynd', 'Wittie', 'Male', '23', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'initial', 'active', 'http://dummyimage.com/161x100.png/cc0000/ffffff'),
(42, 'Marika', 29, '0000-00-00', 5, 2, 'Urlich', 'Gilberte', 'Carita', 'Female', '26', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'final', 'active', 'http://dummyimage.com/249x100.png/cc0000/ffffff'),
(43, 'Arlin', 28, '0000-00-00', 4, 2, 'Carcas', 'Eugenius', 'Laurence', 'Male', '73', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'initial', 'active', 'http://dummyimage.com/118x100.png/5fa2dd/ffffff'),
(44, 'Becca', 28, '0000-00-00', 4, 2, 'Kytley', 'Cele', 'Blanca', 'Female', '50', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'initial', 'active', 'http://dummyimage.com/243x100.png/5fa2dd/ffffff'),
(45, 'Culley', 28, '0000-00-00', 6, 2, 'Pearsey', 'Carlo', 'Fin', 'Male', '83', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'initial', 'active', 'http://dummyimage.com/182x100.png/ff4444/ffffff'),
(46, 'Lennie', 29, '0000-00-00', 5, 1, 'Bane', 'Dalton', 'Hilly', 'Male', '30', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'final', 'active', 'http://dummyimage.com/115x100.png/5fa2dd/ffffff'),
(47, 'Sheelah', 29, '0000-00-00', 6, 2, 'Penvarne', 'Hetty', 'Stace', 'Female', '89', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'final', 'active', 'http://dummyimage.com/155x100.png/ff4444/ffffff'),
(48, 'Dante', 28, '0000-00-00', 4, 2, 'Vidineev', 'Timothy', 'Hastings', 'Male', '26', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'initial', 'active', 'http://dummyimage.com/247x100.png/dddddd/000000'),
(49, 'Nanni', 29, '0000-00-00', 6, 1, 'Yanukhin', 'Rey', 'Ana', 'Female', '36', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'final', 'active', 'http://dummyimage.com/236x100.png/5fa2dd/ffffff'),
(50, 'Rustie', 29, '0000-00-00', 6, 1, 'Keenlayside', 'Courtney', 'Dolf', 'Male', '46', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', 'final', 'active', 'http://dummyimage.com/186x100.png/dddddd/000000');

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
(1, 4, 'hello madafakers', 'denied', '2023-03-28 12:29:34'),
(2, 4, 'walay boot', 'denied', '2023-03-28 12:30:40'),
(3, 10, 'walay boot ', 'denied', '2023-03-29 11:15:03'),
(4, 12, '', 'denied', '2023-03-29 11:15:25'),
(5, 19, '', 'denied', '2023-03-29 11:15:44'),
(6, 18, '', 'denied', '2023-03-29 11:15:49'),
(7, 17, '', 'denied', '2023-03-29 11:16:36');

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
  `election_poster` varchar(255) NOT NULL,
  `election_qr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`election_id`, `election_name`, `start_date`, `end_date`, `x`, `election_poster`, `election_qr`) VALUES
(29, 'Dcc Election', '1970-01-01 01:00:00', '1970-01-01 01:00:00', 'active', '105219-yjdfvhri.png', ''),
(31, 'Uyab ni Jerecho Election ', '1970-01-01 01:00:00', '1970-01-01 01:00:00', 'active', '889602-317846318_5532449466804584_423713337250769750_n.jpg', ''),
(34, 'ssss', '2023-03-27 20:00:00', '2023-03-27 23:00:00', 'active', '641697-341104629_728534379011300_940317840683947651_n.jpg', ''),
(35, 'ssss', '2023-04-29 07:00:00', '2023-04-29 21:00:00', 'active', '718141-328550062_700921088244455_5297787786797202560_n.jpg', '');

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
(3, 'wala 7', 'deleted'),
(4, 'Team DropBOX', 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(11) NOT NULL,
  `position_title` varchar(255) NOT NULL,
  `type` enum('single','multiple') DEFAULT 'single',
  `count` int(10) NOT NULL DEFAULT 1,
  `x` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position_title`, `type`, `count`, `x`) VALUES
(1, 'President', 'single', 1, 'active'),
(2, 'Vice President', 'single', 1, 'active'),
(4, 'Secretary', 'single', 1, 'active'),
(5, 'Members', 'multiple', 5, 'active'),
(6, 'Senator', 'multiple', 7, 'active'),
(7, 'Muse', 'single', 1, 'active'),
(12, 'uhgvfu', '', 0, 'deleted');

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
(2, 'SCHOOL ID', 'active'),
(3, 'waa', 'deleted'),
(4, 'jkjkjkj', 'deleted'),
(6, 'w', 'deleted'),
(7, 'wala', 'deleted'),
(8, 'asdasd', 'deleted');

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
(1, '3242', 'Ree', 'Dodshun', 'Permain', 'M', 'BSCRIM', '1', '1234', 'deleted'),
(2, '6997', 'Ephraim', 'Cluley', 'Russ', 'M', 'BSCRIM', '2', '1234', 'active'),
(3, '3481', 'Rollin', 'Mottram', 'Sucre', 'M', 'BSHM', '3', '1234', 'active'),
(4, '6676', 'Wally', 'Hansen', 'Duval', 'F', 'BSIT', '2', '1234', 'deleted'),
(5, '5385', 'Jacinthe', 'Sidwick', 'Lamblot', 'F', 'BSIT', '4', '1234', 'active'),
(6, '7710', 'Rad', 'Caffrey', 'Hedges', 'M', 'BSCRIM', '2', '1234', 'active'),
(7, '5235', 'Saidee', 'Fidelus', 'Sykora', 'F', 'BSCRIM', '4', '1234', 'active'),
(8, '5969', 'Torrey', 'Thomason', 'Deschelle', 'M', 'BSIT', '1', '1234', 'active'),
(9, '6603', 'Christie', 'Earp', 'Saich', 'M', 'BSED', '2', '1234', 'deleted'),
(10, '8222', 'Allister', 'Burborough', 'Crotty', 'F', 'BSED', '1', '1234', 'active'),
(11, '9267', 'Rolf', 'Queyos', 'Rominov', 'M', 'BSIT', '3', '1234', 'active'),
(12, '9520', 'Laurette', 'Domican', 'Topes', 'F', 'BSHM', '1', '1234', 'active'),
(13, '5352', 'Agneta', 'Bartosch', 'Awmack', 'M', 'BSHM', '1', '1234', 'active'),
(14, '5396', 'Kylila', 'Manford', 'Stronge', 'F', 'BSED', '2', '1234', 'active'),
(15, '2680', 'Kaile', 'Yukhnov', 'Cogger', 'M', 'BSHM', '1', '1234', 'active'),
(16, '5972', 'Valentia', 'Roderham', 'Tovey', 'F', 'BSCRIM', '3', '1234', 'active'),
(17, '8032', 'Leigha', 'Tilley', 'O\'Lenechan', 'M', 'BSCRIM', '3', '1234', 'active'),
(18, '9406', 'Sheila', 'Tough', 'Pickett', 'F', 'BSCRIM', '1', '1234', 'active'),
(19, '6322', 'Jehanna', 'Avrahamov', 'Melbury', 'M', 'BSCRIM', '3', '1234', 'active'),
(20, '6881', 'Devon', 'Meegin', 'Cordy', 'M', 'BSIT', '1', '1234', 'active'),
(21, '3620', 'Alana', 'Dunthorne', 'Squirrel', 'F', 'BSHM', '2', '1234', 'active'),
(22, '9291', 'Althea', 'Crotch', 'Mannock', 'F', 'BSED', '3', '1234', 'active'),
(23, '4266', 'Aube', 'Crebott', 'Autrie', 'M', 'BSIT', '1', '1234', 'active'),
(24, '2833', 'Lazare', 'Salman', 'Shilton', 'M', 'BSCRIM', '1', '1234', 'active'),
(25, '8017', 'Shaine', 'Chettle', 'Ogelbe', 'F', 'BSIT', '2', '1234', 'active'),
(26, '2742', 'Lancelot', 'Ivamy', 'Udy', 'M', 'BSHM', '4', '1234', 'active'),
(27, '9128', 'Currey', 'Baly', 'Mitskevich', 'M', 'BSHM', '3', '1234', 'active'),
(28, '4017', 'Jenica', 'Grinham', 'Lobell', 'M', 'BSIT', '3', '1234', 'active'),
(29, '5750', 'Arlana', 'Plessing', 'Grundell', 'M', 'BSCRIM', '4', '1234', 'active'),
(30, '9157', 'Allx', 'Pococke', 'Hechlin', 'M', 'BSED', '1', '1234', 'active'),
(31, '5178', 'Rance', 'Pringer', 'Drance', 'F', 'BSHM', '1', '1234', 'active'),
(32, '3026', 'Aurthur', 'Darragon', 'Climance', 'F', 'BSIT', '1', '1234', 'active'),
(33, '3425', 'Antoinette', 'Tregensoe', 'Beves', 'M', 'BSIT', '2', '1234', 'active'),
(34, '5563', 'Blancha', 'MacKonochie', 'Scipsey', 'F', 'BSCRIM', '3', '1234', 'active'),
(35, '6591', 'Romola', 'Mullen', 'Kayes', 'F', 'BSCRIM', '1', '1234', 'active'),
(36, '3529', 'Hogan', 'Shirer', 'Bunyan', 'F', 'BSIT', '4', '1234', 'active'),
(37, '4510', 'Roxi', 'Hemmingway', 'Sainteau', 'F', 'BSIT', '1', '1234', 'active'),
(38, '4412', 'Antonella', 'Klos', 'Dandy', 'F', 'BSHM', '4', '1234', 'active'),
(39, '4405', 'Charley', 'Piatkowski', 'Dinsell', 'F', 'BSCRIM', '3', '1234', 'active'),
(40, '8264', 'Ignace', 'Hakonsen', 'Tully', 'F', 'BSCRIM', '1', '1234', 'active'),
(41, '7821', 'Jocelin', 'Kenforth', 'Windaybank', 'M', 'BSIT', '4', '1234', 'active'),
(42, '4991', 'Christalle', 'Collens', 'Coytes', 'F', 'BSHM', '4', '1234', 'active'),
(43, '3997', 'Claribel', 'Chedgey', 'Strang', 'F', 'BSED', '3', '1234', 'active'),
(44, '7372', 'Danyette', 'Moorwood', 'McCaskell', 'M', 'BSED', '4', '1234', 'active'),
(45, '5263', 'Dina', 'McNair', 'Sendall', 'F', 'BSED', '2', '1234', 'active'),
(46, '5815', 'Robinette', 'Prettjohn', 'Burkwood', 'M', 'BSCRIM', '4', '1234', 'active'),
(47, '9062', 'Melisenda', 'McKee', 'Hunnam', 'M', 'BSHM', '1', '1234', 'active'),
(48, '7240', 'Lindsy', 'Workman', 'Alberts', 'M', 'BSIT', '1', '1234', 'active'),
(49, '9453', 'Deonne', 'Banaszewski', 'Josskovitz', 'M', 'BSED', '4', '1234', 'active'),
(50, '3223', 'Eirena', 'Gerardeaux', 'Vonderdell', 'F', 'BSHM', '3', '1234', 'active');

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
(7, '19-000070', 'active'),
(8, 'student_id', 'status'),
(9, '191160', 'active'),
(10, '128769', 'active'),
(11, '150416', 'active'),
(12, '193224', 'active'),
(13, '168178', 'active'),
(14, '116581', 'active'),
(15, '152955', 'active'),
(16, '164970', 'active'),
(17, '100394', 'active'),
(18, '150554', 'active'),
(19, '105051', 'active'),
(20, '142637', 'active'),
(21, '163394', 'active'),
(22, '164169', 'active'),
(23, '154309', 'active'),
(24, '151080', 'active'),
(25, '166183', 'active'),
(26, '124536', 'active'),
(27, '182240', 'active'),
(28, '118328', 'active'),
(29, '169184', 'active'),
(30, '110686', 'active'),
(31, '155964', 'active'),
(32, '130621', 'active'),
(33, '153457', 'active'),
(34, '121368', 'active'),
(35, '100895', 'active'),
(36, '100662', 'active'),
(37, '185765', 'active'),
(38, '183228', 'active'),
(39, '161841', 'active'),
(40, '165016', 'active'),
(41, '157460', 'active'),
(42, '171260', 'active'),
(43, '124618', 'active'),
(44, '184228', 'active'),
(45, '175128', 'active'),
(46, '188220', 'active'),
(47, '170441', 'active'),
(48, '172290', 'active'),
(49, '162122', 'active'),
(50, '179803', 'active');

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
(1, 3242, 13, 1, 29, 'active'),
(2, 3242, 33, 5, 29, 'active'),
(3, 3242, 34, 5, 29, 'active'),
(4, 3242, 35, 5, 29, 'active'),
(5, 3242, 36, 5, 29, 'active'),
(6, 3242, 40, 5, 29, 'active'),
(7, 3242, 6, 6, 29, 'active'),
(8, 3242, 7, 6, 29, 'active'),
(9, 3242, 8, 6, 29, 'active'),
(10, 3242, 9, 6, 29, 'active'),
(11, 3242, 10, 6, 29, 'active'),
(12, 3242, 14, 6, 29, 'active'),
(13, 3242, 15, 6, 29, 'active'),
(14, 6997, 13, 1, 29, 'active'),
(15, 6997, 5, 5, 29, 'active'),
(16, 6997, 33, 5, 29, 'active'),
(17, 6997, 34, 5, 29, 'active'),
(18, 6997, 36, 5, 29, 'active'),
(19, 6997, 40, 5, 29, 'active'),
(20, 6997, 6, 6, 29, 'active'),
(21, 6997, 7, 6, 29, 'active'),
(22, 6997, 8, 6, 29, 'active'),
(23, 6997, 9, 6, 29, 'active'),
(24, 6997, 10, 6, 29, 'active'),
(25, 6997, 14, 6, 29, 'active'),
(26, 6997, 15, 6, 29, 'active');

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `applicant_logs`
--
ALTER TABLE `applicant_logs`
  MODIFY `applicant_log_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `election_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `requirement_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `student_id`
--
ALTER TABLE `student_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
