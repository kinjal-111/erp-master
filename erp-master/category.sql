-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 08:21 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `deleted` int(5) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 0, '2019-12-31 13:10:59', '2019-12-31 13:10:59'),
(2, 'Monitor', 0, '2019-12-31 13:10:59', '2019-12-31 13:10:59'),
(3, 'Keyboard', 0, '2019-12-31 13:10:59', '2019-12-31 13:10:59'),
(4, 'Mouse', 0, '2019-12-31 13:10:59', '2019-12-31 13:10:59'),
(5, 'Motherboard', 0, '2019-12-31 13:11:00', '2019-12-31 13:11:00'),
(6, 'RAM', 1, '2019-12-31 13:11:00', '2019-12-31 13:11:00'),
(7, 'Hard Disk', 0, '2019-12-31 13:11:00', '2019-12-31 13:11:00'),
(8, 'Processor', 0, '2019-12-31 13:11:00', '2019-12-31 13:11:00'),
(9, 'Speakers', 0, '2019-12-31 13:11:00', '2019-12-31 13:11:00'),
(10, 'Printer', 0, '2019-12-31 13:11:00', '2019-12-31 13:11:00'),
(11, 'Scanner', 0, '2020-02-15 13:16:54', '2020-02-15 13:16:54'),
(12, 'Yes Thats Working', 1, '2020-02-15 13:55:59', '2020-02-15 13:55:59'),
(13, 'Jatin', 0, '2020-02-15 14:03:27', '2020-02-15 14:03:27'),
(16, 'Headphones', 0, '2020-03-06 17:12:53', '2020-03-06 17:12:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
