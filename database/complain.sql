-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 03:16 PM
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `gender`, `address`, `gmail`, `username`, `password`) VALUES
(11, 'ali', 'huisen', '', 'brgy. Murcia Alijis Bacolod', 'Ali@gmail.com', 'admin', '$2y$10$toCe.tqMU5x5NQnVOCLiluPL9ruhJSAgUBdLYpQOEVQhpRP0unxga'),
(12, 'ali', 'huisen', '', 'brgy. Murcia Alijis Bacolod', 'ali', 'admin2', '$2y$10$0L.dKReIr8zw1cNAy6v5feFpC0uTdA0rVAucNWOT4vLKosNMWIOBC'),
(13, 'test', 'test', '', 'bacolod', 's', 'test', '$2y$10$Au4pWNArBaRexLOrpgxxA.b24MObsRpSnre9DDZBTCxTljsHItNmK'),
(14, 'tes2', 'test2', 'Male', 'laroca', 'test', 'test2', '$2y$10$4pLyBpZHPxG.R1jVOqy4c.t.nq5hW6eZJkxjj3yNzoZTini7rFNXa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
