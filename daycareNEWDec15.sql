-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2019 at 06:56 AM
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
CREATE DATABASE IF NOT EXISTS `daycare` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `daycare`;

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
(3, 1, 1, 0, 'tstading-1-cover-letter.pdf', 'tstading-1-resume.pdf', 1),
(8, 6, 1, 1, 'bwooten-6-cover-letter.pdf', 'bwooten-6-resume.pdf', 2),
(9, 2, 1, 1, '', '', 4),
(10, 1, 0, 0, '', '', 4),
(11, 8, 0, 0, '', '', 2),
(12, 7, 0, 0, '', '', 2),
(13, 6, 0, 0, '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `childcareapp`
--

CREATE TABLE `childcareapp` (
  `appId` int(11) NOT NULL,
  `companyId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `parentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `childcareapp`
--

INSERT INTO `childcareapp` (`appId`, `companyId`, `studentId`, `parentId`) VALUES
(16, 4, 5, 2),
(17, 4, 4, 2),
(18, 1, 5, 2);

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
(3, 2, 'Final deafault comment.', 1, 'tstading', '2019-10-27 18:54:16'),
(4, 2, 'dfgdfgf', 4, 'gray', '2019-12-14 17:41:44'),
(7, 2, '', 4, 'gray', '2019-12-14 17:46:27'),
(8, 1, 'dfgdfgf', 2, 'bwooten', '2019-12-15 00:34:38'),
(9, 2, 'dfgdfgf', 4, 'gray', '2019-12-15 00:59:25'),
(10, 7, '\"<script>alert(\'test\');</script>', 2, 'bwooten', '2019-12-15 16:59:54');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `companyID` int(11) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `employeeCount` int(11) NOT NULL DEFAULT '1',
  `childCapacity` int(11) NOT NULL DEFAULT '0',
  `childrenEnrolled` int(11) NOT NULL DEFAULT '0',
  `overallRating` float DEFAULT '0',
  `ownerID` int(11) NOT NULL,
  `companyImage` varchar(50) DEFAULT 'images/default-company.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`companyID`, `companyName`, `employeeCount`, `childCapacity`, `childrenEnrolled`, `overallRating`, `ownerID`, `companyImage`) VALUES
(1, 'Tots R Us', 4, 15, 2, 1.11, 1, 'images/default-company.jpg'),
(2, 'Tinder Tots', 10, 35, 12, 1.5, 1, 'images/default-company.jpg'),
(3, 'Sprouts', 1, 0, 0, 0.8, 3, 'images/default-company.jpg'),
(4, 'Daycare Care', 14, 29, 23, 0, 2, 'images/default-company.jpg'),
(5, 'Daycare CareEdit', 12, 23, 21, 0, 7, 'images/default-company.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `companyapproval`
--

CREATE TABLE `companyapproval` (
  `compApprovalID` int(11) NOT NULL,
  `companyID` int(11) NOT NULL,
  `isApproved` tinyint(1) NOT NULL DEFAULT '0',
  `isProcessed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companyapproval`
--

INSERT INTO `companyapproval` (`compApprovalID`, `companyID`, `isApproved`, `isProcessed`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 5, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `companyfeedback`
--

CREATE TABLE `companyfeedback` (
  `cFeedbackID` int(11) NOT NULL,
  `raterID` int(11) NOT NULL,
  `companyID` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companyfeedback`
--

INSERT INTO `companyfeedback` (`cFeedbackID`, `raterID`, `companyID`, `feedback`, `rating`) VALUES
(3, 2, 1, '', 3.75),
(4, 2, 1, '', 4),
(5, 2, 2, '', 4.5),
(6, 2, 2, '', 4.5),
(7, 2, 2, '', 4.5),
(14, 2, 2, '', 0),
(16, 2, 1, '', 0),
(17, 2, 2, '', 0),
(18, 1, 4, '', 0),
(27, 2, 1, '', 0),
(28, 2, 1, '', 0),
(29, 2, 1, '', 0),
(32, 2, 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empID` int(11) NOT NULL,
  `applicationID` int(11) NOT NULL,
  `hireDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `exitDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empID`, `applicationID`, `hireDate`, `exitDate`) VALUES
(10000, 2, '2019-11-20 21:43:05', NULL),
(10004, 8, '2019-12-14 18:45:28', NULL),
(10005, 9, '2019-12-14 19:56:42', NULL);

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
  `applicationSlots` int(11) DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jobID`, `companyID`, `jobName`, `jobDescription`, `jobRequirements`, `applicationSlots`, `status`) VALUES
(1, 1, 'Daycare Worker', 'Duties.', '-Good social skills\r\n-No criminal history\r\n-Enjoys working with children', 13, 'open'),
(2, 1, 'Daycare Manager', 'Supervise daycare staff and aid in administrative work. ', 'At least 3 years of experience in child care. \r\nPrevious experience with leadership roles preferred. ', 3, 'open'),
(3, 3, 'Manager', 'Manage tinder tots', 'Associates', 4, 'open'),
(6, 4, 'Job Title', 'JOb Des', 'Associates', -3, 'filled'),
(7, 4, 'test', 'test', 'test', -1, 'open'),
(8, 4, 'Manager', 'JOb Des', 's working with children', -1, 'filled');

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
  `companyId` int(11) DEFAULT NULL,
  `stuFName` varchar(30) NOT NULL,
  `stuLName` varchar(30) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentId`, `parentId`, `companyId`, `stuFName`, `stuLName`, `age`) VALUES
(3, 2, 4, 'Teddy', 'Tedders', 1),
(4, 2, NULL, 'Billy', 'Billerson', 9),
(5, 2, NULL, 'Chad', 'Chadders', 4);

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
  `roleID` int(11) DEFAULT NULL,
  `Restricted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fName`, `lName`, `email`, `uName`, `pWord`, `image`, `roleID`, `Restricted`) VALUES
(1, 'Tyler', 'Stading', 'ts526610@southeast.edu', 'tstading', '$2y$10$c3UvY71xOol1xQOGyq6M9.j5BiHoa/TuS73zrpb2eu.z/owiUY4lm', 'images/default.jpg', 3, 0),
(2, 'Brad', 'Wooten', 'bwooten@gmail.com', 'bwooten', '$2y$10$c3UvY71xOol1xQOGyq6M9.j5BiHoa/TuS73zrpb2eu.z/owiUY4lm', 'images/default.jpg', 2, 0),
(3, 'Cody', 'Sterup', 'csterup@hotmail.net', 'csterup', '$2y$10$c3UvY71xOol1xQOGyq6M9.j5BiHoa/TuS73zrpb2eu.z/owiUY4lm', 'images/default.jpg', 3, 0),
(4, 'Glenn', 'Ray', 'gray@my.southeast.edu', 'gray', '$2y$10$c3UvY71xOol1xQOGyq6M9.j5BiHoa/TuS73zrpb2eu.z/owiUY4lm', 'images/default.jpg', 4, 0),
(7, 'Teddy', 'Bundy', 'bew2@hotmail.com', 'tb21', '$2y$10$8Ehq5D.oRqs55hoXy6nT3.MeOqH5JgYv3w6PMFdwBxaGtnfMKTqB2', 'images/tb21.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userfeedback`
--

CREATE TABLE `userfeedback` (
  `uFeedbackID` int(11) NOT NULL,
  `raterID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userfeedback`
--

INSERT INTO `userfeedback` (`uFeedbackID`, `raterID`, `userID`, `feedback`, `rating`) VALUES
(5, 2, 7, '', 0),
(7, 2, 3, '', 0),
(9, 2, 1, '', 0),
(10, 2, 1, '', 0),
(16, 2, 7, '', 0),
(17, 2, 7, '', 0),
(18, 2, 7, '', 0),
(20, 2, 3, '', 0),
(21, 2, 3, '', 0),
(22, 2, 7, '', 0);

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
-- Indexes for table `childcareapp`
--
ALTER TABLE `childcareapp`
  ADD PRIMARY KEY (`appId`),
  ADD KEY `companyIdfk` (`companyId`),
  ADD KEY `parentIdfk` (`parentId`),
  ADD KEY `studentIdfk` (`studentId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `commentsProfile_user_fk` (`profileID`),
  ADD KEY `commentsCommenter_user_fk` (`commenterID`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`companyID`),
  ADD KEY `company_user_fk` (`ownerID`);

--
-- Indexes for table `companyapproval`
--
ALTER TABLE `companyapproval`
  ADD PRIMARY KEY (`compApprovalID`),
  ADD KEY `companyapproval_company_fk` (`companyID`);

--
-- Indexes for table `companyfeedback`
--
ALTER TABLE `companyfeedback`
  ADD PRIMARY KEY (`cFeedbackID`),
  ADD KEY `cfeedback_user_fk` (`raterID`),
  ADD KEY `cfeedback_company_fk` (`companyID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empID`),
  ADD KEY `employee_app_fk` (`applicationID`);

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
  ADD PRIMARY KEY (`studentId`),
  ADD KEY `student_user_fk` (`parentId`),
  ADD KEY `student_company_fk` (`companyId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `uName` (`uName`),
  ADD KEY `user_role_fk` (`roleID`);

--
-- Indexes for table `userfeedback`
--
ALTER TABLE `userfeedback`
  ADD PRIMARY KEY (`uFeedbackID`),
  ADD KEY `ufeedback_rater_fk` (`raterID`),
  ADD KEY `ufeedback_user_fk` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `applicationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `childcareapp`
--
ALTER TABLE `childcareapp`
  MODIFY `appId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `companyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `companyapproval`
--
ALTER TABLE `companyapproval`
  MODIFY `compApprovalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `companyfeedback`
--
ALTER TABLE `companyfeedback`
  MODIFY `cFeedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10006;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `jobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `userfeedback`
--
ALTER TABLE `userfeedback`
  MODIFY `uFeedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `job_application_fk` FOREIGN KEY (`jobID`) REFERENCES `job` (`jobID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_application_fk` FOREIGN KEY (`userID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `childcareapp`
--
ALTER TABLE `childcareapp`
  ADD CONSTRAINT `companyIdfk` FOREIGN KEY (`companyId`) REFERENCES `company` (`companyID`),
  ADD CONSTRAINT `parentIdfk` FOREIGN KEY (`parentId`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `studentIdfk` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `commentsCommenter_user_fk` FOREIGN KEY (`commenterID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentsProfile_user_fk` FOREIGN KEY (`profileID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_user_fk` FOREIGN KEY (`ownerID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `companyapproval`
--
ALTER TABLE `companyapproval`
  ADD CONSTRAINT `companyapproval_company_fk` FOREIGN KEY (`companyID`) REFERENCES `company` (`companyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `companyfeedback`
--
ALTER TABLE `companyfeedback`
  ADD CONSTRAINT `cfeedback_company_fk` FOREIGN KEY (`companyID`) REFERENCES `company` (`companyID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cfeedback_user_fk` FOREIGN KEY (`raterID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_app_fk` FOREIGN KEY (`applicationID`) REFERENCES `application` (`applicationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_company_fk` FOREIGN KEY (`companyId`) REFERENCES `company` (`companyID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_user_fk` FOREIGN KEY (`parentId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_role_fk` FOREIGN KEY (`roleID`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userfeedback`
--
ALTER TABLE `userfeedback`
  ADD CONSTRAINT `ufeedback_rater_fk` FOREIGN KEY (`raterID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ufeedback_user_fk` FOREIGN KEY (`userID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
