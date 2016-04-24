-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2016 at 10:02 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iap_thapar`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `registration_id` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`registration_id`, `name`, `password`) VALUES
('admin', 'Arush Nagpal', '$2y$10$wanttocrackitokaythenOQlgZiefbu9OzjU873v9LbZOMZkARSIm');

-- --------------------------------------------------------

--
-- Table structure for table `admin_messages`
--

CREATE TABLE IF NOT EXISTS `admin_messages` (
  `id` bigint(20) NOT NULL,
  `from_user` varchar(200) NOT NULL,
  `to_user` varchar(200) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_messages`
--

INSERT INTO `admin_messages` (`id`, `from_user`, `to_user`, `subject`, `message`, `ip_address`, `timestamp`) VALUES
(1, 'arushngpl16@gmail.com', 'admin', 'jdbsjbj', 'Arush Nagpal', '127.0.0.1', '2016-04-05 18:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `id` bigint(20) NOT NULL,
  `branch` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branch`) VALUES
(1, 'Mechanical Engineering'),
(2, 'Computer Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `registration_id` bigint(20) NOT NULL,
  `initials` varchar(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `pref1` varchar(100) DEFAULT NULL,
  `pref2` varchar(100) DEFAULT NULL,
  `pref3` varchar(100) DEFAULT NULL,
  `access_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`registration_id`, `initials`, `name`, `password`, `phone`, `email`, `designation`, `pref1`, `pref2`, `pref3`, `access_token`) VALUES
(101303012, 'Dr.', 'Akshit Arora', '$2y$10$wanttocrackitokaythenO8QD8gOVdke5kQKXFtYmiYSQKOUZduqa', 7696061995, 'akshit.arora1995@gmail.com', 'Associate Professor', 'New Delhi', 'Pune', 'Bangalore', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE IF NOT EXISTS `mentor` (
  `initials` varchar(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `company` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `activation_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`initials`, `name`, `phone`, `email`, `company`, `password`, `activation_link`) VALUES
('Mr.', 'Abhinav Garg', 9803360828, 'abhinavgarg017@gmail.com', 'microsoft', '$2y$10$wanttocrackitokaythenOn8pJMiMInc6e/YOlGdfZz2aJbpqROoq', '0'),
('Mr.', 'Arush Nagpal', 9803360828, 'arushngpl16@gmail.com', 'microsoft', '$2y$10$wanttocrackitokaythenOn8pJMiMInc6e/YOlGdfZz2aJbpqROoq', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `roll_number` bigint(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(250) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `semester` int(2) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `time_of_registration` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activation_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`roll_number`, `email`, `password`, `name`, `branch`, `semester`, `phone`, `time_of_registration`, `activation_link`) VALUES
(101303004, 'abhinavgarg017@gmail.com', '$2y$10$wanttocrackitokaythenO56HCrYbRnQnNhOUcDUZBI1lSeSf2JaS', 'Abhinav Garg', 'Computer Engineering', 7, 99999999999, '2016-04-02 07:02:54', '0'),
(101303012, 'akshit.arora1995@gmail.com', '$2y$10$wanttocrackitokaythenO9j2D2UBqMan8uujjSFj6CU/jGNmgXqm', 'Akshit Arora', 'Computer Engineering', 6, 7696061995, '2016-04-24 18:50:32', '0'),
(101303034, 'arushngpl16@gmail.com', '$2y$10$wanttocrackitokaythenO56HCrYbRnQnNhOUcDUZBI1lSeSf2JaS', 'Arush Nagpal', 'Mechanical Engineering', 4, 9988090859, '2016-03-04 18:19:44', '0'),
(101303041, 'chahakgupta4@gmail.com', '$2y$10$wanttocrackitokaythenOllYjFQbN858uRoI3Q8HktZ9i.zSHvSC', 'Chahak', 'Computer Engineering', 6, 9041114525, '2016-04-05 10:45:39', '0');

-- --------------------------------------------------------

--
-- Table structure for table `training_data`
--

CREATE TABLE IF NOT EXISTS `training_data` (
  `td_id` int(11) NOT NULL,
  `roll_number` bigint(20) NOT NULL,
  `company` varchar(250) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `date_of_join` date NOT NULL,
  `months` int(11) NOT NULL,
  `mentor` varchar(200) NOT NULL,
  `joining_report` varchar(100) DEFAULT '0',
  `intermid_report` varchar(100) NOT NULL DEFAULT '0',
  `final_report` varchar(100) NOT NULL DEFAULT '0',
  `training_num` varchar(10) NOT NULL,
  `phase` int(11) NOT NULL DEFAULT '0',
  `admin_approve` tinyint(1) NOT NULL DEFAULT '0',
  `faculty_alotted` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training_data`
--

INSERT INTO `training_data` (`td_id`, `roll_number`, `company`, `city`, `date_of_join`, `months`, `mentor`, `joining_report`, `intermid_report`, `final_report`, `training_num`, `phase`, `admin_approve`, `faculty_alotted`) VALUES
(1, 101303041, 'ABC', 'Bangalore', '0000-00-00', 4, 'abhinavgarg017@gmail.com', '', '', '', '1', 0, 1, NULL),
(2, 101303042, 'BCD', 'Pune', '0000-00-00', 0, '', '', '', '', '', 0, 1, NULL),
(3, 101303034, 'GHI', 'New Delhi', '0000-00-00', 4, '', '', '', '', '1', 0, 1, NULL),
(5, 101303041, 'BCD', 'Pune', '2016-04-22', 2, '', '', '', '', '2', 0, 1, NULL),
(6, 101303012, 'PayTm', 'Bangalore', '2016-04-09', 3, '', '', '', '', '1', 0, 0, NULL),
(7, 101303012, 'Paytm23', 'Noida', '2016-04-16', 3, '', '', '', '', '2', 0, 1, 'akshit.arora1995@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`registration_id`);

--
-- Indexes for table `admin_messages`
--
ALTER TABLE `admin_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `mentor`
--
ALTER TABLE `mentor`
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`roll_number`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `training_data`
--
ALTER TABLE `training_data`
  ADD PRIMARY KEY (`td_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_messages`
--
ALTER TABLE `admin_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `training_data`
--
ALTER TABLE `training_data`
  MODIFY `td_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
