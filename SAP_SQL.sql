-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Aug 25, 2016 at 09:21 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `SAP`
--

-- --------------------------------------------------------

--
-- Table structure for table `Attendance`
--

CREATE TABLE `Attendance` (
  `attendance_id` int(10) NOT NULL,
  `user` int(8) NOT NULL,
  `program` int(10) NOT NULL,
  `present` varchar(10) NOT NULL,
  `week` int(10) NOT NULL,
  `note` varchar(50) DEFAULT NULL,
  `shift_day` varchar(10) NOT NULL,
  `shift_time` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Attendance`
--

INSERT INTO `Attendance` (`attendance_id`, `user`, `program`, `present`, `week`, `note`, `shift_day`, `shift_time`) VALUES
(1, 76280038, 1, '', 1, NULL, 'Thursday', '12:00 PM'),
(2, 70108661, 1, '', 1, NULL, 'Tuesday', '2:00 PM'),
(3, 15831854, 1, '', 1, NULL, 'Tuesday', '10:00 AM'),
(4, 86647814, 1, '', 1, NULL, 'Monday', '2:00 PM'),
(5, 30355187, 1, '', 1, NULL, 'Tuesday', '2:00 PM'),
(6, 12345678, 1, '', 1, NULL, 'Friday', '10:00 AM'),
(7, 77799508, 1, '', 1, '', 'Thursday', '10:00 AM'),
(8, 35010404, 1, '', 1, NULL, 'Tuesday', '10:00 AM'),
(9, 47707086, 1, '', 1, NULL, 'Tuesday', '2:00 PM'),
(10, 10489983, 1, '', 1, NULL, 'Wednesday', '2:00 PM'),
(11, 85718351, 1, '', 1, NULL, 'Tuesday', '2:00 PM'),
(12, 43481125, 1, '', 1, NULL, 'Thursday', '2:00 PM'),
(13, 57301413, 1, '', 1, NULL, 'Monday', '2:00 PM'),
(14, 55623363, 1, '', 1, NULL, 'Thursday', '10:00 AM'),
(15, 70733046, 1, '', 1, NULL, 'Monday', '12:00 PM'),
(16, 29064982, 1, '', 1, NULL, 'Wednesday', '10:00 AM'),
(17, 73246858, 1, '', 1, NULL, 'Monday', '2:00 PM'),
(18, 52208065, 1, '', 1, NULL, 'Wednesday', '12:00 PM'),
(19, 31677322, 1, '', 1, NULL, 'Thursday', '12:00 PM'),
(20, 71941792, 1, '', 1, NULL, 'Friday', '12:00 PM'),
(21, 59219640, 1, '', 1, NULL, 'Tuesday', '10:00 AM'),
(22, 25647221, 1, '', 1, NULL, 'Tuesday', '12:00 PM'),
(23, 56787568, 1, '', 1, NULL, 'Wednesday', '2:00 PM'),
(24, 30108431, 1, '', 1, NULL, 'Thursday', '12:00 PM'),
(25, 26225313, 1, '', 1, NULL, 'Wednesday', '10:00 AM'),
(26, 51792355, 1, '', 1, NULL, 'Friday', '12:00 PM'),
(27, 16114836, 1, '', 1, NULL, 'Wednesday', '10:00 AM'),
(28, 89489351, 1, '', 1, NULL, 'Monday', '12:00 PM'),
(29, 29094838, 1, '', 1, NULL, 'Thursday', '12:00 PM'),
(30, 69690543, 1, '', 1, NULL, 'Wednesday', '2:00 PM'),
(31, 24903731, 1, '', 1, NULL, 'Wednesday', '10:00 AM'),
(32, 38587263, 1, '', 1, NULL, 'Friday', '10:00 AM'),
(33, 65614588, 1, '', 1, NULL, 'Monday', '12:00 PM'),
(34, 89526734, 1, '', 1, NULL, 'Monday', '10:00 AM'),
(35, 40514398, 1, '', 1, NULL, 'Thursday', '12:00 PM'),
(36, 37115976, 1, '', 1, NULL, 'Friday', '2:00 PM'),
(37, 46062270, 1, '', 1, NULL, 'Monday', '12:00 PM'),
(38, 34066991, 1, '', 1, NULL, 'Wednesday', '12:00 PM'),
(39, 15544102, 1, '', 1, NULL, 'Tuesday', '12:00 PM'),
(40, 73776341, 1, '', 1, NULL, 'Friday', '10:00 AM'),
(41, 77192728, 1, '', 1, NULL, 'Thursday', '10:00 AM'),
(42, 14086675, 1, '', 1, NULL, 'Tuesday', '2:00 PM'),
(43, 47990081, 1, '', 1, NULL, 'Friday', '10:00 AM'),
(44, 41207308, 1, '', 1, NULL, 'Wednesday', '2:00 PM'),
(45, 66129491, 1, '', 1, NULL, 'Wednesday', '2:00 PM'),
(46, 43493736, 1, '', 1, NULL, 'Tuesday', '12:00 PM'),
(47, 65660894, 1, '', 1, NULL, 'Tuesday', '12:00 PM'),
(48, 83777646, 1, '', 1, NULL, 'Wednesday', '12:00 PM'),
(49, 74422102, 1, '', 1, NULL, 'Tuesday', '12:00 PM'),
(50, 70561877, 1, '', 1, NULL, 'Monday', '2:00 PM'),
(51, 66307656, 1, '', 1, NULL, 'Monday', '2:00 PM'),
(52, 41368026, 1, '', 1, NULL, 'Friday', '10:00 AM'),
(53, 74156951, 1, '', 1, NULL, 'Monday', '10:00 AM'),
(54, 17718355, 1, '', 1, NULL, 'Tuesday', '10:00 AM'),
(55, 39220356, 1, '', 1, NULL, 'Friday', '2:00 PM'),
(56, 30852077, 1, '', 1, NULL, 'Monday', '10:00 AM'),
(57, 65420998, 1, '', 1, NULL, 'Wednesday', '12:00 PM'),
(58, 67374033, 1, '', 1, NULL, 'Friday', '12:00 PM'),
(59, 69739536, 1, '', 1, NULL, 'Thursday', '10:00 AM'),
(60, 13162138, 1, '', 1, NULL, 'Thursday', '2:00 PM'),
(61, 74612856, 1, '', 1, NULL, 'Thursday', '10:00 AM'),
(62, 29542691, 1, '', 1, NULL, 'Friday', '10:00 AM'),
(63, 78927017, 1, '', 1, NULL, 'Friday', '12:00 PM'),
(64, 31063274, 1, '', 1, NULL, 'Thursday', '2:00 PM'),
(65, 18487091, 1, '', 1, NULL, 'Friday', '10:00 AM'),
(66, 65837597, 1, '', 1, NULL, 'Wednesday', '12:00 PM'),
(67, 51326910, 1, '', 1, NULL, 'Wednesday', '2:00 PM'),
(68, 48486971, 1, '', 1, NULL, 'Monday', '12:00 PM'),
(69, 26095476, 1, '', 1, NULL, 'Wednesday', '12:00 PM'),
(70, 43587808, 1, '', 1, NULL, 'Friday', '2:00 PM'),
(71, 56981046, 1, '', 1, NULL, 'Friday', '12:00 PM'),
(72, 36598285, 1, '', 1, NULL, 'Friday', '2:00 PM'),
(73, 14322497, 1, '', 1, NULL, 'Monday', '12:00 PM'),
(74, 34943837, 1, '', 1, NULL, 'Monday', '10:00 AM'),
(75, 16733250, 1, '', 1, NULL, 'Tuesday', '10:00 AM'),
(76, 80920157, 1, '', 1, NULL, 'Wednesday', '10:00 AM'),
(77, 74096291, 1, '', 1, NULL, 'Friday', '2:00 PM'),
(78, 41831267, 1, '', 1, NULL, 'Tuesday', '2:00 PM'),
(79, 41686018, 1, '', 1, NULL, 'Thursday', '10:00 AM'),
(80, 63715072, 1, '', 1, NULL, 'Friday', '12:00 PM'),
(81, 84508817, 1, '', 1, NULL, 'Monday', '2:00 PM'),
(82, 23107465, 1, '', 1, NULL, 'Thursday', '12:00 PM'),
(83, 86000815, 1, '', 1, NULL, 'Wednesday', '2:00 PM'),
(84, 78585952, 1, '', 1, NULL, 'Tuesday', '10:00 AM'),
(85, 60425370, 1, '', 1, NULL, 'Thursday', '2:00 PM'),
(86, 37260652, 1, '', 1, NULL, 'Monday', '10:00 AM'),
(87, 34834116, 1, '', 1, NULL, 'Friday', '2:00 PM'),
(88, 55876566, 1, '', 1, NULL, 'Tuesday', '2:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `Council`
--

CREATE TABLE `Council` (
  `council_id` int(10) NOT NULL,
  `academic_year` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Council`
--

INSERT INTO `Council` (`council_id`, `academic_year`) VALUES
(1, '2016-2017');

-- --------------------------------------------------------

--
-- Table structure for table `Council_Members`
--

CREATE TABLE `Council_Members` (
  `council_member_id` int(10) NOT NULL,
  `user` int(8) NOT NULL,
  `council_id` int(10) NOT NULL,
  `position` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Council_Members`
--

INSERT INTO `Council_Members` (`council_member_id`, `user`, `council_id`, `position`) VALUES
(1, 16114836, 1, 'Head Coordinator'),
(2, 56981046, 1, 'Admitted Eagle Day Coordinator'),
(3, 49705582, 1, 'Eagle for a Day Coordinator'),
(4, 56226194, 1, 'Eagle for a Day Coordinator'),
(5, 50917926, 1, 'Tours Coordinator'),
(6, 38587263, 1, 'International Outreach Coordinator'),
(7, 71939373, 1, 'AHANA Outreach Coordinator'),
(8, 80627466, 1, 'Media Coordinator'),
(9, 34834116, 1, 'Eagle for a Day Coordinator'),
(10, 10263464, 1, 'Transfer Outreach Coordinator'),
(11, 36598285, 1, 'Office Management Coordinator'),
(12, 29542691, 1, 'Greeting Coordinator'),
(13, 84462221, 1, 'Outreach/HS Visits Coordinator'),
(14, 70733046, 1, 'Panels Coordinator');

-- --------------------------------------------------------

--
-- Table structure for table `Groups`
--

CREATE TABLE `Groups` (
  `group_id` int(10) NOT NULL,
  `group_name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Groups`
--

INSERT INTO `Groups` (`group_id`, `group_name`) VALUES
(1, 'Council'),
(2, 'Volunteer'),
(3, 'Staff'),
(4, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `Group_Members`
--

CREATE TABLE `Group_Members` (
  `group_member_id` int(10) NOT NULL,
  `user` int(8) NOT NULL,
  `group_id` int(10) NOT NULL,
  `access` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Group_Members`
--

INSERT INTO `Group_Members` (`group_member_id`, `user`, `group_id`, `access`) VALUES
(1, 16114836, 1, 'edit'),
(2, 16114836, 2, 'edit'),
(3, 56981046, 1, 'edit'),
(4, 56981046, 2, 'edit'),
(5, 49705582, 1, 'edit'),
(6, 49705582, 2, 'edit'),
(7, 56226194, 1, 'edit'),
(8, 56226194, 2, 'edit'),
(9, 50917926, 1, 'edit'),
(10, 50917926, 2, 'edit'),
(11, 38587263, 1, 'edit'),
(12, 38587263, 2, 'edit'),
(13, 71939373, 1, 'edit'),
(14, 71939373, 2, 'edit'),
(15, 80627466, 1, 'edit'),
(16, 80627466, 2, 'edit'),
(17, 34834116, 1, 'edit'),
(18, 34834116, 2, 'edit'),
(19, 10263464, 1, 'edit'),
(20, 10263464, 2, 'edit'),
(21, 36598285, 1, 'edit'),
(22, 36598285, 2, 'edit'),
(23, 29542691, 1, 'edit'),
(24, 29542691, 2, 'edit'),
(25, 84462221, 1, 'edit'),
(26, 84462221, 2, 'edit'),
(27, 70733046, 1, 'edit'),
(28, 70733046, 2, 'edit'),
(29, 76280038, 2, 'view'),
(30, 70108661, 2, 'view'),
(31, 15831854, 2, 'view'),
(32, 86647814, 2, 'view'),
(33, 30355187, 2, 'view'),
(34, 77799508, 2, 'view'),
(35, 35010404, 2, 'view'),
(36, 47707086, 2, 'view'),
(37, 10489983, 2, 'view'),
(38, 85718351, 2, 'view'),
(39, 43481125, 2, 'view'),
(40, 57301413, 2, 'view'),
(41, 55623363, 2, 'view'),
(42, 29064982, 2, 'view'),
(43, 73246858, 2, 'view'),
(44, 52208065, 2, 'view'),
(45, 31677322, 2, 'view'),
(46, 71941792, 2, 'view'),
(47, 59219640, 2, 'view'),
(48, 25647221, 2, 'view'),
(49, 56787568, 2, 'view'),
(50, 30108431, 2, 'view'),
(51, 26225313, 2, 'view'),
(52, 51792355, 2, 'view'),
(53, 89489351, 2, 'view'),
(54, 29094838, 2, 'view'),
(55, 69690543, 2, 'view'),
(56, 24903731, 2, 'view'),
(57, 14021842, 2, 'view'),
(58, 65614588, 2, 'view'),
(59, 89526734, 2, 'view'),
(60, 40514398, 2, 'view'),
(61, 24402947, 2, 'view'),
(62, 37115976, 2, 'view'),
(63, 46062270, 2, 'view'),
(64, 34066991, 2, 'view'),
(65, 15544102, 2, 'view'),
(66, 73776341, 2, 'view'),
(67, 77192728, 2, 'view'),
(68, 14086675, 2, 'view'),
(69, 47990081, 2, 'view'),
(70, 41207308, 2, 'view'),
(71, 66129491, 2, 'view'),
(72, 43493736, 2, 'view'),
(73, 65660894, 2, 'view'),
(74, 83777646, 2, 'view'),
(75, 74422102, 2, 'view'),
(76, 70561877, 2, 'view'),
(77, 66307656, 2, 'view'),
(78, 41368026, 2, 'view'),
(79, 74156951, 2, 'view'),
(80, 17718355, 2, 'view'),
(81, 39220356, 2, 'view'),
(82, 30852077, 2, 'view'),
(83, 65420998, 2, 'view'),
(84, 67374033, 2, 'view'),
(85, 69739536, 2, 'view'),
(86, 13162138, 2, 'view'),
(87, 74612856, 2, 'view'),
(88, 78927017, 2, 'view'),
(89, 31063274, 2, 'view'),
(90, 18487091, 2, 'view'),
(91, 65837597, 2, 'view'),
(92, 51326910, 2, 'view'),
(93, 48486971, 2, 'view'),
(94, 26095476, 2, 'view'),
(95, 43587808, 2, 'view'),
(96, 14322497, 2, 'view'),
(97, 34943837, 2, 'view'),
(98, 16733250, 2, 'view'),
(99, 80920157, 2, 'view'),
(100, 74096291, 2, 'view'),
(101, 41831267, 2, 'view'),
(102, 42428621, 2, 'view'),
(103, 41686018, 2, 'view'),
(104, 63715072, 2, 'view'),
(105, 84508817, 2, 'view'),
(106, 23107465, 2, 'view'),
(107, 86000815, 2, 'view'),
(108, 78585952, 2, 'view'),
(109, 60425370, 2, 'view'),
(110, 37260652, 2, 'view'),
(111, 55876566, 2, 'view'),
(112, 12345678, 2, 'view');

-- --------------------------------------------------------

--
-- Table structure for table `Notes`
--

CREATE TABLE `Notes` (
  `note_id` int(10) NOT NULL,
  `user` int(8) NOT NULL,
  `submitted_by` int(8) NOT NULL,
  `submitted` datetime NOT NULL,
  `program` int(10) DEFAULT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Programming_Weeks`
--

CREATE TABLE `Programming_Weeks` (
  `week_id` int(10) NOT NULL,
  `week_number` int(2) NOT NULL,
  `semester` varchar(6) NOT NULL,
  `year` int(4) NOT NULL,
  `sunday_date` date NOT NULL,
  `monday_date` date NOT NULL,
  `tuesday_date` date NOT NULL,
  `wednesday_date` date NOT NULL,
  `thursday_date` date NOT NULL,
  `friday_date` date NOT NULL,
  `saturday_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Programming_Weeks`
--

INSERT INTO `Programming_Weeks` (`week_id`, `week_number`, `semester`, `year`, `sunday_date`, `monday_date`, `tuesday_date`, `wednesday_date`, `thursday_date`, `friday_date`, `saturday_date`) VALUES
(1, 1, 'Spring', 2016, '2016-02-07', '2016-02-08', '2016-02-09', '2016-02-10', '2016-02-11', '2016-02-12', '2016-02-13'),
(4, 1, 'Fall', 2016, '2016-09-18', '2016-09-19', '2016-09-20', '2016-09-21', '2016-09-21', '2016-09-22', '2016-09-23'),
(5, 2, 'Fall', 2016, '2016-09-25', '2016-09-26', '2016-09-27', '2016-09-28', '2016-09-29', '2016-09-30', '2016-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `Programs`
--

CREATE TABLE `Programs` (
  `program_id` int(10) NOT NULL,
  `program_name` varchar(30) NOT NULL,
  `coordinator` int(8) NOT NULL,
  `semester` varchar(6) NOT NULL,
  `year` int(4) NOT NULL,
  `requirements` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Programs`
--

INSERT INTO `Programs` (`program_id`, `program_name`, `coordinator`, `semester`, `year`, `requirements`) VALUES
(1, 'Panels', 12345678, 'Spring', 2016, '2 Extra Panels');

-- --------------------------------------------------------

--
-- Table structure for table `Program_Members`
--

CREATE TABLE `Program_Members` (
  `member_id` int(10) NOT NULL,
  `user` int(8) NOT NULL,
  `program` int(10) NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `shift_day` varchar(10) DEFAULT NULL,
  `shift_time` varchar(15) DEFAULT NULL,
  `requirements_status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Program_Members`
--

INSERT INTO `Program_Members` (`member_id`, `user`, `program`, `title`, `shift_day`, `shift_time`, `requirements_status`) VALUES
(91, 76280038, 1, NULL, 'Thursday', '12:00 PM', 'Complete'),
(92, 70108661, 1, NULL, 'Tuesday', '2:00 PM', 'Complete'),
(93, 15831854, 1, NULL, 'Tuesday', '10:00 AM', 'Complete'),
(94, 86647814, 1, NULL, 'Monday', '2:00 PM', 'Complete'),
(95, 30355187, 1, NULL, 'Tuesday', '2:00 PM', 'Complete'),
(96, 12345678, 1, NULL, 'Friday', '10:00 AM', 'Complete'),
(97, 77799508, 1, NULL, 'Thursday', '10:00 AM', 'Complete'),
(98, 35010404, 1, NULL, 'Tuesday', '10:00 AM', 'Complete'),
(99, 47707086, 1, NULL, 'Tuesday', '2:00 PM', 'Complete'),
(100, 10489983, 1, NULL, 'Wednesday', '2:00 PM', 'Complete'),
(101, 85718351, 1, NULL, 'Tuesday', '2:00 PM', 'Complete'),
(102, 43481125, 1, NULL, 'Thursday', '2:00 PM', 'Complete'),
(103, 57301413, 1, NULL, 'Monday', '2:00 PM', 'Complete'),
(104, 55623363, 1, NULL, 'Thursday', '10:00 AM', 'Complete'),
(105, 70733046, 1, NULL, 'Monday', '12:00 PM', 'Complete'),
(106, 29064982, 1, NULL, 'Wednesday', '10:00 AM', 'Complete'),
(107, 73246858, 1, NULL, 'Monday', '2:00 PM', 'Complete'),
(108, 52208065, 1, NULL, 'Wednesday', '12:00 PM', 'Complete'),
(109, 31677322, 1, NULL, 'Thursday', '12:00 PM', 'Complete'),
(110, 71941792, 1, NULL, 'Friday', '12:00 PM', 'Complete'),
(111, 59219640, 1, NULL, 'Tuesday', '10:00 AM', 'Complete'),
(112, 25647221, 1, NULL, 'Tuesday', '12:00 PM', 'Complete'),
(113, 56787568, 1, NULL, 'Wednesday', '2:00 PM', 'Complete'),
(114, 30108431, 1, NULL, 'Thursday', '12:00 PM', 'Complete'),
(115, 26225313, 1, NULL, 'Monday', '10:00 AM', 'Complete'),
(116, 51792355, 1, NULL, 'Friday', '12:00 PM', 'Complete'),
(117, 16114836, 1, NULL, 'Wednesday', '10:00 AM', 'Complete'),
(118, 89489351, 1, NULL, 'Monday', '12:00 PM', 'Complete'),
(119, 29094838, 1, NULL, 'Thursday', '12:00 PM', 'Complete'),
(120, 69690543, 1, NULL, 'Tuesday', '2:00 PM', 'Complete'),
(121, 24903731, 1, NULL, 'Wednesday', '10:00 AM', 'Complete'),
(122, 38587263, 1, NULL, 'Friday', '10:00 AM', 'Complete'),
(123, 65614588, 1, NULL, 'Monday', '12:00 PM', 'Complete'),
(124, 89526734, 1, NULL, 'Monday', '10:00 AM', 'Complete'),
(125, 40514398, 1, NULL, 'Thursday', '12:00 PM', 'Complete'),
(126, 37115976, 1, NULL, 'Friday', '2:00 PM', 'Complete'),
(127, 46062270, 1, NULL, 'Monday', '12:00 PM', 'Complete'),
(128, 34066991, 1, NULL, 'Wednesday', '12:00 PM', 'Complete'),
(129, 15544102, 1, NULL, 'Tuesday', '12:00 PM', 'Complete'),
(130, 73776341, 1, NULL, 'Friday', '10:00 AM', 'Complete'),
(131, 77192728, 1, NULL, 'Thursday', '10:00 AM', 'Complete'),
(132, 14086675, 1, NULL, 'Tuesday', '2:00 PM', 'Complete'),
(133, 47990081, 1, NULL, 'Friday', '10:00 AM', 'Complete'),
(134, 41207308, 1, NULL, 'Wednesday', '2:00 PM', 'Complete'),
(135, 66129491, 1, NULL, 'Wednesday', '2:00 PM', 'Complete'),
(136, 43493736, 1, NULL, 'Tuesday', '12:00 PM', 'Complete'),
(137, 65660894, 1, NULL, 'Tuesday', '12:00 PM', 'Complete'),
(138, 83777646, 1, NULL, 'Wednesday', '12:00 PM', 'Complete'),
(139, 74422102, 1, NULL, 'Tuesday', '12:00 PM', 'Complete'),
(140, 70561877, 1, NULL, 'Monday', '2:00 PM', 'Complete'),
(141, 66307656, 1, NULL, 'Monday', '2:00 PM', 'Complete'),
(142, 41368026, 1, NULL, 'Friday', '10:00 AM', 'Complete'),
(143, 74156951, 1, NULL, 'Monday', '10:00 AM', 'Complete'),
(144, 17718355, 1, NULL, 'Tuesday', '10:00 AM', 'Complete'),
(145, 39220356, 1, NULL, 'Friday', '2:00 PM', 'Complete'),
(146, 30852077, 1, NULL, 'Monday', '10:00 AM', 'Complete'),
(147, 65420998, 1, NULL, 'Wednesday', '12:00 PM', 'Complete'),
(148, 67374033, 1, NULL, 'Friday', '12:00 PM', 'Complete'),
(149, 69739536, 1, NULL, 'Thursday', '10:00 AM', 'Complete'),
(150, 13162138, 1, NULL, 'Thursday', '2:00 PM', 'Complete'),
(151, 74612856, 1, NULL, 'Thursday', '10:00 AM', 'Complete'),
(152, 29542691, 1, NULL, 'Friday', '10:00 AM', 'Complete'),
(153, 78927017, 1, NULL, 'Friday', '12:00 PM', 'Complete'),
(154, 31063274, 1, NULL, 'Thursday', '2:00 PM', 'Complete'),
(155, 18487091, 1, NULL, 'Friday', '10:00 AM', 'Complete'),
(156, 65837597, 1, NULL, 'Wednesday', '12:00 PM', 'Complete'),
(157, 51326910, 1, NULL, 'Wednesday', '2:00 PM', 'Complete'),
(158, 48486971, 1, NULL, 'Monday', '12:00 PM', 'Complete'),
(159, 26095476, 1, NULL, 'Wednesday', '12:00 PM', 'Complete'),
(160, 43587808, 1, NULL, 'Friday', '2:00 PM', 'Complete'),
(161, 56981046, 1, NULL, 'Friday', '12:00 PM', 'Complete'),
(162, 36598285, 1, NULL, 'Friday', '2:00 PM', 'Complete'),
(163, 14322497, 1, NULL, 'Monday', '12:00 PM', 'Complete'),
(164, 34943837, 1, NULL, 'Monday', '10:00 AM', 'Complete'),
(165, 16733250, 1, NULL, 'Tuesday', '10:00 AM', 'Complete'),
(166, 80920157, 1, NULL, 'Wednesday', '10:00 AM', 'Complete'),
(167, 74096291, 1, NULL, 'Friday', '2:00 PM', 'Complete'),
(168, 41831267, 1, NULL, 'Tuesday', '2:00 PM', 'Complete'),
(169, 41686018, 1, NULL, 'Thursday', '10:00 AM', 'Complete'),
(170, 63715072, 1, NULL, 'Friday', '12:00 PM', 'Complete'),
(171, 84508817, 1, NULL, 'Monday', '2:00 PM', 'Complete'),
(172, 23107465, 1, NULL, 'Thursday', '12:00 PM', 'Complete'),
(173, 86000815, 1, NULL, 'Wednesday', '2:00 PM', 'Complete'),
(174, 78585952, 1, NULL, 'Tuesday', '10:00 AM', 'Complete'),
(175, 60425370, 1, NULL, 'Thursday', '2:00 PM', 'Complete'),
(176, 37260652, 1, NULL, 'Monday', '10:00 AM', 'Complete'),
(177, 34834116, 1, NULL, 'Friday', '2:00 PM', 'Complete'),
(178, 55876566, 1, NULL, 'Monday', '2:00 PM', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `eagle_id` int(8) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `class` int(4) NOT NULL,
  `school` varchar(4) NOT NULL,
  `major` varchar(40) NOT NULL,
  `minor` varchar(40) DEFAULT NULL,
  `hometown` varchar(30) NOT NULL,
  `state_country` varchar(20) NOT NULL,
  `international` varchar(3) NOT NULL,
  `ahana` varchar(3) NOT NULL,
  `transfer` varchar(3) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `local_address` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `position` varchar(40) NOT NULL,
  `updated` datetime NOT NULL,
  `joined` date NOT NULL,
  `applied_tours` int(1) DEFAULT NULL,
  `applied_panels` int(1) DEFAULT NULL,
  `applied_council` int(1) DEFAULT NULL,
  `applied_summer` int(1) DEFAULT NULL,
  `active` varchar(15) NOT NULL,
  `Time` varchar(50) NOT NULL,
  `Ip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`eagle_id`, `first_name`, `last_name`, `sex`, `class`, `school`, `major`, `minor`, `hometown`, `state_country`, `international`, `ahana`, `transfer`, `phone`, `email`, `local_address`, `password`, `position`, `updated`, `joined`, `applied_tours`, `applied_panels`, `applied_council`, `applied_summer`, `active`, `Time`, `Ip`) VALUES
(10263464, 'Beth', 'Yarze', 'F', 2017, 'MCAS', 'Political Science & Philosophy', 'N/A', 'Queensbury', 'NY', 'No', 'No', 'Yes', '518-260-6911', 'yarze@bc.edu', 'Iggy A22', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Transfer Outreach Coordinator', '2016-07-28 23:19:22', '2016-07-28', 0, 0, 0, 0, 'Yes', '', ''),
(10489983, 'Maxwell', 'Bechtold', 'M', 2018, 'MCAS', 'History', '', 'Madison', 'CT', 'No', 'No', 'No', '2034949700', 'bechtolm', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(12345678, 'Thomas', 'Banfield', 'M', 2017, 'MCAS', 'English', '', 'Westchester', 'NY', 'No', 'No', 'No', '914-318-9294', 'banfielt@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Panels Coordinator', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, '', '', ''),
(13162138, 'Laurie', 'O''Riordan', 'F', 2016, 'CSOM', 'Marketing, Business Analytics', 'History, International Studies', 'Parma Heights', 'OH', 'No', 'No', 'No', '(216) 906-33', 'oriordal@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(14021842, 'Emma', 'Harney', 'F', 2017, 'CSOM', 'Management and Leadership, Business Anal', 'Studio Art', 'South Yarmouth', 'MA', 'No', 'No', 'No', '5082218839', 'harneyem@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(14086675, 'Shea', 'Kuhl', 'F', 2017, 'CSON', 'Nursing ', '', 'Bedford', 'MA', 'No', 'No', 'No', '6178510644', 'kuhls@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(14322497, 'Nicholas', 'Reed', 'M', 2017, 'MCAS', 'Economics', 'History', 'Newton', 'MA', 'No', 'No', 'Yes', '(617) 875-38', 'reedna@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(15544102, 'Nate', 'Kennelly', 'M', 2016, 'MCAS', 'Economics', 'History', 'Ramsey', 'NJ', 'No', 'No', 'No', '(201) 316-52', 'kennelln@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(15831854, 'Jonathan', 'Amdur', 'M', 2016, 'MCAS', 'Math', 'Philosophy', 'Babylon', 'NY', 'No', 'No', 'No', '6319437890', 'Andurj@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(16114836, 'Jon', 'Giara', 'M', 2017, 'MCAS', 'Computer Science', 'Bioinformatics', 'Attleboro', 'MA', 'No', 'No', 'No', '508-838-7443', 'giara@bc.edu', '14 Hammondswood Rd', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Head Coordinator', '2016-07-28 23:19:22', '2016-07-28', 2, 2, 2, 1, 'Yes', '', ''),
(16733250, 'Eric', 'Sanfilippo', 'M', 2018, 'MCAS', 'Biology', 'French', 'East Lyme', 'CT', 'No', 'No', 'No', '8604603849', 'sanfilie@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(17718355, 'Sarah', 'Moore', 'F', 2017, 'MCAS', 'English', 'Hispanic Studies', 'Olney', 'MD', 'No', 'No', 'No', '(301)452-246', 'moorebx@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(18487091, 'Erica', 'Pascocello', 'F', 2018, 'CSOM', 'Accounting', 'French', 'Haddonfield', 'NJ', 'No', 'No', 'No', '8566697238', 'pascocel@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(23107465, 'Matthew', 'Ulrich', 'M', 2017, 'MCAS', 'Mathematics and Economics', 'Philosophy', 'Clinton', 'NJ', 'No', 'No', 'No', '(908) 894-22', 'ulrichmc@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(24402947, 'Debbie', 'Jean-Philippe', 'F', 2016, 'CSOM', 'Accounting', 'Pre-Law', 'Waltham', 'MA', 'No', 'Yes', 'No', '7818128956', 'jeanphid@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(24903731, 'Jacqueline', 'Hannon', 'F', 2016, 'LSOE', 'Elementary Ed/ APHD', '', 'Middlebury', 'CT', 'No', 'No', 'No', '(203) 560-48', 'hannonjf@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(25647221, 'Anne', 'Dovolis', 'F', 2018, 'CSOM', 'Accounting, Business Analytics', '', 'Edina', 'MN', 'No', 'No', 'No', '(612) 940-39', 'dovolisa@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(26095476, 'William', 'Pisano', 'M', 2018, 'MCAS', 'Biochemistry', 'Economics', 'Tarpon Springs', 'FL', 'No', 'No', 'No', '(727)-433-27', 'pisanowi@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(26225313, 'Ashlynn', 'Fields', 'F', 2016, 'LSOE', 'Applied Psychology & Human Development; ', '', 'West Orange', 'NJ', 'No', 'Yes', 'No', '(201)463-406', 'fieldsas@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(29064982, 'Emma ', 'Catranis', 'F', 2018, 'MCAS', 'Communication', 'English', 'Toms River', 'NJ', 'No', 'No', 'No', '732-998-0524', 'catranis@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(29094838, 'Hilary', 'Gould', 'F', 2018, 'CSOM', 'Undecided', 'International Studies', 'Winnetka', 'IL', 'No', 'No', 'No', '(847) 363-49', 'gouldh@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(29542691, 'Emi', 'Omick', 'F', 2017, 'CSOM', 'Management; Concentration in Finance', 'Faith, Peach and Justice Studies', 'Tucson', 'AZ', 'No', 'No', 'No', '520-401-5151', 'omick@bc.edu', 'Ruby C24', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Greeting Coordinator', '2016-07-28 23:19:22', '2016-07-28', 0, 0, 0, 0, 'Yes', '', ''),
(30108431, 'Elizabeth ', 'Farrenkopf ', 'F', 2016, 'MCAS', 'International Relations, Political Scien', '', 'Lynnfield', 'Ma', 'No', 'No', 'No', '7815800019', 'farrenke@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(30355187, 'Sophia', 'Andreadis', 'F', 2016, 'CSOM', 'Marketing, Management & Leadership', '', 'Warren', 'RI', 'No', 'No', 'No', '401-440-9654', 'andreads@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(30852077, 'Daniel', 'Moren', 'M', 2016, 'MCAS', 'Biology', 'Math', 'Warwick', 'RI', 'No', 'No', 'No', '401-529-4012', 'moren@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(31063274, 'Jordan', 'Panza', 'F', 2017, 'CSOM', 'Marketing, Information Systems', '', 'Watertown', 'MA', 'No', 'No', 'No', '6174582071', 'Panzajo@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(31677322, 'Vanessa', 'Contratto', 'F', 2018, 'MCAS', 'International Studies', 'Spanish', 'Palos Verdes', 'CA', 'No', 'No', 'No', '3109442666', 'contratt@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(34066991, 'Megan', 'Kelly', 'F', 2017, 'CSOM', 'Marketing / Management & Leadership', 'Women''s and Gender Studies', 'Cleveland', 'OH', 'No', 'No', 'No', '(440) 539-94', 'kellyvk@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(34834116, 'Haydn', 'White', 'F', 2018, 'MCAS', 'Psychology', 'Biology', 'Lexington', 'KY', 'No', 'No', 'No', '859-779-8754', 'whiteqo@bc.edu', '2000 Comm Ave', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'EFAD Coordinator', '2016-07-28 23:19:22', '2016-07-28', 0, 0, 0, 0, 'Yes', '', ''),
(34943837, 'Sloan', 'Renfro', 'F', 2016, 'MCAS', 'History', 'Medical Humanities', 'Greenville', 'SC', 'No', 'No', 'No', '8649795899', 'renfrosl@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(35010404, 'Brooke', 'Bartlett', 'F', 2017, 'CSOM', 'Finance and Operations Management ', '', 'Lincolnshire', 'IL', 'No', 'No', 'No', '(847) 682-84', 'bartleba@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(36598285, 'Kevin', 'Reardon', 'M', 2018, 'CSOM', 'Accounting', 'History', 'Wilmington', 'DE', 'No', 'No', 'No', '302-668-3437', 'Reardokd@bc.edu', 'Off campus (64 Undine Rd)', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'OM Coordinator', '2016-07-28 23:19:22', '2016-07-28', 0, 0, 0, 0, 'Yes', '', ''),
(37115976, 'Elizabeth', 'Joseph', 'F', 2019, 'MCAS', 'psychology ', '', 'Natick', 'MA', 'No', 'No', 'No', '(774)270-279', 'josephee@bc.edu ', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(37260652, 'Kira', 'Welcenbach', 'F', 2018, 'CSOM', 'Finance, Economics', 'History', 'Milwaukee', 'WI', 'No', 'No', 'No', '(414) 708-74', 'welcenba@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(38587263, 'Will', 'Hennessy', 'M', 2017, 'CSOM', 'Computer Science CSOM', 'n/a', 'New Canaan', 'CT', 'No', 'No', 'No', '203-803-8450', 'henneswa@bc.edu', 'Rubi', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'IO Coordinator', '2016-07-28 23:19:22', '2016-07-28', 0, 0, 0, 0, 'Yes', '', ''),
(39220356, 'Pedro', 'Mora', 'M', 2016, 'CSOM', 'Finance, Corporate Reporting', 'Hispanic Studies', 'Shrewsbury', 'MA', 'No', 'Yes', 'No', '508-523-3335', 'morap@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(40514398, 'Solina', 'Jean-Louis', 'F', 2018, 'MCAS', 'International Studies, German', '', 'Atlanta', 'GA', 'No', 'Yes', 'No', '(404) 713-69', 'jeanloso@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(41207308, 'Kristen', 'Leach', 'F', 2018, 'MCAS', 'Biology', 'Mathematics', 'Peachtree Corners', 'GA', 'No', 'No', 'No', '(770)595-395', 'leachkr@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(41368026, 'Claire', 'Messina', 'F', 2017, 'LSOE', 'Elementary Education and Math/Computer S', 'Middle School Math', 'Cold Spring Harbor', 'NY', 'No', 'No', 'No', '(516) 946-16', 'messincl@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(41686018, 'Laura', 'Stateler', 'F', 2018, 'MCAS', 'International Studies and Philosophy ', 'Political Science ', 'Golden', 'CO', 'No', 'No', 'No', '303-396-8206', 'stateler@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(41831267, 'Russell', 'Simons', 'M', 2017, 'MCAS', 'Biology', 'Medical Humanities', 'Larchmont', 'NY', 'No', 'No', 'No', '9149608925', 'simonsru@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(42428621, 'Kaitlyn ', 'Solano', 'F', 2017, 'MCAS', 'Linguistics. International Studies', '', 'Norwalk', 'CT', 'No', 'No', 'No', '(203) 913-59', 'solanok@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(43481125, 'James', 'Berkman', 'M', 2016, 'MCAS', 'History', 'IS', 'Bernardsville', 'NJ', 'No', 'No', 'No', '9086259338', 'berkmaja@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(43493736, 'Bobby', 'Looney', 'M', 2017, 'CSOM', 'Finance and Marketing', '', 'Mansfield', 'MA', 'No', 'No', 'No', '5082696109', 'looneyra@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(43587808, 'Katherine', 'Quinn', 'F', 2016, 'MCAS', 'Biology; Theology', '', 'Queenstown', 'MD', 'No', 'No', 'No', '4439888143', 'quinnkx@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(46062270, 'Joe', 'Kelly', 'M', 2016, 'CSOM', 'Finance and Economics', '', 'Colts Neck', 'NJ', 'No', 'No', 'No', '908-907-8671', 'kellyaai@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(47707086, 'Joshua ', 'Beauregard', 'M', 2017, 'MCAS', 'Communication', 'American Studies', 'Northbridge', 'MA', 'No', 'No', 'No', '(774)482-041', 'beaurejo@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(47990081, 'Matthew', 'Lavelle', 'M', 2017, 'CSOM', 'Management', 'Finance and Marketing', 'Worcester', 'MA', 'No', 'No', 'No', '508-688-5768', 'lavellmb@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(48486971, 'Sade', 'Phipps', 'F', 2016, 'LSOE', 'Applied Psychology and Human Development', 'Sociology and African and African Diaspo', 'Boston', 'MA', 'No', 'Yes', 'No', '(617) 602-52', 'phippss@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(49705582, 'Chloe', 'Mansour', 'F', 2017, 'LSOE', 'Applied Psychology and Human Development', 'Management and Leadership', 'Laguna Beach', 'CA', 'No', 'No', 'No', '949-280-7923', 'mansourc@bc.edu', 'Ruby', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'EFAD Coordinator', '2016-07-28 23:19:22', '2016-07-28', 0, 0, 0, 0, 'Yes', '', ''),
(50917926, 'Kristin', 'Morisseau', 'F', 2017, 'MCAS', 'Economics &a communication', 'None', 'Verona', 'NJ', 'No', 'No', 'No', '862-220-5093', 'Morissek@bc.edu', 'MOD 24A', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Tours Coordinator', '2016-07-28 23:19:22', '2016-07-28', 0, 0, 0, 0, 'Yes', '', ''),
(51326910, 'Paola', 'Perez', 'F', 2016, 'CSOM', 'Accounting, French ', '', 'San Juan', 'Puerto Rico ', 'No', 'Yes', 'No', '7876747126', 'perezpd@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(51792355, 'Brandon', 'Gallagher', 'M', 2017, 'CSOM', 'Accounting', 'Theology', 'Annandale', 'NJ', 'No', 'No', 'No', '(908) 566-57', 'gallagcl@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(52208065, 'Kim ', 'Chook', 'F', 2018, 'MCAS', 'Communication', 'English / Leadership and Management', 'Sharon', 'MA', 'No', 'Yes', 'No', '781-686-6222', 'chook@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(55623363, 'Deven', 'Bhattacharya', 'M', 2019, 'MCAS', 'Political Science', '', 'Freehold', 'NJ', 'No', 'No', 'No', '(732) 915-74', 'bhattade@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(55876566, 'Aoyi', 'Yang', 'F', 2018, 'LSOE', 'Applied Psychology and Human Development', 'Music', 'Shanghai', 'China', 'Yes', 'Yes', 'No', '6177687413', 'yangaw@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(56226194, 'Olivia', 'Palmer', 'F', 2019, 'MCAS', 'Biology', 'None (yet)', 'Cheshire', 'CT', 'No', 'No', 'No', '203-623-8576', 'palmeroc@bc.edu', 'Walsh', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'EFAD Coordinator', '2016-07-28 23:19:22', '2016-07-28', 0, 0, 0, 0, 'Yes', '', ''),
(56787568, 'Nicolette', 'Esposito', 'F', 2016, 'CSOM', 'Finance and Accounting', '', 'Holmdel', 'NJ', 'No', 'No', 'No', '7327788324', 'esposinb@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(56981046, 'Nick', 'Raposo', 'M', 2018, 'CSON', 'Nursing', 'Medical Humanities; Leadership in Higher', 'Fall River', 'MA', 'No', 'No', 'No', '774-955-8389', 'raposon@bc.edu', 'Fitzpatrick 108', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'AED Coordinator', '2016-07-28 23:19:22', '2016-07-28', 0, 0, 0, 0, 'Yes', '', ''),
(57301413, 'Lawrence ', 'Berrill', 'M', 2016, 'CSOM', 'Marketing, psycholgy', '', 'West Windsor', 'NJ', 'No', 'No', 'No', '7323103453', 'Berrill@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(59219640, 'Natalie', 'Dolphin', 'F', 2016, 'MCAS', 'Political Science and History', '', 'Minneapolis', 'MN', 'No', 'No', 'No', '(612)964-454', 'dolphinn@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(60425370, 'John', 'Walsh', 'M', 2017, 'CSOM', 'Accounting & Theology', '', 'Franklin', 'MA', 'No', 'No', 'No', '(774) 571-37', 'walshqh@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(63715072, 'Sarah', 'Stefanski', 'F', 2018, 'CSOM', 'Accounting', 'Theology', 'Baltimore', 'MD', 'No', 'No', 'No', '443-250-2165', 'stefanss@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(65420998, 'Matthew', 'Munfakh', 'M', 2016, 'CSOM', 'Finance', 'Math', 'St. Louis', 'MO', 'No', 'No', 'No', '(314) 856-50', 'munfakhm@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(65614588, 'Lindsey', 'Hunt', 'F', 2018, 'CSOM', 'Finance and Political Science', '', 'Crofton', 'MD', 'No', 'No', 'No', '301-801-3996', 'huntli@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(65660894, 'Paige', 'Lou', 'F', 2018, 'LSOE', 'Applied Psychology and Human Development', 'Sociology', 'Shanghai', 'China', 'Yes', 'Yes', 'No', '(224)633-676', 'lousi@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(65837597, 'Caitlyn', 'Passaretti', 'F', 2016, 'MCAS', 'Sociology', 'Faith Peace and Justice ', 'South Hamilton', 'MA', 'No', 'No', 'No', '9789985288', 'passarec@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(66129491, 'Melanie', 'Logan', 'F', 2016, 'MCAS', 'B.S. Psychology', 'Medical Humanities', 'Columbus', 'OH', 'No', 'No', 'No', '6144486817', 'Loganmc@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(66307656, 'Katie ', 'McGirney', 'F', 2018, 'MCAS', 'Communication', 'Journalism ', 'Tampa', 'FL', 'No', 'No', 'No', '8139432179', 'mcgirney@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(67374033, 'Molly', 'Nuell', 'F', 2016, 'LSOE', 'Elementary Education, Theology', '', 'Miami', 'FL', 'No', 'No', 'No', '786-693-3705', 'nuell@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(69690543, 'Armen', 'Grigorian', 'M', 2017, 'MCAS', 'History, Communication', '', 'Belmont', 'MA', 'No', 'No', 'No', '617-460-4094', 'grigorad@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(69739536, 'Kaitlin', 'O''Donnell', 'F', 2016, 'MCAS', 'International Studies', 'Hispanic Studies', 'Portland', 'OR', 'No', 'No', 'No', '(503) 473-92', 'odonneky@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(70108661, 'Meghan', 'Allen', 'F', 2016, 'CSOM', 'Finance, Economics, Political Science', '', 'Scotch Plains', 'NJ', 'No', 'No', 'No', '(908) 380-39', 'allenmu@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(70561877, 'Alicia', 'McCormick', 'F', 2017, 'MCAS', 'Psychology', 'Leadership in Higher Education', 'Melrose', 'MA', 'No', 'No', 'No', '781-835-6069', 'mccormcd@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(70733046, 'Gail', 'Brown', 'F', 2018, 'MCAS', 'Political Science and Economics', 'Management and Leadership', 'Iowa City', 'IA', 'No', 'No', 'No', '319-321-3350', 'brownbba@bc.edu', '309 2000', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Panels Coordinator', '2016-07-28 23:19:22', '2016-07-28', 0, 0, 0, 0, 'Yes', '', ''),
(71939373, 'Priscilla', 'Nyarko', 'F', 2018, 'CSON', 'Nursing', 'Psychology', 'Bronx', 'NY', 'No', 'Yes', 'No', '201-640-1715', 'Nyarkop@bc.edu', 'Stayer Hall', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'AHANA Outreach Coordinator', '2016-07-28 23:19:22', '2016-07-28', 0, 0, 0, 0, 'Yes', '', ''),
(71941792, 'Frank', 'DiMartino', 'M', 2017, 'MCAS', 'Economics and Philosophy', '', 'Lawrenceville', 'NJ', 'No', 'No', 'No', '(609) 802-84', 'dimartif@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(73246858, 'Tucker', 'Charette', 'M', 2018, 'CSOM', 'Finance, Marketing', '', 'West Hartford', 'CT', 'No', 'No', 'No', '(860) 250-38', 'charettt@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(73776341, 'Brendan', 'Kolon', 'M', 2017, 'CSOM', 'Marketing, Business Analytics', 'Philosophy', 'Moorestown', 'NJ', 'No', 'No', 'No', '(609) 304-95', 'kolon@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(74096291, 'Colleen', 'Sheridan', 'F', 2017, 'MCAS', 'International Studies, Concentration in ', 'History and Management & Leadership', 'Westfield', 'NJ', 'No', 'No', 'No', '(908) 327-59', 'sheridcb@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(74156951, 'Jacob', 'Monk', 'M', 2016, 'CSOM', 'Accounting', 'Theology', 'Parker', 'CO', 'No', 'No', 'No', '303 518-0382', 'monkja@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(74422102, 'Shannon', 'Lydon', 'F', 2018, 'MCAS', 'Political Science', 'Philosophy', 'Bethesda', 'MD', 'No', 'No', 'No', '301-312-4430', 'lydonsh@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(74612856, 'Kanwal ', 'Ojha', 'F', 2019, 'MCAS', 'Biology', 'Women''s Studies', 'Rocky Hill', 'CT', 'No', 'Yes', 'No', '(860) 987-80', 'ojha@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(76280038, 'Kaitlin', 'Adams', 'F', 2016, 'CSOM', 'Marketing/Business Analytics', '', 'Boca Raton', 'FL', 'No', 'No', 'No', '(561) 251-72', 'adamskp@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(77192728, 'MaryEllen', 'Krah', 'F', 2017, 'LSOE', 'Elementary Education; Math/Computer Scie', 'Middle School Math', 'Medfield', 'MA', 'No', 'No', 'No', '(508) 641-68', 'krah@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(77799508, 'Carolyn', 'Barrett', 'F', 2016, 'MCAS', 'Political Science', 'Medical Humanities and Culture', 'Wakefield', 'MA', 'No', 'No', 'Yes', '7814394946', 'barretck@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(78585952, 'Emma', 'Vitale', 'F', 2016, 'MCAS', 'International Studies', 'Management & Leadership', 'Minneapolis', 'MN', 'No', 'No', 'No', '(952) 220-19', 'vitaleem@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(78927017, 'Julie', 'Orenstein', 'F', 2016, 'MCAS', 'Political Science', 'International Studies', 'West Hartford', 'CT', 'No', 'No', 'No', '(860) 808-78', 'orenstej@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(80627466, 'Robyn', 'Naragon', 'F', 2019, 'MCAS', 'Communications', 'International Studies', 'Campbell', 'CA', 'No', 'No', 'No', '408-963-8367', 'naragon@bc.edu', 'Walsh 801A', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Media Coordinator', '2016-07-28 23:19:22', '2016-07-28', 0, 0, 0, 0, 'Yes', '', ''),
(80920157, 'Maggie', 'Shepard', 'F', 2016, 'MCAS', 'Economics', 'Faith, Peace, and Justice', 'Yorba Linda', 'CA', 'No', 'No', 'No', '(714) 944-76', 'sheparmc@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Graduated', '', ''),
(83777646, 'Kyra', 'Luck', 'F', 2018, 'MCAS', 'International Studies', 'History', 'Boston', 'MA', 'No', 'No', 'No', '(603) 714-97', 'luckky@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(84462221, 'Jessica', 'Ilaria', 'F', 2017, 'MCAS', 'Political Science', 'Medical Humanities', 'Zionsville', 'IN', 'No', 'No', 'No', '317-260-8840', 'ilariaj@bc.edu', '2150/New Dorm', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Outreach/HS Visits Coordinator', '2016-07-28 23:19:22', '2016-07-28', 0, 0, 0, 0, 'Yes', '', ''),
(84508817, 'Katie', 'Tisinger', 'F', 2018, 'CSOM', 'Marketing and Information Systems', 'Faith, Peace, and Justice', 'Carrollton', 'GA', 'No', 'No', 'No', '(770) 842-75', 'tisinger@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(85718351, 'Brittney', 'Bentivegna', 'F', 2017, 'CSON', 'Nursing', '', 'Fairfield', 'CT', 'No', 'No', 'No', '2037671634', 'bentiveb@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(86000815, 'Erica', 'Ursin-Smith', 'F', 2017, 'MCAS', 'Economics and English', '', 'Pacific Palisades', 'CA', 'No', 'No', 'No', '(415) 948-46', 'ursinsmi@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(86647814, 'Avita', 'Anand', 'F', 2019, 'MCAS', 'International Studies', 'Business Law, Gender Studies', 'Dallas', 'TX', 'No', 'Yes', 'No', '9725679272', 'anandav@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(89489351, 'Meagan', 'Gonzalez', 'F', 2017, 'CSOM', 'Finance & Computer Science', '', 'Tampa', 'FL', 'No', 'Yes', 'No', '(813) 928-07', 'gonzalyz@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', ''),
(89526734, 'Alexis', 'Iderman', 'F', 2018, 'CSOM', 'Finance and Operations Management', 'French and Hispanic Studies', 'Bethesda', 'MD', 'No', 'No', 'No', '(240)515-854', 'iderman@bc.edu', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Volunteer', '0000-00-00 00:00:00', '0000-00-00', 0, 0, 0, 0, 'Yes', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `User_Audit`
--

CREATE TABLE `User_Audit` (
  `audit_id` int(10) NOT NULL,
  `field` varchar(15) NOT NULL,
  `old_value` varchar(100) NOT NULL,
  `new_value` varchar(100) NOT NULL,
  `updated` datetime NOT NULL,
  `updated_by` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Attendance`
--
ALTER TABLE `Attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `Council`
--
ALTER TABLE `Council`
  ADD PRIMARY KEY (`council_id`);

--
-- Indexes for table `Council_Members`
--
ALTER TABLE `Council_Members`
  ADD PRIMARY KEY (`council_member_id`);

--
-- Indexes for table `Groups`
--
ALTER TABLE `Groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `Group_Members`
--
ALTER TABLE `Group_Members`
  ADD PRIMARY KEY (`group_member_id`);

--
-- Indexes for table `Notes`
--
ALTER TABLE `Notes`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `Programming_Weeks`
--
ALTER TABLE `Programming_Weeks`
  ADD PRIMARY KEY (`week_id`);

--
-- Indexes for table `Programs`
--
ALTER TABLE `Programs`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `Program_Members`
--
ALTER TABLE `Program_Members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`eagle_id`);

--
-- Indexes for table `User_Audit`
--
ALTER TABLE `User_Audit`
  ADD PRIMARY KEY (`audit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Attendance`
--
ALTER TABLE `Attendance`
  MODIFY `attendance_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `Council`
--
ALTER TABLE `Council`
  MODIFY `council_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Council_Members`
--
ALTER TABLE `Council_Members`
  MODIFY `council_member_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `Groups`
--
ALTER TABLE `Groups`
  MODIFY `group_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Group_Members`
--
ALTER TABLE `Group_Members`
  MODIFY `group_member_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `Notes`
--
ALTER TABLE `Notes`
  MODIFY `note_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Programming_Weeks`
--
ALTER TABLE `Programming_Weeks`
  MODIFY `week_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Programs`
--
ALTER TABLE `Programs`
  MODIFY `program_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Program_Members`
--
ALTER TABLE `Program_Members`
  MODIFY `member_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=179;
--
-- AUTO_INCREMENT for table `User_Audit`
--
ALTER TABLE `User_Audit`
  MODIFY `audit_id` int(10) NOT NULL AUTO_INCREMENT;