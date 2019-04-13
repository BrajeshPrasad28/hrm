-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2019 at 05:19 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `created_on` date NOT NULL,
  `photo` varchar(200) NOT NULL,
  `password` varchar(20) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `firstname`, `lastname`, `created_on`, `photo`, `password`) VALUES
(1, 'Siddharth28', 'Siddharth', 'Prasad', '2019-03-12', '../upload/download.jpg', 'Brajesh');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `emp_id` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time DEFAULT NULL,
  `work_hr` double NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`emp_id`,`date`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`emp_id`, `date`, `time_in`, `time_out`, `work_hr`, `status`) VALUES
('CAW821357946', '2019-04-08', '11:32:55', '11:33:16', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_name` varchar(15) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`d_id`, `d_name`) VALUES
(1, 'Programmer'),
(2, 'Graphic');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `created_on` date NOT NULL,
  `job_type` varchar(15) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('Male','Female','Other','') NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `d_name` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `schedule_id` (`schedule_id`),
  KEY `d_name` (`d_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_id`, `created_on`, `job_type`, `first_name`, `last_name`, `dob`, `gender`, `address`, `phone`, `email`, `d_name`, `schedule_id`, `photo`, `password`) VALUES
(0, 'CAW821357946', '2019-04-08', 'Parmanent', 'siddharth', 'prasad', '2019-04-09', 'Male', 'aaaa', '8723969733', 'brajesh.prasad28@gmail.com', 1, 5, '../upload/download (3).jpg', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `home_work`
--

CREATE TABLE IF NOT EXISTS `home_work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `req_msg` varchar(50) NOT NULL,
  `status` enum('waiting','accepted','rejected','') NOT NULL,
  `left_days` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE IF NOT EXISTS `leave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(20) NOT NULL,
  `request_date` date NOT NULL,
  `leave_typ` varchar(20) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `msg` varchar(50) NOT NULL,
  `status` enum('waiting','rejected','accepted','') NOT NULL DEFAULT 'waiting',
  PRIMARY KEY (`id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leave_balance`
--

CREATE TABLE IF NOT EXISTS `leave_balance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(20) NOT NULL,
  `leave_type` varchar(20) NOT NULL,
  `balance` int(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `emp_id` (`emp_id`),
  KEY `leave_type` (`leave_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `leave_balance`
--

INSERT INTO `leave_balance` (`id`, `emp_id`, `leave_type`, `balance`) VALUES
(1, 'CAW821357946', 'casual', 8),
(2, 'CAW821357946', 'emergency', 5);

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE IF NOT EXISTS `leave_type` (
  `leave_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `leave_blnc` int(11) NOT NULL,
  `gender` enum('Male','Female','Other','') NOT NULL DEFAULT 'Male',
  PRIMARY KEY (`type`),
  UNIQUE KEY `leave_id` (`leave_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`leave_id`, `type`, `leave_blnc`, `gender`) VALUES
(1, 'casual', 10, 'Male'),
(4, 'education', 5, 'Male'),
(3, 'emergency', 8, 'Male'),
(2, 'medical', 6, 'Male'),
(5, 'pregnancy', 20, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

CREATE TABLE IF NOT EXISTS `noticeboard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` enum('Active','Disable','','') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `noticeboard`
--

INSERT INTO `noticeboard` (`id`, `date`, `title`, `message`, `status`) VALUES
(2, '2019-04-04', 'this is a test notice2', 'this is a test notice for user.....!<div><br></div>', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `r_id` int(10) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `r_date` date NOT NULL,
  `msg` varchar(50) NOT NULL,
  `wrk_hr` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
  `s_id` varchar(20) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `pay_scale` int(10) NOT NULL,
  `basic_pay` int(10) NOT NULL,
  `year` year(4) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE IF NOT EXISTS `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `time_in`, `time_out`) VALUES
(5, '09:00:00', '18:00:00'),
(6, '10:00:00', '19:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `sec_fk` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`);

--
-- Constraints for table `leave`
--
ALTER TABLE `leave`
  ADD CONSTRAINT `emp_fk` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leave_balance`
--
ALTER TABLE `leave_balance`
  ADD CONSTRAINT `leave_balance_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `leave_balance_ibfk_2` FOREIGN KEY (`leave_type`) REFERENCES `leave_type` (`type`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
