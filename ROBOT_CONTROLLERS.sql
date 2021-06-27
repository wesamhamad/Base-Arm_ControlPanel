-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 27, 2021 at 10:53 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ROBOT_CONTROLLERS`
--

-- --------------------------------------------------------

--
-- Table structure for table `Directions`
--

CREATE TABLE `Directions` (
  `id` int(11) NOT NULL,
  `Direction` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Directions`
--

INSERT INTO `Directions` (`id`, `Direction`) VALUES
(127, 'Forward'),
(128, 'Stop'),
(129, 'Forward'),
(130, 'Right'),
(131, 'Stop'),
(132, 'Forward'),
(133, 'Backward'),
(134, 'Backward'),
(135, 'Forward'),
(136, 'Forward');

-- --------------------------------------------------------

--
-- Table structure for table `Engines`
--

CREATE TABLE `Engines` (
  `Base` int(180) NOT NULL,
  `Shoulder` int(180) NOT NULL,
  `Elbow` int(180) NOT NULL,
  `Wrist` int(180) NOT NULL,
  `Gripper` int(180) NOT NULL,
  `Engine` int(180) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Engines`
--

INSERT INTO `Engines` (`Base`, `Shoulder`, `Elbow`, `Wrist`, `Gripper`, `Engine`, `id`) VALUES
(61, 45, 0, 180, 0, 0, 1),
(90, 45, 47, 49, 30, 0, 2),
(33, 30, 45, 180, 90, 124, 3),
(0, 0, 0, 0, 0, 30, 4),
(0, 90, 0, 0, 0, 0, 5),
(0, 30, 0, 0, 0, 0, 6),
(48, 30, 30, 90, 45, 0, 7),
(48, 30, 30, 90, 45, 0, 8),
(30, 45, 45, 120, 180, 0, 9),
(68, 101, 30, 45, 30, 0, 10),
(90, 90, 45, 30, 0, 0, 11),
(0, 0, 0, 0, 180, 0, 12),
(45, 30, 180, 59, 30, 0, 13),
(30, 68, 45, 180, 30, 0, 14);

-- --------------------------------------------------------

--
-- Table structure for table `Run`
--

CREATE TABLE `Run` (
  `id` int(11) NOT NULL,
  `ON/OFF` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Run`
--

INSERT INTO `Run` (`id`, `ON/OFF`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Directions`
--
ALTER TABLE `Directions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Engines`
--
ALTER TABLE `Engines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Run`
--
ALTER TABLE `Run`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Directions`
--
ALTER TABLE `Directions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `Engines`
--
ALTER TABLE `Engines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Run`
--
ALTER TABLE `Run`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
