-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2019 at 08:22 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

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
  `applicationID` int(11) NOT NULL,
  `jobID` int(11) NOT NULL,
  `isProcessed` tinyint(1) NOT NULL,
  `isApproved` tinyint(1) NOT NULL DEFAULT '0',
  `coverLetter` varchar(255) DEFAULT NULL,
  `resume` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`applicationID`, `jobID`, `isProcessed`, `isApproved`, `coverLetter`, `resume`, `userID`) VALUES
(1, 1, 1, 1, 'tstading-1-cover-letter.pdf', 'tstading-1-resume.pdf', 1),
(2, 1, 0, 0, 'bwooten-1-cover-letter.pdf', 'bwooten-1-resume.pdf', 2),
(3, 1, 0, 0, 'tstading-1-cover-letter.pdf', 'tstading-1-resume.pdf', 1);

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
(1, 'Tots R Us', 4, 15, 2, 3.42, 3, 'images/default.jpg'),
(2, 'Tinder Tots', 10, 35, 12, 4.2, 1, 'images/default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `companyapproval`
--

CREATE TABLE `companyapproval` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `maxChildren` int(11) NOT NULL,
  `currentEmp` int(11) DEFAULT NULL,
  `currentChildren` int(11) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `ownerID` int(11) NOT NULL,
  `isApproved` tinyint(1) DEFAULT NULL,
  `isProcessed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companyapproval`
--

INSERT INTO `companyapproval` (`ID`, `name`, `maxChildren`, `currentEmp`, `currentChildren`, `rating`, `logo`, `ownerID`, `isApproved`, `isProcessed`) VALUES
(1, 'bob\'s', 20, 3, 10, 3.5, 'images/', 0, 1, 1),
(2, 'Bob\'s Daycare', 20, 2, 5, 3.5, NULL, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `daycareopening`
--

CREATE TABLE `daycareopening` (
  `daycareOpeningId` int(11) NOT NULL,
  `companyID` int(11) NOT NULL,
  `instanceOfTypeID` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `openingName` varchar(100) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `availableCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daycareopening`
--

INSERT INTO `daycareopening` (`daycareOpeningId`, `companyID`, `instanceOfTypeID`, `type`, `openingName`, `description`, `availableCount`) VALUES
(1, 1, 0, 'Employee', 'Daycare Worker', 'Come work for us at Tots R US! ', 1),
(2, 1, 0, 'Student', 'Tots Tot', 'Our staff build strong connections with our tots, leading them in creative activities and even teaching them the basics of coding!', 13);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empID` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `companyId` int(11) NOT NULL,
  `jobId` int(11) NOT NULL,
  `yearsWithCompany` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `ID` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`ID`, `sender`, `target`, `feedback`, `rating`) VALUES
(1, 3, 1, 'Test', 3.2),
(2, 3, 2, 'test 2', 3.2);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `jobID` int(11) NOT NULL,
  `companyID` int(11) NOT NULL,
  `jobName` varchar(50) DEFAULT NULL,
  `jobDescription` varchar(500) DEFAULT NULL,
  `jobRequirements` varchar(500) DEFAULT NULL,
  `applicationSlots` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jobID`, `companyID`, `jobName`, `jobDescription`, `jobRequirements`, `applicationSlots`) VALUES
(1, 1, 'Daycare Worker', 'Duties.', '-Good social skills\r\n-No criminal history\r\n-Enjoys working with children', 14),
(2, 1, 'Daycare Manager', 'Supervise daycare staff and aid in administrative work. ', 'At least 3 years of experience in child care. \r\nPrevious experience with leadership roles preferred. ', 5);

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
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentId` int(11) NOT NULL,
  `parentId` int(11) NOT NULL,
  `companyId` int(11) NOT NULL,
  `stuFName` int(11) DEFAULT NULL,
  `stuLName` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`applicationID`),
  ADD KEY `job_application_fk` (`jobID`),
  ADD KEY `user_application_fk` (`userID`);

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
-- Indexes for table `daycareopening`
--
ALTER TABLE `daycareopening`
  ADD PRIMARY KEY (`daycareOpeningId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD UNIQUE KEY `empId` (`empID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`jobID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentId`);

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
  MODIFY `applicationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `companyapproval`
--
ALTER TABLE `companyapproval`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `daycareopening`
--
ALTER TABLE `daycareopening`
  MODIFY `daycareOpeningId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `jobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `job_application_fk` FOREIGN KEY (`jobID`) REFERENCES `job` (`jobID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_application_fk` FOREIGN KEY (`userID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
