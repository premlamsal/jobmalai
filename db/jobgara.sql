-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2019 at 10:52 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobgara`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `appId` int(11) NOT NULL,
  `appTitle` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `appSubject` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `appDate` datetime NOT NULL,
  `appStatus` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `eId` int(11) NOT NULL,
  `jsId` int(11) NOT NULL,
  `catName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`appId`, `appTitle`, `appSubject`, `appDate`, `appStatus`, `eId`, `jsId`, `catName`, `jId`) VALUES
(3, 'JR WEB DEVELOPER', 'I would like to Apply for this Job. Please review my CV. Thank You!', '2018-12-16 04:12:04', 'Sent', 3, 1, 'Web Development', 17),
(4, 'JR WEB DEVELOPER', 'I would like to Apply for this Job. Please review my CV. Thank You!', '2018-12-17 10:12:36', 'Sent', 3, 1, 'Web Development', 17);

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `eId` int(11) NOT NULL,
  `eName` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `eEmail` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ePassword` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `eDetails` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `eVerified` int(11) NOT NULL,
  `eAddress` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ePhone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `eType` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eWebsite` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eEstd` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eEmployesNo` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `eLogo` varchar(400) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`eId`, `eName`, `eEmail`, `ePassword`, `eDetails`, `eVerified`, `eAddress`, `ePhone`, `eType`, `eWebsite`, `eEstd`, `eEmployesNo`, `eLogo`) VALUES
(3, 'Gangotri Softwares', 'premlamsal2@gmail.com', 'premlamsal', 'fdsafds', 1, 'Samkhusi', '9868616747', 'IT SOFTWARE HUB', 'http://gangotrisuppliers.com.np', '2018-11-29', '11', '../uploads/1544611699iconman.png'),
(4, 'Icare Tech Pvt.ltd ', 'icaregroup3@gmail.com', '123456', 'fadsf', 0, 'Gangabu Kathmandu', '896786786', 'IT company', 'icare.com.np', '2018-12-19', '10', '../uploads/1545546656icare.png');

-- --------------------------------------------------------

--
-- Table structure for table `emsg`
--

CREATE TABLE `emsg` (
  `mId` int(11) NOT NULL,
  `mTitle` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `mBody` int(200) NOT NULL,
  `mStatus` int(11) NOT NULL,
  `jsId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobcat`
--

CREATE TABLE `jobcat` (
  `catId` int(11) NOT NULL,
  `catName` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jobcat`
--

INSERT INTO `jobcat` (`catId`, `catName`) VALUES
(1, 'Web Development'),
(2, 'Graphic Designer'),
(3, 'IT Technician '),
(4, 'Hotel & Resturant'),
(5, 'Administration '),
(6, 'Hospitals');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jId` int(11) NOT NULL,
  `jName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jEndDate` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jType` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jLevel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jExperience` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jLocation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jTotalNo` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `jGenderPreffered` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jRequirement` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `jQualification` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `jPosted` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jExtraDetails` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `eId` int(11) NOT NULL,
  `catName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `jSalary` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `catId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jId`, `jName`, `jEndDate`, `jType`, `jLevel`, `jExperience`, `jLocation`, `jTotalNo`, `jGenderPreffered`, `jRequirement`, `jQualification`, `jPosted`, `jExtraDetails`, `eId`, `catName`, `jSalary`, `catId`) VALUES
(17, 'JR WEB DEVELOPER', '2018-11-30', 'Full Time', 'Senior', '<ul><li>2 year on Related Field</li></ul>', 'Kathmandu, Nepal', '2', 'Male', '<ul><li>PHP<br></li><li>JQUERY<br></li><li>MYSQL<br></li></ul>', '<ul><li>Must-Have Bachelor Degree&nbsp;</li><li>Professional&nbsp;Course Will be Plus point.<br></li></ul>', '2018-12-15 12:12:20', '<ul><li>Breakfast Available&nbsp;</li><li>5 days Week Work&nbsp;</li><li>Tranportation<br></li></ul>', 3, 'Web Development', '49000', 1),
(18, 'Marketing Manager', '2018-12-12', '', 'Senior', 'fsadnflnl', 'kathmandu', '2', 'Male', 'fdsa', 'fasd', '2018-12-23 06:12:57', 'fasdfasd', 3, 'Administration ', '200000', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

CREATE TABLE `jobseeker` (
  `jsId` int(11) NOT NULL,
  `jsName` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `jsEmail` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `jsPassword` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jsPhone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jsAddress` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `jsWebsite` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jsJoinedDate` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jsBio` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `jsCatFirst` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jsCatSecond` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jsCatThird` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jsVerified` int(11) NOT NULL,
  `jsLogo` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `jsResume` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`jsId`, `jsName`, `jsEmail`, `jsPassword`, `jsPhone`, `jsAddress`, `jsWebsite`, `jsJoinedDate`, `jsBio`, `jsCatFirst`, `jsCatSecond`, `jsCatThird`, `jsVerified`, `jsLogo`, `jsResume`) VALUES
(1, 'JobSeeker Prem', 'premlamsal2@gmail.com', 'premlamsal', '9868616747', 'Samkhusi, Tokha Road', 'http://premlamsal.com.np', '0000-00-00 00:00:00', 'Software Developer', 'Programmer', 'Desinger', 'SEO', 0, '../uploads/15446813445b43ccf31335b831008b4c1c-750-563.jpg', '../uploads/1544662570Resume.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `jsmsg`
--

CREATE TABLE `jsmsg` (
  `mId` int(11) NOT NULL,
  `mTitle` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `mBody` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `mStatus` int(11) NOT NULL,
  `eId` int(11) NOT NULL,
  `jsId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jsmsg`
--

INSERT INTO `jsmsg` (`mId`, `mTitle`, `mBody`, `mStatus`, `eId`, `jsId`) VALUES
(1, 'Application Accepted', 'Your application has been approved.', 0, 3, 1),
(2, 'Declined Application', 'You application declined', 0, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uId` int(11) NOT NULL,
  `uName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `uEmail` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `uPassword` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `uAddress` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `uLastLogin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `uPhone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `uPhoto` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `uRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uId`, `uName`, `uEmail`, `uPassword`, `uAddress`, `uLastLogin`, `uPhone`, `uPhoto`, `uRole`) VALUES
(1, 'Prem Lamsal', 'premlamsal2@gmail.com', 'premlamsal', 'ktm', '0000-00-00 00:00:00', '9888888', '../uploads/1544680833Job_kolkata3 (1).jpg', 2018),
(2, 'hfabdskjf', 'jnfkjsdnf@fanskjd.com', 'jkafdnkasd', 'nnfjasd', '2018-12-14 07:12:25', '97979798', '../uploads/15447689655b43ccf31335b831008b4c1c-750-563.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`appId`),
  ADD KEY `eId` (`eId`),
  ADD KEY `jsId` (`jsId`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`eId`);

--
-- Indexes for table `emsg`
--
ALTER TABLE `emsg`
  ADD PRIMARY KEY (`mId`),
  ADD KEY `jsId` (`jsId`);

--
-- Indexes for table `jobcat`
--
ALTER TABLE `jobcat`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jId`),
  ADD KEY `eId` (`eId`),
  ADD KEY `catId` (`catId`);

--
-- Indexes for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD PRIMARY KEY (`jsId`);

--
-- Indexes for table `jsmsg`
--
ALTER TABLE `jsmsg`
  ADD PRIMARY KEY (`mId`),
  ADD KEY `eId` (`eId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `appId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `eId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `emsg`
--
ALTER TABLE `emsg`
  MODIFY `mId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobcat`
--
ALTER TABLE `jobcat`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jobseeker`
--
ALTER TABLE `jobseeker`
  MODIFY `jsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jsmsg`
--
ALTER TABLE `jsmsg`
  MODIFY `mId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`eId`) REFERENCES `employer` (`eId`),
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`jsId`) REFERENCES `jobseeker` (`jsId`);

--
-- Constraints for table `emsg`
--
ALTER TABLE `emsg`
  ADD CONSTRAINT `emsg_ibfk_1` FOREIGN KEY (`jsId`) REFERENCES `jobseeker` (`jsId`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`eId`) REFERENCES `employer` (`eId`),
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`catId`) REFERENCES `jobcat` (`catId`);

--
-- Constraints for table `jsmsg`
--
ALTER TABLE `jsmsg`
  ADD CONSTRAINT `jsmsg_ibfk_1` FOREIGN KEY (`eId`) REFERENCES `employer` (`eId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
