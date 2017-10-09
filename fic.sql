-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 09, 2017 at 05:08 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email_id`) VALUES
(1001, 'rohit', 'rohit0009', 'rohitpshewale@gmail.com'),
(1002, 'neha', 'neha0009', 'nehamshende@gmail.com'),
(1003, 'pratik', 'pratik7', 'pratik@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_id` int(11) UNSIGNED NOT NULL,
  `batch_name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `batch_time` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `course_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `batch_name`, `batch_time`, `course_id`) VALUES
(2001, 'B1', '6:00am - 7:00am', 3001),
(2002, 'B2', '6:00am - 7:00am', 3001),
(2003, 'B3', '7:15am - 8:15am', 3001),
(2004, 'B4', '7:15am - 8:15am', 3001),
(2005, 'B1', '10:00am - 11:00am', 3002),
(2006, 'B2', '11:15am - 12:15pm', 3002),
(2007, 'B3', '5:00pm - 6:00pm', 3002),
(2008, 'B4', '6:15pm - 7:15pm', 3002),
(2009, 'B1', '9:00am -10:30am', 3003),
(2010, 'B2', '6:00pm - 7:30pm', 3003),
(2011, 'B1', '6:30am - 7:30am', 3004),
(2012, 'B2', '6:30pm - 7:30pm', 3004),
(2013, 'B1', '6:00am - 12:00pm', 3005),
(2014, 'B2', '1:00pm - 5:00om', 3005),
(2015, 'B3', '5:00pm - 10:00pm', 3005);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) UNSIGNED NOT NULL,
  `course_name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `monthly` double NOT NULL,
  `monthly_d` double NOT NULL,
  `quarterly_d` double NOT NULL,
  `sixmonth_d` double NOT NULL,
  `yearly_d` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `monthly`, `monthly_d`, `quarterly_d`, `sixmonth_d`, `yearly_d`) VALUES
(3001, 'Swimming', 1200, 0, 0.05, 0.1, 0.15),
(3002, 'Table Tennis', 1200, 0, 0.05, 0.1, 0.15),
(3003, 'Squash', 300, 0, 0.05, 0.1, 0.15),
(3004, 'Zumba', 800, 0, 0.05, 0.1, 0.15),
(3005, 'Gym', 1500, 0, 0.05, 0.1, 0.15);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `cust_id` int(11) UNSIGNED NOT NULL,
  `f_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `l_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `gender` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pincode` int(7) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `otp` int(6) NOT NULL,
  `activate` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`cust_id`, `f_name`, `l_name`, `gender`, `address`, `pincode`, `contact_no`, `email`, `username`, `password`, `otp`, `activate`) VALUES
(4004, 'Neha', 'Shende', 'f', 'Fortuna', 411014, 9921819654, 'nehamshende@gmail.com', 'neha0009', '18f4c0494e49e43d26adc828a0ace251', 232939, 1),
(4006, 'Rohit', 'Shewale', 'm', 'Mukundnagar', 411037, 8055228282, 'rohitpshewale@gmail.com', 'rohit0009', '53fc6512d0687b205bcbe585f92806de', 366077, 1);

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `membership_id` int(11) UNSIGNED NOT NULL,
  `course_id` int(11) UNSIGNED NOT NULL,
  `cust_id` int(11) UNSIGNED NOT NULL,
  `batch_id` int(11) UNSIGNED NOT NULL,
  `enrollment_date` date NOT NULL,
  `discount` double NOT NULL,
  `expiry_date` date NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`membership_id`, `course_id`, `cust_id`, `batch_id`, `enrollment_date`, `discount`, `expiry_date`, `duration`) VALUES
(5012, 3004, 4004, 2012, '2017-09-29', 120, '2017-12-29', 80),
(5013, 3002, 4004, 2005, '2017-09-29', 0, '2017-10-29', 19),
(5014, 3001, 4004, 2003, '2017-10-01', 0, '2017-11-01', 22),
(5024, 3002, 4006, 2005, '2017-10-09', 0, '2017-11-09', 30);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `seat_id` int(11) UNSIGNED NOT NULL,
  `batch_id` int(11) UNSIGNED NOT NULL,
  `course_id` int(11) UNSIGNED NOT NULL,
  `trainer_id` int(11) UNSIGNED DEFAULT NULL,
  `no_of_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`seat_id`, `batch_id`, `course_id`, `trainer_id`, `no_of_seats`) VALUES
(6001, 2001, 3001, 7001, 4),
(6002, 2002, 3001, NULL, 1),
(6003, 2003, 3001, 7001, 0),
(6004, 2004, 3001, 7002, 7),
(6005, 2005, 3002, 7003, 6),
(6006, 2006, 3002, 7004, 7),
(6007, 2007, 3002, 7003, 0),
(6008, 2008, 3002, 7004, 8),
(6010, 2010, 3003, NULL, 10),
(6011, 2011, 3004, 7005, 15),
(6012, 2012, 3004, 7005, 12),
(6013, 2009, 3003, NULL, 10),
(6014, 2013, 3005, 7006, 30),
(6015, 2015, 3005, 7007, 29),
(6016, 2014, 3005, NULL, 20);

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `trainer_id` int(11) UNSIGNED NOT NULL,
  `trainer_name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `contact_no` bigint(11) NOT NULL,
  `salary` double NOT NULL,
  `address` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `course_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`trainer_id`, `trainer_name`, `contact_no`, `salary`, `address`, `email`, `course_id`) VALUES
(7001, 'Ajinkya Joshi', 8055228282, 15000, 'Kothrud', 'ajinkya@gmail.com', 3001),
(7002, 'Akshay H', 8055228282, 5000, 'Kothrud', 'akshay@gmail.com', 3001),
(7003, 'Atharva Haralikar', 9912312399, 10000, 'Kothrud', 'atharva@gmail.com', 3002),
(7004, 'Sarvesh Dighe', 9912312399, 12000, 'Bibewadi', 'sarvesh@gmail.com', 3002),
(7005, 'Prachi Desai', 9912312399, 4000, 'Kothrud', 'prachi@gmail.com', 3004),
(7006, 'Kshitij Shende', 8055228282, 35000, 'Kothrud', 'kshitij@gmail.com', 3005),
(7007, 'Aditya Daswekar', 8055228282, 25000, 'Sinhagad Rd', 'aditya@gmail.com', 3005);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`),
  ADD KEY `ix_batch_course_id` (`course_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`membership_id`),
  ADD KEY `ix_membership_course_id` (`course_id`),
  ADD KEY `ix_membership_cust_id` (`cust_id`),
  ADD KEY `ix_membership_batch_id` (`batch_id`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`seat_id`),
  ADD KEY `ix_seat_batch_id` (`batch_id`),
  ADD KEY `ix_seat_course_id` (`course_id`),
  ADD KEY `ix_seat_trainer_id` (`trainer_id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`trainer_id`),
  ADD KEY `ix_trainer_course_id` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2016;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3006;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `cust_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4007;
--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `membership_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5028;
--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `seat_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6017;
--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `trainer_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7008;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `FK_batch_course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `FK_batch_id` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_member_id` FOREIGN KEY (`cust_id`) REFERENCES `member` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `FK_seat_batch_id` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_seat_course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_seat_trainer_id` FOREIGN KEY (`trainer_id`) REFERENCES `trainer` (`trainer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trainer`
--
ALTER TABLE `trainer`
  ADD CONSTRAINT `FK_trainer_course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
