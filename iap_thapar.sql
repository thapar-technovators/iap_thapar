-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2016 at 01:14 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iap_thapar`
--

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
  `designation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`registration_id`, `initials`, `name`, `password`, `phone`, `email`, `designation`) VALUES
(101303041, 'Dr.', 'chahak', '$2y$10$k68Khi2TBbcehk9CvVu0YOXMOTtpjw.GCdfq5pp97am96O/uFQkmC', 9041114525, 'chahakgupta4@gmail.com', 'Lecturer'),
(101303042, 'Ms.', 'chkg', '$2y$10$tzhxzCDODzyElomshw188e6b5dbS9WJGABbPstdFtUobLZ6e3o7BC', 9041114525, 'chahak.gupta4@gmail.com', 'Lecturer'),
(101303046, 'Dr.', 'Chk', '$2y$10$uu5GyP0CLGlanjW0sI/WfuaPg8QOu7xdjPOmjnBlatElwTz.r1P/K', 9879605634, 'cha.hakgupta4@gmail.com', 'Lecturer'),
(11111111111, 'Dr.', 'Abhinav Garg', '$2y$10$rQtm1wq.3gJMDP4BjilZxeiEKU2WthgSH6Thpc6ezidnoz.t3HUvq', 999999999999999, 'abhinavgarg017@gmail.com', 'Lecturer');

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE IF NOT EXISTS `mentor` (
  `initials` varchar(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `company` int(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`initials`, `name`, `phone`, `email`, `company`, `password`) VALUES
('Mr.', 'Abhinav Garg', 2147483647, 'abhinavgarg017@gmail.com', 0, '$2y$10$wanttocrackitokaythenOn8pJMiMInc6e/YOlGdfZz2aJbpqROoq');

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
  `time_of_registration` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`roll_number`, `email`, `password`, `name`, `branch`, `semester`, `phone`, `time_of_registration`) VALUES
(101303041, 'chahakgupta4@gmail.com', '$2y$10$FKiaKdWUC7LzzJ1Wq1ThLez9Q8rQ7IbsDrRHPhTN7IEuhCjysTyCe', 'Chahak Gupta', 'Computer Engineering', 7, 9041114525, '2016-03-04 10:10:16'),
(101303042, 'chahakg.upta4@gmail.com', '$2y$10$7R7w2UL78ykborRnOSbIkewlsZnJCpCIYleF1uzQ62HVT/PejwHAa', 'chk', 'Mechanical Engineering', 4, 9041114525, '2016-03-04 12:31:06'),
(1011122222222, 'abhinavgarg017@gmail.com', '$2y$10$NFb8VHlSxw8WmcMxpMKCFOlKiF2aRHQ8HF7ZmJdpUfynHT0tnHYH6', 'Abhinav Garg', 'Computer Engineering', 7, 5866845663, '2016-03-29 22:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `training_data`
--

CREATE TABLE IF NOT EXISTS `training_data` (
  `roll_number` bigint(20) NOT NULL,
  `company` varchar(250) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `phase` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`registration_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `mentor`
--
ALTER TABLE `mentor`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`roll_number`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
