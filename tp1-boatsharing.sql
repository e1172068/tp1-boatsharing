-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 24, 2022 at 10:14 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp1-boatsharing`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `first_name`, `last_name`, `email`, `phone`) VALUES
(2, 'Mathieu', 'St-Onge', 'aaa@ccc.ca', '(514) 884-11042'),
(3, 'Woodly', 'Boursiquot', 'aaa@ccc.ca', '555-555-5555'),
(6, 'Xavier', 'Laly', 'youpi@cm.com', '333-333-3333');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `crew_size` smallint(6) DEFAULT NULL,
  `sailboat_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reservation_sailboat1_idx` (`sailboat_id`),
  KEY `fk_reservation_member1_idx` (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `start`, `end`, `crew_size`, `sailboat_id`, `member_id`) VALUES
(1, '2022-06-24 15:44:00', '2022-06-24 17:44:00', 3, 9, 2),
(2, '2022-06-29 15:44:00', '2022-06-29 17:44:00', 4, 9, 2),
(3, '2022-06-07 19:10:00', '2022-06-28 16:10:00', 7, 7, 3),
(4, '2022-06-19 21:37:00', '2022-06-29 22:37:00', 2, 7, 6);

-- --------------------------------------------------------

--
-- Table structure for table `sailboat`
--

DROP TABLE IF EXISTS `sailboat`;
CREATE TABLE IF NOT EXISTS `sailboat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `sailboat_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sailboat_sailboat_type1_idx` (`sailboat_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sailboat`
--

INSERT INTO `sailboat` (`id`, `name`, `sailboat_type_id`) VALUES
(7, 'Holdfast', 2),
(9, 'Gran Blan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sailboat_type`
--

DROP TABLE IF EXISTS `sailboat_type`;
CREATE TABLE IF NOT EXISTS `sailboat_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `min_crew_size` smallint(6) DEFAULT NULL,
  `length` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sailboat_type`
--

INSERT INTO `sailboat_type` (`id`, `name`, `min_crew_size`, `length`) VALUES
(1, 'Shark', 2, 24),
(2, 'Tanzer', 2, 22),
(3, 'Niagara', 3, 26);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_reservation_member1` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reservation_sailboat1` FOREIGN KEY (`sailboat_id`) REFERENCES `sailboat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sailboat`
--
ALTER TABLE `sailboat`
  ADD CONSTRAINT `fk_sailboat_sailboat_type1` FOREIGN KEY (`sailboat_type_id`) REFERENCES `sailboat_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
