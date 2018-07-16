-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2018 at 12:31 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `atdns`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `atdns_id` int(11) NOT NULL,
  `cla_id` int(11) NOT NULL,
  `bach_id` int(11) NOT NULL,
  `sbjt_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `stdn_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`atdns_id`, `cla_id`, `bach_id`, `sbjt_id`, `user_id`, `stdn_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '30901215045', 1, '2018-04-29 16:37:11', '2018-04-29 16:37:11'),
(2, 1, 1, 1, 1, '30901215022', 1, '2018-04-29 16:37:11', '2018-04-29 16:37:11'),
(3, 1, 1, 1, 1, '30901215002', 1, '2018-04-29 16:37:11', '2018-04-29 16:37:11'),
(4, 1, 1, 1, 1, '30901215011', 1, '2018-04-29 16:37:11', '2018-04-29 16:37:11'),
(5, 1, 1, 2, 1, '30901215045', 1, '2018-04-29 16:39:10', '2018-04-29 16:39:10'),
(6, 1, 1, 2, 1, '30901215022', 1, '2018-04-29 16:39:10', '2018-04-29 16:39:10'),
(7, 1, 1, 2, 1, '30901215002', 1, '2018-04-29 16:39:10', '2018-04-29 16:39:10'),
(8, 1, 1, 2, 1, '30901215011', 1, '2018-04-29 16:39:10', '2018-04-29 16:39:10'),
(9, 1, 1, 1, 1, '30901215045', 1, '2018-04-30 02:32:34', '2018-04-30 02:32:34'),
(10, 1, 1, 1, 1, '30901215022', 1, '2018-04-30 02:32:34', '2018-04-30 02:32:34'),
(11, 1, 1, 1, 1, '30901215002', 1, '2018-04-30 02:32:34', '2018-04-30 02:32:34'),
(12, 1, 1, 1, 1, '30901215011', 1, '2018-04-30 02:32:34', '2018-04-30 02:32:34'),
(13, 1, 1, 1, 1, '30901215045', 1, '2018-04-30 03:10:03', '2018-04-30 03:10:03'),
(14, 1, 1, 1, 1, '30901215022', 1, '2018-04-30 03:10:03', '2018-04-30 03:10:03'),
(15, 1, 1, 1, 1, '30901215002', 1, '2018-04-30 03:10:03', '2018-04-30 03:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `bach_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cla_id` int(11) NOT NULL,
  `bach_name` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`bach_id`, `user_id`, `cla_id`, `bach_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Salt Lake A', 1, '2018-04-28 12:11:06', '2018-04-29 13:39:02'),
(2, 1, 1, 'Salt Lake B', 1, '2018-04-29 13:43:54', '2018-04-29 13:43:54'),
(3, 1, 1, 'Kolkata 1', 1, '2018-04-29 13:45:03', '2018-04-29 13:45:03'),
(4, 1, 1, 'Kolkata 2', 1, '2018-04-29 13:51:14', '2018-04-29 13:51:14'),
(5, 1, 3, 'CS', 1, '2018-04-29 14:17:44', '2018-04-29 14:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `cla_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cla_name` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`cla_id`, `user_id`, `cla_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'BCA', 1, '2018-04-28 11:03:47', '2018-04-29 13:06:44'),
(2, 1, 'MCA', 1, '2018-04-29 12:34:09', '2018-04-29 13:15:09'),
(3, 1, 'B.Tech', 1, '2018-04-29 13:45:31', '2018-04-29 13:47:34'),
(4, 1, 'M.Tech', 1, '2018-04-29 13:46:24', '2018-04-29 13:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stdn_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `stdn_roll` varchar(255) NOT NULL,
  `stdn_name` varchar(1000) NOT NULL,
  `stdn_phone` varchar(10) NOT NULL,
  `stdn_address` longtext NOT NULL,
  `stdn_email` varchar(255) NOT NULL,
  `stdn_gender` text NOT NULL,
  `cla_id` int(11) NOT NULL,
  `bach_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stdn_id`, `user_id`, `stdn_roll`, `stdn_name`, `stdn_phone`, `stdn_address`, `stdn_email`, `stdn_gender`, `cla_id`, `bach_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '30901215045', 'Krishna Paul', '9647572419', 'Dumdum, Kolkata', 'sendmail2krrish@gmail.com', 'male', 1, 1, 1, '2018-04-29 15:13:44', '2018-04-29 15:32:27'),
(2, 1, '30901215022', 'Bikramjit Kr Bhuyia', '0123456789', 'Kolkata', 'bkb@gmail.com', 'male', 1, 1, 1, '2018-04-29 15:33:38', '2018-04-29 15:33:38'),
(3, 1, '30901215002', 'Abhijit Biswas', '1234567890', 'Kolkata', 'ab@gmail.com', 'male', 1, 1, 1, '2018-04-29 15:34:26', '2018-04-29 15:34:26'),
(4, 1, '30901215011', 'Asmita Karar', '1234567891', 'Kolkata', 'ak@gmail.com', 'female', 1, 1, 1, '2018-04-29 15:34:26', '2018-04-29 15:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sbjt_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cla_id` int(11) NOT NULL,
  `bach_id` int(11) NOT NULL,
  `sbjt_name` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sbjt_id`, `user_id`, `cla_id`, `bach_id`, `sbjt_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'JAVA OOP', 1, '2018-04-29 11:02:12', '2018-04-29 14:10:46'),
(2, 1, 1, 1, 'C++', 1, '2018-04-29 14:38:00', '2018-04-29 14:38:00'),
(3, 1, 1, 1, 'VB', 1, '2018-04-29 14:38:51', '2018-04-29 14:38:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `security_qstn` varchar(1000) NOT NULL,
  `security_ans` varchar(1000) NOT NULL,
  `institute_name` longtext NOT NULL,
  `remember_token` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `security_qstn`, `security_ans`, `institute_name`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', '$2y$10$v9eg18TiI01VbWJp.yijPeO/gFXpK.mAu/GxA9KiHk2Rr5/2jlLWu', 'What is your birth year?', '1996', 'ABCD', 'UWZ2c9B6PTiTxqXgZqyT8lleKXzlsuyWwfTHlEK2EcUt13ZWAGajDvMB0Jmf', 1, '2018-05-29 08:58:36', '2018-05-29 09:05:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`atdns_id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`bach_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`cla_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stdn_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sbjt_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `atdns_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `bach_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `cla_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `stdn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sbjt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;
