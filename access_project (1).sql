-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2021 at 11:59 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `access_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_record`
--

CREATE TABLE `access_record` (
  `access_id` int(100) NOT NULL,
  `master_id` int(100) DEFAULT NULL,
  `rfid_ref` varchar(255) DEFAULT NULL,
  `access_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_record`
--

INSERT INTO `access_record` (`access_id`, `master_id`, `rfid_ref`, `access_time`) VALUES
(11, 9, '5967FFB9 ', '2021-08-10 12:33:34'),
(12, 9, '5967FFB9 ', '2021-08-10 12:37:02'),
(13, 9, '5967FFB9 ', '2021-08-10 12:37:27'),
(14, 9, '5967FFB9 ', '2021-08-10 12:45:12'),
(15, 9, '5967FFB9 ', '2021-08-10 12:45:40'),
(16, 9, '5967FFB9 ', '2021-08-10 12:52:33'),
(17, 9, '5967FFB9 ', '2021-08-10 12:53:36'),
(18, 9, '5967FFB9 ', '2021-08-10 13:00:21'),
(19, 9, '5967FFB9 ', '2021-08-10 13:42:57'),
(20, 9, '5967FFB9 ', '2021-08-10 13:44:47'),
(21, 9, '5967FFB9 ', '2021-08-10 13:45:54'),
(22, 9, '5967FFB9 ', '2021-08-10 13:49:39'),
(23, 9, '5967FFB9 ', '2021-08-10 13:50:56'),
(24, 9, '5967FFB9 ', '2021-08-10 13:56:19'),
(25, 9, '5967FFB9 ', '2021-08-10 13:57:49'),
(26, 9, '5967FFB9 ', '2021-08-10 14:06:14'),
(27, 9, '5967FFB9 ', '2021-08-10 14:13:36'),
(28, 9, '5967FFB9 ', '2021-08-10 14:15:30'),
(29, 9, '5967FFB9 ', '2021-08-10 14:17:28'),
(30, 9, '5967FFB9 ', '2021-08-10 14:42:21'),
(31, 9, '5967FFB9 ', '2021-08-10 17:27:02'),
(32, 9, '5967FFB9 ', '2021-08-10 17:28:03'),
(33, 9, '5967FFB9 ', '2021-08-10 17:29:11'),
(34, 9, '5967FFB9 ', '2021-08-10 17:36:50'),
(35, 9, '5967FFB9 ', '2021-08-10 17:37:49'),
(36, 9, '5967FFB9 ', '2021-08-10 17:41:48'),
(37, 9, '5967FFB9 ', '2021-08-10 17:43:43'),
(38, 9, '5967FFB9 ', '2021-08-10 17:44:40'),
(39, 9, '5967FFB9 ', '2021-08-10 17:45:07'),
(40, 9, '5967FFB9 ', '2021-08-10 17:45:22'),
(41, 9, '5967FFB9 ', '2021-08-10 17:45:45'),
(42, 9, '5967FFB9 ', '2021-08-10 17:46:32'),
(43, 9, '5967FFB9 ', '2021-08-10 17:47:27'),
(44, 9, '5967FFB9 ', '2021-08-10 17:48:08'),
(45, 9, '5967FFB9 ', '2021-08-10 17:49:28'),
(46, 9, '5967FFB9 ', '2021-08-10 17:51:18'),
(47, 9, '5967FFB9 ', '2021-08-10 17:51:44'),
(48, 9, '5967FFB9 ', '2021-08-10 17:52:32'),
(49, 9, '5967FFB9 ', '2021-08-10 18:08:19'),
(50, 9, '5967FFB9 ', '2021-08-10 18:08:54'),
(51, 9, '5967FFB9 ', '2021-08-10 18:09:08'),
(52, 9, '5967FFB9 ', '2021-08-10 18:09:17'),
(53, 9, '5967FFB9 ', '2021-08-10 18:27:04'),
(54, 9, '5967FFB9 ', '2021-08-10 18:27:27'),
(55, 9, '5967FFB9 ', '2021-08-10 18:32:01'),
(56, 9, '5967FFB9 ', '2021-08-10 18:37:18'),
(57, 9, '5967FFB9 ', '2021-08-10 18:49:58'),
(58, 9, '5967FFB9 ', '2021-08-10 18:55:20'),
(59, 9, '5967FFB9 ', '2021-08-10 18:56:37'),
(60, 9, '5967FFB9 ', '2021-08-10 19:01:51'),
(61, 9, '5967FFB9 ', '2021-08-10 19:02:53'),
(62, 9, '5967FFB9 ', '2021-08-10 19:04:29'),
(63, 9, '5967FFB9 ', '2021-08-10 19:05:58'),
(64, 9, '5967FFB9 ', '2021-08-10 19:06:47'),
(65, 9, '5967FFB9 ', '2021-08-10 19:07:08'),
(66, 9, '5967FFB9 ', '2021-08-10 19:07:25'),
(67, 9, '5967FFB9 ', '2021-08-10 19:19:27'),
(68, 9, '5967FFB9 ', '2021-08-10 19:20:01'),
(69, 9, '5967FFB9 ', '2021-08-10 19:20:18'),
(70, 9, '5967FFB9 ', '2021-08-10 19:20:48'),
(71, 9, '5967FFB9 ', '2021-08-10 19:21:24'),
(72, 9, '5967FFB9 ', '2021-08-10 19:26:22'),
(73, 9, '5967FFB9 ', '2021-08-10 19:26:56'),
(74, 9, '5967FFB9 ', '2021-08-10 19:30:10'),
(75, 9, '5967FFB9 ', '2021-08-10 19:35:59'),
(76, 9, '5967FFB9 ', '2021-08-10 19:38:15'),
(77, 9, '5967FFB9 ', '2021-08-10 19:41:38'),
(78, 9, '5967FFB9 ', '2021-08-10 19:43:57'),
(79, 9, '5967FFB9 ', '2021-08-10 19:44:58'),
(80, 9, '5967FFB9 ', '2021-08-10 19:48:21'),
(81, 9, '5967FFB9 ', '2021-08-10 19:48:45'),
(82, 9, '5967FFB9 ', '2021-08-10 19:49:03'),
(83, 9, '5967FFB9 ', '2021-08-10 19:49:25'),
(84, 9, '5967FFB9 ', '2021-08-10 19:50:52'),
(85, 9, '5967FFB9 ', '2021-08-10 19:59:33'),
(86, 9, '5967FFB9 ', '2021-08-10 20:00:11'),
(87, 9, '5967FFB9 ', '2021-08-10 20:01:05'),
(88, 9, '5967FFB9 ', '2021-08-10 20:01:32'),
(89, 9, '5967FFB9 ', '2021-08-10 20:01:46'),
(90, 9, '5967FFB9 ', '2021-08-10 20:02:10'),
(91, 9, '5967FFB9 ', '2021-08-10 20:02:27'),
(92, 9, '5967FFB9 ', '2021-08-10 20:09:23'),
(93, 9, '5967FFB9 ', '2021-08-10 20:11:10'),
(94, 9, '5967FFB9 ', '2021-08-10 20:11:39'),
(95, 9, '5967FFB9 ', '2021-08-10 20:12:01'),
(96, 9, '5967FFB9 ', '2021-08-10 20:12:14'),
(97, 9, '5967FFB9 ', '2021-08-10 20:12:27'),
(98, 9, '5967FFB9 ', '2021-08-10 20:12:45'),
(99, 9, '5967FFB9 ', '2021-08-10 20:13:10'),
(100, 9, '5967FFB9 ', '2021-08-10 20:13:22'),
(101, 9, '5967FFB9 ', '2021-08-10 20:13:33'),
(102, 9, '5967FFB9 ', '2021-08-10 20:13:45'),
(103, 9, '5967FFB9 ', '2021-08-10 20:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'jake', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'Project', '554bb3703de6043360eb7eaf2a00208b');

-- --------------------------------------------------------

--
-- Table structure for table `bmi`
--

CREATE TABLE `bmi` (
  `bmi_id` int(100) NOT NULL,
  `rfid_ref` varchar(255) DEFAULT NULL,
  `Height` varchar(255) DEFAULT NULL,
  `Weight` varchar(255) DEFAULT NULL,
  `Date_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bmi`
--

INSERT INTO `bmi` (`bmi_id`, `rfid_ref`, `Height`, `Weight`, `Date_created`) VALUES
(3, '90DEC32 ', '6ft900', '56', '2021-08-07 23:35:18'),
(4, '5967FFB9', '4.46', '164', '2021-08-10 20:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `masters_tb`
--

CREATE TABLE `masters_tb` (
  `master_id` int(100) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `Firstname` varchar(255) DEFAULT NULL,
  `Lastname` varchar(255) DEFAULT NULL,
  `School` varchar(255) DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `rfid_ref` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `Date_created` datetime DEFAULT current_timestamp(),
  `Date_updated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masters_tb`
--

INSERT INTO `masters_tb` (`master_id`, `tag`, `student_id`, `Firstname`, `Lastname`, `School`, `Department`, `rfid_ref`, `Gender`, `Date_created`, `Date_updated`) VALUES
(7, '90DEC32', 'F/HD/18/3410003', 'Jake', 'Obodomechine', 'Engineering', 'Computer Engineering', NULL, 'FEMALE', '2021-08-05 07:53:16', '2021-08-05 07:53:16'),
(8, '8959955', 'F/HD/18/3410020', 'EFEOMA', 'NLEM', 'Engineering', 'Tailoring', NULL, 'Engineering', '2021-08-05 07:53:48', '2021-08-05 07:53:48'),
(9, '5967FFB9 ', 'F/HD/18/3410001', 'Akinremi', 'Savage', 'Engineering', 'Computer Engineering', NULL, 'Male', '2021-08-10 12:32:53', '2021-08-10 12:32:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_record`
--
ALTER TABLE `access_record`
  ADD PRIMARY KEY (`access_id`),
  ADD KEY `master_id` (`master_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bmi`
--
ALTER TABLE `bmi`
  ADD PRIMARY KEY (`bmi_id`),
  ADD KEY `studentid` (`rfid_ref`);

--
-- Indexes for table `masters_tb`
--
ALTER TABLE `masters_tb`
  ADD PRIMARY KEY (`master_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `master_id` (`master_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_record`
--
ALTER TABLE `access_record`
  MODIFY `access_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bmi`
--
ALTER TABLE `bmi`
  MODIFY `bmi_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `masters_tb`
--
ALTER TABLE `masters_tb`
  MODIFY `master_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_record`
--
ALTER TABLE `access_record`
  ADD CONSTRAINT `master_id` FOREIGN KEY (`master_id`) REFERENCES `masters_tb` (`master_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
