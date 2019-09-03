-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2019 at 08:21 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `task` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task`, `uid`) VALUES
(4, 'Coffee and Tea', 17),
(5, 'Todo list', 17),
(46, 'Ghetto', 18),
(47, 'Laundry ', 19),
(48, 'Bookshop', 19),
(49, 'TV show', 19),
(50, 'Game night', 19),
(51, 'Training', 18),
(52, 'Basketball game', 18),
(53, 'Shopping', 17),
(54, 'Car wash', 17);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pwhash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `lastname`, `email`, `pwhash`, `regdate`) VALUES
(6, 'Lora1111', 'Mouse', 'hd@aa.lv', 'BadHash', '2019-08-14 20:31:01'),
(7, 'Nils', 'Mouse', 'hdaaaa@aa.lv', '$2y$10$pIz1jLz8bKKvfS5UbSMq6O4iFRwLUgm4FeQvBdy77brgAb0ckmIC6', '2019-08-14 20:34:46'),
(8, 'Lora', 'DB', 'ag@gg.com', '$2y$10$GgvXDjf719aQl0E2FIHFjeKMmaqLbWTF9eiZofr9P166YWevRoRWi', '2019-08-15 06:49:53'),
(9, 'Gatis', 'Lala', 'gat@gg.com', '$2y$10$M3p07FlFvBdnCTAJgVJi9egT7qpxH.VEoPCU/ZTV.DGt.ixf4CudW', '2019-08-15 06:51:01'),
(12, 'Lora2', 'Mouse', 'lsur@jsjsjsjs.com', '$2y$10$am.8GgApAqESNUzGrTClB.x80Bbbe3pv7PczwFydOYzZiMD4S2JXK', '2019-08-15 10:21:01'),
(14, 'August', '', '', '$2y$10$JH7/i0TFpnSzXr.JQ/sgDe2IT5UFdMM.osge8CqsKasArRUSqHOeK', '2019-08-15 13:11:23'),
(16, 'Maija', 'Dalala', 'shaa@gm.lv', '$2y$10$ABMgdLKfc/kSwPtdCiP/Oe4CG/NI6kxi2x/.8fMK4oulaGWcN7H7C', '2019-08-15 14:02:02'),
(17, 'Nora', 'Fora', 'nora@hh.com', '$2y$10$HY9InrmbXzZrJ2PskixZau7lefHutKsSaCwF203W3KhUnXTShQdsy', '2019-08-15 14:51:52'),
(18, 'Janis', 'Jannis', 'jannis@gg.com', '$2y$10$CaDkBQNNIyXZ.OxS1yR/gu5cMQyx35KC.97D3pFPgMxjHKYMPRN7u', '2019-08-15 14:52:21'),
(19, 'Maya', 'Mayoon', 'mayo@gen.com', '$2y$10$iPloI/dxHd.YHdpI1IKvHeNAEBSdEQhFvmuGXSoe2lDZy/zPA4DzW', '2019-08-15 14:52:53'),
(20, 'Nauris', '', 'aa@ee.com', '$2y$10$6BDq4aaR2rCCdIM46ICYie9a8/lwQWv9xzvuNttABtu5PPEo4Ptz.', '2019-08-16 07:00:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
