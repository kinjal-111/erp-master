-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 07:16 AM
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `specification` varchar(255) NOT NULL,
  `hsn_code` int(8) NOT NULL,
  `category_id` int(11) NOT NULL,
  `eoq_level` int(5) NOT NULL,
  `danger_level` int(5) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` int(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `specification`, `hsn_code`, `category_id`, `eoq_level`, `danger_level`, `quantity`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'HP 15-DA0326TU', 'Pearl White', 10120407, 1, 10, 5, 100, '2019-12-31 15:47:49', '2019-12-31 15:47:49', 0),
(2, 'DELL Inspiron 3000', 'Jet Black', 10120407, 1, 12, 3, 500, '2019-12-31 15:47:49', '2019-12-31 15:47:49', 0),
(3, 'Lenovo Ideapad 130', 'Dark Blue', 10120407, 1, 8, 2, 150, '2019-12-31 15:47:49', '2019-12-31 15:47:49', 0),
(4, 'Acer Aspire V17', 'Grey', 10120407, 1, 10, 5, 80, '2019-12-31 15:47:49', '2019-12-31 15:47:49', 0),
(5, 'Asus ZenBook 14', 'Red', 10120407, 1, 15, 3, 90, '2019-12-31 15:47:49', '2019-12-31 15:47:49', 0),
(6, 'Acer', 'Resolution 1600 x 900 pixels', 20134407, 2, 10, 5, 100, '2019-12-31 15:47:49', '2019-12-31 15:47:49', 0),
(7, 'DELL', 'Resolution 1280 x 720 pixels', 20134407, 2, 12, 3, 500, '2019-12-31 15:47:49', '2019-12-31 15:47:49', 0),
(8, 'Lenovo', 'Resolution 1600 x 900 pixels', 20134407, 2, 8, 2, 150, '2019-12-31 15:47:49', '2019-12-31 15:47:49', 0),
(9, 'Acer', 'Resolution 1280 x 720 pixels', 20134407, 2, 10, 5, 80, '2019-12-31 15:47:49', '2019-12-31 15:47:49', 0),
(10, 'Asus', 'Resolution 1920 x 1080 pixels', 20134407, 2, 15, 3, 90, '2019-12-31 15:47:49', '2019-12-31 15:47:49', 0),
(11, 'Microsoft', 'Model Name - Pavilion Gaming Keyboard 500', 30134407, 3, 13, 5, 100, '2019-12-31 15:47:49', '2019-12-31 15:47:49', 0),
(12, 'Logitech', 'Resolution 1280 x 720 pixels', 30134407, 3, 11, 3, 500, '2019-12-31 15:47:49', '2019-12-31 15:47:49', 0),
(13, 'Razer', 'Resolution 1600 x 900 pixels', 30134407, 3, 8, 2, 150, '2019-12-31 15:47:49', '2019-12-31 15:47:49', 0),
(14, 'I Ball', 'Resolution 1280 x 720 pixels', 30134407, 3, 10, 5, 80, '2019-12-31 15:47:49', '2019-12-31 15:47:49', 0),
(15, 'Corsair', 'Resolution 1920 x 1080 pixels', 30134407, 3, 15, 3, 90, '2019-12-31 15:47:50', '2019-12-31 15:47:50', 0),
(16, 'Logitech', 'Weight - 100gm', 40134407, 4, 13, 5, 100, '2019-12-31 15:47:50', '2019-12-31 15:47:50', 0),
(17, 'Anker', 'Weight - 85gm', 40134407, 4, 11, 3, 500, '2019-12-31 15:47:50', '2019-12-31 15:47:50', 0),
(18, 'Asus', 'Weight - 70gm', 40134407, 4, 8, 2, 150, '2019-12-31 15:47:50', '2019-12-31 15:47:50', 0),
(19, 'Apple', 'Weight - 80gm', 40134407, 4, 10, 5, 80, '2019-12-31 15:47:50', '2019-12-31 15:47:50', 0),
(20, 'Razer', 'Weight - 150gm', 40134407, 4, 15, 3, 90, '2019-12-31 15:47:50', '2019-12-31 15:47:50', 0),
(21, 'Asus', 'Integrated Graphics Card - GTX 1080i', 50134407, 5, 13, 5, 60, '2019-12-31 15:47:50', '2019-12-31 15:47:50', 0),
(22, 'Biostar', 'Integrated Graphics Card - redamhd3000', 50134407, 5, 11, 3, 55, '2019-12-31 15:47:50', '2019-12-31 15:47:50', 0),
(23, 'EVGA', 'Integrated Graphics Card - GTX 1080', 50134407, 5, 8, 2, 120, '2019-12-31 15:47:50', '2019-12-31 15:47:50', 0),
(24, 'Gigabyte', 'Integrated Graphics Card - redamhd3000', 50134407, 5, 10, 5, 60, '2019-12-31 15:47:50', '2019-12-31 15:47:50', 0),
(25, 'MSI', 'Integrated Graphics Card - GTX 1080', 50134407, 5, 15, 3, 90, '2019-12-31 15:47:50', '2019-12-31 15:47:50', 0),
(26, 'Corsair', 'Memory - 2GB', 60134407, 6, 13, 5, 100, '2019-12-31 15:47:50', '2019-12-31 15:47:50', 0),
(27, 'Kingston', 'Memory - 4GB', 60134407, 6, 11, 3, 500, '2019-12-31 15:47:50', '2019-12-31 15:47:50', 0),
(28, 'Mushkin', 'Memory - 8GB', 60134407, 6, 8, 2, 150, '2019-12-31 15:47:50', '2019-12-31 15:47:50', 0),
(29, 'Micron', 'Memory - 16GB', 60134407, 6, 10, 5, 80, '2019-12-31 15:47:50', '2019-12-31 15:47:50', 0),
(30, 'OCZ', 'Memory - 2GB', 60134407, 6, 15, 3, 90, '2019-12-31 15:47:50', '2019-12-31 15:47:50', 0),
(31, 'Seagate', 'Type - HDD', 70120407, 7, 10, 5, 100, '2019-12-31 15:47:50', '2019-12-31 15:47:50', 0),
(32, 'Toshiba', 'Type - SSD', 70120407, 7, 12, 3, 500, '2019-12-31 15:47:50', '2019-12-31 15:47:50', 0),
(33, 'Sony', 'Type - HDD', 70120407, 7, 8, 2, 150, '2019-12-31 15:47:50', '2019-12-31 15:47:50', 0),
(34, 'Apple', 'Type - HDD', 70120407, 7, 10, 5, 80, '2019-12-31 15:47:50', '2019-12-31 15:47:50', 0),
(35, 'LG', 'Type - SSD', 70120407, 7, 15, 3, 90, '2019-12-31 15:47:50', '2019-12-31 15:47:50', 0),
(36, 'AMD', 'Base Frequecy - 350 MHz', 54134407, 8, 13, 5, 100, '2019-12-31 15:47:50', '2019-12-31 15:47:50', 0),
(37, 'ARM', 'Base Frequecy - 250 MHz', 54134407, 8, 11, 3, 500, '2019-12-31 15:47:50', '2019-12-31 15:47:50', 0),
(38, 'Intel', 'Base Frequecy - 400 MHz', 54134407, 8, 8, 2, 150, '2019-12-31 15:47:50', '2019-12-31 15:47:50', 0),
(39, 'NVIDIA', 'Base Frequecy - 300 MHz', 54134407, 8, 10, 5, 80, '2019-12-31 15:47:51', '2019-12-31 15:47:51', 0),
(40, 'NEC', 'Base Frequecy - 250 MHz', 54134407, 8, 15, 3, 90, '2019-12-31 15:47:51', '2019-12-31 15:47:51', 0),
(41, 'Logitech', 'Connection - Wired', 80134407, 9, 13, 5, 60, '2019-12-31 15:47:51', '2019-12-31 15:47:51', 0),
(42, 'Razer', 'Connection - Wired', 80134407, 9, 11, 3, 55, '2019-12-31 15:47:51', '2019-12-31 15:47:51', 0),
(43, 'Harman', 'Connection - Wireless', 80134407, 9, 8, 2, 120, '2019-12-31 15:47:51', '2019-12-31 15:47:51', 0),
(44, 'Edifer', 'Connection - Wired', 80134407, 9, 10, 5, 60, '2019-12-31 15:47:51', '2019-12-31 15:47:51', 0),
(45, 'Audioengine', 'Connection - Wireless', 80134407, 9, 15, 3, 90, '2019-12-31 15:47:51', '2019-12-31 15:47:51', 0),
(46, 'HP', 'Memory - 16MB', 90134407, 10, 13, 5, 100, '2019-12-31 15:47:51', '2019-12-31 15:47:51', 0),
(47, 'Canon', 'Memory - 16MB', 90134407, 10, 11, 3, 500, '2019-12-31 15:47:51', '2019-12-31 15:47:51', 0),
(48, 'Brother', 'Memory - 8MB', 90134407, 10, 8, 2, 150, '2019-12-31 15:47:51', '2019-12-31 15:47:51', 0),
(49, 'Lexmark', 'Memory - 32MB', 90134407, 10, 10, 5, 80, '2019-12-31 15:47:51', '2019-12-31 15:47:51', 0),
(50, 'Epson', 'Memory - 8MB', 90134407, 10, 15, 3, 90, '2019-12-31 15:47:51', '2019-12-31 15:47:51', 0),
(52, 'Boat Super Bass', 'Bluetooth with Mic and Alexa Voice Controlled', 10120410, 16, 10, 5, 10, '2020-03-06 17:15:23', '2020-03-06 17:15:23', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
