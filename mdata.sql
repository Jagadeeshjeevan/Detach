-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 09:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `trans_application`
--

CREATE TABLE `trans_application` (
  `sno` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `assign_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `send_to` int(11) NOT NULL,
  `comments` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trans_dep`
--

CREATE TABLE `trans_dep` (
  `sno` int(11) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `section` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `user_type` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_dep`
--

INSERT INTO `trans_dep` (`sno`, `unique_id`, `section`, `status`, `user_type`) VALUES
(1, 7788, 'E Section', 0, 0),
(2, 2233, 'M Section', 0, 0),
(3, 1, 'admin', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trans_section`
--

CREATE TABLE `trans_section` (
  `sno` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `reference_no` int(11) NOT NULL,
  `ref_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `subject` varchar(500) NOT NULL,
  `date_of_received` datetime NOT NULL,
  `pending_with` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `period` datetime NOT NULL,
  `current_state` int(11) NOT NULL DEFAULT 1,
  `reason_for_pendency` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_section`
--

INSERT INTO `trans_section` (`sno`, `application_id`, `reference_no`, `ref_date`, `subject`, `date_of_received`, `pending_with`, `status`, `period`, `current_state`, `reason_for_pendency`, `section_id`) VALUES
(1, 987676, 839151, '2023-05-27 18:26:56', 'New Appli', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0, 0, 2233),
(2, 9988, 195269, '2023-05-27 19:00:09', 'M section', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 2, 0, 2233),
(3, 3456, 121588, '2023-05-28 05:55:45', 'Something', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 1, 0, 2233);

-- --------------------------------------------------------

--
-- Table structure for table `trans_user`
--

CREATE TABLE `trans_user` (
  `aid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `session_id` varchar(100) DEFAULT NULL,
  `session_in` datetime DEFAULT NULL,
  `session_out` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `pcId` varchar(50) DEFAULT NULL,
  `user_type` int(11) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_user`
--

INSERT INTO `trans_user` (`aid`, `username`, `password`, `session_id`, `session_in`, `session_out`, `status`, `pcId`, `user_type`, `created_by`) VALUES
(1, 'test2', 'test', '123456', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '1', 0, 0),
(2, 'test1', 'test', '123456', '2022-02-01 13:46:47', '2022-02-01 13:46:47', 0, '1', 0, 0),
(3, 'jagadish', '12345', NULL, NULL, '0000-00-00 00:00:00', 0, '2233', 0, 1),
(4, 'ravi', '12345', '123456', NULL, '0000-00-00 00:00:00', 0, '1', 0, 2),
(5, 'kiran', '123', NULL, NULL, '0000-00-00 00:00:00', 0, '7788', 1, 2),
(6, 'kiran1', '123', NULL, NULL, '0000-00-00 00:00:00', 0, '7788', 2, 2),
(7, 'Msection', '123', NULL, NULL, '0000-00-00 00:00:00', 0, '2233', 1, 2),
(8, 'Msec', '123', NULL, NULL, '0000-00-00 00:00:00', 0, '2233', 2, 2),
(9, 'Mnew1', '123', NULL, NULL, '0000-00-00 00:00:00', 0, '2233', 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trans_application`
--
ALTER TABLE `trans_application`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `no` (`application_id`);

--
-- Indexes for table `trans_dep`
--
ALTER TABLE `trans_dep`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `trans_section`
--
ALTER TABLE `trans_section`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `trans_user`
--
ALTER TABLE `trans_user`
  ADD PRIMARY KEY (`aid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trans_application`
--
ALTER TABLE `trans_application`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans_dep`
--
ALTER TABLE `trans_dep`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trans_section`
--
ALTER TABLE `trans_section`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trans_user`
--
ALTER TABLE `trans_user`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
