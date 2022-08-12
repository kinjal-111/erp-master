-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 07:43 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gst_no` varchar(15) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `email_id` varchar(40) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `gst_no`, `phone_no`, `email_id`, `gender`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'Shweta', 'Solanki', '123ABC456DEF789', '9812764510', 'shweta.solanki@gmail.com', 'Female', 0, '2020-05-09 15:13:00', '2020-05-09 15:13:00'),
(2, 'Kinjal', 'Parekh', '12AB34CD56EF789', '8967452301', 'kinjal.parekh@gmail.com', 'Female', 0, '2020-05-09 15:15:26', '2020-05-09 15:15:26'),
(3, 'Prem', 'Mirani', '19AB28CD37EF465', '7789651243', 'prem.mirani@gmail.com', 'Male', 0, '2020-05-09 15:18:11', '2020-05-09 15:18:11'),
(4, 'Isha', 'Joglekar', '29BA18DC73FE564', '8069584736', 'isha.joglekar@gmail.com', 'Female', 0, '2020-05-09 15:19:49', '2020-05-09 15:19:49'),
(5, 'Rohit', 'Udasi', '13ABC0F298DEF36', '8971234560', 'rohit.udasi@gmail.com', 'Male', 0, '2020-05-09 15:26:07', '2020-05-09 15:26:07'),
(6, 'Muskaan', 'Aswani', '16ACB0F67802E56', '9966784326', 'muskaan.aswani@gmail.com', 'Female', 0, '2020-05-09 15:27:20', '2020-05-09 15:27:20'),
(7, 'Raj', 'Panchal', '23BCDE89519FE40', '9786756453', 'raj.panchal@gmail.com', 'Male', 0, '2020-05-09 15:28:28', '2020-05-09 15:28:28'),
(8, 'Chaitali', 'Parmar', '22EBD45012AB0C4', '8977453218', 'chaitali.parmar@gmail.com', 'Female', 0, '2020-05-09 15:32:44', '2020-05-09 15:32:44'),
(9, 'Aayushi', 'Bhimani', '13ACE0F458903C4', '8056128345', 'aayushi.bhimani@gmail.com', 'Female', 0, '2020-05-09 15:34:23', '2020-05-09 15:34:23'),
(10, 'Chintan', 'Gohil', '23BD04587ABCE78', '8790653421', 'chintan.gohil@gmail.com', 'Male', 0, '2020-05-09 15:37:58', '2020-05-09 15:37:58'),
(11, 'Hiral', 'Visaria', '30AEF04576BCD23', '9078563412', 'hiral.visaria@gmail.com', 'Female', 0, '2020-05-09 15:39:58', '2020-05-09 15:39:58'),
(12, 'ansh', 'dubey', '123ADC456BEF709', '9042469302', 'anuj.dubey@gmail.com', 'Male', 1, '2020-05-18 16:23:46', '2020-05-18 16:23:46'),
(13, 'Rakesh', 'Sharma', '123F0E234ACD3B3', '9678901232', 'rakesh.sharma@gmail.com', 'Male', 0, '2020-05-18 18:59:02', '2020-05-18 18:59:02'),
(14, 'Reena', 'Singh', '124OFE4567ADB31', '98012345650', 'reena.singh@gmail.com', 'Female', 0, '2020-05-18 19:02:17', '2020-05-18 19:02:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
