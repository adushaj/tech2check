-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2018 at 11:44 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `T2C`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_type_id` int(11) NOT NULL,
  `username_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `middle_initial` varchar(1) DEFAULT NULL,
  `street_line_1` varchar(25) NOT NULL,
  `street_line_2` varchar(25) DEFAULT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip_code` int(5) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `email` varchar(25) NOT NULL,
  `account_disabled_indicator` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_type_id`, `username_id`, `first_name`, `last_name`, `middle_initial`, `street_line_1`, `street_line_2`, `city`, `state`, `zip_code`, `phone_number`, `email`, `account_disabled_indicator`) VALUES
(1, 3, 52, 'root', 'root', '', 'root', '', 'root', 'MI', 0, '0', 'root@tech2check.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_type`
--

CREATE TABLE IF NOT EXISTS `employee_type` (
  `employee_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_type` varchar(25) NOT NULL,
  PRIMARY KEY (`employee_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `employee_type`
--

INSERT INTO `employee_type` (`employee_type_id`, `employee_type`) VALUES
(1, 'Front Desk'),
(2, 'Technician'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
  `serial_number` varchar(25) NOT NULL,
  `model_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`serial_number`),
  UNIQUE KEY `serial_number` (`serial_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`serial_number`, `model_id`, `status_id`) VALUES
('5t9QMkUB', 2, 1),
('7y2M4twv', 6, 1),
('A93h0ckq9dss', 5, 1),
('C02TW0W9HV2F', 3, 1),
('dcp2FAUj', 7, 1),
('FDfABgwB', 3, 1),
('fMmsPUcC', 6, 1),
('JMZS747', 12, 1),
('Jncw7Mhv', 5, 1),
('jsSD9AMH', 5, 1),
('NRQdqoyF', 1, 1),
('NrQwxZ4Q', 4, 1),
('RhGj5p6S', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_status`
--

CREATE TABLE IF NOT EXISTS `equipment_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `condition` varchar(25) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `equipment_status`
--

INSERT INTO `equipment_status` (`status_id`, `condition`) VALUES
(1, 'In Service'),
(2, 'Needs Repair'),
(3, 'Out of Service');

-- --------------------------------------------------------

--
-- Table structure for table `make`
--

CREATE TABLE IF NOT EXISTS `make` (
  `make_id` int(11) NOT NULL AUTO_INCREMENT,
  `make` varchar(25) NOT NULL,
  PRIMARY KEY (`make_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `make`
--

INSERT INTO `make` (`make_id`, `make`) VALUES
(1, 'Dell'),
(2, 'Apple'),
(3, 'Acer'),
(4, 'Asus'),
(5, 'HP'),
(6, 'Samsung'),
(7, 'Toshiba'),
(8, 'Canon'),
(9, 'Nikon'),
(10, 'Sony'),
(11, 'GoPro'),
(12, 'Kodak'),
(13, 'Microsoft'),
(16, 'Lenovo');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE IF NOT EXISTS `model` (
  `model_id` int(11) NOT NULL AUTO_INCREMENT,
  `make_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `model` varchar(25) NOT NULL,
  PRIMARY KEY (`model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`model_id`, `make_id`, `type_id`, `model`) VALUES
(1, 1, 1, 'XPS'),
(2, 1, 1, 'Latitude'),
(3, 2, 1, 'MacBook Pro'),
(4, 2, 1, 'MacBook'),
(5, 2, 2, 'iPad Pro'),
(6, 2, 2, 'iPad'),
(7, 13, 8, 'Xbox One S'),
(8, 10, 8, 'Playstation 4 Pro'),
(12, 8, 3, 'Rebal T6');

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE IF NOT EXISTS `password` (
  `username_id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  UNIQUE KEY `username_id` (`username_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `password`
--

INSERT INTO `password` (`username_id`, `password`) VALUES
(50, '$2y$11$dMY3MRZ9O8iO8nNk2BMjHuPk5fluB3o0CxEiQfrXsIBGdTOWDysHq'),
(51, '$2y$11$pIh00BCYQ6q20CW7YQtsMOTBN9I2VAZPHfRm0yknuJyg7Qs2Hn.K2'),
(52, '$2y$11$3bUTsgKmi.jX34paum24SeLKd5n3EFfzH1d/0TXYPDBGePSm8W/TO');

-- --------------------------------------------------------

--
-- Table structure for table `rental_length`
--

CREATE TABLE IF NOT EXISTS `rental_length` (
  `rental_length_id` int(11) NOT NULL AUTO_INCREMENT,
  `rental_length` int(11) NOT NULL,
  PRIMARY KEY (`rental_length_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rental_length`
--

INSERT INTO `rental_length` (`rental_length_id`, `rental_length`) VALUES
(1, 1),
(2, 3),
(3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `rental_record`
--

CREATE TABLE IF NOT EXISTS `rental_record` (
  `rental_number` int(11) NOT NULL AUTO_INCREMENT,
  `serial_number` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `checked_out_by` int(11) NOT NULL,
  `checked_in_by` int(11) NOT NULL,
  `checked_out_date` date NOT NULL,
  `due_date` date NOT NULL,
  `date_returned` date NOT NULL,
  `notes` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`rental_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_list`
--

CREATE TABLE IF NOT EXISTS `reservation_list` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date_reserved` date NOT NULL,
  `fulfilled_indicator` tinyint(1) NOT NULL,
  PRIMARY KEY (`reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `security_answers`
--

CREATE TABLE IF NOT EXISTS `security_answers` (
  `username_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(100) NOT NULL,
  UNIQUE KEY `username_id` (`username_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `security_answers`
--

INSERT INTO `security_answers` (`username_id`, `question_id`, `answer`) VALUES
(50, 1, '$2y$11$dMY3MRZ9O8iO8nNk2BMjHuLViGM0TTftHj4JiCp6ebvN5EgLBKOE.'),
(51, 5, '$2y$11$pIh00BCYQ6q20CW7YQtsMO6MVJk7V9DOWLYFoKRSIXmIiobOgsnyW'),
(52, 5, '$2y$11$3bUTsgKmi.jX34paum24SeLKd5n3EFfzH1d/0TXYPDBGePSm8W/TO');

-- --------------------------------------------------------

--
-- Table structure for table `security_questions`
--

CREATE TABLE IF NOT EXISTS `security_questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(100) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `security_questions`
--

INSERT INTO `security_questions` (`question_id`, `question`) VALUES
(1, 'What is the first name of the person you first kissed?'),
(2, 'What is the last name of the teacher who gave you your first failing grade?'),
(3, 'What is your mother''s maiden name?'),
(4, 'What is your father''s middle name?'),
(5, 'What city were you born in?'),
(6, 'What street did you grow up on?');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `username_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_initial` varchar(1) DEFAULT NULL,
  `street_line_1` varchar(50) NOT NULL,
  `street_line_2` varchar(50) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip_code` int(5) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `locked_indicator` tinyint(1) DEFAULT NULL,
  `notes` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `username_id`, `first_name`, `last_name`, `middle_initial`, `street_line_1`, `street_line_2`, `city`, `state`, `zip_code`, `phone_number`, `email`, `locked_indicator`, `notes`) VALUES
(18, 50, 'lily', 'schimmel', 'k', '352 john m.', '', 'Clawson', 'MI', 48017, '2489183854', 'lkschimmel@oakland.edu', NULL, NULL),
(19, 51, 'Taylor', 'Winowiecki', 'R', '256 S Webik', '', 'Clawson', 'MI', 48017, '2488070292', 'trwinowiecki@oakland.edu', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(25) NOT NULL,
  `rental_length_id` int(11) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type`, `rental_length_id`) VALUES
(1, 'Laptop', 2),
(2, 'Tablet', 3),
(3, 'Camera', 3),
(4, 'Camcorder', 3),
(5, 'Charger', 1),
(6, 'Headphones', 1),
(7, 'Drone', 2),
(8, 'Console', 3);

-- --------------------------------------------------------

--
-- Table structure for table `usernames`
--

CREATE TABLE IF NOT EXISTS `usernames` (
  `username_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  PRIMARY KEY (`username_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `usernames`
--

INSERT INTO `usernames` (`username_id`, `username`) VALUES
(50, 'lks'),
(52, 'root'),
(51, 'trwinowiecki');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
