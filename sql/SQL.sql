-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021 年 08 月 02 日 11:43
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `comp9710`
--
CREATE DATABASE IF NOT EXISTS `comp9710` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `comp9710`;

-- --------------------------------------------------------

--
-- 資料表結構 `activities`
--

DROP TABLE IF EXISTS `activities`;
CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `module` int(11) NOT NULL,
  `activity_name` text NOT NULL,
  `activties_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `activities`
--

INSERT INTO `activities` (`id`, `module`, `activity_name`, `activties_link`) VALUES
(1, 1, 'Activity 1-1', 'lab.php');

-- --------------------------------------------------------

--
-- 資料表結構 `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `module` int(2) NOT NULL,
  `document_name` text NOT NULL,
  `document_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `documents`
--

INSERT INTO `documents` (`id`, `module`, `document_name`, `document_link`) VALUES
(1, 1, 'test', 'test.pdf'),
(2, 1, 'test1', 'test.pdf');

-- --------------------------------------------------------

--
-- 資料表結構 `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules` (
  `modules` int(11) NOT NULL,
  `module_name` text NOT NULL,
  `active` text NOT NULL DEFAULT 'false',
  `test_link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `modules`
--

INSERT INTO `modules` (`modules`, `module_name`, `active`, `test_link`) VALUES
(1, 'Module 1', 'false', NULL),
(2, 'Module 2', 'true', NULL),
(3, 'Module 3', 'true', NULL),
(4, 'Module 4', 'false', NULL),
(5, 'Module 5', 'false', NULL),
(6, 'Module 6', 'false', NULL),
(7, 'Module 7', 'false', NULL),
(8, 'Module 8', 'false', NULL),
(9, 'Module 9', 'false', NULL),
(10, 'Module 10', 'false', NULL),
(11, 'Module 11', 'false', NULL),
(12, 'Module 12', 'false', NULL),
(13, 'Module 13', 'false', NULL),
(14, 'Exam', 'false', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `studentID` int(20) NOT NULL,
  `userID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `student`
--

INSERT INTO `student` (`studentID`, `userID`) VALUES
(12312312, 0),
(1234567, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `user_account`
--

DROP TABLE IF EXISTS `user_account`;
CREATE TABLE `user_account` (
  `userID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usertype` varchar(10) NOT NULL,
  `last_login` datetime NOT NULL,
  `machine_state` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user_account`
--

INSERT INTO `user_account` (`userID`, `username`, `password`, `email`, `usertype`, `last_login`, `machine_state`) VALUES
(0, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', 'admin', '2021-08-02 14:21:19', 0),
(1, 'lau0266', '38243f2b627767520abf680060759349', 'lau0266@flinders.edu.au', 'user', '2021-05-03 12:35:21', 1),
(2, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@flinders.edu.au', 'user', '2021-08-01 23:29:51', 0),
(3, 'regm0029', 'f1ef2bc4f2894c1f32ef07279243a513', 'regm0029@flinders.edu.au', 'user', '0000-00-00 00:00:00', 0),
(4, 'sumo0004', 'c12ba95d95687a9eee7266d5d661916a', 'sumo0004@flinders.edu.au', 'user', '0000-00-00 00:00:00', 0),
(5, 'pali0024', 'e16ac4c6ac5a92ec673b5bff88bc26bd', 'pali0024@flinders.edu.au', 'user', '0000-00-00 00:00:00', 0),
(6, 'vasu0007', 'f63bf7d7db9d539b3bc386055634fd46', 'vasu0007@flinders.edu.au', 'user', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `module` int(11) NOT NULL,
  `video_name` text NOT NULL,
  `video_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `videos`
--

INSERT INTO `videos` (`id`, `module`, `video_name`, `video_link`) VALUES
(1, 1, 'For module 1', '1.mp4'),
(2, 2, 'For module 2-1', ''),
(3, 2, 'For module 2-2', '');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`modules`);

--
-- 資料表索引 `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`),
  ADD UNIQUE KEY `studentID` (`studentID`),
  ADD KEY `userID` (`userID`);

--
-- 資料表索引 `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`userID`);

--
-- 資料表索引 `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user_account` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
