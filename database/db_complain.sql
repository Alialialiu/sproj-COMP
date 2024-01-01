-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 01, 2024 at 05:14 PM
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
-- Database: `db_complain`
--

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(11) NOT NULL,
  `label` varchar(32) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `label`, `content`) VALUES
(1, 'landing_header', 'Welcome to your BRGY Complaint Page!'),
(2, 'landing_header_content', 'Here is your comprehensive dashboard to get you started. Below are your quick actions to navigate you to the complaints bulletin where you\'ll be able to see all the complaints in the Baranggay. You can also manage or send your own!'),
(3, 'landing_header_img', '../../src/img/6592cec7508da_landing.svg'),
(4, 'combul_header', 'Submit a report'),
(5, 'combul_content', 'All complaints starts here. You may submit multiple complaints at once, but please follow our guidelines to avoid account ban.'),
(6, 'usercom_header', 'Your complaints'),
(7, 'usercom_content', 'Here are the complaints you sent. You may submit more than one complaints, but please follow our guidelines to prevent spamming of complaints.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_complainstatus`
--

CREATE TABLE `tb_complainstatus` (
  `comstat_id` int(11) NOT NULL,
  `comstat_label` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_complainstatus`
--

INSERT INTO `tb_complainstatus` (`comstat_id`, `comstat_label`) VALUES
(1, 'pending'),
(2, 'resolving'),
(3, 'resolved');

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
  `user_type` tinyint(1) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_type`, `firstname`, `lastname`, `address`, `username`, `password`) VALUES
(24, 0, 'user', 'user', 'user', 'user', '$2y$10$e1WD4yzSJpCYyEI84HKjvOL81XBLXwuHSn57NiQT.plwOs5VLQ20m'),
(25, 1, 'Admin', 'User', '', 'admin', '$2y$10$e1WD4yzSJpCYyEI84HKjvOL81XBLXwuHSn57NiQT.plwOs5VLQ20m');

-- --------------------------------------------------------

--
-- Table structure for table `tb_usercomplain`
--

CREATE TABLE `tb_usercomplain` (
  `usrcomp_id` int(11) NOT NULL,
  `usercomp_type` int(11) NOT NULL,
  `usrcomp_title` text NOT NULL,
  `usrcomp_mess` text NOT NULL,
  `usrcomp_status` int(1) NOT NULL,
  `usrcomp_reqBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_usercomplain`
--

INSERT INTO `tb_usercomplain` (`usrcomp_id`, `usercomp_type`, `usrcomp_title`, `usrcomp_mess`, `usrcomp_status`, `usrcomp_reqBy`) VALUES
(12, 1, 'awdawd', 'test', 2, 24),
(19, 1, 'awdadaw', 'A', 3, 24),
(25, 2, 'Sample Title', '<div id=\"output\" class=\"page-generator__output js-generator-output\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Malesuada proin libero nunc consequat interdum varius sit amet. Tristique senectus et netus et malesuada fames. Facilisis volutpat est velit egestas dui. Arcu cursus euismod quis viverra nibh cras pulvinar mattis. Gravida dictum fusce ut placerat orci nulla pellentesque. Lorem sed risus ultricies tristique nulla aliquet. Nunc sed id semper risus in hendrerit gravida rutrum quisque. Pretium vulputate sapien nec sagittis aliquam. Sapien nec sagittis aliquam malesuada. Auctor augue mauris augue neque gravida in fermentum et. A cras semper auctor neque vitae tempus. Integer feugiat scelerisque varius morbi enim nunc faucibus a pellentesque. Ac felis donec et odio pellentesque. Et malesuada fames ac turpis egestas maecenas pharetra. Varius duis at consectetur lorem donec. Suscipit tellus mauris a diam maecenas sed. Ultricies leo integer malesuada nunc vel. In cursus turpis massa tincidunt dui. Vulputate eu scelerisque felis imperdiet proin fermentum leo vel.</p>\r\n</div>', 3, 24),
(26, 1, 'Sample Title', '<div id=\"output\" class=\"page-generator__output js-generator-output\">\r\n<p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Accumsan lacus vel facilisis volutpat est velit egestas. Lorem dolor sed viverra ipsum nunc aliquet bibendum enim facilisis.</strong></p>\r\n</div>', 1, 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_complainstatus`
--
ALTER TABLE `tb_complainstatus`
  ADD PRIMARY KEY (`comstat_id`);

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
  ADD KEY `usrcomp_fk` (`usrcomp_reqBy`),
  ADD KEY `tb_usercomplain_ibfk_2` (`usercomp_type`),
  ADD KEY `tb_usercomplain_ibfk_3` (`usrcomp_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_complainstatus`
--
ALTER TABLE `tb_complainstatus`
  MODIFY `comstat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_complaintype`
--
ALTER TABLE `tb_complaintype`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_usercomplain`
--
ALTER TABLE `tb_usercomplain`
  MODIFY `usrcomp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_usercomplain`
--
ALTER TABLE `tb_usercomplain`
  ADD CONSTRAINT `tb_usercomplain_ibfk_2` FOREIGN KEY (`usercomp_type`) REFERENCES `tb_complaintype` (`comp_id`),
  ADD CONSTRAINT `tb_usercomplain_ibfk_3` FOREIGN KEY (`usrcomp_status`) REFERENCES `tb_complainstatus` (`comstat_id`),
  ADD CONSTRAINT `tb_usercomplain_ibfk_4` FOREIGN KEY (`usrcomp_reqBy`) REFERENCES `tb_user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
