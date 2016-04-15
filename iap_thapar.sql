-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2016 at 11:03 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.30

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
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
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
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` bigint(20) NOT NULL,
  `branch` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `faculty` (
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

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE `mentor` (
  `initials` varchar(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `company` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`initials`, `name`, `phone`, `email`, `company`, `password`) VALUES
('Mr.', 'Abhinav Garg', 9803360828, 'abhinavgarg017@gmail.com', 'microsoft', '$2y$10$wanttocrackitokaythenOn8pJMiMInc6e/YOlGdfZz2aJbpqROoq'),
('Mr.', 'Arush Nagpal', 9803360828, 'arushngpl16@gmail.com', 'microsoft', '$2y$10$wanttocrackitokaythenOQlgZiefbu9OzjU873v9LbZOMZkARSIm');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
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
(101303034, 'arushngpl16@gmail.com', '$2y$10$wanttocrackitokaythenO56HCrYbRnQnNhOUcDUZBI1lSeSf2JaS', 'Arush Nagpal', 'Mechanical Engineering', 4, 9988090859, '2016-03-04 18:19:44', '0'),
(101303041, 'chahakgupta4@gmail.com', '$2y$10$wanttocrackitokaythenOllYjFQbN858uRoI3Q8HktZ9i.zSHvSC', 'Chahak', 'Computer Engineering', 6, 9041114525, '2016-04-05 10:45:39', '0');

-- --------------------------------------------------------

--
-- Table structure for table `training_data`
--

CREATE TABLE `training_data` (
  `td_id` int(11) NOT NULL,
  `roll_number` bigint(20) NOT NULL,
  `company` varchar(250) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `date_of_join` date NOT NULL,
  `months` int(11) NOT NULL,
  `mentor` varchar(200) NOT NULL,
  `phase` int(11) NOT NULL DEFAULT '0',
  `admin_approve` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training_data`
--

INSERT INTO `training_data` (`td_id`, `roll_number`, `company`, `city`, `date_of_join`, `months`, `mentor`, `phase`, `admin_approve`) VALUES
(1, 101303041, 'ABC', 'Bangalore', '0000-00-00', 0, 'abhinavgarg017@gmail.com', 0, 1),
(2, 101303042, 'BCD', 'Pune', '0000-00-00', 0, '', 0, 1),
(3, 101303034, 'GHI', 'New Delhi', '0000-00-00', 0, '', 0, 1),
(4, 101303041, 'BCD', 'Pune', '2016-04-13', 2, '', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`registration_id`);

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
  ADD PRIMARY KEY (`roll_number`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `training_data`
--
ALTER TABLE `training_data`
  ADD PRIMARY KEY (`td_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `training_data`
--
ALTER TABLE `training_data`
  MODIFY `td_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
