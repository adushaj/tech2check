-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2018 at 12:07 AM
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
  `middle_initial` varchar(1) NOT NULL,
  `street_line_1` varchar(25) NOT NULL,
  `street_line_2` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip_code` int(5) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `email` varchar(25) NOT NULL,
  `account_disabled_indicator` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_type`
--

CREATE TABLE IF NOT EXISTS `employee_type` (
  `employee_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_type` varchar(25) NOT NULL,
  PRIMARY KEY (`employee_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
  `serial_number` int(11) NOT NULL AUTO_INCREMENT,
  `equipment_spec_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`serial_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `equipment_spec`
--

CREATE TABLE IF NOT EXISTS `equipment_spec` (
  `equipment_spec_id` int(11) NOT NULL AUTO_INCREMENT,
  `rental_length_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  PRIMARY KEY (`equipment_spec_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `equipment_status`
--

CREATE TABLE IF NOT EXISTS `equipment_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `condition` varchar(25) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `make`
--

CREATE TABLE IF NOT EXISTS `make` (
  `make_id` int(11) NOT NULL AUTO_INCREMENT,
  `make` varchar(25) NOT NULL,
  PRIMARY KEY (`make_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE IF NOT EXISTS `password` (
  `username_id` int(11) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rental_length`
--

CREATE TABLE IF NOT EXISTS `rental_length` (
  `rental_length_id` int(11) NOT NULL AUTO_INCREMENT,
  `rental_length` int(11) NOT NULL,
  PRIMARY KEY (`rental_length_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `equipment_spec_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date_reserved` date NOT NULL,
  `fulfilled_indicator` tinyint(1) NOT NULL,
  PRIMARY KEY (`reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `security_questions`
--

CREATE TABLE IF NOT EXISTS `security_questions` (
  `username_id` int(11) NOT NULL,
  `security_question_1` varchar(25) NOT NULL,
  `security_question_2` varchar(25) NOT NULL,
  `security_question_3` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `username_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `middle_initial` varchar(1) DEFAULT NULL,
  `street_line_1` varchar(25) NOT NULL,
  `street_line_2` varchar(25) DEFAULT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip_code` int(5) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `email` varchar(25) NOT NULL,
  `locked_indicator` tinyint(1) NOT NULL,
  `notes` varchar(75) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(25) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `usernames`
--

CREATE TABLE IF NOT EXISTS `usernames` (
  `username_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  PRIMARY KEY (`username_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `usernames`
--

INSERT INTO `usernames` (`username_id`, `username`) VALUES
(9, 'trwinowiecki');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
