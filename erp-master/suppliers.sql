-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 08:08 AM
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
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `gst_no` varchar(15) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `email_id` varchar(40) NOT NULL,
  `company_name` varchar(25) NOT NULL,
  `deleted` int(6) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `first_name`, `last_name`, `gst_no`, `phone_no`, `email_id`, `company_name`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'Vignesh', 'Sundaram', '27BAADE1112A2Z5', '9769485187', 'vigneshs41@gmail.com', 'AMAX Information', 0, '2020-01-01 17:33:07', '2020-01-01 17:33:07'),
(2, 'Nikhil', 'Hassanandani', '27BAADE1113A2Z5', '9004583616', 'nik1211@outlook.com', 'Antec', 0, '2020-01-01 17:33:07', '2020-01-01 17:33:07'),
(3, 'Robin', 'Kuriakose', '27BAADE1114A2Z5', '9764267160', 'minisusan@gmail.com', 'AOpen', 0, '2020-01-01 17:33:07', '2020-01-01 17:33:07'),
(4, 'Ishan', 'Shah', '27BAADE1115A2Z5', '9920860358', 'ishan19496@gmail.com', 'Zalman', 0, '2020-01-01 17:33:07', '2020-01-01 17:33:07'),
(5, 'Akanksha', 'Chavan', '27BAADE1116A2Z5', '9664772956', 'akankshachavan5596@gmail.com', 'XFX', 0, '2020-01-01 17:33:07', '2020-01-01 17:33:07'),
(6, 'Chaitanya', 'Bendre', '27BAADE1117A2Z5', '9022422210', 'chaitanyabendre123@gmail.com', 'Ultra Products', 0, '2020-01-01 17:33:07', '2020-01-01 17:33:07'),
(7, 'Pranav', 'Subramanian', '27BAADE1118A2Z5', '9619099702', 'pranav.iger01@gmail.com', 'Thermaltake', 0, '2020-01-01 17:33:08', '2020-01-01 17:33:08'),
(8, 'Viral', 'Parmar', '27BAADE1119A2Z5', '9022218185', 'viralparmar71@gmail.com', 'SilverStone Technology', 0, '2020-01-01 17:33:08', '2020-01-01 17:33:08'),
(9, 'Siddhanth', 'Shetty', '27BAADE1120A2Z5', '9004546581', 'siddhanth076226@gmail.com', 'Shuttle', 0, '2020-01-01 17:33:08', '2020-01-01 17:33:08'),
(10, 'Ameya', 'Hardikar', '27BAADE1121A2Z5', '9004841033', 'dixithardikarameya@yahoo.com', 'Seasonic', 0, '2020-01-01 17:33:08', '2020-01-01 17:33:08'),
(11, 'Ninad', 'Mundhe', '27BAADE1122A2Z5', '9967733469', 'ninadmundhe@rediffmail.com', 'Rosewill', 0, '2020-01-01 17:33:08', '2020-01-01 17:33:08'),
(12, 'Aditya', 'Moon', '27BAADE1123A2Z5', '9768882829', 'adityamoon1@gmail.com', 'Razer', 0, '2020-01-01 17:33:08', '2020-01-01 17:33:08'),
(13, 'Pratik', 'Yadav', '27BAADE1124A2Z5', '7208186376', 'ypratik10@gmail.com', 'Phanteks', 0, '2020-01-01 17:33:08', '2020-01-01 17:33:08'),
(14, 'Viraj', 'Doshi', '27BAADE1125A2Z5', '9619693430', 'viraj.doshi@gmail.com', 'APEVIA', 0, '2020-01-01 17:33:08', '2020-01-01 17:33:08'),
(15, 'Summet', 'Doshi', '27BAADE1126A2Z5', '9702852914', 'sumeetdoshi400@gmail.com', 'ASRock', 0, '2020-01-01 17:33:08', '2020-01-01 17:33:08'),
(16, 'Vatsal', 'Shah', '27BAADE1127A2Z5', '9930274090', 'vatsal0396@gmail.com', 'Be quiet!', 0, '2020-01-01 17:33:08', '2020-01-01 17:33:08'),
(17, 'Meet', 'Mehta', '27BAADE1128A2Z5', '8291410232', 'mehta.meet96@gmail.com', 'Chassis Plans', 0, '2020-01-01 17:33:08', '2020-01-01 17:33:08'),
(18, 'Aman', 'Mishre', '27BAADE1129A2Z5', '9892867557', 'aman.mishre1105@gmail.com', 'NZXT', 0, '2020-01-01 17:33:08', '2020-01-01 17:33:08'),
(19, 'Karanpreet', 'Budhiraja', '27BAADE1130A2Z5', '2225933934', 'karanb37@gmail.com', 'MiTAC', 0, '2020-01-01 17:33:08', '2020-01-01 17:33:08'),
(20, 'Amit', 'Parmar', '27BAADE1131A2Z5', '8898449046', 'parmaramit03@gmail.com', 'MSI', 0, '2020-01-01 17:33:08', '2020-01-01 17:33:08'),
(21, 'Karan', 'Maru', '27BAADE1132A2Z5', '8976264756', 'karan.maru@gmail.com', 'Lian Li', 0, '2020-01-01 17:33:08', '2020-01-01 17:33:08'),
(22, 'Yuvraj', 'Gawade', '27BAADE1133A2Z5', '9619946165', 'yuvi.bboy@gmail.com', 'Lenovo', 0, '2020-01-01 17:33:08', '2020-01-01 17:33:08'),
(23, 'Bhavesh', 'Gaba', '27BAADE1134A2Z5', '9619378222', 'bgaba0@gmail.com', 'InWin', 0, '2020-01-01 17:33:08', '2020-01-01 17:33:08'),
(24, 'Hitesh', 'Khatwani', '27BAADE1135A2Z5', '7738532632', 'hiteshkhatwani610@yahoo.com', 'Cooler Master', 0, '2020-01-01 17:33:08', '2020-01-01 17:33:08'),
(25, 'Runal', 'More', '27BAADE1136A2Z5', '9869505065', 'rockingrunal@gmail.com', 'Corsair Components', 0, '2020-01-01 17:33:08', '2020-01-01 17:33:08'),
(26, 'Sumeet', 'Chavan', '27BAADE1137A2Z5', '8108929656', 'sanjay@negisign.com', 'Dell', 0, '2020-01-01 17:33:08', '2020-01-01 17:33:08'),
(27, 'Maitri', 'Tank', '27BAADE1138A2Z5', '9867560902', 'tank_ramnik@yahoo.co.in', 'Deepcool', 0, '2020-01-01 17:33:08', '2020-01-01 17:33:08'),
(28, 'Dhum', 'Vijay', '27BAADE1139A2Z5', '8692085402', 'vijay.dhum22@rediffmail.com', 'DFI', 0, '2020-01-01 17:33:08', '2020-01-01 17:33:08'),
(29, 'Kunal', 'Hile', '27BAADE1140A2Z5', '9819324622', 'kunal.hile@gmail.com', 'Intel', 0, '2020-01-01 17:33:08', '2020-01-01 17:33:08'),
(30, 'Roshan', 'Sakpal', '27BAADE1141A2Z5', '9769069674', 'roshusakpal@yahoo.com', 'IBall', 0, '2020-01-01 17:33:08', '2020-01-01 17:33:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
