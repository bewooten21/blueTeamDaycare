-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2019 at 08:32 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teams`
--
CREATE DATABASE IF NOT EXISTS `daycare` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `daycare`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `profileID` int(11) NOT NULL,
  `comment` tinytext NOT NULL,
  `commenterID` int(11) NOT NULL,
  `commenterUserName` varchar(50) NOT NULL,
  `commentTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `profileID`, `comment`, `commenterID`, `commenterUserName`, `commentTime`) VALUES
(1, 3, 'Do not be alarmed this is a test.', 2, 'bwooten', '2019-10-27 19:42:24'),
(2, 4, 'This is a test.', 3, 'csterup', '2019-10-27 19:42:53'),
(3, 2, 'Final deafault comment.', 1, 'tstading', '2019-10-27 18:54:16');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `uName` varchar(50) DEFAULT NULL,
  `pWord` varchar(120) DEFAULT NULL,
  `image` varchar(100) DEFAULT 'images/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fName`, `lName`, `email`, `uName`, `pWord`, `image`) VALUES
(1, 'Tyler', 'Stading', 'ts526610@southeast.edu', 'tstading', '$2y$10$c3UvY71xOol1xQOGyq6M9.j5BiHoa/TuS73zrpb2eu.z/owiUY4lm', 'images/default.jpg'),
(2, 'Brad', 'Wooten', 'bwooten@gmail.com', 'bwooten', '$2y$10$c3UvY71xOol1xQOGyq6M9.j5BiHoa/TuS73zrpb2eu.z/owiUY4lm', 'images/default.jpg'),
(3, 'Cody', 'Sterup', 'csterup@hotmail.net', 'csterup', '$2y$10$c3UvY71xOol1xQOGyq6M9.j5BiHoa/TuS73zrpb2eu.z/owiUY4lm', 'images/default.jpg'),
(4, 'Glenn', 'Ray', 'gray@my.southeast.edu', 'gray', '$2y$10$c3UvY71xOol1xQOGyq6M9.j5BiHoa/TuS73zrpb2eu.z/owiUY4lm', 'images/default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `uName` (`uName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
