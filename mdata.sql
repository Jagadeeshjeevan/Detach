-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 12:41 PM
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
-- Table structure for table `ma_receive_from`
--

CREATE TABLE `ma_receive_from` (
  `sno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ma_receive_from`
--

INSERT INTO `ma_receive_from` (`sno`, `name`, `status`) VALUES
(1, 'SP Srikakulam', 1),
(2, 'SP Eluru', 1);

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

--
-- Dumping data for table `trans_application`
--

INSERT INTO `trans_application` (`sno`, `application_id`, `assign_on`, `send_to`, `comments`, `status`) VALUES
(1, 9298, '2023-05-30 21:17:16', 9, '', 1),
(2, 9298, '2023-05-30 21:19:31', 9, '', 1),
(3, 9298, '2023-05-30 21:29:09', 8, '', 1),
(4, 9298, '2023-05-30 21:33:07', 0, '', 1),
(5, 9298, '2023-05-30 21:33:40', 0, '', 1),
(6, 9298, '2023-05-31 04:43:28', 0, '', 1),
(7, 9298, '2023-05-31 04:44:06', 0, '', 1),
(8, 9298, '2023-05-31 05:34:13', 9, '', 1),
(9, 0, '2023-05-31 06:09:47', 9, '', 1),
(10, 23, '2023-05-31 07:04:47', 11, '', 1),
(11, 2345, '2023-05-31 10:11:13', 8, '', 1),
(12, 9, '2023-05-31 10:21:06', 8, '', 1),
(13, 2345, '2023-05-31 10:21:20', 8, '', 1),
(14, 2345, '2023-05-31 10:21:25', 8, '', 1),
(15, 32567, '2023-05-31 10:26:09', 8, '', 1),
(16, 0, '2023-05-31 10:26:20', 8, '', 1),
(17, 0, '2023-05-31 10:40:02', 0, '', 1);

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
(1, 7788, 'N Section', 0, 0),
(2, 2233, 'Me Section', 0, 0),
(3, 1, 'admin', 0, 0),
(4, 8866, 'T Section', 0, 0),
(5, 4455, 'E Section', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trans_section`
--

CREATE TABLE `trans_section` (
  `sno` int(11) NOT NULL,
  `application_id` varchar(50) NOT NULL,
  `reference_no` varchar(50) NOT NULL,
  `ref_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `subject` varchar(500) NOT NULL,
  `date_of_received` datetime NOT NULL,
  `pending_with` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `period` datetime NOT NULL,
  `current_state` int(11) NOT NULL DEFAULT 1,
  `current_position` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `receive_from` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_section`
--

INSERT INTO `trans_section` (`sno`, `application_id`, `reference_no`, `ref_date`, `subject`, `date_of_received`, `pending_with`, `status`, `period`, `current_state`, `current_position`, `section_id`, `receive_from`) VALUES
(1, '9298', '555913', '2023-05-30 20:54:52', 'First', '0000-00-00 00:00:00', 0, 1, '0000-00-00 00:00:00', 2, 0, 2233, ''),
(2, 'PMKL', '169310', '2023-05-31 04:45:16', 'New Application', '0000-00-00 00:00:00', 0, 1, '0000-00-00 00:00:00', 1, 0, 4455, ''),
(3, '23XMB45', '757765', '2023-05-31 04:55:02', 'New Subject', '0000-00-00 00:00:00', 0, 1, '0000-00-00 00:00:00', 2, 0, 4455, ''),
(4, 'GOM897', '181130', '2023-05-31 05:31:11', 'SOme SUbject', '0000-00-00 00:00:00', 0, 1, '0000-00-00 00:00:00', 1, 0, 8866, ''),
(5, 'AC5678', '596793', '2023-05-31 05:38:20', 'New ARO', '0000-00-00 00:00:00', 0, 1, '0000-00-00 00:00:00', 3, 8, 2233, ''),
(6, 'YX567', '660760', '2023-05-31 05:38:47', 'New Me test case', '0000-00-00 00:00:00', 0, 1, '0000-00-00 00:00:00', 2, 0, 2233, ''),
(7, '32567PO', '974475', '2023-05-31 07:20:05', 'New Array', '0000-00-00 00:00:00', 0, 1, '0000-00-00 00:00:00', 2, 8, 2233, 'SP Eluru'),
(8, '09IOM', '877386', '2023-05-31 07:23:59', 'New sub', '0000-00-00 00:00:00', 0, 1, '0000-00-00 00:00:00', 2, 0, 2233, 'SP Eluru'),
(9, '2345KM', '432072', '2023-05-31 07:29:14', '0978', '0000-00-00 00:00:00', 0, 1, '0000-00-00 00:00:00', 2, 0, 2233, 'SP Eluru'),
(10, '1234', '181909', '2023-05-31 09:03:57', 'SOme SUbject', '2023-05-08 00:00:00', 0, 1, '0000-00-00 00:00:00', 1, 0, 7788, 'SP Srikakulam'),
(11, '76543', '919024', '2023-05-31 09:04:58', 'New Subject', '0000-00-00 00:00:00', 0, 1, '0000-00-00 00:00:00', 1, 0, 7788, 'SP Srikakulam'),
(12, '3wertg', '849621', '2023-05-31 09:06:05', 'No Subject', '0000-00-00 00:00:00', 0, 1, '0000-00-00 00:00:00', 4, 0, 7788, 'SP Srikakulam');

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
(2, 'test1', 'test', '123456', '2022-02-01 13:46:47', '2022-02-01 13:46:47', 0, '3', 0, 0),
(3, 'jagadish', '12345', NULL, NULL, '0000-00-00 00:00:00', 0, '2233', 0, 1),
(4, 'ravi', '12345', '123456', NULL, '0000-00-00 00:00:00', 0, '3', 3, 2),
(5, 'kiran', '123', NULL, NULL, '0000-00-00 00:00:00', 0, '7788', 1, 2),
(6, 'kiran1', '123', NULL, NULL, '0000-00-00 00:00:00', 0, '7788', 2, 2),
(7, 'Msection', '123', NULL, NULL, '0000-00-00 00:00:00', 0, '2233', 1, 2),
(8, 'Msec', '123', NULL, NULL, '0000-00-00 00:00:00', 0, '2233', 2, 2),
(9, 'Mnew1', '123', NULL, NULL, '0000-00-00 00:00:00', 0, '2233', 2, 2),
(10, 'Esection', '123', NULL, NULL, '0000-00-00 00:00:00', 0, '4455', 1, 1),
(11, 'Esec', '123', NULL, NULL, '0000-00-00 00:00:00', 0, '4455', 2, 1),
(12, 'Esec2', '123', NULL, NULL, '0000-00-00 00:00:00', 0, '4455', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ma_receive_from`
--
ALTER TABLE `ma_receive_from`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `sno` (`sno`);

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
-- AUTO_INCREMENT for table `ma_receive_from`
--
ALTER TABLE `ma_receive_from`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trans_application`
--
ALTER TABLE `trans_application`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `trans_dep`
--
ALTER TABLE `trans_dep`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trans_section`
--
ALTER TABLE `trans_section`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `trans_user`
--
ALTER TABLE `trans_user`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
