-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2016 at 06:37 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

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
('arushngpl16@gmail.com', 'Arush Nagpal', '$2y$10$wanttocrackitokaythenOQlgZiefbu9OzjU873v9LbZOMZkARSIm');

-- --------------------------------------------------------

--
-- Table structure for table `admin_messages`
--

CREATE TABLE `admin_messages` (
  `id` bigint(20) NOT NULL,
  `from_user` varchar(200) NOT NULL,
  `to_user` varchar(200) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_messages`
--

INSERT INTO `admin_messages` (`id`, `from_user`, `to_user`, `subject`, `message`, `ip_address`, `timestamp`) VALUES
(1, 'arushngpl16@gmail.com', 'admin', 'jdbsjbj', 'Arush Nagpal', '127.0.0.1', '2016-04-05 18:31:41');

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

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`registration_id`, `initials`, `name`, `password`, `phone`, `email`, `designation`, `pref1`, `pref2`, `pref3`, `access_token`) VALUES
(101303012, 'Dr.', 'Akshit Arora', '$2y$10$wanttocrackitokaythenO8QD8gOVdke5kQKXFtYmiYSQKOUZduqa', 7696061995, 'akshit.arora1995@gmail.com', 'Associate Professor', 'New Delhi', 'Pune', 'Bangalore', NULL),
(101303034, 'Dr.', 'Arush Nagpal', '$2y$10$wanttocrackitokaythenOQlgZiefbu9OzjU873v9LbZOMZkARSIm', 9988090859, 'arushngpl16@gmail.com', 'Associate Professor', 'New Delhi', 'Pune', 'Bangalore', NULL);

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
  `password` varchar(250) NOT NULL,
  `activation_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`initials`, `name`, `phone`, `email`, `company`, `password`, `activation_link`) VALUES
('Mr.', 'Abhinav Garg', 9803360828, 'abhinavgarg017@gmail.com', 'microsoft', '$2y$10$wanttocrackitokaythenOn8pJMiMInc6e/YOlGdfZz2aJbpqROoq', '0'),
('Mr.', 'Arush Nagpal', 9803360828, 'arushngpl16@gmail.com', 'microsoft', '$2y$10$wanttocrackitokaythenOQlgZiefbu9OzjU873v9LbZOMZkARSIm', '0');

-- --------------------------------------------------------

--
-- Table structure for table `mentor_feedback`
--

CREATE TABLE `mentor_feedback` (
  `roll_number` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `q1` varchar(4) NOT NULL,
  `q2` varchar(4) NOT NULL,
  `q3` varchar(4) NOT NULL,
  `q4` varchar(4) NOT NULL,
  `q5` varchar(4) NOT NULL,
  `q6` varchar(4) NOT NULL,
  `q7` varchar(4) NOT NULL,
  `q8` varchar(4) NOT NULL,
  `q9` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `previous_training`
--

CREATE TABLE `previous_training` (
  `name` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `period` varchar(500) NOT NULL,
  `stayed_at` varchar(100) NOT NULL,
  `stay_review` varchar(500) NOT NULL,
  `company_review` varchar(500) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `previous_training`
--

INSERT INTO `previous_training` (`name`, `company`, `place`, `period`, `stayed_at`, `stay_review`, `company_review`, `contact`, `email`) VALUES
('Arush Nagpal', 'TCS', 'Vadodra', '6 months', 'Palm View', 'Good hygeinic place, a bit costly', 'Work on Web Development, Nice work culture', '9988090859', 'arushngpl16@gmail.com'),
('Akshit Arora', 'Infosys', 'Mumbai', '4 months', 'JW Marriot', 'Very costly', 'Nice work culture', '7696061995', 'akshit.arora1995@gmail.com'),
('Akshit Goyal', 'Accenture', 'Noida', '6 months', 'JW Marriot', 'Very costly', 'Nice work culture', '7696061995', 'akshit.arora1995@gmail.com');

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
  `activation_link` varchar(200) NOT NULL,
  `mentor_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`roll_number`, `email`, `password`, `name`, `branch`, `semester`, `phone`, `time_of_registration`, `activation_link`, `mentor_code`) VALUES
(101303004, 'abhinavgarg017@gmail.com', '$2y$10$wanttocrackitokaythenO56HCrYbRnQnNhOUcDUZBI1lSeSf2JaS', 'Abhinav Garg', 'Computer Engineering', 7, 99999999999, '2016-04-02 07:02:54', '0', 'jsbf'),
(101303012, 'akshit.arora1995@gmail.com', '$2y$10$wanttocrackitokaythenO9j2D2UBqMan8uujjSFj6CU/jGNmgXqm', 'Akshit Arora', 'Computer Engineering', 6, 7696061995, '2016-04-24 18:50:32', '0', '0'),
(101303034, 'arushngpl16@gmail.com', '$2y$10$wanttocrackitokaythenOQlgZiefbu9OzjU873v9LbZOMZkARSIm', 'Arush Nagpal', 'Mechanical Engineering', 4, 9988090859, '2016-03-04 18:19:44', '0', '0'),
(101303041, 'chahakgupta4@gmail.com', '$2y$10$wanttocrackitokaythenOllYjFQbN858uRoI3Q8HktZ9i.zSHvSC', 'Chahak', 'Computer Engineering', 6, 9041114525, '2016-04-05 10:45:39', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `training_data`
--

CREATE TABLE `training_data` (
  `td_id` int(11) NOT NULL,
  `roll_number` bigint(20) NOT NULL,
  `email` varchar(500) NOT NULL,
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
  `faculty_alotted` varchar(100) DEFAULT NULL,
  `feedback_done` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training_data`
--

INSERT INTO `training_data` (`td_id`, `roll_number`, `email`, `company`, `city`, `date_of_join`, `months`, `mentor`, `joining_report`, `intermid_report`, `final_report`, `training_num`, `phase`, `admin_approve`, `faculty_alotted`, `feedback_done`) VALUES
(1, 101303041, 'chahakgupta4@gmail.com', 'ABC', 'Bangalore', '0000-00-00', 4, 'abhinavgarg017@gmail.com', '', '', '', '1', 0, 1, NULL, 0),
(2, 101303042, '', 'BCD', 'Pune', '0000-00-00', 0, '', '', '', '', '', 0, 1, NULL, 0),
(3, 101303034, 'arushngpl16@gmail.com', 'GHI', 'New Delhi', '0000-00-00', 4, '', '', '', '', '1', 2, 1, NULL, 0),
(5, 101303041, 'chahakgupta4@gmail.com', 'BCD', 'Pune', '2016-04-22', 2, 'arushngpl16@gmail.com', '', '', '', '2', 0, 1, NULL, 0),
(6, 101303012, 'akshit.arora1995@gmail.com', 'PayTm', 'Bangalore', '2016-04-09', 3, '', '', '', '', '1', 0, 0, NULL, 0),
(7, 101303012, 'akshit.arora1995@gmail.com', 'Paytm23', 'Noida', '2016-04-16', 3, '', '', '', '', '2', 0, 1, 'akshit.arora1995@gmail.com', 0);

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
-- Indexes for table `previous_training`
--
ALTER TABLE `previous_training`
  ADD PRIMARY KEY (`name`,`company`,`place`,`contact`,`email`);

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
-- AUTO_INCREMENT for table `admin_messages`
--
ALTER TABLE `admin_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `training_data`
--
ALTER TABLE `training_data`
  MODIFY `td_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
