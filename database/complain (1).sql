-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2023 at 10:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complain`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_complaintype`
--

CREATE TABLE `tb_complaintype` (
  `comp_id` int(11) NOT NULL,
  `comp_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_complaintype`
--

INSERT INTO `tb_complaintype` (`comp_id`, `comp_name`) VALUES
(1, 'Unattended Garbage Collection'),
(2, 'Poor Street Lighting');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gmail` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `firstname`, `lastname`, `gender`, `address`, `gmail`, `username`, `password`) VALUES
(11, 'ali', 'huisen', '', 'brgy. Murcia Alijis Bacolod', 'Ali@gmail.com', 'admin', '$2y$10$toCe.tqMU5x5NQnVOCLiluPL9ruhJSAgUBdLYpQOEVQhpRP0unxga'),
(12, 'ali', 'huisen', '', 'brgy. Murcia Alijis Bacolod', 'ali', 'admin2', '$2y$10$0L.dKReIr8zw1cNAy6v5feFpC0uTdA0rVAucNWOT4vLKosNMWIOBC'),
(13, 'test', 'test', '', 'bacolod', 's', 'test', '$2y$10$Au4pWNArBaRexLOrpgxxA.b24MObsRpSnre9DDZBTCxTljsHItNmK'),
(14, 'tes2', 'test2', 'Male', 'laroca', 'test', 'test2', '$2y$10$4pLyBpZHPxG.R1jVOqy4c.t.nq5hW6eZJkxjj3yNzoZTini7rFNXa'),
(15, 'test', 'test', 'Female', 'cabug', 'test@gmail.com', 'testing', '$2y$10$Slhb0yo3OEabcwJKXilEp.ku7vcCyLXo7aEpsP1nBAsiABvqu/C6W'),
(16, 'dale', 'baslot', 'Male', 'cabug', 'admin1', 'ali', '$2y$10$f7BUwDgtKqoe366EqRlj5OS7GJC80Ille16799I0t4vMZbxqwF0dq');

-- --------------------------------------------------------

--
-- Table structure for table `tb_usercomplain`
--

CREATE TABLE `tb_usercomplain` (
  `usrcomp_id` int(11) NOT NULL,
  `usrcomp_fname` text NOT NULL,
  `usrcomp_mname` text NOT NULL,
  `usrcomp_lname` text NOT NULL,
  `usrcomp_addr` text NOT NULL,
  `usrcomp_email` text NOT NULL,
  `usrcomp_contact` int(50) NOT NULL,
  `usrcomp_mess` text NOT NULL,
  `usrcomp_status` text NOT NULL,
  `usrcomp_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_usercomplain`
--

INSERT INTO `tb_usercomplain` (`usrcomp_id`, `usrcomp_fname`, `usrcomp_mname`, `usrcomp_lname`, `usrcomp_addr`, `usrcomp_email`, `usrcomp_contact`, `usrcomp_mess`, `usrcomp_status`, `usrcomp_fk`) VALUES
(12, 'test', 'test', 'test', 'test', 'test', 890890800, 'test', '', 2),
(19, 'test', 'med', 'baslot', 'cabug', 'dalebaslot@gmail.com', 9819, 'A', '', 1),
(20, '', 'med', 'lando', 'cabug', 'dalebaslot@gmail.com', 9819, 'testing', '', 1),
(21, '', 'med', 'lando', 'cabug', 'dalebaslot@gmail.com', 9819, 'testing', '', 1),
(22, 'roland', 'med', 'lando', 'cabug', 'dalebaslot@gmail.com', 9819, 'test', '', 2),
(23, 'roland', 'med', 'lando', 'cabug', 'dalebaslot@gmail.com', 9819, 'test', 'Pending', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_complaintype`
--
ALTER TABLE `tb_complaintype`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tb_usercomplain`
--
ALTER TABLE `tb_usercomplain`
  ADD PRIMARY KEY (`usrcomp_id`),
  ADD KEY `usrcomp_fk` (`usrcomp_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_complaintype`
--
ALTER TABLE `tb_complaintype`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_usercomplain`
--
ALTER TABLE `tb_usercomplain`
  MODIFY `usrcomp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_usercomplain`
--
ALTER TABLE `tb_usercomplain`
  ADD CONSTRAINT `tb_usercomplain_ibfk_1` FOREIGN KEY (`usrcomp_fk`) REFERENCES `tb_complaintype` (`comp_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
