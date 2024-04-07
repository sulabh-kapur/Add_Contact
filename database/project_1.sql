-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2024 at 08:43 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(12) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `auth_id` int(12) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `first_name`, `last_name`, `email`, `contact`, `address`, `auth_id`, `created_date`, `updated_date`, `image`) VALUES
(4, 'Sulabh', 'Kapur', 'sulabhkapur61@gmail.com', '8745698532', 'Model Town', 1, '2024-01-19 12:39:11', '2024-01-19 12:39:11', NULL),
(5, 'Ankit ', 'Kumar', 'ankit@gmail.com', '9875254785', 'Model Town', 1, '2024-01-19 12:50:09', '2024-01-19 12:50:09', NULL),
(7, 'ankit', 'Kapur', 'sulabh@gmail.com', '9875254785', 'Model Town', 1, '2024-01-29 14:42:21', '2024-01-29 14:42:21', NULL),
(8, 'ram', 'kumar', 'ramkumar@gmail.com', '8545236578', 'Model Town', 1, '2024-01-29 16:20:01', '2024-01-29 16:20:01', NULL),
(9, 'sham', 'kumar', 'shamkumar@gmail.com', '5412365789', 'Model Town', 1, '2024-01-29 16:20:23', '2024-01-29 16:20:23', NULL),
(10, 'guru', 'singh', 'guru@gmail.com', '4125789632', 'Haibowal ', 1, '2024-01-29 16:20:56', '2024-01-29 16:20:56', NULL),
(11, 'Sulabh', 'Kapur', 'sulabhkapur61@gmail.com', '8745698532', 'Model Town', 10, '2024-02-06 15:59:45', '2024-02-06 15:59:45', '1707215385.png');

-- --------------------------------------------------------

--
-- Table structure for table `registartion_1`
--

CREATE TABLE `registartion_1` (
  `id` int(12) NOT NULL,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contact` int(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` int(12) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registartion_1`
--

INSERT INTO `registartion_1` (`id`, `first_name`, `last_name`, `email`, `password`, `contact`, `address`, `created_date`, `updated_date`, `is_active`, `image`) VALUES
(1, 'Sulabh', 'Kapur', 'sulabhkapur61@gmail.com', '123456', 2147483647, 'Model Town', '2024-01-18 15:46:40', '2024-01-18 15:46:40', 1, NULL),
(3, 'Ankit ', 'Kumar', 'ankit@gmail.com', '12345', 2147483647, 'Haibowal ', '2024-02-01 10:21:04', '2024-02-01 10:21:04', 1, NULL),
(4, 'Ram', 'kumar', 'ramkumar@gmail.com', '12345', 2147483647, 'Model Town', '2024-02-01 14:27:04', '2024-02-01 14:27:04', 0, NULL),
(5, 'Sulabh', 'Kapur', 'sulabhkapur61@gmail.com', '11111111', 2147483647, 'Model Town', '2024-02-06 14:03:53', '2024-02-06 14:03:53', 1, ''),
(6, 'Sulabh', 'Kumar', 'sulabhkapur@gmail.com', '11111111', 2147483647, 'Model Town', '2024-02-06 14:05:18', '2024-02-06 14:05:18', 1, ''),
(7, 'Ankit ', 'Kumar', 'sulabhkapur61@gmail.com', '1234', 2147483647, 'Model Town', '2024-02-06 14:06:10', '2024-02-06 14:06:10', 1, ''),
(8, 'Sulabh', 'Kapur', 'sulabhkapur61@gmail.com', '444444', 2147483647, 'Model Town', '2024-02-06 14:20:13', '2024-02-06 14:20:13', 1, ''),
(9, 'Sulabh', 'Kapur', 'sulabhkapur@gmail.com', 'dwdsdwwddwdw', 2147483647, 'Model Town', '2024-02-06 14:22:12', '2024-02-06 14:22:12', 1, ''),
(10, 'Sulabh', 'Kapur', 'sulabhkapur61@gmail.com', '555555555', 2147483647, 'Model Town', '2024-02-06 14:28:04', '2024-02-06 14:28:04', 1, '1707209884.png'),
(11, 'Sulabh', 'Kapur', 'sulabhkapur61@gmail.com', '87878888', 2147483647, 'Model Town', '2024-02-06 14:28:20', '2024-02-06 14:28:20', 1, '1707209900.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registartion_1`
--
ALTER TABLE `registartion_1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `registartion_1`
--
ALTER TABLE `registartion_1`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
