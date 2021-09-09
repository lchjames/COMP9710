-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2021 at 02:19 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comp9710`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` char(6) NOT NULL,
  `role_id` char(1) NOT NULL,
  `title` char(3) DEFAULT NULL,
  `first_name` char(20) DEFAULT NULL,
  `middle_name` char(20) DEFAULT NULL,
  `family_name` char(20) DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `username` char(20) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `email_address` char(30) DEFAULT NULL,
  `student_id` char(7) DEFAULT NULL,
  `FAN` char(8) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `creted_date` date DEFAULT NULL,
  `created_by` char(6) DEFAULT NULL,
  `last_modified_date` date DEFAULT NULL,
  `last_modified_by` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `title`, `first_name`, `middle_name`, `family_name`, `sex`, `username`, `password`, `email_address`, `student_id`, `FAN`, `start_date`, `end_date`, `creted_date`, `created_by`, `last_modified_date`, `last_modified_by`) VALUES
('1', '1', NULL, NULL, NULL, NULL, NULL, 'test', '098f6bcd4621d373cade4e832627b4f6', NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0', '0000-00-00', '0'),
('2', '3', NULL, NULL, NULL, NULL, NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0', '0000-00-00', '0'),
('3', '2', NULL, NULL, NULL, NULL, NULL, 'lau0266', '38243f2b627767520abf680060759349', NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0', '0000-00-00', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
