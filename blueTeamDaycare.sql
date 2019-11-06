-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2019 at 09:33 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daycare`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `openingID` int(11) NOT NULL,
  `isProcessed` tinyint(1) NOT NULL,
  `coverLetter` varchar(255) DEFAULT NULL,
  `resume` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `openingID`, `isProcessed`, `coverLetter`, `resume`, `userID`) VALUES
(1, 2, 0, 'coverletters/myFirst.pdf', 'resumes/mySecond.docx', 1);

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
  `commentTime` timestamp NOT NULL DEFAULT current_timestamp()
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
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `employeeCount` int(11) NOT NULL,
  `childCapacity` int(11) NOT NULL,
  `childrenEnrolled` int(11) NOT NULL,
  `overallRating` float DEFAULT NULL,
  `ownerID` int(11) NOT NULL,
  `companyImage` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `companyName`, `employeeCount`, `childCapacity`, `childrenEnrolled`, `overallRating`, `ownerID`, `companyImage`) VALUES
(1, 'Tots R Us', 4, 15, 2, 3.42, 3, 'images/default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `companyapproval`
--

CREATE TABLE `companyapproval` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `maxEmp` int(11) NOT NULL,
  `maxChildren` int(11) NOT NULL,
  `currentEmp` int(11) DEFAULT NULL,
  `currentChildren` int(11) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `companyID` int(11) NOT NULL,
  `jobName` varchar(50) DEFAULT NULL,
  `jobDescription` varchar(500) DEFAULT NULL,
  `jobRequirements` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `companyID`, `jobName`, `jobDescription`, `jobRequirements`) VALUES
(1, 1, 'Daycare Worker', 'Duties.', '-Good social skills\r\n-No criminal history\r\n-Enjoys working with children');

-- --------------------------------------------------------

--
-- Table structure for table `opening`
--

CREATE TABLE `opening` (
  `id` int(11) NOT NULL,
  `companyID` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `openingName` varchar(100) NOT NULL,
  `instanceOfTypeID` int(11) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `availableCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opening`
--

INSERT INTO `opening` (`id`, `companyID`, `type`, `openingName`, `instanceOfTypeID`, `description`, `availableCount`) VALUES
(1, 1, 'Employee', 'Daycare Worker', 0, 'Come work for us at Tots R US! ', 1),
(2, 1, 'Student', 'Tots Tot', 0, 'Our staff build strong connections with our tots, leading them in creative activities and even teaching them the basics of coding!', 13);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `type`) VALUES
(1, 'user'),
(2, 'employee'),
(3, 'owner'),
(4, 'administrator');

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
  `image` varchar(100) DEFAULT 'images/default.jpg',
  `roleID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fName`, `lName`, `email`, `uName`, `pWord`, `image`, `roleID`) VALUES
(1, 'Tyler', 'Stading', 'ts526610@southeast.edu', 'tstading', '$2y$10$c3UvY71xOol1xQOGyq6M9.j5BiHoa/TuS73zrpb2eu.z/owiUY4lm', 'images/default.jpg', 1),
(2, 'Brad', 'Wooten', 'bwooten@gmail.com', 'bwooten', '$2y$10$c3UvY71xOol1xQOGyq6M9.j5BiHoa/TuS73zrpb2eu.z/owiUY4lm', 'images/default.jpg', 2),
(3, 'Cody', 'Sterup', 'csterup@hotmail.net', 'csterup', '$2y$10$c3UvY71xOol1xQOGyq6M9.j5BiHoa/TuS73zrpb2eu.z/owiUY4lm', 'images/default.jpg', 3),
(4, 'Glenn', 'Ray', 'gray@my.southeast.edu', 'gray', '$2y$10$c3UvY71xOol1xQOGyq6M9.j5BiHoa/TuS73zrpb2eu.z/owiUY4lm', 'images/default.jpg', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companyapproval`
--
ALTER TABLE `companyapproval`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opening`
--
ALTER TABLE `opening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companyapproval`
--
ALTER TABLE `companyapproval`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `opening`
--
ALTER TABLE `opening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
