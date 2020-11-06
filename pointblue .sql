-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 09:20 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pointblue`
--

-- --------------------------------------------------------

--
-- Table structure for table `file_leave`
--

CREATE TABLE `file_leave` (
  `id` int(11) NOT NULL,
  `leave_type` varchar(255) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `leave_count` float(11,2) NOT NULL,
  `date_filed` date NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_leave`
--

INSERT INTO `file_leave` (`id`, `leave_type`, `date_from`, `date_to`, `leave_count`, `date_filed`, `remarks`) VALUES
(11, 'Whole Day', '2020-11-09', '2020-11-11', 3.00, '2020-11-06', 'asd as'),
(12, 'Half Day', '2020-11-04', '2020-11-10', 3.00, '2020-11-06', 'asd as'),
(13, 'Half Day', '2020-11-13', '2020-11-16', 1.00, '2020-11-06', 'asdasd'),
(14, 'Half Day', '2020-11-04', '2020-11-05', 1.00, '2020-11-06', 'asdas d'),
(15, 'Whole Day', '2020-11-05', '2020-11-09', 3.00, '2020-11-06', 'asdasd'),
(16, 'Half Day', '2020-11-06', '2020-11-06', 1.00, '2020-11-06', 'asd'),
(17, 'Half Day', '2020-11-05', '2020-11-06', 1.00, '2020-11-06', 'asdasd'),
(18, 'Half Day', '2020-11-06', '2020-11-06', 0.50, '2020-11-06', 'asdasd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file_leave`
--
ALTER TABLE `file_leave`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file_leave`
--
ALTER TABLE `file_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
