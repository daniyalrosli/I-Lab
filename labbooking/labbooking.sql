-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 28, 2022 at 03:39 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(10) NOT NULL,
  `booking_status` varchar(10) NOT NULL,
  `booking_startdate` date NOT NULL,
  `booking_enddate` date NOT NULL,
  `booking_reason` varchar(50) NOT NULL,
  `booking_details` varchar(50) NOT NULL,
  `lab_id` varchar(50) NOT NULL,
  `userid` int(10) NOT NULL,
  `admin_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_status`, `booking_startdate`, `booking_enddate`, `booking_reason`, `booking_details`, `lab_id`, `userid`, `admin_id`) VALUES
(1, 'Approved', '2022-06-13', '2022-06-14', 'Assignment', '', '1', 2, 1),
(2, 'Rejected', '2022-06-16', '2022-06-17', 'Tutorial', '', '2', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(4) NOT NULL,
  `feedback_name` varchar(50) NOT NULL,
  `feedback_email` varchar(50) NOT NULL,
  `feedback_phone` varchar(10) NOT NULL,
  `feedback_report` varchar(10) NOT NULL,
  `userid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `feedback_name`, `feedback_email`, `feedback_phone`, `feedback_report`, `userid`) VALUES
(1, 'ali', 'ali2@gmail.com', '0134567890', 'good', '2'),
(2, 'abu', 'abu@gmail.com', '0194356358', 'not bad', '2');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `lab_id` int(11) NOT NULL,
  `lab_name` varchar(50) NOT NULL,
  `lab_location` varchar(10) NOT NULL,
  `lab_level` varchar(50) NOT NULL,
  `lab_capacity` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`lab_id`, `lab_name`, `lab_location`, `lab_level`, `lab_capacity`) VALUES
(1, 'MK1', 'Blok A', '1', '10'),
(2, 'MK2', 'Blok C', '2', '15'),
(3, 'MK3', 'Blok E', '2', '15'),
(4, 'MK4', 'Blok D', '1', '10'),
(5, 'MK4', 'Blok A', '2', '10'),
(6, 'MK5', 'Blok B', '1', '10'),
(7, 'MK6', 'Blok C', '1', '20'),
(8, 'MK7', 'Blok D', '2', '10'),
(9, 'MK8', 'Blok B', '2', '25'),
(10, 'MK9', 'Blok C', '1', '15');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(10) NOT NULL,
  `level_desc` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_desc`) VALUES
(1, 'Admin'),
(2, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `slotid` int(10) NOT NULL,
  `slotdesc` varchar(50) NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`slotid`, `slotdesc`, `time`) VALUES
(1, 'monday 12.00 pm', '12.00 pm'),
(2, 'tuesday 2.00 pm', '2.00 pm'),
(3, 'wednesday 4.00 pm', '4.00 pm');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `levelid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `gender`, `address`, `telephone`, `email`, `levelid`) VALUES
(1, 'admin1', '123', 'Male', 'No.12,Jalan Suria,Taman Malinja', '0101919199', 'dani@gmail.com', 1),
(2, 'izzat', '234', 'Male', 'No.16b, Jalan Mahsuri, Taman Masria', '0104356358', 'zat@gmail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`slotid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `slotid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
