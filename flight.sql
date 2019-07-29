-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2019 at 05:13 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flight`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sex` varchar(10) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `sex`, `username`, `password`, `mobile`, `address`, `email`) VALUES
(1, 'Admin', 'male', 'admin', '21232f297a57a5a743894a0e4a801fc3', '4567567', 'Internet', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`) VALUES
(4, 'SUpport'),
(5, 'Marketing'),
(6, 'Chemical'),
(7, 'Production'),
(8, 'Something');

-- --------------------------------------------------------

--
-- Table structure for table `flight_table`
--

CREATE TABLE `flight_table` (
  `flight_id` int(11) NOT NULL,
  `route_id` int(11) DEFAULT NULL,
  `flight_date` date DEFAULT NULL,
  `flight_time` time DEFAULT NULL,
  `plane_model` varchar(100) DEFAULT NULL,
  `price` float(8,2) NOT NULL DEFAULT '0.00',
  `flight_description` text,
  `flight_image` varchar(100) DEFAULT 'default.png',
  `flight_status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_table`
--

INSERT INTO `flight_table` (`flight_id`, `route_id`, `flight_date`, `flight_time`, `plane_model`, `price`, `flight_description`, `flight_image`, `flight_status`) VALUES
(12, 4, '2019-07-10', '01:12:00', 'JLKDJl', 0.00, '', 'flight_image-1564366613.jpeg', 'active'),
(13, 3, '2019-07-23', '01:25:00', 'LKJLK98DJ', 0.00, '', 'flight_image-1564366632.jpeg', 'active'),
(14, 4, '2019-07-09', '12:25:00', 'KHJD', 0.00, '', 'flight_image-1564366649.jpeg', 'active'),
(15, 5, '2019-07-08', '13:26:00', 'LKJDLJ', 0.00, '', 'flight_image-1564366673.jpeg', 'active'),
(16, 4, '2019-07-15', '03:15:00', 'KUHKDJH98D', 0.00, '', 'flight_image-1564366706.jpeg', 'active'),
(17, 4, '2019-07-04', '13:45:00', 'KJH88JD', 2600.00, 'sdfds', 'flight_image-1564369875.jpeg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `route_id` int(11) NOT NULL,
  `route_name` varchar(100) NOT NULL,
  `start_destination` varchar(100) NOT NULL,
  `end_destination` varchar(100) NOT NULL,
  `route_status` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`route_id`, `route_name`, `start_destination`, `end_destination`, `route_status`) VALUES
(3, 'Test Route', 'Dhaka', 'Chittagong', 'active'),
(4, 'Dhaka To Chittagon', 'Dhaka', 'Chittagon', 'active'),
(5, 'Dhaka Bankok', 'Dhaka', 'Bankok', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `flight_id` int(11) NOT NULL,
  `adult` int(11) NOT NULL DEFAULT '1',
  `date` varchar(10) NOT NULL,
  `child` int(2) NOT NULL DEFAULT '0',
  `message` varchar(255) DEFAULT NULL,
  `ticket_status` varchar(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `user_id`, `name`, `mobile`, `email`, `flight_id`, `adult`, `date`, `child`, `message`, `ticket_status`) VALUES
(2, NULL, 'sdf', 'sdf', 'sdfsdf@sda.dsf', 14, 2, '12-02-2019', 0, 'sdfsd', 'pending'),
(3, NULL, 'sd', 'sdfdsfsdf', 'fsdf@sd.sdf', 15, 3, 'sdf', 0, 'sdfsd', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sex` varchar(10) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `sex`, `username`, `password`, `mobile`, `address`, `email`) VALUES
(1, 'Ariful Islam', 'male', 'arif', '0ff6c3ace16359e41e37d40b8301d67f', '01754567890', 'Elenga', 'arif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight_table`
--
ALTER TABLE `flight_table`
  ADD PRIMARY KEY (`flight_id`),
  ADD KEY `route_id` (`route_id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `flight_id` (`flight_id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `flight_table`
--
ALTER TABLE `flight_table`
  MODIFY `flight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flight_table`
--
ALTER TABLE `flight_table`
  ADD CONSTRAINT `flight_table_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `route` (`route_id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usertable` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`flight_id`) REFERENCES `flight_table` (`flight_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
