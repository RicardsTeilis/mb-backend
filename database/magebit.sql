-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2021 at 11:51 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magebit`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `dateCreated` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `emailProvider` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `dateCreated`, `email`, `emailProvider`) VALUES
(33, 1612367570, 'princess.lea@outlook.com', 'outlook.com'),
(107, 1612510846, 'luke.skywalker@gmail.com', 'gmail.com'),
(108, 1612137600, 'han.solo@gmail.com', 'gmail.com'),
(109, 1612137600, 'jabba.hut@gmail.com', 'gmail.com'),
(110, 1612396800, 'tyrion.fordring@gmail.com', 'gmail.com'),
(111, 1612396800, 'bolvar.fordragon@gmail.com', 'gmail.com'),
(112, 1612396800, 'varian.wrynn@gmail.com', 'gmail.com'),
(113, 1612510846, 'anduin.wrynn@gmail.com', 'gmail.com'),
(114, 1612510846, 'jaina.proudmore@outlook.com', 'outlook.com'),
(115, 1612137600, 'arthas.menethil@outlook.com', 'outlook.com'),
(116, 1612137600, 'terenas.menethil@outlook.com', 'outlook.com'),
(117, 1612396800, 'orgrim.doomhammer@outlook.com', 'outlook.com'),
(118, 1612396800, 'illidan.stormrage@outlook.com', 'outlook.com'),
(119, 1612396800, 'malfurion.stormrage@outlook.com', 'outlook.com'),
(120, 1612510846, 'varok.saurfang@outlook.com', 'outlook.com'),
(121, 1612137600, 'elly.bishop@yahoo.com', 'yahoo.com'),
(122, 1612137600, 'nick.torres@yahoo.com', 'yahoo.com'),
(123, 1612137600, 'tim.mackey@yahoo.com', 'yahoo.com'),
(124, 1611792000, 'kenzi.bloy@yahoo.com', 'yahoo.com'),
(125, 1611792000, 'martin.deek@yahoo.com', 'yahoo.com'),
(126, 1611792000, 'derreck.morgan@yahoo.com', 'yahoo.com'),
(127, 1610496000, 'walter.white@yahoo.com', 'yahoo.com'),
(128, 1610496000, 'saul.goodman@yahoo.com', 'yahoo.com'),
(129, 1610496000, 'mike.ehrmantraut@yahoo.com', 'yahoo.com'),
(140, 0, '', ''),
(142, 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
