-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2017 at 04:31 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traffic monitoring system`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `tp_details` ()  NO SQL
SELECT * FROM traffic_point$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(30) NOT NULL,
  `admin_id` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `admin_id`, `email`, `password`) VALUES
('admin', 'vbnm', 'admin@gmail.com', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `TP_ID` varchar(50) NOT NULL,
  `STATUS` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`TP_ID`, `STATUS`) VALUES
('108', 'moderate');

-- --------------------------------------------------------

--
-- Table structure for table `road`
--

CREATE TABLE `road` (
  `id` int(8) NOT NULL,
  `ROAD_ID` varchar(10) NOT NULL,
  `TP_ID` varchar(10) DEFAULT NULL,
  `ROAD_LOCATION` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `road`
--

INSERT INTO `road` (`id`, `ROAD_ID`, `TP_ID`, `ROAD_LOCATION`) VALUES
(1, '1', '100', 'moodbidri'),
(2, '2', '101', 'mangalore');

-- --------------------------------------------------------

--
-- Table structure for table `traffic_point`
--

CREATE TABLE `traffic_point` (
  `id` int(8) NOT NULL,
  `TP_ID` varchar(10) NOT NULL,
  `STATUS` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `traffic_point`
--

INSERT INTO `traffic_point` (`id`, `TP_ID`, `STATUS`) VALUES
(1, '100', 'jam'),
(2, '101', 'clean'),
(3, '102', 'clear'),
(4, '103', 'unavailable'),
(5, '104', 'unavailable'),
(26, '105', 'clear'),
(10, '109', 'moderate'),
(11, '110', 'moderate'),
(15, '111', 'jam');

--
-- Triggers `traffic_point`
--
DELIMITER $$
CREATE TRIGGER `tp_id_history` BEFORE DELETE ON `traffic_point` FOR EACH ROW INSERT INTO history(TP_ID,STATUS) VALUES(old.TP_ID,old.STATUS)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `traffic_point_view`
--

CREATE TABLE `traffic_point_view` (
  `id` int(8) NOT NULL,
  `USER_ID` varchar(10) DEFAULT NULL,
  `TP_ID` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `traffic_point_view`
--

INSERT INTO `traffic_point_view` (`id`, `USER_ID`, `TP_ID`) VALUES
(27, 'mnopqr789', '100'),
(26, 'mnopqr789', '100'),
(25, 'mnn567', '101'),
(24, 'mnn567', '101');

-- --------------------------------------------------------

--
-- Stand-in structure for view `traffic_status_view`
-- (See below for the actual view)
--
CREATE TABLE `traffic_status_view` (
`TP_ID` varchar(10)
,`STATUS` varchar(20)
,`ROAD_ID` varchar(10)
,`ROAD_LOCATION` varchar(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `USER_ID` varchar(10) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `USER_ID`, `email`, `password`) VALUES
(9, 'muser1', 'mnn567', 'nn@gmail.com', '123456'),
(8, 'nuser', 'mnopqr789', 'n@gmail.com', '123456'),
(7, 'Dhavan', 'dr456', 'd@gmail.com', 'qwerty'),
(6, 'Krishnamoorthy', 'km123', 'kmk@gmail.com', 'qwerty');

-- --------------------------------------------------------

--
-- Structure for view `traffic_status_view`
--
DROP TABLE IF EXISTS `traffic_status_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `traffic_status_view`  AS  (select `t`.`TP_ID` AS `TP_ID`,`t`.`STATUS` AS `STATUS`,`r`.`ROAD_ID` AS `ROAD_ID`,`r`.`ROAD_LOCATION` AS `ROAD_LOCATION` from (`traffic_point` `t` join `road` `r`) where (`t`.`TP_ID` = `r`.`TP_ID`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `road`
--
ALTER TABLE `road`
  ADD PRIMARY KEY (`id`,`ROAD_ID`),
  ADD KEY `TP_ID` (`TP_ID`);

--
-- Indexes for table `traffic_point`
--
ALTER TABLE `traffic_point`
  ADD PRIMARY KEY (`id`,`TP_ID`);

--
-- Indexes for table `traffic_point_view`
--
ALTER TABLE `traffic_point_view`
  ADD PRIMARY KEY (`id`),
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `TP_ID` (`TP_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`USER_ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `road`
--
ALTER TABLE `road`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `traffic_point`
--
ALTER TABLE `traffic_point`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `traffic_point_view`
--
ALTER TABLE `traffic_point_view`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
